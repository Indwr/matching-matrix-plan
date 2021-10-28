<?php include'header.php' ?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Product Purchase
                </h3>
            </div>
        </div>
        <div class="kt-portlet">
            <?php echo form_open(base_url('payment/'));?>
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Package Description
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <h2><?php echo $this->session->flashdata('message'); ?></h2>
                <h2><?php echo form_error(); ?></h2>
                <div class="form-group">
                    <label>Package Title</label>
                    <div></div>
                    <?php
                    echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'title', 'required' => 'required', 'value' => $package['title']));
                    ?>
                </div>
                <div class="form-group">
                    <label>Package Description</label>
                    <div></div>
                    <?php
                    echo form_textarea(array('class' => 'form-control', 'name' => 'description', 'cols' => 3, 'rows' => 3, 'required' => 'required', 'value' => $package['description']));
                    ?>
                </div>
                <div class="form-group">
                    <label>Package Price</label>
                    <div></div>
                    <?php
                    echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'price', 'required' => 'required', 'value' => $package['price']));
                    ?>
                </div>
                <div class="form-group">
                    <label>Package PV</label>
                    <div></div>
                    <?php
                    echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'bv', 'required' => 'required', 'value' => $package['bv']));
                    ?>
                </div>
                <div class="form-group">
                    <label>Commision (%)</label>
                    <div></div>
                    <?php
                    echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'commision', 'value' => $package['commision']));
                    ?>
                    <label class="text-danger"><?php echo form_error('commision'); ?></label>
                </div>
                <div class="form-group">
                    <label>Products</label>
                    <div></div>

                    <?php
                    $current_products = json_decode($package['products'], true);
                    $cop = array();
                    $p_arr = array();
                    foreach ($current_products as $cp) {
                        array_push($cop, $cp['id']);
                        $p_arr[$cp['id']] = $cp['quantity'];
                    }
                    foreach ($products as $key => $product) {
                        echo $p_arr[$product['id']] . ' ' . $product['title'] . ' | ' . $product['description'] . '| $' . $product['member_price'] . ' | BV ' . $product['bv'] . '<br >';
//                            if (in_array($product['id'], $cop)) {
//                                echo'<tr><td>';
//                                echo form_checkbox(array('name' => 'product[' . $key . ']', 'value' => $product['id'], 'checked' => 'checked'));
//                                echo '<b>' . $product['title'] . '</b> | M.P. $' . $product['member_price'] . ' | R.P. $' . $product['retail_price'] . ' | BV ' . $product['bv'];
//                                echo'</td><td>';
//                                echo form_input(array('type' => 'number', 'name' => 'item_count[]', 'value' => $p_arr[$product['id']]));
//                                echo'</td></tr>';
//                            } 
                    }
                    ?>
                    <span class="text-danger"><?php echo form_error('products'); ?></span>
                </div>

            </div>
            <div class="kt-portlet__foot">
                <?php
                if (!empty($user_data)) {
                    echo form_input(array('type' => 'hidden' , 'name' => 'user_id','value' => $userinfo->user_id));
                    echo form_input(array('type' => 'hidden' , 'name' => 'amount','value' => $package['price']));
                    echo form_input(array('type' => 'hidden' , 'name' => 'package_id','value' => $package['id']));
                    echo form_input(array('type' => 'hidden' , 'name' => 'type','value' => 1));
                    ?>
                    <div class="kt-form__actions">
                        <button class="btn btn-success text-info" id="purchase_btn" href="<?php echo base_url('payment/?amount=' . $package['price'] . '&user_id=' . $userinfo->user_id . '&package_id=' . $package['id'] . '&type=1') ?>">Purchase</button>
                    </div>
                    <?php
                }else{
                    echo'Before Prduct Purchase Pool Placement is neceesary';
                }
                ?>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<?php include'footer.php' ?>
<script>
    $(document).on('click', '#purchase_btn', function () {
//        var url = '<?php echo base_url('Dashboard/User/user_paid'); ?>';
//        $.get(url, function (res) {
//            alert(res.message)
//            if (res.success == 1)
//                location.reload();
//        }, 'json')
    })
</script>