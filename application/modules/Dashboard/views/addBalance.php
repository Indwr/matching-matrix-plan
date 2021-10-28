<?php include_once'header.php'; ?>
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
        <span>Add Balance to Wallet</span>
    </section>

    <!-- END page-header -->
    <!-- BEGIN wizard -->
    <div id="rootwizard" class="wizard wizard-full-width">
        <!-- BEGIN wizard-header -->

        <!-- END wizard-header -->
        <!-- BEGIN wizard-form -->

        <div class="wizard-content tab-content">
             <div class="card">
          <div class="card-body">

            <!-- BEGIN tab-pane -->
            <div class="tab-pane active show" id="tabFundRequestForm">
                <!-- BEGIN row -->
                <div class="col-md-12">
                <?php
                    echo form_open('', array('id' => 'TopUpForm'));
                    ?>
                    <h3 class="text-danger"><?php echo $this->session->flashdata('message'); ?></h3>
                    <div class="form-group">
                        <label>Enter Amount ($)</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="<?php echo set_value('amount'); ?>" placeholder="$ Enter Amount"/>
                        <span class="text-danger"><?php echo form_error('amount') ?></span>
                        <span class="text-danger" id="errorMessage"></span>
                    </div>

                    <div class="form-group">
                        <label>Choose Coin</label>
                        <select class="form-control" name="coin" id="coin">
                            <option value="">Select Coin</option>
                            <option value="BTC">BTC (Bitcoin)</option>
                            <!-- <option value="ETH">ETH (Etherium)</option>
                            <option value="LTC">LTC (Litecoin)</option>
                            <option value="TRX">Tron</option> -->
                        </select>
                    </div>
                    <div class="form-group" id="SaveBtn" style="display:block;">
                        <button type="submit" name="save" class="btn btn-primary" />PROCEED</button>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="button" name="updateProfileBtn" value="Pay With BTC" id="PayBtcBtn"  style="display:none;" class="btn btn-primary">
                    </div>
                    <?php echo form_close();
                    ?>

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






<?php include_once'footer.php'; ?>
