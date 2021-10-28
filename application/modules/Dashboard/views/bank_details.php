<?php
include_once 'header.php';
$userinfo = userinfo();
?>
<!-- <script src="<?php echo base_url('classic/assets/plugin/'); ?>jquery.js"></script>
<script src="<?php echo base_url('classic/assets/plugin/'); ?>croppie.js"></script>
<link rel="stylesheet" href="<?php echo base_url('classic/assets/plugin/'); ?>croppie.css"/> -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0 text-dark"> Documents for Kyc Form - ID Proof and Address Proof</h1>
                </div>
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Kyc For/li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-white p-4">
                        <h2 class="text-center"><?php echo $this->session->flashdata('error'); ?></h2>
                        <?php echo form_open(base_url('Dashboard/User/BankDetails'), ['id' => 'BankDetails']); ?>                                    
                        <span class="text-danger">
                            <?php
                            if($user_bank->kyc_status == 0){
                                echo 'Your KYC is Not Completed Please Fill Your Bank Details';
                            }elseif($user_bank->kyc_status == 1){
                                echo'Your KYC Request is Pending';
                            }elseif($user_bank->kyc_status == 2){
                                echo'Your KYC Request is Approved';
                            }elseif($user_bank->kyc_status == 3){
                                echo'Your KYC Request is Rejected';
                            }
                            ?>
                        </span>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name of Bank</label>
                                <input type="text" name="bank_name" value="<?php echo $user_bank->bank_name; ?>" class="form-control" placeholder="name" required/>
                                <span class="text-danger"><?php echo form_error('bank_name');?></span>
                            </div>
                            <!-- <h2 class="text-center">Account Holder's Details</h2> -->
                            <div class="col-md-6">
                                <label>Name of Account Holder</label>
                                <input type="text" name="account_holder_name" value="<?php echo $userinfo->name; ?>" class="form-control" placeholder="name" readonly/>
                                <span class="text-danger"><?php echo form_error('bank_account_number');?></span>
                            </div>
                            <div class="col-md-6">
                                <label>Account No</label>
                                <input type="text" name="bank_account_number" value="<?php echo $user_bank->bank_account_number; ?>" class="form-control" placeholder="name" required/>
                                <span class="text-danger"><?php echo form_error('account_holder_name');?></span>
                            </div>
                            <div class="col-md-6"> 
                                <label>IFSC Code</label>
                                <input type="text" name="ifsc_code" value="<?php echo $user_bank->ifsc_code; ?>" class="form-control" placeholder="name" required/>
                                <span class="text-danger"><?php echo form_error('ifsc_code');?></span>
                            </div>
                            <div class="col-md-6">
                                <label>Aadhar Card No.</label>
                                <input type="text" name="aadhar" value="<?php echo $user_bank->aadhar; ?>" class="form-control" placeholder="Enter Your Aadhar No." required/>
                                <span class="text-danger"><?php echo form_error('aadhar');?></span>
                            </div>
                            <div class="col-md-6"> 
                                <label>Pan</label>
                                <input type="text" name="pan" value="<?php echo $user_bank->pan; ?>" class="form-control" placeholder="Enter Your Pan No." required/>
                                <span class="text-danger"><?php echo form_error('pan');?></span>
                            </div>
                            <div class="col-md-12" style="padding-top: 10px;">
                                <?php
                                if($user_bank->kyc_status != 2){
                                    echo form_input(array('name' => 'form_type', 'type' => 'hidden', 'value' => 'bank_btn'));
                                    echo form_submit('submit', 'Submit', 'class="btn btn-success btn-bold pull-right"');
                                }
                                ?>
                            </div>
                            <?php
                            echo form_close();
                            ?>
                            <div class="row">
                            <?php
                            if($user_bank->kyc_status != 2){
                                ?>
                                <div class="col-md-3">
                                    <?php echo form_open_multipart(base_url('Dashboard/User/UploadProof/'),array('method' => 'post' , 'class' => 'proofForm'));?>
                                        <div class="loader" style="display:none;">
                                        </div>
                                        <label>Aadhar Card Front</label><br>
                                        <input type="file" name="userfile" class="" placeholder=""/><br>
                                        <input type="hidden" name="proof_type" value="id_proof"/>
                                        <img src="<?php echo base_url('uploads/' . $user_bank->id_proof); ?>" class="img-responsive" style="max-width:200px;"><br>
                                        <input type="submit" class="btn btn-success" value="upload">
                                    <?php echo form_close();?>
                                </div>
                                <div class="col-md-3">
                                     <?php echo form_open_multipart(base_url('Dashboard/User/UploadProof/'),array('method' => 'post' , 'class' => 'proofForm'));?>
                                        <div class="loader" style="display:none;">
                                        </div>
                                        <label>Aadhar Card Back</label><br>
                                        <input type="file" name="userfile" class="" placeholder=""/><br>
                                        <input type="hidden" name="proof_type" value="id_proof2"/>
                                        <img src="<?php echo base_url('uploads/' . $user_bank->id_proof2); ?>" class="img-responsive" style="max-width:200px;"><br>
                                        <input type="submit" class="btn btn-success" value="upload">
                                    <?php echo form_close();?>
                                </div>
                                <div class="col-md-3">
                                    <?php echo form_open_multipart(base_url('Dashboard/User/UploadProof/'),array('method' => 'post'  , 'class' => 'proofForm'));?>
                                        <div class="loader" style="display:none;">
                                        </div>
                                        <label>Pan Card</label><br>
                                        <input type="file" name="userfile" class="" placeholder=""/><br>
                                        <input type="hidden" name="proof_type" value="id_proof3"/>
                                        <img src="<?php echo base_url('uploads/' . $user_bank->id_proof3); ?>" class="img-responsive" style="max-width:200px;"><br>
                                        <input type="submit" class="btn btn-success" value="upload">
                                    <?php echo form_close();?>
                                </div>
                                <div class="col-md-3">
                                    <?php echo form_open_multipart(base_url('Dashboard/User/UploadProof/'),array('method' => 'post', 'class' => 'proofForm'));?>
                                        <div class="loader" style="display:none;">
                                        </div>
                                        <label>Bank Passbook/Cancel Check</label><br>
                                        <input type="file" name="userfile" class="" placeholder=""/><br>
                                        <input type="hidden" name="proof_type" value="id_proof4"/>
                                        <img src="<?php echo base_url('uploads/' . $user_bank->id_proof4); ?>" class="img-responsive" style="max-width:200px;"><br>
                                        <input type="submit" class="btn btn-success" value="upload">
                                    <?php echo form_close();?>
                                </div>
                                <?php
                            }else{
                                echo'<div class="col-md-3">
                                    <label>Aadhar Card Front</label><br>
                                    <img src="'.base_url('uploads/' . $user_bank->id_proof).'" class="img-responsive" style="max-width:200px;">
                                </div>';
                                echo'<div class="col-md-3">
                                    <label>Aadhar Card Back</label><br>
                                    <img src="'.base_url('uploads/' . $user_bank->id_proof2).'" class="img-responsive" style="max-width:200px;">
                                </div>';
                                echo'<div class="col-md-3">
                                    <label>Pan Card</label><br>
                                    <img src="'.base_url('uploads/' . $user_bank->id_proof3).'" class="img-responsive" style="max-width:200px;">
                                </div>';
                                echo'<div class="col-md-3">
                                    <label>Bank Passbook/Cancel Check</label><br>
                                    <img src="'.base_url('uploads/' . $user_bank->id_proof4).'" class="img-responsive" style="max-width:200px;">
                                </div>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 220px;
  height: 220px;
  z-index: 0;
position: absolute;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<?php include_once 'footer.php'; ?>
<script>
$("form.proofForm").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);   
    var url = $(this).attr('action');
    var t = $(this);
    t.find('.loader').css('display','block');
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function (data) {
            var res = JSON.parse(data)
            alert(res.message);
            t.append('<input type="hidden" name="'+res.csrfName+'" value="'+res.csrfHash+'" style="display:none;">')
            t.find('.loader').css('display','none');
            if(res.success == 1)
                location.reload();

        },
        cache: false,
        contentType: false,
        processData: false
    });
});
</script>