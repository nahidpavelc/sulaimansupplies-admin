<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"> <?php echo $this->lang->line('work_add'); ?> </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>admin/our-work/list" type="submit" class="btn bg-red btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('work_list'); ?> </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form action="<?php echo base_url("admin/our-work/add");?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="col-md-9">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('work_title'); ?> *</label>
                                            <input name="title" placeholder="<?php echo $this->lang->line('work_title'); ?>" required="" class="form-control inner_shadow_green" type="text" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('client_name'); ?> *</label>
                                            <select class="form-control select2" name="client_id"  required="" >
                                                <option value="" selected ><?php echo $this->lang->line('select_client'); ?></option>
                                                <?php foreach ($client_list as $value) { ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->client_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="box box-success box-solid">
                                    <div class="box-header"> <label> <?php echo $this->lang->line('work_photo'); ?> </label> </div>
                                    <div class="box-body box-profile">
                                        <center>
                                            <img id="work_photo_change" class="img-responsive" src="//placehold.it/370x208" alt="profile picture" style="max-width: 120px;"><small style="color: gray">width : 370px, Height : 208px</small>
                                            <br>
                                            <input type="file" name="photo" onchange="readpicture(this);">
                                        </center>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                                
                            </div>
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm bg-red"><?php echo $this->lang->line('reset') ?></button>
                                    <button type="submit" class="btn btn-sm btn-success"><?php echo $this->lang->line('save') ?></button>
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
    
          reader.onload = function (e) {
            $('#work_photo_change')
            .attr('src', e.target.result)
            .width(370)
            .height(68);
        };
    
        reader.readAsDataURL(input.files[0]);
    }
    }
    
</script>



    
