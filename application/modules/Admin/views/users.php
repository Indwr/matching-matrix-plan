<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">All users</span>
            </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
     
    <div>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body">
              <div class="card-header">
                  <form method="GET" action="<?php echo base_url('Admin/Management/users/');?>">
                      <div class="row">
                          <div class="col-md-3">
                              <select class="form-control" name="type">
                                  <option value="name" <?php echo $type == 'name' ? 'selected' : '';?>>
                                      Name</option>
                                  <option value="user_id" <?php echo $type == 'user_id' ? 'selected' : '';?>>
                                      User ID</option>
                                  <option value="phone" <?php echo $type == 'phone' ? 'selected' : '';?>>Phone
                                  </option>
                                  <option value="sponser_id"
                                      <?php echo $type == 'sponser_id' ? 'selected' : '';?>>Sponser ID
                                  </option>
                                  <option value="area_code"
                                      <?php echo $type == 'area_code' ? 'selected' : '';?>>Team Code
                                  </option>
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
                  <a href="<?php echo base_url('Admin/Management/users?export=xls'); ?>" class="export-btn btn-primary"><img src="<?php echo base_url('NewDashboard/');?>assets/images/xls.png">Export to xls</a>
                  <a href="<?php echo base_url('Admin/Management/users?export=csv'); ?>" class="export-btn btn-success"><img src="<?php echo base_url('NewDashboard/');?>assets/images/csv.png">Export to csv</a>
                  <a href="<?php echo base_url('Admin/Management/users?export=txt'); ?>" class="export-btn btn-info "><img src="<?php echo base_url('NewDashboard/');?>assets/images/txt.png">Export to txt</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <p id="demo"></p>
                <table class="table table-hover" id="">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Postion</th>
                            <th>Password</th>
                            <th>Transaction Pin</th>
                            <th>Sponsor ID</th>
                            <th>Package</th>
                            <th>E-wallet</th>
                            <th>Income</th>
                            <th>Joining Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      $i = ($segament) + 1;
                        foreach ($users as $key => $user) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $user['user_id']; ?></td>
                                <td><?php echo $user['name'] ; ?></td>
                                <td><?php echo $user['phone']; ?></td>
                                <td><?php echo $user['position']; ?></td>
                                <td><?php echo $user['password']; ?></td>
                                <td><?php echo $user['master_key']; ?></td>
                                <td><?php echo $user['sponser_id']; ?></td>
                                <td><?php echo $user['package_amount']; ?></td>
                                 <td><?php echo $user['e_wallet']['e_wallet']; ?></td>
                                 <td><?php echo $user['income_wallet']['income_wallet']; ?></td>
                                 <td><?php echo $user['created_at']; ?></td>
                                 <td>
                                  <a href="<?php echo base_url('Admin/Management/user_login/'.$user['user_id']);?>" target="_blank">Login</a>/
                                  <a href="<?php echo base_url('Admin/Settings/EditUser/'.$user['user_id']);?>" target="_blank">Edit</a>/
                                  <?php
                                  if($user['disabled'] == 0){
                                    echo'<a class="blockUser" data-status="1" data-user_id="'.$user['user_id'].'">Block Now</a> /';
                                  }else{
                                    echo'<a class="blockUser" data-status="0" data-user_id="'.$user['user_id'].'">UnBlock Now</a> /';
                                  }
                                  echo '<button type="button" onclick="loadDoc('.$user['user_id'].')">SMS</button>';
                                  ?>
                                  
                                </td>
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
<script>
function loadDoc($user) {
  let url = '<?php echo base_url('Admin/Management/notification/?user_id=');?>'+$user;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}
</script>