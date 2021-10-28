<?php $this->load->view('header');?>
<div class="content-wrapper" style="min-height: 378px; background:white">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Order Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <?php echo form_open(base_url('Dashboard/Shopping/place_order'),array('id' => 'ShoppingForm'));?>
            <div class="row">
                <div class="col-md-3">Associate ID: <?php echo $user['user_id'];?></div>
                <div class="col-md-3"></div>
                <div class="col-md-3">Associate Name: <?php echo $user['first_name'] .' ' .$user['last_name'] ;?></div>
                <div class="col-md-3"></div>
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>BV</th>
                            <th>IGST</th>
                            <th>SGST</th>
                            <th>Discount Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_quantity = 0;
                        $total_mrp = 0;
                        $total_bv = 0;
                        $total_discount = 0;
                        $total_igst = 0;
                        $total_sgst = 0;
                        foreach ($products as $key => $product) {
                            $total_quantity = $total_quantity + $product['quantity'];
                            $total_mrp = $total_mrp + ($product['mrp'] * $product['quantity']);
                            $total_bv = $total_bv + ($product['bv'] * $product['quantity']);
                            $total_discount = $total_discount + ($product['discount'] * $product['quantity']);
                            $total_igst = $total_igst + ($product['igst'] * $product['quantity']);
                            $total_sgst = $total_sgst + ($product['sgst'] * $product['quantity']);
                            ?>
                            <tr>
                                <td><?php echo ($key + 1) ?></td>
                                <td><?php echo $product['title']; ?></td>
                                <td><?php echo $product['quantity']; ?><input type="hidden" name="quantity[]" value="<?php echo $product['quantity'];?>"></td>
                                <td><?php echo number_format($product['mrp'] * $product['quantity'],2); ?><input type="hidden" name="product_ids[]" value="<?php echo $product['id'];?>"></td>
                                <td><?php echo $product['bv'] * $product['quantity']; ?></td>
                                <td><?php echo $product['igst'] * $product['quantity']; ?></td>
                                <td><?php echo $product['sgst'] * $product['quantity']; ?></td>
                                <td><?php echo $product['discount'] * $product['quantity']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="2" class="text-right">Total</td>
                            <td><?php echo $total_quantity;?></td>
                            <td><?php echo number_format($total_mrp,2);?></td>
                            <td><?php echo $total_bv;?></td>
                            <td><?php echo $total_igst;?></td>
                            <td><?php echo $total_sgst;?></td>
                            <td><?php echo $total_discount;?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td align="right"><b>Gross Total :</b></td>
                                <td align="right" class=""><?php echo number_format($total_mrp,2);?></td>
                            </tr>
                            <tr>
                                <td align="right"><b class=""> GST :</b></td>
                                <td align="right" class=""><?php echo number_format(($total_igst + $total_sgst),2);?></td>
                            </tr>
                            <tr>
                                <td align="right"><b> Discount :</b></td>
                                <td align="right" class=""><?php echo number_format($total_discount,2);?></td>
                            </tr>
                            <tr>
                                <td align="right"><b>Handling Charges :</b></td>
                                <td align="right" class=""><?php echo number_format($shipping_charges['amount'],2);?></td>
                            </tr>
                            <?php
                            $total_price_with_gst = $total_mrp + (($total_igst + $total_sgst));
                            $total_price_after_discount = $total_price_with_gst - $total_discount;
                            $total_price_with_shipping_charges = $total_price_after_discount + $shipping_charges['amount'];
                            ?>
                            <tr>
                                <td align="right"><b>Total Amount : </b></td>
                                <td align="right" class=""><?php echo number_format($total_price_with_shipping_charges ,2)?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" id="AddressRow" style="display:none;">
                <div class="col-md-3">
                    <h2>DELIVERY ADDRESS</h2>
                </div>
                <div class="col-md-7" id="selectedAddress">
                    
                </div>
                <div class="col-md-2">
                    <button type="button" id="chadrbtn">Change Address</button>
                </div>
                <input type="hidden" name="address_id" id="address_id">
            </div>
            <div class="row" id="PymntRow" style="display:none;">
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    PAYMENT METHOD
                </div>
                <div class="col-md-3">
                    <select name="payment_method" id="payment_method" class="form-control">
                        <option value="e_wallet">E-wallet</option>
                        <option value="offline">OFFINE</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="hidden" name="user_id" value="<?php echo $user['user_id'];?>" required>
                    <span id="balanceShow">Rs.<?php echo $wallet_balance['wallet_balance'];?></span>
                    <button type="submit">PROCEED TO PLACE ORDER</button>
                </div>
            </div>
            <?php echo form_close();?>
            <?php echo form_open(base_url('Dashboard/Shopping/AddUserAddress/') , array('method' => 'post' , 'id' => 'AddressForm'));?>
                <div class="row">
                    <div class="col-md-12">
                        <h2>DELIVERY ADDRESS</h2>
                    </div>
                    <div class="row" style="width: 100%;" id="AddressList">
                    </div>
                    <div class="col-md-12">
                        <h2 id="addbtn">Add New Address </h2>
                    </div>
                    <div id="AddrssForm" style="width:100%; display:none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" name="phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" rows="1" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="form-control" name="state">
                                        <?php
                                        foreach($states as $state)
                                            echo'<option value="'.$state['id'].'">'.$state['name'].'</option>';
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pin Code :</label>
                                    <input type="hidden" name="user_id" value="<?php echo $user['user_id'];?>" required>
                                    <input type="number" name="postal_code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success pull-right">Add</button
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<?php $this->load->view('footer');?>
<script>
$(document).on('submit','#AddressForm',function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var formData = $(this).serialize();
    var t = $(this);
    $.post(url,formData,function(res){
        alert(res.message)
        t.append('<input type="hidden" name="'+res.token_name+'" value="'+res.token_value+'">')
        if(res.success == 1)
            get_address_list();

    },'json')
})
get_address_list();
function get_address_list(){
    var url = '<?php echo base_url("Dashboard/Shopping/getUserAddress/".$user["user_id"]);?>';
    $.get(url,function(res){
        if(res.success ==1){
            var html = '';
            $.each(res.addresses , function(key,value){
                console.log(value)
                html += '<div class="col-md-4">'+
                            '<div class="card card-warning">'+
                                '<div class="card-header">'+
                                    '<h3 class="card-title">'+value.name+'</h3>'+
                                   '<div class="card-tools">'+
                                        '<button type="button" class="btn btn-tool">'+
                                        '<i class="fas fa-trash dltadrs" data-addr_id="'+value.id+'"></i>'+
                                        '</button>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="card-body">'+
                                value.address + '<br>' + value.city +'<br>'+ value.state.name + '<br>'+value.postal_code
                                
                                +'<b>'+value.phone+'</b><br>'
                                +'<b><button type="button" data-address_id="'+value.id+'" data-addr="<h3>'+value.name+'</h3>'+value.address + '<br>' + value.city +'<br>'+ value.state.name + '<br>'+value.postal_code +'" class="slcadr">Select</button></b><br>'
                                +'</div>'+
                            '</div>'+
                        '</div>';
            })
            $('#AddressList').html(html)
        }
    },'json')
}
$(document).on('click','.dltadrs',function(){
    var r = confirm("Are your Sure to Delete this Address!");
    var address_id = $(this).data('addr_id');
    if (r == true) {
        var url = '<?php echo base_url("Dashboard/Shopping/DeleteUserAddress/");?>'+address_id;
        $.get(url,function(res){
            alert(res.message)
            if(res.success == 1)
                get_address_list()
        },'json')
    }
})
$(document).on('click','#addbtn',function(){
    $('#AddrssForm').toggle('slow')
})
$(document).on('click','.slcadr',function(){
    var address_id = $(this).data('address_id');
    var address = $(this).data('addr');
    $('#selectedAddress').html(address);
    $('#address_id').val(address_id)
    $('#AddressRow').css('display','block');
    $('#PymntRow').css('display','block');
    $('#AddressForm').css('display','none');
})
$(document).on('click','#chadrbtn',function(){
    $('#AddressRow').css('display','none');
    $('#PymntRow').css('display','none');
    $('#AddressForm').css('display','block');
})

$(document).on('submit','#ShoppingForm',function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var formData = $(this).serialize();
    var t = $(this);
    $.post(url,formData,function(res){
        alert(res.message)
        t.append('<input type="hidden" name="'+res.token_name+'" value="'+res.token_value+'">')
        if(res.success == 1){
            window.location.href='<?php echo base_url("Dashboard/Shopping")?>'
        }

    },'json')
}) 
$(document).on('change','#payment_method',function(){
    $('#balanceShow').toggle();
})
</script>