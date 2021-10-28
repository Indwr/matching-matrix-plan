<?php include'header.php' ?>
<div class="main-content page-content">

    <div class="row">
        <div class="col-md-8">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Add User
                            </h3>
                        </div>
                    </div>
                    <?php echo form_open(''); ?>
                    <div class="kt-portlet__body">
                        <h2 class="text-danger" ><?php echo $this->session->flashdata('message'); ?></h2>
                        <div class="form-group">
                            <label>User ID</label>
                            <div></div>
                            <?php
                            echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'user_id', 'cols' => 3, 'rows' => 3));
                            ?>
                            <label class="text-danger"><?php echo form_error('user_id'); ?></label>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <div></div>
                            <?php
                            echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'name'));
                            ?>
                            <label class="text-danger"><?php echo form_error('name'); ?></label>
                        </div>
                        
                        <div class="form-group">
                            <label>E-mail</label>
                            <div></div>
                            <?php
                            echo form_input(array('type' => 'email', 'class' => 'form-control', 'name' => 'email'));
                            ?>
                            <label class="text-danger"><?php echo form_error('email'); ?></label>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div></div>
                            <?php
                            echo form_input(array('type' => 'password', 'class' => 'form-control', 'name' => 'password'));
                            ?>
                            <label class="text-danger"><?php echo form_error('password'); ?></label>
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <div></div>
                                <select name="type" class="form-control">
                                    <option value="A">Admin</option>
                                    <option value="U">User</option>
                                    <option value="SM">Sales Man</option>
                                    <option value="SK">Store Keeper</option>
                                </select>

                            <label class="text-danger"><?php echo form_error('type'); ?></label>
                        </div>
                        

                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <?php
                            echo form_submit('loginSubmit', 'Submit',"class='btn btn-primary'");
                            //echo form_input(array('type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'create', 'value' => 'Create'));
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php' ?>