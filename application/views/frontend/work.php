		<!-- Breadcrumb Area Start-->
		<section class="breadcrumb-area overlay-dark-2 bg-3">	
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="breadcrumb-text text-center">
							<h2>our works</h2>
							<div class="breadcrumb-bar">
								<ul class="breadcrumb">
									<li><a href="index.html">Home</a></li>
									<li>our work</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Breadcrumb Area End -->
        <!-- Team Area Start -->
        <section class="team-area pt-90 team-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h3>our works</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="single-location">
                            <div class="location-image">
                                <a href="#"><img src="<?php echo base_url();?>front_end_assets/img/location/1.jpg" alt="" class="img-responsive"></a>
                            </div>
                            <div class="location-text">
                                <h3><a href="#">Near Place Dummy Title</a></h3>
                                <div class="address-distance fix">
                                    <span>East Road, London</span>
                                    <span>1 kilometers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-location">
                            <div class="location-image">
                                <a href="#"><img src="<?php echo base_url();?>front_end_assets/img/location/2.jpg" alt="" class="img-responsive"></a>
                            </div>
                            <div class="location-text">
                                <h3><a href="#">Paris Rail Day Trip</a></h3>
                                <div class="address-distance fix">
                                    <span>Montan Road, Paris</span>
                                    <span>10 kilometers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-location">
                            <div class="location-image">
                                <a href="#"><img src="<?php echo base_url();?>front_end_assets/img/location/3.jpg" alt="" class="img-responsive"></a>
                            </div>
                            <div class="location-text">
                                <h3><a href="#">London Eye Ticket with Skip</a></h3>
                                <div class="address-distance fix">
                                    <span>Jorge Street, London</span>
                                    <span>6 kilometers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-location">
                            <div class="location-image">
                                <a href="#"><img src="<?php echo base_url();?>front_end_assets/img/location/4.jpg" alt="" class="img-responsive"></a>
                            </div>
                            <div class="location-text">
                                <h3><a href="#">Warner Bros. Studio Tour</a></h3>
                                <div class="address-distance fix">
                                    <span>2/16, kmiue, London</span>
                                    <span>30 kilometers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-location">
                            <div class="location-image">
                                <a href="#"><img src="<?php echo base_url();?>front_end_assets/img/location/5.jpg" alt="" class="img-responsive"></a>
                            </div>
                            <div class="location-text">
                                <h3><a href="#">Madame Tussauds London</a></h3>
                                <div class="address-distance fix">
                                    <span>Park Street, London</span>
                                    <span>21 kilometers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-location">
                            <div class="location-image">
                                <a href="#"><img src="<?php echo base_url();?>front_end_assets/img/location/6.jpg" alt="" class="img-responsive"></a>
                            </div>
                            <div class="location-text">
                                <h3><a href="#">Thames Hop-On Hop-Off </a></h3>
                                <div class="address-distance fix">
                                    <span>Frter Road, London</span>
                                    <span>30 kilometers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team Area End -->
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