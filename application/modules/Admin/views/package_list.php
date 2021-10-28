<?php include'header.php' ?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Package List
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <div class="dropdown dropdown-inline">
                            <a href="<?php echo base_url('Admin/Package/create');?>" class="btn btn-success btn-icon-sm">
                                <i class="la la-add"></i> Create New
                            </a>
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>PV</th>
                        <th>CreatedAt</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($packages as $key => $package) {
                        ?>
                        <tr>
                            <td><?php echo ($key + 1)?></td>
                            <td><?php echo $package['title'];?></td>
                            <td><?php echo $package['description'];?></td>
                            <td><?php echo $package['price'];?></td>
                            <td><?php echo $package['bv'];?></td>
                            <td><?php echo $package['created_at'];?></td>
                            <td><a href="<?php echo base_url('Admin/Package/Edit/'.$package['id']);?>">Edit</a></td>
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