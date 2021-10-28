<?php include_once'header.php'; ?>
<div id="content" class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h2 class="page-titel">
        <spna style="">Shopping </spna> /   Purchase Course
    </h2>

    <!-- END page-header -->
    <!-- BEGIN wizard -->
    <div id="rootwizard" class="wizard wizard-full-width">
        <!-- BEGIN wizard-header -->

        <!-- END wizard-header -->
        <!-- BEGIN wizard-form -->

            <div class="wizard-content tab-content">
                <!-- BEGIN tab-pane -->
                <div class="tab-pane active show" id="tabFundRequestForm">
                  <h1 style="font-size:20px">Hi If you want to Purchase Course</h1>
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-6 -->


                          <div class="col-md-6"><a href="https://guruskool.in/lds/website-designing-course-li?utm_source=affiliate&utm_medium=network&utm_campaign=affiliates-guruskool&utm_term=term-aff-523&ref=523"><img style="max-width:100%" src="<?php echo base_url('uploads/'); ?>cource.jpeg"></a>
</div>
                          <div class="col-md-6">  <a href="https://guruskool.in/lds/digital-marketing-course-drk?utm_source=affiliate&utm_medium=network&utm_campaign=affiliates-guruskool&utm_term=term-aff-523&ref=523"><img style="max-width:100%"  src="<?php echo base_url('uploads/'); ?>cource1.jpeg"></a>
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
</div>






<?php include_once'footer.php'; ?>
<script>
    $(document).on('blur','#user_id',function(){
        var user_id = $('#user_id').val();
        if(user_id != ''){
            var url  = '<?php echo base_url("Dashboard/get_app_user/")?>'+user_id;
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
        if (confirm('Are You Sure U want to Withdraw This Account')) {
            yourformelement.submit();
        } else {
            return false;
        }
    })
    $(document).on('blur','#amount',function(){
      var amount = $(this).val();
    //   var netAmount = amount * 90 /100;
    //   $('#netAmount').text(netAmount);
    })
    function calculate_net_amount(){
        var amount = $('#amount').val();
        var bankAmount;
        var tds = 0;
        var transfer_wallet = $("input[name='pin_transfer']:checked").val();
        console.log(transfer_wallet);
        if(transfer_wallet == 0){
            bankAmount = amount * 85 /100;
            // tds = amount * 5 /100;
        }else{
            bankAmount = amount * 85 /100;
            // tds = amount * 5 /100;
        }

        var NetbankAmount = (bankAmount);
        $('#NetbankAmount').text(NetbankAmount);
        $('#bankAmount').text(bankAmount);
        $('#tds').text(tds);
    }
</script>
