<?php include'header.php' ?>
<div class="main-content">
<div class="page-content">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
                 <section class="content-header">
                        <span><?php echo $header  ?></span>
                </section>
            
            <!-- <button type="button" id="export" class="btn btn-default"><i class="fas fa-download"></i>Export</button> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $header  ?></li>
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
                <form method="GET" action="<?php echo base_url('Admin/Management/'.$path);?>">
                <!-- <div class="row">
                    <div class="col-3">
                      <input type="date" name="startDate" class="form-control float-right" value="<?php echo $startDate;?>" placeholder="Enter Start Date">
                    </div>
                    <div class="col-3">
                      <input type="date" name="endDate" class="form-control float-right" value="<?php echo $endDate;?>" placeholder="Enter End Date">
                    </div>
                    <div class="col-3">
                      <select class="form-control" name="type">
                        <option value="user_id" <?php //echo $type == 'user_id' ? 'selected' : '';?>>User ID</option>
                        <option value="phone" <?php //echo $type == 'phone' ? 'selected' : '';?>>Phone</option>
                        <option value="name" <?php //echo $type == 'name' ? 'selected' : '';?>>Name</option>
                        <option value="sponser_id" <?php //echo $type == 'sponser_id' ? 'selected' : '';?>>Sponser ID</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <input type="text" name="value" class="form-control float-right" value="<?php //echo $value;?>" placeholder="Search">
                    </div>
                    
                    <div class="col-3">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div> -->
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="tableexcel">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Product ID</th>
                            <th>Price</th>
                            <th>Title</th>
                            <th>Discount</th>
                            <th>Image</th>  
                            <th>Date</th> 
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      $i = $this->uri->segment('4') + 1;
                        foreach ($order as $key => $ordr) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $ordr['seller_id']; ?></td>
                                <td><?php echo $ordr['orderName']['name']; ?></td>
                                <td>Rs.<?php echo  $ordr['amount']; ?></td>
                                <td><?php echo $ordr['orderDetails']['product_id']; ?></td>
                                <td><?php echo $ordr['orderDetails']['price']; ?></td>
                                <td><?php echo $ordr['product']['title']; ?></td>
                                <td> <?php echo $ordr['product']['discount']; ?></td>
                                <td><img src="<?php echo base_url('/uploads/'). $ordr['product']['image'] ;?>" style = "max-width: 200px;"></td>
                                <td><?php echo $ordr['created_at']; ?></td>
                              </tr>
                            <?php 
                        $i++;}
                        ?>
                    </tbody>
                </table>
                <?php echo $this->pagination->create_links();?>
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
<?php include 'footer.php' ?>
<script>
$(document).on('click','.blockUser',function(){
  var status = $(this).data('status');
  var user_id = $(this).data('user_id');
  var url = "<?php echo base_url('Admin/Management/blockStatus/');?>"+user_id + '/' + status;
  $.get(url,function(res){
    alert(res.message)
    if(res.success == 1)
      location.reload()
  },'json')
})
$(document).on('click','.mkfr',function(){
  var user_id = $(this).data('user_id');
  var r = confirm("Are You Sure TO Make This Account Franchise!");
  if (r == true) {
    var url = "<?php echo base_url('Admin/Management/MakeFranchise/');?>"+user_id ;
    $.get(url,function(res){
      alert(res.message)
      if(res.success == 1)
        location.reload()
    },'json')
    
  }
})
$(document).on('click','.mkus',function(){
  var user_id = $(this).data('user_id');
  var r = confirm("Are You Sure TO Make This Account as User Account!");
  if (r == true) {
    var url = "<?php echo base_url('Admin/Management/MakeUser/');?>"+user_id ;
    $.get(url,function(res){
      alert(res.message)
      if(res.success == 1)
        location.reload()
    },'json')
    
  }
})

$("#export").click(function(){
  $("#tableexcel").tableexcel({
    filename:"File.xls",
  });
});



// $(document).ready(function() {
//     $('#tableexcel').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//             'excelHtml5',
//             'csvHtml5',
//             'pdfHtml5'
//         ]
//     } );
// } );
</script>