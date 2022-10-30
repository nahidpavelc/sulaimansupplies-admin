		<!-- Breadcrumb Area Start-->
		<section class="breadcrumb-area overlay-dark-2 bg-3">	
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="breadcrumb-text text-center">
							<h2>Gallery</h2>
							<div class="breadcrumb-bar">
								<ul class="breadcrumb">
									<li><a href="<?= base_url(); ?>">Home</a></li>
									<li>Galley</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Breadcrumb Area End -->
        <!-- Gallery Area Start -->
        <section class="gallery-area pb-90 pt-60">
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