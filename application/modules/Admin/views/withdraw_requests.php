<?php include'header.php' ?>
 <div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">Withdraw Request </span>
          </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Withdraw Request</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="tableView">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Charges</th>
                            <th>Payable Amount</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Bank Name</th>
                            <th>A/C</th>
                            <th>A/C Holder Name</th>
                            <th>Ifsc</th>
                            <th>Kyc Status</th>
                            <th>Remark</th>
                            <th>Request Date</th>
                            <!-- <th>Credit IB</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($requests as $key => $request) {
    //                        pr($request);
                            ?>
                            <tr>
                                <td><?php echo ($key + 1) ?></td>
                                <td><?php echo $request['user_id']; ?></td>
                                <td><?php echo $request['user']['name']; ?></td>
                                <td><?php echo $request['user']['phone']; ?></td>
                                <td><?php echo $request['amount']; ?></td>
                                <td><?php echo $request['tds'] + $request['admin_charges']; ?></td>
                                <td><?php echo $request['payable_amount']; ?></td>
                                <td><?php echo ucwords(str_replace('_', ' ', $request['type'])); ?></td>
                                <td><?php
                                    if ($request['status'] == 0)
                                        echo'Pending';
                                    elseif ($request['status'] == 1)
                                        echo'Approved';
                                    elseif ($request['status'] == 2)
                                        echo 'Rejected';
                                    ?></td>
                                <!-- <td> -->
                                    <?php 
                                        
                                        // if($request['credit_type'] == 'BlockChain'){
                                        //   echo $request['bank']['btc'].'<br>';
                                          
                                        // }else{
                                          if ($request['bank']['kyc_status'] == 0)
                                              $kyc_status = 'Not Applied';
                                          elseif ($request['bank']['kyc_status'] == 1)
                                              $kyc_status = 'Pending';
                                          elseif ($request['bank']['kyc_status'] == 2)
                                              $kyc_status = 'Approved';
                                          elseif ($request['bank']['kyc_status'] == 3)
                                              $kyc_status =  'Rejected';
                                          // echo 'Bank Name :'. $request['bank']['bank_name'].'<br>';
                                          // echo 'Bank Account Number :'. $request['bank']['bank_account_number'].'<br>';
                                          // echo 'Account Holder Name :'. $request['bank']['account_holder_name'].'<br>';
                                          // echo 'Ifsc Code :'. $request['bank']['ifsc_code'].'<br>';
                                          // echo 'Kyc Status :'. $kyc_status.'<br>';

                                          echo '<td>'. $request['bank']['bank_name'].'</td>';
                                          echo '<td>'. $request['bank']['bank_account_number'].'</td>';
                                          echo '<td>'. $request['bank']['account_holder_name'].'</td>';
                                          echo '<td>'. $request['bank']['ifsc_code'].'</td>';
                                          echo '<td>'. $kyc_status.'</td>';

                                            // echo 'BTC : '. $request['bank']['btc'].'<br>';
                                            // echo 'Ethereum : '. $request['bank']['ethereum'].'<br>';
                                            // echo 'Tron : '. $request['bank']['tron'].'<br>';
                                            // echo 'Litecoin : '. $request['bank']['litecoin'].'<br>';
                                          
                                        //}
                                    ?>
                                <!-- </td> -->
                                <td><?php echo $request['remark']; ?></td>
                                <td><?php echo $request['created_at']; ?></td>
                                <!-- <td><?php //echo $request['credit_type']; ?></td> -->
                                <td><a href="<?php echo base_url('Admin/Withdraw/request/' . $request['id']); ?>" target="_blank">View</a></td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
                <?php
                echo $this->pagination->create_links();
                ?>
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
