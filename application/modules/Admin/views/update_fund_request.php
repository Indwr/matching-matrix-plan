<?php include'header.php' ?>
  <div class="main-content">
      <div class="page-content">
         <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <section class="content-header">
                    <span class="">Update Fund Request</span>
                </section>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Fund Request</li>
                    <li class="breadcrumb-item active">Update Fund Request</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
       
  
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                    <h4 class="kt-portlet__head-title"><?php echo $this->session->flashdata('error');?></h4>
                    <?php echo form_open(base_url('Admin/Management/update_fund_request/' . $request['id'])); ?>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">User ID</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'value' => $request['user_id'])); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Amount</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <?php echo form_input(array('type' => 'text', 'class' => 'form-control', 'value' =>  $request['amount'])); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Proof :</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <img src="<?php echo $request['image'] != '' ? base_url('uploads/' . $request['image']) : base_url('classic/logo.png'); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Remark :</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <?php
                                        echo form_textarea(array('rows' => '2', 'class' => 'form-control', 'value' => $request['remarks'], 'name' => 'remarks'));
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Status :</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <?php
                                        if ($request['status'] == 0) {
                                            echo'<span class="btn btn-primary">Pending</span>';
                                        } elseif ($request['status'] == 1) {
                                            echo'<span class="btn btn-success">Approved</span>';
                                        } elseif ($request['status'] == 2) {
                                            echo'<span class="btn btn-danger">Rejected</span>';
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-3 col-xl-3">
                                </div>
                                <div class="col-lg-9 col-xl-9">
                                    <?php
                                    if ($request['status'] == 0) {
                                        echo form_input(array('type' => 'submit', 'class' => 'btn btn-success', 'value' => 'Approve', 'name' => 'status'));
                                        echo'&nbsp;';
                                        echo form_input(array('type' => 'submit', 'class' => 'btn btn-danger', 'value' => 'Reject', 'name' => 'status'));
                                    } elseif ($request['status'] == 2) {
                                        echo form_input(array('type' => 'submit', 'class' => 'btn btn-success', 'value' => 'Approve', 'name' => 'status'));
                                    }
                                    ?>
                                </div>
                            </div>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php include'footer.php' ?>