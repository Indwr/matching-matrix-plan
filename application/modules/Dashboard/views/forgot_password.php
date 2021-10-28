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
      max-width: 150px;
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
                                <h5 class="text-dark font-size-20">Forget  Password !</h5>
                                <p class="text-dark">Sign in to continue to <?php echo title; ?></p>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="">
                               <div class="details password-form">
              <?php echo form_open(base_url('Dashboard/forgot_password/')); ?>
                <p style="color:red;text-align: center;"><?php echo $this->session->flashdata('message'); ?></p>
              <div class="panel-body">
                  <div class="details password-form">
                      <fieldset>
                          <div class="form-group">
                              <div class="label-area">
                                  <label>User ID:</label>
                              </div>
                              <div class="row-holder">
                                  <input id="SiteURL" type='text' name='user_id' maxlength='50' class="form-control" placeholder="User ID Or Email"/>
                              </div>
                          </div>
                          <div class="form-group" style="text-align: right;">
                              <button id="signupBtn" type="submit" class="btn btn-primary w-100" name='Submit' value='Login'>Forget Password Account </button>
                          </div>

                      </fieldset>
                  </div>
              </div>
              <?php echo form_close(); ?>



                <div class="form-group text-center" style="color:#000">
                    Don't have an account? <a href="<?php echo base_url(); ?>Dashboard/Register" style="color: red;font-weight: 600;">Click Here</a>
                </div>
                <div class="form-group" style="text-align:center;">
                    <center class="text-bold"><p><a style="background: #4CAF50;
color: white;
padding: 10px 20px;
border-radius: 10px;
width: 100%;" href="<?php echo base_url('Dashboard/User/MainLogin'); ?>">Click Here to Login</a></p></center>
                </div>
            </div>
					</div>
                            </div>

                        <div class="text-center">
                        <p>Already have an account?<a href="<?php echo base_url('Dashboard/User/Register'); ?>" class="text-info m-l-5"> Sign In</a></p>
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
