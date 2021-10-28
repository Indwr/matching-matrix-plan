<?php include_once'header.php'; ?>
<div id="content" class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h2 class="page-titel">
   <spna style="">Deposit your Amount</span>
    </h2>
    <h1 class="page-header">
          <span style=""> Token Wallet balance (Rs.<?php echo $token_wallet['wallet_balance']; ?>)</span>
        <small>You can see fund requests list and check fund request status.</small>
    </h1>
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
                    <div class="col-md-12">
                        <!-- BEGIN col-6 -->
                        <?php echo form_open('', array('id' => 'TopUpForm')); ?>
                        <h3 class="text-danger"><?php echo $this->session->flashdata('message'); ?></h3>
                        <div class="form-group">
                            <label>Deposit Amount</label>
                            <input type="text" class="form-control"  name="amount">
                            <span class="text-danger"><?php echo form_error('amount');?></span>
                        </div>
                        <div class="form-group">
                          <select class="form-control" name="duration">
                            <option value="3">3 Months</option>
                            <option value="6">6 Months</option>
                            <option value="9">9 Months</option>
                            <option value="12">12 Months</option>
                          </select>
                          <span class="text-danger"><?php echo form_error('duration');?></span>
                        </div>
                        <div class="form-group">
                            <label>User ID</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo set_value('user_id'); ?>" placeholder="User ID" style="max-width: 400px"/>
                            <span class="text-danger"><?php echo form_error('user_id') ?></span>
                            <span class="text-danger" id="errorMessage"></span>
                        </div>
                        <div class="form-group" id="SaveBtn">
                            <button type="subimt" name="save" class="btn btn-success">Acitvate</button>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input type="button" name="updateProfileBtn" value="Pay With BTC" id="PayBtcBtn"  style="display:none;" class="btn btn-primary">
                        </div>
                        <?php echo form_close(); ?>
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






<?php include_once'footer.php'; ?>
<script>
    $(document).on('blur', '#user_id', function () {
        var user_id = $('#user_id').val();
        if (user_id != '') {
            var url = '<?php echo base_url("Dashboard/User/get_user/") ?>' + user_id;
            $.get(url, function (res) {
                $('#errorMessage').html(res);
                $('#user_id').val(user_id);
            })
        }
    })
    $(document).on('submit', '#TopUpForm', function () {
        if (confirm('Are You Sure U want to Invest This Amount')) {
            yourformelement.submit();
        } else {
            return false;
        }
    })
</script>
