<?php
include_once 'header.php';
$userinfo = userinfo();
?>
<script src="<?php echo base_url('classic/assets/plugin/'); ?>jquery.js"></script>
<script src="<?php echo base_url('classic/assets/plugin/'); ?>croppie.js"></script>
<link rel="stylesheet" href="<?php echo base_url('classic/assets/plugin/'); ?>croppie.css"/>
<style>
    .content-header {
        padding: 20px;
        border-bottom: 1px solid #efefef;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Id Card</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Profile/li>
                        <li class="breadcrumb-item active"> Idenitity Card/li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="id-card-wrapper">
                        <div class="id-card">
                            <div class="id-img">
                                <img src="<?php echo base_url(logo) ?>" alt="Winto Logo" class="brand-image img-circle elevation-1">
                            </div>
                            <div class="id-content">
                                <h4>ID Number : <span><?php echo $userinfo->user_id; ?></span></h4>
                                <h4>Name : <span><?php echo $userinfo->name; ?></span></h4>
                                <h4>Phone : <span> <?php echo $userinfo->phone; ?></span></h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
