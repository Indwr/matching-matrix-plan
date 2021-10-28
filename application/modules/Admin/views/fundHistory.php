<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">Fund History</span>
            </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Management/Index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Fund History</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
     
    <div>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body">
              <div class="card-header">
                  <form method="GET" action="<?php echo base_url('Admin/Management//');?>">
                      <div class="row">
                          <div class="col-md-3">
                              <select class="form-control" name="type">
                                 
                                  <option value="user_id" <?php echo $type == 'user_id' ? 'selected' : '';?>>
                                      User ID</option>
                                  
                              </select>
                          </div>
                          <div class="col-md-3">
                              <input type="text" name="value" class="form-control float-right"
                                  value="<?php echo $value;?>" placeholder="Search">
                          </div>

                          <div class="col-md-3">
                              <div class="input-group-append">
                                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="input-group-append">
                                  <button type="button" class="btn btn-default" onclick="Export();">Export Excel<i class="fa fa-download"></i></button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="export-table">
                  <a href="" class="export-btn btn-primary"><img src="<?php echo base_url('NewDashboard/');?>assets/images/xls.png">Export to xls</a>
                  <a href="" class="export-btn btn-success"><img src="<?php echo base_url('NewDashboard/');?>assets/images/csv.png">Export to csv</a>
                  <a href="" class="export-btn btn-info "><img src="<?php echo base_url('NewDashboard/');?>assets/images/txt.png">Export to txt</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Remark</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      $i = ($segament) + 1;
                        foreach ($requests as $key => $request) {
                            ?>
                            <tr>
                                <td><?php echo ($key + 1) ?></td>
                                <td><?php echo $request['user_id']; ?></td>
                                <td><?php echo $request['amount']; ?></td>
                                <td><?php echo $request['amount'] > 0 ? '<span class="text-success">Credit</span>': '<span class="text-danger">Debit</span>'; ?></td>
                                <td><?php echo $request['remark']; ?></td>
                                <td><?php echo $request['created_at']; ?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>

                    </tbody>
                </table>
              </div>
              <div class="row">
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
              </div>
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