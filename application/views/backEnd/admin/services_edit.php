<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-teal box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('services_update'); ?> </h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url() ?>admin/services/list" type="submit" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('services_list'); ?> </a>
          </div>
        </div>
        <div class="box-body">

          <div class="row">
            <form action="<?php echo base_url("admin/services/edit/" . $edit_info->id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="col-md-12">
                
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('parent'); ?> *</label>
                      <br>
                      <select name="parent_service_id" required="" class="select2 form-control inner_shadow_teal">
                        <option value="0"><?php echo $this->lang->line('main_service'); ?> </option>
                        <?php foreach ($parent_list as $value_parent) { ?>
                          <option value="<?= $value_parent->id; ?>" <?php if ($edit_info->parent_service_id == $value_parent->id) echo "selected"; ?>><?= $value_parent->name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('services_name'); ?> *</label>
                      <input name="name" placeholder="<?php echo $this->lang->line('services_name'); ?> " class="form-control inner_shadow_teal" required="" type="text" value="<?php echo $edit_info->name; ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('priority'); ?></label><small style="color: gray"> <?php echo $this->lang->line('sorting_will_be_max_to_min'); ?></small>
                      <input name="priority" placeholder="<?php echo $this->lang->line('priority'); ?>" class="form-control inner_shadow_teal" type="number" value="<?php echo $edit_info->priority; ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <label><?php echo $this->lang->line('services_details'); ?> *</label>
                      <textarea name="service_details" rows="1" required="" class="form-control inner_shadow_teal "><?php echo $edit_info->service_details; ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-12" >
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <center>
                                                    <label class="col-sm-4" style= "padding-top: 50px;"><?php echo $this->lang->line('services_photo'); ?></label>
                                                    <input class="col-sm-4" style= "padding-top: 50px;" type="file" name="photo" onchange="readpicture(this);">
                                                    <div class="col-md-4">
                                                        <img id="service_picture_change" class="img-responsive" src="<?php if (isset($service_photo->photo) && file_exists($service_photo->photo)) echo base_url($service_photo->photo);
                                                                                                                      else echo '//placehold.it/400x400'; ?>" alt="profile picture" style="max-width: 120px;"><small style="color: gray">width : 400px, Height : 400px</small>
                                                    </div>
                                                    <br> 
                                                </center>
                                            </div>
                                        </div>
                                    </div> -->


              </div>

              <div class="col-md-12">
                <center>
                  <button type="reset" class="btn btn-sm btn-danger"><?php echo $this->lang->line('cancel'); ?></button>
                  <button type="submit" class="btn btn-sm bg-teal"><?php echo $this->lang->line('update'); ?></button>
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
  <?php if ($edit_info->parent_service_id != "0") { ?>
    <div class="row">
      <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-teal box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $this->lang->line('services_photo_update'); ?> </h3>

          </div>
          <div class="box-body">

            <div class="row">
              <form action="<?php echo base_url("admin/service_photo/add"); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="box box-primary box-solid">
                      <div class="box-header"> <label> <?php echo $this->lang->line('services_photo') ?> </label> </div>
                      <div class="box-body box-profile">
                        <center>
                          <img id="service_picture_change" class="img-responsive" src="//placehold.it/400x400" alt="profile picture" style="max-width: 120px;">
                          <small style="color: gray">(Width:400px; Height: 400Px)</small>
                          <br>
                          <input type="file" name="photo" onchange="readpicture(this);">

                          <input type="hidden" name="service_id" value="<?php echo $edit_info->id; ?>">
                        </center>
                      </div>
                    </div>
                  </div>

                  <?php

                  foreach ($service_photo_list as $value) {
                  ?>
                    <div class="col-md-3">
                      <!-- Profile Image -->
                      <div class="box box-primary box-solid">
                        <div class="box-header"> <label> <?php echo $this->lang->line('services_photo') ?> </label> </div>
                        <div class="box-body box-profile">
                          <center>
                            <img class="img-responsive" src="<?php if (isset($value->photo) && file_exists($value->photo)) echo base_url($value->photo);
                                                              else echo '//placehold.it/400x400'; ?>" alt="profile picture" style="max-width: 120px;">
                            <small style="color: gray">(Width:400px; Height: 400Px)</small>
                            <br>
                            <a href="<?php echo base_url('admin/service_photo/delete/' . $value->id . '/' . $edit_info->id); ?>" class="btn btn-sm btn-danger" onclick='return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
                          </center>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>

                <div class="col-md-12">
                  <center>
                    <button type="reset" class="btn btn-sm btn-danger"><?php echo $this->lang->line('cancel'); ?></button>
                    <button type="submit" class="btn btn-sm bg-teal"><?php echo $this->lang->line('update'); ?></button>
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
  <?php } ?>

</section>
<script>
  // profile picture change
  function readpicture(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#service_picture_change')
          .attr('src', e.target.result)
          .width(100)
          .height(100);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script>
  CKEDITOR.replace('service_details');
</script>