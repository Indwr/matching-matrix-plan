<?php include'header.php' ?>
<style>
 section.content-header {
    background-color: #e0e0e0;
    padding: 10px;
    font-size: 20px;
    margin: 21px 0px;
    border-radius: 10px;
}
</style>
<div class="main-content">
  <div class="page-content">
<div class="container-fluid">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <section class="content-header">
        <span style="">Withdraw Request  /   Withdraw summary</span>
    </section>

    <!-- END page-header -->
    <!-- BEGIN wizard -->
    <div class="card">
      <div class="card-body">
       <h3 class="page-header">

        <small>Withdrawal summary</small>
    </h3>
    <div id="rootwizard" class="wizard wizard-full-width">
        <!-- BEGIN wizard-header -->

        <!-- END wizard-header -->
        <!-- BEGIN wizard-form -->

            <div class="wizard-content tab-content">
                <!-- BEGIN tab-pane -->
                <div class="tab-pane active show" id="tabFundRequestForm">
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-6 -->
                        <div class="col-md-12">
                           <div class="box box-solid bg-black">
                              <div class="box-header with-border">
                                <div class="box-tools pull-right" style="top: 4px;">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                  <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                  <i class="fa fa-times"></i></button>
                                </div>
                              </div>
                               <div class="box-body">
                          <div class="table-responsive">
                          <table class="table table-bordered table-striped dataTable" id="tableView">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>User ID</th>
                                      <th>Amount</th>
                                      <th>Type</th>
                                      <th>Status</th>

                                      <th>Admin Charges</th>
                                      <th>TDS</th>
                                      <th>Payable Amount</th>
                                      <th>Description</th>
                                      <th>Credit Date</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  foreach ($transactions as $key => $transaction) {
                                      if($transaction['status'] == 0)
                                          $status = '<span style="color:blue; font-weight:bold">Pending</span>';
                                      elseif($transaction['status'] == 1)
                                          $status = '<span style="color:green; font-weight:bold">Approved</span>';
                                      elseif($transaction['status'] == 2)
                                          $status = '<span style="color:red; font-weight:bold">Rejected</span>';
                                      ?>
                                      <tr>
                                          <td><?php echo ($key + 1) ?></td>
                                          <td><?php echo $transaction['user_id']; ?></td>
                                          <td><?php echo $transaction['amount']; ?></td>
                                          <td><?php echo ucwords(str_replace('_', ' ', $transaction['type'])); ?></td>
                                          <td><?php echo $status; ?></td>

                                          <td><?php echo $transaction['admin_charges']; ?></td>
                                          <td><?php echo $transaction['tds']; ?></td>
                                          <td><?php echo $transaction['payable_amount']; ?></td>
                                          <td><?php echo $transaction['remark']; ?></td>
                                          <td><?php echo $transaction['created_at']; ?></td>
                                      </tr>
                                      <?php
                                  }
                                  ?>

                              </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                        </div>
                        <!-- END col-6 -->
                    </div>
                    <!-- END row -->
                </div>
                <!-- END tab-pane -->
                <!-- BEGIN tab-pane -->

            </div>
            <!-- END wizard-content -->

        <!-- END wizard-form -->
    </div>
  </div>
    <!-- END wizard -->
</div>
</div>
</div>
</div>



<?php include'footer.php' ?>
