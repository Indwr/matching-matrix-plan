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
		     .bg-black{
       	 		background-color: #000;
    		}
    </style>

    </head>

    <body>

        <!-- <div class="home-btn d-none d-sm-block">
            <a href="index-2.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div> -->
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-black">
                                <div class="text-primary text-center p-2">
                                    <h5 class="text-white font-size-20">Register</h5>
                                    <p class="text-white">Get your free <?php echo title; ?> account now.</p>
                                    <a href="index-2.html" class="logo logo-admin">
                                        <img src="<?php echo base_url('NewDashboard/'); ?>assets/images/logo.png" style="max-width: 160px;margin-bottom: 20px;margin: 0;">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body p-2">
                                <div class="p-3">
                                    <div class="form-element">
							<!-- <h5><?php //echo title;   ?></h5> -->
							<span class="text-danger">
								<?php echo $this->session->flashdata('message'); ?>
							</span>
							<?php echo form_open('Dashboard/Register?sponser_id=' . $sponser_id, array('id' => 'RegisterForm')); ?>
							<div class="form-group has-feedback">
									<input type="text" class="form-control" id="sponser_id" placeholder="Enter Sponser ID" value="<?php echo $sponser_id; ?>" name="sponser_id" required>
									<span class="ion ion-locked form-control-feedback "></span>

									<span class="text-danger"> <?php echo form_error('sponser_id'); ?></span>
									<span id="errorMessage" class="text-danger"> </span>
							</div>
							<div class="form-group has-feedback">
								<div class="form-field">
									<input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo set_value('name'); ?>" required>
									<span class="ion ion-locked form-control-feedback "></span>
								</div>
								<span class="text-danger"> <?php echo form_error('name'); ?></span>
							</div>
							<div class="form-group has-feedback">
								<div class="form-field">
									<input type="text" class="form-control" placeholder="Enter Email" name="email" value="<?php echo set_value('email'); ?>">
									<span class="ion ion-locked form-control-feedback "></span>
								</div>
								<span class="text-danger"> <?php echo form_error('email'); ?></span>
							</div>
							<div class="form-group has-feedback">
								<label for="pwd">Position:</label>
								<div class="form-field">
									<select class="form-control" name="position">
										<?php if($_GET['position'] == 'R'){ ?>
											<option value="R">RIGHT</option>
										<?php }else if($_GET['position'] == 'L'){?>
											<option value="L">LEFT</option>
										<?php }
                      					else {
												echo '<option value="L" selected>LEFT</option>
												<option value="R">RIGHT</option>';
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group has-feedback">
								<label for="pwd">Country:</label>
								<div class="form-field">
									<select class="form-control" name="country">
										<?php
										foreach($countries as $key => $country)
										echo'<option value="'.$country['name'].'">'.$country['name'].'</option>';
										?>
									</select>
								</div>
							</div>
							<div class="form-group has-feedback">
									<div class="row">
										<div class="col-md-12 col-xs-12">  <div class="form-field"><input type="phone" class="form-control"  placeholder="Enter Phone" name="phone" value="<?php echo set_value('phone'); ?>" required>
											<span class="ion ion-locked form-control-feedback "></span>
										</div></div>
									<span class="text-danger"> <?php echo form_error('phone'); ?></span>
								</div>
							</div>
							<div class="form-group has-feedback">
								<label for="pwd">Package:</label>
								<div class="form-field">
									<select class="form-control" name="package_id">
										<?php
										foreach($package as $pk => $pack)
										echo'<option value="'.$pack['id'].'">'.$pack['price'].'</option>';
										?>
									</select>
								</div>
							</div>
							<div class="form-group has-feedback">
								<label for="pwd">Account Type:</label>
								<select name="accountType" class="form-control">
									<option value="investment">For Investment</option>
									<option value="token">For Token</option>
									<option value="trading">For Trading</option>
								</select>
							</div>
							<div class="Accept">
									<span>
											<!-- <input id="chTerms" name="chTerms" type="checkbox" required="required"> -->
									</span>&nbsp;
									I have read the   <a style="cursor:pointer;color:red; font-size:16px" target="_blank" href="#" target="_blank">Terms &amp; Conditions</a>

							</div>
							<div class="form-group has-feedback">
									<button type="submit" class="btn btn-info btn-block margin-top-10">Submit</button>
							</div>

							<?php echo form_close(); ?>
							<p style="display:none"><a href="<?php echo base_url('Site/Main/Register'); ?>">REGISTER NOW!</a></p>



					</div>

                                </div>
                            </div>
    						<div class="text-center">

                            <p>Already have an account ? <a href="<?php echo base_url('Dashboard/User/MainLogin'); ?>" class="font-weight-medium text-primary"> Login </a> </p>
                          <!--   <p>© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by fortunesclub</p> -->
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
