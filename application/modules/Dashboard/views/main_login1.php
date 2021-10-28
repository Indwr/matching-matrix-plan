
<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Responsive Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- favicon & bookmark -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"  href="images/bookmark.png" type="image/x-icon" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <!-- Website Title -->
    <title>Login - AG Token</title>
    <!-- Stylesheets Start -->
    <link rel="stylesheet" href="<?php echo base_url('SiteAssets/'); ?>css/fontawesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('SiteAssets/'); ?>css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('SiteAssets/'); ?>css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('SiteAssets/'); ?>css/owl.carousel.min.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('SiteAssets/'); ?>style.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url('SiteAssets/'); ?>css/responsive.css" type="text/css"/>
    <script src="<?php echo base_url('classic/register/'); ?>js/jquery-1.12.1.min.js"></script>
    <script src="<?php echo base_url('classic/register/'); ?>js/jquery-migrate-1.4.min.js"></script>
    <script src="<?php echo base_url('classic/register/'); ?>js/CustomJScript.js?v=2.1"></script>
     <!-- Stylesheets End -->
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

</head>
<body>
    <!--Main Wrapper Start-->
    <div class="wrapper login-page style-3" id="top">
        <div class="cp-container">
            <div class="form-part">
                <div class="cp-header text-center">
                    <div class="logo">
                        <a href="#"><img class="light" src="<?php echo base_url('SiteAssets/'); ?>images/dark-logo.png" alt="Coinpool"></a>
                    </div>
                </div>
                <div class="cp-heading text-center">
                    <h5>Welcome Back :)</h5>
                    <p>Too keep connected with us please login with your personal information by email address and password.</p>
                </div>
                <div class="cp-body">
                  <div class="panel panel-primary">

                      <p style="color:red;text-align: center;"><?php echo $message; ?></p>
                      <?php echo form_open(base_url('Dashboard/User/MainLogin'), array('id' => 'loginForm')); ?>
                      <form id="loginForm" method="post" action="/login.asp?ReturnURL=">
                          <div class="panel-body">
                              <div class="details password-form">

                                  <div class="form-group">
                                      <div class="label-area">
                                          <label>Username:</label>
                                      </div>
                                      <div class="row-holder">
                                        <div class="form-field">
                                          <?php
                                          echo form_input(array(
                                              'type' => 'text',
                                              'name' => 'user_id',
                                              'class' => 'form-control',
                                              'placeholder' => 'User ID',
                                              'required' => 'true',
                                          ));
                                          ?>
                                      </div></div>
                                  </div>
                                  <div class="form-group">
                                      <div class="label-area">
                                          <label>Password:</label>
                                      </div>
                                      <div class="row-holder">
                                        <div class="form-field">
                                          <?php
                                          echo form_input(array(
                                              'type' => 'password',
                                              'name' => 'password',
                                              'class' => 'form-control',
                                              'placeholder' => 'Enter Your Password',
                                              'required' => 'true',
                                          ));
                                          ?>
                                        </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <button id="loginBtn" type="submit" class="btn btn-gredient btn-block" name="Submit" value="Login">Sign in </button>
                                  </div>


                                  <div class="form-group">
                                      <p class="text-center"><a class="forgot-link" href="<?php echo base_url('Dashboard/forgot_password'); ?>">Forgot password?</a> or <a href="<?php echo base_url(); ?>Dashboard/User/Register" class="forgot-link">Sign Up</a></p>
                                  </div>

                                  <div class="social-login text-center">
                                      <span>Or Sign In With</span>
                                      <div class="clearfix"></div>
                                      <a href="#" class="facebook-login"><i class="icon fab fa-facebook-f"></i>Facebook</a>
                                      <a href="#" class="google-login"><i class="icon fab fa-google"></i>Google</a>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>



                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('classic/register/'); ?>js/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('classic/register/'); ?>js/excanvas.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('classic/register/'); ?>js/jquery.main.js"></script>
    <script type="text/javascript" src="<?php echo base_url('classic/register/'); ?>js/bootstrap.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo base_url('classic/register/'); ?>js/wz_tooltip.js"></script>
</body>
</html>
