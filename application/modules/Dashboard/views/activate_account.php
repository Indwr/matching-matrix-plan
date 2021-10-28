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
            <span>Activate your Account</span>
        </section>

    </div>


    <!-- END page-header -->
    <!-- BEGIN wizard -->
    <div class="card">
                                   <div class="card-body">
      <h4 class="page-header">
        <span style=""> Wallet balance (Rs.<?php echo $wallet['wallet_balance']; ?>)</span><br>


    </h4>

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
                        <label>Choose Package</label>
                        <select class="form-control" name="package_id" style="max-width: 400px" >
                            <?php
                            foreach($packages as $key => $package){
                                echo'<option value="'.$package['id'].'">'.$package['title'].' With '.currency.''.$package['price'].' </option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>User ID</label>
                        <input type="text" class="form-control" id="user_id" name="user_id"
                            value="<?php echo set_value('user_id'); ?>" placeholder="User ID"
                            style="max-width: 400px" />
                        <span class="text-danger"><?php echo form_error('user_id') ?></span>
                        <span class="text-danger" id="errorMessage"></span>
                    </div>
                    <!-- <div class="form-group">
                        <label>Account Type</label>
                        <select name="accountType" class="form-control" style="max-width: 400px">
                            <option value="investment">For Investment</option>
                            <option value="token">For Token</option>
                            <option value="trading">For Trading</option>
                        </select>
                    </div> -->
                    <!-- <div class="form-group">
                        <label>Select Payment Method</label>
                        <select name="payment_method" class="form-control" style="max-width: 400px" onchange="docload()" id="payment_method">
                            <option value="e_wallet">E-Wallet</option>
                            <option value="coinbase">CoinBase</option>
                            <option value="unl">UNL</option>
                        </select>
                    </div> -->
                    <!-- <div class="form-group" style="display:none;" id="barcode">
                        <img style="max-width:400px" src="<?php //echo base_url('uploads/unl-coin.jpeg');?>">
                    </div> -->
                    <div class="form-group" id="SaveBtn">
                        <button type="subimt" name="save" class="btn btn-success">Activate</button>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="button" name="updateProfileBtn" value="Pay With BTC" id="PayBtcBtn"
                            style="display:none;" class="btn btn-primary">
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
</div>
    <!-- END wizard -->
  </div></div>
</div>






<?php include_once'footer.php'; ?>
<script>
$(document).on('blur', '#user_id', function() {
    var user_id = $('#user_id').val();
    if (user_id != '') {
        var url = '<?php echo base_url("Dashboard/User/get_user/") ?>' + user_id;
        $.get(url, function(res) {
            $('#errorMessage').html(res);
            $('#user_id').val(user_id);
        })
    }
})
$(document).on('submit', '#TopUpForm', function() {
    if (confirm('Are You Sure U want to Topup This Account')) {
        yourformelement.submit();
    } else {
        return false;
    }
})
$(document).on('change', '#PackageId', function() {
    var package_price = parseInt($(this).children("option:selected").data('price'));
    $('#Payamount').val(package_price);
    // alert(package_price)
})
// $(document).on('change', '#payment_method', function() {
//     $('#SaveBtn').toggle();
//     $('#PayBtcBtn').toggle();
// })
$(document).on('click', '#PayBtcBtn', function(e) {
    var formData = $(this).serialize();
    var user_id = $('#user_id').val();
    console.log(formData);
    if (user_id == '') {
        alert('Please Fill User ID');
        return;
    }
    $('#BtcForm').submit();
})

function docload(){
    var payment_method = document.getElementById("payment_method").value;
    if(payment_method == 'unl'){
        document.getElementById("barcode").style.display = "block";
    }else{
        document.getElementById("barcode").style.display = "none";
    }
}
</script>
