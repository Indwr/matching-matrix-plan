<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
        $this->load->model(array('User_model'));
        $this->load->helper(array('user', 'birthdate', 'security', 'email'));
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index() {
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
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $this->load->view('register', $response);
            }else{
                $sponser_id = $this->input->post('sponser_id');
                $phone = $this->input->post('phone');
                $response['sponser_id'] = $sponser_id;
                $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $sponser_id), '*');
                if(!empty($sponser)){
                    $id_number = $this->getUserIdForRegister();
                    $userData['user_id'] =  $id_number;
                    $userData['sponser_id'] = $sponser_id;
                    $userData['name'] = $this->input->post('name');
                    $userData['phone'] = $this->input->post('phone');
                    $userData['password'] = rand(100000,999999);
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
                        //notify_user($userData['user_id'] , $sms_text);
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
            }
        }else{
            $this->load->view('register', $response);
        }
    }

    public function index12355(){
        $response = array();
        if($this->input->server("REQUEST_METHOD") == "POST"){
            $data = $this->security->xss_clean($this->input->post());
            $this->form_validation->set_rules('sponser_id', 'Sponser ID', 'trim|required|xss_clean');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('position', 'Position', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean');
            $this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
            if($this->form_validation->run() != false){
                $checkEmail = $this->User_model->get_single_record('tbl_users',['email' => $data['email']],'email');
                $checkPhone = $this->User_model->get_single_record('tbl_users',['phone' => $data['phone']],'phone');
                if(empty($checkEmail['email'])){
                    if(empty($checkPhone['phone'])){
                        $id_number = $this->getUserIdForRegister();  
                        $this->session->set_tempdata("user_id", $id_number,1200);
                        $this->session->set_tempdata("sponser_id", $data['sponser_id'],120);
                        $this->session->set_tempdata("name", $data['name'],120);
                        $this->session->set_tempdata("phone", $data['phone'],120);
                        $this->session->set_tempdata("password",rand(100000,999999),120);
                        $this->session->set_tempdata("master_key",rand(100000,999999),120);
                        $this->session->set_tempdata("position",$data['position'],120);
                        $this->session->set_tempdata("last_left",$id_number,120);
                        $this->session->set_tempdata("last_right",$id_number,120);
                        $this->session->set_tempdata("email",$data['email'],120);
                        $this->session->set_tempdata("country",$data['country'],120);
                        $this->session->set_tempdata("accountType",$data['accountType'],120);
                        $this->session->set_tempdata("package_id",$data['package_id'],120);
                        $this->registers($this->session->tempdata());
                        redirect('Dashboard/Register/unlGateway');
                        exit;
                        //pr($this->session->tempdata());
                        die('here');
                    }else{
                        $this->session->set_flashdata('message','This Phone Number already exists,please try another');
                    }
                }else{
                    $this->session->set_flashdata('message','This Email Address already exists,please try another');
                }
            }else{
                $this->session->set_flashdata('message',validation_errors());
            }
        }
        $sponser_id = $this->input->get('sponser_id');
        if($sponser_id == ''){
            $sponser_id = '';
        }
        $response['countries'] = $this->User_model->get_records('countries', array(), '*');
        $response['sponser_id'] = $sponser_id;
        $response['package'] = $this->User_model->get_records('tbl_package', array(), '*');
        $this->load->view('register_paid', $response);
        
    }

    public function coinpayment(){
        $response = array();
        if($this->input->server("REQUEST_METHOD") == "POST"){
            $data = $this->security->xss_clean($this->input->post());
            $this->form_validation->set_rules('sponser_id', 'Sponser ID', 'trim|required|xss_clean');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('position', 'Position', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|xss_clean');
            $this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
            if($this->form_validation->run() != false){
                $checkEmail = $this->User_model->get_single_record('tbl_users',['email' => $data['email']],'email');
                $checkPhone = $this->User_model->get_single_record('tbl_users',['phone' => $data['phone']],'phone');
                if(empty($checkEmail['email'])){
                    if(empty($checkPhone['phone'])){
                        $id_number = $this->getUserIdForRegister();  
                        $this->session->set_tempdata("user_id", $id_number,1200);
                        $this->session->set_tempdata("sponser_id", $data['sponser_id'],1200);
                        $this->session->set_tempdata("name", $data['name'],1200);
                        $this->session->set_tempdata("phone", $data['phone'],1200);
                        $this->session->set_tempdata("password",rand(100000,999999),1200);
                        $this->session->set_tempdata("master_key",rand(100000,999999),1200);
                        $this->session->set_tempdata("position",$data['position'],1200);
                        $this->session->set_tempdata("last_left",$id_number,1200);
                        $this->session->set_tempdata("last_right",$id_number,1200);
                        $this->session->set_tempdata("email",$data['email'],1200);
                        $this->session->set_tempdata("country",$data['country'],1200);
                        $this->register($this->session->tempdata());
                        redirect('Dashboard/Register/coinpaymentform/'.$data['package_id']);
                        exit;
                        die('here');
                    }else{
                        $this->session->set_flashdata('message','This Phone Number already exists,please try another');
                    }
                }else{
                    $this->session->set_flashdata('message','This Email Address already exists,please try another');
                }
            }else{
                $this->session->set_flashdata('message',validation_errors());
            }
        }
        $sponser_id = $this->input->get('sponser_id');
        if($sponser_id == ''){
            $sponser_id = '';
        }
        $response['countries'] = $this->User_model->get_records('countries', array(), '*');
        $response['sponser_id'] = $sponser_id;
        $response['package'] = $this->User_model->get_records('tbl_package', array(), '*');
        $this->load->view('register_paid2', $response);
        
    }

    // public function unlGateway(){
    //     if(!empty($this->session->tempdata())){
    //         $response['package'] = $this->User_model->get_single_record('tbl_package',['id' => $this->session->tempdata('package_id')],'price');
    //         $this->load->view('unlgateway',$response);
    //     }else{
    //         redirect('Dashboard/Register');
    //     }
    // }

    public function unlGateway(){
        if(!empty($this->session->tempdata('user_id'))){
            if($this->input->server("REQUEST_METHOD") == "POST"){
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('utr','UTR Number','trim|required');
                if($this->form_validation->run() != false){
                    $checkUTR = $this->User_model->get_single_record('tbl_temp_users',['utr_number' => $data['utr']],'utr_number');
                    if(empty($checkUTR['utr_number'])){
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['max_size'] = 2048;
                        $config['file_name'] = 'token_slip'.time();
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('image')){
                            $this->session->set_flashdata('message',$this->upload->display_errors());
                        }else{
                            $fileData = array('upload_data' => $this->upload->data());
                            $userData = [
                                'utr_number' => $data['utr'],
                                'image' => $fileData['upload_data']['file_name'],
                            ];
                            $res = $this->User_model->update('tbl_temp_users',['user_id' => $this->session->tempdata('user_id')],$userData);
                            if($res){
                                $this->session->set_flashdata('message','Your request submitted successfully');
                            }else{
                                $this->session->set_flashdata('message','Network error,Please try later');
                            }
                        }
                    }else{
                        $this->session->set_flashdata('message','This UTR Number already exists');
                    }
                }
            }
            $response['package'] = $this->User_model->get_single_record('tbl_package',['id' => $this->session->tempdata('package_id')],'price');
            $this->load->view('unlgateway',$response);
        }else{
            redirect('Dashboard/Register');
        }
    }

    public function coinpaymentform($pack){
        $response['package'] = $this->User_model->get_single_record('tbl_package',['id' => $pack],'*');
        if(!empty($response['package']['price'])){
            $this->load->view('coinpayment_form',$response);
        }else{
            die('Server error,please try again');
        }
    }

    private function getUserIdForRegister() {
        $user_id = idPrefix .''. rand(10000, 99999);
        $sponser = $this->User_model->get_single_record('tbl_users', array('user_id' => $user_id), 'user_id,name');
        if (!empty($sponser)) {
            $this->getUserIdForRegister();
        } else {
            return $user_id;
        }
    }

    public function coinbaseGateway($id){
        if(!empty($this->session->tempdata())){
            $user_id = $this->session->tempdata('user_id');
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
            $this->User_model->add('tbl_coinbase_transactions', ['user_id' => $user_id , 'checkout' => $response['data']['id'],'data' => $amount,'trans_type' => '1']);
            curl_close($curl);
            $response['amount'] = $amount;
            $this->load->view('addBalanceCoinBase',$response);
        }else{
            redirect('Dashboard/Register');
        }
    }
    
    private function registers($data){
        $sponser = $this->User_model->get_single_record('tbl_users',['user_id' => $data['sponser_id']],'*');
        $userData['user_id'] =  $data['user_id'];
        $userData['sponser_id'] = $data['sponser_id'];
        $userData['name'] = $data['name'];
        $userData['phone'] = $data['phone'];
        $userData['password'] = $data['password'];;
        $userData['position'] = $data['position'];;
        $userData['last_left'] = $userData['user_id'];
        $userData['last_right'] = $userData['user_id'];
        $userData['email'] = $data['email'];
        $userData['country'] = $data['country'];
        $userData['master_key'] = $data['master_key'];
        $userData['accountType'] = $data['accountType'];
        $userData['package_id'] = $data['package_id'];
        $this->User_model->add('tbl_temp_users', $userData); 
        // if($userData['position'] == 'L'){
        //     $userData['upline_id'] = $sponser['last_left'];
        // }else{
        //     $userData['upline_id'] = $sponser['last_right'];
        // }
        // $res = $this->User_model->add('tbl_users', $userData);
        // $res = $this->User_model->add('tbl_bank_details',array('user_id' => $userData['user_id'] ));
        // if ($res) {
        //     if ($userData['position'] == 'R') {
        //         $this->User_model->update('tbl_users', array('last_right' => $userData['upline_id']), array('last_right' => $userData['user_id']));
        //         $this->User_model->update('tbl_users', array('user_id' => $userData['upline_id']), array('right_node' => $userData['user_id']));
        //     } elseif ($userData['position'] == 'L') {
        //         $this->User_model->update('tbl_users', array('last_left' => $userData['upline_id']), array('last_left' => $userData['user_id']));
        //         $this->User_model->update('tbl_users', array('user_id' => $userData['upline_id']), array('left_node' => $userData['user_id']));
        //     }
        //     $this->add_counts($userData['user_id'], $userData['user_id'], 1);
        //     $this->add_sponser_counts($userData['user_id'],$userData['user_id'], $level = 1);
        //     $sms_text = 'Dear ' .$userData['name']. ', Your Account Successfully created. User ID :  ' . $userData['user_id'] . ' Password :' . $userData['password'] . ' Transaction Password:' .$userData['master_key'] . base_url();
        //     sendMail($userData['email'],$sms_text,'Registration Alert');
        //     notify_user($userData['user_id'] , $sms_text);
        // }
    }

    public function emptyData(){
        $this->User_model->delete('tbl_users',['id !=' => 1]);
        $this->User_model->delete('tbl_bank_details',['id !=' => 1]);
        $this->User_model->delete('	tbl_downline_business',['id !=' => '']);
        $this->User_model->delete('tbl_downline_count',['id !=' => '']);
        $this->User_model->delete('tbl_income_wallet',['id !=' => '']);
        $this->User_model->delete('tbl_point_matching_income',['id !=' => '']);
        $this->User_model->delete('tbl_pool',['id !=' => 1]);
        $this->User_model->delete('tbl_sponser_count',['id !=' => '']);
        $this->User_model->delete('tbl_user_units',['id !=' => '']);
        $this->User_model->delete('tbl_wallet',['id !=' => '']);
        $this->User_model->delete('tbl_roi',['id !=' => '']);
        $this->User_model->update('tbl_users',['id' => '1'],['left_node' => '','right_node' => '','last_left' => 'admin','last_right' => 'admin','left_count' => 0,'right_count' => 0,'leftPower' => 0,'rightPower' => 0,'directs' => 0]);
        $this->User_model->update('tbl_pool',['id' => '1'],['down_count' => 0,'team' => 0]);
        echo 'Done';
    }

    public function runCron(){
        die;
        $limit = $this->User_model->get_single_record('tbl_users',['position' => 'R'],'count(id) as record');
        $newlimit = $limit['record'] + 10;
        $user = $this->User_model->get_records('tbl_users',"user_id != '' order by id ASC LIMIT ".$limit['record'].",10",'user_id');
        foreach($user as $u){
            //$this->registerCron($u['user_id'],$newlimit);
        }
        //pr($user);
    }

    private function registerCron($user,$limit){
        die;
        ini_set('max_execution_time',0);
        $users = $this->User_model->get_single_record('tbl_users',['position' => 'R'],'count(id) as record');
        //$users = $this->User_model->get_single_record('tbl_users',[],'count(id) as record');
        if($users['record'] <= $limit){
            $check = $this->User_model->get_records('tbl_users'," sponser_id = '".$user."' GROUP by position ORDER BY id ASC",'*');
            $count = count($check);
            //if($count == 0){
                $id_number = $this->getUserIdForRegister(); 
                $this->rightLeg($user,$id_number);
            //}
            //if($count == 1){
                // $id_number = $this->getUserIdForRegister(); 
                // $this->rightLeg($user,$id_number);
            //}
            $this->registerCron($id_number,$limit);
        }else{
            echo $users['record'].' is registered';
        }
    }

    private function leftLeg($sponser_id,$user_id){        
        $data['user_id'] = $user_id;
        $data['sponser_id'] = $sponser_id;
        $data['name'] = 'ekprayas';
        $data['phone'] = '1234567980';
        $data['password'] = rand(100000,999999);
        $data['master_key'] = rand(100000,999999);
        $data['position'] = 'L';
        $data['last_left'] = $user_id;
        $data['last_right'] = $user_id;
        $data['email'] = 'admin@gmail.com';
        $data['country'] = 'india';
        $this->register($data);
    }

    private function rightLeg($sponser_id,$user_id){  
        $data['user_id'] = $user_id;
        $data['sponser_id'] = $sponser_id;
        $data['name'] = 'ekprayas';
        $data['phone'] = '1234567980';
        $data['password'] = rand(100000,999999);
        $data['master_key'] = rand(100000,999999);
        $data['position'] = 'R';
        $data['last_left'] = $user_id;
        $data['last_right'] = $user_id;
        $data['email'] = 'admin@gmail.com';
        $data['country'] = 'india';
        $this->register($data);
    }

    private function register($data){
        $sponser = $this->User_model->get_single_record('tbl_users',['user_id' => $data['sponser_id']],'*');
        $userData['user_id'] =  $data['user_id'];
        $userData['sponser_id'] = $data['sponser_id'];
        $userData['name'] = $data['name'];
        $userData['phone'] = $data['phone'];
        $userData['password'] = $data['password'];;
        $userData['position'] = $data['position'];;
        $userData['last_left'] = $userData['user_id'];
        $userData['last_right'] = $userData['user_id'];
        $userData['email'] = $data['email'];
        $userData['country'] = $data['country'];
        $userData['master_key'] = $data['master_key'];
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
            echo 'Account Created successfully<br>';
            // sendMail($userData['email'],$sms_text,'Registration Alert');
            // notify_user($userData['user_id'] , $sms_text);
        }
    }

    private function add_counts($user_name , $downline_id , $level) {
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

    private function add_sponser_counts($user_name, $downline_id, $level) {
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

    private function update_business($user_name, $downline_id, $level = 1, $business = '40', $type = 'topup') {
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

    private function level_income($sponser_id, $activated_id, $package_income) {
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
}
?>