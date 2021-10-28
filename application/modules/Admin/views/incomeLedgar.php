<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class=""><?php echo $header; ?> (<?php echo currency.''.$total_income;?>)</span>
          </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All users</li>
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
                    <form action="" method="GET">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" placeholder="Start Date">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" placeholder="End Date">
                        <!-- <select class="form-control" name="export">
                            <option value="">No Export</option>
                            <option value="csv">Export CSV</option>
                        </select> -->
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
                  <div class="row">
                    <div class="col-md-3">
                      <a href="<?php echo $base_url.'?export=xls'; ?>" class="export-btn btn-primary"><img src="https://theroyalfuture.com/NewDashboard/assets/images/xls.png">Export to xls</a>
                    </div>

                    <div class="col-md-3">
                      <a href="<?php echo $base_url.'?export=csv'; ?>" class="export-btn btn-success"><img src="https://theroyalfuture.com/NewDashboard/assets/images/csv.png">Export to cvs</a>
                    </div>
                  </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Credit Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = $segament + 1;
                        foreach ($user_incomes as $key => $income) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $income['user_id']; ?></td>
                                <td><?php echo $income['amount']; ?></td>
                                <td><?php echo ucwords(str_replace('_', ' ', $income['type'])); ?></td>
                                <td><?php echo $income['description']; ?></td>
                                <td><?php echo $income['created_at']; ?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>

                    </tbody>
                </table>
                <?php
                echo $this->pagination->create_links();
                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
             </div>
          </div>
        </div>
            <div>
      </div>
         </div><!-- /.container-fluid -->
    </div>
  </div>
<?php include'footer.php' ?>

<script>
  function exportF(elem) {
  var table = document.getElementById("table");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  let r = Math.random().toString(36).substring(7);
  elem.setAttribute("download", r+".xls"); // Choose the file name
  return false;
}


</script>

