<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
        $this->load->model(array('User_model'));
        $this->load->helper(array('user', 'birthdate', 'security', 'email'));
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index() {
        if (is_logged_in()) {
            redirect('Dashboard/User/');
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function coupans() {
        if (is_logged_in()) {
            $response = array();
            $this->load->view('coupons-amazing', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function fix_deposit() {
        if (is_logged_in()) {
            $response = array();
            $response['deposits'] = $this->User_model->get_records('tbl_fix_deposit', array('user_id' => $this->session->userdata['user_id']), '*');
            $this->load->view('fix_deposit_list', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    /*     * Token Wallet Activation */

    // public function ActivateAccount() {
    //     if (is_logged_in()) {
    //         $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
    //         if ($this->input->server('REQUEST_METHOD') == 'POST') {
    //             $data = $this->security->xss_clean($this->input->post());
    //             $this->form_validation->set_rules('user_id', 'User ID', 'trim|required|xss_clean');
    //             if ($this->form_validation->run() != FALSE) {
    //                 $user_id = $data['user_id'];
    //                 $topup_amount = $data['amount'];
    //                 $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
    //                 $wallet = $this->User_model->get_single_record('tbl_wallet', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as wallet_balance');
    //                 $fund_available_status = 0;
    //                 if(!empty($data['token_wallet'])){
    //                     $token_wallet = $this->User_model->get_single_record('tbl_token_wallet', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as token_balance');
    //                     if($wallet['wallet_balance'] >= ($data['amount']*75/100)){
    //                         if( $token_wallet['token_balance'] >= ($data['amount']*25/100)){
    //                             $fund_available_status = 1;
    //                             $fund_deduction = $data['amount']*75/100;
    //                             $this->session->set_flashdata('message', 'Activate with 75%25% fund');
    //                         }else{
    //                             $this->session->set_flashdata('message', 'Insufficient Balance in Token Wallet');
    //                         }
    //                     }else{
    //                         $this->session->set_flashdata('message', 'Insufficient Balance in Wallet');
    //                     }
    //                 }else{
    //                     if($wallet['wallet_balance'] >= $data['amount']){
    //                         $fund_available_status = 1;
    //                         $fund_deduction = $data['amount'];
    //                         $this->session->set_flashdata('message', 'Activate with 100% fund');
    //                     }else{
    //                         $this->session->set_flashdata('message', 'Insufficient Balance in Wallet');
    //                     }
    //                 }
    //                 if (!empty($user)) {
    //                     if ($fund_available_status == 1) {
    //                         if ($user['paid_status'] == 0) {
    //                             $sendWallet = array(
    //                                 'user_id' => $this->session->userdata['user_id'],
    //                                 'amount' => - $fund_deduction,
    //                                 'type' => 'account_activation',
    //                                 'remark' => 'Account Activation Deduction for ' . $user_id,
    //                             );
    //                             $this->User_model->add('tbl_wallet', $sendWallet);
    //                             $topupData = array(
    //                                 'paid_status' => 1,
    //                                 'package_amount' => $data['amount'],
    //                                 'topup_date' => date('Y-m-d h:i:s'),
    //                                 // 'package_id' => $data['package_id'],
    //                                 // 'capping' => $package['capping'],
    //                             );
    //                             if(!empty($data['token_wallet'])){
    //                                 $sendWallet = array(
    //                                     'user_id' => $this->session->userdata['user_id'],
    //                                     'amount' => - $data['amount'] * 25 /100,
    //                                     'type' => 'account_activation',
    //                                     'remark' => 'Account Activation Deduction for ' . $user_id,
    //                                 );
    //                                 $this->User_model->add('tbl_token_wallet', $sendWallet);
    //                             }
    //                             $this->User_model->update('tbl_users', array('user_id' => $user_id), $topupData);
    //                             $this->User_model->update_directs($user['sponser_id']);
    //                             $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $user['sponser_id']), 'sponser_id,directs');
    //                             $DirectIncome = array(
    //                                 'user_id' => $user['sponser_id'],
    //                                 'amount' => $data['amount'] * 5 / 100,
    //                                 'type' => 'direct_income',
    //                                 'description' => 'Direct Income from Activation of Member ' . $user_id,
    //                             );
    //                             $this->User_model->add('tbl_income_wallet', $DirectIncome);
    //                             $this->update_business($user['user_id'], $user['user_id'], $level = 1, $data['amount'], $type = 'topup');
    //                             // $roiArr = array(
    //                             //     'user_id' => $user['user_id'],
    //                             //     'amount' => ($package['price'] * 2),
    //                             //     'roi_amount' => $package['commision'],
    //                             // );
    //                             // $this->User_model->add('tbl_roi', $roiArr);
    //                             $this->session->set_flashdata('message', 'Account Activated Successfully');
    //                         } else {
    //                             $this->session->set_flashdata('message', 'This Account Already Acitvated');
    //                         }
    //                     } else {
    //                         // $this->session->set_flashdata('message', 'Insuffcient Balance');
    //                     }
    //                 } else {
    //                     $this->session->set_flashdata('message', 'Invalid User ID');
    //                 }
    //             }
    //         }
    //         $response['wallet'] = $this->User_model->get_single_record('tbl_wallet', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as wallet_balance');
    //         $response['token_wallet'] = $this->User_model->get_single_record('tbl_token_wallet', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as wallet_balance');
    //         $response['packages'] = $this->User_model->get_records('tbl_package', array(), '*');
    //         $this->load->view('activate_account', $response);
    //     } else {
    //         redirect('Dashboard/User/login');
    //     }
    // }
    public function bank_transfer_summary() {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = 'Bank Transfer Summary';
            $response['transactions'] = $this->User_model->get_records('tbl_money_transfer', array('user_id' => $this->session->userdata['user_id']), '*');
            $this->load->view('bank_transfer_summary', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    private function unl($id){
        $user_id = $this->session->tempdata('activationID');
        $package = $this->User_model->get_single_record('tbl_package', array('id' => $id), '*');
        $topupData = array(
            'user_id' => $user_id,
            'package_id' => $package['id'],
            'package_amount' => $package['price'],
            'topup_date' => date('Y-m-d H:i:s'),
            'capping' => $package['capping'],
            'account_type' =>  $this->session->tempdata('account_type'),
        );
        $this->User_model->add('tbl_topup_request',$topupData);
    }

    public function coinbaseGateway($id){
        if(!empty($this->session->tempdata('activationID'))){
            $user_id = $this->session->tempdata('activationID');
            $package = $this->User_model->get_single_record('tbl_package', array('id' => $id), '*');  
            $amount = $package['price'];
            $email = $this->session->tempdata('email');
            $curl = curl_init();
            $params = new stdClass();
            $params->name = $user_id;
            $params->description = $package['title'];

            $local_price = new stdClass();
            $local_price->amount = $amount;

            $local_price->currency = 'USD';
            $params->local_price = $local_price;
            $params->pricing_type = 'fixed_price';
            $params->requested_info = ['email'];
            // echo json_encode($params);


            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.commerce.coinbase.com/checkouts",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($params),
                CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "X-CC-Api-Key: 45ac6b2e-529d-4d7f-b761-19d1384369d2",
                "X-CC-Version: 2018-03-22",
                "Cookie: __cfduid=da062b513a9ad4c1d0c77a2a7d01979841606206538"
                ),
            ));

            $response = json_decode(curl_exec($curl),true);
            $response['package'] = $amount;
            $this->User_model->add('tbl_coinbase_transactions', ['user_id' => $user_id , 'checkout' => $response['data']['id'],'data' => $amount,'trans_type' => '1','account_type' => $this->session->tempdata('account_type')]);
            curl_close($curl);
            $response['amount'] = $amount;
            $this->session->unset_tempdata('activationID');
            $this->load->view('addBalanceCoinBase',$response);
        }else{
            redirect('Dashboard/ActivateAccount');
        }
    }

    public function ActivateAccount() {
        if (is_logged_in()) {
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('user_id', 'User ID', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $user_id = $data['user_id'];
                    $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
                    $package = $this->User_model->get_single_record('tbl_package', array('id' => $data['package_id']), '*');
                    $wallet = $this->User_model->get_single_record('tbl_wallet', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as wallet_balance');
                    if (!empty($user)) {
                        if ($wallet['wallet_balance'] >= $package['price']) {
                            if ($user['paid_status'] == 0) {
                                $sendWallet = array(
                                    'user_id' => $this->session->userdata['user_id'],
                                    'amount' => -$package['price'],
                                    'type' => 'account_activation',
                                    'remark' => 'Account Activation Deduction for ' . $user_id,
                                );
                                $this->User_model->add('tbl_wallet', $sendWallet);
                                $topupData = array(
                                    'paid_status' => 1,
                                    'package_id' => $data['package_id'],
                                    'package_amount' => $package['price'],
                                    'topup_date' => date('Y-m-d H:i:s'),
                                    'capping' => $package['capping']
                                );
                                $this->User_model->update('tbl_users', array('user_id' => $user_id), $topupData);

                                // $roiData = [
                                //     'user_id' => $user['user_id'],
                                //     'amount' => $package['commision'] * $package['days'],
                                //     'days' => $package['days'],
                                //     'roi_amount' => $package['commision'],
                                // ];
                                // $this->User_model->add('tbl_roi', $roiData);
                                $this->User_model->update_directs($user['sponser_id']);
                                $this->pool_entry($user_id,'tbl_pool');
                                $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $user['sponser_id']), 'sponser_id,paid_status,package_amount,package_id,directs');
                                if ($sponser['paid_status'] == 1) {
                                    $DirectIncome = array(
                                        'user_id' => $user['sponser_id'],
                                        'amount' => $package['direct_income'],
                                        'type' => 'direct_income',
                                        'description' => 'Refferal Points from Activation of Member ' . $user_id,
                                    );
                                    $this->User_model->add('tbl_income_wallet', $DirectIncome);
                                }
                                //$this->level_income($sponser['sponser_id'], $user['user_id'], $package['level_income']);
                                $this->royaltyAchiever($user['sponser_id']);
                                $this->update_business($user['user_id'], $user['user_id'], $level = 1, $package['bv'], $type = 'topup');
                                //$this->update_units($user['user_id'] , $user['sponser_id'], $package['commision']);
                                $sms_text = 'Dear ' .$user_id. ', Your Account Successfully Activated By User ID ' . $this->session->userdata['user_id']. '.' . base_url();
                                //notify_user($user_id , $sms_text);
                                $this->session->set_flashdata('message', 'Account Activated Successfully');
                            } else {
                                $this->session->set_flashdata('message', 'This Account Already Acitvated');
                            }
                        } else {
                            $this->session->set_flashdata('message', 'Insuffcient Balance');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Invalid User ID');
                    }
                }
            }
            $response['wallet'] = $this->User_model->get_single_record('tbl_wallet', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as wallet_balance');
            $response['packages'] = $this->User_model->get_records('tbl_package', array(), '*');
            $this->load->view('activate_account', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function activateUser(){
        die;
        $users = $this->User_model->get_records('tbl_users',"paid_status = '0' order by id ASC LIMIT 10",'user_id');
        foreach($users as $key => $u){
           // echo $key.''.$u['user_id'].'<br>';
          // $this->testActivate($u['user_id']);
        }
    }

    private function testActivate($user_id){
        die;
        $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
        $package = $this->User_model->get_single_record('tbl_package', array('id' => 1), '*');
        if (!empty($user)) {
            if ($user['paid_status'] == 0) {
                $topupData = array(
                    'paid_status' => 1,
                    'package_id' => $package['id'],
                    'package_amount' => $package['price'],
                    'topup_date' => date('Y-m-d H:i:s'),
                    'capping' => $package['capping']
                );
                $this->User_model->update('tbl_users', array('user_id' => $user_id), $topupData);
                $this->User_model->update_directs($user['sponser_id']);
                $this->pool_entry($user_id,'tbl_pool');
                $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $user['sponser_id']), 'sponser_id,paid_status,package_amount,package_id,directs');
                if ($sponser['paid_status'] == 1) {
                    $DirectIncome = array(
                        'user_id' => $user['sponser_id'],
                        'amount' => $package['direct_income'],
                        'type' => 'direct_income',
                        'description' => 'Refferal Points from Activation of Member ' . $user_id,
                    );
                    $this->User_model->add('tbl_income_wallet', $DirectIncome);
                }
                $this->royaltyAchiever($user['sponser_id']);
                $this->update_business($user['user_id'], $user['user_id'], $level = 1, $package['bv'], $type = 'topup');
                echo 'Account Activated Successfully';
            } else {
                echo 'This Account Already Acitvated';
            }
        } else {
            echo 'Invalid User ID';
        }
    }

    private function royaltyAchiever($user_id){
        $user = $this->User_model->get_single_record('tbl_users',['user_id' => $user_id],'directs,topup_date');
        $date1 = date('Y-m-d H:i:s');
        $date2 = date('Y-m-d H:i:s',strtotime($user['topup_date'].'+ 7 days'));
        $date3 = date('Y-m-d H:i:s',strtotime($user['topup_date'].'+ 15 days'));
        $date4 = date('Y-m-d H:i:s',strtotime($user['topup_date'].'+ 21 days'));
        $date5 = date('Y-m-d H:i:s',strtotime($user['topup_date'].'+ 30 days'));
        $diff2 = strtotime($date2) - strtotime($date1);
        if($diff2 > 0){
            if($user['directs'] >= 25){
                $this->User_model->update('tbl_users',['user_id' => $user_id],['royalty1' => 1]);
            }
        }
        $diff3 = strtotime($date3) - strtotime($date1);
        if($diff3 > 0){
            if($user['directs'] >= 70){
                $this->User_model->update('tbl_users',['user_id' => $user_id],['royalty2' => 1]);
            }
        }
        $diff4 = strtotime($date4) - strtotime($date1);
        if($diff4 > 0){
            if($user['directs'] >= 150){
                $this->User_model->update('tbl_users',['user_id' => $user_id],['royalty3' => 1]);
            }
        }
        $diff5 = strtotime($date5) - strtotime($date1);
        if($diff5 > 0){
            if($user['directs'] >= 200){
                $this->User_model->update('tbl_users',['user_id' => $user_id],['royalty4' => 1]);
            }
        }
    }
    
    protected function pool_entry($user_id,$table){
        $pool_upline = $this->User_model->get_single_record($table, array('down_count <' => 2), 'id,user_id,down_count');
        if(!empty($pool_upline)){
            $poolArr =  array(
                'user_id' => $user_id,
                'upline_id' => $pool_upline['user_id'],
            );
            $this->User_model->add($table, $poolArr);
            $this->User_model->update($table, array('id' => $pool_upline['id']),array('down_count' => $pool_upline['down_count'] + 1));
            $this->updateTeam($user_id,$table);
            $this->poolIncome($table);
        }else{
            $poolArr =  array(
                'user_id' => $user_id,
                'upline_id' => '',
            );
            $this->User_model->add($table, $poolArr);
            $this->updateTeam($user_id,$table);
            $this->poolIncome($table);
        }
    }

    protected function updateTeam($user_id,$table){
        $uplineID = $this->User_model->get_single_record($table,array('user_id' => $user_id),'upline_id');
        if(!empty($uplineID['upline_id'])){
            $team = $this->User_model->get_single_record($table,array('user_id' => $uplineID['upline_id']),'team');
            $newTeam = $team['team'] + 1;
            $this->User_model->update($table, array('user_id' => $uplineID['upline_id']),array('team' => $newTeam));
            $this->updateTeam($uplineID['upline_id'],$table);
        }
    }

    private function poolIncome($table){
        $users = $this->User_model->get_records($table,[],'*');
        foreach($users as $key => $u):
            $poolArr = [
                '2' => ['income' => '40', 'days' => '4','direct' => '0'],
                '6' => ['income' => '50', 'days' => '6','direct' => '0'],
                '14' => ['income' => '80', 'days' => '7','direct' => '0'],
                '30' => ['income' => '130', 'days' => '8','direct' => '1'],
                '62' => ['income' => '160', 'days' => '12','direct' => '1'],
                '126' => ['income' => '220', 'days' => '16','direct' => '2'],
                '254' => ['income' => '320', 'days' => '20','direct' => '2'],
                '510' => ['income' => '380', 'days' => '30','direct' => '4'],
                '1022' => ['income' => '500', 'days' => '40','direct' => '4'],
                '2046' => ['income' => '715', 'days' => '50','direct' => '6'],
                '4094' => ['income' => '1020', 'days' => '60','direct' => '8'],
                '8190' => ['income' => '1280', 'days' => '80','direct' => '10'],
                '16382' => ['income' => '1360', 'days' => '120','direct' => '12'],
                '32766' => ['income' => '1620', 'days' => '150','direct' => '14'],
                '65534' => ['income' => '1820', 'days' => '170','direct' => '16'],
                '131070' => ['income' => '1850', 'days' => '180','direct' => '18'],
                '262142' => ['income' => '2000', 'days' => '200','direct' => '20'],
                '524286' => ['income' => '2500', 'days' => '250','direct' => '22'],
                '1048574' => ['income' => '2800', 'days' => '300','direct' => '24'],
                '1097150' => ['income' => '3000', 'days' => '365','direct' => '30'],
            ];
            foreach($poolArr as $pk => $p):
                if($u['team'] == $pk):
                    $checkDirect = $this->User_model->get_single_record('tbl_users',['user_id' => $u['user_id']],'directs');
                    if($checkDirect['directs'] >= $p['direct']):
                        $checkEntry = $this->User_model->get_single_record('tbl_roi',['user_id' => $u['user_id'],'roi_amount' => $p['income'],'days' => $p['days']],'*');
                        if(empty($checkEntry)):
                            $roiData = [
                                'user_id' => $u['user_id'],
                                'amount' => $p['income']*$p['days'],
                                'roi_amount' => $p['income'],
                                'days' => $p['days'],
                                'type' => 'pool_income',
                            ];
                            $this->User_model->add('tbl_roi',$roiData);
                        endif;
                    endif;
                endif;
            endforeach;
        endforeach;
    }

    private function update_units($user_id , $sponser_id , $units){
        $sponser = $this->User_model->get_single_record('tbl_users',['user_id' => $sponser_id],'user_id, units');
        if(!empty($sponser)){
            $unitArr=[
                'user_id' => $sponser_id,
                'down_id' => $user_id,
                'units' => $units,
            ];
            $this->User_model->add('tbl_user_units', $unitArr);
            $this->User_model->update('tbl_users', array('user_id' => $sponser_id), ['units' => $sponser['units'] + $units]);
        }
    }
    public function FixDeposit() {
        if (is_logged_in()) {
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                // pr($data);
                $this->form_validation->set_rules('user_id', 'User ID', 'trim|required|xss_clean');
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required|xss_clean');
                $this->form_validation->set_rules('duration', 'Duration', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $user_id = $data['user_id'];
                    $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
                    $wallet = $this->User_model->get_single_record('tbl_token_wallet', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as wallet_balance');
                    if (!empty($user)) {
                        if ($wallet['wallet_balance'] >= $data['amount']) {
                            // if ($user['paid_status'] == 0) {
                            $sendWallet = array(
                                'user_id' => $this->session->userdata['user_id'],
                                'amount' => - $data['amount'],
                                'type' => 'fix_deposit',
                                'remark' => 'Fix Deposit Deduction for ' . $user_id,
                            );
                            $this->User_model->add('tbl_token_wallet', $sendWallet);

                            $depositArr = array(
                                'user_id' => $this->session->userdata['user_id'],
                                'amount' => $data['amount'],
                                'duration' => $data['duration'],
                            );
                            $this->User_model->add('tbl_fix_deposit', $depositArr);

                            $this->session->set_flashdata('message', 'Account Activated Successfully');
                            // } else {
                            //     $this->session->set_flashdata('message', 'This Account Already Acitvated');
                            // }
                        } else {
                            $this->session->set_flashdata('message', 'Insuffcient Balance');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Invalid User ID');
                    }
                } else {
                    $this->session->set_flashdata('message', validation_errors());
                }
            }
            $response['token_wallet'] = $this->User_model->get_single_record('tbl_token_wallet', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as wallet_balance');
            $response['packages'] = $this->User_model->get_records('tbl_package', array(), '*');
            $this->load->view('fix_deposit', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    function level_income($sponser_id, $activated_id, $package_income) {
        $incomes = explode(',', $package_income);
        // $incomes = array(70,35,30,25,20,15,10,5,5);
        foreach ($incomes as $key => $income) {
            $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $sponser_id), 'id,user_id,sponser_id,paid_status');
            if (!empty($sponser)) {
                if ($sponser['paid_status'] == 1) {
                    $LevelIncome = array(
                        'user_id' => $sponser['user_id'],
                        'amount' => $income,
                        'type' => 'direct_level_income',
                        'description' => 'Level Income from Activation of Member ' . $activated_id . ' At level ' . ($key + 1),
                    );
                  //  $this->User_model->add('tbl_income_wallet', $LevelIncome);
                }
                $sponser_id = $sponser['sponser_id'];
            }
        }
    }

    public function check_pool_stats() {
        $achievers = $this->User_model->get_records('tbl_pool', array('next_level' => 0, 'level1' => 5), '*');
        foreach ($achievers as $key => $achiever) {
            $RankIncome = array(
                'user_id' => $achiever['user_id'],
                'amount' => $achiever['pool_amount'] * 80 / 100,
                'type' => 'pool_income',
                'description' => 'Pool Bonus From level ' . $achiever['pool_level'],
            );
            $this->User_model->add('tbl_income_wallet', $RankIncome);
            $this->repurchase_income($achiever['user_id'], ($achiever['pool_amount'] * 20 / 100), 'pool_income', 'Pool Bonus From level ' . $achiever['pool_level']);
            $this->User_model->update('tbl_pool', array('id' => $achiever['id']), array('next_level' => 1));
            $this->pool_entry($achiever['user_id'], ($achiever['pool_level'] + 1), ($achiever['pool_amount'] * 2));
            $company_ids = $achiever['pool_amount'] / 500;
            for ($i = 1; $i <= $company_ids; $i++) {
                $this->pool_entry('admin', 1, 500);
            }
        }
    }

    public function UpgradeAccount() {
        if (is_logged_in()) {
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                // $this->form_validation->set_rules('user_id', 'User ID', 'trim|required|xss_clean');
                // if ($this->form_validation->run() != FALSE) {
                $user_id = $this->session->userdata['user_id'];
                $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
                $wallet = $this->User_model->get_single_record('tbl_wallet', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as wallet_balance');
                $package = $this->User_model->get_single_record('tbl_package', array('id' => $data['package_id']), '*');
                if (!empty($user)) {
                    // pr($user,true);
                    if ($wallet['wallet_balance'] >= $package['price']) {
                        if ($user['package_amount'] < $package['price']) {
                            $sendWallet = array(
                                'user_id' => $this->session->userdata['user_id'],
                                'amount' => -$package['price'],
                                'type' => 'account_activation',
                                'remark' => 'Account Activation Deduction for ' . $user_id,
                            );
                            $this->User_model->add('tbl_wallet', $sendWallet);
                            $topupData = array(
                                'paid_status' => 1,
                                'package_id' => $data['package_id'],
                                'package_amount' => $package['price'],
                                'topup_date' => date('Y-m-d H:i:s'),
                                'capping' => $package['capping'],
                            );
                            $this->User_model->update('tbl_users', array('user_id' => $user_id), $topupData);
                            // $this->User_model->update_directs($user['sponser_id']);
                            $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $user['sponser_id']), 'sponser_id,directs');
                            // $DirectIncome = array(
                            //     'user_id' => $user['sponser_id'],
                            //     'amount' => $package['direct_income'],
                            //     'type' => 'direct_income',
                            //     'description' => 'Direct Income from Retopup of Member ' . $user_id,
                            // );
                            // $this->User_model->add('tbl_income_wallet', $DirectIncome);
                            // $this->update_business($user['user_id'], $user['user_id'], $level = 1, $package['bv'], $type = 'topup');
                            $roiArr = array(
                                'user_id' => $user['user_id'],
                                'amount' => ($package['price'] * $package['days']),
                                'roi_amount' => $package['commision'],
                            );
                            $this->User_model->add('tbl_roi', $roiArr);
                            $this->session->set_flashdata('message', 'Account Retopup Successfully');
                        } else {
                            $this->session->set_flashdata('message', 'This Account Already Acitvated');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Insuffcient Balance');
                    }
                    // }else{
                    //     $this->session->set_flashdata('message', 'Invalid User ID');
                    // }
                }
            }
            $response['wallet'] = $this->User_model->get_single_record('tbl_wallet', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as wallet_balance');
            $response['packages'] = $this->User_model->get_records('tbl_package', array('price >= ' => $response['user']['package_amount']), '*');
            $this->load->view('upgrade_account', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function update_activate_users_business(){
        die;
        $users = $this->User_model->get_records('tbl_users',['paid_status' => 1],'user_id,package_id');
        foreach($users as $k => $user){
            $package =  $this->User_model->get_single_record('tbl_package', array('id' => $user['package_id']), '*');
            $this->update_business($user['user_id'], $user['user_id'], $level = 1, $package['bv'], $type = 'topup');
        }
    }
    
    function update_business($user_name = 'A915813', $downline_id = 'A915813', $level = 1, $business = '40', $type = 'topup') {
        $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_name), $select = 'upline_id , position,user_id');
        if (!empty($user)) {
            if ($user['position'] == 'L') {
                $c = 'leftPower';
            } else if ($user['position'] == 'R') {
                $c = 'rightPower';
            } else {
                return;
            }
            $this->User_model->update_business($c, $user['upline_id'], $business);
            $downlineArray = array(
                'user_id' => $user['upline_id'],
                'downline_id' => $downline_id,
                'position' => $user['position'],
                'business' => $business,
                'type' => $type,
                'created_at' => date('Y-m-d h:i:s'),
                'level' => $level,
            );
            $this->User_model->add('tbl_downline_business', $downlineArray);
            $user_name = $user['upline_id'];

            if ($user['upline_id'] != '') {
                $this->update_business($user_name, $downline_id, $level + 1, $business, $type);
            }
        }
    }

    public function getUserIdForRegister($country_code = '') {
        $sponser = $this->User_model->get_single_record('tbl_users', array(), 'ifnull(max(id_number),0) + 1 as next_id');
        if ($sponser['next_id'] == 1) {
            $user_id = '10001';
        } else {
            $user_id = $sponser['next_id'];
        }
        return $user_id;
    }

    public function generateUserId() {
        $user_id = rand(10000, 99999);
    }

//    public function magic_income_use() {
//        $magic_users = $this->User_model->magic_users();
//        pr($magic_users);
//        foreach ($magic_users as $user) {
//            $this->register_magic_user($user['user_id']);
//        }
//    }
//    public function register_magic_user($user_id) {
//        $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
//        $id_number = $this->getUserIdForRegister();
//        $userData['user_id'] = 'WIN' . $id_number;
//        $userData['id_number'] = $id_number;
//        $userData['sponser_id'] = $user['sponser_id'];
//        $userData['name'] = $user['name'];
//        $userData['phone'] = $user['phone'];
//        $userData['password'] = $user['password'];
//        $userData['user_type'] = 'magic';
//        $this->User_model->add('tbl_users', $userData);
//        $this->User_model->add('tbl_bank_details', array('user_id' => $userData['user_id']));
//        $this->repurchase_income($user_id, -3600, 'magic_user_registration', 'New Magic User Registered with ID ' . $userData['user_id']);
//        $this->topup_magic_user($userData['user_id']);
//    }
//
//    public function topup_magic_user($user_id) {
//        $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
//        $package = $this->User_model->get_single_record('tbl_package', array('id' => 1), '*');
//        $this->User_model->update('tbl_users', array('user_id' => $user_id), array('paid_status' => 1, 'package_id' => $package['id'], 'package_amount' => $package['price'], 'topup_date' => date('Y-m-d h:i:s')));
//        $this->User_model->update_directs($user['sponser_id']);
//        $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $user['sponser_id']), 'sponser_id,directs');
//        $DirectIncome = array(
//            'user_id' => $user['sponser_id'],
//            'amount' => $package['direct_income'] * 80 / 100,
//            'type' => 'direct_income',
//            'description' => 'Direct Income from Activation of Member ' . $user_id,
//        );
//        $this->User_model->add('tbl_income_wallet', $DirectIncome);
//        $this->repurchase_income($user['sponser_id'], ($package['direct_income'] * 20 / 100), 'direct_income', 'Direct Income from Activation of Member ' . $user_id);
//        $this->level_income($sponser['sponser_id'], $user['user_id'], $package['level_income']);
//        $this->pool_entry($user['user_id'], 1, 500);
//        if ($package['price'] == 3600)
//            $this->rank_bonus($user['user_id'], 200, $user['user_id'], 0, $package['price']);
//        else
//            $this->rank_bonus($user['user_id'], 105, $user['user_id'], 0, $package['price']);
//        //$this->rank_bonus($user['user_id'], 200,$user['user_id'],0 , $package['price']);
//    }
//    public function differance_income_distribution() {
//        $rank_incomes = array(
//            5 => 50,
//            10 => 75,
//            15 => 100,
//            20 => 125,
//            25 => 150,
//            50 => 175,
//            100 => 200,
//        );
//    }
//    public function rank_bonus($user_id = 'AMAZING6388', $amount = '200', $sender_id = 'AMAZING5177', $total_distribution = 0, $package_amount = 3600, $last_rank = 0) {
//        $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), 'user_id,sponser_id,paid_status,package_id,directs');
//        if ($amount > 0) {
//            if (!empty($sponser)) {
//                $sponser['last_distribution'] = $total_distribution;
//                if ($package_amount == 3600) {
//                    if ($sponser['directs'] >= 100) {
//                        $income = 200;
//                        $winner_rank = 7;
//                    } elseif ($sponser['directs'] >= 50) {
//                        $income = 175;
//                        $winner_rank = 6;
//                    } elseif ($sponser['directs'] >= 25) {
//                        $income = 150;
//                        $winner_rank = 5;
//                    } elseif ($sponser['directs'] >= 20) {
//                        $income = 125;
//                        $winner_rank = 4;
//                    } elseif ($sponser['directs'] >= 15) {
//                        $income = 100;
//                        $winner_rank = 3;
//                    } elseif ($sponser['directs'] >= 10) {
//                        $income = 75;
//                        $winner_rank = 2;
//                    } elseif ($sponser['directs'] >= 5) {
//                        $income = 50;
//                        $winner_rank = 1;
//                    } elseif ($sponser['directs'] >= 0) {
//                        $winner_rank = 0;
//                        $income = 0;
//                    }
//                } else {
//                    if ($sponser['directs'] >= 100) {
//                        $income = 105;
//                        $winner_rank = 7;
//                    } elseif ($sponser['directs'] >= 50) {
//                        $income = 90;
//                        $winner_rank = 6;
//                    } elseif ($sponser['directs'] >= 25) {
//                        $income = 75;
//                        $winner_rank = 5;
//                    } elseif ($sponser['directs'] >= 20) {
//                        $income = 60;
//                        $winner_rank = 4;
//                    } elseif ($sponser['directs'] >= 15) {
//                        $income = 45;
//                        $winner_rank = 3;
//                    } elseif ($sponser['directs'] >= 10) {
//                        $income = 30;
//                        $winner_rank = 2;
//                    } elseif ($sponser['directs'] >= 5) {
//                        $income = 15;
//                        $winner_rank = 1;
//                    } elseif ($sponser['directs'] >= 0) {
//                        $income = 0;
//                        $winner_rank = 0;
//                    }
//                }
//                $main_income = $income - $total_distribution;
//                $total_distribution = $total_distribution + $main_income;
//                if ($main_income > $amount) {
//                    $main_income = $amount;
//                }
//                $amount = $amount - $main_income;
//                $user_rank = calculate_rank($sponser['directs']);
//                $RankIncome = array(
//                    'user_id' => $sponser['user_id'],
//                    'amount' => $main_income * 80 / 100,
//                    'type' => 'rank_bonus',
//                    'description' => 'Rank Bonus From ' . $sender_id . ' At ' . $user_rank,
//                );
//                // $RankIncome['total_distribution'] = $total_distribution;
//                // $RankIncome['income'] = $main_income;
//                if ($main_income > 0) {
//                    if ($winner_rank > $last_rank) {
//                        $this->User_model->add('tbl_income_wallet', $RankIncome);
//                        $this->repurchase_income($sponser['user_id'], ($main_income * 20 / 100), 'rank_bonus', 'Rank Bonus From ' . $sender_id);
//                        $last_rank = $winner_rank;
//                    }
//                }
//
//                $this->rank_bonus($sponser['sponser_id'], $amount, $sender_id, $total_distribution, $package_amount, $last_rank);
//            }
//        }
//    }
    // public function rank_bonus($user_id = 'WIN10024', $amount ='200', $sender_id  = 'WIN10024', $last_distribution = 0){
    //     $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), 'user_id,sponser_id,paid_status,package_id,directs');
    //     if(!empty($sponser)){
    //         $sponser['rank'] = calculate_rank($sponser['directs']);
    //         $bonus_amount = calculate_rank_bonus($sponser['directs'],$sponser['package_id']);
    //         if($bonus_amount > 0){
    //             // $bonus_amount = $bonus_amount - $last_distribution;
    //             // if($amount > $bonus_amount)
    //             //     $income = $bonus_amount;
    //             // else
    //             //     $income = $amount;
    //                 $income = $bonus_amount;
    //             if($income > 0){
    //                 $RankIncome = array(
    //                     'user_id' => $sponser['user_id'],
    //                     'amount' => $income * 100 / 100 ,
    //                     'type' => 'rank_bonus',
    //                     'description' => 'Rank Bonus From '.$sender_id,
    //                 );
    //                 $sponser['income'] = $income;
    //                 $sponser['last_distribution'] = $last_distribution;
    //                 $sponser['status'] = '--------------------------';
    //                 // $this->User_model->add('tbl_income_wallet', $RankIncome);
    //                 $this->repurchase_income($sponser['user_id'],($income * 20 / 100),'rank_bonus' ,'Rank Bonus From '.$sender_id);
    //             }
    //             pr($sponser);
    //             $last_distribution =  $last_distribution - $income;
    //             if($amount > 0){
    //                 $this->rank_bonus($sponser['sponser_id'] , $amount , $sender_id , abs($last_distribution));
    //                 echo'case1';
    //             }
    //         }else{
    //             $this->rank_bonus($sponser['sponser_id'] , $amount , $sender_id, $last_distribution);
    //             echo'case2';
    //         }
    //     }
    // }

    public function payment_response($message) {
        if ($message == 'success') {
            $response['message'] = 'Payment Completed Succesfully';
        } else {
            $response['message'] = 'Error in Payment Process';
        }

        $this->load->view('payment_response', $response);
    }

    public function repurchase_income($user_id, $amount, $type, $description) {
        $RepurchaseIncome = array(
            'user_id' => $user_id,
            'amount' => $amount,
            'type' => $type,
            'description' => $description,
        );
        $this->User_model->add('tbl_repurchase_income', $RepurchaseIncome);
    }

    public function IncomeTransfer() {
        if (is_logged_in()) {
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('user_id', 'User ID', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
                    $kyc_status = $this->User_model->get_single_record('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), '*');
                    $withdraw_amount = $this->input->post('amount');
                    $user_id = $this->input->post('user_id');
                    $transfer_user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
                    $balance = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '"', 'ifnull(sum(amount),0) as balance');
                    if ($withdraw_amount >= 5) {
                        if ($balance['balance'] >= $withdraw_amount) {
                            // if($user['master_key'] == $master_key){
                            $DirectIncome = array(
                                'user_id' => $this->session->userdata['user_id'],
                                'amount' => - $withdraw_amount,
                                'type' => 'income_transfer',
                                'description' => 'Sent ' . $withdraw_amount . ' to ' . $user_id,
                            );
                            $this->User_model->add('tbl_income_wallet', $DirectIncome);
                            $DirectIncome = array(
                                'user_id' => $user_id,
                                'amount' => $withdraw_amount*95/100,
                                'type' => 'income_transfer',
                                'description' => 'Got ' . $withdraw_amount . ' from ' . $this->session->userdata['user_id'],
                            );
                            $this->User_model->add('tbl_income_wallet', $DirectIncome);

                            $this->session->set_flashdata('message', 'Income Transferred Successfully');
                            // }else{
                            //     $this->session->set_flashdata('message', 'Invalid Master Key');
                            // }
                        } else {
                            $this->session->set_flashdata('message', 'Insuffcient Balance');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Minimum Transfer Amount is $5');
                    }
                } else {
                    $this->session->set_flashdata('message', 'erorrrrr');
                }
            }
            $response['balance'] = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '"', 'ifnull(sum(amount),0) as balance');
            $this->load->view('income_transfer', $response);
        } else {

        }
    }

    public function eWalletTransfer() {
        if (is_logged_in()) {
            $response['mini_transfer'] = $this->User_model->get_single_record('tbl_site_settings','id = 1','*');
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('user_id', 'User ID', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
                    $kyc_status = $this->User_model->get_single_record('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), '*');
                    $withdraw_amount = $this->input->post('amount');
                    $user_id = $this->input->post('user_id');
                    $transfer_user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
                    $balance = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '"', 'ifnull(sum(amount),0) as balance');
                    if ($withdraw_amount >= $response['mini_transfer']['minimum_transfer']) {
                        if ($balance['balance'] >= $withdraw_amount) {
                            // if($user['master_key'] == $master_key){
                            $DirectIncome = array(
                                'user_id' => $this->session->userdata['user_id'],
                                'amount' => - $withdraw_amount,
                                'type' => 'income_transfer',
                                'description' => 'Sent ' . $withdraw_amount . ' to ' . $user_id,
                            );
                            $this->User_model->add('tbl_income_wallet', $DirectIncome);
                            $DirectIncome = array(
                                'user_id' => $user_id,
                                'amount' => $withdraw_amount*95/100,
                                'type' => 'income_transfer',
                                'remark' => 'Got ' . $withdraw_amount . ' from ' . $this->session->userdata['user_id'],
                            );
                            $this->User_model->add('tbl_wallet', $DirectIncome);

                            $this->session->set_flashdata('message', 'Income Transferred Successfully');
                            // }else{
                            //     $this->session->set_flashdata('message', 'Invalid Master Key');
                            // }
                        } else {
                            $this->session->set_flashdata('message', 'Insuffcient Balance');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Minimum Transfer Amount is Rs. 100');
                    }
                } else {
                    $this->session->set_flashdata('message', 'erorrrrr');
                }
            }
            $response['eWallet'] = 1;
            $response['balance'] = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '"', 'ifnull(sum(amount),0) as balance');
            $this->load->view('income_transfer', $response);
        } else {

        }
    }

    public function DirectIncomeWithdraw() {
        //die('this page is accessable');
        if (is_logged_in()) {
            $response['title'] = "Direct Withdraw";
            $siteSettings = $this->User_model->get_single_record('tbl_site_settings',['id' =>1],'*');
            $response['des'] = "Minimum Transfer Amount ".currency."".$siteSettings['minimum_withdraw']."";
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('master_key', 'Master Key', 'trim|required|xss_clean');
                //$this->form_validation->set_rules('credit_type', 'Credit in', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    // $user_id = $data['user_id'];
                    $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
                    $kyc_status = $this->User_model->get_single_record('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), '*');
                    $withdraw_amount = $this->input->post('amount');
                    // $winto_user_id = $this->input->post('user_id');
                    $master_key = $this->input->post('master_key');
                    $balance = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '"', 'ifnull(sum(amount),0) as balance');
                    if ($withdraw_amount >= $siteSettings['minimum_withdraw']) {
                        // if ($withdraw_amount % 100 == 0) {
                            if ($balance['balance'] >= $withdraw_amount) {
                                if ($user['master_key'] == $master_key) {
                                    // if($kyc_status['kyc_status'] == 2){
                                    $DirectIncome = array(
                                        'user_id' => $this->session->userdata['user_id'],
                                        'amount' => - $withdraw_amount,
                                        'type' => 'withdraw_request',
                                        'description' => 'Withdrawal Amount ',
                                    );
                                    $this->User_model->add('tbl_income_wallet', $DirectIncome);
                                    if ($data['pin_transfer'] == 0) {
                                        $withdrawArr = array(
                                            'user_id' => $this->session->userdata['user_id'],
                                            'amount' => $withdraw_amount,
                                            'type' => 'withdraw_request',
                                            'tds' => $withdraw_amount * 0 / 100,
                                            'admin_charges' => $withdraw_amount * $siteSettings['bank_charges'] / 100,
                                            'fund_conversion' => 0,
                                            'payable_amount' => $withdraw_amount - ($withdraw_amount * $siteSettings['bank_charges'] / 100),
                                            //'credit_type' => $data['credit_type'],
                                        );
                                        $this->User_model->add('tbl_withdraw', $withdrawArr);
                                    } else {
                                        // $fund_converstion = $withdraw_amount * 45 /100;
                                        // $withdrawArr['user_id'] = $this->session->userdata['user_id'];
                                        // $withdrawArr['type'] = 'direct_income' ;
                                        // $withdrawArr['amount'] = $withdraw_amount;
                                        // $withdrawArr['admin_charges'] = $withdraw_amount * 10 /100;
                                        // $withdrawArr['fund_conversion'] = $withdraw_amount * 45 /100;
                                        // $withdrawArr['tds'] = $withdrawArr['fund_conversion'] * 5 /100;
                                        // $withdrawArr['payable_amount'] = $withdrawArr['fund_conversion'] - $withdrawArr['tds'];
                                        // $this->User_model->add('tbl_withdraw', $withdrawArr);
                                        // $walletArr = array(
                                        //     'user_id' => $this->session->userdata['user_id'],
                                        //     'amount' => $withdraw_amount * 90 / 100,
                                        //     'type' => 'direct_income_withdraw',
                                        //     'remark' => 'fund generated from direct income withdraw',
                                        //     'sender_id' => $this->session->userdata['user_id'],
                                        // );
                                        // $this->User_model->add('tbl_wallet', $walletArr);
                                    }
                                    $this->session->set_flashdata('message', 'Withdraw Requested     Successfully');
                                    // }else{
                                    //     $this->session->set_flashdata('message', 'Please Complete your Kyc before withdrawal amount');
                                    // }
                                } else {
                                    $this->session->set_flashdata('message', 'Invalid Master Key');
                                }
                            } else {
                                $this->session->set_flashdata('message', 'Insuffcient Balance');
                            }
                        // } else {
                        //     $this->session->set_flashdata('message', 'Withdraw Amount is multiple of '.currency.''.$siteSettings['minimum_withdraw'].'');
                        // }
                    } else {
                        $this->session->set_flashdata('message', 'Minimum Withdrawal Amount is '.currency.''.$siteSettings['minimum_withdraw'].'');
                    }
                } else {
                    $this->session->set_flashdata('message', 'erorrrrr');
                }
            }
            $response['balance'] = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '"', 'ifnull(sum(amount),0) as balance');
            $this->load->view('direct_income_withdraw', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }




    public function matchingWithdraw() {
        //die('this page is accessable');
        if (is_logged_in()) {
            $response['title'] = "Matching Withdraw";
            $response['des'] = "Minimum Transfer Amount $200";
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('master_key', 'Master Key', 'trim|required|xss_clean');
                $this->form_validation->set_rules('credit_type', 'Credit in', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    // $user_id = $data['user_id'];
                    $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
                    $kyc_status = $this->User_model->get_single_record('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), '*');
                    $withdraw_amount = $this->input->post('amount');
                    // $winto_user_id = $this->input->post('user_id');
                    $master_key = $this->input->post('master_key');
                    $balance = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '" AND (type = "matching_bonus" OR type = "direct_sponsor_income" OR type ="matching_withdraw")', 'ifnull(sum(amount),0) as balance');
                    if ($withdraw_amount >= 200) {
                        if ($withdraw_amount % 10 == 0) {
                            if ($balance['balance'] >= $withdraw_amount) {
                                if ($user['master_key'] == $master_key) {
                                    // if($kyc_status['kyc_status'] == 2){
                                    $DirectIncome = array(
                                        'user_id' => $this->session->userdata['user_id'],
                                        'amount' => - $withdraw_amount,
                                        'type' => 'matching_withdraw',
                                        'description' => 'Withdrawal Amount ',
                                    );
                                    $this->User_model->add('tbl_income_wallet', $DirectIncome);
                                    if ($data['pin_transfer'] == 0) {
                                        $withdrawArr = array(
                                            'user_id' => $this->session->userdata['user_id'],
                                            'amount' => $withdraw_amount,
                                            'type' => 'matching_withdraw',
                                            'tds' => $withdraw_amount * 0 / 100,
                                            'admin_charges' => $withdraw_amount * 10 / 100,
                                            'fund_conversion' => 0,
                                            'payable_amount' => $withdraw_amount - ($withdraw_amount * 10 / 100),
                                            'credit_type' => $data['credit_type'],
                                        );
                                        $this->User_model->add('tbl_withdraw', $withdrawArr);
                                    } else {
                                        // $fund_converstion = $withdraw_amount * 45 /100;
                                        // $withdrawArr['user_id'] = $this->session->userdata['user_id'];
                                        // $withdrawArr['type'] = 'direct_income' ;
                                        // $withdrawArr['amount'] = $withdraw_amount;
                                        // $withdrawArr['admin_charges'] = $withdraw_amount * 10 /100;
                                        // $withdrawArr['fund_conversion'] = $withdraw_amount * 45 /100;
                                        // $withdrawArr['tds'] = $withdrawArr['fund_conversion'] * 5 /100;
                                        // $withdrawArr['payable_amount'] = $withdrawArr['fund_conversion'] - $withdrawArr['tds'];
                                        // $this->User_model->add('tbl_withdraw', $withdrawArr);
                                        $walletArr = array(
                                            'user_id' => $this->session->userdata['user_id'],
                                            'amount' => $withdraw_amount * 90 / 100,
                                            'type' => 'direct_income_withdraw',
                                            'remark' => 'fund generated from direct income withdraw',
                                            'sender_id' => $this->session->userdata['user_id'],
                                        );
                                        $this->User_model->add('tbl_wallet', $walletArr);
                                    }
                                    $this->session->set_flashdata('message', 'Withdraw Requested     Successfully');
                                    // }else{
                                    //     $this->session->set_flashdata('message', 'Please Complete your Kyc before withdrawal amount');
                                    // }
                                } else {
                                    $this->session->set_flashdata('message', 'Invalid Master Key');
                                }
                            } else {
                                $this->session->set_flashdata('message', 'Insuffcient Balance');
                            }
                        } else {
                            $this->session->set_flashdata('message', 'Withdraw Amount is multiple of $10');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Minimum Withdrawal Amount is $200');
                    }
                } else {
                    $this->session->set_flashdata('message', 'erorrrrr');
                }
            }
            $response['balance'] = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '" AND (type = "matching_bonus" OR type = "direct_sponsor_income" OR type ="matching_withdraw")', 'ifnull(sum(amount),0) as balance');
            $this->load->view('direct_income_withdraw', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function app_fund_transfer($me_id, $amount, $sender_id) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://winto.in/MobileApp/Money_transfer/receiveMoneyFromSite",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('me_id' => $me_id, 'amount' => $amount, 'sender_id' => $sender_id),
            CURLOPT_HTTPHEADER => array(),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function get_app_user($user_id) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://winto.in/MobileApp/Money_transfer/validate_user",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('user_id' => $user_id),
            CURLOPT_HTTPHEADER => array(),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function TaskIncomeWithdraw() {
        die('this page is accessable');
        if (is_logged_in()) {
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('master_key', 'Master Key', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    // $user_id = $data['user_id'];
                    $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
                    $withdraw_amount = $this->input->post('amount');
                    // $winto_user_id = $this->input->post('user_id');
                    $master_key = $this->input->post('master_key');
                    $balance = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '" and (type = "task_income" or  type = "task_income_withdraw" or type = "task_level_income")', 'ifnull(sum(amount),0) as balance');
                    if ($withdraw_amount >= 200) {
                        if ($balance['balance'] >= $withdraw_amount) {
                            if ($user['master_key'] == $master_key) {
                                $DirectIncome = array(
                                    'user_id' => $this->session->userdata['user_id'],
                                    'amount' => - $withdraw_amount,
                                    'type' => 'task_income_withdraw',
                                    'description' => 'Task income Withdraw ',
                                );
                                $this->User_model->add('tbl_income_wallet', $DirectIncome);
                                if ($data['pin_transfer'] == 0) {
                                    $withdrawArr = array(
                                        'user_id' => $this->session->userdata['user_id'],
                                        'amount' => $withdraw_amount,
                                        'type' => 'task_income',
                                        'tds' => $withdraw_amount * 5 / 100,
                                        'admin_charges' => $withdraw_amount * 10 / 100,
                                        'fund_conversion' => 0,
                                        'payable_amount' => $withdraw_amount - ($withdraw_amount * 15 / 100)
                                    );
                                    $this->User_model->add('tbl_withdraw', $withdrawArr);
                                } else {
                                    $fund_converstion = $withdraw_amount * 45 / 100;
                                    $withdrawArr['user_id'] = $this->session->userdata['user_id'];
                                    $withdrawArr['type'] = 'task_income';
                                    $withdrawArr['amount'] = $withdraw_amount;
                                    $withdrawArr['admin_charges'] = $withdraw_amount * 10 / 100;
                                    $withdrawArr['fund_conversion'] = $withdraw_amount * 45 / 100;
                                    $withdrawArr['tds'] = $withdrawArr['fund_conversion'] * 5 / 100;


                                    $withdrawArr['payable_amount'] = $withdrawArr['fund_conversion'] - $withdrawArr['tds'];

                                    $this->User_model->add('tbl_withdraw', $withdrawArr);
                                    $walletArr = array(
                                        'user_id' => $this->session->userdata['user_id'],
                                        'amount' => $withdraw_amount * 45 / 100,
                                        'type' => 'task_income_withdraw',
                                        'remark' => 'fund generated from direct income withdraw',
                                        'sender_id' => $this->session->userdata['user_id'],
                                    );
                                    $this->User_model->add('tbl_wallet', $walletArr);
                                }
                                $this->session->set_flashdata('message', 'Withdraw Requested     Successfully');
                                // $app_response = $this->app_fund_transfer($winto_user_id , ($withdraw_amount * 90 / 100) , $user['user_id']);
                                // $app_response = json_decode($app_response,true);
                                // if($app_response['success'] == 1){
                                //     $DirectIncome = array(
                                //         'user_id' => $this->session->userdata['user_id'],
                                //         'amount' => - $withdraw_amount ,
                                //         'type' => 'direct_income_withdraw',
                                //         'description' => 'Amount WIthdraw in Winto Account for User'.$winto_user_id,
                                //     );
                                //     $this->User_model->add('tbl_income_wallet', $DirectIncome);
                                //     $this->session->set_flashdata('message', 'Amount Withdrawal Successfully');
                                // }else{
                                //     $this->session->set_flashdata('message', $app_response['message']);
                                // }
                            } else {
                                $this->session->set_flashdata('message', 'Invalid Master Key');
                            }
                        } else {
                            $this->session->set_flashdata('message', 'Insuffcient Balance');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Minimum Withdrawal Amount is Rs 200');
                    }
                } else {
                    $this->session->set_flashdata('message', 'erorrrrr');
                }
            }
            $response['balance'] = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '" and (type = "task_income" or type = "task_income_withdraw" or type = "task_level_income")', 'ifnull(sum(amount),0) as balance');
            $this->load->view('task_income_withdraw', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function CookieBasedTracking() {
        if (is_logged_in()) {
            $response = array();
            $response['records'] = $this->User_model->count_cookies($this->session->userdata['user_id']);
            $this->load->view('cookie_based_tracking', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function withdraw_history() {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = 'Withdraw Summary';
            $response['transactions'] = $this->User_model->get_records('tbl_withdraw', array('user_id' => $this->session->userdata['user_id']), '*');
            $this->load->view('transaction_history', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function tds_charges() {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = 'TDS Charges';
            $response['transactions'] = $this->User_model->get_records('tbl_withdraw', array('user_id' => $this->session->userdata['user_id']), '*');
            $this->load->view('tds_charges', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function forgot_password() {
        $response = array();
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = $this->security->xss_clean($this->input->post());
            $user = $this->User_model->get_single_record('tbl_users', ' user_id = "' . $data['user_id'] . '" or email = "' . $data['user_id'] . '"', 'name,user_id,email,password,master_key,phone');
            if (!empty($user)) {
                $message = "Dear " . $user['name'] . ' your User ID ' . $user['user_id'] . '  password for Your Accountt is ' . $user['password'].' Transaction Password '.$user['master_key'];
                $response['message'] = 'Account Detail Sent on Your Email Please check';
                $this->send_email($user['email'], 'Security Alert', $message);
                notify_user($user['user_id'] , $message);
                $this->session->set_flashdata('message', 'Password Sent On Your Registered Phone Number');
            } else {
                $this->session->set_flashdata('message', 'Invalid User ID');
            }
        }
        $this->load->view('forgot_password', $response);
    }

    public function send_email($email, $subject, $message) {
        date_default_timezone_set('Asia/Kolkata');
        $this->load->library('email');
        $this->email->from('info@tradebtc.us', 'Trade BTC');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

}
