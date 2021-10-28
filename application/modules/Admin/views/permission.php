<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">Premission</span>
            </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php //echo base_url('Admin/Management/Index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Premission</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
     
    <div>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body">
              <div class="card-header">
                  
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Name</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      
                          $res = [
                                  '1' => ['type' => 'A', 'name' => 'Admin'],
                                  '2' => ['type' => 'U', 'name' => 'User'],
                                  '3' => ['type' => 'SM', 'name' => 'Sales Man'],
                                  '4' => ['type' => 'SK', 'name' => 'Store Keeper']
                                  ];
                        foreach ($res as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $key; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><a href="<?php echo base_url('Admin/Task/ChangePermission/'.$value['type']);  ?>">Action</a></td>
                               
                            </tr>
                            <?php
                           
                        }
                        ?>

                    </tbody>
                </table>
              </div>
              <!-- <div class="row">
                  <div class="col-sm-12 col-md-5">
                      <div class="dataTables_info" id="tableView_info" role="status" aria-live="polite">
                          Showing <?php echo ($segament + 1) .' to  '.($i -1);?> of
                          <?php echo $total_records;?> entries</div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                      <div class="dataTables_paginate paging_simple_numbers" id="tableView_paginate">
                          <?php
                          echo $this->pagination->create_links();
                          ?>
                      </div>
                  </div>
              </div> -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
          </div>
      </div>
    </div>
  </div>
   </div>
<?php include'footer.php' ?>
<script>
$(document).on('click','.blockUser',function(){
  var status = $(this).data('status');
  var user_id = $(this).data('user_id');
  var url = "<?php echo base_url('Admin/Management/blockStatus/');?>"+user_id + '/' + status;
  $.get(url,function(res){
    alert(res.message)
    if(res.success == 1)
      location.reload()
  },'json')
})
</script>