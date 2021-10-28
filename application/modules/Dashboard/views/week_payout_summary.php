<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">Week Payout Summary</span>
          </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Week Payout Summary</li>
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
                <table class="table table-hover" id="">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <?php 
                               
                              foreach($type as $ty){
                                echo '<th>'.ucwords($ty['type']).'</th>';
                              }
                            ?>
                            <th>Total Payout</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($records as $key => $record) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                               <!--  <td><?php //echo $record['date']; ?></td> -->
                               <td><?php echo date("Y-m-d", strtotime($record['year'].'W'.str_pad($record['week'], 2, 0, STR_PAD_LEFT))).', '.date("Y-m-d", strtotime($record['year'].'W'.str_pad($record['week'], 2, 0, STR_PAD_LEFT).' +6 days'));; ?></td>
                                
                                  <?php
                                    foreach($type as $ty){
                                      echo '<td>'.$record['incomes'][$ty['type']].'</td>'; 
                                    }
                                  ?>
                                
                                <td><?php echo $record['incomes']['total_payout']; ?></td>
                                <td><a href="<?php echo base_url('Dashboard/Settings/weekWisePayout/'.$record['week']);?>">View</a></td>
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
