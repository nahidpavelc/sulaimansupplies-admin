    <!-- Breadcrumb Area Start-->
    <section class="breadcrumb-area overlay-dark-2 bg-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumb-text text-center">
              <h2><?= $page_info->title; ?></h2>
              <div class="breadcrumb-bar">
                <ul class="breadcrumb">
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li> <?= $page_info->title; ?> </li>
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
          <div class="col-lg-12">
            <div class="common_header text-center">
              <h2><?= $page_info->title; ?></h2>
            </div>
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="common_text text-justify">
              <p><img src="<?php echo base_url($page_info->attatched); ?>" alt=""><?= $page_info->body; ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Room Details Area End -->
    <!-- Client Area Start -->
    <div class="client-area">
      <div class="container">
        <div class="row" style="min-height: 150px; margin-top: 70px;">
          <div class="client-carousel">

            <?php foreach ($client_list as $client_value) { ?>
              <div class="single-client">
                <div class="client-image">
                  <a href="<?php echo base_url(); ?>site/client">
                    <img src="<?php echo base_url($client_value->logo); ?>" alt="" class="p-img">
                  </a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Client Area End -->