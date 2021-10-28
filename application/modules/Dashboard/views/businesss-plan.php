<?php include'header.php' ?>
<style>
    .flg img{
        width: 23px;
        position: relative;
        top: -1px;
        left: 9px;
    }

    #txt{
        position: relative;
        left: 10px;
        top: 1px;
    }




    .bmn {
        display: block;
        text-align: center;
        margin: 0 auto;
        outline: 0 !important;
        padding: 6px 15px;
        border: 0;
        border-radius: 5px;
    }

    .search-sec .input-group {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -ms-flex-align: stretch;
        align-items: stretch;
        width: 100%;
        padding: 5px 0;
    }
    .search-sec .input-group  label{
        width: 35px;
    }
    .search-sec h4 {
        font-size: 12px;
        font-weight: 600;
        color: #818284;
        text-transform: uppercase;
        margin-bottom: 15px;
    }
    .input-group .cel {
        position: absolute;
        right: 9px;
        z-index: 3;
        top: 15px;
    }
    .input-group .cel {
        position: absolute;
        right: 9px;
        z-index: 3;
        top: 15px;
    }
    .input-group .cel1{  position: absolute;
                         right: 9px;
                         z-index: 3;
                         top: 15px;}
    .input-group .cel1 i {
        background: #ff9500;
        color: #fff !important;
        padding: 4px 4px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bolder;
    }

    .trecord {
        color: #ff3b30;
        font-size: 30px;
        text-align: center;
        font-weight: 600;
        display: block;
    }
    .status-a {
        padding: 17px 0;
    }
    .status-a span {
        font-size: 13px;
        text-align: center;
        font-weight: 600;
    }
    .filter span {
        font-size: 22px;
        /* text-align: center; */
        font-weight: 600;
        display: block;
    }
    .search-sec .col-lg-2, .search-sec .col-lg-3 {
        border-left: 2px solid #eaeaea;
        margin: -17px 0;
        /* padding: 0; */
        padding: 10px 16px;
    }.search-sec .col-lg-2:first-child{border:0;}

    .search-sec {
        background: #fff none repeat scroll 0 0;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        border-radius: 5px;
        float: left;
        padding: 16px 16px;
        width: 100%;
        margin-top: 16px;
    }
    .search-sec-1 {
        /* border: 1px solid #dad6d6; */
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        border-radius: 5px;
        float: left;
        width: 100%;
        position: relative;
        margin-top: 16px;
        box-shadow: 0px 3px 5px #c3cdce;
    }
    .user-img {
        padding: 16px 16px;
        width: 15%;
        float: left;
        padding: 0;
        height: 133px;
    }
    .user-img img {
        width: 100%;
        height: 100%;
        border-bottom-left-radius: 5px;
        border-top-left-radius: 5px;
    }
    .search-sec-2 {
        width: 85%;
        float: left;
        background: #fff none repeat scroll 0 0;
        border-bottom-right-radius: 5px;
        border-top-right-radius: 5px;
    }
    .sec-left{
        text-align: center;
    }
    .sec-right {
        text-align: center;
        border-left: 1.5px dashed #d6d5d5;
    }
    .sec-right:before {
        content: '';
        /* width: 10px; */
        /* height: 10px; */
        /* background: #d5fff2; */
        position: absolute;
        border-radius: 34px;
        top: -8px;
        left: 0px;
        /* overflow: hidden; */
        /* clear: both; */
        /* border-bottom-left-radius: 0; */
        /* border-top-left-radius: 42px; */
        border: 8px solid #eaeaea;
    }
    .sec-right:after {
        content: '';
        width: 10px;
        height: 10px;
        background: #d5fff2;
        position: absolute;
        border-radius: 34px;
        top: 93%;
        left: 0;
        right: 0px;
        /* overflow: hidden; */
        /* clear: both; */
        /* border-bottom-left-radius: 0; */
        /* border-top-left-radius: 42px; */
        border: 8px solid #eaeaea;
    }
    .sec-left .position span {
        font-size: 16px;
        font-weight: 600;
        color: #00877e;
        padding: 0;
        margin: 0;
        text-align: center;
        line-height: 32px;
        text-transform: uppercase;
    }
    .sec-left .position label {
        color: #788385;
    }
    .sec-left .position {
        border-right: 1px solid #e8e4e4;
        padding: 6px 3px;
        border-left: 1px solid #e8e4e4;
    }
    .sec-left .position:first-child{

        border-bottom: 1px solid #e8e4e4;
    }
    .sec-right .position label{
        text-transform: uppercase;
        font-size: 10px; color: #788385;
    }
    .sec-right .starus {
        padding: 21px 0;
    }
    .sec-right .position span {
        font-size: 37px;
        font-weight: 600;
        color: #657274;
    }
    .sec-right .starus span {
        padding: 7px 10px;
        border-radius: 5px;
        color: #fff;
    }
    .user-img img {
        width: 100%;
        height: 100%;
        border-bottom-left-radius: 5px;
        border-top-left-radius: 5px;
        background: #fff;
    }
    .sec-center {
        padding: 15px 0 15px 15px;
    }
    .sec-center .name {
        font-size: 23px;
        font-weight: 600;
        margin: 0;
        line-height: 18px;
        color: #657274;
        text-transform: capitalize;
        padding-bottom: 12px;
    }
    .sec-center .name span{
        font-size: 11px;
        color: #b0b7b9;
    }
    .sec-center .country span {
        padding: 0 13px;
    }
    .sec-center .country {
        position: absolute;
        top: 20px;
        padding: 4px 16px;
        text-align: left;
        color: #fff;
        right: -8px;
        text-transform: uppercase;
        background: #647275;
        font-weight: 600;
        font-size: 10px;
        z-index: 1;
    }
    .sec-center .country img {
        width: 15px;
    }

    .sec-center .country span{}
    .sec-center .other-detail ul {
        line-height: 15px;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .sec-center .other-detail li {
        display: inline;
        padding: 0 0px 0 12px;
        position: relative;
        color: #747d7e;
    }
    .sec-center .other-detail li:first-child {
        display: inline;
        padding: 0;
    }
    .sec-center .other-detail li:nth-child(2):before, .sec-center .other-detail li:nth-child(3):before {
        content: '';
        background: #00877e;
        width: 4px;
        top: 9px;
        left: 0;
        height: 4px;
        position: absolute;
        border-radius: 100%;
    }
    .sec-center .other-detail li b{
        margin-left: 7px;
    }
    .number {
        position: relative;
        position: absolute !important;
        background: #00877e !important;
        color: #fff !important;
        border-radius: 14%!important;
        width: 30px !important;
        font-weight: normal;
        height: 30px !important;
        line-height: 20px !important;
        top: 0px !important;
        left: 0px;
        line-height: 24px !important;
        text-align: center;
        font-size: 14px;
        font-weight: bolder;
        border: 2px solid #fff;
    }




    @media (min-width: 768px) and (max-width: 992px)
    {.sec-center {
         padding: 10px 0px 0px 0px;
     }
     .sec-center .other-detail li {
         display: inline;
         padding: 0 0px 0 12px;
         position: relative;
         color: #747d7e;
         line-height: 14px;
     }
     .search-sec .col-md-4, .search-sec .col-md-8 {
         border-top: 1px solid #eaeaea;
         margin: 0;
         border-right: 1px solid #eaeaea;
         border-left: 0;
     }
     .search-sec .col-md-4{
         border-top: 1px solid #eaeaea;
         margin: 0;
         border-right: 0;
         border-left: 1px solid #eaeaea;
         border-bottom: 1px solid #eaeaea;
     }
     .search-sec .col-md-8 {
         border-top: 1px solid #eaeaea;
         margin: 0;
         border-right: 1px solid #eaeaea;

     }
     .search-sec .col-md-4:first-child {
         border-top: 1px solid #eaeaea;
         margin: 0;
         border-right: 1px solid #eaeaea;
         border-left: 1px solid #eaeaea;
     }
     .search-sec .col-md-4:last-child
     {
         border-right: 1px solid #eaeaea;
     }
     .sec-center .other-detail ul {
         line-height: 10px;
         margin: 0;
         padding: 0;
         list-style: none;
     }
     .sec-center .country {
         position: absolute;
         top: 8px;
         padding: 4px 6px;
         text-align: left;
         color: #fff;
         right: -8px;
         text-transform: uppercase;
         background: #647275;
         font-weight: 600;
         font-size: 10px;
         z-index: 1;
     }
     .sec-center .name {
         font-size: 16px;
         padding-bottom: 0px;
     }
    }
    @media (max-width: 767px)
    {
        .sec-center .name {
            font-size: 16px;

        }
        .breadcrumb {
            margin-top: 35px;
        }
        .search-sec .col-lg-2, .search-sec .col-lg-3 {
            border-left: 0;
            margin: -17px 0;
            /* padding: 0; */
            padding: 10px 16px;
        }
        .content, .page-header-fixed.page-sidebar-fixed .content {
            margin-left: 0;
            padding: .9375rem .9375rem 3.6875rem;
            overflow: initial;
            height: auto;
            margin-top: 16px;
        }
        .search-sec {
            background: #fff none repeat scroll 0 0;
            /* -webkit-border-radius: 5px; */
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            /* border-radius: 5px; */
            float: left;
            padding: 16px 0px;
            width: 100%;
            margin-top: 16px;
        }
        .search-sec h4 {
            font-size: 12px;
            font-weight: 600;
            color: #818284;
            text-transform: uppercase;
            margin-bottom: 15px;
            margin-top: 25px;
            text-align: left !important;
        }

        .user-img {
            padding: 16px 16px;
            width: 40%;
            float: left;
            padding: 0;
            position: absolute;
            z-index: 1;
            border: 1px solid #f1eaea;
        }
        .search-sec-2 {
            width: 100%;
            float: left;

        }

        .sec-right {
            text-align: center;
            border-left: 1.5px dashed #d6d5d5;
            position: absolute;
            top: -268px;
            right: 8px;
            padding: 0 12px;
            background: #fff;
        }
        .sec-left .position {
            border-right: 1px solid #e8e4e4;
            padding: 6px 3px;
            border-left: 1px solid #e8e4e4;
            border-bottom: 1px solid #e8e4e4;
        }
        .sec-center .country {
            position: absolute;
            top: 11px;
            padding: 4px 3px;
            text-align: left;
            color: #fff;
            right: 0;
            text-transform: uppercase;
            background: #647275;
            font-weight: 600;
            font-size: 9px;
            z-index: 1;
        }
        .sec-right:before {
            content: '';
            position: absolute;
            border-radius: 34px;
            top: -8px;
            left: -8px;
            border: 8px solid #eaeaea;
        }
        .sec-right:after {
            content: '';
            width: 10px;
            height: 10px;
            background: #d5fff2;
            position: absolute;
            border-radius: 34px;
            top: 95%;
            left: -8px;
            right: 0;
            border: 8px solid #eaeaea;
            z-index: 0;
        }
        .sec-center {
            padding: 15px 0 15px 15px;
            z-index: 9;
            position: relative;
            background: #fff;
        }
        .sec-center .country span {
            padding: 0 5px;
        }
        .search-sec {
            background: #fff none repeat scroll 0 0;
            /* -webkit-border-radius: 5px; */
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            /* border-radius: 5px; */
            float: left;
            padding: 16px 16px;
            width: 100%;
            margin-top: 16px;
        }
        .search-sec h4 {
            font-size: 12px;
            font-weight: 600;
            color: #818284;
            text-transform: uppercase;
            margin-bottom: 15px;
            margin-top: 25px;
            text-align: left !important;
        }



        .sec-center {
            padding: 15px 0 15px 15px;
            z-index: 9;
            position: relative;
            background: #fff;
        }

        .social-widget > ul > li {
            float: left;
            text-align: left;
            width: 33.33%;
            margin: 0 auto;
            padding: 0;
            position: relative;
            display: block;
        }
        .social-widget > ul > li.de:before {
            content: '';
            /* border-right: 1px solid #f3f1f1; */
            width: 1px;
            height: 98px;
            background: linear-gradient(to bottom,#fffbfb -32%,#efeeee 100%)!important;
            position: absolute;
            bottom: -16px;
            margin-right: 18px;
            display: block;
            right: -12px;
        }
        .rr .col-sm-12:first-child{width:30%;float:left;}
        .rr .col-sm-12:last-child {
            width: 70%;
            float: left;
        }
        .bmn {
            display: block;
            text-align: center;
            margin: 11px auto;
            outline: 0 !important;
            padding: 6px 15px;
            border: 0;
            border-radius: 5px;
        }

        .navbar-nav-list .nav.navbar-nav>li, .navbar-xs-justified .nav.navbar-nav>li {
            width: auto;
        }

        .diamond {
            padding: 12px 5px!important;
        }


    }
    #header {
        height: 72px;
    }

    .side-padding {
        padding: 30px 0 0 0;
    }

    #page-container {
        padding-top: 4.10rem;
    }

    #mobile-logo {
        display: none;
    }


    @media only screen and (max-width: 767px) {
        #screen-logo {
            display: none;
        }

        .moview {
            font-size: 15px;
        }

        #mobile-logo {
            display: block;
        }

        .list-inline > li {
            display: inline-block;
            padding: 0 7px 0;
        }
    }



    .diamond {
        margin: 5px 0;
        padding: 8px 5px;
        border-radius: 19px;
    }


    .star-line
    {
        position: absolute;
        top: 5px;
        margin-left: 6px;

    }
    .name {
        position: relative;

    }
    @media only screen and (max-width: 767px){
        .sec-center .name {
            position: unset;
            word-break: break-all;
            width: 235px;
        }

        .star-line{
            position: unset;
            margin-left: 0px;
        }
    }
</style>
<style>
    #content .page-titel spna
    {
        color: #3fbfd7;
    }

    #content .page-titel
    {
        font-size: 13px;
        font-weight: 500;
        text-transform: uppercase;
    }
</style>
<div id="content" class="content">
    <!-- BEGIN page-header -->
    <h2 class="page-titel">
        <spna style="">Download Plan</spna> / Business Plan
    </h2>
    <h1 class="page-header">
      Business Plan
        <small></small>
    </h1>
    <!-- END page-header -->
    <div class="row">
        <div class="col-md-12">
          <p>Bittrex BTC Worlds Best Opportunity to get success</p>
            <a href="<?php echo base_url('NewTheme/')?>assets/bittrexbtcplans.pdf" >Click here to Download Business Plan </a>
        </div>
    </div>
    <div class="row">

    </div>
</div>













<?php include'footer.php' ?>
