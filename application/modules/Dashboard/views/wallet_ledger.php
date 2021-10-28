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
        <span style="">Wallet Request  /   Wallet Ledger</span>
    </section>

    <!-- END page-header -->
    <!-- BEGIN wizard -->


     <div class="card">
          <div class="card-body">
             <h4 class="page-header" style="margin-top:20px">
        <?php echo'Wallet Ledger';?>(Rs.<?php echo $wallet_amount['wallet_amount'];?>)
        <small>You can see fund requests list and check fund request status.</small>
    </h4>
    <div id="rootwizard" class="wizard wizard-full-width" >
        <!-- BEGIN wizard-header -->

        <!-- END wizard-header -->
        <!-- BEGIN wizard-form -->

            <div class="wizard-content tab-content" >
                <!-- BEGIN tab-pane -->
                <div class="tab-pane active show" id="tabFundRequestForm">
                    <!-- BEGIN row -->
                     <div class="box box-solid bg-black">
                              
                               <div class="box-body">
                    <div class="table-responsive">
                        <!-- BEGIN col-6 -->
                        <table class="table table-bordered table-striped dataTable" id="tableView">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User ID</th>
                                    <th>Amount</th>
                                    <th>Sender ID</th>
                                    <th>Type</th>
                                    <th>Remark</th>
                                    <th>CreatedAt</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($records as $key => $record) {
                                    ?>
                                    <tr>
                                        <td><?php echo ($key + 1) ?></td>
                                        <td><?php echo $record['user_id']; ?></td>
                                        <td><span class="text-<?php echo $record['amount'] > 0 ? 'success' : 'danger';?>"><?php echo $record['amount']; ?></span></td>
                                        <td><?php echo $record['sender_id']; ?></td>
                                        <td><?php echo ucwords(str_replace('_', ' ', $record['type'])); ?></td>
                                        <td><?php echo $record['remark']; ?></td>
                                        <td><?php echo $record['created_at']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <!-- END col-6 -->
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
</div>
</div>

    <!-- END wizard -->
</div>
</div>
</div>
