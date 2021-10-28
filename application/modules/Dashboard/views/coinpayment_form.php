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
                                    <p class="text-white">Get your paid
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
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                <p>Dear <?php echo $this->session->tempdata('name');?>,</p>

                                                                <p>Thanks for choosing 1FX, You are hardly welcome to our trading platform.</p>
                                                                <br>
                                                                <b>Your Email: <?php echo $this->session->tempdata('email');?><br></b>
                                                                <b>Your Mobile no: <?php echo $this->session->tempdata('phone');?><br></b>
                                                                <b>Selected Package: $<?php echo $package['price'];?><br></b>

                                                                <p>You will also get email after successfully payment.</p>

                                                                <p>Thank you</p>
                                                                </div>
                                                                <div class="col-md-12">
                                                                <form action="https://www.coinpayments.net/index.php" id="paymentform" method="post">
                                                                    <input type="hidden" name="cmd" value="_pay_simple">
                                                                    <input type="hidden" name="reset" value="1">
                                                                    <input type="hidden" name="merchant" value="a1002aa1b5de93f8ed00fc636026106d">
                                                                    <input type="hidden" name="item_name" value="<?php echo $package['title'];?>">
                                                                    <input type="hidden" name="item_desc" value="<?php echo $package['description'];?>">
                                                                    <input type="hidden" name="currency" value="USD">
                                                                    <input type="hidden" name="amountf" id="amountf" value="<?php echo $package['price'];?>">
                                                                    <input type="hidden" name="coins" value="1">
                                                                    <input type="hidden" name="user_id" value="<?php echo $this->session->tempdata('user_id');?>">
                                                                    <input type="hidden" name="first_name" value="<?php echo $this->session->tempdata('user_id');?>">
                                                                    <input type="hidden" name="last_name" value="<?php echo $this->session->tempdata('name');?>">
                                                                    <input type="hidden" name="email" value="<?php echo $this->session->tempdata('email');?>">
                                                                    <input type="hidden" name="success_url" value="">
                                                                    <input type="hidden" name="cancel_url" value="">
                                                                    <input type="hidden" name="want_shipping" value="0">
                                                                    <button type="submit" class="btn btn-success">Click Here to Pay</button>
                                                                </form>
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
