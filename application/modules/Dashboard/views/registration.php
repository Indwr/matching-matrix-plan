<html lang="en">
    <head>
        <base href="../">
        <meta charset="utf-8" />
        <title><?php echo title; ?></title>
        <meta name="description" content="Updates and statistics">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
                },
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <style>
            input#addchk {
                width: auto !important;
                height: auto !important;
                max-width: 20px !important;
                max-height: 20px !important;
                padding: 0px !important;
                margin: 0px 10px 0px 0px !important;
                float: left;
            }
        </style>
<!--        <style>.alert.alert-warning i {
color: #fff !important;
}</style>-->
        <link href="<?php echo base_url() ?>/classic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/css/demo1/skins/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/css/demo1/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/css/demo1/skins/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>/classic/assets/css/demo1/skins/aside/dark.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo base_url('classic/logo.png') ?>" />
    </head>
    <body>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid container" id="kt_content">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo-menu">
                        <a href="index.php"><img src="<?php echo base_url('classic/logo.png'); ?>"></a>
                    </div>
                </div>
            </div>
            <?php
            if ($form_open == 1) {
                echo form_open('', array('id' => 'regfrm'));
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">
                                        Join the Dway Family
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">                                    
                                        WEBSITE ADDRESS SELECTION
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="form-group form-group-last">
                                    <div class="alert alert-warning" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                        <div class="alert-text">
                                            As a DWAY Distributor, you are provided with a personal web page.
                                            Promote your opportunity by directing visitors to your personal web page!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Sponsor Name</label>
                                    <div class="col-6">
                                        <?php
                                        echo form_input(array('name' => 'sponser_name', 'type' => 'text', 'class' => 'form-control', 'required' => 'required', 'value' => $sponser['first_name'] . '  ' . $sponser['last_name'], 'readonly' => 'readonly'));
                                        ?>
                                        <span>
                                            <?php echo form_error('sponser_name', '<div class="error">', '</div>'); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Sponser ID</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="<?php echo $sponser['user_id']; ?>" name="sponser_id" required="required" readonly="readonly">
                                        <input type="hidden" value="<?php echo $position; ?>" name="position" required="required" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Main Site URL: </label>
                                    <div class="col-6">
                                        <input class="form-control" type="url" value="" name="main_site_url" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">                                    
                                        DISTRIBUTOR INFORMATION
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Courtesy Title</label>
                                    <select name="courtesy_title" id="ddlCourtesyTitle" class="col-6" required="required">
                                        <option value=""></option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms." selected="selected">Ms.</option>
                                        <option value="Company">Company</option>

                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">First Name(English)</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="first_name" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Last Name (English)</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="last_name" required="required">
                                    </div>
                                </div>
                                <div class="form-group form-group-last">
                                    <div class="alert alert-warning" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                        <div class="alert-text">
                                            Commission Account Information - Bank (Optional)
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Bank Code :</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="bank_code" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Bank Account Number :</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="bank_account_number" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Company :</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="Company" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Display Name :</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="display_name" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Date Of Birth:</label>
                                    <div class="col-md-2">
                                        <select name="birth_month" class="form-control" required="required">
                                            <?php
                                            for ($i = 1; $i < 32; $i++)
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            ?>
                                        </select>
                                        dd
                                    </div>
                                    <div class="col-md-2">
                                        <select name="birth_date" class="form-control">
                                            <?php
                                            foreach ($days as $key => $day)
                                                echo '<option value="' . ($key) . '">' . $key . '-' . $day . '</option>';
                                            ?>
                                        </select>
                                        mm
                                    </div>
                                    <div class="col-md-2">
                                        <select name="birth_year" class="form-control" required="required">
                                            <option></option>
                                            <?php
                                            for ($i = 1990; $i < 2019; $i++)
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            ?>
                                        </select>
                                        yy
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Identification Type:</label>
                                    <select name="identification_type" class="col-6">
                                        <option value="passport">Passport</option>
                                        <option value="identity_card">Identity Card</option>
                                        <option value="driving_license">Driving License</option>
                                        <option value="business_registration_number">Business Registration number</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Identification No: </label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="identification_number" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Co -Applicant Name</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="co_applicant_name" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Co-App Identification No :</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" name="co_app_identification_no" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">                                    
                                        CONTACT INFORMATION
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="form-group form-group-last">
                                    <div class="alert alert-warning" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                                        <div class="alert-text">
                                            Please ensure your email is correct. It will be a primary source of system communications
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Email:</label>
                                    <div class="col-6">
                                        <input class="form-control" type="email" value="" name="email" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Phone(No dashes):</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" pattern="[0-9]" name="phone" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Cell Phone:</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" pattern="[0-9]"  value="" name="cell_phone" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">                                    
                                        MAILING ADDERESS
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Mailing Name:</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="mail" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Address Line 1</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="address_line1" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Address Line 2</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="address_line2" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">City</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="city" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">State</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="state" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Postal Code</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" pattern="[0-9]" name="postal_code" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Country</label>
                                    <div class="col-6">
                                        <?php
                                        echo country_dropdown('country', 'country', 'form-control', 'SG', array('US', 'SG', 'IN'), '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">                                    
                                        SHIPPING ADDERESS
                                    </h3>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-6">
                                        <input class="form-control" type="checkbox" id="addchk">Shipping same as Mailing
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Mailing Name:</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="smail" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Address Line 1</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="saddress_line1" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Address Line 2</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="saddress_line2" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">City</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="scity" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">State</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" name="sstate" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Postal Code</label>
                                    <div class="col-6">
                                        <input class="form-control" type="text" value="" pattern="[0-9]" name="spostal_code" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-6 col-form-label">Country</label>
                                    <div class="col-6">
                                        <?php
                                        echo country_dropdown('scountry', 'scountry', 'form-control', 'SG', array('US', 'SG', 'IN'), '');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="checkbox" required="required"/>United States Treasury Department Form W-8BEN Disclosure - - A valid Social Security or Employer Identification Number is 
                        required for all U.S. citizens, residents or other U.S. persons. It is also required for all foreign entities that will claim income that is 
                        effectively connected with the conduct of a trade or business in the United States. If applicable, I certify that the Tax ID number I have 
                        entered is my correct taxpayer identification number. Otherwise, under penalties of perjury, I certify the following: 1. I am the beneficial 
                        owner (or am authorized to sign for the beneficial owner) of all the income to which this form relates, 2. The beneficial owner is not a U.S. 
                        Person, 3. The income to which this form relates is not effectively connected with the conduct of a trade or business in the United States. 
                        Furthermore, I authorize this form to be provided to any withholding agent that has control, receipt, or custody of the income of which I am
                        the beneficial owner of any withholding agent that can disburse or make payments of the income of which I am the beneficial owner.<br>
                        <button class="btn btn-success">Complete Signup</button>
                        <button class="btn btn-success">RESET</button>
                    </div>
                </div>
                <?php
            } else {
                echo'<div class="row"><h2 class="text-center">' . $message . '</h2></div>';
                echo'<div class="row"><a href="' . base_url('Dashboard/User/login') . '">Login</a></h2></div>';
            }
            ?>
        </form>
    </div>
</body>
<script>

    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin:: Global Mandatory Vendors -->
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/raphael/raphael.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/morris.js/morris.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>

<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="<?php echo base_url() ?>/classic/assets/js/demo1/scripts.bundle.js" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/classic/assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="<?php echo base_url() ?>/classic/assets/js/demo1/pages/dashboard.js" type="text/javascript"></script>
<script>
    $(document).on('change', '#addchk', function () {
        $('#regfrm input[name="smail"]').val($('#regfrm input[name="mail"]').val())
        $('#regfrm input[name="saddress_line1"]').val($('#regfrm input[name="address_line1"]').val())
        $('#regfrm input[name="saddress_line2"]').val($('#regfrm input[name="address_line2"]').val())
        $('#regfrm input[name="scity"]').val($('#regfrm input[name="city"]').val())
        $('#regfrm input[name="sstate"]').val($('#regfrm input[name="state"]').val())
        $('#regfrm input[name="spostal_code"]').val($('#regfrm input[name="postal_code"]').val())
//        alert($('#country').val());
        $('#scountry').val($('#country').val())
    })
</script>
<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>