    <!-- Background Area Start -->
    <section class="slider-area">
        <div class="slider-wrapper">
            <?php foreach($sliders as $value_slider) {?>
            <div class="single-slide" style="background-image: url('<?php echo base_url($value_slider->photo);?>');">
                <div class="banner-content overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="text-content-wrapper">
                                    <div class="text-content text-center" >
                                        <h1 class="pt-180"><?= $value_slider->title; ?></h1>
                                        <p><?= $value_slider->subtitle; ?></p>
                                        <div class="banner-btn">
                                            <a class="default-btn" href="<?= base_url(); ?>">explore</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?> 
        </div>
    </section>
    <!-- Background Area End -->
    <!-- About Us Area Start -->
    <section class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-form">
                        <div class="form-container fix">
                            <div class="offer_text text-center">
                                 <h1><?= $slider_bottom_title->value; ?></h1>
                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="video-wrapper mt-90">
                        <div class="video-overlay">
                            <img src="<?php echo base_url($aboutus->attatched);?>" alt="">
                        </div> 
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about-text" style="text-align: justify;">
                        <div class="section-title">
                            <a href="<?php echo base_url('site/pages/about');?>"><h3><?= $aboutus->title; ?></h3></a>
                            <?= character_limiter($aboutus->body, 1000); ?>
                        </div>
                        <div class="about-links">
                            <a href="https://www.facebook.com/" target="_blank"><i class="zmdi zmdi-facebook"></i></a>
                            <a href="https://twitter.com/" target="_blank"><i class="zmdi zmdi-twitter"></i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6" style="text-align: justify;">
                    <div class="mission_icon text-center">
                        <img src="<?php echo base_url();?>front_end_assets/img/icon/mission.png" alt="">
                    </div>
                    <div class="mission_text">
                        <a href="<?php echo base_url('site/pages/mission');?>"><h3><?= $mission->title; ?></h3></a>
                        <p><?= character_limiter(strip_tags($mission->body), 300) ?></p> 
                    </div>
                </div>
                <div class="col-lg-6" style="text-align: justify;">
                    <div class="mission_icon text-center">
                        <img src="<?php echo base_url();?>front_end_assets/img/icon/vission.png" alt="">
                    </div>
                    <div class="mission_text">
                        <a href="<?php echo base_url('site/pages/vision');?>"><h3><?= $vision->title; ?></h3></a>
                        <p><?= character_limiter(strip_tags($vision->body), 300) ?></p> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Area End -->
    <!-- Room Area Start -->
    <section class="room-area pt-90">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h3>Most Viewed Decorations</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
            <?php foreach($popular_services as $value_popular) { ?>
            <div class="single-room medium">
                <img src="<?php echo base_url($value_popular->photo);?>" alt="">
                <div class="room-hover text-center">
                    <div class="hover-text">
                        <h3><a href="<?= base_url('site/accessories-details/'.$value_popular->id); ?>"><?= $value_popular->name; ?></a></h3>
                        <p><?= character_limiter(strip_tags($value_popular->service_details), 70); ?></p>
                        <div class="room-btn">
                            <a href="<?= base_url('site/accessories-details/'.$value_popular->id); ?>" class="default-btn">DETAILS</a>
                        </div>
                    </div>
                    <div class="p-amount">
                        <span></span>
                        <span class="count"></span>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </section>
    <!-- Room Area End -->
    <!-- Services Area Start -->
    <section class="services-area ptb-90">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h3>our awesome services</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <!-- Nav tabs -->
                    <ul role="tablist" class="nav nav-tabs">
                    	
                    		<li class="active" role="presentation">
                           		<a data-toggle="tab" role="tab" aria-controls="spa" href="#spa" aria-expanded="true">
                               		<span class="image p-img"><img src="<?php echo base_url();?>front_end_assets/img/icon/spa.png" alt=""></span>
                               		<span class="image s-img"><img src="<?php echo base_url();?>front_end_assets/img/icon/spa-hover.png" alt=""></span>
                                	<span class="title"><?= $servicetab1->title; ?></span>
                                	<span class="text"><?= $servicetab1->body; ?></span>
                               		
                           		</a>

                       		</li>
                        
                        <li role="presentation">
                            <a data-toggle="tab" role="tab" aria-controls="swim" href="#swim" aria-expanded="true">
                                <span class="image p-img"><img src="<?php echo base_url();?>front_end_assets/img/icon/swim.png" alt=""></span>
                                <span class="image s-img"><img src="<?php echo base_url();?>front_end_assets/img/icon/swim-hover.png" alt=""></span>
                                <span class="title"><?= $servicetab2->title; ?></span>
                            	<span class="text"><?= $servicetab2->body; ?></span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a data-toggle="tab" role="tab" aria-controls="restaurant" href="#restaurant" aria-expanded="true">
                                <span class="image p-img"><img src="<?php echo base_url();?>front_end_assets/img/icon/restaurent.png" alt=""></span>
                                <span class="image s-img"><img src="<?php echo base_url();?>front_end_assets/img/icon/restaurent-hover.png" alt=""></span>
                                <span class="title"><?= $servicetab3->title; ?></span>
                            	<span class="text"><?= $servicetab3->body; ?></span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a data-toggle="tab" role="tab" aria-controls="conference" href="#conference" aria-expanded="true">
                                <span class="image p-img"><img src="<?php echo base_url();?>front_end_assets/img/icon/conference.png" alt=""></span>
                                <span class="image s-img"><img src="<?php echo base_url();?>front_end_assets/img/icon/conference-hover.png" alt=""></span>
                                <span class="title"><?= $servicetab4->title; ?></span>
                            	<span class="text"><?= $servicetab4->body; ?></span>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-7">
                    <div class="tab-content">
                        <div id="spa" class="tab-pane active" role="tabpanel">
                            <img src="<?php echo base_url($servicetab1->attatched);?>" alt="" style="width: 100%;height: auto;">
                        </div>
                        <div id="swim" class="tab-pane" role="tabpanel">
                            <img src="<?php echo base_url($servicetab2->attatched);?>" alt="" style="width: 100%;height: auto;">
                        </div>
                        <div id="restaurant" class="tab-pane" role="tabpanel">
                            <img src="<?php echo base_url($servicetab3->attatched);?>" alt="" style="width: 100%;height: auto;">
                        </div>
                        <div id="conference" class="tab-pane" role="tabpanel">
                            <img src="<?php echo base_url($servicetab4->attatched);?>" alt="" style="width: 100%;height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Area End -->

    <!-- Gallery Area Start -->
    <section class="gallery-area pb-90">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h3>our gallery</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery-container">
            <div class="gallery-filter">
                <button data-filter="*" class="active"> All</button>
                <?php foreach($gallery_category as $value_gallery) { ?>
                <button data-filter=".g<?= $value_gallery->id; ?>"><?= $value_gallery->name; ?></button>
                <?php } ?> 
            </div>
            <div class="gallery gallery-masonry">
                <?php foreach($gallery_photos as $value_photo) { ?>
                <div class="gallery-item <?= 'g'.$value_photo->gallery_category_id; ?>">
                    <div class="thumb">
                        <img src="<?php echo base_url($value_photo->path);?>" alt="">
                    </div> 
                </div>
                <?php } ?> 
            </div>
        </div>
    </section>
    <!-- Gallery Area End -->

    <!-- Advertise Area Start -->
    <section class="advertise-area bg-2 overlay-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="advertise-text">
                       <h1><?= $body_title->value; ?></h1>
                        <a href="#" class="default-btn">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Advertise Area End -->
    <!-- Client Area Start -->
    <div class="client-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h3>our valuable client</h3>
                    </div>
                </div>
            </div>
        </div>
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

