<?php include_once'header.php'; ?>
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
        <span>Transaction</span>
    </section>
     <!-- END page-header -->
    <!-- BEGIN wizard -->
    <div id="rootwizard" class="wizard wizard-full-width">
       <div class="card">
          <div class="card-body">
        <!-- BEGIN wizard-header -->

        <!-- END wizard-header -->
        <!-- BEGIN wizard-form -->

        <div class="wizard-content tab-content">
            <!-- BEGIN tab-pane -->
            <div class="tab-pane active show" id="tabFundRequestForm">
                <!-- BEGIN row -->
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
                  <table class="table table-bordered table-striped dataTable" id="tableView" data-date_col="6">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Coins</th>
                              <th>Amount</th>
                              <th>Add Amount</th>
                              <th>Status</th>
                              <th>Address</th>
                              <th>TX.ID</th>
                              <th>CreatedAt</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach ($requests as $key => $request) {
                              ?>
                              <tr>
                                  <td><?php echo ($key + 1) ?></td>
                                  <td><?php echo $request['amount']; ?></td>
                                  <td><?php echo $request['coin']; ?></td>
                                  <td>Rs <?php echo $request['orignal_amount']; ?></td>
                                  <td><?php
                                      if ($request['status'] == 0) {
                                          echo'<span class="btn btn-primary btn-sm">Pending</span>';
                                      } elseif ($request['status'] == 1) {
                                          echo'<span class="btn btn-success btn-sm">Approved</span>';
                                      } elseif ($request['status'] == 2) {
                                          echo'<span class="btn btn-danger btn-sm">Rejected</span>';
                                      } elseif ($request['status'] == 3) {
                                          echo'<span class="btn btn-warning btn-sm">Cancelled</span>';
                                      }
                                      ?></td>
                                  <td><?php echo $request['address']; ?></td>
                                  <td><?php echo $request['txn_id']; ?></td>
                                  <td><?php echo date("m/d/Y", strtotime($request['created_at'])); ?></td>
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
               </div>
              </div>
                <!-- END row -->
            </div>
            <!-- END tab-pane -->
            <!-- BEGIN tab-pane -->

        </div>
        <!-- END wizard-content -->

        <!-- END wizard-form -->
    </div>
    <!-- END wizard -->
  </div>
</div>
</div>





<?php include_once'footer.php'; ?>
