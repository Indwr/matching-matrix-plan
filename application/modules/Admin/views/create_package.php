<?php include'header.php' ?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-md-8">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Create New Package
                            </h3>
                        </div>
                    </div>
                    <?php echo form_open(base_url('Admin/Package/create')); ?>
                    <div class="kt-portlet__body">
                        <h2><?php echo $this->session->flashdata('message'); ?></h2>
                        <div class="form-group">
                            <label>Package Title</label>
                            <div></div>
                            <?php
                            echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'title'));
                            ?>
                            <label class="text-danger"><?php echo form_error('title'); ?></label>
                        </div>
                        <div class="form-group">
                            <label>Package Description</label>
                            <div></div>
                            <?php
                            echo form_textarea(array('class' => 'form-control', 'name' => 'description', 'cols' => 3, 'rows' => 3));
                            ?>
                            <label class="text-danger"><?php echo form_error('description'); ?></label>
                        </div>
                        <div class="form-group">
                            <label>Package Price</label>
                            <div></div>
                            <?php
                            echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'price'));
                            ?>
                            <label class="text-danger"><?php echo form_error('price'); ?></label>
                        </div>
                        <div class="form-group">
                            <label>Package PV</label>
                            <div></div>
                            <?php
                            echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'bv'));
                            ?>
                            <label class="text-danger"><?php echo form_error('pv'); ?></label>
                        </div>
                        <div class="form-group">
                            <label>Commision</label>
                            <div></div>
                            <?php
                            echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'commision'));
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
//                            pr($products);
                                foreach ($products as $key => $product) {
                                    echo'<tr><td>';
                                    echo form_checkbox(array('name' => 'product[' . $key . ']', 'value' => $product['id']));
                                    echo '<b>' . $product['title'] . '</b> | M.P. $' . $product['member_price'] . ' | R.P. $' . $product['retail_price'] . ' | BV ' . $product['bv'];
                                    echo'</td><td>';
                                    echo form_input(array('type' => 'number', 'name' => 'item_count[]', 'value' => 1));
                                    echo'</td></tr>';
                                }
                                ?>

                            </table>
                            <span class="text-danger"><?php echo form_error('products'); ?></span>
                        </div>

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <?php
                            echo form_input(array('type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'create', 'value' => 'Create'));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php' ?>