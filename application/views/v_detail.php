<?php include 'header.php';?>

    <!-- page title wrap-->
    <section class="page-title-inner home2-vs1-bg">
        <div class="page-title-wrap crypto-patern">
            <div class="container"> 
                <div class="row align-items-center justify-content-center"> 
                    <div class="col"> 
                        <!-- page title inner -->
                        <div class="page-title text-center" data-animate="fadeInUp" data-delay="1.05"> 
                            <h1 class="h2">Blog</h1> 
                            <ul class="nav m-0 justify-content-center"> 
                                <li><a href="<?php echo base_url()?>">Home</a></li>
                               
                            </ul> 
                        </div>
                        <!-- End of page title inner -->
                    </div>
                </div>
            </div>
        </div> 
    </section>
    <!-- End of page title -->
    
    <!--Blog Section -->
    <section class="pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- blog Details wrap -->
                   <?php 
                        foreach($d_artikel as $row){
                   ?>
                   <div class="blog-wrap blog-details-page">
                        <!-- post main content -->
                       <div class="post-main-content post-content-block">
                           <!-- post img -->
                           <div class="post-main-img">
                               <img src="img/blog/blog-details.jpg" alt="" data-rjs="2">
                           </div>
                           <!-- End of post img -->
                           <!-- post meta -->
                           <ul class="post-meta list-unstyled nav">
                               <li>
                                   By:
                                   <a href="#">Admin Lab RTP</a>
                               </li>
                               <li>                                  
                                   <a href="#"><?=$row->tglrilis?></a>
                               </li>                              
                           </ul>
                           <!-- End of post meta -->
                           <h3><?=$row->judulartikel?></h3>
                           <?=$row->isi?>
                            
                            
                       </div>
                        <!-- End of post main content -->    
                        <?php }?>        
                   </div>
                    <!-- End of blog Details wrap -->
                </div>
                <div class="col-lg-4">
                      <!-- side bar widget -->
                    <aside>
                        <!-- single sidebar widget -->
                        <div class="single-sidebar-widget mb-70">
                            <div class="search-form sidebar-search-form parsley-validate">
                                <form action="#" novalidate>
                                    <input type="text" placeholder="&#xF002; Search Now" required>
                                </form>
                            </div>
                        </div>
                        <!-- End of single sidebar widget -->

                        <!-- single sidebar widget -->
                        
                        <!-- End of single sidebar widget -->

                        <!-- single sidebar widget -->
                        <div class="single-sidebar-widget mb-70">
                            <div class="widget-title">
                                <h4>Recent News</h4>
                            </div>
                            <?php foreach ($recent_news as $row) {
                                
                             ?>
                            <!-- recent post -->
                            <div class="recent-posts">
                                <div class="post-wrapper">
                                    <a href="#" class="post-info">
                                    <span><i class="fa fa-clock-o"></i></span>
                                    <?=$row->tglrilis?>
                                    </a>
                                    <h5><a href="<?=base_url()?>artikel/detail/<?=$row->judulartikel?>"><?=$row->judulartikel?></a></h5>
                                </div>
                            </div>
                            <!-- End of recent post --> 
                            <?php }?>                          
                        </div>
                        <!-- End of single sidebar widget -->                 
                    </aside>
                    <!-- side bar widget -->
                </div>
            </div>
        </div>
    </section>
    <!--End of Blog wrap -->
<?php include 'footer.php'; ?>