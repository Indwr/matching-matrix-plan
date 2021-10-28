<?php $this->load->view('header'); ?>
<style>

    .panel-heading {
        background: #e0e0e0;
        color: #000;
        padding: 8px 16px;
        border-radius: 10px;
    }

</style>
<div class="main-content">
<div class="page-content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row my-2 ">
                <div class="col-sm-6 panel-heading">
                    <h4 class="m-0">Order History</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order History</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="card card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped dataTable" id="tableView">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice No.</th>
                            <th>Amount</th>
                            <th>BV</th>
                            <th>Payment Method</th>
                            <th>Tax</th>
                            <th>Status</th>
                            <th>Shopping Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($orders as $key => $order) {
                            ?>
                            <tr>
                                <td><?php echo ($key + 1) ?></td>
                                <td><a href="<?php echo base_url('Dashboard/Shopping/Invoice/'.$order['order_id']);?>">#<?php echo $order['order_id']; ?></a></td>
                                <td>Rs. <?php echo $order['amount']?></td>
                                <td><?php echo $order['bv']; ?></td>
                                <td><?php echo $order['payment_method']; ?></td>
                                <td><?php echo $order['tax']; ?></td>
                                <td><?php echo $order['status'] == 0 ? 'Paid' : 'UnPaid'; ?></td>
                                <td><?php echo $order['created_at']; ?></td>
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
</div>
<?php $this->load->view('footer'); ?>
