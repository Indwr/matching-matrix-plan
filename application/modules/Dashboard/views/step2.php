
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
        </head>
        <body>
            <div id="wrapper" class="joffice">
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                </nav>
                <div id="main" style="padding-top: 110px;">
                    <div class="container">

                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

                        <style type="text/css">
                            .submenu div p {
                                width:60%;
                                margin: 0;
                                padding:0;
                                position: relative;
                                word-break: break-all;
                                text-align: left;
                            }
input[type=checkbox] {
   
    font-size: 26px !important;
    
}
                        </style>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                        <div id="FacebookInfoPopUp" class="modal fade in" style="background-color: rgba(0, 0, 0, 0.6);">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        If you do not consent to your personal data being used, Dway is unable to process your application.
                                    </div>
                                    <div class="modal-footer" style="margin-top:0;">
                                        <Button ID="FBcloseButton" CssClass="btn btn-default" onclick="javascript:closeButton();">Close</Button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form name="theForm" method="get" action="<?php echo base_url('Dashboard/User/Register') ?>">
                            <input type="hidden" name="country_name" value="<?php echo $country; ?>" />
                            <input type="hidden" name="sponser_id" value="<?php echo $sponser_id; ?>" />
                            <div align='center'>

                                <p>
                                    <?php echo $content['content']; ?>
                                </p>
                                <p align="center">
                                    <input id="agree" name="agree" type="checkbox" value="1" required="required" onclick="javascript:clickAgree()">
                                    <input type="hidden" name="checkAlert" value="0" />
                                    <strong><font size="3" color="#000000">
                                       I Agree
                                        </font></strong>
                                </p>
                                <br/><br/>By clicking “Continue”, I certify that the forgoing statements are true and that I am at least 18 years old (or if a company, that I am authorized to apply and agree to be a Distributor) and that I have read and agree to be bound by the Distributor Agreement.
                                <p align="center" style="padding-top:30px;">
                                    <input type="submit" value="Continue" class="btn btn-primary">&nbsp;&nbsp;
                                    <input type="button" value="Decline" class="btn btn-primary" onclick="window.location = '<?php echo base_url('Dashboard/User'); ?>';">
                                    <br />
                                    <a href="/join1.asp?siteurl=tinnasaab&fn="> </a> <font face="Verdana, Arial, Helvetica, sans-serif"></font>
                                <p align='left' class="HebRight">&nbsp;</p>

                            </div>
                        </form>
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
