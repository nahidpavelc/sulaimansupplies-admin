<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-teal box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->lang->line('services_list'); ?></h3>
          <div class="box-tools pull-right">
            <a href="<?php echo base_url('admin/services/add') ?>" class="btn bg-purple btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('services_add'); ?></a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="userListTable" class="table table-bordered table-striped table_th_teal">
            <thead>
              <tr>
                <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                <th style="width: 25%;"><?php echo $this->lang->line('services_name'); ?></th>
                <th style="width: 35%;"><?php echo $this->lang->line('services_details'); ?></th>
                <th style="width: 15%;"><?php echo $this->lang->line('services_insert'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('priority'); ?></th>
                <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sl = 1;
              foreach ($services_list as $value) {
              ?>
                <tr>
                  <td> <?php echo $sl++; ?> </td>
                  <td> <?php echo $value->name; ?> <?php if ($value->parent_service_id == "0") { ?><small class="label pull-right bg-green">menu</small> <?php } ?> </td>
                  <td> <?php echo character_limiter(strip_tags($value->service_details), 200); ?> </td>
                  <td> <?php echo date("d M Y h:i a", strtotime($value->insert_time)) ?> </td>
                  <td> <?php echo $value->priority; ?> </td>
                  <td>
                    <a href="<?php echo base_url('admin/services/edit/' . $value->id); ?>" class="btn btn-sm bg-teal"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo base_url('admin/services/delete/' . $value->id); ?>" class="btn btn-sm btn-danger" onclick='return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
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