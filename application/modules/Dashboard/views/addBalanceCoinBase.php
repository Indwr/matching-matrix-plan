<!doctype html><html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url('NewDashboard/') ?>assets/images/favicon.ico">
        <link href="<?php echo base_url('NewDashboard/') ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('NewDashboard/') ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('NewDashboard/') ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
		<style>
		    body{
		    	background: url(https://fortunesclub.com/NewDashboard/assets/images/bg-2.jpg);
		    	background-size: cover;
		    	background-position: center;
		    }
		     .bg-black{
       	 		background-color: #000;
    		}
        </style>
	</head>
    <body>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-black">
                                <div class="text-primary text-center p-2">
                                    <h5 class="text-white font-size-20">Register</h5>
                                    <p class="text-white">Get your free 
                                        <?php echo title; ?> account now.
                                    </p>
                                    <a href="index-2.html" class="logo logo-admin">
                                        <img src="
                                            <?php echo base_url('NewDashboard/'); ?>assets/images/logo.png" style="max-width: 160px;margin-bottom: 20px;margin: 0;">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-2">
                                    <div class="p-3">
                                        <div class="form-element">
                                            <div class="wizard-content tab-content">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="tab-pane active show" id="tabFundRequestForm">
                                                            <div class="row justify-content-center">
                                                                <div class="w-100 mb-3">
                                                                    <p class="h6 mb-2">
                                                                        <a class="btn btn-dark btn-sm" href="
                                                                            <?php echo base_url('Dashboard/Register');?>">Cancel My Order
                                                                        </a>
                                                                    </p>
                                                                    <div class="card shadow-lg">
                                                                        <div class="">
                                                                            <div class="p-t-30 p-b-10 text-center"></div>
                                                                            <div class="bg-dark rounded-bottom card-body text-white">
                                                                                <a class="btn btn-primary btn-block btn-lg my-link-copy mb-2" href="https://commerce.coinbase.com/checkout/<?php echo $data['id']; ?>"><span>Pay online</span></a>
                                                                                <script src="https://commerce.coinbase.com/v1/checkout.js?onload=BuyWithCrypto"></script>
                                                                                <div class="rounded p-3 bg-white-translucent">
                                                                                    <p class="font-size-sm mb-0" style="color:red">
                                                                                        <span class="text-primary">ATTENTION</span> - Please send bitcoins with priority mining fee, otherwise it may take a long time to confirm the payment.                        
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <p>Already have an account ? 
                                                                            <a href="<?php echo base_url('Dashboard/User/MainLogin'); ?>" class="font-weight-medium text-primary"> Login </a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url('NewDashboard/') ?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('NewDashboard/') ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url('NewDashboard/') ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url('NewDashboard/') ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url('NewDashboard/') ?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url('NewDashboard/') ?>assets/js/app.js"></script>
        <script>
            $.get('https://markets.api.bitcoin.com/live/bitcoin',function(res){
            console.log(res);
            $('#BtcAmount').html('BTC Amount :' + (
                <?php echo $amount;?> / res.data.BTC ));
            },'json')
        </script>
    </body>
</html>

