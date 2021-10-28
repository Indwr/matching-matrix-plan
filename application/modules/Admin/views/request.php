<?php include_once'header.php'; ?>
<style>
.footer {

    position: relative;
    
}
</style>
  <div class="main-content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Withdraw Request</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
          <h2><?php echo $this->session->flashdata('message');?></h2>
                <?php echo form_open(); ?>
                <div class="form-group">
                    <label>User ID</label>
                    <input type="text" name="user_id" value="<?php echo $request['user_id']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="name" value="<?php echo $user_details['name']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Sponser ID</label>
                    <input type="text" name="Sponser"  value="<?php echo $user_details['sponser_id']; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" name="amount" value="<?php echo $request['amount']; ?>"  class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="amount" value="<?php echo $request['type']; ?>"  class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Remark</label>
                    <textarea name="remark" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1">Approve</option>
                        <option value="2">Reject</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success pull-right" type="Submit" >Update Status</button>
                </div>
                <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once'footer.php'; ?>
