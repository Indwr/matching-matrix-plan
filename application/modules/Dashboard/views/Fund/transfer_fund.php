<div class="content-wrapper">
<section class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <section class="content-header">
        <spna style="">Wallet Request </spna> /  Trasfer Wallet
    </section>
    <h4 class="page-header">
        Fund Transfer (Rs.<?php echo $wallet_amount['wallet_amount']?>)
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
                        <div class="col-md-6">
                          <?php echo form_open(); ?>
                              <div class="row">
                                  <span class="text-center">
                                      <h3><?php echo $this->session->flashdata('message');?></h3>
                                  </span>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Amount</label>
                                          <?php
                                          echo form_input(array('type' => 'number', 'name' => 'amount', 'class' => 'form-control'));
                                          ?>
                                      </div>
                                      <div class="form-group">
                                          <label>User ID:</label>
                                          <?php
                                          echo form_input(array('type' => 'text', 'name' => 'user_id', 'class' => 'form-control' , 'id' => 'user_id'));
                                          ?>
                                          <span class="text-danger" id="userName"></span>
                                      </div>
                                      <div class="form-group">
                                          <label>Remark:</label>
                                          <?php
                                          echo form_input(array('type' => 'text', 'name' => 'remark', 'class' => 'form-control'));
                                          ?>
                                      </div>
                                      <div class="form-group">
                                          <?php
                                          echo form_input(array('type' => 'submit' , 'class' => 'btn btn-success pull-right','name' => 'fundbtn','value' => 'Transfer'));
                                          ?>
                                      </div>
                                  </div>
                              </div>
                          <?php echo form_close();?>
                        </div>
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













<?php $this->load->view('footer');?>
<script>
$(document).on('blur','#user_id',function(){
    var url = '<?php echo base_url("Dashboard/User/get_user/")?>'+$(this).val();
    $.get(url,function(res){
        $('#userName').html(res)
    })
})
</script>
