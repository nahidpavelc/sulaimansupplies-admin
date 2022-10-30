		<!-- Breadcrumb Area Start-->
		<section class="breadcrumb-area overlay-dark-2 bg-3">	
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="breadcrumb-text text-center">
							<h2>our decoration</h2>
							<div class="breadcrumb-bar">
								<ul class="breadcrumb">
									<li><a href="<?= base_url(); ?>">Home</a></li>
									<li>decoration</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Breadcrumb Area End -->
        <!-- Room Area Start -->
        <section class="room-area pt-90 room-grid"> 
            <div class="container">
                <div class="row">

                    <?php foreach($service_list as $service_value) { ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-room">
                            <img src="<?php if(file_exists($service_value->photo)) echo base_url($service_value->photo); else echo base_url('front_end_assets/img/room/10.jpg'); ?>" alt="">
                            <div class="room-hover text-center">
                                <div class="hover-text">
                                    <h3><a href="<?php echo base_url('site/accessories-details/'.$service_value->id);?>"><?= $service_value->name; ?></a></h3>
                                    <div class="p-amount">
                                        <span></span>
                                        <span class="count"></span>
                                    </div>
                                    <div class="room-btn">
                                        <a href="<?php echo base_url('site/accessories-details/'.$service_value->id);?>" class="default-btn">DETAILS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </section>
        <!-- Room Area End -->
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