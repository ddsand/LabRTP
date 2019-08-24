<!-- View Beranda -->
<?php
    include ('header.php');
?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body" style="margin-bottom: -20px">
                                    <div style="padding-top: 2%; margin-bottom: -2%;">
                                        
                                        </div>
                                <div class="page-wrapper">
                                    <!-- Page body start -->       
                                           <!-- Card  Start -->
                                            <div class="col-md-12">
                                                <div class="row">
                                                        <div class="col-md-12 card feed-card">
                                                            <div class="card-block p-t-0 p-b-0">
                                                                <div class="row">
                                                                    <div style="margin-left: -2%; padding-bottom: 50px" class="col-4 bg-c-blue border-feed">
                                                                        <i class="icofont icofont-users-alt-4 f-40"></i>
                                                                    </div>
                                                                    <div class="col-8" style="padding-bottom: 50px">
                                                                        <div class="col-sm-12">
                                                                            <h2 class="f-w-400 m-b-10" style="padding-top: 5%">Selamat Datang</h2>
                                                                            <h4 class="text-muted m-0">Admin Lab RTP </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                </div>
                                            </div>
                                            <!-- Card  End -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>

<?php
    include ('footer.php'); 
?>
<
<script type="text/javascript">
    $('document').ready(function(){
			jumlahdata();
			jumlahmasuk();
			jumlahadmin();
		});
        function jumlahdata(){ //fungsi untuk menampilkan jumlah data kendaraan yang tersimpan pada database pada beranda 
            $.ajax({
                url : "<?php //echo site_url('Kendaraan/jumlahdata/')?>",
                type: "GET",
                dataType:"JSON",
                success: function(data)
                {
                        $('.oyi').append("<span class='d-inline-block'>"+data.rows+"</span>");    
                }
            });
        }
		function jumlahmasuk(){ //fungsi untuk menampilkan jumlah data kendaraan yang masuk pintu gerbang pada hari itu pada beranda
			$.ajax({
                    url : "<?php //echo site_url('Kendaraan/jumlahmasuk/')?>",
                    type: "GET",
                    dataType:"JSON",
                    success: function(data)
                    {
                            $('.yaso').append("<span class='d-inline-block'>"+data.rows+"</span>");    
                    }
                });
		}
		function jumlahadmin(){ //fungsi untuk menampilkan jumlah admin yang terdaftar pada database pada beranda
			$.ajax({
                    url : "<?php //echo site_url('Login/jumlahdata/')?>",
                    type: "GET",
                    dataType:"JSON",
                    success: function(data)
                    {
                            $('.seru').append("<span class='d-inline-block'>"+data.rows+"</span>");    
                    }
                });
		}
</script>