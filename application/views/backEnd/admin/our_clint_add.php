<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-danger box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('clint_add'); ?> </h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url() ?>admin/our-clint/list" type="submit" class="btn bg-green btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('clint_list'); ?> </a>
          </div>
        </div>
        <div class="box-body">

          <div class="row">
            <form action="<?php echo base_url("admin/our-clint/add"); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

              <div class="col-md-9">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('clint_name'); ?> *</label>
                      <input name="name" placeholder="<?php echo $this->lang->line('clint_name'); ?> " class="form-control inner_shadow_red" required="" type="text">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('priority'); ?></label> <small style="color: gray"><?php echo $this->lang->line('sorting_will_be_max_to_min'); ?></small>
                      <input name="priority" placeholder="<?php echo $this->lang->line('priority'); ?>" class="form-control inner_shadow_red" type="number">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-danger box-solid">
                  <div class="box-header"> <label> <?php echo $this->lang->line('clint_logo'); ?> </label> </div>
                  <div class="box-body box-profile">
                    <center>
                      <img id="clint_picture_change" class="img-responsive" src="//placehold.it/140x40" alt="profile picture" style="max-width: 120px;"><small style="color: gray">width : 140px, Height : 40px</small>
                      <br>
                      <input type="file" name="logo" onchange="readpicture(this);">
                    </center>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->

              </div>
              <div class="col-md-12">
                <center>
                  <button type="reset" class="btn btn-sm btn-danger"><?php echo $this->lang->line('reset'); ?></button>
                  <button type="submit" class="btn btn-sm bg-green"><?php echo $this->lang->line('save'); ?></button>
                </center>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (right) -->
  </div>
</section>
<script>
  // profile picture change
  function readpicture(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#clint_picture_change')
          .attr('src', e.target.result)
          .width(140)
          .height(40);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>