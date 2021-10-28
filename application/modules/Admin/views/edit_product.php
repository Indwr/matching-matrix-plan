<?php include'header.php' ?>
<div class="main-content">
<div class="page-content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <section class="content-header">
                        <span><?php echo $header; ?></span>
                </section>
                </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <!-- <li class="breadcrumb-item">Shoppingt</li> -->
                    <li class="breadcrumb-item active"><?php echo $header; ?></li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                <div class="card card-body">
                    <?php echo form_open_multipart(); ?>
                        <div class="kt-portlet__body">
                            <h2><?php echo $this->session->flashdata('message'); ?></h2>
                            <div class="form-group">
                                <label>Product Name</label>
                                <div></div>
                                <?php
                                echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'product_name', 'value' => ''));
                                ?>
                                <span class="text-danger"><?php echo form_error('title'); ?></span>
                            </div>
                            
                            <!-- div class="form-group">
                                <label>Select Category Type</label> -->
                                <?php
                                // $option = [
                                //     '1' => 'Top Saver',
                                //     '2' => 'Best Seller',
                                //     '3' => 'New Arrival',
                                // ];
                                //echo form_dropdown('category_type','','class = form-control');
                                ?>
                           <!--  </div> -->
                            <!-- <div class="form-group">
                                <label>Veg/Non-veg</label>
                                <?php 
                                    // if($product['status'] == 1){
                                    //     $option = ['1' => 'Veg'];
                                    // }else{
                                    //     $option = ['2' => 'Non-Veg'];
                                    // }
                                    // echo form_dropdown('vegtype',$option,'','class = form-control');
                                ?>
                            </div> -->
                            <div class="form-group">
                                <label>MRP</label>
                                <div></div>
                                <?php
                                echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'mrp', 'value' => ''));
                                ?>
                                <span class="text-danger"><?php echo form_error('mrp'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <div></div>
                                <?php
                                echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'discount', 'value' => ''));
                                ?>
                                <span class="text-danger"><?php echo form_error('discount'); ?></span>
                            </div>
                            <!-- <div class="form-group">
                                <label>DP</label>
                                <div></div>
                                <?php
                                //echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'dp', 'value' => ''));
                                ?>
                                <span class="text-danger"><?php //echo form_error('dp'); ?></span>
                            </div> -->
                            <!-- <div class="form-group">
                                <label>BV</label>
                                <div></div>
                                <?php
                                //echo form_input(array('type' => 'number','name' => 'bv', 'class' => 'form-control', 'value' => ''));
                                ?>
                            </div> -->
                           
                            <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" name="Pimage" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"/>
                            <!-- <input type="file" name="Pimage" class="form-control"/> -->
                        </div>
                       
                        <!-- <button class="btn btn-success upload-result" type="submit" style="display:block;">Upload</button> -->
                        <?php //echo form_close(); //}?>
                    </div>
                          <!--   <div class="form-group">
                                <label>Available IN</label>
                                <div></div> -->
                                <?php
                               // echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'type', 'value' => ''));
                                ?>
                                <!-- <span class="text-danger"><?php //echo form_error('type'); ?></span> -->
                            <!-- </div> -->
                            <!--<div class="form-group">
                                <label>SGST</label>
                                <div></div>
                                <?php
                                //echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'sgst', 'value' => $product['sgst']));
                                ?>
                                <span class="text-danger"><?php //echo form_error('sgst'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>HSN</label>
                                <div></div>
                                <?php
                                //echo form_input(array('type' => 'number', 'class' => 'form-control', 'name' => 'hsn', 'value' => $product['hsn']));
                                ?>
                                <span class="text-danger"><?php //echo form_error('hsn'); ?></span>
                            </div> -->
                            <!-- <div class="form-group">
                                <label>Description</label>
                                <div></div>
                                <?php
                                //echo form_textarea(array('class' => 'form-control', 'name' => 'description', 'value' =>'', 'rows' => 5, 'cols' => 3,'id' => 'long_desc'));
                                ?>
                                <span class="text-danger"><?php// echo form_error('description'); ?></span>
                            </div> -->

                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <?php
                                echo form_input(array('type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'create', 'value' => 'Add'));
                                ?>
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                              <div class="card card-body">
                            <img id="blah" alt="product image" class="image-fluid" />
                        </div>
                       </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <?php
                       // if(empty($product_images)){ 
                       // echo form_open_multipart(base_url('Admin/Package/upload_product_image/' . $product['id']) ,array('id' => 'productImageForm'));
                        ?>
                        
                    <?php
                    //foreach ($product_images as $key => $p_image) {
                        ?>
                      <!--   <div class="img">
                            <img class="img-responsive" src="<?php //echo base_url('uploads/'.$p_image['image']); ?>" height="150px" width="150px">
                            <a href="<?php //echo base_url('Admin/Package/delete_product_image/'.$product['id'].'/'.$p_image['id']);?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </div> -->
                        <?php
                    //}
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include_once'footer.php'; ?>
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script type="text/javascript">
  CKEDITOR.replace('long_desc',{
    width: "500px",
    height: "200px"
  }); 
  </script>

<script type="text/javascript">
$(document).on('submit','#productImageForm',function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var  formData = new FormData(this);
    var t = $(this);
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function (data) {
            res = JSON.parse(data);
            alert(res.message)
            t.append('<input type="hidden" name="'+res.token_name+'" value="'+res.token_value+'" style="display:none;">')
            if(res.success == 1)
                location.reload();
        },
        cache: false,
        contentType: false,
        processData: false
    });
})   
</script>
