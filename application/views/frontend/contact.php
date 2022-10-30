		<!-- Breadcrumb Area Start-->

		<section class="breadcrumb-area overlay-dark-2 bg-3">	

			<div class="container">

				<div class="row">

					<div class="col-md-12">

						<div class="breadcrumb-text text-center">

							<h2>Contact Us</h2>

							<div class="breadcrumb-bar">

								<ul class="breadcrumb">

									<li><a href="index.html">Home</a></li>

									<li>Contact Us</li>

								</ul>

							</div>

						</div>

					</div>

				</div>

			</div>

		</section>

		<!-- Breadcrumb Area End -->



        <!-- Contact Form Area Start -->

        <section class="contact-form-area pt-90">

            <div class="container">

                <div class="row">

                    <div class="col-md-4">

                        <h4 class="contact-title">contact info</h4>

                        <div class="contact-text">

                            <p><span class="c-icon"><i class="zmdi zmdi-phone"></i></span><span class="c-text"><?= $contact_number->value; ?></span></p>

                            <p><span class="c-icon"><i class="zmdi zmdi-email"></i></span><span class="c-text"><?= $contact_mail->value; ?></span></p>

                            <p><span class="c-icon"><i class="zmdi zmdi-pin"></i></span><span class="c-text"><?= $address->value;?></span></p>

                        </div>

                        <h3>Social Media</h3>

                        <div class="link-social" style="margin-top: 10px;">

                                <a href="<?= $facebook_link->value;?>" target="_blank"> <i class="zmdi zmdi-facebook"></i></a>

                                <a href="<?= $twitter_link->value;?>" target="_blank"><i class="zmdi zmdi-twitter"></i></a>

                        </div>

                    </div>

                    <div class="col-md-8">

                    <!-- Google Map Area Start -->

                       <div id="contacts" class="map-area">

                        <div id="googleMap" style="width:100%;height:300px;filter: grayscale(100%);-webkit-filter: grayscale(100%);"></div>

                      </div>

                    <!-- Google Map Area End -->

                    </div>

                </div>

            </div>

        </section>

        <!-- Contact Form Area End -->

        <!-- Client Area Start -->

        <div class="client-area">

            <div class="container">

                <div class="row" style="min-height: 100px; margin-top: 70px;">

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