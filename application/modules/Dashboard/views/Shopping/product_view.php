<?php $this->load->view('header'); ?>
<style>
    .shopbtn{
        background-color: #ff6633;
        box-shadow: 0 1px 2px 0 rgba(0,0,0,.2);
        border: none;
        color: #fff;
        margin-top: 5px;
        font-size: 18px;
    }
</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    <?php echo $product['title']; ?>
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-2">
                            <?php
                            foreach ($product_images as $image) {
                                echo'<img class="img-responsive img-circle pimg" data-src="' . base_url('uploads/' . $image['image']) . '" src="' . base_url('uploads/' . $image['image']) . '"/>';
                            }
                            ?>
                        </div>
                        <div class="col-md-10">
                            <div class="imageview">
                                <?php
                                if (!empty($product_images)) {
                                    echo'<img class="img-responsive" id="MainImg" src="' . base_url('uploads/' . $product_images[0]['image']) . '"/>';
                                } else {
                                    echo'<img class="img-responsive" src="' . base_url('uploads/no_image.png') . '"/>';
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn form-control shopbtn" data-product_id="<?php echo $product['id']; ?>">Add to Cart</button>
                        </div>
                        <div class="col-md-4">
                            <!--<button type="button" class="btn form-control shopbtn">Buy</button>-->
                        </div>
                    </div>
                    <?php
//                    pr($product_images);
                    ?>
                </div>
                <div class="col-md-6">
                    <h2><?php echo $product['title']; ?></h2>
                    <p><?php echo $product['description']; ?></p>
                    <span>Member Price : <?php echo $product['member_price']; ?></span><br>
                    <span>Retail Price : <?php echo $product['retail_price']; ?></span>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script>
    $(document).on('click','.pimg',function(){
        $('#MainImg').attr('src',$(this).data('src'))
    })
    $(document).on('click', '.shopbtn', function () {
        var product_id = $(this).data('product_id');
        var url = '<?php echo base_url("Dashboard/Shopping/add_to_cart/"); ?>' + product_id;
        $.get(url,function(res){
            if(res.success == 1){
                location.href='<?php echo base_url("Dashboard/Shopping/cart")?>';
            }
        },'json')
    });
</script>