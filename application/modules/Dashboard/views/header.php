<?php
if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}
$user_info = userinfo();
$bankinfo = bankinfo();
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
          <title><?php echo title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="icon" href="<?php echo base_url('NewDashboard/');?>assets/images/favicon.png">
        <link href="<?php echo base_url('NewDashboard/') ?>assets/libs/chartist/chartist.min.css" rel="stylesheet">

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url('NewDashboard/') ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url('NewDashboard/') ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url('NewDashboard/') ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

       <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
       <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
body[data-sidebar=dark] .navbar-brand-box {
     background: #000;
}
body[data-sidebar=dark] .vertical-menu {
    background:linear-gradient(0deg,#0098f0,#00f2c3);
}
body[data-sidebar=dark] #sidebar-menu ul li a {
    color: #fff;
    font-size: 16px;
     font-family: 'Poppins', sans-serif;
}
ul#side-menu li.active {
    background: #000;
}
body[data-sidebar=dark] #sidebar-menu ul li a i {
    color: #fff;
}
body[data-sidebar=dark] #sidebar-menu ul li ul.sub-menu li a {
    color: #fff;
    background: 0 0;
}
body[data-sidebar=dark] #sidebar-menu ul li ul.sub-menu li a:hover {
    color: #fff;
}
body[data-sidebar=dark] #sidebar-menu ul li a:hover {
    color: #fff;
}
body[data-sidebar=dark] #sidebar-menu ul li a:hover i {
    color: #fff;
}
body[data-sidebar="dark"] .mm-active .active {
    color: #261d1d  !important;
</style>
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box" style="background-color: #fff;">
                            <a href="index-2.html" class="logo logo-dark">
                                <span class="logo-sm">

                                    <img src="<?php echo base_url(logo); ?>" alt="" style="max-width:150px;">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url(logo); ?>" alt="" style="max-width:150px;">
                                </span>
                            </a>

                            <a href="index-2.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url(logo); ?>" alt="" style="max-width:150px;">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url(logo); ?>" alt="" style="max-width:150px;">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>

                        <!-- <div class="d-none d-sm-block">
                            <div class="dropdown pt-3 d-inline-block">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Create <i class="mdi mdi-chevron-down"></i>
                                    </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="d-flex">
                          <!-- App Search-->
                          <form class="app-search d-none ">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="fa fa-search"></span>
                            </div>
                        </form>

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-search-dropdown">

                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                      <!--   <div class="dropdown d-none d-md-block ml-2">
                            <button type="button" class="btn header-item waves-effect"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="mr-2" src="<?php echo base_url('NewDashboard/');?>assets/images/flags/us_flag.jpg" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?php echo base_url('NewDashboard/');?>assets/images/flags/germany_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> German </span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?php echo base_url('NewDashboard/');?>assets/images/flags/italy_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> Italian </span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?php echo base_url('NewDashboard/');?>assets/images/flags/french_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> French </span>
                                </a>

                     
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?php echo base_url('NewDashboard/');?>assets/images/flags/spain_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> Spanish </span>
                                </a>

                           
                                 <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?php echo base_url('NewDashboard/');?>assets/images/flags/russia_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> Russian </span>
                                </a>
                            </div>
                        </div> -->

                        <div class="dropdown d-none d-lg-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-danger badge-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 font-size-16"> Notifications (258) </h5>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="#" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-warning rounded-circle font-size-16">
                                                    <i class="mdi mdi-message-text-outline"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">New Message received</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">You have 87 unread messages</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-info rounded-circle font-size-16">
                                                    <i class="mdi mdi-glass-cocktail"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">It is a long established fact that a reader will</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-danger rounded-circle font-size-16">
                                                    <i class="mdi mdi-message-text-outline"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1">New Message received</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">You have 87 unread messages</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2 border-top">
                                    <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                                        View all
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?php echo base_url('uploads/'.$bankinfo->profile_image); ?>"
                                    alt="Header Avatar">
                                    <?php echo $user_info->name; ?> (<?php echo $user_info->user_id; ?>)
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="<?php echo base_url('Dashboard/User/Profile'); ?>"><i class="mdi mdi-account-circle font-size-17 align-middle mr-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-wallet font-size-17 align-middle mr-1"></i> My Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings font-size-17 align-middle mr-1"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline font-size-17 align-middle mr-1"></i> Lock screen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?php echo base_url('Dashboard/User/logout'); ?>"><i class="bx bx-power-off font-size-17 align-middle mr-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                        <div class="dropdown d-none">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="mdi mdi-settings-outline"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu" >
                            <li class="menu-title">Main</li>

                            <li class="active">
                                <a href="<?php echo base_url('Dashboard/User/'); ?>" class="waves-effect">
                                    <i class="ti-home"></i><span class="badge badge-pill badge-primary float-right">2</span>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('uploads/plan.pdf'); ?>" class=" waves-effect" target="_blank">
                                    <i class="ti-calendar"></i>
                                    <span>Business Plan</span>
                                </a>
                            </li>

                            <!-- <li>
                                <a href="<?php// echo base_url('Dashboard/User/Profile'); ?>" class=" waves-effect">
                                    <i class="ti-calendar"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li> -->

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-package"></i>
                                    <span>Profile</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                  <li><a href="<?php echo base_url('Dashboard/Profile'); ?>">Edit Profile</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/Profile/accountDetails'); ?>">Edit Bank Details</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/Profile/changePassword'); ?>">Change Password</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="<?php echo base_url('Dashboard/Register/?sponser_id=' . $user_info->user_id); ?>" class=" waves-effect">
                                    <i class="ti-calendar"></i>
                                    <span>Register New</span>
                                </a>
                            </li>





                            <!-- <li class="menu-title">Components</li> -->

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-package"></i>
                                    <span>Request Wallet</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                  <!-- <li><a href="<?php //echo base_url('Dashboard/User/addBalance'); ?>">Add Balance</a></li> -->
                                  <li><a href="<?php echo base_url('Dashboard/fund/Request_fund'); ?>">Fund Request</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/fund/requests'); ?>">Requests History</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/fund/wallet_ledger'); ?>">Wallet Ledger</a></li>
                                  <!-- <li><a href="<?php //echo base_url('Dashboard/User/addBalanceHistory'); ?>">Topup Wallet History</a></li> -->
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="ti-receipt"></i>
                                    <span class="badge badge-pill badge-success float-right">6</span>
                                    <span>Account Active</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                  <li><a href="<?php echo base_url('Dashboard/ActivateAccount'); ?>"> Active New Account</a></li>
                                  <!-- <li><a href="<?php //echo base_url('Dashboard/UpgradeAccount'); ?>"> Upgrade Account</a></li> -->
                                  <li><a href="<?php echo base_url('Dashboard/Fund/activation_history'); ?>">Active Account History</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-pie-chart"></i>
                                    <span>My Team</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                  <li><a href="<?php echo base_url('Dashboard/User/Directs'); ?>">My Directs</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/User/Genelogy'); ?>">Team View</a></li>

                                  <!-- <li><a href="<?php echo base_url('Dashboard/User/Tree/' . $user_info->user_id); ?>">My Direct Tree</a></li> -->
                                  <li><a href="<?php echo base_url('Dashboard/User/Downline'); ?>">My  Downline</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/User/Downline/L'); ?>">Left Downline</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/User/Downline/R'); ?>">Right Downline</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/User/GenelogyTree/' . $user_info->user_id); ?>">Team Tree</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/User/Pool/' . $user_info->user_id); ?>">Pool Tree</a></li>
                                </ul>
                            </li>
                            <!-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-view-grid"></i>
                                    <span>Reward</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php //echo base_url('Dashboard/Task/reward') ?>">Reward List</a></li>
                                </ul>
                            </li> -->

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-package"></i>
                                    <span>Shopping</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                  <li><a href="<?php echo base_url('Dashboard/Shopping/product_list?user_id=admin'); ?>">Order</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/Shopping/order_list'); ?>">Order Details</a></li>
                                  <!-- <li><a href="<?php echo base_url('Dashboard/Support/Outbox'); ?>">OutBox</a></li> -->
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-view-grid"></i>
                                    <span>Withdraw Money</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <!-- <li><a href="<?php //echo base_url('Dashboard/matchingWithdraw') ?>">Withdrawal</a></li> -->
                                  <li><a href="<?php echo base_url('Dashboard/DirectIncomeWithdraw') ?>">Withdrawal</a></li>
                                  <!-- <li><a href="<?php //echo base_url('Dashboard/IncomeTransfer') ?>"> Transfer to Another Account</a></li> -->
                                  <!-- <li><a href="<?php //echo base_url('Dashboard/eWalletTransfer') ?>"> Transfer to E-Wallet</a></li> -->
                                  <li><a href="<?php echo base_url('Dashboard/withdraw_history') ?>">Withdrawal History</a></li>

                                    <!-- <li><a href="<?php //echo base_url('Dashboard/Withdraw/ActivateBanking') ?>"> 1. Activate Banking</a></li>
                                    <li><a href="<?php //echo base_url('Dashboard/Withdraw/AddBeneficiary') ?>"> 2. Add New Beneficiary</a></li>
                                    <li><a href="<?php //echo base_url('Dashboard/Withdraw/BeneficiaryList') ?>"> 3. IMPS Transfer</a></li>
                                    <li><a href="<?php //echo base_url('Dashboard/bank_transfer_summary') ?>">Bank Transfer Summary</a></li> -->
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-face-smile"></i>
                                    <span>Account Statement</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                  <?php
                                  $incomes = incomes();
                                  foreach ($incomes as $key => $income) {
                                      echo' <li>
                                            <a href="' . base_url('Dashboard/User/Income/' . $key) . '">' . $income . '</a>
                                         </li>';
                                  }
                                  ?>

                                  <li><a href="<?php echo base_url('Dashboard/User/income_ledgar'); ?>">Income Ledger</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/Settings/payout_summary'); ?>">Datewise Payout Summary</a></li>
                                  <!-- <li><a href="<?php //echo base_url('Dashboard/Settings/week_payout_summary'); ?>">Weekwise Payout Summary</a></li> -->
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ti-package"></i>
                                    <span>Support Ticket</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                  <li><a href="<?php echo base_url('Dashboard/Support/ComposeMail'); ?>">Create Ticket</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/Support/Inbox'); ?>">Inbox</a></li>
                                  <li><a href="<?php echo base_url('Dashboard/Support/Outbox'); ?>">OutBox</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="<?php echo base_url('Dashboard/User/logout'); ?>">
                                    <i class="ti-more"></i>
                                    <span>Logout</span>
                                </a>

                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
