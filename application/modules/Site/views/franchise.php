<?php include_once('header.php'); ?>

<!-- banner -->
<section class="banner-1">
    <div class="over">

    </div>
</section>

<section class="wthree-row w3-about py-5">
    <div class="container">
        <h3 class="heading-agileinfo">Our <span> Franchiser</span></h3>
        <span class="w3-line black"></span>
        <?php
        foreach($franchises as $key => $franchise){
            echo' <div class="col-md-3">
                        <div class="card">
                            <b class="text-center text-success">'.$franchise['name'].'</b>
                            <h6 class="text-center text-danger">'.$franchise['phone'].'</h6>
                            <address class="text-center text-danger">'.$franchise['address'].'</address>
                            <b class="text-center text-danger">'.$franchise['pin_code'].'</b>
                           </div>
                    </div>';
        }
        ?>
    </div>
</section>

<?php include_once('footer.php'); ?>
