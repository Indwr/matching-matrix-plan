<?php include'header.php' ?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-md-6">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Update Tax(%)
                            </h3>
                        </div>
                    </div>
                    <?php echo form_open(base_url('Admin/Package/TAX')); ?>
                    <div class="kt-portlet__body">
                        <h2><?php echo $this->session->flashdata('message'); ?></h2>
                        <div class="form-group">
                            <label>Tax</label>
                            <div></div>
                            <?php
                            echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'tax', 'value' => $tax['tax']));
                            ?>
                            <span class="text-danger"><?php echo form_error('tax'); ?></span>
                        </div>
                        

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <?php
                            echo form_input(array('type' => 'submit', 'class' => 'btn btn-primary pull-right', 'name' => 'create', 'value' => 'Update'));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php' ?>