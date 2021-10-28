<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
        $this->load->model(array('User_model'));
        $this->load->helper(array('user', 'birthdate', 'security', 'email'));
    }

    public function index() {
        if (is_logged_in()) {
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
            $response['token_value'] = $this->User_model->get_single_record('tbl_token_value', [], '*');
            $response['today_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and date(created_at) = date(now()) and amount > 0', 'ifnull(sum(amount),0) as today_income');
            $response['today_matching_bonus'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and type = "matching_bonus" and date(created_at) = date(now())', 'ifnull(sum(amount),0) as today_matching_bonus');
            /*incomes */
            $response['matching_bonus'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and type = "matching_bonus"', 'ifnull(sum(amount),0) as matching_bonus');
            $response['level_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and type = "level_income"', 'ifnull(sum(amount),0) as level_income');
            $response['rewards_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and type = "reward_income"', 'ifnull(sum(amount),0) as reward_income');
            $response['direct_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and type = "direct_income"', 'ifnull(sum(amount),0) as direct_income');
            $response['senior_support_bonus'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and type = "senior_support_bonus"', 'ifnull(sum(amount),0) as senior_support_bonus');
            $response['daily_roi_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and type = "daily_roi_income"', 'ifnull(sum(amount),0) as daily_roi_income');
            $response['pool_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and type = "pool_income"', 'ifnull(sum(amount),0) as pool_income');
            $response['turnover_rewards'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and type = "turnover_rewards"', 'ifnull(sum(amount),0) as turnover_rewards');
            $response['fix_deposit'] = $this->User_model->get_single_record('tbl_fix_deposit', 'user_id = "'.$this->session->userdata['user_id'].'"', 'ifnull(sum(amount),0) as fix_deposit');
            /*incomes */
            $response['total_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and amount > 0', 'ifnull(sum(amount),0) as total_income');
            $response['income_balance'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'"', 'ifnull(sum(amount),0) as income_balance');
            $response['total_repurchase_income'] = $this->User_model->get_single_record('tbl_repurchase_income', 'user_id = "'.$this->session->userdata['user_id'].'"', 'ifnull(sum(amount),0) as total_repurchase_income');
            $response['team'] = $this->User_model->get_single_record('tbl_downline_count', 'user_id = "'.$this->session->userdata['user_id'].'"', 'ifnull(count(id),0) as team');
            $response['paid_directs'] = $this->User_model->get_single_record('tbl_users', 'sponser_id = "'.$this->session->userdata['user_id'].'" and paid_status = 1', 'ifnull(count(id),0) as paid_directs');
            $response['free_directs'] = $this->User_model->get_single_record('tbl_users', 'sponser_id = "'.$this->session->userdata['user_id'].'"  and paid_status = 0', 'ifnull(count(id),0) as free_directs');
            $response['requested_fund'] = $this->User_model->get_single_record('tbl_payment_request', 'user_id = "'.$this->session->userdata['user_id'].'" ', 'ifnull(sum(amount),0) as requested_fund');
            $response['wallet_balance'] = $this->User_model->get_single_record('tbl_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" ', 'ifnull(sum(amount),0) as wallet_balance');
            //$response['token_wallet'] = $this->User_model->get_single_record('tbl_token_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" ', 'ifnull(sum(amount),0) as token_wallet');
            //$response['shopping_wallet'] = $this->User_model->get_single_record('tbl_shopping_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" ', 'ifnull(sum(amount),0) as shopping_wallet');
            $response['released_fund'] = $this->User_model->get_single_record('tbl_payment_request', 'user_id = "'.$this->session->userdata['user_id'].'" and status = 1', 'ifnull(sum(amount),0) as released_fund');
            $response['total_withdrawal'] = $this->User_model->get_single_record('tbl_withdraw', 'user_id = "'.$this->session->userdata['user_id'].'"', 'ifnull(sum(amount),0) as total_withdrawal');
            $response['team_business'] = $this->User_model->get_single_record('tbl_downline_business', 'user_id = "'.$this->session->userdata['user_id'].'"', 'ifnull(sum(business),0) as team_business');
            $response['package'] = $this->User_model->get_single_record('tbl_package', 'id = "'.$response['user']['package_id'].'"', '*');
            $response['directs'] = $this->User_model->get_records('tbl_users', 'sponser_id = "'.$response['user']['user_id'].'"', 'id,user_id,name,first_name,last_name,phone,paid_status,created_at');
            $response['news'] = $this->User_model->get_records('tbl_news',array(),'*');
            $response['roi_records'] = $this->User_model->get_limit_records('tbl_income_wallet', 'user_id = "'.$this->session->userdata['user_id'].'" and type = "roi_bonus"', '*',5,0);
           // pr($response,true);
            $response['team_unpaid'] = $this->User_model->calculate_team($this->session->userdata['user_id'],0);
            $response['team_paid'] = $this->User_model->calculate_team($this->session->userdata['user_id'],1);
            $response['reward'] = $this->User_model->get_records('tbl_rewards',['user_id' => $this->session->userdata['user_id']],'*');
            //$response['coins'] = $this->get_coin_prices();
            $get = $this->User_model->get_records('tbl_users',['directs >=' => 10,'user_id' => $this->session->userdata['user_id']],'user_id');
            $data = array();
            foreach ($get as $key => $value) {
                $left = $this->User_model->get_single_record('tbl_users', array('sponser_id' => $value['user_id'], 'position' => "L", 'paid_status >' => 0), 'count(id) as ids');
                if($left['ids'] >= 5){
                    $right = $this->User_model->get_single_record('tbl_users', array('sponser_id' => $value['user_id'], 'position' => "R", 'paid_status >' => 0), 'count(id) as ids');
                    if($right['ids'] >= 5){
                       $data[] = $this->User_model->get_single_record('tbl_users','user_id = "'.$value['user_id'].'"','user_id,leftPower,rightPower');
                    }
                }
            }

            $response['silver'] = $data;

            $get2 = $this->User_model->get_records('tbl_users',['directs >=' => 20,'user_id' => $this->session->userdata['user_id']],'user_id');
            $data2 = array();
            foreach ($get2 as $key2 => $value2) {
                $left2 = $this->User_model->get_single_record('tbl_users', array('sponser_id' => $value2['user_id'], 'position' => "L", 'paid_status >' => 0), 'count(id) as ids');
                if($left2['ids'] >= 10){
                    $right2 = $this->User_model->get_single_record('tbl_users', array('sponser_id' => $value2['user_id'], 'position' => "R", 'paid_status >' => 0), 'count(id) as ids');
                    if($right2['ids'] >= 10){
                       $data2[] = $this->User_model->get_single_record('tbl_users','user_id = "'.$value2['user_id'].'"','user_id,leftPower,rightPower');
                    }
                }
            }

            $response['gold'] = $data2;

            $this->load->view('header', $response);
            $this->load->view('index', $response);
            // $this->load->view('footer', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function Referral() {
        if (is_logged_in()) {
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
            $response['today_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = '.$this->session->userdata['user_id'].' and date(created_at) = date(now()', 'ifnull(sum(amount),0) as today_income');
            $response['task_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = '.$this->session->userdata['user_id'].' and type = "task_income"', 'ifnull(sum(amount),0) as task_income');
            $response['direct_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'user_id = '.$this->session->userdata['user_id'].' and type = "direct_income"', 'ifnull(sum(amount),0) as direct_income');
            $this->load->view('header', $response);
            $this->load->view('refferal', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function sample() {
        if (is_logged_in()) {
            $response = array();
            $this->load->view('header', $response);
            $this->load->view('index', $response);
            $this->load->view('footer', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function login() {
        redirect('Dashboard/User/MainLogin');
    }
    public function MainLogin() {
        $response['message'] = '';
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = $this->security->xss_clean($this->input->post());
            $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $data['user_id'], 'password' => $data['password']), 'id,user_id,role,name,email,paid_status,disabled');
            if (!empty($user)) {
                if ($user['disabled'] == 0) {
                    $this->session->set_userdata('user_id', $user['user_id']);
                    $this->session->set_userdata('role', $user['role']);
                    redirect('Dashboard/User/');
                } else {
                    $response['message'] = 'This Account Is Blocked Please Contact to Administrator';
                }
            } else {
                $response['message'] = 'Invalid Credentials';
            }
        }
        $this->load->view('main_login', $response);
    }

    public function Success() {
        $response['message'] = 'Now You Can Login with <br>User ID :kkk <br> Password :`1234';
        $this->load->view('success', $response);
    }

    public function registration_cron(){
        ini_set('memory_limit', '-1');
        $i = 0;
        $oldusers = $this->User_model->get_records_csv_desc('agtoken_csv',['migrate' => 0 ,'sponser_id !=' => ''],'*');
        foreach($oldusers as $key => $user){

            if($i == 500)
                break;

            // $users = $this->User_model->get_records('agtoken_users', array('upline_id' => $olduser['user_id']), '*');
            // foreach($users as $k => $user){
                $position = $user['position'];
                $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $user['sponser_id']), 'user_id,last_left,last_right');
                if(empty($sponser)){
                    $sponser = $this->User_model->get_single_record('tbl_users', [], 'user_id,last_left,last_right');
                }
                // pr($sponser);
                $user = $this->User_model->get_single_record('agtoken_users', array('user_id' => $user['idNo']), '*');

                $userData['user_id'] =  $user['user_id'];
                $userData['sponser_id'] = $sponser['user_id'];
                $userData['name'] = $user['name'];
                $userData['phone'] = $user['phone'];
                $userData['password'] = '1234';$user['phone'];//rand(1000,9999);
                $userData['position'] = $position;
                $userData['last_left'] = $userData['user_id'];
                $userData['last_right'] = $userData['user_id'];
                $userData['master_key'] = $user['master_key'];
                $userData['created_at'] = $user['created_at'];
                // $userData['upline_id'] = $user['upline_id'];
                if($position == 'L'){
                    $userData['upline_id'] = $sponser['last_left'];
                }else{
                    $userData['upline_id'] = $sponser['last_right'];
                }
                // pr($userData);
                $res = $this->User_model->add('tbl_users', $userData);
                $res = $this->User_model->add('tbl_bank_details',array('user_id' => $userData['user_id'] ));
                if ($res) {
                    if ($userData['position'] == 'R') {
                        $this->User_model->update('tbl_users', array('last_right' => $userData['upline_id']), array('last_right' => $userData['user_id']));
                        $this->User_model->update('tbl_users', array('user_id' => $userData['upline_id']), array('right_node' => $userData['user_id']));
                    } elseif ($userData['position'] == 'L') {
                        $this->User_model->update('tbl_users', array('last_left' => $userData['upline_id']), array('last_left' => $userData['user_id']));
                        $this->User_model->update('tbl_users', array('user_id' => $userData['upline_id']), array('left_node' => $userData['user_id']));
                    }
                    $this->add_counts($userData['user_id'], $userData['user_id'], 1);
                    // $this->add_sponser_counts($userData['user_id'],$userData['user_id'], $level = 1);
                    echo $res.'Member registered successfully <br>';
                }
            // }
            $this->User_model->update('agtoken_csv', array('idNo' => $user['user_id']), array('migrate' => 1));
            // $this->registration_cron();
            $i++;
        }
    }

    public function emailtest(){
        $email = 'sksanjay.kumar@yahoo.in';
        $sms_text = 'Testing';
        sendMail($sms_text,$email);
    }

    public function Register() {

        $response = array();
        $sponser_id = $this->input->get('sponser_id');
        if($sponser_id == ''){
            $sponser_id = '';
        }
        $response['countries'] = $this->User_model->get_records('countries', array(), '*');
        $response['sponser_id'] = $sponser_id;
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('sponser_id', 'Sponser ID', 'trim|required|xss_clean');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            //$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
            // $this->form_validation->set_rules('pan', 'PAN', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $this->load->view('register', $response);
            }else{
                $sponser_id = $this->input->post('sponser_id');
                $phone = $this->input->post('phone');
                $response['sponser_id'] = $sponser_id;
                $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $sponser_id), '*');
                $emailCheck = $this->User_model->get_single_record('tbl_users', array('email' => $this->input->post('email')), 'email');
                // if(empty($emailCheck['email'])){
                    if(!empty($sponser)){
                        // $user_id = $this->getUserIdForRegister();
                        $id_number = $this->getUserIdForRegister();
                        $userData['user_id'] =  $id_number;
                        // $userData['id_number'] = $id_number;
                        $userData['sponser_id'] = $sponser_id;
                        $userData['name'] = $this->input->post('name');
                        $userData['phone'] = $this->input->post('phone');
                        $userData['password'] = rand(100000,999999);//$this->input->post('password');
                        $userData['position'] = $this->input->post('position');
                        $userData['last_left'] = $userData['user_id'];
                        $userData['last_right'] = $userData['user_id'];
                        $userData['country_code'] = $this->input->post('country');
                        $userData['email'] = $this->input->post('email');
                        $userData['country'] = $this->input->post('country');
                        $userData['master_key'] = rand(100000,999999);
                        if($userData['position'] == 'L'){
                            $userData['upline_id'] = $sponser['last_left'];
                        }else{
                            $userData['upline_id'] = $sponser['last_right'];
                        }
                        $res = $this->User_model->add('tbl_users', $userData);
                        $res = $this->User_model->add('tbl_bank_details',array('user_id' => $userData['user_id'] ));
                        if ($res) {
                            if ($userData['position'] == 'R') {
                                $this->User_model->update('tbl_users', array('last_right' => $userData['upline_id']), array('last_right' => $userData['user_id']));
                                $this->User_model->update('tbl_users', array('user_id' => $userData['upline_id']), array('right_node' => $userData['user_id']));
                            } elseif ($userData['position'] == 'L') {
                                $this->User_model->update('tbl_users', array('last_left' => $userData['upline_id']), array('last_left' => $userData['user_id']));
                                $this->User_model->update('tbl_users', array('user_id' => $userData['upline_id']), array('left_node' => $userData['user_id']));
                            }
                            $this->add_counts($userData['user_id'], $userData['user_id'], 1);
                            $this->add_sponser_counts($userData['user_id'],$userData['user_id'], $level = 1);
                            $sms_text = 'Dear ' .$userData['name']. ', Your Account Successfully created. User ID :  ' . $userData['user_id'] . ' Password :' . $userData['password'] . ' Transaction Password:' .$userData['master_key'] . base_url();
                            sendMail($userData['email'],$sms_text,'Registration Alert');
                            notify_user($userData['user_id'] , $sms_text);
                            //notify_mail($userData['email'] , $sms_text);
                            $response['message'] = 'Dear ' .$userData['name']. ', Your Account Successfully created. <br>User ID :  ' . $userData['user_id'] . ' <br> Password :' . $userData['password'] . ' <br> Transaction Password:' .$userData['master_key'];
                            $this->load->view('success', $response);
                        }
                        else {
                            $this->session->set_flashdata('error', 'Error while Registraion please try Again');
                            $response['message'] = 'Error while Registraion please try Again';
                            $this->load->view('register', $response);
                        }
                    }else{
                        $this->session->set_flashdata('error', "Please enter valid Sponsor ID.");
                        $this->load->view('register', $response);
                    }
                // }else{
                //     $this->session->set_flashdata('error', 'Email Address Already Exits');
                //     $this->load->view('register', $response);
                // }
            }
        }else{
            $this->load->view('register', $response);
        }
    }
    function add_counts($user_name = 'DW56497', $downline_id = 'DW56497', $level) {
        $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_name), $select = 'upline_id , position,user_id');
        if (!empty($user)) {
            if ($user['position'] == 'L') {
                $count = array('left_count' => ' left_count + 1');
                $c = 'left_count';
            } else if ($user['position'] == 'R') {
                $c = 'right_count';
                $count = array('right_count' => ' right_count + 1');
            } else {
                return;
            }
            $this->User_model->update_count($c, $user['upline_id']);
            $downlineArray = array(
                'user_id' => $user['upline_id'],
                'downline_id' => $downline_id,
                'position' => $user['position'],
                'created_at' => date('Y-m-d h:i:s'),
                'level' => $level,
            );
            $this->User_model->add('tbl_downline_count', $downlineArray);
            $user_name = $user['upline_id'];

            if ($user['upline_id'] != '') {
                $this->add_counts($user_name, $downline_id, $level + 1);
            }
        }
    }
    public function user_downline(){
        $users = $this->User_model->get_records('tbl_users',[],'id,user_id,upline_id,sponser_id');
        foreach($users as $key => $user){

            $this->update_count($user['user_id'], $user['user_id'], 1);
        }
    }
    public function update_count($user_name, $downline_id, $level){
        $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_name), $select = 'upline_id , position,user_id');
        if (!empty($user)) {
            $downlineArray = array(
                'user_id' => $user['upline_id'],
                'downline_id' => $downline_id,
                'position' => $user['position'],
                'created_at' => date('Y-m-d h:i:s'),
                'level' => $level,
            );
            $this->User_model->add('tbl_downline_count', $downlineArray);
            $user_name = $user['upline_id'];
            if ($user['upline_id'] != '') {
                $this->update_count($user_name, $downline_id, $level + 1);
            }
        }
    }
    function add_sponser_counts($user_name = 'DW56497', $downline_id = 'DW56497', $level) {
        $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_name), $select = 'sponser_id,user_id');
        if ($user['sponser_id'] != '') {
                $downlineArray = array(
                    'user_id' => $user['sponser_id'],
                    'downline_id' => $downline_id,
                    'position' => '',
                    'created_at' => 'CURRENT_TIMESTAMP',
                    'level' => $level,
                );
                $this->User_model->add('tbl_sponser_count', $downlineArray);
                $user_name = $user['sponser_id'];
                $this->add_sponser_counts($user_name, $downline_id, $level + 1);
        }
    }
    // public function getUserIdForRegister($country_code = '') {
    //     $sponser = $this->User_model->get_single_record('tbl_users', array(), 'ifnull(max(id_number),0) + 1 as next_id');
    //     if ($sponser['next_id'] == 1) {
    //         $user_id = '10001';
    //     } else {
    //         $user_id = $sponser['next_id'];
    //     }
    //     return $user_id;
    // }

    public function getUserIdForRegister() {
        $user_id = 'FX' . rand(10000, 99999);
        $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), 'user_id,name');
        if (!empty($sponser)) {
            $this->getUserIdForRegister();
        } else {
            return $user_id;
        }
    }


    public function logout() {
        $this->session->unset_userdata(array('user_id', 'role'));
        redirect('Dashboard/User/logout2');
    }

    public function logout2() {
        $this->session->unset_userdata(array('user_id', 'role'));
        redirect('https://mlmsoftsolutions.com');
    }

    public function Profile() {
        if (is_logged_in()) {
            $response = array();
            // $response['active_tab'] = 'profile';
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $response['csrfName'] = $this->security->get_csrf_token_name();
                $response['csrfHash'] = $this->security->get_csrf_hash();
                $response['success'] = 0;
                $data = $this->security->xss_clean($this->input->post());
                $userDetail = $this->User_model->get_single_record('tbl_users',['user_id' => $this->session->userdata['user_id']],'paid_status');
                if($userDetail['paid_status'] == 0){
                    // $Userdata['name'] = $data['name'];
                    // $Userdata['last_name'] = $data['last_name'];
                    // $Userdata['address'] = $data['address'];
                    // $Userdata['postal_code'] = $data['postal_code'];
                    //$Userdata['phone'] = $data['phone'];
                    $get = $this->User_model->get_single_record('tbl_users',['user_id' => $this->session->userdata['user_id']],'city, email');
                    if(empty($get['city'])){
                        $Userdata['city'] = $data['city'];
                        $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), $Userdata);
                    }
                    if(empty($get['email'])){
                        $Userdata['email'] = $data['email'];
                        $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), $Userdata);
                    }

                    if (!empty($updres)) {
                        $this->session->set_flashdata('message','Details Updated Successfully');
                        $response['message'] = 'Details Updated Successfully';
                        $response['success'] = 1;
                    } else {
                        $this->session->set_flashdata('message','Please contact to the admin for more changes.');
                        $response['message'] = 'Please contact to the admin for more changes.';
                        // redirect('Dashboard/User/Profile');
                    }
                }else{
                    $this->session->set_flashdata('message','For Profile Update Please contact Admin');
                    $response['message'] = 'For Profile Update Please contact Admin';
                }
                echo json_encode($response);
                exit();
            }
            $userinfo = userinfo();
            $countries = $this->User_model->get_records('countries', array(), '*');
            $response['upline'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $userinfo->upline_id), 'name,first_name,last_name,phone,email');
            $response['user_bank'] = (object) $this->User_model->get_single_record('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), '*');
            // $response['stateArr'] = $this->User_model->get_records('states', array('country_id' => $userinfo->country), '*');
            // if (empty($userinfo->state)) {
            //     $state_id = $response['stateArr'][0]['id'];
            // } else {
            //     $state_id = $userinfo->state;
            // }
//            pr($userinfo, true);
            // $response['cityArr'] = $this->User_model->get_records('cities', array('state_id' => $state_id), '*');
            // $countryN = array();
            // $response['message'] = '';
            // foreach ($countries as $key => $country)
            //     $countryN[$country['id']] = $country['name'];
            // $response['countries'] = $countryN;
//            pr($response);
            $this->load->view('profile_update', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function bankProfile() {
        if (is_logged_in()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                //pr($data);
                $Userdata['btc'] = $data['btc'];
                $Userdata['tron'] = $data['tron'];
                $Userdata['ethereum'] = $data['ethereum'];
                $Userdata['litecoin'] = $data['litecoin'];
                $userInfo = $this->User_model->get_single_record('tbl_users',['user_id' => $this->session->userdata['user_id']],'paid_status');
                if($userInfo['paid_status'] == 0){
                    // $Userdata = [
                    //     'bank_name' => $data['bank_name'],
                    //     'account_holder_name' => $data['account_holder_name'],
                    //     'bank_account_number' => $data['bank_account_number'],
                    //     'ifsc_code' => $data['ifsc_code'],
                    //     'aadhar' => $data['aadhar'],
                    //     'pan' => $data['pan'],
                    // ];
                    $updres = $this->User_model->update('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), $Userdata);
                    if ($updres == true) {
                        $this->session->set_flashdata('message','Details Updated Successfully');
                        redirect('Dashboard/User/Profile');
                    } else {
                        $this->session->set_flashdata('message','There is an error while updating profile details Please try Again ..');
                        redirect('Dashboard/User/Profile');
                    }
                }else{
                    $response['message'] = 'For Profile Update Please contact Admin';
                }
            }
            redirect('Dashboard/User/Profile');
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function password_reset(){
        if (is_logged_in()) {
            $response = array();
            $response['csrfName'] = $this->security->get_csrf_token_name();
            $response['csrfHash'] = $this->security->get_csrf_hash();
            $response['success'] = 0;
            $data = $this->security->xss_clean($this->input->post());
            $cpassword = $data['cpassword'];
            $npassword = $data['npassword'];
            $vpassword = $data['vpassword'];
            $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,password');
            if ($npassword !== $vpassword) {
                $response['message'] = 'Verify Password Doed Not Match';
            } elseif ($cpassword !== $user['password']) {
                $response['message'] = 'Wrong Current Password';
            } else {
                $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), array('password' => $vpassword));
                if ($updres == true) {
                    $response['message'] = 'Password Updated Successfully';
                    $response['success'] = 1;
                } else {
                    $response['message'] = 'There is an error while Changing Password Please Try Again';
                }
            }
            echo json_encode($response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function btc_update(){
        if (is_logged_in()) {
            $response = array();
            $response['csrfName'] = $this->security->get_csrf_token_name();
            $response['csrfHash'] = $this->security->get_csrf_hash();
            $response['success'] = 0;
            $data = $this->security->xss_clean($this->input->post());
            $btc = $data['btc'];
            $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,password');
            // if ($npassword !== $vpassword) {
            //     $response['message'] = 'Verify Password Doed Not Match';
            // } elseif ($cpassword !== $user['password']) {
            //     $response['message'] = 'Wrong Current Password';
            // } else {
                $updres = $this->User_model->update('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), array('btc' => $btc));
                if ($updres == true) {
                    $response['message'] = 'BTC Address Updated Successfully';
                    $response['success'] = 1;
                } else {
                    $response['message'] = 'There is an error while Updating BTC Address Please Try Again';
                }
            // }
            echo json_encode($response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function trans_password(){
        if (is_logged_in()) {
            $response = array();
            $response['csrfName'] = $this->security->get_csrf_token_name();
            $response['csrfHash'] = $this->security->get_csrf_hash();
            $response['success'] = 0;
            $data = $this->security->xss_clean($this->input->post());
            $cpassword = $data['cpassword'];
            $npassword = $data['npassword'];
            $vpassword = $data['vpassword'];
            $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,master_key');
            if ($npassword !== $vpassword) {
                $response['message'] = 'Verify Password Doed Not Match';
            } elseif ($cpassword !== $user['master_key']) {
                $response['message'] = 'Wrong Current Password';
            } else {
                $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), array('master_key' => $vpassword));
                if ($updres == true) {
                    $response['message'] = 'Password Updated Successfully';
                    $response['success'] = 1;
                } else {
                    $response['message'] = 'There is an error while Changing Password Please Try Again';
                }
            }
            echo json_encode($response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function id_card(){
        if (is_logged_in()) {
            $response = array();
            $this->load->view('id_card', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function BankDetails() {
        if (is_logged_in()) {
            $response = array();
            $response = array();
            $response['csrfName'] = $this->security->get_csrf_token_name();
            $response['csrfHash'] = $this->security->get_csrf_hash();
            $response['success'] = 0;
            // if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $data = $this->security->xss_clean($this->input->post());
            $data = html_escape($data);
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('bank_account_number', 'Bank Account Number', 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('ifsc_code', 'Ifsc Code', 'trim|required|xss_clean');
            if ($this->form_validation->run() != FALSE) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
                $config['max_size'] = 100000;
                $config['file_name'] = 'payment_slip1'.time();
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('userfile')) {
                    // $this->session->set_flashdata('error', $this->upload->display_errors());
                    $response['message'] = $this->upload->display_errors();
                } else {
                    $fileData = array('upload_data' => $this->upload->data());
                    $userData['passbook_image'] = $fileData['upload_data']['file_name'];
                    $userData['account_type'] = $data['account_type'];
                    $userData['bank_account_number'] = $data['bank_account_number'];
                    $userData['bank_name'] = $data['bank_name'];
                    $userData['account_holder_name'] = $data['account_holder_name'];
                    $userData['ifsc_code'] = $data['ifsc_code'];
                    $userData['pan'] = $data['pan'];
                    $userData['kyc_status'] = 1;
                    $updres = $this->User_model->update('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), $userData);
                    if ($updres == true) {
                        // $this->session->set_flashdata('error', 'Details Updated Successfully');
                        $response['message'] = 'Details Updated Successfully';
                        $response['success'] = 1;
                    } else {
                        // $this->session->set_flashdata('error', 'There is an error while updating Bank details Please try Again ..');
                        $response['message'] = 'Validation Failed 2';
                    }
                }
            }else{
                // $this->session->set_flashdata('error', 'Validation Failed');
                $response['message'] = 'Validation Failed';
            }
            // }
            echo json_encode($response);
            // $response['user_bank'] = (object) $this->User_model->get_single_record('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), '*');
            // $this->load->view('bank_details', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function UploadProof(){
        if (is_logged_in()) {
            $response = array();
            $response['csrfName'] = $this->security->get_csrf_token_name();
            $response['csrfHash'] = $this->security->get_csrf_hash();

            if (!empty($_FILES['userfile'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
                $config['max_size'] = 100000;
                $config['file_name'] = 'id_proof'.time();
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('userfile')) {
                    $response['message'] = $this->upload->display_errors();
                    // $this->session->set_flashdata('error', $this->upload->display_errors());
                    $response['success'] = '0';
                } else {
                    $type = $this->input->post('proof_type');
                    $fileData = array('upload_data' => $this->upload->data());
                    $userData[$type] = $fileData['upload_data']['file_name'];
                    $updres = $this->User_model->update('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), $userData);
                    if ($updres == true) {
                        $response['success'] = '1';
                        $response['image'] = base_url('uploads/').$fileData['upload_data']['file_name'];
                        $response['message'] = 'Proof Uploaded Successfully';
                    } else {
                        $response['success'] = '0';
                        $response['message'] = 'There is an error while updating Bank details Please try Again ..';
                    }
                }
            }else{
                $response['message'] = 'There is an error while updating Bank details Proof Please try Again ..';
                $response['success'] = '0';
            }
            echo json_encode($response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function PlaceParticipants() {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = 'Place Participants';
            $response['users'] = $this->User_model->get_records('tbl_users', array('sponser_id' => $this->session->userdata['user_id'], 'is_placed' => 0), 'id,user_id,sponser_id,role,name,email,phone,upline_id,created_at');
            $this->load->view('place_participants', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }


    public function Directs() {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = 'Direct Participants';
            $response['users'] = $this->User_model->get_records('tbl_users', array('sponser_id' => $this->session->userdata['user_id']), 'id,user_id,sponser_id,role,name,last_name,email,paid_status,phone,upline_id,created_at,topup_date,package_amount,position');
            // foreach ($response['users'] as $key => $user) {
            //     $response['users'][$key]['bonus'] = $this->User_model->get_single_record('tbl_income_wallet', array('user_id' => $user['user_id'] , 'amount > ' => 0 ), 'ifnull(sum(amount),0) as sum');
            // }
            $this->load->view('directs', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function Downline($position = '') {
        if (is_logged_in()) {
            $response = array();
            $where['user_id'] = $this->session->userdata['user_id'];
            if($position != ''){
                $where['position'] = $position;
                if($position == 'L')
                    $response['header'] = 'Left Downline Participants';
                else
                    $response['header'] = 'Right Downline Participants';
            }else{
                $response['header'] = 'Downline Participants';
            }

            $response['users'] = $this->User_model->get_records('tbl_downline_count', $where, 'id,downline_id,level');
            foreach ($response['users'] as $key => $user) {
                $response['users'][$key]['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $user['downline_id']), 'id,user_id,sponser_id,role,name,email,phone,position,package_amount,paid_status,upline_id,created_at');
            }
            $this->load->view('downline', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    // public function rightParticipants() {
    //     if (is_logged_in()) {
    //         $response = array();
    //         $response['header'] = 'Left Participants';
    //         $response['users'] = $this->User_model->get_records('tbl_user_positions', array('sponser_id' => $this->session->userdata['user_id'], 'position' => 'R'), 'id,user_id,sponser_id,upline_id,position');
    //         foreach ($response['users'] as $key => $user) {
    //             $response['users'][$key]['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $user['user_id']), 'id,user_id,sponser_id,role,first_name,last_name,email,phone,upline_id,created_at');
    //         }
    //         $this->load->view('directs', $response);
    //     } else {
    //         redirect('Dashboard/User/login');
    //     }
    // }

    public function income($type) {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = get_income_name($type);//ucwords(str_replace('_', ' ', $type));
            $response['total_income'] = $this->User_model->get_single_record('tbl_income_wallet', array('user_id' => $this->session->userdata['user_id'], 'type' => $type), 'ifnull(sum(amount),0) as total_income');
            $response['user_incomes'] = $this->User_model->get_records('tbl_income_wallet', array('user_id' => $this->session->userdata['user_id'], 'type' => $type), 'id,user_id,amount,type,description,created_at');
            $this->load->view('incomes', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function RewardsStatus() {
        if (is_logged_in()) {
            $response = array();
            $rewards = array(
                1=> array('matching' => '2000' , 'bonus' => '100' , 'rank' => '' , 'status' => 1),
                2 => array('matching' => '6000' , 'bonus' => '200' , 'rank' => '' , 'status' => 1),
                3 => array('matching' => '16000' , 'bonus' => '500' , 'rank' => '' , 'status' => 1),
                4 => array('matching' => '36000' , 'bonus' => '1000' , 'rank' => '' , 'status' => 1),
                5 => array('matching' => '86000' , 'bonus' => '2000' , 'rank' => '' , 'status' => 1),
                6 => array('matching' => '186000' , 'bonus' => '6000' , 'rank' => '' , 'status' => 1),
                7 => array('matching' => '386000' , 'bonus' => '20000' , 'rank' => '' , 'status' => 1),
            );
            $response['rewards_income'] = $this->User_model->get_records('tbl_income_wallet', array('user_id' => $this->session->userdata['user_id'], 'type' => 'rewards_income'), '*');
            $response['rewards'] = $rewards;
            $this->load->view('rewards_status', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function Magicincome($type) {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = 'Magic '.ucwords(str_replace('_', ' ', $type));
            $response['user_incomes'] = $this->User_model->get_records('tbl_repurchase_income', array('user_id' => $this->session->userdata['user_id'], 'type' => $type), 'id,user_id,amount,type,description,created_at');
            $this->load->view('incomes', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function Magicincome_ledgar() {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = 'Magic Income Ledgar';
            $response['total_income'] = $this->User_model->get_single_record('tbl_repurchase_income', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as total_income');
            $response['user_incomes'] = $this->User_model->get_records('tbl_repurchase_income', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,amount,type,description,created_at');
            $this->load->view('incomes', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function income_ledgar() {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = 'Income Ledgar';
            $response['total_income'] = $this->User_model->get_single_record('tbl_income_wallet', array('user_id' => $this->session->userdata['user_id']), 'ifnull(sum(amount),0) as total_income');
            $response['user_incomes'] = $this->User_model->get_records('tbl_income_wallet', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,amount,type,description,created_at');
            $this->load->view('incomes', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function purchase_history() {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = 'Shopping History';
            $response['orders'] = $this->User_model->get_records('tbl_orders', array('user_id' => $this->session->userdata['user_id']), '*');
            $i = 0;
            $this->load->view('purchase_history', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function Tree($user_id) {
        if (is_logged_in()) {
            $response = array();
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), 'id,user_id,sponser_id,role,name,first_name,last_name,email,phone,paid_status,created_at');
            $response['users'] = $this->User_model->get_records('tbl_users', array('sponser_id' => $user_id), 'id,user_id,sponser_id,role,name,first_name,last_name,email,phone,paid_status,created_at');
            foreach($response['users'] as $key => $directs){
                $response['users'][$key]['sub_directs'] = $this->User_model->get_records('tbl_users', array('sponser_id' => $directs['user_id']), 'id,user_id,sponser_id,role,name,first_name,last_name,email,phone,paid_status,created_at');
            }
            $this->load->view('tree', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function GenelogyTree($user_id = '') {
        if (is_logged_in()) {
            $validate_user = 0;
            $response = array();
            if($user_id == ''){
                $user_id = $this->input->get('user_id');
            }
            $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), 'user_id');
            if(!empty($user)){
                if ($user_id == $this->session->userdata['user_id']) {
                    $validate_user = 1;
                } else {
                    $down_user = $this->User_model->get_single_record('tbl_downline_count', array('user_id' => $this->session->userdata['user_id'], 'downline_id' => $user_id), '*');
                    if (!empty($down_user)) {
                        $validate_user = 1;
                    }
                }
            }else{
                $validate_user = 0;
            }

            if ($validate_user == 1) {
                $response['validate_user'] = 1;
                $response['level1'] = $this->User_model->get_tree_user($user_id);
                if (!empty($response['level1'])) {
                    $response['level2'][1] = $this->User_model->get_tree_user($response['level1']->left_node);
                    $response['level2'][2] = $this->User_model->get_tree_user($response['level1']->right_node);
                    if (!empty($response['level2'][1]->left_node)) {
                        $response['level3'][1] = $this->User_model->get_tree_user($response['level2'][1]->left_node);
                        if (!empty($response['level3'][1]->left_node)) {
                            $response['level4'][1] = $this->User_model->get_tree_user($response['level3'][1]->left_node);
                        } else {
                            $response['level4'][1] = array();
                        }
                        if (!empty($response['level3'][1]->right_node)) {
                            $response['level4'][2] = $this->User_model->get_tree_user($response['level3'][1]->right_node);
                        } else {
                            $response['level4'][2] = array();
                        }
                    } else {
                        $response['level3'][1] = array();
                        $response['level4'][1] = array();
                        $response['level4'][2] = array();
                    }
                    if (!empty($response['level2'][1]->right_node)) {
                        $response['level3'][2] = $this->User_model->get_tree_user($response['level2'][1]->right_node);
                        if (!empty($response['level3'][2]->left_node)) {
                            $response['level4'][3] = $this->User_model->get_tree_user($response['level3'][2]->left_node);
                        } else {
                            $response['level4'][3] = array();
                        }
                        if (!empty($response['level3'][2]->right_node)) {
                            $response['level4'][4] = $this->User_model->get_tree_user($response['level3'][2]->right_node);
                        } else {
                            $response['level4'][4] = array();
                        }
                    } else {
                        $response['level3'][2] = array();
                        $response['level4'][3] = array();
                        $response['level4'][4] = array();
                    }
                    if (!empty($response['level2'][2]->left_node)) {
                        $response['level3'][3] = $this->User_model->get_tree_user($response['level2'][2]->left_node);
                        if (!empty($response['level3'][3]->left_node)) {
                            $response['level4'][5] = $this->User_model->get_tree_user($response['level3'][3]->left_node);
                        } else {
                            $response['level4'][5] = array();
                        }
                        if (!empty($response['level3'][3]->right_node)) {
                            $response['level4'][6] = $this->User_model->get_tree_user($response['level3'][3]->right_node);
                        } else {
                            $response['level4'][6] = array();
                        }
                    } else {
                        $response['level3'][3] = array();
                        $response['level4'][5] = array();
                        $response['level4'][6] = array();
                    }
                    if (!empty($response['level2'][2]->right_node)) {
                        $response['level3'][4] = $this->User_model->get_tree_user($response['level2'][2]->right_node);
                        if (!empty($response['level3'][4]->left_node)) {
                            $response['level4'][7] = $this->User_model->get_tree_user($response['level3'][4]->left_node);
                        } else {
                            $response['level4'][7] = array();
                        }
                        if (!empty($response['level3'][4]->right_node)) {
                            $response['level4'][8] = $this->User_model->get_tree_user($response['level3'][4]->right_node);
                        } else {
                            $response['level4'][8] = array();
                        }
                    } else {
                        $response['level3'][4] = array();
                        $response['level4'][7] = array();
                        $response['level4'][8] = array();
                    }
                } else {
                    $response['level1'] = [];
                }
                // $response['level2'][1]['placement'] = 0;
                // $response['level2'][2]['placement'] = 0;
                // $response['level3'][1]['placement'] = 0;
                // $response['level3'][4]['placement'] = 0;
                // $response['level4'][1]['placement'] = 0;
                // $response['level4'][8]['placement'] = 0;
                if (!empty($response['level2'][1])) {
                    if (!empty($response['level3'][1])) {
                        if (empty($response['level4'][1])) {
                            $response['level4'][1]['placement'] = 1;
                        }
                    } else {
                        $response['level3'][1]['placement'] = 1;
                    }
                } else {
                    $response['level2'][1]['placement'] = 1;
                }
                if (!empty($response['level2'][2])) {
                    if (!empty($response['level3'][4])) {
                        if (empty($response['level4'][8])) {
                            $response['level4'][8]['placement'] = 1;
                        }
                    } else {
                        $response['level3'][4]['placement'] = 1;
                    }
                } else {
                    $response['level2'][2]['placement'] = 1;
                }
            } else {
                $response['validate_user'] = 0;
            }

            // pr($response,true);
            $this->load->view('gonology-tree', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
//     public function Pool($user_id,$pool_id) {
//         if (is_logged_in()) {
//             $response = array();
//             $response['pool_id'] = $pool_id;
//             $response['user'] = $this->User_model->get_single_record('tbl_pool', array('user_id' => $user_id , 'pool_level' => $pool_id), '*');
//             $response['users'] = $this->User_model->get_records('tbl_pool', array('upline_id' => $user_id, 'pool_level' => $pool_id), '*');
//             foreach($response['users'] as $key => $directs){
//                 $response['users'][$key]['user_info'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $directs['user_id']), 'id,user_id,sponser_id,role,name,first_name,last_name,email,phone,paid_status,created_at');
//                 $response['users'][$key]['level_2'] = $this->User_model->get_records('tbl_pool', array('upline_id' => $directs['user_id'], 'pool_level' => $pool_id), '*');
//             }
// //            pr($response,true);
//             $this->load->view('pool', $response);
//         } else {
//             redirect('Dashboard/User/login');
//         }
//     }

    public function Genelogy() {
        if (is_logged_in()) {
            $response = array();
            //$response['directs'] = $this->User_model->get_records('tbl_users', array('sponser_id' => $this->session->userdata['user_id']), 'id,user_id,name,sponser_id');
            $response['directs'] = $this->User_model->get_records('tbl_users', array('sponser_id' => $this->session->userdata['user_id']), 'id,user_id,name,sponser_id');
            $this->load->view('genelogy', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function genelogy_users($user_id) {
        if (is_logged_in()) {
            $response = array();
            $response['directs'] = $this->User_model->get_records('tbl_users', array('sponser_id' => $user_id), 'id,user_id,name,sponser_id');
            echo json_encode($response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function image_upload() {
        if (is_logged_in()) {
            $response = array();
            $data = $_POST['image'];
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);

            $data = base64_decode($data);
            $imageName = time() . '.png';
            file_put_contents(APPPATH . '../uploads/' . $imageName, $data);
            $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), array('image' => $imageName));
            $response['message'] = 'Image uploaed Succesffully';
            echo json_encode($response);
            exit();
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function get_states($country_id) {
        $countries = $this->User_model->get_records('states', array('country_id' => $country_id), '*');
        echo json_encode($countries);
    }

    public function get_city($state_id) {
        $countries = $this->User_model->get_records('cities', array('state_id' => $state_id), '*');
        echo json_encode($countries);
    }
    public function get_user($user_id) {
        $response = array();
        $response['success'] = 0;
        $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), 'id,user_id,sponser_id,role,name,first_name,last_name,email,phone,paid_status,created_at');
        if(!empty($user)){
            echo $user['name'];
        }else{
            echo 'User Not Found';
        }
    }

    public function test_rollup() {
        $this->rollup_personal_business($sponser_id = 'SG10008', $amount = '897', $share = 4, $sender_id = 'SG10015', 24);
    }

    public function credit_income($user_id, $amount, $type, $description) {
        $incomeArr = array(
            'user_id' => $user_id,
            'amount' => $amount,
            'type' => $type,
            'description' => $description,
        );
        $this->User_model->add('tbl_income_wallet', $incomeArr);
    }

    public function Validate_promo_code($code) {
        $res = array();
        $res['success'] = 0;
        $promo_code = $this->User_model->get_single_record('tbl_promo_codes', array('promo_code' => $code), '*');
        if (!empty($promo_code)) {
            $res['message'] = 'Promo Code Validated Now ' . $promo_code['discount'] . ' % Discount is Applied';
            $res['success'] = 1;
        } else {
            $res['message'] = 'Invalid Promo Code';
        }
        echo json_encode($res);
    }
    public function check_sponser($user_id) {
        $res = array();
        $res['success'] = 0;
        $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), 'id,user_id,name');
        if (!empty($user)) {
            $res['message'] = 'User Found';
            $res['user'] = $user;
            $res['success'] = 1;
        } else {
            $res['message'] = 'Invalid User ID';
        }
        echo json_encode($res);
    }

    public function send_email($email = '349kuldeep@gmail.com', $subject = "Security Alert", $message = 'hello i am here') {
        date_default_timezone_set('Asia/Singapore');
        $this->load->library('email');
        $this->email->from('info@dway.com', 'DwaySwotfish');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();
    }
    public function addBalance() {
        if (is_logged_in()) {
            $response = array();
            $user_id = $this->session->userdata['user_id'];
            $response['data_retrieve'] = $this->User_model->get_single_record('btc_txn', array('user_id' => $user_id, 'status' => 0), 'count(id) as ids');
            if ($response['data_retrieve']['ids'] > 0) {
                header('Location: ' . base_url() . 'Dashboard/User/payBalance');
            }
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                if ($data['amount'] >= 2) {
//                    pr($data,true);
                    if ($data['coin'] != 'BTC' || $data['coin'] != 'ETH' || $data['coin'] != 'LTC' || $data['coin'] != 'BCH') {
                        $get = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), 'name,email');
                        $address = $this->Test($orignal = 'USD', $data['coin'], $user_id, $get['name'], $data['amount'], $get['email']);
                        if ($address['error'] == 'ok') {
                            $save['user_id'] = $user_id;
                            $save['txn_id'] = $address['result']['txn_id'];
                            $save['orignal_amount'] = $data['amount'];
                            $save['amount'] = $address['result']['amount'];
                            $save['address'] = $address['result']['address'];
                            $save['timeout'] = $address['result']['timeout'];
                            $save['checkout_url'] = $address['result']['checkout_url'];
                            $save['status_url'] = $address['result']['status_url'];
                            $save['qrcode_url'] = $address['result']['qrcode_url'];
                            $save['coin'] = $data['coin'];
                            $this->User_model->add('btc_txn', $save);
                            header('Location: ' . base_url() . '/Dashboard/User/payBalance');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Coin Error');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Minimum Amount $25');
                }
            }
            $this->load->view('addBalance', $response);
        }
    }
    public function payment_repsponse($tax_id){
            $payment = $this->User_model->get_single_record('btc_txn', array('txn_id' => $tax_id), 'user_id,coin,amount');
            $public_key = '6558f7dd0083c5493d87ced47b96a60d53b29fbe1e450a4c41b85a6d3f174c74';
            $private_key = '6dbACd8be6ade0ACDf622f1067275B2F8e0e76f8E1d9D93e0a4d3b00F437A2d0';
            $req['version'] = 1;
            $req['cmd'] = 'get_tx_info';
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
            pr($data2);
    }
    public function payBalance() {
        if (is_logged_in()) {
            $user_id = $this->session->userdata['user_id'];
            $response1['data_retrieve'] = $this->User_model->get_single_record('btc_txn', array('user_id' => $user_id, 'status' => 0), 'count(id) as ids');
            // pr($response1);
            if ($response1['data_retrieve']['ids'] == 0) {
                header('Location: ' . base_url() . 'Dashboard/User/addBalance');
            }
            $response['data_retrieve'] = $this->User_model->get_limit_records('btc_txn', array('user_id' => $user_id, 'status' => 0), '*', '1', '0');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                if ($data['status'] == 3) {
                    $value['status'] = '3';
                    $updres = $this->User_model->update('btc_txn', array('user_id' => $user_id, 'status' => 0), $value);
                    header('Location: ' . base_url() . 'Dashboard/User/addBalance');
                }
            }
            $this->load->view('payBalance', $response);
        }
    }

    public function addBalanceHistory() {
        if (is_logged_in()) {
            $response = array();
            $response['requests'] = $this->User_model->get_records('btc_txn', array('user_id' => $this->session->userdata['user_id']), '*');
            $this->load->view('addBalanceHistory', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function Test($currency1, $currency2, $user_id, $name, $amount, $email) {
        $public_key = '6558f7dd0083c5493d87ced47b96a60d53b29fbe1e450a4c41b85a6d3f174c74';
        $private_key = '6dbACd8be6ade0ACDf622f1067275B2F8e0e76f8E1d9D93e0a4d3b00F437A2d0';

        // Set the API command and required fields
        $req['version'] = 1;
        $req['amount'] = $amount;
        $req['currency1'] = $currency1;
        $req['currency2'] = $currency2;
        $req['buyer_email'] = $email;
        $req['buyer_name'] = 'User ID ' . $user_id . ', Name ' . $name;
        $req['item_name'] = '' . $amount . ' USD Added Request';
        $req['cmd'] = 'create_transaction';
        $req['key'] = $public_key;
        $req['currency'] = $currency2;
        // $req['user_id'] = $user_id;
        $req['format'] = 'json'; //supported values are json and xml
        // Generate the query string
        $post_data = http_build_query($req, '', '&');

        // Calculate the HMAC signature on the POST data
        $hmac = hash_hmac('sha512', $post_data, $private_key);

        // Create cURL handle and initialize (if needed)
        static $ch = NULL;
        if ($ch === NULL) {
            $ch = curl_init('https://www.coinpayments.net/api.php');
            curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: ' . $hmac));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        // Execute the call and close cURL handle
        $data = curl_exec($ch);
        $data2 = json_decode($data, true);
        // pr($data2,true);
        return $data2;
    }
    public function get_coins_prices(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://unl.finance/api/coin_stats",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZDU3YTIxMGNkZGVkYjYwNGMwNDg2NWIxNjJhMjg5NmRhNDNlZGNlYmVlOWUwNmM1ZjZmNjExZDk0MDQzOTdlMTQxMTUwMzljMmI3MWNiNGEiLCJpYXQiOjE2MDA4Nzg4NjcsIm5iZiI6MTYwMDg3ODg2NywiZXhwIjoxNjMyNDE0ODY3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ArmBCO2KkEg_A-vWkgfuNQlROCxzLYj7x4n2xI-e360BcMt3yDGJ2-4kvFj8P6d7mHBuC4X273UxnI_P1u_Q1-x_LzVDGBco9eKUig4ZR5vxYBNSl2eQ367MTvAQ-4fglzuDNSx_QoanYBYe0caCHZ6DuTD95gKVOB4Yn7zetyDdvDzXgizEUykN_P8NEVguebEYyWKaG51sQtOdxpLiDtKuWU8o1tNIO6Lu-dXv0kOIuwxjR-t4EJJ0t5hONZcTP61wsy6gkoAlbbMPI5ONh_YeZI1qwahnlIq57_lQdfl24SCT3mPE0tS1VdhZ7OQNXxUMSzDWvPOk6DYDGEcvT6oLnKoW4qqwCi8kifY87ClgOmnhR9e-6X7blKzZmjfiPxb0Xuv07RbvfI_cp8dlQ_q_yKWObOb32dJGLjyNiiqeLqfhZGGtXLv0fRxVS7VrHGJ9bOietxL6qVueF2ZGPv0kfu_FfpOKmPlf6zirbV42P1JGz1PtOnCG8xzIN_JIS-nNfZgb9syd18GqYIdEEIvYacgN90CYd4Y_ss108OjIB77dO7hlMGXEFgbkMXOCkWNIdhfb1OLJirg-0VI3X-0IUsQtjBciOKzHsWiSufXaqXNRkgF0Nu2h80aTIAYAfCdnTiWNI27zvQDAg_0qImESmrzUc437ZWN7CcfARbc",
            "cache-control: no-cache",
            "postman-token: 61ff1e31-6671-f1a7-dfc0-dabfd794949a"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        $coins = (json_decode($response,true));
        $html = '';
        foreach($coins['success'] as $key => $coin){
            $html .= '<li><i class="cc '.$coin['currency'].'"></i> '.$coin['currency'].' <span class="text-yellow"> $'.$coin['price'].'</span></li>';
        }
        echo $html;
        // echo $response;

        }
    }
    public function get_coin_prices(){
        $curl = curl_init();
        $html ='';
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.nomics.com/v1/currencies/ticker?key=demo-26240835858194712a4f8cc0dc635c7a&ids=BTC%2CETH%2CGAME%2CLBC%2CNEO%2CSTE%2CLIT%2CNOTE%2CMINT%2CIOT%2CDAS&interval=1d%2C30d&convert=USD",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: 4982dc17-cbab-bbcc-6a85-8d1a16f9abb0"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $products = (json_decode($response,true));
            // pr($products);
            foreach($products  as $key => $data){
                $coins[$key]['currency'] = $data['currency'];
                $coins[$key]['name'] = $data['name'];
                $coins[$key]['logo_url'] = $data['logo_url'];
                $coins[$key]['price'] = $data['price'];
                $coins[$key]['price_date'] = $data['price_date'];
                // $coins[$key]['rank'] = $data['rank'];
                $coins[$key]['status'] = $data['status'];
                $html .= '<li><i class="cc '.$data['currency'].'"></i> '.$data['currency'].' <span class="text-yellow"> $'.$data['price'].'</span></li>';
            }
            // echo $html;
            return $coins;
        }
    }

    public function Pool($user_id) {
        if (is_logged_in()) {
            $response = array();
            // if($level == 1){$table = 'tbl_pool';}elseif($level = 2){$table = 'tbl_pool2';}elseif($level = 3){$table = 'tbl_pool3';}elseif($level = 4){$table = 'tbl_pool4';}elseif($level = 5){$table = 'tbl_pool5';}elseif($level = 6){$table = 'tbl_pool6';}elseif($level = 7){$table = 'tbl_pool7';}
            $table = 'tbl_pool';
            $response['user'] = $this->User_model->get_single_record($table, array('user_id' => $user_id) ,'*');
            $response['users'] = $this->User_model->get_records($table, array('upline_id' => $user_id), '*');
            foreach ($response['users'] as $key => $directs) {
                $response['users'][$key]['user_info'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $directs['user_id']), 'id,user_id,sponser_id,role,name,first_name,last_name,email,phone,paid_status,created_at');
                $response['users'][$key]['l2'] = $this->User_model->get_records($table, array('upline_id' => $directs['user_id']), 'id,user_id');
            }
            // pr($response,true);
            $this->load->view('pool', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }    

}
