<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">Paid users</span>
            </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Paid users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body">
              <div class="card-header">
                <div class="row">
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <div class="export-table">
                  <a href="" class="export-btn btn-primary"><img src="<?php echo base_url('NewDashboard/');?>assets/images/xls.png">Export to xls</a>
                  <a href="" class="export-btn btn-success"><img src="<?php echo base_url('NewDashboard/');?>assets/images/csv.png">Export to csv</a>
                  <a href="" class="export-btn btn-info "><img src="<?php echo base_url('NewDashboard/');?>assets/images/txt.png">Export to txt</a>
              </div>
            </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="tableView">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Sponsor ID</th>
                            <th>Package</th>
                            <th>Joining Date</th>
                            <th>Activation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($users as $key => $user) {
                            ?>
                            <tr>
                                <td><?php echo ($key + 1) ?></td>
                                <td><?php echo $user['user_id']; ?></td>
                                <td><?php echo $user['name'] ; ?></td>
                                <td><?php echo $user['phone']; ?></td>
                                <td><?php echo $user['sponser_id']; ?></td>
                                <td><?php echo $user['package_amount']; ?></td>
                                <td><?php echo $user['created_at']; ?></td>
                                <td><?php echo $user['topup_date']; ?></td>
                                <td><a href="<?php echo base_url('Admin/Management/user_login/'.$user['user_id']);?>" target="_blank">Login</a></td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
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