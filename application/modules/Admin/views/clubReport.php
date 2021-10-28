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
            <div class="export-table">
                  <a href="" class="export-btn btn-primary"><img src="<?php echo base_url('NewDashboard/');?>assets/images/xls.png">Export to xls</a>
                  <a href="" class="export-btn btn-success"><img src="<?php echo base_url('NewDashboard/');?>assets/images/csv.png">Export to csv</a>
                  <a href="" class="export-btn btn-info "><img src="<?php echo base_url('NewDashboard/');?>assets/images/txt.png">Export to txt</a>
              </div>
            <div class="card">
               <div class="card-body">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="tableview">
                    <thead>
                        <tr>
                        <?php $thead = explode(',',$headerMenu); foreach($thead as $th):?>
                            <th><?php echo $th;?></th>
                        <?php endforeach;?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(!empty($users)){
                        foreach ($users as $key => $u):?>
                            <tr>
                                <td><?php echo ($key+1); ?></td>
                                <td><?php echo $u['user_id']; ?></td>
                                <td><?php echo $u['leftPower']/500; ?></td>
                                <td><?php echo $u['rightPower']/500; ?></td>
                            </tr>
                        <?php endforeach;
                      }?>
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
