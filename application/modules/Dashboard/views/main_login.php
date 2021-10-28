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
        max-width: 200px;
        margin-bottom: 20px;
        margin: 7px;
        background: #fff;
        border-radius: 4PX;
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
                            <div class="text-primary text-center">
                                <a href="#" class="logo logo-admin">
                                   <img src="<?php echo base_url(logo); ?>" alt="logo">
                                </a>
                                <h5 class="text-dark font-size-20">Welcome Back !</h5>
                                <p class="text-dark">Sign in to continue to <?php echo title; ?></p>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="">
                                <div class="panel panel-primary">

                <p style="color:red;text-align: center;"><?php echo $message; ?></p>
                <?php echo form_open(base_url('Dashboard/User/MainLogin'), array('id' => 'loginForm')); ?>

                    <div class="panel-body">
                        <div class="details password-form">

                            <div class="form-group has-feedback">
                                <div class="row-holder">
                                    <?php
                                    echo form_input(array(
                                        'type' => 'text',
                                        'name' => 'user_id',
                                        'class' => 'form-control',
                                        'placeholder' => 'User ID',
                                        'required' => 'true',
                                        'value' => 'admin',
                                    ));
                                    ?>
                                    <span class="ion ion-log-in form-control-feedback "></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">

                                <div class="row-holder">
                                    <?php
                                    echo form_input(array(
                                        'type' => 'password',
                                        'name' => 'password',
                                        'class' => 'form-control',
                                        'placeholder' => 'Password',
                                        'required' => 'true',
                                        'value' => 'mlm_company',
                                    ));
                                    ?>
                                    <span class="ion ion-log-in form-control-feedback "></span>
                                </div>
                            </div>

                            <div class="form-group has-feedback">
                                <button id="loginBtn" type="submit" class="btn btn-info btn-block margin-top-10" name="Submit" value="Login">Sign in </button>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group text-center">
                            <a href="<?php echo base_url('Dashboard/Register');?>" style="background: #4CAF50;
                                color: #fff;
                                padding: 11px;
                                border-radius: 4px;
                                width: 100%;
                                display: block;">Register Now</a>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group" style="text-align:center;">
                                <a class="forgot-password" style="        color: white;
                                    background: #48b9f2;
                                    padding: 10px;
                                    display: block;
                                    border-radius:4px;" href="<?php echo base_url('Dashboard/forgot_password'); ?>">Forgot password?</a>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
					</div>

                            </div>


              <div class="text-center">
                        <p>Already have an account?<a href="<?php echo base_url('Dashboard/User/MainLogin'); ?>" class="text-info m-l-5"> Sign In</a></p>
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
