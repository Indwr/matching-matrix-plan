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
        <spna style="">Withdraw </spna> /   Transfer Income to Another User
    </section>

    <!-- END page-header -->
    <!-- BEGIN wizard -->
    <div class="card">
        <div class="card-body">
       <h3 class="page-header">
        <small>Minimum Transfer Amount Rs.<?php echo $mini_transfer['minimum_transfer']; ?></small>
    </h3>
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
                            <?php if($mini_transfer['transfer_button'] == 1) {
                                ?>
                            <?php echo form_open('',array('id' => 'TopUpForm'));?>
                            <span class="text-danger"><?php echo $this->session->flashdata('message'); ?></span>
                            <div class="form-group">
                                <label style="font-size:20px; color:red">Available balance (Rs.<?php echo $balance['balance'];?>)</label><br>
                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?php echo set_value('amount');?>"/>
                                <span class="text-danger"><?php echo form_error('amount')?></span>
                            </div>
                            <?php if(empty($eWallet)):?>
                            <div class="form-group">
                                <label>User ID</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User ID" value="<?php echo set_value('user_id');?>"/>
                                <span class="text-danger" id="errorMessage"><?php echo form_error('user_id')?></span>
                            </div>
                            <?php endif;?>
                            <?php if(!empty($eWallet)):?>
                            <div class="form-group">
                                <label>User ID</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User ID" value="<?php echo $this->session->userdata['user_id'];?>" readonly>
                                <span class="text-danger" id="errorMessage"><?php echo form_error('user_id')?></span>
                            </div>
                            <?php endif;?>
                            <div class="form-group">
                                <button type="subimt" name="save" class="btn btn-success" />Transfer Now</button>
                            </div>
                            <?php echo form_close();?>
                        <?php 
                    }else{
                        echo '<h2 class="text-danger">Closed</h2>';
                    }

                        ?>
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
</div>
    <!-- END wizard -->
</div>
</div>
</div>
</div>






<?php include_once'footer.php'; ?>
<script>
    $(document).on('blur','#user_id',function(){
        var user_id = $('#user_id').val();
        if(user_id != ''){
            var url  = '<?php echo base_url("Dashboard/User/check_sponser/")?>'+user_id;
            $.get(url,function(res){
                if(res.success == 1){
                    $('#errorMessage').html(res.user.name);
                }else{
                    $('#errorMessage').html(res.message);
                }

            },'json')
        }
    })
    $(document).on('submit','#TopUpForm',function(){
        if (confirm('Are You Sure U want to Transfer This Account')) {
            yourformelement.submit();
        } else {
            return false;
        }
    })
</script>
