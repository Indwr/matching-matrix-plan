<?php include_once'header.php'; ?>
<div id="content" class="content">

  <h2 class="page-titel">
      <spna style="">Withdraw </spna> /  Beneficiary List
  </h2>

  <div id="rootwizard" class="wizard wizard-full-width">
      <!-- BEGIN wizard-header -->

      <!-- END wizard-header -->
      <!-- BEGIN wizard-form -->

          <div class="wizard-content tab-content">
              <!-- BEGIN tab-pane -->
              <div class="tab-pane active show" id="tabFundRequestForm">
            <div class="row">
                <div class="col-md-6">
                <h3><?php echo $this->session->flashdata('message');?></h3>

                    <div id="some_div"></div>
                    <a style="    background: #f1863b;
    padding: 10px;
    display: inline-block;
    color: #fff;
    font-size: 19px;
    font-weight: bold;" href="https://successworldlife.in/Dashboard/Withdraw/AddBeneficiary">Click Here to Add New Beneficiary</a>
                    <?php
                foreach($beneficiary as $ben){
                    ?>
                    <div class="card" style="width:400px">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $ben['beneficiary_name'];?></h4>
                            <p class="card-text">
                                Account Number : <?php echo $ben['beneficiary_account_no'];?> <br>
                                IFSC Code <?php echo $ben['beneficiary_ifsc'];?><br>
                                Bank <?php echo $ben['beneficiary_bank'];?><br>
                                Bank Branch <?php echo $ben['beneficiary_branch'];?> <br>
                                Benficiary ID<?php echo $ben['beneficiaryid'];?>
                            </p>
                            <a
                                href="<?php echo base_url('Dashboard/Withdraw/withdraw_amount/'.$ben['beneficiaryid']);?>">Send
                                Money</a>
                        </div>
                    </div>

                    <?php
                }
                ?>
                </div>
            </div>
        </div>  </div>
    </div>
</div>
<?php include_once'footer.php'; ?>
