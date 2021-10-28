<?php include'header.php' ?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Withdraw Request ($<?php echo $balance['total_income'];?>)
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <h3><?php echo $this->session->flashdata('message');?></h3>
            <?php echo form_open(); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" name="amount" placeholder="Amount" required="required">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" id="otpbtn" class="btn btn-success">Generate OTP</button>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="otp" placeholder="One Time Password" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="withdraw_request" class="btn btn-success pull-right">
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php include'footer.php' ?>
<script>
    $(document).on('click', '#otpbtn', function () {
        var url = '<?php echo base_url('Dashboard/AjaxController/Generate_otp'); ?>';
        $.get(url, function (res) {
            alert(res.message)
        }, 'json')
    })
</script>