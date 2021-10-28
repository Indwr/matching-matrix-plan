<?php include'header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $header  ?></h1>
            <!-- <button type="button" id="export" class="btn btn-default"><i class="fas fa-download"></i>Export</button> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $header  ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
           <!--  <div class="card-header">
                <form method="GET" action="<?php //echo base_url('Admin/Reports/'.$path);?>">
                <div class="row">
                    <div class="col-3">
                      <input type="date" name="startDate" class="form-control float-right" value="<?php// echo $startDate;?>" placeholder="Enter Start Date">
                    </div>
                    <div class="col-3">
                      <input type="date" name="endDate" class="form-control float-right" value="<?php// echo $endDate;?>" placeholder="Enter End Date">
                    </div>
                    <div class="col-3">
                      <select class="form-control" name="type">
                        <option value="user_id" <?php// echo $type == 'user_id' ? 'selected' : '';?>>User ID</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <input type="text" name="value" class="form-control float-right" value="<?php //echo $value;?>" placeholder="Search">
                    </div>
                    
                    <div class="col-3">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </form>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover" id="tableexcel">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Package</th>
                            <th>Phone</th>
                            <th>Address1</th>
                            <th>Address2</th>
                            <th>Pin Code</th>
                            <th>City</th>
                            <th>District</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      $i = $this->uri->segment('4') + 1;
                        foreach ($users as $key => $user) {
                            ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $user['user_id']; ?></td>
                              <td><?php echo $user['name']; ?></td>
                              <td><?php echo $user['userinfo']['package_amount']; ?></td>
                              <td><?php echo $user['phone']; ?></td>
                              <td><?php echo $user['address1']; ?></td>
                              <td><?php echo $user['address1']; ?></td>
                              <td><?php echo $user['pinCode']; ?></td>
                              <td><?php echo $user['city']; ?></td>
                              <td><?php echo $user['district']; ?></td>
                              <td><?php echo $user['state']; ?></td>
                              <td><?php echo $user['country']; ?></td>
                              <td><?php echo $user['created_at']; ?></td>
                              <td><?php echo ($user['status'] == 0)? 'Pending':(($user['status'] == 1)? 'Approved':'Rejected');?></td>
                              <td>
                                <?php
                                  if($user['status'] == 0):
                                    echo form_open();
                                    echo form_hidden('id',$user['id']);
                                    echo form_hidden('status','1');
                                    echo form_submit(['type' => 'submit','value' => 'Approve','class' => 'btn btn-success']);
                                    echo form_close(); 
                                ?>
                                <?php
                                    echo form_open();
                                    echo form_hidden('id',$user['id']);
                                    echo form_hidden('status','2');
                                    echo form_submit(['type' => 'submit','value' => 'Reject','class' => 'btn btn-danger']);
                                    echo form_close(); 
                                  endif;
                                ?>
                              </td>
                            </tr>
                            <?php
                        $i++;}
                        ?>
                    </tbody>
                </table>
                <?php echo $this->pagination->create_links();?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'footer.php' ?>