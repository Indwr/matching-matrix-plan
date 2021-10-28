<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
        $this->load->model(array('User_model'));
        $this->load->helper(array('user', 'birthdate', 'security', 'email'));
    }

    public function index(){
        if (is_logged_in()) {
            $response = array();
            $response['countries'] = $this->User_model->get_records('countries', array(), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $userDetail = $this->User_model->get_single_record('tbl_users',['user_id' => $this->session->userdata['user_id']],'paid_status');
                if($userDetail['paid_status'] == 0){
                    // $Userdata['name'] = $data['name'];
                    // $Userdata['last_name'] = $data['last_name'];
                    // $Userdata['address'] = $data['address'];
                    // $Userdata['postal_code'] = $data['postal_code'];
                    //$Userdata['phone'] = $data['phone'];
                    $get = $this->User_model->get_single_record('tbl_users',['user_id' => $this->session->userdata['user_id']],'city, email,country,state,address,address2');
                    if(empty($get['city'])){
                        $Userdata['city'] = $data['city'];
                        $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), $Userdata);
                    }
                    if(empty($get['email'])){
                        $Userdata6['email'] = $data['email'];
                        $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), $Userdata6);
                    }
                    if(empty($get['country'])){
                        $Userdata5['country'] = $data['country'];
                        $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), $Userdata5);
                    }
                    if(empty($get['state'])){
                        $Userdata4['state'] = $data['state'];
                        $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), $Userdata4);
                    }
                    if(empty($get['address'])){
                        $Userdata2['address'] = $data['address'];
                        $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), $Userdata2);
                    }
                    if(empty($get['address2'])){
                        $Userdata1['address2'] = $data['address2'];
                        $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), $Userdata1);
                    }

                    if (!empty($updres)) {
                        $this->session->set_flashdata('message','Details Updated Successfully');
                        redirect('Dashboard/Profile');
                    } else {
                        $this->session->set_flashdata('message','Please contact to the admin for more changes.');
                        redirect('Dashboard/Profile');
                    }
                }else{
                    $this->session->set_flashdata('message','For Profile Update Please contact Admin');
                    redirect('Dashboard/Profile');
                }
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

    public function changePassword() {
        if (is_logged_in()) {
            $response = array();
            $this->load->view('changePassword', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function passwordReset(){
        if (is_logged_in()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $cpassword = $data['cpassword'];
                $npassword = $data['npassword'];
                $vpassword = $data['vpassword'];
                $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,password');
                if ($npassword !== $vpassword) {
                    $this->session->set_flashdata('password_message','Verify Password Doed Not Match');
                } elseif ($cpassword !== $user['password']) {
                    $this->session->set_flashdata('password_message','Wrong Current Password');
                } else {
                    $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), array('password' => $vpassword));
                    if ($updres == true) {
                        $this->session->set_flashdata('password_message','Password Updated Successfully');
                    } else {
                        $this->session->set_flashdata('password_message','There is an error while Changing Password Please Try Again');
                    }
                }
            }
            $response['header'] = 'Password Management';
            redirect('Dashboard/Profile/changePassword');
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function accountDetails(){
        if (is_logged_in()) {
            $response = array();
            // $response['csrfName'] = $this->security->get_csrf_token_name();
            // $response['csrfHash'] = $this->security->get_csrf_hash();
            $response['success'] = 0;
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $user_data['bank_name'] = $data['bank_name'];
                $user_data['account_holder_name'] = $data['account_holder_name'];
                $user_data['bank_account_number'] = $data['bank_account_number'];
                $user_data['ifsc_code'] = $data['ifsc_code'];
				$user_data['aadhar'] = $data['aadhar'];
                $user_data['pan'] = $data['pan'];
                // $user_data['btc'] = $data['btc'];
                // $user_data['ethereum'] = $data['ethereum'];
                // $user_data['tron'] = $data['tron'];
                // $user_data['litecoin'] = $data['litecoin'];
                // $user_data['bitcoin_cash'] = $data['bitcoin_cash'];

                // $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,password');
                // if ($npassword !== $vpassword) {
                //     $response['message'] = 'Verify Password Doed Not Match';
                // } elseif ($cpassword !== $user['password']) {
                //     $response['message'] = 'Wrong Current Password';
                // } else {
                    $updres = $this->User_model->update('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), $user_data);
                    if ($updres == true) {
                        // $response['message'] = 'Coin  Address Updated Successfully';
                        // $response['success'] = 1;
                        $this->session->set_flashdata('message','Bank Details Updated Successfully');
                        redirect('Dashboard/Profile/accountDetails');
                    } else {
                        $this->session->set_flashdata('message','There is an error while Updating Bank Details Please Try Again');
                        redirect('Dashboard/Profile/accountDetails');
                    }
                // }
            }
			$response['user_bank'] = $this->User_model->get_single_record('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), '*');
			
            $this->load->view('accountDetails',$response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function transPassword(){
        if (is_logged_in()) {
            $response = array();
            if($this->input->server('REQUEST_METHOD') == "POST"){
                $data = $this->security->xss_clean($this->input->post());
                $cpassword = $data['cpassword'];
                $npassword = $data['npassword'];
                $vpassword = $data['vpassword'];
                $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,master_key');
                if ($npassword !== $vpassword) {
                    $this->session->set_flashdata('txn_message','Verify Password Doed Not Match');
                } elseif ($cpassword !== $user['master_key']) {
                    $this->session->set_flashdata('txn_message','Wrong Current Password');
                } else {
                    $updres = $this->User_model->update('tbl_users', array('user_id' => $this->session->userdata['user_id']), array('master_key' => $vpassword));
                    if ($updres == true) {
                        $this->session->set_flashdata('txn_message','Password Updated Successfully');
                    } else {
                        $this->session->set_flashdata('txn_message','There is an error while Changing Password Please Try Again');
                    }
                }
            }
            $response['header'] = 'Transaction Password Management';
            redirect('Dashboard/Profile/changePassword');
        } else {
            redirect('Dashboard/User/login');
        }
    }
}
?>