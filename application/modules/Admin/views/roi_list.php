<?php include'header.php' ?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Booster Status</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Booster Status</li>
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
              <div class="card-header">
                  <form method="GET" action="<?php echo base_url('Admin/Management/users/');?>">
                      <div class="row">
                          <div class="col-3">
                              <select class="form-control" name="type">
                                   <option value="user_id" <?php echo $type == 'user_id' ? 'selected' : '';?>>
                                      User ID</option>
                                  </select>
                          </div>
                          <div class="col-3">
                              <input type="text" name="value" class="form-control float-right"
                                  value="<?php echo $value;?>" placeholder="Search">
                          </div>

                          <div class="col-3">
                              <div class="input-group-append">
                                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                              </div>
                          </div>
                          <div class="col-3">
                              <div class="input-group-append">
                                  <button type="button" class="btn btn-default" onclick="Export();">Export Excel<i class="fa fa-download"></i></button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Amount</th>
                            <th>ROI Amount</th>
                            <th>Days</th>
                            <th>Booster Status</th>
                            <th>Star Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      $i = ($segament) + 1;
                        foreach ($records as $key => $record) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $record['user_id']; ?></td>
                                <td><?php echo $record['amount'] ; ?></td>
                                <td><?php echo $record['roi_amount']; ?></td>
                                <td><?php echo $record['days']; ?></td>
                                <td><?php echo $record['booster_status'] == 1 ? 'Started' : 'Not Stated'; ?></td>
                                 <td><?php echo $record['created_at']; ?></td>
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
<?php include'footer.php' ?>