<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-picture-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><?php echo $this->lang->line('total_slider'); ?></span>
          <span class="info-box-number"><?= $total_slider; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-group"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><?php echo $this->lang->line('total_client'); ?></span>
          <span class="info-box-number"><?= $total_client; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-list-ol"></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><?php echo $this->lang->line('total_service'); ?></span>
          <span class="info-box-number"><?= $total_service; ?> </span>
          <span class="info-box-text " style=" font-size: x-small; color: blue; "></span>

        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-clock-o "></i></span>

        <div class="info-box-content">
          <span class="info-box-text"><?php echo $this->lang->line('total_work'); ?></span>
          <span class="info-box-number"><?= $total_work; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>