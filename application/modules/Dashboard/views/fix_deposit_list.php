<?php include'header.php' ?>
<div id="content" class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <style>
    .text-success {
    color: #117622!important;
    font-size: 14px;
    font-weight: bold;
}
    </style>
    <h2 class="page-titel">
        <span style="font-size:20px">Fix Deposit history</span> 
    </h2>

    <!-- END page-header -->
    <!-- BEGIN wizard -->
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
                          <table class="table table-bordered table-striped dataTable" id="tableView">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>User ID</th>
                                      <th>Amount</th>
                                      <th>Duration</th>
                                      <th>Credit Date</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                  foreach ($deposits as $key => $deposit) {
                                      ?>
                                      <tr>
                                          <td><?php echo ($key + 1) ?></td>
                                          <td><?php echo $deposit['user_id']; ?></td>
                                          <td><?php echo $deposit['amount'] > 0 ? '<span class="text-success">Rs.' . $deposit['amount'] . '</span>' : '<span class="text-danger">$' . $income['amount'] . '</span>'; ?></td>
                                          <td><?php echo $deposit['duration']; ?></td>
                                          <td><?php echo $deposit['created_at']; ?></td>
                                      </tr>
                                      <?php
                                  }
                                  ?>

                              </tbody>
                          </table>
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
    <!-- END wizard -->
</div>

<?php include'footer.php' ?>
