<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?php echo title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('NewDashboard/') ?>assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url('NewDashboard/') ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url('NewDashboard/') ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url('NewDashboard/') ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

     <style>
    body{
    	background: url(https://fortunesclub.com/NewDashboard/assets/images/bg-2.jpg);
    	background-size: cover;
    	background-position: center;
    }

     .logo-admin img{
          margin-top: 18px;
          max-width: 300px;
          background: #fff;
          border-radius: 4PX;

     }
     .page-title {
        color: #4caf50;
        font-size: 32px;
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
                            <div class="text-primary text-center ">
                                <a href="#" class="logo logo-admin">
                                    <img src="<?php echo base_url(logo); ?>" alt="logo">
                                </a>
                                <h5 class="text-dark font-size-20">Welcome Back !</h5>
                                <p class="text-dark">Sign in to continue to <?php echo title; ?></p>
                            </div>
                        </div>

                        <div class="card-body ">
                            <div class="">
                                <div class="form-wrapper">
                <div class="page-header text-center">

                    <h1 class="page-title">Registration Successfull !</h1>


                    <?php
                    echo'<h5 class="mainboxes" style="margin-top:15px; color:#46afd7">' . $message . '</h5>';
                    ?>
                    <div style="font-size:20px;font-weight: bold; color:#45aed7; margin-top:20px"><a href="<?php echo base_url('Dashboard/User/MainLogin'); ?>"   style="color: white;
                        background: #4CAF50;
                        padding: 10px 30px;
                        width: 100%;
                        font-weight:normal;
                        border-radius: 4px;
                        display: block;">Clik Here to Login</a></div>

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
						$(document).on('blur', '#sponser_id', function () {
								check_sponser();
						})
						function check_sponser() {
								var user_id = $('#sponser_id').val();
								if (user_id != '') {
										var url = '<?php echo base_url("Dashboard/User/get_user/") ?>' + user_id;
										$.get(url, function (res) {
												$('#errorMessage').html(res);
										})
								}
						}
						check_sponser();
						$(document).on('submit', '#RegisterForm', function () {
								if (confirm('Please Check All The Fields Before Submit')) {
										yourformelement.submit();
								} else {
										return false;
								}
						})
				</script>
</body>
</html>
