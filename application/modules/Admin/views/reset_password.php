<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
        
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <section class="content-header">
            <span class="">Reset Password</span>
          </section>  
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Reset Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
     
    
  
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <!-- /.card-header -->
              <div class="card-body">
                  <h3><?php echo $this->session->flashdata('message');?></h3>
                <?php echo form_open();?>
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="cpassword" class="form-control"  placeholder="Current Password"/>
                        <label class="text-danger"><?php echo form_error('cpassword');?></label>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="npassword" class="form-control"  placeholder="New Password"/>
                        <label class="text-danger"><?php echo form_error('npassword');?></label>
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" name="cnpassword" class="form-control"  placeholder="Confirm New Password"/>
                        <label class="text-danger"><?php echo form_error('cnpassword');?></label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right">Update</button>
                    </div>
                <?php echo form_close();?>
              </div>
              <!-- /.card-body -->
              <!-- <iframe src="<?php //echo $task['link']?>"><iframe> -->
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