    <!-- Breadcrumb Area Start-->
    <section class="breadcrumb-area overlay-dark-2 bg-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumb-text text-center">
              <h2>All of Our Client </h2>
              <div class="breadcrumb-bar">
                <ul class="breadcrumb">
                  <li><a href="index.html">Home</a></li>
                  <li>Our Client</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Area End -->

    <section>
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
    </section>

    <style>
      .client_img {
        margin-top: 25px;
      }
    </style>