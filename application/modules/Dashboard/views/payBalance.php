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
        <span>Pay Balance to Wallet</span>
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
                    <!-- BEGIN col-6 -->
                    <?php
                      // pr($data_retrieve)
                          extract($data_retrieve['0']);
                          //if($pool == 2 && $pool_count > 256){

                          echo form_open('', array('id' => 'TopUpForm'));
                          ?>
                          <h4><?php echo ' Add Amount:  Rs.' . $orignal_amount; ?></h4><hr>
                          <h4 style="color:red;">Trasaction may take 30 minutes to be successful.</h4>
                          <h5 style="margin: 0">Pay <?php echo $coin . ': <span style="font-size: 25px">' . $amount; ?></span></h5>
                          <h3 class="text-danger"><?php // echo $this->session->flashdata('message');   ?></h3>
                          <div class="form-group"><br><label><?php echo $coin;?> Address</label>
                              <h4><?php echo $address; ?></h4><br>
                              <img src="<?php echo $qrcode_url; ?>" alt="" title="">


                          </div>


                          <div class="form-group" id="SaveBtn" style="display:block;">
                              <button type="submit" name="save" class="btn btn-danger" />CANCEL</button>
                          </div>
                          <div class="form-group">
                              <label></label>
                              <input type="hidden" name="status" value="3">
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
