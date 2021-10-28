
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

                            div.scroll {
                                text-align:left;
                                height: 200px;
                                width: 600px;
                                overflow: auto;
                                border: 1px solid #666;
                                background-color: #eeeeee;
                                padding: 8px;
                            }

                        </style>
                        <?php
                        if ($flow == 1) {
                            ?>
                            <form name="theForm" method="get" action="<?php echo base_url('Dashboard/User/Step2') ?>">
                                <div align="center">

                                    <h1>Dway Application</h1>
                                    </p>
                                    <p>Please select the region you are signing up from.</p>
                                    <?php
                                    echo country_dropdown('country', 'country', '', 'SG', array(), '');
                                    ?>
                                    <br><br>
                                    <p>Please select language</p>
                                    <select name="language" style="width:200px;">
                                        <option value="en" >English</option>
                                        <option value="ch">Simplified Chinese</option>

                                    </select><br><br><br>
                                    <input type="hidden" value="<?php echo $sponser_id;?>" name="sponser_id" />
                                    <input type="submit" value="Continue" class="btn btn-primary">
                                    &nbsp;&nbsp;
                                    <input type="button" value="Decline" class="btn btn-primary" onclick="window.location = '<?php echo base_url('Dashboard/User');?>';">
                                    <br />
                                    <p align='left' class="HebRight">&nbsp;</p>
                                </div>
                            </form>

                            <?php
                        } else {
                            echo'Invalid Sponser id';
                        }
                        ?>

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
