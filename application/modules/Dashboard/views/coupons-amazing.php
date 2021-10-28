<?php include 'header.php' ?>
<div class="content-wrapper" style="min-height: 378px; background:white">
  <style>
.h3cpass
{

  background: #58bdad;
    color: #fff;
    text-align: center;
    font-size: 20px;
    line-height: 28px;
    padding: 10px 0px;
}

  </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Amazing Deals Shopping Coupon's<?php //echo $header;?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php //echo $header;?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                for($i = 1; $i <= 40;$i++){
                    echo'<div class="col-sm-3">
                    <img src="'.base_url('uploads/').'coupons-amazing.jpg"  style="max-width:100%" >
                    <h3 class="h3cpass">Amazing Coupon No. '.$i.'<br> AMAZ'.rand(10000,99999).'<br> <small></small></h3>
                  </div>';
                }
                ?>
              
            </div>
        </div>
    </div>
</div>
<?php include'footer.php' ?>
