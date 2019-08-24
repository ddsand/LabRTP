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
                                                    <h4>Tabel Data Peminjaman Alat</h4>
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
                                                                <th>Alat</th>
                                                                <th>Kelas/Institusi</th>
                                                                <th>Peminjam</th>
                                                                <th>Jumlah</th>
                                                                <th>Tanggal Pinjam</th>
                                                                <th>Tanggal Kembali</th>
                                                                <th>Status</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Alat</th>
                                                                    <th>Kelas/Institusi</th>
                                                                    <th>Peminjam</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Tanggal Pinjam</th>
                                                                    <th>Tanggal Kembali</th>
                                                                    <th>Status</th>
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
                "url": "<?php echo site_url('Peminjaman/pinjam_list')?>",
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
    
    function edit_data(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Load data from ajax
        $.ajax({
            url : "<?php echo site_url('Peminjaman/pinjam_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="id"]').val(data.idpinjam);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Perbarui Data pinjam'); // Set title to Bootstrap modal title
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
            url = "<?php echo site_url('Peminjaman/pinjam_add')?>";
        }
        else if(save_method == 'update'){
            url = "<?php echo site_url('Peminjaman/pinjam_update')?>"; 
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
                            <label class="control-label col-md-3">Edit Perijinan</label>
                            <div class="col-md-9">
                                <select name="editijin" class="form-control">
                                    <option value="1">Diijinkan</option>
                                    <option value="2">Ditolak</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>     
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Kembali</label>
                            <div class="col-md-9">
                                <input type="date" name="tglkembali" class="form-control">
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
