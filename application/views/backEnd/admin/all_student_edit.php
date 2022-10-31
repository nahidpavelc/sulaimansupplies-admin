<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo $this->lang->line("student_edit"); ?> </h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url("admin/all_student/list"); ?>" class="btn btn-sm bg-red" style="color: white; "><i class="fa fa-list"></i> <?php echo $this->lang->line('student_list') ?> </a>
          </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <form action="<?php echo base_url("admin/all_student/edit/" . $table_info->id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="col-md-5">

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="title_one"><?php echo $this->lang->line("name"); ?></label>
                  <input value="<?php echo $table_info->name; ?>" id="name" type="text" name="name" class="form-control" placeholder="<?php echo $this->lang->line("name"); ?>" required>
                </div>
              </div>


              <div class="form-group">
                <div class="col-sm-12">
                  <label for="title_one"><?php echo $this->lang->line("email"); ?></label>
                  <input id="email" type="email" name="email" class="form-control" placeholder="<?php echo $this->lang->line("email"); ?>" required min="1" value="<?php echo $table_info->email; ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="title_one"><?php echo $this->lang->line("phone"); ?></label>
                  <input id="phone" type="text" name="phone" class="form-control" placeholder="<?php echo $this->lang->line("phone"); ?>" required min="1" value="<?php echo $table_info->phone; ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="title_one"><?php echo $this->lang->line("address"); ?></label>
                  <input id="address" type="text" name="address" class="form-control" placeholder="<?php echo $this->lang->line("address"); ?>" required min="1" value="<?php echo $table_info->address; ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="title_one"><?php echo $this->lang->line("skill"); ?></label>
                  <input id="skill" type="text" name="skill" class="form-control" placeholder="<?php echo $this->lang->line("skill"); ?>" required min="1" value="<?php echo $table_info->skill; ?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="title_one"><?php echo $this->lang->line("status"); ?></label>
                  <select name="status" id="" class="form-control select2" style="widows: 100%;">
                    <option value="1"><?php echo $this->lang->line("yes"); ?></option>
                    <option value="0"><?php echo $this->lang->line("no"); ?></option>
                  </select>
                </div>
              </div>

              <center>
                <div class="form-group">
                  <div class="col-sm-12">

                    <label for="old_photo"><?php echo $this->lang->line("old_file"); ?></label><br>
                    <?php
                    $file_parts = pathinfo($table_info->attached);
                    if (file_exists($table_info->attached)) {
                      if ($file_parts['extension'] != "pdf") {

                    ?>
                        <img style="height:80px; width:80px; margin:10px;" src="<?php echo base_url($table_info->attached); ?>" id="old_photo"><br>
                      <?php
                      } else {

                      ?>
                        <object style="height:500px;" data="<?php echo base_url($table_info->attached); ?>" type="application/pdf" width="100%">
                        </object><br>
                    <?php }
                    } ?>

                    <input id="photo" type="file" name="attached" onchange="readpicture(this)">

                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="photo"><?php echo $this->lang->line("file_attached"); ?></label>
                  </div>
                </div>
              </center>

              <!-- <div class="form-group">
                <div class="col-sm-12">
                  <label><?php echo $this->lang->line('status'); ?> *</label>
                  <br>
                  <select name="status" required="" class="select2 form-control inner_shadow_teal">
                    <option value="0"><?php echo $this->lang->line('status'); ?> </option>

                    <?php foreach ($status as $value_parent) { ?>
                      <option value="<?= $value_parent->id; ?>" <?php if ($edit_info->parent_service_id == $value_parent->id) echo "selected"; ?>> <?= $value_parent->name; ?></option>
                    <?php } ?>

                  </select>
                </div>
              </div> -->
            </div>

            <div class="col-md-7">
              <div class="form-group">
                <div class="col-sm-12">
                  <label for="body"><?php echo $this->lang->line("description"); ?></label>
                  <textarea id="body" name="description" class="form-control"><?php echo $table_info->description; ?></textarea>
                </div>
              </div>
            </div>

            <!-- 2nd File Upload -->
            <!-- <div class="form-group">
              <div class="col-sm-12">
                <center>
                  <label for="photo"><?php echo $this->lang->line("old_file"); ?></label><br>
                  <?php
                  $file_parts = pathinfo($table_info->attached);
                  if (file_exists($table_info->attached)) {
                    if ($file_parts['extension'] != "pdf") {
                  ?>
                      <img style="height:80px; width:80px;" src="<?php echo base_url($table_info->attached); ?>" id="photo"><br>
                    <?php
                    } else {
                    ?>
                      <object style="height:500px;" data="<?php echo base_url($table_info->attached); ?>" type="application/pdf" width="100%">
                      </object><br>
                  <?php }
                  } ?>
                  <input id="photo" type="file" name="attached" onchange="readpicture(this)">
                </center>
              </div>
            </div> -->

            <!-- 3rd Profile Image  -->
            <!-- <div class="col-md-12"> -->
            <!-- Profile Image -->
            <!-- <div class="box box-danger box-solid"> -->
            <!-- <div class="box-header"> <label> <?php echo $this->lang->line('old_file'); ?> </label> </div> -->
            <!-- <div class="box-body box-profile"> -->
            <!-- <center> -->
            <!-- <img id="clint_picture_change" class="img-responsive" src="<?php echo base_url($edit_info->attachment); ?>" alt="profile picture" style="max-width: 120px;"><small style="color: gray">width : 140px, Height : 40px</small> -->
            <!-- <br> -->
            <!-- <input type="file" name="logo" onchange="readpicture(this);"> -->
            <!-- </center> -->
            <!-- </div> -->
            <!-- /.box-body -->
            <!-- </div> -->
            <!-- /.box -->
            <!-- </div> -->



            <div class="col-md-12">
              <center>
                <button type="reset" class="btn btn-sm bg-red"><?php echo $this->lang->line("cancel"); ?></button>
                <button type="submit" class="btn btn-sm bg-green "><?php echo $this->lang->line("save"); ?></button>
              </center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  CKEDITOR.replace('body');
</script>

<script>
  // profile picture change
  function readpicture(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#old_photo')
          .attr('src', e.target.result)
          .width(100)
          .height(100);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>