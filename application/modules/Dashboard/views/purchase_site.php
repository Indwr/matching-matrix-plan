<?php include_once'header.php'; ?>
<div id="content" class="content">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h2 class="page-titel">
        <spna style="">Online Shopping </spna> /   Online Shopping
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
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-6 -->
                        <div class="col-md-6">
                          <h1 style="    font-size: 17px;
    line-height: 32px;">Wants to start your online business and wants to create amazing websites like Amazon and flipkart !!!<br>

E-INDIANS will create amazing websites for your business<br>

Here we will also create amazing banner and logo 👌👌👌<br>

We will create amazing websites like<br>
Food ordering system<br>
Ecommerce sites<br>
Blogger websites<br>
Etc<br>
With amazing features like<br>
Chat system<br>
Feedback form<br>
Product details page<br>
Contact form (as the customer types it's query this query will come to your registered email)<br>
Amazing pop up window<br>
Etc<br>

So take your business online and improve your business <br>😉😉😉

To start your business online feel free to contact us at 9528589101<br></h1>
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
