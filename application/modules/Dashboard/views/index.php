<?php
include_once'header.php';
$userinfo = userinfo();
// pr($userinfo,true);
date_default_timezone_set('asia/kolkata')
?>
<style>
.card.mini-stat.bg-primary.text-white {
    min-height: 120px;
    text-align: center;
}
.news {
    height: 223px;
}
.text-white-50 {
    color: #fff !important;
}
marquee {
    height: 100%;
}
tr:nth-child(even) {background-color: #f2f2f2;}

@media screen and (max-width:575px){
    .news {
        height: 100px;
    }
}

</style>
<script>
function countdown(element, seconds) {
    // Fetch the display element
    var el = document.getElementById(element).innerHTML;

    // Set the timer
    var interval = setInterval(function() {
        if (seconds <= 0) {
            //(el.innerHTML = "level lapsed");
            $('#'+element).text('level lapsed')

            clearInterval(interval);
            return;
        }
        var time = secondsToHms(seconds)
        $('#'+element).text(time)

        seconds--;
    }, 1000);
}

function secondsToHms(d) {
    d = Number(d);
    var day = Math.floor(d / (3600 * 24));
    var h = Math.floor(d % (3600 * 24) / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);

    var dDisplay = day > 0 ? day + (day == 1 ? " day, " : " days, ") : "";
    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " hours, ") : "";
    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " minutes, ") : "";
    var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
    var t = dDisplay + hDisplay + mDisplay + sDisplay;
    return t;
    // console.log(t)
}
</script>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="page-title-box">
                                    <h4 class="font-size-18">Dashboard</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item active">Welcome <?php echo ($userinfo->name) ?> (<?php echo ($userinfo->user_id) ?>)</li>

                                    </ol>
                                    <p class="breadcrumb-item"><?php
                                    //print_r($silver);
                                    // if(empty($silver)){
                                    //     $diff = strtotime('+3 days', strtotime($user['topup_date'])) - strtotime(date('Y-m-d H:i:s'));
                                    //     echo '<p class="timer-bg">Time Left for one left and one right :- <span id="demo" style="color:#fff;font-weight:bold;"></span></p>';
                                    //     echo'<script> countdown("demo",'.$diff.') </script>';
                                    // }

                                    // if(empty($gold)){
                                    //     $diff = strtotime('+30 days', strtotime($user['topup_date'])) - strtotime(date('Y-m-d H:i:s'));
                                    //     echo '<p class="timer-bg">GOLD CLUB Time Left :- <span id="demo1" style="color:#fff;font-weight:bold;"></span></p>';
                                    //     echo'<script> countdown("demo1",'.$diff.') </script>';
                                    // }

                                    ?>

                                    <script>
                                        var countDownDate = new Date("<?php echo date('Y-m-d H:i', strtotime('+168 hour', strtotime($userinfo->topup_date))); ?>").getTime();

                                        // Update the count down every 1 second
                                        var x = setInterval(function () {

                                            // Get today's date and time
                                            var now = new Date().getTime();

                                            // Find the distance between now and the count down date
                                            var distance = countDownDate - now;

                                            // Time calculations for days, hours, minutes and seconds
                                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                            // Output the result in an element with id="demo"
                                            document.getElementById("timer").innerHTML = days + "d " + hours + "h "
                                                    + minutes + "m " + seconds + "s ";

                                            // If the count down is over, write some text
                                            if (distance < 0) {
                                                clearInterval(x);
                                                document.getElementById("timer").innerHTML = "EXPIRED";
                                            }
                                        }, 1000);
                                    </script></p>
                                </div>
                            </div>

                            <div class="col-sm-6" style="display:none">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-settings mr-2"></i> Settings
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background:linear-gradient(87deg,#5e72e4,#825ee4)!important;">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/01.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">E-Wallet</h5>
                                            <h4 class="font-weight-medium font-size-24"><?php echo currency.''.$wallet_balance['wallet_balance'];?> </h4>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background:linear-gradient(87deg,#11cdef,#1171ef)!important;">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/02.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Current Package</h5>
                                            <h4 class="font-weight-medium font-size-24"><span class="text-gray"><?php echo currency.''.$userinfo->package_amount; ?> </h4>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background:linear-gradient(87deg,#f5365c,#f56036)!important">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/03.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Direct Referral</h5>
                                            <h4 class="font-weight-medium font-size-20">Active : <?php echo $paid_directs['paid_directs']; ?> , InActive : <?php echo $free_directs['free_directs']; ?>
                                                </h4>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background:linear-gradient(87deg,#172b4d,#1a174d)!important">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/03.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Business in PV</h5>
                                            <h4 class="font-weight-medium font-size-20">Left PV: <?php echo $userinfo->leftPower; ?>  Right PV: <?php echo $userinfo->rightPower; ?>
                                                </h4>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background:linear-gradient(87deg,#172b4d,#1a174d)!important">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/03.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total Business</h5>
                                            <h4 class="font-weight-medium font-size-20">Left: <?php echo $userinfo->leftPower * 25; ?>  Right: <?php echo $userinfo->rightPower * 25; ?>
                                                </h4>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background:#f0466b !important">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Available Income</h5>
                                            <h4 class="font-weight-medium font-size-24"><span class="text-gray"><?php echo currency.''.number_format($income_balance['income_balance'], 2); ?></span></h4>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background:linear-gradient(316deg, #fc5286, #fbaaa2)">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total Income</h5>
                                            <h4 class="font-weight-medium font-size-24"><span class="text-gray"><?php echo currency.''.round($total_income['total_income'],2); ?></span></h4>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background:#f0466b !important">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Direct Income</h5>
                                            <h4 class="font-weight-medium font-size-24"><span class="text-gray"><?php echo currency.''.number_format($direct_income['direct_income'], 2); ?></span></h4>

                                        </div>

                                    </div>
                                </div>
                            </div>

                           <!--  <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php //echo base_url('NewDashboard/');?>assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Level Income</h5>
                                            <h4 class="font-weight-medium font-size-24"><span class="text-gray"><?php //echo currency.''.$level_income['level_income']; ?></span> </h4>

                                        </div>

                                    </div>
                                </div>
                            </div> -->

                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background:linear-gradient(135deg, #ffc480, #ff763b)">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Matching Bonus</h5>
                                            <h4 class="font-weight-medium font-size-24"> <span class="text-gray"><?php echo currency.''.round($matching_bonus['matching_bonus'],2); ?></span></h4>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background:linear-gradient(to bottom, #0e4cfd, #6a8eff)">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Pool Income</h5>
                                            <h4 class="font-weight-medium font-size-24"><span class="text-gray"><?php echo currency.''.round($pool_income['pool_income'],2); ?></span></h4>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background:linear-gradient(to bottom, #0e4cfd, #6a8eff)">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php //echo base_url('NewDashboard/');?>assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Rewards incentive</h5>
                                            <h4 class="font-weight-medium font-size-24"><span class="text-gray"><?php //echo currency.''.round($rewards_income['reward_income'],2); ?></span></h4>

                                        </div>

                                    </div>
                                </div>
                            </div> -->





                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Today Income</h5>
                                            <h4 class="font-weight-medium font-size-24"><span class="text-gray"><?php echo currency.''.$today_income['today_income']; ?></span> </h4>

                                        </div>

                                    </div>
                                </div>
                            </div>

                             <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white" style="background: #754242 !important;">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Today Matching Income</h5>
                                            <h4 class="font-weight-medium font-size-24"><span class="text-gray"><?php echo currency.''.$today_matching_bonus['today_matching_bonus']; ?></span> </h4>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total Withdraw</h5>
                                            <h4 class="font-weight-medium font-size-24"><span class="text-gray"><?php echo currency.''.$total_withdrawal['total_withdrawal']; ?></span> </h4>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6" style="display: none;">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="float-left d-none mini-stat-img mr-4">
                                                <img src="<?php echo base_url('NewDashboard/');?>assets/images/services-icon/04.png" alt="">
                                            </div>
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Alliance Club B</h5>
                                            <h4 class="font-weight-medium font-size-24"><span class="text-gray"><?php echo currency.''.$daily_growth_income['daily_growth_income']; ?></span></h4>

                                        </div>

                                    </div>
                                </div>
                            </div>



                        </div>

    <div class="row">
      <div class="col-xl-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Left Share Link</h4>
            <div class="row copyrefferal box box-body pull-up bg-hexagons-white">
              <input style="width:100%; margin-bottom: 10px; float:left" type="text" id="linkTxt"
              value="<?php echo base_url('Dashboard/Register/?sponser_id='.$userinfo->user_id.'&position=L'); ?>"
              class="form-control">
              <button id="btnCopy" iconcls="icon-save" class="btncopy btn-rounded m-b-5 copy-section" style="background:#33db9e;
              margin-top: -3px;
              padding: 10px 0px;
              font-size: 15px;
              color: #fff;
              font-weight: bold;
              border-radius: 10px;
              border: navajowhite;
              float: left;
              width: 37%;
              cursor: pointer;
              margin-left: 5px;
              letter-spacing:2px;
              ">
              Copy link
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Right Share Link</h4>
            <div class="row copyrefferal box box-body pull-up bg-hexagons-white">
              <input style="width:100%; margin-bottom: 10px; float:left" type="text" id="linkTxt1"
              value="<?php echo base_url('Dashboard/Register/?sponser_id='.$userinfo->user_id.'&position=R'); ?>"
              class="form-control">
              <button id="btnCopy1" iconcls="icon-save" class="btncopy btn-rounded m-b-5 copy-section" style="background:#33db9e;
              margin-top: -3px;
              padding: 10px 0px;
              font-size: 15px;
              color: #fff;
              font-weight: bold;
              border-radius: 10px;
              border: navajowhite;
              float: left;
              width: 37%;
              cursor: pointer;
              letter-spacing:2px;
              margin-left: 5px;">
              Copy link
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <marquee direction="up" scrollamount="2">
        <?php foreach($news as $n):?>
          <p><?php echo $n['news'];?></p>
        <?php endforeach;?>
      </marquee>
    <div>
    <?php
        $rewardarr = [
            '1' => ['pair' => '400','designation' => 'Star','reward' => '20'],
            '2' => ['pair' => '1000','designation' => 'Silver Star','reward' => '50'],
            '3' => ['pair' => '2000','designation' => 'Pearl Star','reward' => '100'],
            '4' => ['pair' => '10000','designation' => 'Gold Star','reward' => '500'],
            '5' => ['pair' => '20000','designation' => 'Emrald Star','reward' => '1000'],
            '6' => ['pair' => '30000','designation' => 'Platinum Star','reward' => '1500'],
            '7' => ['pair' => '40000','designation' => 'Diamond Star','reward' => '2000'],
            '8' => ['pair' => '60000','designation' => 'Royal Diamond Star','reward' => '3000'],
            '9' => ['pair' => '80000','designation' => 'Crown Diamond Star','reward' => '4000'],
            '10' => ['pair' => '100000','designation' => 'Crown Ambassador Star','reward' => '5000'],
            '11' => ['pair' => '150000','designation' => 'Double Crown Ambassador Star','reward' => '7500'],
            '12' => ['pair' => '200000','designation' => 'Kohinoor Star','reward' => '10000'],
            '13' => ['pair' => '300000','designation' => 'Kohinoor Star','reward' => '15000'],
            '14' => ['pair' => '400000','designation' => 'Kohinoor Star','reward' => '20000'],
            '15' => ['pair' => '500000','designation' => 'Kohinoor Star','reward' => '25000'],
            '16' => ['pair' => '1000000','designation' => 'Kohinoor Star','reward' => '50000'],
            '17' => ['pair' => '2000000','designation' => 'Kohinoor Star','reward' => '100000'],
            '18' => ['pair' => '3000000','designation' => 'Kohinoor Star','reward' => '150000'],
            '19' => ['pair' => '4000000','designation' => 'Kohinoor Star','reward' => '200000'],
            '20' => ['pair' => '5000000','designation' => 'Kohinoor Star','reward' => '250000'],
            '21' => ['pair' => '6000000','designation' => 'Kohinoor Star','reward' => '300000'],
            '22' => ['pair' => '10000000','designation' => 'Kohinoor Star','reward' => '500000'],
            '23' => ['pair' => '14000000','designation' => 'Kohinoor Star','reward' => '700000'],
            '24' => ['pair' => '20000000','designation' => 'Kohinoor Star','reward' => '1000000'],
            '25' => ['pair' => '40000000','designation' => 'Kohinoor Star','reward' => '2000000'],
        ];
    ?>
   <!--  <div class="row">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead style="background:linear-gradient(180deg,#11cdef,#1171ef)!important; color: #fff;">
            <tr>
              <th>#</th>
              <th>Pair</th>
              <th>Left Pair</th>
              <th>Right Pair</th> -->
              <!-- <th>Designation</th> -->
             <!--  <th>Reward</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php //foreach($rewardarr as $key => $r):?>
            <tr>
              <td><?php //echo $key;?></td>
              <td><?php //echo '+'.$r['pair'];?></td>
              <td><?php //echo ($user['leftPower'] < $r['pair'])? $user['leftPower'] : $r['pair'];?></td>
              <td><?php //echo ($user['rightPower'] < $r['pair'])? $user['rightPower'] : $r['pair'];?></td> -->
              <!-- <td><?php //echo $r['designation'];?></td> -->
             <!--  <td><?php //echo $r['reward'];?></td>
              <td>
                <?php
                    //$cnt = count($reward);
                    //if($cnt >= $key){
                        //foreach($reward as $k => $re){
                          //  if($re['award_id'] == $key){
                           // echo '<font color="green">Achieved</font<';
                           // }
                        //}
                   // }else{
                    //    echo '<font color="red">Pending</font>';
                    //}
                ?>
              </td>
            </tr>
            <?php //endforeach;?>
          </tbody>
        </table>
      </div>
    </div> -->
  </div>
</div>
<?php include_once 'footer.php';  ?>
<script>


$(document).on('click', '#btnCopy', function () {
    //linkTxt
    var copyText = document.getElementById("linkTxt");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    alert("Copied the text: " + copyText.value);
})
$(document).on('click', '#btnCopy1', function () {
    //linkTxt
    var copyText = document.getElementById("linkTxt1");
    copyText.select();
    copyText.setSelectionRange(0, 99999)
    document.execCommand("copy");
    alert("Copied the text: " + copyText.value);
})
</script>
<?php if(popupbtn == 1):?>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               <!--   <h4 class="modal-title"><?php //echo $popup['caption'];?></h4>-->
            </div>
            <div class="modal-body">

                <?php
                if(!empty(popupImage)){
                    // if($popup['type'] == 'video')
                    //     echo '<iframe width="100%" height="400px" src="https://www.youtube.com/embed/'.$popup['media'].'"></iframe>';
                    // else
                        echo '<img style="max-width:100%" src="'.base_url(popupImage).'">';
                }else{
                    echo '<p>Welcome TO '.base_url().'</p>';
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<script>
  // $(document).on('click', '#btnCopy', function() {
     // linkTxt
      // var copyText = document.getElementById("linkTxt");
      // copyText.select();
      // copyText.setSelectionRange(0, 99999)
      // document.execCommand("copy");
      // alert("Copied the text: " + copyText.value);
  // })
</script>
<script>
$('#myModal').modal('show');
// $.get('<?php echo base_url('Dashboard/User/get_coin_prices')?>',function(res){
//   console.log(res)
//   // var html = '';
//   // $.each(res.success,function(key,value){
//   //   html += '<li><i class="cc BTC"></i> '+value.currency+' <span class="text-yellow"> $'+value.price+'</span></li>';
//   // })
//     console.log(res);
//   // $('#webticker-1').html(res);
// })
</script>
