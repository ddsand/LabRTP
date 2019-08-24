
    <!-- footer -->
    <footer class="footer-type2 pt-80 footer-bg-h3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <!-- single widget -->
                    <div class="footer-widget">
                        <!-- footer logo -->
                        <div class="footer-logo">
                            <a href="<?php echo base_url()?>">
                                <img src="<?php echo base_url()?>assets/img/log.png" alt="Footer logo">
                            </a>
                        </div>
                        <!--End of footer logo -->
                        <div class="footer-about-text">
                            <p>Lab RTP HI-205 terus berinovasi untuk menghasilkan produk-produk teknologi unggulan terbaik.</p>
                        </div>
                       
                    </div>
                    <!--End of single widget -->
                </div>
                <div class="col-lg-4 col-sm-6">
                    
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- single widget -->
                    <div class="footer-widget">
                        <!-- footer header -->
                        <div class="footer-header">
                            <h5>Contact</h5>
                            <div class="unerline">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        
                        <div class="footer-contact-wrap">
                            <ul class="footer-contact-list list-unstyled">
                                <li>
                                    <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                    Lab RTP - HI 205. Gedung D3 PENS.
                                </li>
                                
                                <li>
                                    <span><i class="fa fa-globe" aria-hidden="true"></i></span>
                                    <a href="#">rtp.tekkom.pens.ac.id</a>
                                </li>
                            </ul>
                        </div>
                        <!--End of contact list -->

                    </div>
                    <!--End of single widget -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer-social-area">
                        <ul class="footer--social-list text-center list-unstyled">
                             <li>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom-wrap">
                        <!-- footer bottom text -->
                    <div class="footer-bottom-text">
                        <p>© Developed by<strong><a href="#"> Tekkom A </a></strong>,2015.</p>
                    </div>
                    <!-- End of footer bottom text-->

                   
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Pengajuan Peminjaman Alat</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="contact-form contact-page-form parsley-validate">
                    <form action="<?=base_url()?>Peminjaman/Submit" method="POST">
                        <!-- form group -->
                        <div class="form-group">
                            Data Peminjam
                            <input type="text" name="nrp" class="theme-input-style" placeholder="NRP" required>
                        </div>
                        <!-- End of form group -->

                        <!-- form group -->
                        <div class="form-group">
                            Kelas
                            <select class="theme-input-style col-md-12" name="tingkat">
                                <option value = "0">Pilih Kelas</option>
                                <option value = "1 D4 Teknik Komputer">1 D4 Teknik Komputer</option>
                                <option value = "2 D4 Teknik Komputer">2 D4 Teknik Komputer</option>
                                <option value = "3 D4 Teknik Komputer">3 D4 Teknik Komputer</option>
                                <option value = "4 D4 Teknik Komputer">4 D4 Teknik Komputer</option>
                            </select>
                            <select class="theme-input-style col-md-12" name="kelas">
                                <option value = "A">A</option>
                                <option value = "B">B</option>                                
                            </select>
                        </div>                        
                        <!--End of form group -->

                        <!-- form group -->
                        <div class="form-group">
                            Barang yang dipinjam                             
                            <select class="theme-input-style" id="alat" name="alat">
                                <option>Nama Alat</option>
                                <?php 
                                    foreach ($alat as $row) {                           
                                ?>
                                <option value = "<?=$row->idalat?>"><?=$row->namaalat?></option>
                                <?php }?>                               
                            </select>
                            <div id="form_alat">
                                
                            </div>                          
                        </div>

                        <div class="form-group">
                            Tanggal Pinjam
                            <input type="date" name="tgl_pinjam" class="theme-input-style" required>
                        </div>
                        <!--<div class="form-group">
                            Tanggal Kembali
                            <input type="date" name="tgl_kembali" class="theme-input-style" required>
                        </div>-->
                        <!-- End of form group -->                    
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn contact-btn btn-transparent style-4" onclick="form.submit();">Submit</button>
                <button data-dismiss="modal" class="btn contact-btn btn-transparent style-2" >Cancel</button>  
                 </form>       
            </div>

            </div>
        </div>
    </div>

     <!-- The Modal -->
    <div class="modal" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Pengajuan Peminjaman Ruangan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="contact-form contact-page-form parsley-validate">
                    <form action="<?=base_url()?>Peminjaman/Submit_" method="POST">
                        <!-- form group -->
                        <div class="form-group">
                            Data Peminjam
                            <input type="text" name="nrp_" class="theme-input-style" placeholder="NRP" required>
                        </div>
                        <!-- End of form group -->

                        <!-- form group -->
                        <div class="form-group">
                            Kelas
                            <select class="theme-input-style col-md-12" name="tingkat2">
                                <option value = "0">Pilih Kelas</option>
                                <option value = "1 D4 Teknik Komputer">1 D4 Teknik Komputer</option>
                                <option value = "2 D4 Teknik Komputer">2 D4 Teknik Komputer</option>
                                <option value = "3 D4 Teknik Komputer">3 D4 Teknik Komputer</option>
                                <option value = "4 D4 Teknik Komputer">4 D4 Teknik Komputer</option>
                            </select>
                            <select class="theme-input-style col-md-12" name="kelas_">
                                <option value = "A">A</option>
                                <option value = "B">B</option>                                
                            </select>
                        </div>                        
                        <!--End of form group -->

                        <!-- form group -->
                        <div class="form-group">
                            Ruang yang dipinjam                             
                            <select class="theme-input-style" id="ruang" name="ruang">
                                <option>Nama Ruang</option>
                                <?php 
                                    foreach ($ruang as $row) {                           
                                ?>
                                <option value = "<?=$row->idruang?>"><?=$row->namaruang?></option>
                                <?php }?>                               
                            </select>
                            <div id="form_alat">
                                
                            </div>                          
                        </div>

                        <div class="form-group">
                            Tanggal Pinjam
                            <input type="date" name="tgl_pinjam_" class="theme-input-style" required>
                        </div>                       
                        <!-- End of form group -->                    
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn contact-btn btn-transparent style-4" onclick="form.submit();">Submit</button>
                <button data-dismiss="modal" class="btn contact-btn btn-transparent style-2" >Cancel</button>  
                 </form>       
            </div>

            </div>
        </div>
    </div>
    <!-- End of footer -->

     <!-- The Modal -->
    <div class="modal" id="myModal3">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Pengaduan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="contact-form contact-page-form parsley-validate">
                    <form action="<?=base_url()?>Peminjaman/Submit__" method="POST">
                        <!-- form group -->
                        <div class="form-group">
                            Data Peminjam
                            <input type="text" name="nrp__" class="theme-input-style" placeholder="NRP" required>
                        </div>
                        <!-- End of form group -->

                        <!-- form group -->
                        <div class="form-group">
                            Kepentingan
                            <select class="theme-input-style col-md-12" name="kepentingan">
                                <option value = "0">Kepentingan</option>
                                <option value = "Alat">Peralatan</option>
                                <option value = "Ruang">Ruangan</option>                               
                            </select>                          
                        </div>                        
                        <!--End of form group -->

                         <!-- form group -->
                        <div class="form-group">
                            Isi
                             <input type="text" name="isi" class="theme-input-style" placeholder="Isi Pengaduan" required>            
                        </div>                        
                        <!--End of form group -->

                        <!-- form group -->  

                        <div class="form-group">
                            Tanggal Terima
                            <input type="date" name="tgl_terima" class="theme-input-style" required>
                        </div>                       
                        <!-- End of form group -->                    
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn contact-btn btn-transparent style-4" onclick="form.submit();">Submit</button>
                <button data-dismiss="modal" class="btn contact-btn btn-transparent style-2" >Cancel</button>  
                 </form>       
            </div>

            </div>
        </div>
    </div>
    <!-- End of footer -->

    <!-- back to top -->
    <div class="back-to-top home3">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- back to top -->
    </div>
    <!-- End of main wrapper -->





    <!-- JS Files -->
    
   <!-- ==== JQuery 3.3.1 js file==== -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>

    <!-- ==== Bootstrap js file==== -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>

    <!-- ==== JQuery Waypoint js file==== -->
    <script src="<?php echo base_url()?>assets/plugins/waypoints/jquery.waypoints.min.js"></script>

    <!-- ==== Parsley js file==== -->
    <script src="<?php echo base_url()?>assets/plugins/parsley/parsley.min.js"></script>

    <!-- ==== Ratina js file==== -->
    <script src="<?php echo base_url()?>assets/plugins/retinajs/retina.min.js"></script>

    <!-- ==== parallax js==== -->
    <script src="<?php echo base_url()?>assets/plugins/parallax/parallax.js"></script>

    <!-- ==== Owl Carousel js file==== -->
    <script src="<?php echo base_url()?>assets/plugins/owl-carousel/owl.carousel.min.js"></script>

    <!-- ====Count down==== -->
    <script src="<?php echo base_url()?>assets/plugins/countdown/jquery.countdown.min.js"></script>

    <!-- ====Chart js file ==== -->
    <script src="<?php echo base_url()?>assets/plugins/chart-js/echarts.min.js"></script>

    <!-- ==== Menu  js file==== -->
    <script src="<?php echo base_url()?>assets/js/menu.min.js"></script>

    <!-- ====Magnific-Popup js file==== -->
    <script src="<?php echo base_url()?>assets/plugins/Magnific-Popup/jquery.magnific-popup.min.js"></script>

    <!-- ====Counter js file=== -->
    <script src="<?php echo base_url()?>assets/plugins/waypoints/jquery.counterup.min.js"></script>

     <!--==== google map api key ====-->
    <script src="<?php echo base_url()?>assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyB2D8wrWMY3XZnuHO6C31uq90JiuaFzGws"></script>

    <!-- ====matrial js file==== -->
    <script src="<?php echo base_url()?>assets/js/matrial.js"></script>

    <!-- ==== Script js file==== -->
    <script src="<?php echo base_url()?>assets/js/scripts.js"></script>

    <!-- ==== Custom js file==== -->
    <script src="<?php echo base_url()?>assets/js/custom.js"></script>

     <script>
       $(document).ready(function(){       
         $('#alat').on('change', function() {
            //alert('oke');
            $('#form_alat').load('<?=base_url()?>Home/getJumlah/'+this.value);           
         });      
      });
    </script>

</body>
</html>