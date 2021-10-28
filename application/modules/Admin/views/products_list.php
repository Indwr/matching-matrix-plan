<?php include'header.php' ?>
<div class="main-content">
<div class="page-content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <section class="content-header">
                        <span>Product List</span>
                </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-body">
              <div class="card-header">
                <div class="card-tools">
                    <!-- <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="<?php echo base_url('Admin/Package/CreateProduct');?>" class="btn btn-success btn-icon-sm">
                                <i class="la la-add"></i> Create New
                            </a>
                    </div> -->
                    <?php echo $this->session->flashdata('message');?>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <!-- <th>Stock</th> -->
                            <th>Price</th>
                            <th>Discount</th>
                            <th>DP</th>
                            <th>BV</th>
                            <th>Image</th>
                            <!-- <th>Description</th> -->
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($products as $key => $product) {
                            ?>
                            <tr>
                                <td><?php echo ($key + 1)?></td>
                                <td><?php echo $product['title'];?></td>
                                <!-- <td><?php// echo $product['quantity'];?></td> -->
                                <td>Rs. <?php echo $product['mrp'];?></td>
                                <td><?php echo $product['discount'];?>%</td>
                                <td><?php echo $product['dp'];?></td>
                                <td><?php echo $product['bv'];?></td>
                                <td><img src="<?php echo base_url('/uploads/'.$product['image']);?>" style="max-width: 100px;"></td>
                                <!-- <td><?php //echo $product['description'];?></td> -->
                                <td><?php echo $product['created_at'];?></td>
                                <td>
                                  <!-- <a href="<?php// echo base_url('Admin/package/EditProduct/'.$product['id']);?>">Edit</a> | -->
                                  <a href="<?php echo base_url('Admin/Products/deleteProduct/'.$product['id']);?>"  onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                  <!--  |
                                  <a href="<?php// echo base_url('Admin/package/addStock/'.$product['id']);?>">Add Stock</a> |
                                  <a href="<?php //echo base_url('Admin/package/ProductsRecord/'.$product['id']);?>">View</a> -->
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
<?php include'footer.php' ?>
