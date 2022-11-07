<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo $this->lang->line("user_add"); ?> </h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url("admin/all_user/list"); ?>" class="btn btn-sm bg-red" style="color: white; "><i class="fa fa-list"></i> <?php echo $this->lang->line('all_user_list') ?> </a>
          </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <form action="<?php echo base_url("admin/all_user/add"); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

            <div class="col-md-5">
              <div class="form-group">
                <div class="col-sm-12">
                  <label for="title_one"><?php echo $this->lang->line("name"); ?></label>
                  <input id="name" type="text" name="name" class="form-control" placeholder="<?php echo $this->lang->line("name"); ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="title_one"><?php echo $this->lang->line("email"); ?></label>
                  <input id="email" type="email" name="email" class="form-control" placeholder="<?php echo $this->lang->line("email"); ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="title_one"><?php echo $this->lang->line("status"); ?></label>
                  <select name="status" id="" class="form-control select2" style="widows: 100%;">
                    <option value="Yes"><?php echo $this->lang->line("yes"); ?></option>
                    <option value="No"><?php echo $this->lang->line("no"); ?></option>
                  </select>
                </div>
              </div>

              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"> <?php echo $this->lang->line("user_add"); ?> </h3>
                  <div class="box-tools pull-right">
                    <a href="<?php echo base_url("admin/all_user/list"); ?>" class="btn btn-sm bg-red" style="color: white; "><i class="fa fa-list"></i> <?php echo $this->lang->line('all_user_list') ?> </a>
                  </div>
                </div>
              </div>

                <div class="form-group">
                  <div class="col-sm-6">
                    <center>
                      <img style="height:100px; width:100px; margin-bottom:10px;" src="<?php echo base_url('assets/upload.png') ?>" id="old_photo1"><br>
                      <small>width : 400px, Height : 400px</small>

                      <input id="photo_1" type="file" name="photo_1" onchange="readpicture1(this)">
                    </center>
                  </div>
                  <div class="col-sm-6">
                    <center>
                      <img style="height:100px; width:100px; margin-bottom:10px;" src="<?php echo base_url('assets/upload.png') ?>" id="old_photo2"><br>
                      <small>width : 400px, Height : 400px</small>

                      <input id="photo_2" type="file" name="photo_2" onchange="readpicture2(this)">
                    </center>
                  </div>
                </div>

              </div>
              <div class="col-md-7">
                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="body"><?php echo $this->lang->line("description"); ?></label>
                    <textarea id="body" name="description" class="form-control"></textarea>
                  </div>
                </div>
              </div>


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
  function readpicture1(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#old_photo1')
          .attr('src', e.target.result)
          .width(100)
          .height(100);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  function readpicture2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#old_photo2')
          .attr('src', e.target.result)
          .width(100)
          .height(100);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>