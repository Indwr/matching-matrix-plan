<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
              <span class=""> Reward List</span>
            </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Reward List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <div class="card-header">
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="tableView">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Award ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>CreatedAt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo $this->session->flashdata('message');
                        foreach ($rewards as $key => $request) {
                            ?>
                            <tr>
                                <td><?php echo ($key + 1) ?></td>
                                <td><?php echo $request['user_id']; ?></td>
                                <td><?php echo $request['userInfo']['name']; ?></td>
                                <td><?php echo $request['award_id']; ?></td>
                                <td><?php echo $request['amount']; ?></td>
                                <td><?php 
                                    if($request['status'] == 0){
                                        echo'<span class="btn btn-primary">Pending</span>';
                                    }elseif($request['status'] == 1){
                                        echo'<span class="btn btn-success">Approved</span>';
                                    }elseif($request['status'] == 2){
                                        echo'<span class="btn btn-danger">Rejected</span>';
                                    }
                                ?></td>
                                <td><?php echo $request['created_at']; ?></td>
                                <td> 
                                    <?php
                                        if($request['status'] == 0): 
                                        echo '<p>';
                                        echo form_open();
                                        echo form_hidden('id',$request['id']);
                                        echo form_hidden('status','1');
                                        echo form_submit(['type' => 'submit','value' => 'Approve','class' => 'btn btn-success']);
                                        echo form_close();
                                        echo '</p>';
                                        echo '<p>';
                                        echo form_open();
                                        echo form_hidden('id',$request['id']);
                                        echo form_hidden('status','2');
                                        echo form_submit(['type' => 'submit','value' => 'Reject','class' => 'btn btn-danger']);
                                        echo form_close();
                                        echo '</p>';
                                        endif;
                                    ?>
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