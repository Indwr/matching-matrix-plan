<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">PayOut Summary</span>
          </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">PayOut Summary</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      
     
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <div class="card-header">
                <div class="card-tools">
                  <div class="form-group-sm" style="width: 150px;">
                    <form action="" method="GET">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" placeholder="Start Date">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" placeholder="End Date">
                        <select class="form-control" name="export">
                            <option value="">No Export</option>
                            <option value="csv">Export CSV</option>
                        </select>
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->

                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Direct Bonus</th>
                            <th>Matching Bonus</th>
                            <!-- <th>Monthly Salary Bonus</th> -->
                            <!-- <th>Reward Bonus</th>
                            <th>Level Bonus</th> -->
                            <th>Pool Bonus</th>
                            <th>Royalty Bonus</th>
                            <th>Total Payout</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($records as $key => $record) {
                          // pr($record);
                          // print_r($record);
                          // die('OKK');
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $record['date']; ?></td>
                                <td><?php echo $record['incomes']['direct_income']; ?></td>
                                <td><?php echo $record['incomes']['matching_bonus']; ?></td>
                                <td><?php echo $record['incomes']['pool_income']; ?></td>
                                <!-- <td><?php //echo $record['incomes']['reward_income']; ?></td>
                                <td><?php //echo $record['incomes']['level_income']; ?></td> -->
                                <td><?php echo $record['incomes']['royalty_income']; ?></td>
                                <td><?php echo $record['incomes']['total_payout']; ?></td>
                                <td><a href="<?php echo base_url('Admin/Withdraw/dateWisePayout/'.$record['date']);?>">View</a></td>
                            </tr>
                            <?php
                            $i++;
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
   
<?php include'footer.php' ?>
