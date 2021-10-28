<?php $this->load->view('header'); ?>
<style>
    .qtybox{
        width: 13%;
        font-size: 14px;
        font-weight: 500;
        vertical-align: middle;
        text-align: center;
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
                    My Cart
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body">
            <div class="row">
                <div class="col-md-8">
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                                    <div class="kt-widget5">
                                        <?php
                                        $total_member_price = 0;
                                        $total_retail_price = 0;
                                        foreach ($cart_item as $key => $product) {
                                            $total_member_price = $total_member_price + ($product['member_price'] * $product['quantity']);
                                            $total_retail_price = $total_retail_price + $product['retail_price'];
                                            ?>
                                            <div class="kt-widget5__item">
                                                <div class="kt-widget5__content">
                                                    <div class="kt-widget5__pic">
                                                        <img class="kt-widget7__img" src="<?php echo base_url('uploads/' . $product['image']); ?>" alt="">
                                                    </div>
                                                    <div class="kt-widget5__section">
                                                        <a href="<?php echo base_url('Dashboard/Shopping/product/' . $product['id']); ?>" class="kt-widget5__title">
                                                            <?php echo $product['title']; ?>
                                                        </a>
                                                        <p class="kt-widget5__desc">
                                                            <?php echo $product['description']; ?>
                                                        </p>
                                                        <div class="kt-widget5__info">
                                                            <span>BV:</span>
                                                            <span class="kt-font-info"><?php echo $product['bv']; ?></span>
                                                            <div class="kt-mycart__action">
                                                                <a href="#" class="btn btn-label-success btn-icon rmbtn" data-product_id="<?php echo $product['id']; ?>">−</a>
                                                                <input type="number" value="<?php echo $product['quantity']; ?>" class="qtybox"/>
                                                                <a href="" class="btn btn-label-success btn-icon shopbtn" data-product_id="<?php echo $product['id']; ?>">+</a>
                                                                <a href="#" class="btn btn-label-success emptyCart" data-product_id="<?php echo $product['id']; ?>">REMOVE</a>
                                                            </div>
        <!--                                                        <span>Released:</span>
                                                            <span class="kt-font-info">23.08.17</span>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="kt-widget5__content">
                                                    <div class="kt-widget5__stats">
                                                        <span class="kt-widget5__number">$<?php echo $product['member_price']; ?></span>
                                                        <span class="kt-widget5__sales">Member Price</span>
                                                    </div>
                                                    <div class="kt-widget5__stats">
                                                        <span class="kt-widget5__number">$<?php echo $product['retail_price']; ?></span>
                                                        <span class="kt-widget5__votes">Retail Price</span>
                                                    </div>
                                                    <div class="kt-widget5__stats">


                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="kt-widget5__stats">
                                        <a class="btn btn-lg pull-right" href="<?php echo base_url('Dashboard/Shopping/place_order'); ?>" style="background:#fb641b;color:#fff;">Place Order</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">

                    <!--begin:: Widgets/New Users-->
                    <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Price Details
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="kt_widget4_tab1_content">
                                    <div class="kt-widget4">
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__info">
                                                <a href="#" class="kt-widget4__username">
                                                    Price (<?php echo count($cart_item); ?> items)
                                                </a>
                                                <p class="kt-widget4__text">
                                                </p>
                                            </div>
                                            <!--<a href="#" class="btn btn-sm btn-label-brand btn-bold">$<?php echo $total_member_price; ?></a>-->
                                        </div>
                                        <?php
                                        foreach ($cart_item as $key => $product) {
                                            ?>
                                            <div class="kt-widget4__item">
                                                <div class="kt-widget4__info">
                                                    <a href="#" class="kt-widget4__username">
                                                        <?php echo $product['title'] ?>
                                                    </a>
                                                    <p class="kt-widget4__text" style="color:green; font-weight: bold">
                                                        $<?php echo $product['member_price'] . ' * ' . $product['quantity'] . ' pcs'; ?>
                                                    </p>
                                                </div>
                                                <a href="#" class="btn btn-sm btn-label-brand btn-bold">$<?php echo $product['member_price'] * $product['quantity']; ?></a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__info">
                                                <a href="#" class="kt-widget4__username">
                                                    Total
                                                </a>
                                                <p class="kt-widget4__text">
                                                </p>
                                            </div>
                                            <a href="#" class="btn btn-sm btn-label-brand btn-bold" style="background: green; color:white; font-size: 16px">$<?php echo $total_member_price; ?></a>
                                        </div>
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__info">
                                                <a href="#" class="kt-widget4__username">
                                                    Tax
                                                </a>
                                                <p class="kt-widget4__text">
                                                </p>
                                            </div>
                                            <a href="#" class="btn btn-sm btn-label-brand btn-bold" style="background: green; color:white; font-size: 16px">$<?php echo $total_member_price * $tax['tax'] / 100; ?></a>
                                        </div>
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__info">
                                                <a href="#" class="kt-widget4__username">
                                                    Total Payable
                                                </a>
                                                <p class="kt-widget4__text">
                                                </p>
                                            </div>
                                            <a href="#" class="btn btn-sm btn-label-brand btn-bold" style="background: green; color:white; font-size: 16px">$<?php echo $total_member_price + ($total_member_price * $tax['tax'] / 100); ?></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end:: Widgets/New Users-->
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script>
    $(document).on('click', '.shopbtn', function (e) {
        e.preventDefault();
        var product_id = $(this).data('product_id');
        var url = '<?php echo base_url("Dashboard/Shopping/add_to_cart/"); ?>' + product_id;
        $.get(url, function (res) {
            alert(res.message)
            if (res.success == 1) {
                location.href = '<?php echo base_url("Dashboard/Shopping/cart") ?>';
            }
        }, 'json')
    });
    $(document).on('click', '.rmbtn', function (e) {
        e.preventDefault();
        var product_id = $(this).data('product_id');
        var url = '<?php echo base_url("Dashboard/Shopping/decrease_item_from_cart/"); ?>' + product_id;
        $.get(url, function (res) {
            alert(res.message)
            if (res.success == 1) {
                location.href = '<?php echo base_url("Dashboard/Shopping/cart") ?>';
            }
        }, 'json')
    });
    $(document).on('click', '.emptyCart', function (e) {
        e.preventDefault();
        var product_id = $(this).data('product_id');
        var url = '<?php echo base_url("Dashboard/Shopping/remove_item/"); ?>' + product_id;
        $.get(url, function (res) {
            alert(res.message)
            if (res.success == 1) {
                location.href = '<?php echo base_url("Dashboard/Shopping/cart") ?>';
            }
        }, 'json')
    });
</script>