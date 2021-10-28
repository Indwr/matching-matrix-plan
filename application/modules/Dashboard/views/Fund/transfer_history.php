<div class="content-wrapper">
<section class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <section class="content-header">
        <span style="">Wallet Request </span> /  Trasfer Wallet
    </section>
    <h4 class="page-header">
        <?php echo'Wallet Ledger';?>($<?php echo $wallet_amount['wallet_amount'];?>)
        <small>You can see fund requests list and check fund request status.</small>
    </h4>
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
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
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
                                        <td>$<?php echo $record['amount']; ?></td>
                                        <td><?php echo $record['sender_id']; ?></td>
                                        <td><?php echo ucwords(str_replace('_',' ',$record['type'])); ?></td>
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
                    <!-- END row -->
                </div>
                <!-- END tab-pane -->
                <!-- BEGIN tab-pane -->

            </div>
            <!-- END wizard-content -->

        <!-- END wizard-form -->
    </div>
    <!-- END wizard -->
  </section>
</div>
