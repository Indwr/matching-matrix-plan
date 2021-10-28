<?php $this->load->view('header'); ?>
<style>
.offer-success {
    border-color: #5cb85c;
}

.offer {
    background: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    margin: 15px 0;
    overflow: hidden;
}
.offer-success .shape {
    border-color: transparent #5cb85c transparent transparent;
}
.shape-text {
    color: #fff;
    font-size: 12px;
    font-weight: bold;
    position: relative;
    right: -40px;
    top: 2px;
    white-space: nowrap;
    -ms-transform: rotate(30deg);
    -o-transform: rotate(360deg);
    -webkit-transform: rotate(30deg);
    transform: rotate(30deg);
}
.offer-content {
    padding: 5px;
}
.offer-content h3 {
    margin-top: 0px;
    margin-left: 0px;
    font-size: 15px;
    height: auto;
    width: 100%;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    padding: 10px 0px;
}
.hovereffect img {
    cursor: pointer;
    display: block;
    position: relative;
    -webkit-transition: all .2s linear;
    transition: all .2s linear;
}
.offer-content img {
    width: 130px;
    height: 130px;
    float: left;
    margin-left: -20px;
    margin-bottom: 10px;
}
.offer-content .left-box .l-label {
    font-size: 14px;
    font-weight: bold;
}
input.btn.btn-default.btn-clear.mar-t {
    color: #fff;
    background: #00826d;
    margin: 10px auto;
    display: inline;
}
#ribbon-container a {
    display: block;
    padding: 10px;
    position: relative;
    background: #0089d0;
    overflow: visible;
    height: 54px;
    margin-left: 29px;
    color: #fff;
    text-decoration: none;
    z-index: 1000;
    height: 42px;
    margin-top: 21px;
}
.cart-right {
    margin-top: 20px;
    font-size: 18px;
    float: right;
    color: #333;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}
.listitem-scroll {
    max-height: 160px;
    overflow: auto;
}
.offer-content .left-box .l-label {
    font-size: 14px;
    font-weight: bold;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    /* font-weight: 700; */
}
.prd-list {
    width: 460px;
}
.pull-right>.dropdown-menu {
    right: 0;
    left: auto;
}
.prd-list li {
    display: block;
    width: 100%;
    height: auto;
    padding: 5px 10px;
    font-size: 18px;
    margin-bottom: 10px;
}

.prd-list li .pname {
    width: 190px;
    border: 0px solid red;
    font-weight: bold;
    font-size: 16px;
    /* color: red; */
    text-align: left;
}
.prd-list li .qty {
    border: 0px solid red;
    font-weight: bold;
    font-size: 16px;
    text-align: left;
}
input.btn.btn-default.center-block {
    background: green;
    color: #fff;
    font-size: 20px;
}
input.btn.btn-default.center-block.red {
    background: red;
    color: #fff;
    font-size: 20px;
}
.prd-list li .del {
    /* width: 50px; */
    border: 0px solid red;
    font-weight: bold;
    font-size: 12px;
}
.title {
    background: #58bdad;
    padding: 20px;
    color: #fff;
    font-size: 33px;
}
.mainshopindia {
    width: 23%;
    float: left;
    margin-right: 1%;
    background: #fff;
    margin-top: 30px;
    padding: 20px;
    box-shadow: 0px 0px 5px rgb(230 230 230);
}
.mainshopindia img {
    max-width: 100%;
    max-height: 149px;
    margin: 0px auto;
    display: block;
}
label.control-label.l-label.w-text {
    width: 59px;
    font-weight: bold;
}
.ng-binding
{
  font-size: 20px;
  text-align: center;
  font-weight: bold;
}
@media (max-width: 767px) {

.mainshopindia
  {
      width: 100%;
      float: left;
      margin-right: 1%;
  }
}

button.addCart {
    background: #58bdad;
    color: #fff;
    border: none;
    padding: 10px 20px;
    margin: 10px auto;
}
button, input {
    overflow: visible;
    margin: 0px auto;
}
.quantity {
    font-size: 16px;
}
.ng-binding.mrp {
    font-size: 16px;
    text-align: left;
}
hr {
    margin-top: 0px;
    margin-bottom: 0px;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}
.listitem-scroll .row {
    border-bottom: 1px #e2e2e2 solid;
    margin-bottom: 0px;
    padding: 5px 0px;
}
.btn-group.pull-right.follow-scroll {
    background: green;
    color: #fff;
    margin: 0px;
    padding: 0px;
    font-size: 20px;
    padding: 10px;
    font-weight: bold;
    cursor: pointer;
}
@media screen and (max-width: 480px){
    ul#outer{
        max-width: 280px;
    }
}
</style>
<div class="main-content">
<div class="page-content">
    <div id="content">
        <div class="row title">
            <div class="col-md-6">
              <h3>My Shop</h3>
            </div>
            <div class="col-md-6">
                <div style="font-size: 20px;" class="ng-binding">
                    (<label style="font-weight: 700;">Associate Name</label> : <?php echo $user['name'];?>,
                    <label style="font-weight: 700;">Associate Id</label> : <?php echo $user['user_id'];?>)
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="menu-side original">
                <h1 class="page-header">
                    <div class="btn-group pull-right follow-scroll" style="position: relative;left: 0;top: 0;z-index: 9999999;">
                        <a class="font-size-16" data-toggle="dropdown" data-hover="dropdown" id="ribbon" aria-expanded="false">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                            <span class="" id="cartLength">(0)</span>| BV
                            <span class="" id="bvCount">(0)</span>
                            <span class="caret"></span><i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <?php echo form_open(base_url('Dashboard/Shopping/checkout/'),array('method' => 'GET'));?>
                        <ul class="dropdown-menu prd-list" id="outer">
                            <li>
                                <div class="row">
                                    <div class="col-lg-5 col-3 col-sm-5  col-xs-5 pname">Product Name</div>
                                    <div class="col-lg-1 col-2 col-sm-1 col-xs-1 qty">Qty</div>
                                    <div class="col-lg-3 col-3 col-sm-3 col-xs-3 qty">Amount</div>
                                    <div class="col-lg-2 col-2 col-sm-2 col-xs-2 qty">BV</div>
                                    <div class="col-lg-1 col-1 col-sm-1 col-xs-1 del" style="margin-top: -16px;">
                                    <button title="Close" class="btn-nl pull-right">
                                        <i class="fa fa-times fa-2x" style="color:red;"></i>
                                    </button>
                                    </div>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="listitem-scroll">
                                    <span id="cartDetails">
                                    </span>
                                </div>
                            </li>
                            <hr>
                            <li style="height: auto;background: beige;padding: 10px;margin: 0px;">
                                <div class="row" id="cartTotal">
                                    <div class="col-lg-5 col-5 col-sm-5 col-xs-5 pname">Total :</div>
                                    <div class="col-lg-1 col-1 col-sm-1 col-xs-1 qty ng-binding">0</div>
                                    <div class="col-lg-3 col-3 col-sm-3 col-xs-3 qty ng-binding"><i class="fa fa-inr" aria-hidden="true"></i> 0</div>
                                    <div class="col-lg-2 col-2 col-sm-2 col-xs-2 qty ng-binding">0</div>
                                    <div class="col-lg-1 col-1 col-sm-1 col-xs-1 del"></div>
                                </div>
                            </li>
                            <hr>
                            <li>
                                <div class="row form-group">
                                    <div class="col-md-6 col-6 col-6 col-xs-6 ">
                                        <input type="button" title="Remove All Items" value="Clear Cart" class="btn btn-default center-block btn-clear red">
                                    </div>
                                    <div class="col-md-6 col-6 col-6 col-xs-6 ">
                                        <input type="hidden" name="user_id" value="<?php echo $user['user_id'];?>">
                                        <button type="submit" title="Proceed To Check Out"class="btn btn-default center-block btn-clear">
                                            Check Out
                                        </button>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <?php echo form_close();?>
                    </div> <!-- .btn-group -->
                </h1>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mar-mp">
                <div class="row">
                    <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-6">
                        <img ng-show="loader" src="https://gifimage.net/wp-content/uploads/2017/08/loading-gif-transparent-4.gif" class="loading" style="display:none;"/>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <?php
                        foreach($products as $key => $product){
                            // pr($product['image']);
                            ?>
                            <div class="mainshopindia">
                                <h3 class="ng-binding"><?php echo $product['title'];?></h3>
                                <img src="<?php echo base_url('uploads/'.$product['image']);?>" alt="">
                                <div class="packagesdetsils">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>MRP</th>
                                            <th>DP</th>
                                            <th>BV</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $product['mrp'];?></td>
                                            <td><?php echo $product['dp'];?></td>
                                            <td><?php echo $product['bv'];?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="row text-center">
                                        <span style="text-align:center; width: 100%">Enter Quantity</span>
                                        <input type="number" name="qty" maxlength="10" id="qty" class="input-mini lab-w ng-pristine" required="">
                                      </br>
                                    </div>

                                    <div class="row text-center">
                                        <button type="button" class="addCart" class="btn btn-default btn-clear mar-t"
                                        data-title="<?php echo $product['title'];?>"
                                        data-product_id="<?php echo $product['id'];?>"
                                        data-image="<?php echo base_url('uploads/'.$product['image']);?>"
                                        data-mrp="<?php echo $product['mrp'];?>"
                                        data-bv="<?php echo $product['bv'];?>"
                                        >
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $this->load->view('footer'); ?>

<script>
$(document).on('click','.addCart',function(){
    var quantity = $(this).parents('.mainshopindia').find('input[name=qty]').val();
    // alert(quantity);
    if(quantity > 0){
        var title = $(this).data('title');
        var product_id = $(this).data('product_id');
        var image = $(this).data('image');
        var new_product = 0;
        $('#cartDetails').find('.row').each(function(key,value){
            console.log($(value).attr('id'));
            if($(value).attr('id') == 'product'+product_id){
                new_product = 1;
            }
        })
        if(new_product == 0){
            var mrp = $(this).data('mrp') * quantity;
            var bv = $(this).data('bv') * quantity;
            var html = '<div class="row" id="product'+product_id+'">'+
                            '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pnametd">'+
                                '<div class="left-column">'+
                                    '<img style="display:none" class="prdimg-circle img-circle" alt="Cinque Terre" src="'+image+'">'+
                                '</div>'+
                                '<div class="right-column ng-binding pname">'+title+'</div>'+
                            '</div>'+
                            '<div class="col-lg-1 col-1 col-sm-1 col-xs-1 qtytd ng-binding quantity">'+quantity+'</div>'+
                            '<input type="hidden" name="quantity[]" value="'+quantity+'">'+
                            '<input type="hidden" name="product_ids[]" value="'+product_id+'">'+
                            '<div class="col-lg-3 col-3 col-sm-3 col-xs-3 qtytd ng-binding mrp">'+mrp+'</div>'+
                            '<div class="col-lg-2 col-2 col-sm-2 col-xs-2 qty ng-binding bv">'+bv+'</div>'+
                            '<div class="col-lg-1 col-1 col-sm-1 col-xs-1 deltd">'+
                            '<button title="Remove" data-product_id="'+product_id+'" class="btn-nl pull-right trshcrtprdct">'+
                                '<i class="fa fa-times" aria-hidden="true"></i>'+
                            '</button>'+
                            '</div>'+
                        '</div>';
            $('#cartDetails').append(html);
        }else{
            var old_quantity = parseInt($('#product'+product_id).find('.quantity').text());
            var new_quantity = parseInt(old_quantity) + parseInt(quantity);
            var mrp = $(this).data('mrp') * new_quantity;
            var bv = $(this).data('bv') * new_quantity;
            var html = '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pnametd">'+
                            '<div class="left-column">'+
                                '<img style="display:none" class="prdimg-circle img-circle" alt="Cinque Terre" src="'+image+'">'+
                            '</div>'+
                            '<div class="right-column ng-binding pname">'+title+'</div>'+
                        '</div>'+
                        '<div class="col-lg-1 col-1 col-sm-1 col-xs-1 qtytd ng-binding quantity">'+new_quantity+'</div>'+
                        '<input type="hidden" name="quantity[]" value="'+new_quantity+'">'+
                        '<input type="hidden" name="product_ids[]" value="'+product_id+'">'+
                        '<div class="col-lg-3 col-3 col-sm-3 col-xs-3 qtytd ng-binding mrp">'+mrp+'</div>'+
                        '<div class="col-lg-2 col-2 col-sm-2 col-xs-2 qty ng-binding bv">'+bv+'</div>'+
                        '<div class="col-lg-1 col-1 col-sm-1 col-xs-1 deltd">'+
                        '<button title="Remove" data-product_id="'+product_id+'" class="btn-nl pull-right trshcrtprdct">'+
                            '<i class="fa fa-times" aria-hidden="true"></i>'+
                        '</button>'+
                        '</div>';
            $('#product'+product_id).html(html);
        }
        calculate_cart();
    }else{
        alert('Minimum Quantity is One');
    }
})
function calculate_cart(){
    var total_quantity = 0;
    var total_mrp = 0 ;
    var total_bv = 0;
    var total_items = 0;
    $('#cartDetails').find('.row').each(function(key,value){
        total_quantity = parseInt($(value).find('.quantity').text()) + parseInt(total_quantity);
        total_mrp = parseInt($(value).find('.mrp').text()) + parseInt(total_mrp);
        total_bv = parseInt($(value).find('.bv').text()) + parseInt(total_bv);
        total_items = total_items + 1;
    })
    var html = '<div class="col-lg-5 col-5 col-sm-5 col-xs-5 pname">Total :</div>'+
            '<div class="col-lg-1 col-1 col-sm-1 col-xs-1 qty">'+total_quantity+'</div>'+
            '<div class="col-lg-3 col-3 col-sm-3 col-xs-3 qty"><i class="fa fa-inr" aria-hidden="true"></i> '+total_mrp+'</div>'+
            '<div class="col-lg-2 col-2 col-sm-2 col-xs-2 qty">'+total_bv+'</div>'+
            '<div class="col-lg-1 col-1 col-sm-1 col-xs-1 del"></div>';
    $('#cartTotal').html(html);
    $('#cartLength').text('('+total_items+')');
    $('#bvCount').text('('+total_bv+')');
}
$(document).on('click','.trshcrtprdct',function(){
    var product_id = $(this).data('product_id');
    $('#product'+product_id).remove();
    calculate_cart();
})
$(document).on('click','#clearCart',function(){
    $('#cartDetails').html('');
})
</script>
