<?php include'header.php' ?>

<script src="<?php echo base_url('classic/assets/plugin');?>/jquery.js"></script>
<script src="<?php echo base_url('classic/assets/plugin');?>/croppie.js"></script>
<link rel="stylesheet" href="<?php echo base_url('classic/assets/plugin');?>/croppie.css"/>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-md-8">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Edit Package
                            </h3>
                        </div>
                    </div>
                    <?php echo form_open(base_url('Admin/Package/Edit/' . $package['id'])); ?>
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
                            <table border="2">
                                <tr>
                                    <th>Products</th>
                                    <th>Quantity</th>
                                </tr>
                                <?php
                                $current_products = json_decode($package['products'], true);
                                $cop = array();
                                $p_arr = array();
                                foreach ($current_products as $cp) {
                                    array_push($cop, $cp['id']);
                                    $p_arr[$cp['id']] = $cp['quantity'];
                                }
//                                pr($cop);
//                                pr($current_products);
                                foreach ($products as $key => $product) {
                                    if (in_array($product['id'], $cop)) {
                                        echo'<tr><td>';
                                        echo form_checkbox(array('name' => 'product[' . $key . ']', 'value' => $product['id'], 'checked' => 'checked'));
                                        echo '<b>' . $product['title'] . '</b> | M.P. $' . $product['member_price'] . ' | R.P. $' . $product['retail_price'] . ' | BV ' . $product['bv'];
                                        echo'</td><td>';
                                        echo form_input(array('type' => 'number', 'name' => 'item_count[]', 'value' => $p_arr[$product['id']]));
                                        echo'</td></tr>';
                                    } else {

                                        echo'<tr><td>';
                                        echo form_checkbox(array('name' => 'product[' . $key . ']', 'value' => $product['id']));
                                        echo '<b>' . $product['title'] . '</b> | M.P. $' . $product['member_price'] . ' | R.P. $' . $product['retail_price'] . ' | BV ' . $product['bv'];
                                        echo'</td><td>';
                                        echo form_input(array('type' => 'number', 'name' => 'item_count[]', 'value' => 1));
                                        echo'</td></tr>';
                                    }
                                }
                                ?>

                            </table>
                            <span class="text-danger"><?php echo form_error('products'); ?></span>
                        </div>

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <?php
                            echo form_input(array('type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'create', 'value' => 'Update'));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div id="upload-demo" style="width:350px;display:none;"></div>
                    <button class="btn btn-success upload-result" type="button" style="display:none;">Upload</button>
                </div>
                <div class="col-md-4" style="padding-top:30px;">
                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
                        <div class="kt-avatar__holder" style="background-image: url('<?php echo base_url('uploads/'.$package['image']); ?>');"></div>
                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Choose Product Image">
                            <i class="fa fa-pen"></i>
                            <input type="file" id="upload"  name="profile_avatar" accept=".png, .jpg, .jpeg">
                        </label>
                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                            <i class="fa fa-times"></i>
                        </span>
                    </div>
                    <br/>
                </div>
            </div>Ï
        </div>
    </div>
</div>
<script>
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'circle'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#upload').on('change', function () {
        $('#upload-demo').css('display', 'block');
        $('.upload-result').css('display', 'block');
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });

        }
        reader.readAsDataURL(this.files[0]);
    });
    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            var formData = {
                "image": resp,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                'package_id': <?php echo $package['id']; ?>
            }
            $.ajax({
                url: '<?php echo base_url('Admin/package/upload_package_image'); ?>',
                type: "POST",
                data: formData,
                success: function (data) {
                    var data = JSON.parse(data);
                    alert(data.message)
                    location.reload();
                }
            });
        });
    });
</script>
<?php include'footer.php' ?>