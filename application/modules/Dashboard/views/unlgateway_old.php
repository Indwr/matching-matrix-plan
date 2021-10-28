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
            img {
                max-width: 400px;
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
                                                            <div class="row justify-content-center">
                                                                <div class="w-100 mb-3">
                                                                    <p class="h6 mb-2">
                                                                        <a class="btn btn-dark btn-sm" href="
                                                                            <?php echo base_url('Dashboard/Register');?>">Cancel My Order
                                                                        </a>
                                                                    </p>
                                                                    <div class="card shadow-lg">
                                                                        <div class="">
                                                                            <div class="p-t-30 p-b-10 text-center">
                                                                                <p>Welcome <?php echo $this->session->tempdata('name');?>,</p>
                                                                                <p>You are welcome to 1FX Kindly send (<b>$<?php echo $package['price'];?></b>)UNL from APP Onces its verified you will get email for your ID Activation.</p>
                                                                                <p>Thanks Package : <b>$<?php echo $package['price'];?></b></p>
                                                                            </div>
                                                                            <div class="form-group has-feedback">
                                                                                <label for="pwd">Selecet Payment Mode:</label>
                                                                                <select name="tokenType" class="form-control" id="tokenType" onchange="docload()">
                                                                                    <option value="">--Select Type--</option>
                                                                                    <option value="unl">UNL App</option>
                                                                                    <option value="tron">TronLink</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group" style="display: none;" id="barcode">
                                                                                <img style="max-width:400px" src="<?php echo base_url('uploads/unl-coin.jpeg');?>">
                                                                            </div>
                                                                            <div class="form-group" style="display: none;" id="barcode1">
                                                                                <img style="max-width:400px" src="<?php echo base_url('uploads/unl-coin1.jpeg');?>">
                                                                            </div>
                                                                            <!-- <div class="bg-dark rounded-bottom card-body text-white">
                                                                                <div class="rounded p-3 bg-white-translucent">
                                                                                    <p class="font-size-sm mb-0" style="color:red">
                                                                                        <span class="text-primary">ATTENTION</span> - Please send bitcoins with priority mining fee, otherwise it may take a long time to confirm the payment.
                                                                                    </p>
                                                                                </div>
                                                                            </div> -->
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
        <script src="<?php echo base_url('NewDashboard/') ?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('NewDashboard/') ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url('NewDashboard/') ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url('NewDashboard/') ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url('NewDashboard/') ?>assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url('NewDashboard/') ?>assets/js/app.js"></script>
        <script>
            // function docload(){
            //     var token = document.getElementById("tokenType").value;
            //     //var barcode = document.getElementById("barcode");
            //         //barcode.parentNode.removeChild(barcode);
            //     if(token == 'unl'){
            //         var img = document.createElement("img");
            //         img.src = "<?php echo base_url('uploads/unl-coin.jpeg');?>";
            //         var src = document.getElementById("barcode");
            //         src.appendChild(img);
            //     }else if(token == 'tron'){
            //         var img = document.createElement("img");
            //         img.src = "<?php echo base_url('uploads/unl-coin1.jpeg');?>";
            //         var src = document.getElementById("barcode");
            //         src.appendChild(img);
            //     }
            // }
            function docload(){
                var token = document.getElementById("tokenType").value;
                if(token == 'unl'){
                    document.getElementById("barcode").style.display = "block";
                    document.getElementById("barcode1").style.display = "none";
                }else if(token == 'tron'){
                    document.getElementById("barcode").style.display = "none";
                    document.getElementById("barcode1").style.display = "block";
                }else{
                    document.getElementById("barcode").style.display = "none";
                    document.getElementById("barcode1").style.display = "none";
                }
            }
        </script>
    </body>
</html>
