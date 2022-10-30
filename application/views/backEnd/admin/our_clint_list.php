<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('clint_list'); ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url('admin/our-clint/add') ?>" class="btn bg-green btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('clint_add'); ?></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="userListTable" class="table table-bordered table-striped table_th_maroon">
                        <thead>
                            <tr>
                                <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('clint_name'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('priority'); ?></th>
                                <th style="width: 25%;"><?php echo $this->lang->line('clint_insert'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('clint_logo'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sl = 1;
                                foreach ($clint_list as $value) {
                                	?>
                            <tr>
                                <td> <?php echo $sl++ ; ?> </td>
                                <td> <?php echo $value->client_name; ?> </td>
                                <td> <?php echo $value->priority; ?> </td>
                                <td> <?php echo date("d M Y h:i a", strtotime($value->insert_time)) ?> </td>
                                <td>
                                    <img src="<?php echo base_url($value->logo) ?>" alt="" width="50px" height="50px">
                                </td>
                                <td> 
                                    <a href="<?php echo base_url('admin/our-clint/edit/'.$value->id); ?>" class="btn btn-sm bg-green"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/our-clint/delete/'.$value->id); ?>" class="btn btn-sm btn-danger" onclick = 'return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
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
    $(function () {
      $("#userListTable").DataTable();
    });
    
</script>

