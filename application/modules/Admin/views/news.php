<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">News</span>
          </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Paid users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
     

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <div class="card-header">
                <a href="<?php echo base_url('Admin/Settings/CreateNews');?>" class="btn btn-success">Create New</a>   
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="tableView">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>News</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($news as $key => $new) {
                            ?>
                            <tr>
                                <td><?php echo ($key + 1) ?></td>
                                <td><?php echo $new['news']; ?></td>
                                 <td><?php echo $new['created_at']; ?></td>
                                <td><a href="<?php echo base_url('Admin/Settings/news/'.$new['id']);?>" class="btn btn-primary btn-sm" target="_blank">View</a> | <a href="<?php echo base_url('Admin/Settings/editNews/'.$new['id']);?>" class="btn btn-success btn-sm" target="_blank">Edit</a> | <a href="<?php echo base_url('Admin/Settings/deleteNews/'.$new['id']);?>" class="btn btn-danger btn-sm">Delete</a></td>
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