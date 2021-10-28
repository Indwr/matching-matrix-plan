<?php include'header.php' ?>

<link href="<?php echo base_url('classic/');?>assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />

<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-md-6">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Create New Promo Code
                            </h3>
                        </div>
                    </div>
                    <?php echo form_open(base_url('Admin/Management/promo_code/')); ?>
                    <div class="kt-portlet__body">
                        <h2><?php echo $this->session->flashdata('message'); ?></h2>
                        <div class="form-group">
                            <label>Promo Code</label>
                            <div></div>
                            <?php
                            echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'promo_code'));
                            ?>
                            <label class="text-danger"><?php echo form_error('promo_code'); ?></label>
                        </div>
                        <div class="form-group">
                            <label>Discount</label>
                            <div></div>
                            <?php
                            echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'discount'));
                            ?>
                            <label class="text-danger"><?php echo form_error('discount'); ?></label>
                        </div>
                        <div class="form-group">
                            <label>Valid Upto</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" name="valid_upto" readonly="" placeholder="Select date" id="kt_datepicker_2">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                            <label class="text-danger"><?php echo form_error('valid_upto'); ?></label>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <?php
                            echo form_input(array('type' => 'submit', 'class' => 'btn btn-success pull-right', 'name' => 'create', 'value' => 'Create'));
                            ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Promo Codes 
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-widget4">
                            <?php
                            foreach ($promo_codes as $code) {
                                ?>

                                <div class="kt-widget4__item">
                                    <div class="kt-widget4__pic kt-widget4__pic--pic">
                                        <img src="./assets/media/users/100_4.jpg" alt="">
                                    </div>
                                    <div class="kt-widget4__info">
                                        <a href="#" class="kt-widget4__username">
                                            <?php echo $code['promo_code']; ?>
                                        </a>
                                        <p class="kt-widget4__text">
                                            Generated At : <?php echo $code['created_at']; ?>
                                        </p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-label-brand btn-bold"><?php echo $code['discount']; ?>%</a>
                                    <a href="<?php echo base_url('Admin/Management/delete_promo_code/' . $code['id']); ?>" class="btn btn-sm btn-bold"><i class="fa fa-trash"></i></a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php' ?>

<script src="<?php echo base_url('classic/');?>assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('classic/');?>assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>

<script src="<?php echo base_url('classic/');?>assets/js/demo1/pages/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>