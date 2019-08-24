<?php 
    include ('header.php');
?>

                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header card">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <i class="icofont icofont-table bg-c-blue"></i>
                                                <div class="d-inline">
                                                    <h4>Tabel Data Pengaduan</h4>
                                                    <span>Politeknik Elektronika Negeri Surabaya</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="<?php echo base_url()."home/index" ?>">
                                                            <i class="icofont icofont-home"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->

                                <!-- Page-body start -->
                                <div class="page-body">                             
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- table start -->
                                            <div class="card">
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="tabel" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Pengirim</th>
                                                                <th>Keterangan Pengaduan</th>
                                                                <th>Tanggal Pengaduan</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Pengirim</th>
                                                                    <th>Keterangan Pengaduan</th>
                                                                    <th>Tanggal Pengaduan</th>
                                                                    <th>Status</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- table end -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-body end -->
                            </div>
                        </div>
                        <!-- Main-body end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include ('footer.php'); 
?>

<script type="text/javascript">
    var save_method; //untuk menyimpan method string
    var table;

    $(document).ready(function(){
       table = $('#tabel').DataTable({ 
            "responsive": true,
            "processing": true, 
            "serverSide": true, 
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Pengaduan/pengaduan_list')?>",
                "type": "POST"
            },

            "columnDefs": [
            { 
                "targets": [ -1 ], //kolom terakhir
                "orderable": false, //pengaturan untuk tidak dapat dirubah
            },
            ],

        });

    }); 
    function hapus_data(id) //fungsi untuk menghapus data dari database
    {
        if(confirm('Are you sure delete this data?'))
        {
            $.ajax({
                url : "<?php echo site_url('pengaduan/pengaduan_delete')?>/"+id, //mendefinisikan fungsi pada controller untuk aksi delete
                type: "POST", //menggunakan tipe data post untuk eksekusi perintah ini 
                dataType: "JSON", //menggunakan format data json 
                success: function(data)
                {
                    //jika sukses, reload tabel ajax
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data'); 
                }
            });

        }
    }
    function edit_data(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Load data from ajax
        $.ajax({
            url : "<?php echo site_url('pengaduan/pengaduan_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id"]').val(data.idpengaduan);
                $('[name="pengirim"]').val(data.pengirim);
                $('[name="ketpengaduan"]').val(data.ketpengaduan);
                $('[name="isi"]').val(data.isi);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Lihat Keterangan'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
    function edit_status(id)
    {
        if(confirm('Mengubah Status pengaduan?'))
        {
            $.ajax({
                url : "<?php echo site_url('pengaduan/editstatus')?>/"+id, //mendefinisikan fungsi pada controller untuk aksi delete
                type: "POST", //menggunakan tipe data post untuk eksekusi perintah ini 
                dataType: "JSON", //menggunakan format data json 
                success: function(data)
                {
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    reload_table();
                }
            });

        }
    }
    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax 
    }
</script>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Judul</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                        <div class="form-group">
                            <label class="control-label col-md-3">Pengirim</label>
                            <div class="col-md-9">
                                <input name="pengirim" class="form-control" type="text" blocked>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Keterangan Pengaduan</label>
                            <div class="col-md-9">
                                <input name="ketpengaduan" class="form-control" type="text" blocked>
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Isi</label>
                            <div class="col-md-9">
                                <textarea name="isi" class="form-control">
                                    
                                </textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                </form>
            </div>
           
        </div>
    </div>
</div>
