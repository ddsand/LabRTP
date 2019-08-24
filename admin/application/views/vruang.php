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
                                                    <h4>Tabel Data Ruang</h4>
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
                                                <div class="card-header">   
                                                    <div class="row">  
                                                        <div class="col-2">
                                                        <input type="button" data-toggle="modal" onclick="tambah_data()" class="btn btn-primary waves-effect waves-light" value="Tambah Data">   
                                                        </div>
                                                    </div>     
                                                </div>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="tabel" class="table table-striped table-bordered nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>Nama Ruang</th>
                                                                <th>Ketua Lab</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Nama Ruang</th>
                                                                    <th>Ketua Lab</th>
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
                "url": "<?php echo site_url('Ruang/ruang_list')?>",
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

    function tambah_data() //menambah data ke database
     {
        save_method = 'add';
        $('#form')[0].reset(); //reset form pada modal
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); //menampilkan modal bootstrap
        $('.modal-title').text('Tambah Data ruang'); //digunakan untuk mengatur judul pada modal bootstrap
    }
    
    function hapus_data(id) //fungsi untuk menghapus data dari database
    {
        if(confirm('Are you sure delete this data?'))
        {
            $.ajax({
                url : "<?php echo site_url('ruang/ruang_delete')?>/"+id, //mendefinisikan fungsi pada controller untuk aksi delete
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
            url : "<?php echo site_url('ruang/ruang_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id"]').val(data.idruang);
                $('[name="namaruang"]').val(data.namaruang);
                $('[name="ketua"]').val(data.ketua);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Perbarui Data ruang'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax 
    }
    function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;

        if(save_method == 'add') {
            url = "<?php echo site_url('ruang/ruang_add')?>";
        }
        else if(save_method == 'update'){
            url = "<?php echo site_url('ruang/ruang_update')?>"; 
        }

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {

               
                $('#modal_form').modal('hide');
                reload_table();
               
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                reload_table();
                $('#modal_form').modal('hide');
                //alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            }
        });
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
                            <label class="control-label col-md-3">Nama ruang</label>
                            <div class="col-md-9">
                                <input name="namaruang" placeholder="Nama ruang" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3">Ketua Lab</label>
                            <div class="col-md-9">
                                <input name="ketua" placeholder="Ketua Lab" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
