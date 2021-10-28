<?php include'header.php' ?>
<style >
  label{
    font-size: 16px;
    padding: 0px 15px 0px 0px;
  }
</style>

<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">Change Permission</span>
            </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Management/Index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Change Permission</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
     
    <div>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body">
              <div class="card-header">
                  
                      <div class="row">
                     
              <!-- /.card-header -->
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body table-responsive p-0">
                    <?php echo $this->session->flashdata('message');?>
                    <?php echo form_open(); ?>
                    <table class="table table-hover" id="">
                        <thead>
                            <tr>
                                <th>Module</th>
                                <th>Module Name</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <tr>
                                <td>Order</td>
                                <td>
                                  <input type="checkbox" name="order" value="Order" <?php if(!empty($access['order'])) echo 'checked';?>>
                                  <label> Order</label>
                                  <input type="checkbox" name="orderdetail" value="Order Detail" <?php if(!empty($access['orderdetail'])) echo 'checked';?>>
                                  <label> Order Detail</label>
                              </td>
                            </tr>
                            <tr>
                                <td>Customer</td>
                                <td>
                                  <span>
                                    <input type="checkbox" name="manage_customer" value="Manage Customer" <?php if(!empty($access['manage_customer'])) echo 'checked';?>>
                                    <label> Manage Customer</label>
                                  </span>
                                  <span>
                                    <input type="checkbox"  name="marketing_partner" value="Marketing Partner" <?php if(!empty($access['marketing_partner'])) echo 'checked';?>>
                                    <label > Marketing Partner</label>
                                  </span>
                                  <span>
                                    <input type="checkbox" name="tree_view" value="Tree View" <?php if(!empty($access['tree_view'])) echo 'checked';?>>
                                    <label> Tree View</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox"  name="downline_list" value="Downline List" <?php if(!empty($access['downline_list'])) echo 'checked';?>>
                                    <label> Downline List </label>
                                  </span>
                                  <span>  
                                    <input type="checkbox" name="edit_customer" value="Edit Customer" <?php if(!empty($access['edit_customer'])) echo 'checked';?>>
                                    <label> Edit Customer </label>
                                  </span>
                                  <span>  
                                    <input type="checkbox"  name="block" value="Block" <?php if(!empty($access['block'])) echo 'checked';?>>
                                    <label> Block </label>
                                  </span>
                                  <span>  
                                    <input type="checkbox" name="unblock" value="Unlock" <?php if(!empty($access['unblock'])) echo 'checked';?>>
                                    <label> Unblock</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox"  name="approved_kyc" value="Approved KYC" <?php if(!empty($access['approved_kyc'])) echo 'checked';?>>
                                    <label> Approved KYC</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox" name="disapproved_kyc" value="Dis-Approved KYC" <?php if(!empty($access['disapproved_kyc'])) echo 'checked';?>>
                                   <label> Dis-Approved KYC</label>
                                  </span>
                                  <span> 
                                    <input type="checkbox"  name="send_password" value="Send Password" <?php if(!empty($access['send_password'])) echo 'checked';?>>
                                    <label> Send Password</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox" name="login_as_client" value="Login As Client" <?php if(!empty($access['login_as_client'])) echo 'checked';?>>
                                    <label> Login As Client</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox"  name="all_package_list" value="All Package List" <?php if(!empty($access['all_package_list'])) echo 'checked';?>>
                                    <label> All Package List</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox" name="move_package_list" value="Move Package List" <?php if(!empty($access['move_package_list'])) echo 'checked';?>>
                                    <label> Move Package List</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox"  name="shell_package_list" value="Shell Package List" <?php if(!empty($access['shell_package_list'])) echo 'checked';?>>
                                   <label> Shell Package List</label>
                                  </span>
                                  <span> 
                                    <input type="checkbox" name="add_shell_package" value="Add Shell Package" <?php if(!empty($access['add_shell_package'])) echo 'checked';?>>
                                    <label> Add Shell Package</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox"  name="bank_signup_customer" value="Bank Signup Customer" <?php if(!empty($access['bank_signup_customer'])) echo 'checked';?>>
                                    <label> Bank Signup Customer</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox" name="kyc_customer_list" value="KYC Customer List" <?php if(!empty($access['kyc_customer_list'])) echo 'checked';?>>
                                    <label> KYC_customer_list</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox"  name="custmer_epin" value="Custmer E-pin" <?php if(!empty($access['custmer_epin'])) echo 'checked';?>>
                                    <label> Custmer E-pin</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox" name="add_new_epin" value="Add New E-pin" <?php if(!empty($access['add_new_epin'])) echo 'checked';?>>
                                   <label> Add New E-pin</label>
                                  </span>
                                  <span> 
                                    <input type="checkbox" name="block_epin" value="Block E-pin" <?php if(!empty($access['block_epin'])) echo 'checked';?>>
                                    <label> Block E-pin</label>
                                  </span>
                                  <span>                                    
                                    <input type="checkbox" name="event_ticket_list" value="Event Ticket List" <?php if(!empty($access['event_ticket_list'])) echo 'checked';?>>
                                   <label> Event Ticket List</label>
                                  </span>
                                  <span> 
                                    <input type="checkbox" name="wallet" value="Wallet" <?php if(!empty($access['wallet'])) echo 'checked';?>>
                                   <label> Wallet</label>
                                  </span>
                                  <span> 
                                    <input type="checkbox" name="add_fund" value="Add Fund" <?php if(!empty($access['add_fund'])) echo 'checked';?>>
                                    <label> Add Fund</label>
                                  </span> 
                                  <span> 
                                   <input type="checkbox"  name="transfer_fund" value="Transfer Fund" <?php if(!empty($access['transfer_fund'])) echo 'checked';?>>
                                    <label> Transfer Fund</label>
                                  </span>
                                  <span>  
                                    <input type="checkbox" name="transfer_customer_to_customer_in_transaction_wallet" value="Transfer Customer To Customer in Transaction Wallet" <?php if(!empty($access['transfer_customer_to_customer_in_transaction_wallet'])) echo 'checked';?>>
                                     <label> Transfer Customer To Customer in Transaction Wallet</label>
                                  </span>
                                  <span>   
                                    <input type="checkbox"  name="saving_escrow_bizzcoin" value="Saving Escrow Bizzcoin" <?php if(!empty($access['saving_escrow_bizzcoin'])) echo 'checked';?>>
                                    <label> Saving Escrow Bizzcoin</label>
                                  </span>
                                  <span> 
                                    <input type="checkbox" name="request_demo" value="Request Demo" <?php if(!empty($access['request_demo'])) echo 'checked';?>>
                                   <label> Request Demo</label>
                                  </span>
                                  <span> 
                                    <input type="checkbox" name="request_live" value="Request Live" <?php if(!empty($access['request_live'])) echo 'checked';?>>
                                    <label> Request Live</label>
                                  </span>  
                              </td>
                            </tr>
                             <tr>
                                <td>Income</td>
                                <td>
                                  <input type="checkbox" name="pay_out" value="Pay Out" <?php if(!empty($access['pay_out'])) echo 'checked';?>>
                                  <label> Pay Out</label>

                                  <input type="checkbox"  name="profit_share" value="Profit Share" <?php if(!empty($access['profit_share'])) echo 'checked';?>>
                                  <label> Profit Share</label>

                                  <input type="checkbox" name="direct_income" value="Direct Income" <?php if(!empty($access['direct_income'])) echo 'checked';?>>
                                  <label> Direct Income</label>
                                  
                                  <input type="checkbox" name="binary_income" value="Binary Income" <?php if(!empty($access['binary_income'])) echo 'checked';?>>
                                  <label> Binary Income</label>

                                  <input type="checkbox" name="matching_income" value="Matching Income" <?php if(!empty($access['matching_income'])) echo 'checked';?>>
                                  <label> Matching Income</label>
                                  
                                  <input type="checkbox"  name="rank_list" value="Rank List" <?php if(!empty($access['rank_list'])) echo 'checked';?>>
                                  <label> Rank List</label>

                                  <input type="checkbox" name="fast_track_bonus_list" value="Fast Track Bonus List" <?php if(!empty($access['fast_track_bonus_list'])) echo 'checked';?>>
                                  <label> Fast Track Bonus List</label>
                                  
                                  <input type="checkbox"  name="withdraw_list" value="Withdraw List" <?php if(!empty($access['withdraw_list'])) echo 'checked';?>>
                                  <label> Withdraw List</label>

                                  <input type="checkbox" name="admin_charge" value="Admin Charge" <?php if(!empty($access['admin_charge'])) echo 'checked';?>>
                                  <label> Admin Charge</label>
                                  
                                  <input type="checkbox" name="kyc_charge" value="KYC Charge" <?php if(!empty($access['kyc_charge'])) echo 'checked';?>>
                                  <label> KYC Charge</label>

                                  <input type="checkbox" name="daily_sale" value="Daily Sale" <?php if(!empty($access['daily_sale'])) echo 'checked';?>>
                                  <label> Daily Sale</label>
                                  
                                  <input type="checkbox"  name="daily_commission" value="Daily Commission" <?php if(!empty($access['daily_commission'])) echo 'checked';?>>
                                  <label> Daily Commission</label>

                                  
                              </td>
                            </tr>
                             <tr>
                                <td>Support</td>
                                <td>
                                  <input type="checkbox" name="support" value="support" <?php if(!empty($access['support'])) echo 'checked';?>>
                                  <label> Support</label>
                                  
                              </td>
                            </tr>        
                        </tbody> 
                    </table>
                    <?php
                      echo form_submit(['type'=> 'submit','value' => 'Permission','class'=> 'btn btn-success']); 
                      echo form_close();
                    ?>
                  </div>
              </div>
            </div>
              <!-- <div class="row">
                  <div class="col-sm-12 col-md-5">
                      <div class="dataTables_info" id="tableView_info" role="status" aria-live="polite">
                          Showing <?php echo ($segament + 1) .' to  '.($i -1);?> of
                          <?php echo $total_records;?> entries</div>
                  </div>
                  <div class="col-sm-12 col-md-7">
                      <div class="dataTables_paginate paging_simple_numbers" id="tableView_paginate">
                          <?php
                          echo $this->pagination->create_links();
                          ?>
                      </div>
                  </div>
              </div> -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
          </div>
      </div>
    </div>
  </div>
   </div>
<?php include'footer.php' ?>
<script>
$(document).on('click','.blockUser',function(){
  var status = $(this).data('status');
  var user_id = $(this).data('user_id');
  var url = "<?php echo base_url('Admin/Management/blockStatus/');?>"+user_id + '/' + status;
  $.get(url,function(res){
    alert(res.message)
    if(res.success == 1)
      location.reload()
  },'json')
})
</script>