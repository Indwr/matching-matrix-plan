<?php include'header.php' ?>
<style>
section.content-header {
    background-color: #e0e0e0;
    padding: 10px;
    font-size: 20px;
    margin: 21px 0px;
    border-radius: 10px;
}
</style>
<div class="main-content">
  <div class="page-content">
<div class="container-fluid">
    <!-- BEGIN breadcrumb -->
    <!--<ul class="breadcrumb"><li class="breadcrumb-item"><a href="#">FORMS</a></li><li class="breadcrumb-item active">FORM WIZARS</li></ul>-->
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <section class="content-header">
        <span style="">Support  /  Recent Compose Mail</span>
    </section>
    
    <!-- END page-header -->
    <!-- BEGIN wizard -->
    <div class="card">
          <div class="card-body">
        <!-- BEGIN wizard-header -->

        <!-- END wizard-header -->
        <!-- BEGIN wizard-form -->
      <h4 class="page-header mb-3">
        <small>List Tickets</small>
    </h4>
            <div class="wizard-content tab-content">
                <!-- BEGIN tab-pane -->
                <div class="tab-pane active show" id="tabFundRequestForm">
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-6 -->
                        <div class="col-md-12">
                          <div class="table-responsive">
                          <table class="table table-bordered table-striped dataTable" id="tableView">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Title</th>
                                  <th>Message</th>
                                  <th>Status</th>
                                  <th>Remark</th>
                                  <th> Date</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              foreach ($messages as $key => $message) {
                                  ?>
                                  <tr>
                                      <td><?php echo ($key + 1) ?></td>
                                      <td><?php echo $message['title']; ?></td>
                                      <td><?php echo $message['message']; ?></td>
                                      <td><?php
                                          if($message['status'] == 0){
                                              echo'Pending';
                                          }elseif($message['status'] == 1){
                                              echo'Approved';
                                          }elseif($message['status'] == 2){
                                              echo'Rejected';
                                          }
          //                                echo $transaction['status'];
                                          ?></td>
                                      <td><?php echo $message['remark']; ?></td>
                                      <td><?php echo $message['created_at']; ?></td>
                                  </tr>
                                  <?php
                              }
                              ?>

                          </tbody>
                          </table>
                            </div>
                        </div>
                        <!-- END col-6 -->
                    </div>
                    <!-- END row -->
                </div>
                <!-- END tab-pane -->
                <!-- BEGIN tab-pane -->

            </div>
            <!-- END wizard-content -->

        <!-- END wizard-form -->
    </div>
       </div>
    <!-- END wizard -->
</div>
</div>
</div>



<?php include'footer.php' ?>
