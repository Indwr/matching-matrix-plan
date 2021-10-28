<?php include_once'header.php'; ?>
 <style>
   label {
    display: inline-block;
    margin-bottom: .5rem;
    padding-top: 18px;
    font-size: 18px;
}
.form-control {
    font-size: 18px;
}
 </style>


 <div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">Site Settings</span>
            
          </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
              <li class="breadcrumb-item">Site Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    
        <div class="card">
          <div class="card-body">
        <div class="row">

          <div class="col-md-12">
          <h3 class="text-danger"><?php echo $this->session->flashdata('message');?></h3>
            <?php echo form_open_multipart('',array('id' => 'walletForm'));

            // pr($info);
            // die('oop');
            ?>
            <!-- <div class="form-group"> -->
              <div class="row">
                <div class="col-md-3">
                   <label>Company Name</label>
                   <input type="text" class="form-control" name="company_name" value="<?php echo $info['company_name'];?>" required=""/>
                </div>
                <div class="col-md-3">   
              <label>Mobile</label>
                <input type="text" class="form-control" name="mobile" value="<?php echo $info['mobile'];?>"  />
              </div>
              <div class="col-md-3">
                   <label>Email</label>
                   <input type="text" class="form-control" name="email" value="<?php echo $info['email'];?>" />
                </div>
                <div class="col-md-3">   
               <label>Website</label>
                <input type="text" class="form-control" name="website" value="<?php echo $info['website'];?>"  />
              </div>
            </div>

             <div class="row">
                <div class="col-md-3">
                   <label>User Name Text</label>
                   <input type="text" class="form-control" name="username" value="<?php echo $info['username'];?>" />
                </div>
                <div class="col-md-3">   
            <!-- <label>Direct Income %</label> -->
                <input type="hidden" class="form-control" name="direct_income" value="<?php echo $info['direct_income'];?>" />
              </div>
              <div class="col-md-3">
                   <!-- <label>Matching Income %</label> -->
                   <input type="hidden" class="form-control" name="matching_income" value="<?php echo $info['matching_income'];?>"  />
                </div>
                <div class="col-md-3">   
            <!-- <label>Overriding %</label> -->
                <input type="hidden" class="form-control" name="overriding" value="<?php echo $info['overriding'];?>" />
              </div>
            </div>

             <div class="row">
                <div class="col-md-3">
                   <label>Commission Minimum Withdraw</label>
                   <input type="text" class="form-control" name="minimum_withdraw" value="<?php echo$info['minimum_withdraw'];?>" />
                </div>
                <div class="col-md-3">   
            <!-- <label>Commission Minimum Transfer %</label> -->
                <input type="hidden" class="form-control" name="minimum_transfer" value="<?php echo $info['minimum_transfer'];?>" />
              </div>
              <div class="col-md-3">
                   <label>Bank Admin Charge %</label>
                   <input type="text" class="form-control" name="bank_charges" value="<?php echo $info['bank_charges'];?>"/>
                </div>
                <div class="col-md-3">   
            <!-- <label>Coin Payment Admin Charge %</label> -->
                <input type="hidden" class="form-control" name="coin_payment_charges" value="<?php echo $info['coin_payment_charges'];?>"/>
              </div>
            </div>

               <div class="row">
                <div class="col-md-4">
                   <label>Address</label>
                   <input type="text" class="form-control" name="address" value="<?php echo $info['address'];?>" />
                </div>
                
                <div class="col-md-4"> 
                 <label for="off">Pop-up</label><br>
                    <input type="checkbox"  name="popup_on" <?php echo ($info['popup'] == 1)? 'checked' : '';?>>
                     <label for="Popup">ON/OFF</label>
              </div>
              <div class="col-md-4">
                   <label>Popup Image</label>
                   <input type="file" class="form-control" name="image" value="<?php echo ('popup_image');?>" />
                    <?php if(!empty($info['popup_image'])):?>
                      <a target="_blank" href="<?php echo base_url('uploads/'.$info['popup_image']);?>">View</a>
                    <?php endif;?> 
              </div>

                
                <div class="col-md-4">
                  <label> Withdraw Button</label></br>
                  <input type="checkbox"  name="withdraw_button" <?php echo ($info['withdraw_button'] == 1)? 'checked' : '';?>>
                           <label>Commision Wallet</label>
                </div>
              <div class="col-md-4">
                  <!-- <label> Transfer Button</label></br> -->
                  <input type="hidden"  name="transfer_button" <?php echo ($info['transfer_button'] == 1)? 'checked' : '';?>>
                           <!-- <label>Commision Wallet</label> -->
              </div>
               
              
                
            </div>  
             <div class="form-group">
                <button type="subimt" name="save" class="btn btn-success" />Sava Changes</button>
            </div> 
            <?php echo form_close();?>
          </div>
           </div>
        </div>
        </div>
      </div>
    </div>
     </div>

<?php include_once'footer.php'; ?>
<script>
  $(document).on('change','#selectType',function(){
        $('#imageField').toggle();
        $('#videoField').toggle();
  })
</script>
