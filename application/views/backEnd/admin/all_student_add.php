<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- Horizontal Form -->
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php echo $this->lang->line("student_add"); ?> </h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url("admin/all_student/list"); ?>" class="btn btn-sm bg-red" style="color: white; "><i class="fa fa-list"></i> <?php echo $this->lang->line('student_list') ?> </a>
          </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
          <form action="<?php echo base_url("admin/all_student/add"); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

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
                  <label for="title_one"><?php echo $this->lang->line("phone"); ?></label>
                  <input id="phone" type="text" name="phone" class="form-control" placeholder="<?php echo $this->lang->line("phone"); ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="title_one"><?php echo $this->lang->line("address"); ?></label>
                  <input id="address" type="text" name="address" class="form-control" placeholder="<?php echo $this->lang->line("address"); ?>" required>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="title_one"><?php echo $this->lang->line("skill"); ?></label>
                  <input id="skill" type="text" name="skill" class="form-control" placeholder="<?php echo $this->lang->line("skill"); ?>" required>
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

              <div class="form-group">
                <div class="col-sm-12">
                  <center>
                    <label for="old_photo"><?php echo $this->lang->line("file"); ?></label><br>
                    <img style="height:80px; width:80px;" src="//placehold.it/400x400" id="old_photo"><br>
                    <input id="photo" type="file" name="attached" onchange="readpic2345ture(this)">
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