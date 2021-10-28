<?php include'header.php' ?>
<div id="content" class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h2 class="page-titel">
        <span style="">Add Beneficiary</span> /   Add Beneficiary
    </h2>
    <h1 class="page-header">

        <small>Add Beneficiary</small>
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
                <div class="row">
                    <!-- BEGIN col-6 -->
                    <h3 class="text-danger"><?php echo $this->session->flashdata('message'); ?></h3>
                    <?php
                    // if($user['netbanking'] == 1){
                    echo form_open('', array('id' => 'TopUpForm'));
                    ?>
                    <div class="form-group">
                        <label>Beneficiary Bank Account No. :</label>
                        <input type="text" class="form-control" name="beneficiary_account_no" value="<?php echo set_value('beneficiary_account_no'); ?>"
                               placeholder="Beneficiary Bank Account No." style="max-width: 400px" />
                        <span class="text-danger"><?php echo form_error('beneficiary_account_no') ?></span>
                    </div>
                    <div class="form-group">
                        <label>Beneficiary Bank IFSC :</label>
                        <input type="text" class="form-control" name="beneficiary_ifsc" value="<?php echo set_value('beneficiary_ifsc'); ?>"
                               placeholder="Beneficiary Bank IFSC" style="max-width: 400px" />
                        <span class="text-danger"><?php echo form_error('beneficiary_ifsc') ?></span>
                    </div>
                    <div class="form-group">
                        <label>Beneficiary Account Holder Name :</label>
                        <input type="text" class="form-control" name="beneficiary_name" value="<?php echo set_value('beneficiary_name'); ?>"
                               placeholder="Beneficiary  Account Holder Name :" style="max-width: 400px" />
                        <span class="text-danger"><?php echo form_error('beneficiary_name') ?></span>
                    </div>
                    <div class="form-group">
                        <button type="subimt" name="save" class="btn btn-success" />Add Beneficiary</button>
                    </div>
                    <style>

                        .blink_me {
                            animation: blinker 3s linear infinite;
                        }

                        @keyframes blinker {
                            50% {
                                opacity: 0;
                            }
                        }
                    </style>
                    <div class="blink_me"><a style="background:#ee6197; font-weight: bold;color:white; padding:10px 40px; color:white;" href="<?php echo base_url('Dashboard/Withdraw/ActivateBanking'); ?>">Click here to Active Banking</a></div>

                    <?php
                    echo form_close();
                    // }else{
                    //     echo'Please Activate your Banking';
                    // }
                    ?>
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
