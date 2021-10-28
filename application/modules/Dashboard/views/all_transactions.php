<?php include'header.php' ?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    All Transactions
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i> Export
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User ID</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Credit Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($transactions as $key => $transaction) {
                        ?>
                        <tr>
                            <td><?php echo ($key + 1) ?></td>
                            <td><?php echo $transaction['user_id']; ?></td>
                            <td class="<?php echo $transaction['amount'] > 0 ? 'text-success' : 'text-danger';?>">$<?php echo $transaction['amount']; ?></td>
                            <td><?php echo ucwords(str_replace('_', ' ', $transaction['type'])); ?></td>
                            <td><?php echo $transaction['description']; ?></td>
                            <td><?php echo $transaction['created_at']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>
<?php include'footer.php' ?>