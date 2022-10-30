
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-teal box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('services_add'); ?>  </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>admin/services/list" type="submit" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('services_list'); ?>  </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form action="<?php echo base_url("admin/services/add");?>" method="post" enctype="multipart/form-data" class="form-horizontal">  
                            <div class="col-md-12">
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label><?php echo $this->lang->line('parent'); ?> *</label>
                                                <br>
                                                <select name="parent_service_id" required="" class="select2 form-control inner_shadow_teal">
                                                    <option value="0" ><?php echo $this->lang->line('main_service'); ?> </option>
                                                    <?php foreach($parent_list as $value_parent){ ?>
                                                    <option value="<?= $value_parent->id; ?>"><?= $value_parent->name; ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label><?php echo $this->lang->line('services_name'); ?> *</label>
                                                <input name="name" placeholder="<?php echo $this->lang->line('services_name'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label><?php echo $this->lang->line('priority'); ?></label> <small style="color: gray"><?php echo $this->lang->line('sorting_will_be_max_to_min'); ?></small>
                                                <input name="priority" placeholder="<?php echo $this->lang->line('priority'); ?>" class="form-control inner_shadow_teal" type="number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label><?php echo $this->lang->line('services_details'); ?> *</label>
                                                <textarea name="service_details" rows="3" required="" class="form-control inner_shadow_teal "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <center>
                                                    <label class="col-sm-4" style= "padding-top: 50px;"><?php echo $this->lang->line('services_photo'); ?></label>
                                                    <input class="col-sm-4" style= "padding-top: 50px;" type="file" name="photo" onchange="readpicture(this);">
                                                    <div class="col-md-4">
                                                        <img id="service_photo_change" class="img-responsive" src="//placehold.it/400x400" alt="profile picture" style="max-width: 120px;"><small style="color: gray">width : 400px, Height : 400px</small>
                                                    </div>
                                                    <br> 
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                               
                                
                            </div>
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm btn-danger"><?php echo $this->lang->line('reset'); ?></button>
                                    <button type="submit" class="btn btn-sm bg-teal"><?php echo $this->lang->line('save'); ?></button>
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
                $('#service_photo_change')
                .attr('src', e.target.result)
                .width(100)
                .height(100);
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>
<script>
    CKEDITOR.replace( 'service_details' );
</script>
