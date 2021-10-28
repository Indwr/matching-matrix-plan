
<div class="color-scheme-01">
    <!DOCTYPE HTML>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="HandheldFriendly" content="true" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Dway</title>
            <meta http-equiv='cache-control' content='no-cache'>
            <meta http-equiv='expires' content='0'>
            <meta http-equiv='pragma' content='no-cache'>
            <link href="<?php echo base_url('classic/register/'); ?>css/font-awesome.min.css" rel="stylesheet">
            <link href="<?php echo base_url('classic/register/'); ?>css/bootstrap.min.css" rel="stylesheet" media="screen">
            <link rel="stylesheet" href="<?php echo base_url('classic/register/'); ?>css/all_Jworld.css?v=3.7" media="all">
            <script src="<?php echo base_url('classic/register/'); ?>js/jquery-1.12.1.min.js"></script>
            <script src="<?php echo base_url('classic/register/'); ?>js/jquery-migrate-1.4.min.js"></script>
            <script src="<?php echo base_url('classic/register/'); ?>js/CustomJScript.js?v=2.1"></script>
            <style>
                .details .form-group {

                    height: auto !important;

                }
                .details input[type=text], .details input[type=password] {
                    margin: 0;
                    padding: 5px 5px 5px;
                    width: 100%;
                    color: #b4662b;
                    height: auto !important;
                }
                .details .label-area {

                    width: 27%;

                }
                .details .row-holder {

                    width: 70%;

                }

                .panel-primary>.panel-heading {

                    background-color: #C5B358 !important;

                }
            </style>
        </head>
        <body>
            <div id="wrapper" class="joffice">
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                </nav>
                <div id="main" style="padding-top: 50px;">
                    <div class="container">

                        <div class="color-scheme-01">
                            <section class="block">
                                <div class="row hidden-sm " style="text-align: center;">
                                    <img src="<?php echo base_url('classic/register/'); ?>logo.png" style="max-width:300px; margin-bottom:20px">
                                    <h1>MEMBERS LOGIN</h1>
                                    <p><mark style="display: inline;">You must be a Network member to be able to login!</mark></p>
                                </div>
                                <div class="row">
                                    <div class="col-md-1 hidden-sm hidden-xs">
                                        &nbsp;
                                    </div>
                                    <div id="BannerImage" class="col-md-7 hidden-sm hidden-xs" style="text-align: center; overflow: hidden;">
                                        <img name="jofficeLandingPage_wAndroid_q90" src="<?php echo base_url('classic/register/'); ?>banner.jpg" id="jofficeLandingPage_wAndroid_q90" usemap="#m_jofficeLandingPage_wAndroid_q90" alt="" class="" style="margin: auto;" />

                                    </div>
                                    <div class="col-md-4">

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h2>Payment Response</h2>
                                            </div>
                                            <p style="color:red;text-align: center;"><?php echo $this->session->flashdata('message'); ?></p>
                                            <div class="panel-body">
                                                <div class="details password-form">
                                                    <fieldset>
                                                        <div class="form-group">
                                                            <?php echo $message;?>
                                                        </div>
                                                        <center class="text-bold"><h2>Back to <a href="<?php echo base_url('Dashboard/User/MainLogin'); ?>">Login</a></h2></center>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="login icon-cookieInfo-section">
                            <div class="icon">
                                <a href="http://uniteller.ru/" target="_blank">
                                    <img style="max-width:250px" src="<?php echo base_url('classic/register/'); ?>Uniteller_Visa_MasterCard_234x45.png" /></a>
                            </div>
                            <div class="cookie-message">
                                <p>Our website uses cookies to store shopping and shipping information. You can find out more about cookies in your browser settings. However, by continuing to use our site without changing settings will result in use of cookies.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <footer id="footer" >
                    <p>&copy; 2019&nbsp;&nbsp;Dway, LLC. All rights reserved.</p>

                    <span id="siteseal"><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=HnGGTEJmFRSvmNI6Liehi4vqWovI38wYP6tGUSXlL4j4wTTKqcna5odevUuj"></script></span>
                </footer>
                <script type="text/javascript" src="<?php echo base_url('classic/register/'); ?>js/jquery.jqplot.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url('classic/register/'); ?>js/excanvas.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url('classic/register/'); ?>js/jquery.main.js"></script>
                <script type="text/javascript" src="<?php echo base_url('classic/register/'); ?>js/bootstrap.min.js"></script>
                <script language="JavaScript" type="text/javascript" src="<?php echo base_url('classic/register/'); ?>js/wz_tooltip.js"></script>
            </div>
        </body>
    </html>
</div>
