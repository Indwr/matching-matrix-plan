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
            <?php echo $this->session->flashdata('message');?>
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
                            <th>Checkout</th>
                            <th>User ID</th>
                            <th>Email</th>
                            <th>Package</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($records as $key => $record){
                              if($record['status'] == 'charge:confirm'){
                                $button = '<a href="'.base_url('Admin/Package/activateAccount2/'.$record['user']['user_id']).'">Activate</a>';
                              }else{
                                $button = '';
                              }
                                echo'<tr>';
                                  echo'<td>'.($key + 1).'</td>';
                                  echo'<td>'.$record['checkout'].'</td>';
                                  echo'<td>'.$record['user']['user_id'].'</td>';
                                  echo'<td>'.$record['user']['email'].'</td>';
                                  echo'<td>'.$record['package']['title'].'</td>';
                                  echo'<td>'.$record['status'].'</td>';
                                  echo'<td>'.$record['created_at'].'</td>';
                                  echo'<td>'.$button.'</td>';
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
