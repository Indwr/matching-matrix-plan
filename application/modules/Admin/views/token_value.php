<?php include_once'header.php'; ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Token Value</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
              <li class="breadcrumb-item">Token Value</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <?php echo form_open();?>
            <h3 class="text-danger"><?php if(!empty($error)) {echo $error;}//$this->session->flashdata('message'); ?></h3>
            <div class="form-group">
                <label>TokenValue</label>
                <input type="text" class="form-control" name="token_value" value="<?php echo $token_value['amount'];?>" id="token_value" placeholder="Token Value"/>
                <span class="text-danger"><?php echo form_error('token_value')?></span>
            </div>
            <div class="form-group">
                <button type="subimt" name="save" class="btn btn-success" />Update</button>
            </div>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once'footer.php'; ?>