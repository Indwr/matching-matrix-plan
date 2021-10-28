<?php include 'header.php' ?>
<div class="main-content">
    <div class="page-content">
       <div class="container-fluid">
    <div class="content-header">
     
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class=""><?php echo $header; ?></span>
            </section>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $header; ?></li>
            </ol>
          </div>
        </div>
      </div>
  
    <div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                <!-- <div class="export-table">
                    <a href="" class="export-btn btn-primary"><img src="<?php echo base_url('NewDashboard/');?>assets/images/xls.png">Export to xls</a>
                    <a href="" class="export-btn btn-success"><img src="<?php echo base_url('NewDashboard/');?>assets/images/csv.png">Export to csv</a>
                    <a href="" class="export-btn btn-info "><img src="<?php echo base_url('NewDashboard/');?>assets/images/txt.png">Export to txt</a>
                </div> -->
            <div class="card">
               <div class="card-body">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="tableview">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Transaction ID</th>
                            <!-- <th>Created Time</th> -->
                            <!-- <th>Time Expire</th> -->
                            <th>Status</th>
                            <th>Status Text</th>
                            <th>Type</th>
                            <th>Coin</th>
                            <!-- <th>Amount</th> -->
                            <th>Amountf</th>
                            <th>Received</th>
                            <th>Receivedf</th>
                            <th>Received Confirm</th>
                            <th>Payment Address</th>
                            <!-- <th>Invoice</th> -->
                            <!-- <th>Last Name</th> -->
                            <th>Package</th>
                            <th>Paid Status</th>
                            <th>Topup Status</th>
                            <th>Created AT</th>
                            <th>Updated AT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($coin_payment as $key => $record){
                                echo'<tr>';
                                echo'<td>'.($key + 1).'</td>';
                                // echo'<td>'.$record['invoice'].'</td>';
                                echo'<td>'.$record['first_name'].'</td>';
                                echo'<td>'.$record['transaction_id'].'</td>';
                                // echo'<td>'.$record['created_time'].'</td>';
                                // echo'<td>'.$record['time_expires'].'</td>';
                                echo'<td>'.$record['status'].'</td>';
                                echo'<td>'.$record['status_text'].'</td>';
                                echo'<td>'.$record['type'].'</td>';
                                echo'<td>'.$record['coin'].'</td>';
                                // echo'<td>'.$record['amount'].'</td>';
                                echo'<td>'.$record['amountf'].'</td>';
                                echo'<td>'.$record['received'].'</td>';
                                echo'<td>'.$record['receivedf'].'</td>';
                                echo'<td>'.$record['recv_confirms'].'</td>';
                                echo'<td>'.$record['payment_address'].'</td>';
                                // echo'<td>'.$record['last_name'].'</td>';
                                echo'<td>'.$record['package'].'</td>';   
                                echo'<td>'.$record['Paid_status'].'</td>';
                                echo'<td>'.$record['topup_status'].'</td>';
                                echo'<td>'.$record['created_at'].'</td>';
                                echo'<td>'.$record['updated_at'].'</td>';
                                echo'</tr>';
                            }
                        ?>
                    </tbody>
                </table>
              </div> 
            </div> 
             </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
   </div>
<?php include 'footer.php' ?>
