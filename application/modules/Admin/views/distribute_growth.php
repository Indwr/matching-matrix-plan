<?php include_once'header.php'; ?>
  <div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">Distribute Growth Bonus (<?php echo $total_unit['sum'];?>)</span><br>
          </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Distribute Growth Bonus</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
            <?php echo form_open('',array('id' => 'walletForm'));?>
            <h3 class="text-danger"><?php echo $this->session->flashdata('message'); ?></h3>
            <div class="form-group">
                <label>Amount</label>
                <input type="number" class="form-control" name="amount" placeholder="Amount" value="<?php echo set_value('amount');?>"/>
                <span class="text-danger"><?php echo form_error('amount')?></span>
            </div>
            <div class="form-group">
                <button type="subimt" name="save" class="btn btn-success" />Send</button>
            </div>
            <?php echo form_close();?>
            </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once'footer.php'; ?>