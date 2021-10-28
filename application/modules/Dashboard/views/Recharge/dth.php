<?php $this->load->view('header'); ?>
<div id="content" class="content">
    <h2 class="page-titel">
        <span style="">DTH </span> /   Prepaid Portal
    </h2>
    <div id="rootwizard" class="wizard wizard-full-width">
        <div class="wizard-content tab-content">
            <h2>
                <?php
                echo $this->session->flashdata('message');
                ?>
            </h2>
            <div class="row">
                <div class="col-md-6">
                    <?php
                    echo form_open();
                    ?>
                    <div class="form-group">
                        <label class="form-label">Choose Operator</label>
                        <select class="form-control" name="operator_code" id="operator_code">
                            <option value="AD">AIRTEL DTH</option>
                            <option value="DT">DISH TV</option>
                            <option value="TS">TATA SKY</option>
                            <option value="BT">BIG TV</option>
                            <option value="SD">SUN DIRECT</option>
                            <option value="VT">VIDEOCON D2H</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Customer ID</label>
                        <input type="number" class="form-control"  onblur="check_number()" name="service" value="<?php set_value('service');?>">
                        <?php echo form_error('service'); ?>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control" name="amount" value="<?php set_value('amount');?>">
                        <?php echo form_error('amount'); ?>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Master Key</label>
                        <input type="text" class="form-control" name="master_key" value="<?php set_value('master_key');?>">
                        <?php echo form_error('master_key'); ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn btn-success" value="Proceed to Recharge">
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script>
    function check_number() {
        var op_code = $('#operator_code').val();
        var url = "<?php echo base_url('Dashboard/Recharge/dth_operators/'); ?>" + op_code;
        $.get(url, function (res) {
            console.log(res.data)

        }, 'json')
    }
    ;

</script>