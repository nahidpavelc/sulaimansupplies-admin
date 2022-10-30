<?php

$service_menu            = $this->db->select('id, name')->where('parent_service_id', '0')->order_by('priority', 'desc')->get('tbl_services')->result();
$about_article           = $this->db->select('body')->where('name', 'about')->get('tbl_common_pages')->row()->body;
$facebook_link           = $this->db->select('value')->where('name', 'facebook_link')->get('tbl_general')->row()->value;
$twitter_link            = $this->db->select('value')->where('name', 'twitter_link')->get('tbl_general')->row()->value;
$contact_number          = $this->db->select('value')->where('name', 'contact_number')->get('tbl_general')->row()->value;
$contact_mail            = $this->db->select('value')->where('name', 'contact_mail')->get('tbl_general')->row()->value;
$contact_address         = $this->db->select('value')->where('name', 'address')->get('tbl_general')->row()->value;

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title><?php echo (isset($share_title))? $share_title : 'Sulaiman Est - For Hotels Supplies' ;?> </title>
    
    <meta property="og:type"          content="article" />  
    <meta property="og:url"           content="<?php echo current_url(); ?>" />

    <meta property="og:title"         content="<?php if(isset($share_title)) echo $share_title; else echo 'Sulaiman Est - For Hotels Supplies'; ?>" />
    <meta property="og:image"         content="<?php if(isset($share_image)) echo base_url().$share_image; else echo base_url('front_end_assets/img/share_logo.jpg'); ?>" />
    <meta property="og:description"   content="<?php if(isset($share_description)) echo substr(preg_replace("/[A-Za-z0-9]|\"|\'|\=|<|>|;|,|:|&|$|#|-|\//",'',$share_description),0,350); else echo 'Sulaiman Est - For Hotels Supplies'; ?>" />
    <meta property="fb:app_id" content="673983353503112" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />

    <meta name="author" content="hrsoftbd" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@SulaimanEst" />
    <meta name="twitter:creator" content="@SulaimanEst" />
    <meta name="twitter:url" content="<?php echo current_url(); ?>" />
    <meta name="twitter:title" content="<?php if(isset($share_title)) echo $share_title; else echo 'Sulaiman Est - For Hotels Supplies'; ?>" />
    <meta name="twitter:description" content="<?php if(isset($share_description)) echo substr(preg_replace("/[A-Za-z0-9]|\"|\'|\=|<|>|;|,|:|&|$|#|-|\//",'',$share_description),0,350); else echo 'Sulaiman Est - For Hotels Supplies'; ?>" />
    <meta name="twitter:image" content="<?php if(isset($share_image)) echo base_url().$share_image; else echo base_url('front_end_assets/images/share_logo.jpg'); ?>" />

    <meta prperty="title" content="<?php if(isset($share_title)) echo $share_title; else echo 'Sulaiman Est - For Hotels Supplies'; ?>" />

    <meta name="robots" content="all" />
    <meta name="googlebot" content="all" />
    <meta name="googlebot-news" content="all" />
    <meta http-equiv="developer" content="Powered by : HRSOFT BD Web address : http://www.hrsoftbd.com Address : 12/6, Solimullah Road, Mohammadpur, Dhaka (Support Center). 48, Kazi Nazrul Islam Avenue, Karwan Bazar, Dhaka-1215, Bangladesh (Corporate Office)" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <meta name="keywords" content="Sulaiman Est - For Hotels Supplies, saudi, ksa, soudi hotel design, hotel bedsheet, hotel need" />

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>front_end_assets/img/logo/favicon.jpg">

    <!-- All css here -->
    <link rel="stylesheet" href="<?php echo base_url();?>front_end_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>front_end_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>front_end_assets/css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="<?php echo base_url();?>front_end_assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>front_end_assets/css/responsive.css">
    <script src="<?php echo base_url();?>front_end_assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="fb-root"></div>
        <script>
            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=379091142611138";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    <!-- Header Area Start -->
    <header class="header-area fixed header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <div class="logo">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>front_end_assets/img/logo/logo.png" alt="Oestin"></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-8 col-sm-8 hidden-xs">
                    <div class="header-top fix">
                        <div class="header-contact">
                            <span class="text-theme">Contact:</span>
                            <span><?= $contact_number; ?></span>
                        </div>
                        <div class="header-links">
                            <a href="<?= $facebook_link;?>" target="_blank"><i class="zmdi zmdi-facebook"></i></a>
                            <a href="<?= $twitter_link;?>" target="_blank"><i class="zmdi zmdi-twitter"></i></a>
                            
                        </div>
                    </div>
                    <!-- Mainmenu Start -->
                    <div class="main-menu hidden-xs">
                        <nav>
                            <ul>
                                <li><a href="<?php echo base_url();?>">HOME</a></li>
                                <li><a href="#">OUR PRODUCT</a>
                                    <ul class="submenu">
                                        
                                        <?php foreach($service_menu as $value_menu) { ?>
                                        <li><a href="<?php echo base_url('site/product/'.$value_menu->id);?>"><?= $value_menu->name; ?></a></li>
                                        <?php } ?>
                                        
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url();?>site/gallery">GALLERY</a></li>
                                <li><a href="<?php echo base_url();?>site/pages/about">ABOUT US</a></li>
                                <li><a href="<?php echo base_url();?>site/contact">CONTACT</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Mainmenu End -->
                </div>
            </div>
        </div>
        <!-- Mobile Menu Area start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="<?php echo base_url();?>">HOME</a></li>
                                    <li><a href="#">OUR PRODUCT</a>
                                        <ul class="submenu">
                                            
                                            <?php foreach($service_menu as $value_menu) { ?>
                                            <li><a href="<?php echo base_url('site/product/'.$value_menu->id);?>"><?= $value_menu->name; ?></a></li>
                                            <?php } ?>
                                            
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url();?>site/gallery">GALLERY</a></li>
                                    <li><a href="<?php echo base_url();?>site/pages/about">ABOUT US</a></li>
                                    <li><a href="<?php echo base_url();?>site/contact">CONTACT</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu Area end -->
    </header>
    <!-- Header Area End -->

    <?php $this->load->view($content);?>


    <!-- Footer Area Start -->
    <footer class="footer-area">
        <!-- Footer Widget Start -->
        <div class="footer-widget-area bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-footer-widget">
                            <div class="footer-logo">
                                <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>front_end_assets/img/logo/footer-logo.png" alt="sulaimansupplies"></a>
                            </div>
                            <p><?= character_limiter(strip_tags($about_article), 200);?></p>
                            <div class="social-icons">
                                <a href="<?= $facebook_link;?>" target="_blank"><i class="zmdi zmdi-facebook"></i></a>
                                <a href="<?= $twitter_link;?>" target="_blank"><i class="zmdi zmdi-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-footer-widget">
                            <h3>contact us</h3>
                            <div class="c-info" style="min-height: 48px;">
                                <span><i class="zmdi zmdi-pin"></i></span>
                                <span><?php echo $contact_address; ?> </span>
                            </div>
                            <div class="c-info" style="min-height: 48px;">
                                <span><i class="zmdi zmdi-email"></i></span>
                                <span> <?= $contact_mail; ?></span>
                            </div>
                            <div class="c-info" style="min-height: 48px;">
                                <span><i class="zmdi zmdi-phone"></i></span>
                                <span> <?= $contact_number; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 hidden-md hidden-sm col-xs-12">
                        <div class="single-footer-widget">
                            <h3>quick links</h3>
                            <ul class="footer-list">
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><a href="<?php echo base_url('site/pages/about');?>">About us</a></li>
                                <li><a href="<?php echo base_url('site/pages/mission');?>">Our Mission</a></li>
                                <li><a href="<?php echo base_url('site/pages/vision');?>">Our Vision</a></li>
                                <li><a href="<?php echo base_url();?>site/gallery">Gallery</a></li>
                                <li><a href="<?php echo base_url();?>site/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="single-footer-widget">
                            <h3>facebook</h3>
                            <div class="instagram-image">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSulaimansupplies-106058121261191&tabs&width=380&height=180&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="380" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Widget End -->
        <!-- Footer Bottom Area Start -->
        <div class="footer-bottom-area bg-black">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-text">
                            <span>Copyright © 2020 <a href="http://sulaimansupplies.com">Sulaiman Est.</a> All Right Reserved.</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-text text-right">
                            <span>Design and Develop By <a href="http://hrsoftbd.com">HRSOFTBD</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom Area End -->
    </footer>
    <!-- Footer Area End -->

    <!-- All js here -->
    <script src="<?php echo base_url();?>front_end_assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/ajax-mail.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/jquery.meanmenu.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/plugins.js"></script>
    <script src="<?php echo base_url();?>front_end_assets/js/main.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSLSFRa0DyBj9VGzT7GM6SFbSMcG0YNBM"></script>
    <script src="https://www.google.com/jsapi"></script>
    <script>
        function initialize() {
          var mapOptions = {
            zoom: 15,
            scrollwheel: false,
            center: new google.maps.LatLng(23.763494, 90.432226)
          };

          var map = new google.maps.Map(document.getElementById('googleMap'),
              mapOptions);


          var marker = new google.maps.Marker({
            position: map.getCenter(),
            animation:google.maps.Animation.BOUNCE,
            icon: 'img/map-marker.png',
            map: map
          });
            
        }
            
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    
</body>

</html>