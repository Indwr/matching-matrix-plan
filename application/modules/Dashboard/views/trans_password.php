<?php
include_once 'header.php';
$userinfo = userinfo();
?>
<script src="<?php echo base_url('classic/assets/plugin/'); ?>jquery.js"></script>
<script src="<?php echo base_url('classic/assets/plugin/'); ?>croppie.js"></script>
<link rel="stylesheet" href="<?php echo base_url('classic/assets/plugin/'); ?>croppie.css"/>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Change Transaction Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                       <!--  <li class="breadcrumb-item active"> Genelogy View</li> -->
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="bg-white p-4">
                        <h2 class="text-center"><?php echo $this->session->flashdata('error'); ?></h2>
                        <?php echo form_open(base_url('Dashboard/User/trans_password')); ?>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Current Transaction Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <?php
                                echo form_input(['type' => 'text', 'name' => 'cpassword', 'class' => 'form-control']);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">New Transaction Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <?php
                                    echo form_input(['type' => 'text', 'name' => 'npassword', 'class' => 'form-control']);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Verify Transaction Password</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <?php
                                    echo form_input(['type' => 'text', 'name' => 'vpassword', 'class' => 'form-control']);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-9 col-xl-9">
                                <?php
                                echo form_submit('submit', 'Save', 'class="btn btn-primary btn-brand btn-bold pull-right"');
                                echo form_close();
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
