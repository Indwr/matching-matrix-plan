<?php include'header.php' ?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    <?php echo $header; ?> 
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i> Export
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Sponser ID</th>
                        <th>Email</th>
                        <th>Upline ID</th>
                        <th>Position</th>
                        <th>Joining Date</th>
                        <th>Place</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $key => $user) {
                        ?>
                        <tr>
                            <td><?php echo ($key + 1)?></td>
                            <td><?php echo $user['user_id'];?></td>
                            <td><?php echo $user['name'];?></td>
                            <td><?php echo $user['phone'];?></td>
                            <td><?php echo $user['sponser_id'];?></td>
                            <td><?php echo $user['email'];?></td>
                            <td><?php echo $user['upline_id'];?></td>
                            <td><?php //echo $user['position'];?></td>
                            <td><?php echo $user['created_at'];?></td>
                            <td><a href="<?php echo base_url('Dashboard/User/PlaceMember/'.$user['user_id']);?>" class="btn btn-primary">Place</a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>
<?php include'footer.php' ?>