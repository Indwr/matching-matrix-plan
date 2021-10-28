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
<link href="<?php echo base_url('classic/'); ?>assets/css/demo1/pages/general/wizard/wizard-3.css" rel="stylesheet" type="text/css" />
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title" id="mainDiv" onclick="tabchange()">
                    Place Order
                </h3>
            </div>

        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_v3" data-ktwizard-state="between">
                        <div class="kt-grid__item">

                            <!--begin: Form Wizard Nav -->
                            <div class="kt-wizard-v3__nav">
                                <div class="kt-wizard-v3__nav-items">
                                    <a class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                        <div class="kt-wizard-v3__nav-body">
                                            <div class="kt-wizard-v3__nav-label" id="shipping">
                                                <span>1</span> Delivery Address
                                            </div>
                                            <div class="kt-wizard-v3__nav-bar"></div>
                                        </div>
                                    </a>
                                    <a class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                        <div class="kt-wizard-v3__nav-body">
                                            <div class="kt-wizard-v3__nav-label"id="summary" >
                                                <span>2</span> Order Summary
                                            </div>
                                            <div class="kt-wizard-v3__nav-bar"></div>
                                        </div>
                                    </a>
                                    <a class="kt-wizard-v3__nav-item" id="payment" data-ktwizard-type="step" data-ktwizard-state="pending">
                                        <div class="kt-wizard-v3__nav-body">
                                            <div class="kt-wizard-v3__nav-label">
                                                <span>3</span> Payment Options
                                            </div>
                                            <div class="kt-wizard-v3__nav-bar"></div>
                                        </div>
                                    </a>

                                </div>
                            </div>

                            <!--end: Form Wizard Nav -->
                        </div>
                        <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper">

                            <!--begin: Form Wizard Form-->
                            <!--<form class="kt-form" id="kt_form" action="<?php echo base_url('Dashboard/Shopping/checkout'); ?>" method="post">-->
                            <?php echo form_open(base_url('Dashboard/Shopping/checkout'), array('class' => 'kt-form', 'id' => 'kt_form')); ?>  
                            <!--begin: Form Wizard Step 1-->
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                                <!--<div class="kt-heading kt-heading--md">Setup Your Current Location</div>-->
                                <div class="kt-form__section kt-form__section--first">
                                    <?php // echo form_open(base_url('Dashboard/User/BankDetails'));
                                    ?>                                    
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <span class="">Shipping Address:(<a href="<?php echo base_url('Dashboard/User/BankDetails'); ?>"><small>Change</small></a>)</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Shipping Name</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <?php
                                                echo form_input(array('type' => 'text', 'name' => 'sfirst_name', 'class' => 'form-control', 'value' => $shipping_address->first_name));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Address line 1</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">
                                                    <?php
                                                    echo form_textarea(array('name' => 'saddress_line1', 'class' => 'form-control', 'rows' => '3',
                                                        'cols' => '10', 'value' => $shipping_address->address_line1));
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Address line 2</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">
                                                    <?php
                                                    echo form_textarea(array('name' => 'saddress_line2', 'class' => 'form-control', 'rows' => '3',
                                                        'cols' => '10', 'value' => $shipping_address->address_line2));
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Country</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                    </div>
                                                    <?php
                                                    echo form_dropdown('scountry', $countries, $shipping_address->country, 'class="form-control" id="scountry"');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">State</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"></div>
                                                    <?php
                                                    foreach ($sstateArr as $key => $s)
                                                        $states[$s['id']] = $s['name'];
                                                    echo form_dropdown('sstate', $states, $shipping_address->state, 'class="form-control" id="sstate"')
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">City</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"></div>
                                                    <?php
                                                    foreach ($scityArr as $key => $c)
                                                        $cities[$c['id']] = $c['name'];
                                                    echo form_dropdown('scity', $cities, $shipping_address->city, 'class="form-control" id="scity"')
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Postal Code</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <?php
                                                echo form_input(array('type' => 'number', 'name' => 'spostal_code', 'class' => 'form-control', 'value' => $shipping_address->postal_code));
                                                ?>
                                            </div>
                                        </div>
                                        <?php
//                                            echo form_input(array('name' => 'form_type', 'type' => 'hidden', 'value' => 'shipping', 'class' => 'form-control'));
//                                            echo form_submit('submit', 'Save', 'class="btn btn-brand btn-bold"');
//                                            echo form_close();
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 1-->

                            <!--begin: Form Wizard Step 2-->
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                <div class="kt-heading kt-heading--md">Cart Details</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                                        <div class="kt-widget5">
                                            <?php
                                            $total_member_price = 0;
                                            $total_retail_price = 0;
                                            foreach ($cart_item as $key => $product) {
                                                $total_member_price = $total_member_price + ($product['member_price'] * $product['quantity']);
                                                $total_retail_price = $total_retail_price + ($product['retail_price'] * $product['quantity']);
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
                                        <div class="kt-widget5">
                                            <div class="kt-widget5__item">
                                                <div class="kt-widget5__content">
                                                    Total Member Price : $<?php echo $total_member_price; ?><br>
                                                    Tax : $<?php echo $total_member_price * $tax->tax /100; ?>
                                                </div>
                                                <div class="kt-widget5__content">
                                                    Total Retaill Price : $<?php echo $total_retail_price; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 2-->

                            <!--begin: Form Wizard Step 3-->
                            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">Payment Options</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="form-group">
                                        <?php echo '$' . $total_member_price; ?>
                                        <label>Payment Method</label>
                                        <select class="form-control" id="payment_method" name="payment_method" required="required">
                                            <option value="e_wallet">E-Wallet</option>
                                            <option value="income_wallet">Income Wallet</option>
                                            <option value="online_payment">Online Payment</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div id="e_walletdiv" style="display:block;">
                                            <h2>$<?php echo $e_wallet['sum']; ?></h2> Ewallet Money
                                        </div>
                                        <div id="income_walletdiv" style="display:none;">
                                            <h2>$<?php echo $income_wallet['sum']; ?></h2> Income Wallet Balance
                                        </div>
                                        <div id="online_paymentdiv" style="display:none;">
                                            <a class="btn btn-success" href="<?php echo base_url('Dashboard/Shopping/OnlinePayment'); ?>">Pay here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Form Wizard Step 3-->


                            <!--begin: Form Actions -->
                            <div class="kt-form__actions">
                                <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                    Previous
                                </div>
                                <button type="submit" id="submitbtn" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                                    Submit
                                </button>
                                <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                    Next Step
                                </div>
                            </div>

                            <!--end: Form Actions -->
                            <?php echo form_close(); ?>

                            <!--end: Form Wizard Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url('classic/'); ?>assets/js/demo1/pages/wizard/wizard-3.js" type="text/javascript"></script>

<script>
                    $(document).on('click', '.shopbtn', function (e) {
                        e.preventDefault();
                        var product_id = $(this).data('product_id');
                        var url = '<?php echo base_url("Dashboard/Shopping/add_to_cart/"); ?>' + product_id;
                        $.get(url, function (res) {
                            alert(res.message)
                            if (res.success == 1) {
                                location.href = '<?php echo base_url("Dashboard/Shopping/place_order/summary") ?>';
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
                                location.href = '<?php echo base_url("Dashboard/Shopping/place_order/summary") ?>';
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
                                location.href = '<?php echo base_url("Dashboard/Shopping/place_order/summary") ?>';
                            }
                        }, 'json')
                    });

</script>

<script>
    $(document).on('change', '#payment_method', function () {
        var val = $(this).val();
        console.log(val)
        if (val == 'e_wallet') {
            $('#e_walletdiv').css('display', 'block');
            $('#income_walletdiv').css('display', 'none');
            $('#online_paymentdiv').css('display', 'none');
        } else if (val == 'income_wallet') {
            $('#e_walletdiv').css('display', 'none');
            $('#income_walletdiv').css('display', 'block');
            $('#online_paymentdiv').css('display', 'none');
        } else if (val == 'online_payment') {
            $('#e_walletdiv').css('display', 'none');
            $('#income_walletdiv').css('display', 'none');
            $('#online_paymentdiv').css('display', 'block');
        }
    });
    $(document).on('click', '#submitbtn', function (e) {
        e.preventDefault();
        console.log('clicked');
        $('#kt_form').submit()
    })
</script>
