<?php $this->load->view('header'); ?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Buy Products
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body">
            <div class="col-xl-12">

                <!--begin:: Widgets/Best Sellers-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                                <div class="kt-widget5">
                                    <?php
//                                    pr($products);
                                    foreach ($products as $key => $product) {
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
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Best Sellers-->
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>