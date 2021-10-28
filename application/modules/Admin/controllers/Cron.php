<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
        $this->load->model(array('Main_model'));
        $this->load->helper(array('admin', 'security'));
        date_default_timezone_set('Asia/Kolkata');
        $this->public_key = '';
        $this->private_key = '';
    }

    public function index() {

    }

    public function point_match_cron() {
        $response['users'] = $this->Main_model->get_records('tbl_users', '((left_count >= 2 and right_count >= 1) || (left_count >= 1 and right_count >= 2) )', 'id,user_id,sponser_id,left_count,right_count,package_amount,capping');
        foreach ($response['users'] as $user) {
            pr($user);
            $position_directs = $this->Main_model->count_position_directs($user['user_id']);
            if(!empty($position_directs) && count($position_directs) == 2){
                $user_package = $this->Main_model->get_single_record_desc('tbl_package', array('price' => $user['package_amount']), '*');
                $user_match = $this->Main_model->get_single_record_desc('tbl_point_matching_income', array('user_id' => $user['user_id']), '*');
                if (!empty($user_match)) {
                    if ($user['left_count'] > $user['right_count']) {
                        $old_income = $user['right_count'];
                    } else {
                        $old_income = $user['left_count'];
                    }
                    if ($user_match['left_bv'] > $user_match['right_bv']) {
                        $new_income = $user_match['right_bv'];
                    } else {
                        $new_income = $user_match['left_bv'];
                    }
                    $income = ($old_income - $new_income);
                    $user_income = $income * $user_package['binaryincome'];
                    if ($user_income > 0) {
                        if($user_income > $user['capping']){
                            $user_income = $user['capping'];
                        }
                        $matchArr = array(
                            'user_id' => $user['user_id'],
                            'left_bv' => $user['left_count'],
                            'right_bv' => $user['right_count'],
                            'amount' => $user_income,
                        );
                        $this->Main_model->add('tbl_point_matching_income', $matchArr);
                        $incomeArr = array(
                            'user_id' => $user['user_id'],
                            'amount' => $user_income,
                            'type' => 'matching_bonus',
                            'description' => 'Point Matching Bonus'
                        );
                        $this->Main_model->add('tbl_income_wallet', $incomeArr);
                        //$this->generation_income($user['sponser_id'] , $user_income , $user['user_id'],'salary_income');
                        pr($matchArr);
                    }
                } else {
                    if ($user['left_count'] > $user['right_count']) {
                        $income = $user['right_count'];
                    } else {
                        $income = $user['left_count'];
                    }
                    $user_income = $income * $user_package['binaryincome'];
                    //                echo $user_income;
                    if($user_income > $user['capping']){
                        $user_income = $user['capping'];
                    }
                    $matchArr = array(
                        'user_id' => $user['user_id'],
                        'left_bv' => $user['left_count'],
                        'right_bv' => $user['right_count'],
                        'amount' => $user_income,
                    );
                    $this->Main_model->add('tbl_point_matching_income', $matchArr);
                    $incomeArr = array(
                        'user_id' => $user['user_id'],
                        'amount' => $user_income,
                        'type' => 'matching_bonus',
                        'description' => 'Point Matching Bonus'
                    );
                    $this->Main_model->add('tbl_income_wallet', $incomeArr);
                    //$this->generation_income($user['sponser_id'] , $user_income , $user['user_id'],'direct_sponser_income');
                    pr($matchArr);
                }

            }
        }
        pr($response);
        die('code executed Successfully');
    }

    
    public function roiCron(){
        $roi_users = $this->Main_model->get_records('tbl_roi', array('days >' => 0), '*');
        foreach($roi_users as $key => $user){
            $new_day = $user['days'] - 1;
            $incomeArr = array(
                'user_id' => $user['user_id'],
                'amount' => $user['roi_amount'],
                'type' => $user['type'],
                'description' => 'Daily Pool Income at '.$user['days'] . ' Day',
            );
            pr($incomeArr);
            $this->Main_model->add('tbl_income_wallet', $incomeArr);
            $this->Main_model->update('tbl_roi', array('id' => $user['id']), array('days' => $new_day, 'amount' => ($user['amount'] - $user['roi_amount'])));
        }
    }

    public function royaltyIncome(){
        $date = date('Y-m-d',strtotime(date('Y-m-d').' - 1 days'));
        echo $date;
        $users1 = $this->Main_model->get_records('tbl_users',['paid_status' => '1','directs >=' => '25','royalty1' => '1'],'user_id');
        $users2 = $this->Main_model->get_records('tbl_users',['paid_status' => '1','directs >=' => '70','royalty2' => '1'],'user_id');
        $users3 = $this->Main_model->get_records('tbl_users',['paid_status' => '1','directs >=' => '150','royalty3' => '1'],'user_id');
        $users4 = $this->Main_model->get_records('tbl_users',['paid_status' => '1','directs >=' => '200','royalty4' => '1'],'user_id');

        $todayBusiness = $this->Main_model->get_single_record('tbl_users',['date(topup_date)' => $date],'ifnull(sum(package_amount),0) as business');
        if(!empty($users1)){
            $perUserIncome = ($todayBusiness['business']*0.02)/count($users1);
            foreach($users1 as $k1 => $u1){
                $userData1 = [
                    'user_id' => $u1['user_id'],
                    'amount' => $perUserIncome,
                    'type' => 'royalty_income',
                    'description' => 'First Royalty Income',
                ];
                $this->Main_model->add('tbl_income_wallet',$userData1);
            }
        }
        if(!empty($users2)){
            $perUserIncome = ($todayBusiness['business']*0.03)/count($users2);
            foreach($users2 as $k2 => $u2){
                $userData2 = [
                    'user_id' => $u2['user_id'],
                    'amount' => $perUserIncome,
                    'type' => 'royalty_income',
                    'description' => 'Second Royalty Income',
                ];
                $this->Main_model->add('tbl_income_wallet',$userData2);
            }
        }
        if(!empty($users3)){
            $perUserIncome = ($todayBusiness['business']*0.05)/count($users3);
            foreach($users3 as $k3 => $u3){
                $userData3 = [
                    'user_id' => $u3['user_id'],
                    'amount' => $perUserIncome,
                    'type' => 'royalty_income',
                    'description' => 'Third Royalty Income',
                ];
                $this->Main_model->add('tbl_income_wallet',$userData3);
            }
        }
        if(!empty($users4)){
            $perUserIncome = ($todayBusiness['business']*0.1)/count($users4);
            foreach($users4 as $k4 => $u4){
                $userData4 = [
                    'user_id' => $u4['user_id'],
                    'amount' => $perUserIncome,
                    'type' => 'royalty_income',
                    'description' => 'Second Royalty Income',
                ];
                $this->Main_model->add('tbl_income_wallet',$userData4);
            }
        }
    }

    public function blockFakeRegistration(){
        $users = $this->Main_model->get_records('tbl_temp_users',['status' => 0],'id,user_id,utr_number,created_at');
        foreach($users as $key => $u){
            $date1 = date('Y-m-d H:i:s');
            $date2 = date('Y-m-d H:i:s',strtotime($u['created_at'].' + 10 minutes'));
            $diff = strtotime($date1) - strtotime($date2);
            if($diff > 0){
                if(empty($u['utr_number'])){
                    $this->Main_model->update('tbl_temp_users',['id' => $u['id'],'user_id' => $u['user_id']],['status' => 2]);
                }
            }
        }
    }

    public function roi_level_income($user_id = '', $down_id = ''){
      // if(date('D') == 'Sun' || date('D') == 'Sat'){
      //     die('its weekend');
      // }
      //die;
        // $cron = $this->Main_model->get_single_record('tbl_cron','  date(created_at) = date(now()) and cron_name = "roi_level_cron"' ,'*');
        // if(empty($cron)){
        //     $users = $this->Main_model->get_records('tbl_users',['paid_status' => 1],'user_id,sponser_id');
        //     foreach($users as $key => $user){
        //         $down_id = $user['user_id'];
        //         $user_id = $user['sponser_id'];
                $incomes = [
                    1 => ['income' => 0.02 , 'directs' => 1],
                    2 => ['income' => 0.03 , 'directs' => 2],
                    3 => ['income' => 0.04 , 'directs' => 3],
                    4 => ['income' => 0.03 , 'directs' => 4],
                    5 => ['income' => 0.02 , 'directs' => 5],
                    6 => ['income' => 0.02 , 'directs' => 6],
                    7 => ['income' => 0.01 , 'directs' => 7],

                ];
                foreach($incomes as $key => $income){
                    $user = $this->Main_model->get_single_record('tbl_users',['user_id' => $user_id],'user_id,sponser_id,directs');
                    if(!empty($user)){
                        pr($user);
                        if($user['directs'] >= $income['directs']){
                            $income = array(
                                'user_id' => $user['user_id'],
                                'amount' => $income['income'],
                                'type' => 'roi_level_income',
                                'description' => 'ROI Level income At Level '.$key . ' from '.$down_id,
                            );
                            $this->Main_model->add('tbl_income_wallet', $income);
                        }
                        $user_id = $user['sponser_id'];
                    }
                }
            // }
        //     $this->Main_model->add('tbl_cron', array('cron_name' => 'roi_level_cron'));
        // }else{
        //     echo'today cron already run';
        // }
    }

    public function WithdrawCron(){
        $users = $this->Main_model->withdraw_users(500);
        pr($users);
        foreach($users as $key => $user){
            $DirectIncome = array(
                'user_id' => $user['user_id'],
                'amount' => - $user['total_amount'] ,
                'type' => 'withdraw_request',
                'description' => 'Withdraw Request',
            );
            $this->Main_model->add('tbl_income_wallet', $DirectIncome);
            $withdrawArr = array(
                'user_id' => $user['user_id'],
                'amount' => $user['total_amount'] ,
                'type' => 'withdraw_request',
                'tds' => $user['total_amount']* 5 /100,
                'admin_charges' => $user['total_amount']  * 5 /100,
                'fund_conversion' => 0,
                'payable_amount' => $user['total_amount'] * 90 /100
            );
            $this->Main_model->add('tbl_withdraw', $withdrawArr);
        }
    }
    public function rewardsCron(){
        $awardsArr = [
            '1' => ['pair' => '15','days' => '7','reward' => 'Travelling Bags'],
            '2' => ['pair' => '25','days' => '15','reward' => 'Microwave Oven'],
            '3' => ['pair' => '50','days' => '25','reward' => 'Wrist Watch'],
            '4' => ['pair' => '75','days' => '30','reward' => 'Refrigerator'],
            '5' => ['pair' => '100','days' => '45','reward' => 'Mobile'],
            '6' => ['pair' => '200','days' => '60','reward' => '"32" LED'],
            '7' => ['pair' => '500','days' => '100','reward' => 'National Trip 3+2'],
            '8' => ['pair' => '1000','days' => '1000','reward' => 'Laptop'],
            '9' => ['pair' => '2500','days' => '1000','reward' => 'Bike 100cc'],
            '10' => ['pair' => '5000','days' => '1000','reward' => 'Activa 6G'],
            '11' => ['pair' => '10000','days' => '1000','reward' => 'Bullet Bike'],
            '12' => ['pair' => '25000','days' => '1000','reward' => 'Kwid Car'],
            '13' => ['pair' => '50000','days' => '1000','reward' => 'Tata Nexon'],
            '14' => ['pair' => '100000','days' => '1000','reward' => 'Jeep Compass'],
            '15' => ['pair' => '250000','days' => '1000','reward' => 'Jaguar Car'],
        ];
        foreach ($awardsArr as $key => $award){
            $users = $this->Main_model->get_records('tbl_users', ['left_count >=' => $award['pair'],'right_count >=' => $award['pair']], 'user_id,left_count,right_count');
            foreach($users as $key2 => $u){
                $check = $this->Main_model->get_single_record('tbl_rewards',['award_id' => $key,'user_id' => $u['user_id']],'*');
                if(empty($check)){
                    $rewardData = [
                        'user_id' => $u['user_id'],
                        'amount' => $award['reward'],
                        'award_id' => $key,
                    ];
                    $this->Main_model->add('tbl_rewards',$rewardData);
                    pr($rewardData);
                }
            }
        }
    }



    public function credit_salary_income(){
        $roi_users = $this->Main_model->get_records('tbl_roi', array('amount >' => 0 , 'type' => 'salary'), '*');
        foreach($roi_users as $key => $user){
            $this_month_roi = $this->Main_model->get_single_record_desc('tbl_income_wallet', array('type' => 'salary_income' , 'user_id' => $user['user_id'],'month(created_at)' => date('m')), '*');
            if(empty($this_month_roi)){

                $new_day = $user['days'] - 1;
                $incomeArr = array(
                    'user_id' => $user['user_id'],
                    'amount' => $user['roi_amount'],
                    'type' => 'salary_income',
                    'description' => 'salary Income at '.$new_day . ' Month',
                );
                pr($user);
                $this->Main_model->add('tbl_income_wallet', $incomeArr);
                $this->Main_model->update('tbl_roi', array('id' => $user['id']), array('days' => $new_day, 'amount' => ($user['amount'] - $user['roi_amount'])));
            }
        }
    }

   

    public function webhook_response(){
        header("Access-Control-Allow-Origin: *");
        $_POST = json_decode(file_get_contents('php://input'), true);
        pr($_POST['event']['type']);
       //		$data = $this->input->post();
       $this->Main_model->add('tbl_webhook', ['data' => json_encode($_POST),'checkout' => $_POST['event']['data']['checkout']['id']]);
       $this->Main_model->update('tbl_coinbase_transactions', ['checkout' => $_POST['event']['data']['checkout']['id']],['status' => $_POST['event']['type'] , 'response' => json_encode($_POST)]);
    }

    public function checkCoinBaseUsers(){
        $users = $this->Main_model->get_records('tbl_users',['paid_status' => 0],'user_id,sponser_id');
        foreach($users as $key => $u){
            $coinPayment = $this->Main_model->get_single_record('tbl_coinbase_transactions',['user_id' => $u['user_id'],'status' => 'charge:confirmed'],'*');
            if(!empty($coinPayment['user_id'])){
                $package = $this->Main_model->get_single_record('tbl_package',['price' => $coinPayment['data']],'*');
                $topupData = array(
                    'paid_status' => 1,
                    'package_id' => $package['id'],
                    'package_amount' => $package['price'],
                    'topup_date' => date('Y-m-d H:i:s'),
                    'capping' => $package['capping']
                );
                $this->Main_model->update('tbl_users', array('user_id' => $u['user_id']), $topupData);
                $roiData = [
                    'user_id' => $u['user_id'],
                    'amount' => $package['commision'] * $package['days'],
                    'days' => $package['days'],
                    'roi_amount' => $package['commision'],
                ];
                $this->Main_model->add('tbl_roi', $roiData);
                $this->Main_model->update_directs($u['sponser_id']);
                $checkSponser = $this->Main_model->get_single_record('tbl_users',['user_id' => $u['sponser_id']],'paid_status');
                if($checkSponser['paid_status'] == 1){
                    $DirectIncome = array(
                        'user_id' => $u['sponser_id'],
                        'amount' => $package['direct_income'],
                        'type' => 'direct_income',
                        'description' => 'Refferal Points from Activation of Member '.$u['user_id'],
                    );
                    $this->Main_model->add('tbl_income_wallet', $DirectIncome);
                }
                $this->update_business($u['user_id'], $u['user_id'], $level = 1, $package['bv'], $type = 'topup');
                $this->update_units($u['user_id'] , $u['sponser_id'], $package['commision']);
            }
        }
    }

    private function update_business($user_name, $downline_id, $level = 1, $business, $type = 'topup') {
        $user = $this->Main_model->get_single_record('tbl_users', array('user_id' => $user_name), $select = 'upline_id , position,user_id');
        if (!empty($user)) {
            if ($user['position'] == 'L') {
                $c = 'leftPower';
            } else if ($user['position'] == 'R') {
                $c = 'rightPower';
            } else {
                return;
            }
            $this->Main_model->update_business($c, $user['upline_id'], $business);
            $downlineArray = array(
                'user_id' => $user['upline_id'],
                'downline_id' => $downline_id,
                'position' => $user['position'],
                'business' => $business,
                'type' => $type,
                'created_at' => date('Y-m-d h:i:s'),
                'level' => $level,
            );
            $this->Main_model->add('tbl_downline_business', $downlineArray);
            $user_name = $user['upline_id'];

            if ($user['upline_id'] != '') {
                $this->update_business($user_name, $downline_id, $level + 1, $business, $type);
            }
        }
    }

    private function update_units($user_id , $sponser_id , $units){
        $sponser = $this->Main_model->get_single_record('tbl_users',['user_id' => $sponser_id],'user_id, units');
        if(!empty($sponser)){
            $unitArr=[
                'user_id' => $sponser_id,
                'down_id' => $user_id,
                'units' => $units,
            ];
            $this->Main_model->add('tbl_user_units', $unitArr);
            $this->Main_model->update('tbl_users', array('user_id' => $sponser_id), ['units' => $sponser['units'] + $units]);
        }
    }

    public function coinPaymentCheck(){
        $cmd = 'get_tx_ids';
        $public_key = $this->public_key;
        $private_key = $this->private_key;
        $req['version'] = 1;
        $req['cmd'] = $cmd;
        $req['key'] = $public_key;
        $req['format'] = 'json';
        $post_data = http_build_query($req, '', '&');
        $hmac = hash_hmac('sha512', $post_data, $private_key);
        static $ch = NULL;
        if ($ch === NULL) {
            $ch = curl_init('https://www.coinpayments.net/api.php');
            curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: ' . $hmac));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $data = curl_exec($ch);
        pr($data);
        $data = json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING);

        foreach($data['result'] as $d){
            $b_transaction = $this->Main_model->get_single_record_desc('BTC_TRANSACTION', array('transaction_id' => $d), '*');
            if(empty($b_transaction)){
                $this->getinfo2('get_tx_info', $d);
            }else{
                $this->getinfo3('get_tx_info', $d);
            }
            pr($d);
            // $sql = "SELECT transaction_id from BTC_TRANSACTION where transaction_id = '".$d."'";
            // $result = $conn->query($sql);
            // $i = 1;
            // if ($result->num_rows == 0) {
            //     getinfo2($conn,'get_tx_info', $d);
            // }else{
            //     echo $d.' this id already registered <br>';
            // }
        }
    }
    function getinfo2($cmd = 'get_tx_info', $tax_id ='CPDI1TBAPSGQYM0DBRRDHSMTA0') {
        $public_key = $this->public_key;
        $private_key = $this->private_key;
        $req['version'] = 1;
        $req['cmd'] = $cmd;
        $req['txid'] = $tax_id;
        $req['full'] = TRUE;
        $req['key'] = $public_key;
        $req['format'] = 'json'; //supported values are json and xml
        $post_data = http_build_query($req, '', '&');
        $hmac = hash_hmac('sha512', $post_data, $private_key);
        static $ch = NULL;
        if ($ch === NULL) {
            $ch = curl_init('https://www.coinpayments.net/api.php');
            curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: ' . $hmac));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $data = curl_exec($ch);
        $data2 = json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING);
        echo'<pre>';
        print_r($data2);
        echo'</pre>';
        $send['transaction_id'] = $tax_id;
        $send['created_time'] = $data2['result']['time_created'];
        $send['time_expires'] = $data2['result']['time_expires'];
        $send['status'] = $data2['result']['status'];
        $send['status_text'] = $data2['result']['status_text'];
        $send['type'] = $data2['result']['type'];
        $send['coin'] = $data2['result']['coin'];
        $send['amount'] = $data2['result']['amount'];
        $send['amountf'] = $data2['result']['checkout']['amountf'];
        $send['received'] = $data2['result']['received'];
        $send['receivedf'] = $data2['result']['receivedf'];
        $send['recv_confirms'] = $data2['result']['recv_confirms'];
        $send['payment_address'] = $data2['result']['payment_address'];
        $send['invoice'] = $data2['result']['checkout']['invoice'];
        $send['user_id'] = $data2['result']['checkout']['custom'];
        $send['first_name'] = $data2['result']['checkout']['first_name'];
        $send['last_name'] = $data2['result']['checkout']['last_name'];
        $send['package'] = $data2['result']['checkout']['item_name'];
        // $columns = implode(", ",array_keys($send));
        // // $escaped_values = array_map(array_values($send));
        // $values  = '"'.implode('","', array_values($send)).'"';
        // print_r(array_values($send));
        $this->Main_model->add('BTC_TRANSACTION', $send);
        // echo $sql = "INSERT INTO `BTC_TRANSACTION`($columns) VALUES ($values)";
        // $conn->query($sql);
        if($send['status'] == 100){
            $amountArr = array('user_id' => $send['first_name'] ,'amount' => $send['amountf'],'transaction_id' => $send['transaction_id']);
            $this->Main_model->add('tbl_payment_request', $amountArr);
        //    echo $sql2 = "insert into tbl_payment_request (user_id ,amount,transaction_id ) values('".$send['first_name']."' ,'".$send['amountf']."','".$send['transaction_id']."')";
        //     $conn->query($sql2);
        }
    }

    function getinfo3($cmd = 'get_tx_info', $tax_id ='CPDI1TBAPSGQYM0DBRRDHSMTA0') {
        $public_key = $this->public_key;
        $private_key = $this->private_key;
        $req['version'] = 1;
        $req['cmd'] = $cmd;
        $req['txid'] = $tax_id;
        $req['full'] = TRUE;
        $req['key'] = $public_key;
        $req['format'] = 'json'; //supported values are json and xml
        $post_data = http_build_query($req, '', '&');
        $hmac = hash_hmac('sha512', $post_data, $private_key);
        static $ch = NULL;
        if ($ch === NULL) {
            $ch = curl_init('https://www.coinpayments.net/api.php');
            curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: ' . $hmac));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $data = curl_exec($ch);
        $data2 = json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING);
        echo'<pre>';
        print_r($data2);
        echo'</pre>';
        //$send['transaction_id'] = $tax_id;
        $send['created_time'] = $data2['result']['time_created'];
        $send['time_expires'] = $data2['result']['time_expires'];
        $send['status'] = $data2['result']['status'];
        $send['status_text'] = $data2['result']['status_text'];
        $send['type'] = $data2['result']['type'];
        $send['coin'] = $data2['result']['coin'];
        $send['amount'] = $data2['result']['amount'];
        $send['amountf'] = $data2['result']['checkout']['amountf'];
        $send['received'] = $data2['result']['received'];
        $send['receivedf'] = $data2['result']['receivedf'];
        $send['recv_confirms'] = $data2['result']['recv_confirms'];
        $send['payment_address'] = $data2['result']['payment_address'];
        $send['invoice'] = $data2['result']['checkout']['invoice'];
        $send['user_id'] = $data2['result']['checkout']['custom'];
        $send['first_name'] = $data2['result']['checkout']['first_name'];
        $send['last_name'] = $data2['result']['checkout']['last_name'];
        $send['package'] = $data2['result']['checkout']['item_name'];
        // $columns = implode(", ",array_keys($send));
        // // $escaped_values = array_map(array_values($send));
        // $values  = '"'.implode('","', array_values($send)).'"';
        // print_r(array_values($send));
        $check = $this->Main_model->get_single_record('BTC_TRANSACTION',['transaction_id' => $tax_id],'*');
        if($check['status'] != 100){
            $this->Main_model->update('BTC_TRANSACTION',['transaction_id' => $tax_id],$send);
        }
    }

    public function checkCoinPaymentUsers(){
        $users = $this->Main_model->get_records('tbl_users',['paid_status' => 0],'user_id,sponser_id');
        foreach($users as $key => $u){
            $coinPayment = $this->Main_model->get_single_record('BTC_TRANSACTION',['first_name' => $u['user_id'],'status' => '100','status_text' => 'Complete'],'first_name as user_id,package');
            if(!empty($coinPayment['user_id'])){
                //pr($coinPayment);
                $package = $this->Main_model->get_single_record('tbl_package',['title' => $coinPayment['package']],'*');
                pr($package);
                $topupData = array(
                    'paid_status' => 1,
                    'package_id' => $package['id'],
                    'package_amount' => $package['price'],
                    'topup_date' => date('Y-m-d H:i:s'),
                    'capping' => $package['capping']
                );
                $this->Main_model->update('tbl_users', array('user_id' => $u['user_id']), $topupData);
                $roiData = [
                    'user_id' => $u['user_id'],
                    'amount' => $package['commision'] * $package['days'],
                    'days' => $package['days'],
                    'roi_amount' => $package['commision'],
                ];
                $this->Main_model->add('tbl_roi', $roiData);
                $this->Main_model->update_directs($u['sponser_id']);
                $checkSponser = $this->Main_model->get_single_record('tbl_users',['user_id' => $u['sponser_id']],'paid_status');
                if($checkSponser['paid_status'] == 1){
                    $DirectIncome = array(
                        'user_id' => $u['sponser_id'],
                        'amount' => $package['direct_income'],
                        'type' => 'direct_income',
                        'description' => 'Refferal Points from Activation of Member '.$u['user_id'],
                    );
                    $this->Main_model->add('tbl_income_wallet', $DirectIncome);
                }
                $this->update_business($u['user_id'], $u['user_id'], $level = 1, $package['bv'], $type = 'topup');
                $this->update_units($u['user_id'] , $u['sponser_id'], $package['commision']);
            }
        }
    }

}
