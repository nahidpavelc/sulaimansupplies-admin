

        <style> 
            .social_icon_single a i{
                border: 1px solid #f1f1f1;
                color: #b5876d;
                width: 38px;
                height: 38px;
                font-size: 18px; 
                line-height: 38px;
                text-align: center;
                transition: all linear.5s;
            } 
            .social_icon_single a:hover i{
                color: #fff;
                background:#b5876d; 
            }

        </style>

    <!-- Breadcrumb Area Start-->
    <section class="breadcrumb-area overlay-dark-2 bg-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text text-center">
                        <h2><?= $service_list->name; ?> Decoration</h2>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="<?= base_url(); ?>">Home</a></li>
                                <li>Decoration</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->
    <!-- Room Details Area Start -->
    <section class="room-details pt-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="room-slider-wrapper">
                        <div class="room-slider">
                            
                            <?php foreach($service_photos as $value_photo) { ?>
                            <div class="slider-image">
                                <img src="<?php echo base_url($value_photo->photo);?>" alt="">
                            </div>
                            <?php } ?> 
                        </div>
                        <div class="row nav-row">
                            <div class="slider-nav">
                                
                                <?php foreach($service_photos as $value_photo) { ?>
                                <div class="nav-image">
                                    <img src="<?php echo base_url($value_photo->photo);?>" alt="">
                                </div>
                                <?php } ?> 
                            </div>
                        </div>
                    </div>
                    <div class="room-details-text">
                        <h3 class="room-details-title"><?= $service_list->name; ?></h3>
                        <?= $service_list->service_details; ?>

                    </div>
                    <div class="social_icon_single">
                        <h3 class="room-details-title"> Share on</h3>
                        <a href="#" class="btn fbtn" title="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('<?php echo current_url();?>'),'facebook-share-dialog','width=626,height=436'); return false;"><i class="fa fa-facebook" style=""></i> Facebook</a>
                        <a href="#" class="btn tbtn" title="Share on Twitter" onclick="javascript:window.open('https://twitter.com/share?text=<?php echo $single_news->title; ?>&amp;url=<?php echo current_url();?>','Twitter-dialog','width=626,height=436'); return false;"><i class="fa fa-twitter"></i> Twitter</a>
                    </div>

                </div>
                <div class="col-lg-3 col-md-4">
                  
                    <div class="sidebar-widget">
                        <div class="c-info-text">
                            <p>If you have any question please don't hesitate to contact us</p>
                        </div>
                        <div class="c-info">
                            <span><i class="zmdi zmdi-phone"></i></span>
                            <span><?= $contact_number->value; ?></span>
                        </div>
                        <div class="c-info">
                            <span><i class="zmdi zmdi-email"></i></span>
                            <span><?= $contact_mail->value; ?></span>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="room-details-title">Most Viewed</h3>
                        
                        <?php foreach($popular_services as $value_popular) { ?>
                        <div class="post-content">
                            <div class="post-img">
                                <a href="<?= base_url('site/accessories-details/'.$value_popular->id); ?>" class="block"><img src="<?php echo base_url($value_popular->photo);?>" alt="" style="width: 85px; height: 70px;"></a>
                            </div>
                            <div class="post-text">
                                <p><a href="<?= base_url('site/accessories-details/'.$value_popular->id); ?>"><?php echo $value_popular->name; ?></a></p>
                                <span style="display: none;">22 Dec, 2019</span>
                            </div>
                            
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Room Details Area End -->
    <!-- Client Area Start -->
    <div class="client-area">
        <div class="container">
            <div class="row">
                <div class="client-carousel">
                    <?php foreach($client_list as $client_value) {?>
                        <div class="single-client">
                            <div class="client-image">
                                <a href="<?php echo base_url();?>site/client">
                                    <img src="<?php echo base_url($client_value->logo);?>" alt="" class="p-img"> 
                                 </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Client Area End -->