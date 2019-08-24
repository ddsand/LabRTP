<?php include 'header.php';?>

    <!-- page title wrap-->
    <section class="page-title-inner home2-vs1-bg">
        <div class="page-title-wrap crypto-patern">
            <div class="container"> 
                <div class="row align-items-center justify-content-center"> 
                    <div class="col"> 
                        <!-- page title inner -->
                        <div class="page-title text-center" data-animate="fadeInUp" data-delay="1.05"> 
                            <h1 class="h2">Blog Posts</h1> 
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
    <section class="pt-130 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- blog wrap -->
                    <div class="our-blog-inner type2">
                        <div class="row">
                            <?php 
                                foreach($artikel as $row){
                            ?>
                            <div class="col-md-12 col-lg-6">
                                <!-- single post -->
                                <div class="single-post mb-50">
                                    <!-- post image -->
                                    <div class="post-image">
                                        <a href="#">
                                            <img src="img/blog/Img1.jpg" alt="">
                                        </a>
                                    </div>
                                    <!--End of post image -->

                                    <!-- post content -->
                                    <div class="post-content">
                                        <div class="post-info">
                                            <a href="#"><span><i class="fa fa-clock-o"></i></span><?=$row->tglrilis;?></a>
                                            <a href="#"><span><i class="fa fa-user"></i></span>Admin Lab RTP</a>
                                        </div>
                                        <div class="post-main-heading">
                                            <h4><a href="<?=base_url()?>artikel/detail/<?=$row->judulartikel?>"><?=$row->judulartikel;?></a></h4>                                            
                                        </div>
                                    </div>
                                    <!--End of post content -->
                                </div>
                                <!--End of single post -->
                            </div>  
                                <?php }?>                                               
                        </div>
                        <div class="row">
                            
                            <div class="col-12">
                                
                                <!--<div class="blog-pagination-wrap">
                                    <ul class="pagination blog-pagination list-unstyled">
                                        <li class="disabled">
                                            <a href="#"><i class="fa fa-angle-left"></i></a>
                                        </li>
                                        <li class="active">
                                            <a href="#">01</a>
                                        </li>
                                        <li>
                                            <a href="#">02</a>
                                        </li>
                                        <li>
                                            <a href="#">03</a>
                                        </li>
                                        <li class="dot">
                                            <span>....</span>
                                        </li>
                                         <li>
                                            <a href="#">04</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-angle-right"></i></a>
                                        </li>
                                    </ul>
                                </div>-->
                               <?php echo $links; ?>
                            </div>
                        </div>
                    </div>
                    <!-- End of blog wrap -->
                </div>
                <div class="col-md-4">
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
<?php include 'footer.php';?>