<?php $this->load->view('header'); ?>
<style>
    .treemain li::before, .treemain li::after {
        content: '';
        position: absolute;
        top: -14px !important;
        right: 50%;
        border-top: 2px solid #000;
        width: 50%;
        height: 20px;
        z-index: 999999;
    }
    .treemain ul ul::before {
        content: '';
        position: absolute;
        top: -12px !important;
        left: 50%;
        border-left: 2px solid #000;
        width: 0;
        height: 20px;
    }
    .treemain ul {
        padding-top: 20px; position: relative;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }
    .treemain li {
        float: left; text-align: center;
        list-style-type: none;
        position: relative;
        padding: 0px 0px 0 5px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }
    .treemain li::before, .treemain li::after{
        content: '';
        position: absolute; top: 0; right: 50%;
        border-top: 2px solid #000;
        width: 50%; height: 20px;
    }
    .treemain li::after{
        right: auto; left: 50%;
        border-left: 2px solid #000;
    }
    .treemain li:only-child::after, .treemain li:only-child::before {
        display: none;
    }
    .treemain li:only-child{ padding-top: 0;}
    .treemain li:first-child::before, .treemain li:last-child::after{
        border: 0 none;
    }
    .Tree_box {
        overflow: scroll ;
    }
    @media (min-width: 320px) and (max-width: 1200px){
        .treemain {
            //margin: 0px auto;
            display: table;
            //width: 1000px !important;
            overflow : scroll;
            margin: 0px auto;
            width: 100000px !important;
        }
    }
    .treemain li:last-child::before{
        border-right: 2px solid #000;
        border-radius: 0 5px 0 0;
        -webkit-border-radius: 0 5px 0 0;
        -moz-border-radius: 0 5px 0 0;
        z-index: -0;
    }
    .treemain li:first-child::after{
        border-radius: 5px 0 0 0;
        -webkit-border-radius: 5px 0 0 0;
        -moz-border-radius: 5px 0 0 0;
        z-index: -0;
    }
    .treemain ul ul::before{
        content: '';
        position: absolute; top: 0; left: 50%;
        border-left: 2px solid #000;
        width: 0; height: 20px;
    }
    /*.tree li div:hover, .tree li div:hover+ul li div {
    background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
    }*/
    .treemain li div:hover+ul li::after,
    .treemain li div:hover+ul li::before,
    .treemain li div:hover+ul::before,
    .treemain li div:hover+ul ul::before{
        border-color:  #94a0b4;
    }
    .user-block{
        position: relative;
    }
    /*Popup Styling Starts*/
    .mx_pop_content.pop-up-content {
        display: none;
    }
    .user-block:hover .pop-up-content {
        display: block;
    }
    .pop-up-content {
        padding: 8px !important;
    }
    .mx_pop_content {
        position: absolute !important;
        top: -65px !important;
    }
    .pop-up-content {
        width: 280px;
        height: auto;
        display: block;
        background: #e7e7e7;
        border: solid 1px #c2c0c0;
        border-radius: 10px;
        z-index: 3;
        top: -100px;
        left: 86px;
        text-align: left;
        padding: 13px;
        position: relative;
    }
    .pop-up-content {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 2px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        background: #fff;
    }
    .profile_tooltip_pick {
        display: block;
        text-align: center;
        vertical-align: top;
        height: 30px;
        line-height: 30px;
        border-bottom: solid 1px #ccc;
        padding-bottom: 40px;
    }
    .profile_tooltip_pick {
        display: inline-block;
        vertical-align: top;
    }
    .image_tooltip {
        margin: 0 auto;
        line-height: 30px;
        box-shadow: none;
        width: 30px;
        height: 30px;
        display: inline-block;
    }
    .image_tooltip {
        width: 80px;
        height: 80px;
        background: #333333;
        border-radius: 50%;
        box-shadow: 4px 4px 3px #aaa;
    }
    a:link {
        cursor: pointer;
        -webkit-transition: 3s;
        -moz-transition: 3s;
        -o-transition: 3s;
        -ms-transition: 3s;
        transition: 3s;
    }
    .image_tooltip img {
        width: 100%;
        height: auto;
    }
    .profile-rounded-image-small {
        border-radius: 50px 50px 50px 50px;
    }
    .profile_tooltip_pick h2 {
        display: inline-block;
        padding: 0;
        vertical-align: middle;
        border: none;
    }
    .pop-up-content h2 {
        font-size: 17px;
        padding: 10px 0;
        border-bottom: solid 1px #ccc;
    }
    .tooltip_profile_detaile {
        border-bottom: solid 1px #ccc;
        padding-bottom: 5px;
    }
    .tooltip_profile_detaile {
        display: block;
        padding-left: 0;
        text-align: center;
        vertical-align: top;
    }
    .tooltip_profile_detaile {
        display: inline-block;
        vertical-align: top;
        padding-left: 10px;
    }
    .binary-node-single-item .tooltip_profile_detaile dl {
        line-height: 30px;
        margin: 0;
    }
    .tooltip_profile_detaile dl dt {
        color: #333333;
        position: relative;
        padding-right: 10px;
    }
    .tooltip_profile_detaile dl dt, .tooltip_profile_detaile dl dd {
        display: inline-block;
        vertical-align: middle;
        font-family: "latoregular";
        font-size: 14px;
        color: #727272;
    }
    .tooltip_profile_detaile dl dt:after {
        content: ':';
        position: absolute;
        top: 0;
        right: 0;
        display: block;
    }
    .tooltip_profile_detaile dl dt, .tooltip_profile_detaile dl dd {
        display: inline-block;
        vertical-align: middle;
        font-family: "latoregular";
        font-size: 14px;
        color: #727272;
    }
    .pop-up-content .rank_area {
        text-align: center;
    }
    .pop-up-content .rank_area .created-dl {
        display: inline-block;
        padding: 0;
        text-align: right;
        line-height: normal;
        margin-bottom: 0;
        line-height: 0;
    }
    .pop-up-content .rank_area .created-dl dt {
        display: inline-block;
        vertical-align: middle;
    }
    .pop-up-content .rank_area .created-dl dd {
        display: inline-block;
        vertical-align: middle;
    }
    .pop-up-content:after {
        background: url(https://soarwaylife.in/img/tooltip-arrow.png) no-repeat scroll 0 0 transparent !important;
    }
    .member-img {
        cursor: pointer;
        display: inline-block;
        position: relative;
    }
    .member-img {
        position: relative;
        padding: 5px 10px;
        text-decoration: none;
        color: #666;
        font-family: arial, verdana, tahoma;
        font-size: 11px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        transition: all 0.5s;
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
    }
    .member-img img {
        box-shadow: 0 0 0 4px white, inset 0 2px 0 rgba(0, 0, 0, 0.08), 0 3px 0 4px rgba(0, 0, 0, 0.05);
        border-radius: 50%;
    }
    .treemain span {
        display: block;
        color: #000;
        position: relative;
        top: 5px;
        padding: 2px 0;
        font-size: 18px;
        letter-spacing: 0.4px;
    }
    .hover-box {
        width: 218px;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 2px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        background: #fff;
        position: absolute;
        height: 222px;
        display: none;
        z-index: 9999;
        left: 106px;
        top: -41px;
        padding: 10px 10px;
    }
    .member-img:hover .hover-box {
        display: block;
    }
    .hover-box {
        text-align: left;
    }
    .ttreemainree {
        margin: 0px auto;
        display: table;
        /*        width:800px;*/
    }
    img {
        width: 70px;
        height: 70px;
    }
    .treemain ul:last-child::before {
        display: none;
    }
    div#content {
        background: white;
    }
    .treemain {
        overflow : scroll;
        margin: 0px auto;
        width: 100000px !important;
        min-height: calc(100vh - 250px);
    }
    .Tree_box {
        overflow: scroll;
        width: 100%;
        display: -webkit-box;
    }
    .title{
        padding: 20px;
        border-bottom: 1px solid #dee2e6;
    }
    /*Popup Styling Ends*/
</style>
<div class="content-wrapper">
    <div id="content">
        <div class="title">
            <h2>Genelogy Tree View</h2>
        </div>
        <div class="col-lg-12">
            <div class="menu-side original">
                <h1 class="page-header">
                    My Shop<div style="font-size: 16px;" class="ng-binding">(<label style="font-weight: 700;">Associate Name</label> : TARANJEET SINGH BEDI,<label style="font-weight: 700;">Associate Id</label> : 1710310073.001)</div>
                    <div class="btn-group pull-right follow-scroll" id="ribbon-container" style="position: relative; top: 0px;">
                        <a class="cart-right" data-toggle="dropdown" data-hover="dropdown" id="ribbon" aria-expanded="false">
                            <!--<i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span ng-show="CartItems.length>0">({{CartItems.length}})</span><span class="caret"></span>-->
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span ng-show="CartItems.length>0" class="ng-binding ng-hide">(0)</span>| sv <span ng-show="CartItems.length>0" class="ng-binding ng-hide">(0)</span><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu prd-list" id="outer">
                            <li>
                                <div class="col-lg-5 col-md-5 col-sm-5  col-xs-5 pname">Product Name</div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 qty">Qty</div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 qty">Amount</div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 qty">SV</div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 del" style="margin-top: -16px;"><button title="Close" ng-click="hideProdFrmCart()" class="btn-nl pull-right"><i class="fa fa-times fa-2x" style="color:red;"></i></button></div>
                            </li>
                            <hr>
                            <div class="listitem-scroll">
                                <!-- ngRepeat: CPrd in CartItems -->
                            </div>
                            <!--<li>
            <span>
                Product Name
                <button href="" class="btn-nl pull-right"><i class="fa fa-times" aria-hidden="true"></i></button>
            </span>
        </li>
        <li>
            <span>
                Product Name
                <button href="" class="btn-nl pull-right"><i class="fa fa-times" aria-hidden="true"></i></button>
            </span>
        </li>
        <li>
            <span>
                Neem & Alovera Glycerine Soap
                <button href="" class="btn-nl pull-right"><i class="fa fa-times" aria-hidden="true"></i></button>
            </span>
        </li>
        <li class="divider"></li>-->
                            <hr>
                            <li style="height:40px">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pname">Total :</div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 qty ng-binding">0</div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 qty ng-binding"><i class="fa fa-inr" aria-hidden="true"></i> 0</div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 qty ng-binding">0</div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 del"></div>
                            </li>
                            <hr>
                            <li>
                                <div class="row form-group">
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <input type="button" title="Remove All Items" value="Clear Cart" ng-click="ClearCart()" class="btn btn-default center-block btn-clear">
                                    </div>
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <input type="button" title="Proceed To Check Out" value="Check Out" ng-click="CheckOut()" class="btn btn-default center-block btn-clear">
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div> <!-- .btn-group -->
                </h1>
            </div><div class="menu-side cloned" style="position: fixed; top: 0px; margin-top: 0px; z-index: 500; display: none;">
                <h1 class="page-header">
                    My Shop<div style="font-size: 16px;" class="ng-binding">(<label style="font-weight: 700;">Associate Name</label> : TARANJEET SINGH BEDI,<label style="font-weight: 700;">Associate Id</label> : 1710310073.001)</div>
                    <div class="btn-group pull-right follow-scroll" id="ribbon-container" style="position: relative; top: 0px;">
                        <a class="cart-right" data-toggle="dropdown" data-hover="dropdown" id="ribbon" aria-expanded="false">
                            <!--<i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span ng-show="CartItems.length>0">({{CartItems.length}})</span><span class="caret"></span>-->
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span ng-show="CartItems.length>0" class="ng-binding ng-hide">(0)</span>| sv <span ng-show="CartItems.length>0" class="ng-binding ng-hide">(0)</span><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu prd-list" id="outer">
                            <li>
                                <div class="col-lg-5 col-md-5 col-sm-5  col-xs-5 pname">Product Name</div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 qty">Qty</div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 qty">Amount</div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 qty">SV</div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 del" style="margin-top: -16px;"><button title="Close" ng-click="hideProdFrmCart()" class="btn-nl pull-right"><i class="fa fa-times fa-2x" style="color:red;"></i></button></div>
                            </li>
                            <hr>
                            <div class="listitem-scroll">
                                <!-- ngRepeat: CPrd in CartItems -->
                            </div>
                            <!--<li>
            <span>
                Product Name
                <button href="" class="btn-nl pull-right"><i class="fa fa-times" aria-hidden="true"></i></button>
            </span>
        </li>
        <li>
            <span>
                Product Name
                <button href="" class="btn-nl pull-right"><i class="fa fa-times" aria-hidden="true"></i></button>
            </span>
        </li>
        <li>
            <span>
                Neem & Alovera Glycerine Soap
                <button href="" class="btn-nl pull-right"><i class="fa fa-times" aria-hidden="true"></i></button>
            </span>
        </li>
        <li class="divider"></li>-->
                            <hr>
                            <li style="height:40px">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 pname">Total :</div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 qty ng-binding">0</div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 qty ng-binding"><i class="fa fa-inr" aria-hidden="true"></i> 0</div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 qty ng-binding">0</div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 del"></div>
                            </li>
                            <hr>
                            <li>
                                <div class="row form-group">
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <input type="button" title="Remove All Items" value="Clear Cart" ng-click="ClearCart()" class="btn btn-default center-block btn-clear">
                                    </div>
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-6 ">
                                        <input type="button" title="Proceed To Check Out" value="Check Out" ng-click="CheckOut()" class="btn btn-default center-block btn-clear">
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div> <!-- .btn-group -->
                </h1>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mar-mp">
                <!--<div class="row">
                    <div class="col-md-offset-3 col-sm-offset-3 col-md-6 col-sm-6">
                        <img ng-show="loader" src="images/loading.gif" class="loading" />
                    </div>
                </div>-->
                <div class="row">
                    <h3>Select Products</h3>
                    <!-- ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Shower Gel</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00015_APXUmX.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">325</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">163</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">390</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Nephro Fit</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0206_sTiOcE.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">392</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">196</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">470</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Resp Clear</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0208_PuCKnU.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">392</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">196</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">470</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Glycemic Care</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0207_RCCArt.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">392</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">196</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">470</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">MaxOrac</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSE0101_lFeEjo.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">963</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">482</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1155</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">GastroCare</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0105_jmLCNv.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">771</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">386</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">925</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Cardio Cholesterol</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0102_FiFEYo.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">879</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">440</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1055</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Active IQ Kids</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSE0104_PtLzgU.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">633</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">317</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">760</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Beauty</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0101_uJQTEu.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">771</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">386</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">925</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Ashwagandha</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0115_uQdLWV.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">416</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">208</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">499</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Green Tea Extract</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0117_mcoCBD.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">667</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">334</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">800</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Safed Musli</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0119_MfJsIY.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">833</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">417</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">999</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Anti Ageing &amp; Anti Wrinkle</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0121_ghJKHq.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">950</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">475</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1140</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Beauty Pack  of 4</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS010126_sqFVRB.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">2622</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">1311</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">3700</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Beauty Pack of 2</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0260229_allffi.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">1388</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">694</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1850</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Garcinia Cambogia</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0118.._THEgrx.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">1000</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">500</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1199</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Green Coffee Bean Extract</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0122_vhmcFJ.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">916</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">458</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1099</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Green Coffee Bean Extract Pack of  5</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/Offer1911191_ZIJNAJ.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">1880</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">940</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">5495</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Safed Musli Pack of 5</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/Offer1911192_YMGaSu.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">1665</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">832</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">4995</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Cardio Cholesterol Pack of 2</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/Offer103_pHPhsO.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">1582</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">791</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">2110</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Cardio Cholesterol Pack of 4</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/Offer104_GYSMkg.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">2988</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">1494</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">4220</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">VitaMineral</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSE0102_FTNoSE.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">729</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">365</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">875</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">OrthoAid</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0104_GvkhYw.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">992</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">496</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1190</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Women Health</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSE0103_xXyjkw.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">963</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">482</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1155</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">LivHealth</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSS0103_lRIHWj.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">908</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">454</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1090</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Biotin</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSE0105_jXpfUv.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">417</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">209</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">500</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Ginkgo Biloba</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSE0106_HZDyRF.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">667</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">334</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">800</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Vitamin B12</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSE0109_PLUkAo.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">233</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">117</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">279</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Protein Health Powder</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSNSE0110_VeaWAe.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">1917</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">958</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">2300</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Sunscreen Lotion SPF 30</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00004_WHSjAu.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">300</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">150</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">360</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Moisturizing Cream</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00002_HVBsjN.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">325</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">163</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">390</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Neem  &amp; Ashwagandha Face Wash</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00001_wtWzFj.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">208</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">104</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">250</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">YaP Oil</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00008_FfCOMR.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">367</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">184</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">440</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">YaP Gel</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00009_TdhHhm.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">408</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">204</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">490</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Naturally Ageless Facewash</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00010_pRHxJK.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">208</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">104</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">250</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Foot Cream Clove &amp; Spearmint</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00011_BxkwMa.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">204</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">102</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">245</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Hydrating Body Lotion</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00012_cMbZAl.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">367</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">184</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">440</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Naturally Ageless Facial Kit</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00013_dPRjvb.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">292</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">146</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">350</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Anti Cellulite Gel</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00014_RDwLMS.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">479</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">240</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">575</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Anti Hair Fall Shampoo</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00016_Mszjww.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">329</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">165</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">395</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Strawberry Infused Shower Gel</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00017_CpPtnJ.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">325</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">163</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">390</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">AyuRenew Age Defy Day Cream</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00018_vFrdJJ.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">666</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">333</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">799</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">AyuRenew  Age Defy Night Cream</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00019_jTuvNZ.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">749</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">375</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">899</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Gold &amp; Glitter Facial Kit</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00020_KHYuEP.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">375</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">188</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">450</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Papaya &amp; Apricot Face Scrub</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00021_vxaXGC.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">208</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">104</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">250</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Anti Dandruff Shampoo</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00022_lAUmji.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">330</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">165</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">395</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Extra Clear Face Wash</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00023_JiCVfB.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">250</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">125</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">300</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Extra Clear Face Scrub</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00024_bHTzRE.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">272</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">136</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">325</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Extra Clear Face Moisturizer</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00025_SQQVgU.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">438</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">219</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">525</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Foot Cream  Pack of 2</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC000111_ZjaFje.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">368</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">184</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">490</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Foot Cream  Pack of 4</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC000112_UovjfK.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">694</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">347</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">980</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Extra Clear Spot &amp; Acne Corrector</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00026._uGcxzB.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">272</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">136</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">325</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Bright Essential Day Cream</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00027_EPJVlj.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">354</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">177</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">425</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Hair Vitals Gel</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00028_SJXfBI.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">412</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">206</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">495</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Aquamarine Facial Kit</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSPC00029_vQbpYO.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">1208</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">604</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1450</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Anti Cellulite Gel Pack of 2</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/Offer1630_TOBNsK.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">672</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">336</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1150</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Naturally Ageless Facewash Pack of 2</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/Offer101_rCkTmf.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">374</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">187</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">500</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Naturally Ageless Facewash Pack of 4</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/Offer102_XYEqZS.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">708</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">354</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">1000</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Product Catalogue Eng( 4 Pack)</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSBSM021_LTfYjU.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">75</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">0</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">90</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Gift Bag Pack of 5</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSBSM022_NcmOnR.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">50</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">0</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">60</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Business Plan Eng Pack of 10</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSBSM024_aaoQNv.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">40</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">0</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">48</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Business Plan Hindi Pack of 10</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WSBSM025_hLTzdx.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">40</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">0</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">48</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Train The Trainer Workshop</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/TrainingDelhi_KpcHya.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">3500</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">0</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">3500</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Welcome to VLCC Workshop</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/WTV_LfExCc.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">300</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">0</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">300</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products --><div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ng-scope" ng-repeat="Prd in Products">
                        <div ng-class="{'offer offer-warning' : Prd.IsNewProd==2,'offer offer-success' : Prd.IsNewProd==0 || Prd.IsNewProd==1 }" class="offer offer-success">
                            <div class="shape" ng-show="Prd.IsNewProd==1">
                                <div class="shape-text">
                                    New
                                </div>
                            </div>
                            <div class="shape ng-hide" ng-show="Prd.IsNewProd==2">
                                <div class="shape-text">
                                    Offer
                                </div>
                            </div>



                            <div class="offer-content ng-pristine ng-invalid ng-invalid-required" ng-form="FrmCartPrd" novalidate="">
                                <h3 class="ng-binding">Go Gold Workshop</h3>
                                <div class="col-xs-4 col-sm-6 col-md-4 col-lg-6 hovereffect">
                                    <img src="ProductImages/Training Go Gold_Fqkepz.png" alt="">
                                </div>
                                <div class="col-xs-5 col-sm-6 col-md-4 col-lg-6 mar-lt left-box">
                                    <div class="row">
                                        <label class="control-label l-label w-text">AP</label>
                                        <label class="control-label ng-binding">950</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">SV</label>
                                        <label class="control-label ng-binding">0</label>
                                    </div>
                                    <div class="row">
                                        <label class="control-label l-label w-text">MRP</label>
                                        <label class="control-label ng-binding">950</label>
                                    </div>
                                    <div class="row" ng-class="{ 'has-error' : FrmCartPrd.qty.$invalid &amp;&amp; !FrmCartPrd.qty.$pristine }">
                                        <input type="text" name="qty" maxlength="3" id="qty" ng-model="Prd.qty" class="input-mini lab-w ng-pristine ng-invalid ng-invalid-required" ng-init="Prd.qty=''" numbers-only="" required="">
                                    </div>
                                    <div class="row">
                                        <input type="button" ng-disabled="FrmCartPrd.$invalid || Prd.qty==0" ng-click="AddToCart(Prd,$index)" value="Add To Cart" class="btn btn-default btn-clear mar-t" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end ngRepeat: Prd in Products -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
