<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success box-solid">
        <div class="box-header">
          <h3 class="box-title"><?php echo $this->lang->line("all_user_list"); ?></h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url("admin/all_user/add"); ?>" class="btn btn-sm bg-red" style="color: white; "><i class="fa fa-plus"></i> <?php echo $this->lang->line('user_add') ?> </a>
          </div>
        </div>
        <div class="box-body">


          <table class="table table-bordered table-striped table_th_success">
            <thead>
              <tr>
                <th style="background: #85c2c1; border: 1px solid #85c2c1; width: 5%;"><?php echo $this->lang->line("sl"); ?> </th>
                <th style="background: #85c2c1; border: 1px solid #85c2c1; width: 5%;"><?php echo $this->lang->line("photo1"); ?> </th>
                <th style="background: #85c2c1; border: 1px solid #85c2c1; width: 5%;"><?php echo $this->lang->line("photo2"); ?> </th>
                <th style="background: #85c2c1; border: 1px solid #85c2c1; width: 17;"><?php echo $this->lang->line("name"); ?> </th>
                <th style="background: #85c2c1; border: 1px solid #85c2c1; width: 10;"><?php echo $this->lang->line("email"); ?></th>



                <th style="background: #85c2c1; border: 1px solid #85c2c1; width: 10%;"><?php echo $this->lang->line("action"); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sl = 1;
              foreach ($table_info as $value) {
              ?>
                <tr>
                  <td><?php echo $sl++; ?></td>
                  <td>
                    <img src="<?php if (file_exists($value['attached'])) echo base_url($value['attached']);
                              else echo base_url('assets/upload.png') ?>" alt="" style="width:50px;height:50px">
                  </td>
                  <td>
                    <img src="<?php if (file_exists($value['attached'])) echo base_url($value['attached']);
                              else echo base_url('assets/upload.png') ?>" alt="" style="width:50px;height:50px">
                  </td>
                  <!-- <td><img src="<?php echo $data['attached']; ?>" /></td> -->
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <!-- <?php echo character_limiter(strip_tags($value->service_details), 200); ?>  -->
                  <td>
                    <a href="<?php echo base_url() . 'admin/all_student/edit/' . $value['id']; ?>" class="btn btn-sm bg-green"><i class="fa fa-edit"></i></a>

                    <a href="<?php echo base_url() . 'admin/all_student/delete/' . $value['id']; ?>" class="btn btn-sm btn-danger" onclick='return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
                  </td>

                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>


</section>

<script type="text/javascript">
  $(function() {
    $("#userListTable").DataTable();
  });
</script>