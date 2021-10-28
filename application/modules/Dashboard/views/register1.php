<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <!-- Responsive Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- favicon & bookmark -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144"  href="images/bookmark.png" type="image/x-icon" />
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php echo base_url('SiteAssets/'); ?>css/bootstrap.min.css">
        <!-- font-icon css -->
        <link rel="stylesheet" href="<?php echo base_url('SiteAssets/'); ?>css/themify-icons.css">
        <!-- style css -->
        <link rel="stylesheet" href="<?php echo base_url('SiteAssets/'); ?>style.css">
        <!-- responsive css -->
        <link rel="stylesheet" href="<?php echo base_url('SiteAssets/'); ?>css/responsive.css">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
        <script src="<?php echo base_url('Assets/plugins/jquery/jquery.min.js'); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <style>
        .form-control {

    background: none !important;

    border: none !important;

    height: auto !important;
}
        </style>
    </head>



    <body>

      <div class="wrapper login-page style-3" id="top">
          <div class="cp-container">
              <div class="form-part">
                  <div class="cp-header text-center">
                      <div class="logo">
                          <a href="#"><img class="light" src="<?php echo base_url('SiteAssets/'); ?>images/dark-logo.png" alt="Coinpool"></a>
                      </div>
                  </div>
                  <div class="cp-heading text-center">
                      <h5>Welcome to AG Token</h5>
                      <p>Too keep connected with us please Sign up with your personal information by email address and password.</p>
                  </div>
                  <div class="cp-body">
                    <div class="panel panel-primary">
                        <!-- <h5><?php //echo title;   ?></h5> -->
                        <span class="text-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </span>
                        <?php echo form_open('Dashboard/User/Register?sponser_id=' . $sponser_id, array('id' => 'RegisterForm')); ?>
                        <div class="form-group">

                            <div class="form-field">
                            <input type="text" class="form-control" id="sponser_id" placeholder="Enter Sponser ID" value="<?php echo $sponser_id; ?>" name="sponser_id" required>
                          </div>
                            <span class="text-danger"> <?php echo form_error('sponser_id'); ?></span>
                            <span id="errorMessage" class="text-danger"> </span>
                        </div>
                        <div class="form-group">

                              <div class="form-field">
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo set_value('name'); ?>" required>
                          </div>
                            <span class="text-danger"> <?php echo form_error('name'); ?></span>
                        </div>
                        <div class="form-group">
                              <div class="form-field">
                            <input type="text" class="form-control" placeholder="Enter Email" name="email" value="<?php echo set_value('email'); ?>" required>
                          </div>
                            <span class="text-danger"> <?php echo form_error('email'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Position:</label>
                              <div class="form-field">
                            <select class="form-control" name="position">
                                <option value="L">LEFT</option>
                                <option value="R">RIGHT</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="country">Country:</label>
                              <div class="form-field">
                            <select class="form-control" name="country" id="country">
                                <?php
                                foreach($countries as $key => $country)
                                    echo'<option value="'.$country['id'].'" '.(($country['id'] == 231) ? 'selected' : '').' data-countryCode="'.$country['phonecode'].'">'.$country['name'].'</option>';
                                ?>
                            </select>
                          </div>
                        </div>
                        <script>
                            $(document).on('change','#country',function(){
                                var countryCode = '+'+$("#country option:selected").attr('data-countryCode');
                                $('#countryCode').val(countryCode)
                            })
                        </script>
                        <div class="form-group">

                            <div class="row">
                              <div class="col-md-4 col-xs-4">
                                  <div class="">
                                <input type="text" class="form-control" id="countryCode"  value="+1" readonly></div>
                              </div>
                              <div class="col-md-8 col-xs-8">  <div class="form-field"><input type="phone" class="form-control"  placeholder="Enter Phone" name="phone" value="<?php echo set_value('phone'); ?>" required></div></div>
                            <span class="text-danger"> <?php echo form_error('phone'); ?></span>
                          </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="pwd">PAN card:</label>
                            <input type="text" class="form-control" placeholder="Enter Pan Card" name="pan" value="<?php echo set_value('pan'); ?>" pattern="[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}"  required>
                            <span class="text-danger"> <?php echo form_error('pan'); ?></span>
                        </div> -->
                        <div class="form-group">
                            <div class="form-field">
                            <input type="password" class="form-control" placeholder="Enter Passowrd" name="password" value="<?php echo set_value('password'); ?>" required>
                          </div>
                            <span class="text-danger"> <?php echo form_error('password'); ?></span>
                        </div>
                        <div class="Accept">
                            <span>
                                <input id="chTerms" name="chTerms" type="checkbox" required="required">
                            </span>&nbsp;
                            I have read the   <a style="cursor:pointer;color:red; font-size:16px" target="_blank" href="<?php echo base_url('Site/Main/content/terms');?>" target="_blank">Terms &amp; Conditions</a>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-gredient btn-block">Submit</button>
                        </div>

                        <?php echo form_close(); ?>
                        <div class="form-group">
                            <p class="text-center">Already a member? <a class="forgot-link" href="<?php echo base_url('Dashboard/User/login'); ?>">Sign in</a></p>
                        </div>
                    </div>



                  </div>
                  <div class="social-login text-center">
                      <span>Or Sign Up With</span>
                      <div class="clearfix"></div>
                      <a href="#" class="facebook-login"><i class="icon fab fa-facebook-f"></i>Facebook</a>
                      <a href="#" class="google-login"><i class="icon fab fa-google"></i>Google</a>
                  </div>
              </div>
          </div>
      </div>



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
