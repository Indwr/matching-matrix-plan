<?php include_once'header.php'; ?>
<div id="content" class="content">

  <h2 class="page-titel">
      <spna style="">Withdraw </spna> /  Active Beneficiary
  </h2>

  <div id="rootwizard" class="wizard wizard-full-width">
      <!-- BEGIN wizard-header -->

      <!-- END wizard-header -->
      <!-- BEGIN wizard-form -->

          <div class="wizard-content tab-content">
              <!-- BEGIN tab-pane -->
              <div class="tab-pane active show" id="tabFundRequestForm">
            <h3 class="text-danger"><?php echo $this->session->flashdata('message'); ?></h3>
            <?php
            // if($user['netbanking'] == 0){

                echo form_open('', array('id' => 'TopUpForm'));
            ?>
            <div class="form-group">
                <label>OTP</label>
                <input type="text" class="form-control" name="otp" value="<?php echo set_value('otp'); ?>"
                    placeholder="OTP" style="max-width: 400px" />
                <span class="text-danger"><?php echo form_error('otp') ?></span>
            </div>
            <div class="form-group">
                <button type="subimt" name="save" class="btn btn-success" />Activate</button>
            </div>
            <?php echo form_close();
            echo'<a class="btn btn-success" href="">Resend OTP</a>';
            // }else{
            //     echo'Banking is Activate';
            // }

            ?>

        </div></div>
    </div>
</div>
<?php include_once'footer.php'; ?>
