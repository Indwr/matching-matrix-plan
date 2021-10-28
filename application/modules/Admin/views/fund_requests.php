<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
              <span class=""> Fund Requests </span>
            </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Fund Requests</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <div class="card-header">
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
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
                            <th>Amount</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>Remark</th>
                            <th>CreatedAt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($requests as $key => $request) {
                          // pr($request);
                            ?>
                            <tr>
                                <td><?php echo ($key + 1) ?></td>
                                <td><?php echo $request['user_id']; ?></td>
                                <td><?php echo $request['amount']; ?></td>
                                <td><img src="<?php echo base_url('uploads/' . $request['image']); ?>" height="100px" width="100px"></td>
                                <td><?php 
                                    if($request['status'] == 0){
                                        echo'<span class="btn btn-primary">Pending</span>';
                                    }elseif($request['status'] == 1){
                                        echo'<span class="btn btn-success">Approved</span>';
                                    }elseif($request['status'] == 2){
                                        echo'<span class="btn btn-danger">Rejected</span>';
                                    }
                                ?></td>
                                <td><?php echo $request['payment_method']; ?></td>
                                <td><?php echo $request['remarks']; ?></td>
                                <td><?php echo $request['created_at']; ?></td>
                                <td><a href="<?php echo base_url('Admin/Management/update_fund_request/'.$request['id']);?>" class="btn btn-info">View</a></td>
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

<?php include'footer.php' ?>