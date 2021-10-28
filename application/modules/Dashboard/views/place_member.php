<?php include'header.php'; ?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Member Placement
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <?php echo form_open(base_url('Dashboard/User/PlaceMember/'.$member_id), array('method' => 'post')); ?>
            <div class="row">
                <span class="text-center">
                    <h3><?php echo $this->session->flashdata('error'); ?></h3>
                </span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>New Member</label>
                        <?php
                        echo form_input(array('type' => 'text', 'name' => 'place_id', 'class' => 'form-control', 'value' => $member_id , 'readonly' => 'readonly'));
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <?php
                        echo form_dropdown('position',array('L' => 'LEFT', 'R' => 'RIGHT'),'',array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_input(array('type' => 'submit', 'class' => 'btn btn-success pull-right', 'name' => 'posbtn', 'value' => 'Place'));
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include'footer.php' ?>