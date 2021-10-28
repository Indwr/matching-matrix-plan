<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email','pagination'));
        // $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
        $this->load->model(array('Main_model'));
        $this->load->helper(array('admin', 'security'));
    }

    public function index() {
        if (is_admin()) {
            $response = array();
            $response['tasks'] = $this->Main_model->get_records('tbl_task_links', array(), '*');
            $this->load->view('task_list', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function Create() {
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('link', 'Link', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $tasks = $this->Main_model->get_single_record('tbl_task_links', array(), 'ifnull(count(id),0)  as total_links');
                    if($tasks['total_links'] < 15){
                        $TaskData = array(
                            'link' => $data['link'],
                        );
                        $this->Main_model->add('tbl_task_links', $TaskData);
                        $this->session->set_flashdata('message', 'Task Created Successfully');
                    }else{
                        $this->session->set_flashdata('message', '15 Tasks Already Created');
                    }
                }
            }
            $this->load->view('create_task', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function Edit($task_id) {
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('link', 'Link', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $updtask =  $updres = $this->Main_model->update('tbl_task_links', array('id' => $task_id), array('link' => $data['link']));
                    if ($updres == true) {
                        $this->session->set_flashdata('message', 'Task Updated Successfully');
                    }else{
                        $this->session->set_flashdata('message', 'Error while Updating Task');
                    }
                }
            }
            $response['task'] = $this->Main_model->get_single_record('tbl_task_links', array('id' => $task_id), '*');
            $this->load->view('edit_task', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    // public function silverClub(){
    //     if(is_admin()){
    //         $response['header'] = 'Silver Club';
    //         $response['headerMenu'] = '#,User ID,Left Power,Right Power';
    //         $response['users'] = $this->Main_model->get_records('tbl_users',['paid_status >' => 0,'leftPower >=' => '2500','rightPower >=' => '2500'],'user_id,leftPower,rightPower');
    //         $this->load->view('clubReport', $response);
    //     } else {
    //         redirect('Admin/Management/login');
    //     }
    // }
    public function silverClub(){
        if(is_admin()){
            $response['header'] = 'Silver Club';
            $response['headerMenu'] = '#,User ID,Left Power,Right Power';
            $get = $this->Main_model->get_records('tbl_users',['directs >=' => 10],'user_id');
            foreach ($get as $key => $value) {
                $left = $this->Main_model->get_single_record('tbl_users', array('sponser_id' => $value['user_id'], 'position' => "L", 'paid_status >' => 0), 'count(id) as ids');
                if($left['ids'] >= 5){
                    $right = $this->Main_model->get_single_record('tbl_users', array('sponser_id' => $value['user_id'], 'position' => "R", 'paid_status >' => 0), 'count(id) as ids');
                    if($right['ids'] >= 5){
                       $data[] = $this->Main_model->get_single_record('tbl_users','user_id = "'.$value['user_id'].'"','user_id,leftPower,rightPower');
                    }
                }
            }
           if(!empty($data)){
                $response['users'] = $data;
            }
            
           $this->load->view('clubReport', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    // public function GoldClub(){
    //     if(is_admin()){
    //         $response['header'] = 'Gold Club';
    //         $response['headerMenu'] = '#,User ID,Left Power,Right Power';
    //         $response['users'] = $this->Main_model->get_records('tbl_users',['paid_status >' => 0,'leftPower >=' => '5000','rightPower >=' => '5000'],'user_id,leftPower,rightPower');
    //         $this->load->view('clubReport', $response);
    //     } else {
    //         redirect('Admin/Management/login');
    //     }
    // }

    public function GoldClub(){
        if(is_admin()){
            $response['header'] = 'Gold Club';
            $response['headerMenu'] = '#,User ID,Left Power,Right Power';
            $get = $this->Main_model->get_records('tbl_users',['directs >=' => 20],'user_id');
            foreach ($get as $key => $value) {
                $left = $this->Main_model->get_single_record('tbl_users', array('sponser_id' => $value['user_id'], 'position' => "L", 'paid_status >' => 0), 'count(id) as ids');
                if($left['ids'] >= 10){
                    $right = $this->Main_model->get_single_record('tbl_users', array('sponser_id' => $value['user_id'], 'position' => "R", 'paid_status >' => 0), 'count(id) as ids');
                    if($right['ids'] >= 10){
                       $data[] = $this->Main_model->get_single_record('tbl_users','user_id = "'.$value['user_id'].'"','user_id,leftPower,rightPower');
                    }
                }
            }
            if(!empty($data)){
                $response['users'] = $data;
            }
            
           $this->load->view('clubReport', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function rewards(){
        if(is_admin()){
            if($this->input->server("REQUEST_METHOD") == "POST"){
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('id','ID','trim|required');
                $this->form_validation->set_rules('status','Status','trim|required');
                if($this->form_validation->run() != false){
                    $check = $this->Main_model->get_single_record('tbl_rewards',['id' => $data['id']],'*');
                    if($check['status'] == 0){
                        $res = $this->Main_model->update('tbl_rewards',['id' => $data['id']],['status' => $data['status']]);
                        if($data['status'] == 1){
                            $msg = 'approved';
                            $IncomeData = [
                                'user_id' => $check['user_id'],
                                'amount' => $check['amount'],
                                'type' => 'royalty_income',
                                'description' => 'Reward Income',
                            ];
                            //pr($IncomeData);
                            $this->Main_model->add('tbl_income_wallet',$IncomeData);
                        }else{
                            $msg = 'rejected';
                        }
                        if($res){
                            $this->session->set_flashdata('message','Reward '.$msg.' successfully');
                            redirect('Admin/Task/rewards');
                        }else{
                            $this->session->set_flashdata('message','Network error,Please try later');
                        }
                    }else{
                        $this->session->set_flashdata('message','This reward request is already processed');
                    }
                }
            }
            $response['rewards'] = $this->Main_model->get_records('tbl_rewards',['status' => 0],'*');
            foreach ($response['rewards'] as $key => $value) {
                $response['rewards'][$key]['userInfo'] = $this->Main_model->get_single_record('tbl_users',['user_id' => $value['user_id']],'name');
            }
            $this->load->view('rewardList',$response);
        }else{
            redirect('Admin/Management/login');
        }
    }

    public function approvedrewards(){
        if(is_admin()){
            $response['rewards'] = $this->Main_model->get_records('tbl_rewards',['status' => 1],'*');
            foreach ($response['rewards'] as $key => $value) {
                $response['rewards'][$key]['userInfo'] = $this->Main_model->get_single_record('tbl_users',['user_id' => $value['user_id']],'name');
            }
            $this->load->view('rewardList',$response);
        }else{
            redirect('Admin/Management/login');
        }
    }

    public function rejectedrewards(){
        if(is_admin()){
            $response['rewards'] = $this->Main_model->get_records('tbl_rewards',['status' => 2],'*');
            $this->load->view('rewardList',$response);
        }else{
            redirect('Admin/Management/login');
        }
    }

    public function PaidCoinTransactions(){
        if(is_admin()){
            $response['header'] = 'Paid Coin Transaction';
            $response['records'] = $this->Main_model->get_records('tbl_coinbase_transactions',['status' => 'charge:confirmed' , 'approve_status' => 0,'trans_type' => '1'],'*');
            foreach($response['records'] as $key => $record){
                $response['records'][$key]['user'] = $this->Main_model->get_single_record('tbl_users','user_id = "'.$record['user_id'].'"','user_id,name,email');
                $response['records'][$key]['package'] = $this->Main_model->get_single_record('tbl_package',['price' => $record['data']],'title,description');
            }
            // pr($response);
            $this->load->view('coin_transactions', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function ApprovedTransactions(){
        if(is_admin()){
            $response['header'] = 'Approved Coin Transaction';
            $response['records'] = $this->Main_model->get_records('tbl_coinbase_transactions',['status' => 'charge:confirmed','trans_type' => '1'],'*');
            foreach($response['records'] as $key => $record){
                $response['records'][$key]['user'] = $this->Main_model->get_single_record('tbl_users','user_id = "'.$record['user_id'].'"','user_id,name,email');
                $response['records'][$key]['package'] = $this->Main_model->get_single_record('tbl_package',['price' => $record['data']],'title,description');
            }
            // pr($response);
            $this->load->view('coin_transactions', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function PendingTransactions(){
        if(is_admin()){
            $response['header'] = 'Pending Coin Transaction';
            $response['records'] = $this->Main_model->get_records('tbl_coinbase_transactions',['status' => 'charge:pending' , 'approve_status' => 0,'trans_type' => '1'],'*');
            foreach($response['records'] as $key => $record){
                $response['records'][$key]['user'] = $this->Main_model->get_single_record('tbl_users','user_id = "'.$record['user_id'].'"','user_id,name,email');
                $response['records'][$key]['package'] = $this->Main_model->get_single_record('tbl_package',['price' => $record['data']],'title,description');
            }
            // pr($response);
            $this->load->view('coin_transactions', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function AllTransactions(){
        if(is_admin()){
            $response['header'] = 'All Coin Transaction';
            $response['records'] = $this->Main_model->get_records('tbl_coinbase_transactions',['status !=' => '' , 'approve_status' => 0,'trans_type' => '1'],'*');
            foreach($response['records'] as $key => $record){
                $response['records'][$key]['user'] = $this->Main_model->get_single_record('tbl_users','user_id = "'.$record['user_id'].'"','user_id,name,email');
                $response['records'][$key]['package'] = $this->Main_model->get_single_record('tbl_package',['price' => $record['data']],'title,description');
            }
            // pr($response);
            $this->load->view('coin_transactions', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function AddUser(){
        if(is_admin()){
        	if($this->input->server("REQUEST_METHOD") == "POST"){
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('user_id','User ID','trim|required');
                $this->form_validation->set_rules('name','Name','trim|required');
                $this->form_validation->set_rules('email','E-Mail','trim|required');
                $this->form_validation->set_rules('password','Password','trim|required');
                $this->form_validation->set_rules('type','Type','trim|required');
                if($this->form_validation->run() != FALSE){
                	$user = $this->Main_model->get_single_record('tbl_admin',['user_id' => $data['user_id']],'name');
                	if(empty($user)){
	                	$userdata = [
	                		'user_id' => $data['user_id'],
	                		'password' => $data['password'],
	                		'role' => $data['type'],
	                		'email' => $data['email'],
	                		'name' => $data['name']
	                	];
	                	$this->Main_model->add('tbl_admin',$userdata);
	                	$this->session->set_flashdata('message','User Created Successfully');
	                }else{
	                	$this->session->set_flashdata('message','User ID Already Exists');
	                }	
                }else{
                	$this->session->set_flashdata('message',validation_errors());
                }
            }    
            $this->load->view('addUser');
        }
    }

    public function Premission(){
        if(is_admin()){
     
            $this->load->view('permission');
        }
    }

    public function ChangePermission($type){
        if(is_admin()){
            if($this->input->server("REQUEST_METHOD") == "POST"){
                $data = $this->security->xss_clean($this->input->post());
                $access = json_encode($data);
                $res = $this->Main_model->update('tbl_admin',['role' => $type],['access' => $access]);
                if($res){
                    $this->session->set_flashdata('message','<h3 style="color:green">Permission Updated successfully</h3>');
                }else{
                    $this->session->set_flashdata('message','<h3 style="color:red">Network error,Please try later</h3>');
                }
            }
            $users = $this->Main_model->get_single_record('tbl_admin',['role' => $type],'access');
            $response['access'] = json_decode($users['access'],true);    
            $response['type'] = $type; 
            $this->load->view('changePermission',$response);
        }
    }

    public function coin_payment_transaction(){
    	if(is_admin()){
    		$response['header'] = 'Coin Payment Transaction';
    		$response['coin_payment'] = $this->Main_model->get_records('BTC_TRANSACTION',[],'*');
    		$this->load->view('coin_payment_transactions',$response);
    	}else{
    		redirect('Admin/Management/login');

    	}
    }
}