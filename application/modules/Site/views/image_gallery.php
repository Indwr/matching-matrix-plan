<?php include_once('header.php'); ?>

<link rel="stylesheet" href="<?php echo base_url('SiteAssets/'); ?>dist/jquery.fancybox.min.css">
<!-- banner -->
<section class="banner-1">
    <div class="over">

    </div>
</section>
<!-- //banner -->

<section class="wthree-row w3-about product py-5">
    <div class="container">
        <h3 class="heading-agileinfo">Achiever List <span>Gallery</span></h3>
        <span class="w3-line black"></span>
        <div class="row mt-5">
          <?php
          foreach($achievers as $key => $achiever){
              echo' <div class="col-md-3">
                          <div class="card">
                              <b class="text-center text-success">'.$achiever['name'].'</b>
                              <h4 class="text-center text-danger">'.$achiever['designation'].'</h4>
                              <div class="">
                                  <img src="'.base_url('uploads/'.$achiever['image']).'">
                              </div>
                          </div>
                      </div>';
          }
          ?>

        </div>
    </div>
</section>


<?php include_once('footer.php'); ?><script src="<?php echo base_url('SiteAssets/'); ?>dist/jquery.fancybox.min.js">
</script>
