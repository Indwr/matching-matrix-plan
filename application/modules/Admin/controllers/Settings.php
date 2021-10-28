<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email','pagination'));
        $this->load->model(array('Main_model'));
        $this->load->helper(array('admin', 'security'));
    }

    public function index() {
        if (is_admin()) {
            $response['packages'] = $this->Main_model->get_records('tbl_package', array(), '*');
            $this->load->view('package_list', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function news() {
        if (is_admin()) {
            $response['news'] = $this->Main_model->get_records('tbl_news', array(), '*');
            $this->load->view('news', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function deleteNews($id) {
        if (is_admin()) {
            $get = $this->Main_model->get_single_record('tbl_news', array('id' => $id), '*');
            if(!empty($get['id'])){
                $delete = $this->Main_model->delete('tbl_news', $id);
                if($delete){
                    $this->session->set_flashdata('message', 'News Deleted Successfully!');
                }else{
                    $this->session->set_flashdata('message', 'Request not found!');
                }
            }else{
                $this->session->set_flashdata('message', 'Invaild Request ID!');
            }
            redirect('/Admin/Settings/news');
        } else {
            redirect('Admin/Management/login');
        }
    }


    public function ResetPassword(){
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $cpassword = $data['cpassword'];
                $npassword = $data['npassword'];
                $cnpassword = $data['cnpassword'];
                $user = $this->Main_model->get_single_record('tbl_admin', array('user_id' => 'admin'), 'id,user_id,password');
                if ($npassword !== $cnpassword) {
                    // $response['message'] = 'Verify Password Doed Not Match';
                    $this->session->set_flashdata('message', 'Verify Password Does Not Match');
                } elseif ($cpassword !== $user['password']) {
                    // $response['message'] = 'Wrong Current Password';
                    $this->session->set_flashdata('message', 'Wrong Current Password');
                } else {
                    $updres = $this->Main_model->update('tbl_admin', array('user_id' =>  'admin'), array('password' => $cnpassword));
                    if ($updres == true) {
                        // $response['message'] = 'Password Updated Successfully';
                        $this->session->set_flashdata('message', 'Password Updated Successfully');
                        $response['success'] = 1;
                    } else {
                        // $response['message'] = 'There is an error while Changing Password Please Try Again';
                        $this->session->set_flashdata('message', 'There is an error while Changing Password Please Try Again');
                    }
                }
                // $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
                // $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
                // $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|required|xss_clean');
                // if ($this->form_validation->run() != FALSE) {
                //     $UserData = array(
                //         'name' => $data['name'],
                //         'email' => $data['email'],
                //         'phone' => $data['phone'],
                //     );
                //     $res = $this->Main_model->update('tbl_users', array('user_id' => $user_id),$UserData);
                //     if ($res == TRUE) {
                //         $this->session->set_flashdata('message', 'User Details Updated Successfully');
                //     } else {
                //         $this->session->set_flashdata('message', 'Error While Updating Details Please Try Again ...');
                //     }
                // }
            }
            $this->load->view('reset_password', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function EditUser($user_id) {
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                if($data['form_type'] == 'personal'){
                    $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|required|xss_clean');
                    $this->form_validation->set_rules('leftPower', 'Left Power', 'trim|numeric|required|xss_clean');
                    $this->form_validation->set_rules('rightPower', 'Right Power', 'trim|numeric|required|xss_clean');
                    if ($this->form_validation->run() != FALSE) {
                        $UserData = array(
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'phone' => $data['phone'],
                            'leftPower' => $data['leftPower'],
                            'rightPower' => $data['rightPower'],
                        );
                        $res = $this->Main_model->update('tbl_users', array('user_id' => $user_id),$UserData);
                        if ($res == TRUE) {
                            $this->session->set_flashdata('message', 'User Details Updated Successfully');
                        } else {
                            $this->session->set_flashdata('message', 'Error While Updating Details Please Try Again ...');
                        }
                    }
                }elseif($data['form_type'] == 'password'){
                    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
                    if ($this->form_validation->run() != FALSE) {
                        $UserData = array(
                            'password' => $data['password']
                        );
                        $res = $this->Main_model->update('tbl_users', array('user_id' => $user_id),$UserData);
                        if ($res == TRUE) {
                            $this->session->set_flashdata('message', 'Password Updated Successfully');
                        } else {
                            $this->session->set_flashdata('message', 'Error While Password Please Try Again ...');
                        }
                    }
                }elseif($data['form_type'] == 'master_key'){
                    $this->form_validation->set_rules('master_key', 'Transaction Password', 'trim|required|xss_clean');
                    if ($this->form_validation->run() != FALSE) {
                        $UserData = array(
                            'master_key' => $data['master_key']
                        );
                        $res = $this->Main_model->update('tbl_users', array('user_id' => $user_id),$UserData);
                        if ($res == TRUE) {
                            $this->session->set_flashdata('message', 'Transaction Password Updated Successfully');
                        } else {
                            $this->session->set_flashdata('message', 'Error While Transaction Password Please Try Again ...');
                        }
                    }
                }else{
                    // pr($data,true);
                    $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('bank_account_number', 'Bank Account Number', 'trim|numeric|required|xss_clean');
                    $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('btc', 'BTC', 'trim|required|xss_clean');
                    if ($this->form_validation->run() != FALSE) {
                        $UserData = array(
                            'account_holder_name' => $data['account_holder_name'],
                            'bank_name' => $data['bank_name'],
                            'bank_account_number' => $data['bank_account_number'],
                            'ifsc_code' => $data['ifsc_code'],
                            'btc' => $data['btc'],
                            'tron' => $data['tron'],
                            'ethereum' => $data['ethereum'],
                            'litecoin' => $data['litecoin'],
                        );
                        $res = $this->Main_model->update('tbl_bank_details', array('user_id' => $user_id),$UserData);
                        if ($res == TRUE) {
                            $this->session->set_flashdata('message', 'BANK Details Updated Successfully');
                        } else {
                            $this->session->set_flashdata('message', 'Error While Updating Bank Details Please Try Again ...');
                        }
                    }
                }
            }
            $response['user'] = $this->Main_model->get_single_record('tbl_users', array('user_id' => $user_id), '*');
            $response['user']['bank'] = $this->Main_model->get_single_record('tbl_bank_details', array('user_id' => $user_id), '*');
            $this->load->view('edit_user', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function UpdateRank(){
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('user_id', 'User ID', 'trim|required|xss_clean');
                $this->form_validation->set_rules('directs', 'Directs', 'trim|numeric|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $user = $this->Main_model->get_single_record('tbl_users', array('user_id' => $data['user_id']), '*');
                    if(!empty($user)){
                        $res = $this->Main_model->update('tbl_users', array('user_id' => $data['user_id']),array('directs' => $data['directs']));
                        if ($res == TRUE) {
                            $this->session->set_flashdata('message', 'Rank Updated Successfully');
                        } else {
                            $this->session->set_flashdata('message', 'Error While Updating Rank  Please Try Again ...');
                        }
                    }else{
                        $this->session->set_flashdata('message', 'Invalid user');
                    }
                }
            }
            $this->load->view('update_rank', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function CreateNews() {
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
                $this->form_validation->set_rules('news', 'News', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $packArr = array(
                        'title' => $data['title'],
                        'news' => $data['news'],
                    );
                    $res = $this->Main_model->add('tbl_news', $packArr);
                    if ($res == TRUE) {
                        $this->session->set_flashdata('message', 'News Added Successfully');
                    } else {
                        $this->session->set_flashdata('message', 'Error While Creating News  Please Try Again ...');
                    }
                }
            }
            $this->load->view('create_news', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }


    public function editNews($id) {
        if (is_admin()) {
            $response = array();
            $response['news'] = $this->Main_model->get_single_record('tbl_news',array('id' => trim(addslashes($id))), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
                $this->form_validation->set_rules('news', 'News', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $packArr = array(
                        'title' => $data['title'],
                        'news' => $data['news'],
                    );
                    $res = $this->Main_model->update('tbl_news',array('id' => $id), $packArr);
                    if ($res == TRUE) {
                        $this->session->set_flashdata('message', 'News Edit Successfully');
                    } else {
                        $this->session->set_flashdata('message', 'Error While Creating News  Please Try Again ...');
                    }
                    redirect('Admin/Settings/editNews/'.$id);
                }
            }
            $this->load->view('edit_news', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function token_value() {
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $promoArr = array(
                    'amount' => $this->input->post('token_value'),
                ); 
                $res = $this->Main_model->update('tbl_token_value', array('id' => 1),$promoArr);
                if ($res) {
                    $this->session->set_flashdata('message', 'Token Update dSuccessfully');
                } else {
                    $this->session->set_flashdata('message', 'Error While Updating Token Please Try Again ...');
                }                
            }
            $response['token_value'] = $this->Main_model->get_single_record('tbl_token_value', array(), '*');
            // pr($response,true);
            $this->load->view('token_value', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function popup() {
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'doc|pdf|jpg|png';
                $config['file_name'] = 'am' . time();
                if($this->input->post('type') == 'image'){
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('media')) {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $promoArr = array(
                            'caption' => $this->input->post('caption'),
                            'media' => $data['upload_data']['file_name'],
                            'type' => 'image'
                        ); 
                        $res = $this->Main_model->update('tbl_popup', array('id' => 1),$promoArr);
                        if ($res) {
                            $this->session->set_flashdata('message', 'Image Update Successfully');
                        } else {
                            $this->session->set_flashdata('message', 'Error While Adding Popup Please Try Again ...');
                        }
                    }
                }else{
                    $promoArr = array(
                        'caption' => $this->input->post('caption'),
                        'media' => $this->input->post('media'),
                        'type' => 'video'
                    ); 
                    $res = $this->Main_model->update('tbl_popup', array('id' => 1),$promoArr);
                    if ($res) {
                        $this->session->set_flashdata('message', 'Image Updated Successfully');
                    } else {
                        $this->session->set_flashdata('message', 'Error While Adding Popup Please Try Again ...');
                    }
                }
                
            }
            $response['materials'] = $this->Main_model->get_records('tbl_popup', array(), '*');
            $this->load->view('popup', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function roiList() {
        if (is_admin()) {
            $field = $this->input->get('type');
            $value = $this->input->get('value');
            $where = array($field => $value);
            // pr($where,true);
            if (empty($where[$field]))
                $where = array();
            $config['total_rows'] = $this->Main_model->get_sum('tbl_roi', $where, 'ifnull(count(id),0) as sum');
            $config['base_url'] = base_url() . 'Admin/Management/users';
            $config ['uri_segment'] = 4;
            $config['per_page'] = 10;
            $config['attributes'] = array('class' => 'page-link');
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="paginate_button page-item ">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="paginate_button page-item  active"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li class="paginate_button page-item ">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li class="paginate_button page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="paginate_button page-item next">';
            $config['last_tag_close'] = '</li>';
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li class="paginate_button page-item previous">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li  class="paginate_button page-item next">';
            $config['next_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $segment = $this->uri->segment(4);
            $response['records'] = $this->Main_model->get_limit_records('tbl_roi', $where, '*', $config['per_page'], $segment);

            $response['segament'] = $segment;
            $response['type'] = $field;
            $response['value'] = $value;
            $response['total_records'] = $config['total_rows'];

            $this->load->view('roi_list', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function BoosterroiList() {
        if (is_admin()) {
            $field = $this->input->get('type');
            $value = $this->input->get('value');
            $where = array($field => $value);
            // pr($where,true);
            if (empty($where[$field]))
                $where = array();
                
            $where['booster_status'] = 1;
            $config['total_rows'] = $this->Main_model->get_sum('tbl_roi', $where, 'ifnull(count(id),0) as sum');
            $config['base_url'] = base_url() . 'Admin/Management/users';
            $config ['uri_segment'] = 4;
            $config['per_page'] = 10;
            $config['attributes'] = array('class' => 'page-link');
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="paginate_button page-item ">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="paginate_button page-item  active"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '</a></li>';
            $config['prev_tag_open'] = '<li class="paginate_button page-item ">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li class="paginate_button page-item">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="paginate_button page-item next">';
            $config['last_tag_close'] = '</li>';
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li class="paginate_button page-item previous">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li  class="paginate_button page-item next">';
            $config['next_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $segment = $this->uri->segment(4);
            $response['records'] = $this->Main_model->get_limit_records('tbl_roi', $where, '*', $config['per_page'], $segment);

            $response['segament'] = $segment;
            $response['type'] = $field;
            $response['value'] = $value;
            $response['total_records'] = $config['total_rows'];

            $this->load->view('roi_list', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    // public function popup_upload() {
    //     if (is_admin()) {
    //         $response = array();
    //         if ($this->input->server('REQUEST_METHOD') == 'POST') {
    //             $data = $this->security->xss_clean($this->input->post());
    //             $data = html_escape($data);
    //             if ($data['type'] == 'image') {
    //                 if (!empty($_FILES['media']['name'])) {
    //                     $config['upload_path'] = './uploads/';
    //                     $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
    //                     $config['file_name'] = 'payment_slip';
    //                     $this->load->library('upload', $config);
    //                     if (!$this->upload->do_upload('media')) {
    //                         $this->session->set_flashdata('error', $this->upload->display_errors());
    //                     } else {
    //                         $fileData = array('upload_data' => $this->upload->data());
    //                         $fileData = array('upload_data' => $this->upload->data());
    //                         $userData['media'] = $fileData['upload_data']['file_name'];
    //                         $userData['type'] = 'image';
    //                         $userData['caption'] = $this->input->post('caption');
    //                         $updres = $this->Main_model->update('tbl_user_popup',['id' => 1],$userData);
    //                         if ($updres == true) {
    //                             $this->session->set_flashdata('error', 'Popup Uploaded Successfully');
    //                         } else {
    //                             $this->session->set_flashdata('error', 'There is an error while uploading Popup Image, Please try Again ..');
    //                         }
    //                     }
    //                 } else {
    //                     $this->session->set_flashdata('error', 'There is an error while uploading Popup Image, Please try Again ..');
    //                 }
    //             } 
    //         }
    //         $response['popup'] = $this->Main_model->get_single_record('tbl_user_popup',[],'*'); 
    //         $response['user'] = 1;
    //         $this->load->view('popup.php', $response);
    //     } else {
    //         redirect('Admin/Management/login');
    //     }
    // }
     

    public function popupSetting(){
        if(is_admin()){
            $popup = $this->Main_model->get_single_record('tbl_user_popup',[],'*'); 
            if($popup['status'] == 0){
                $status = 1;
            }else{
                $status = 0;
            }
            $this->Main_model->update('tbl_user_popup',['id' => 1],['status' => $status]);
            redirect('Admin/Settings/popup_upload');
        }else{
            redirect('Admin/Management/login');
        }
    }

    public function site_settings(){
        if(is_admin()){
            if($this->input->server("REQUEST_METHOD") == "POST"){
                $data = $this->security->xss_clean($this->input->post());
                if(!empty($data['withdraw_button'])){ $withdraw_button = 1; }else {  $withdraw_button =  0; }
                if(!empty($data['transfer_button'])){ $transfer_button = 1; }else {  $transfer_button =  0; }
                if(!empty($data['popup_on'])){ $popup = 1; } else { $popup =  0; }
                
                if (!empty($_FILES['image']['name'])) {
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = 'popup'.time();
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('image')) {
                        $this->session->set_flashdata('message', $this->upload->display_errors());
                    } else {
                        $fileData = array('upload_data' => $this->upload->data());                      
                        $siteData = [
                            'company_name' => $data['company_name'],
                            'mobile' => $data['mobile'],
                            'email' => $data['email'],
                            'website' => $data['website'], 
                            'address' => $data['address'],
                            'popup' => $popup, 
                            'popup_image' => $fileData['upload_data']['file_name'],
                            'username' => $data['username'], 
                            'direct_income' => $data['direct_income'],
                            'matching_income' => $data['matching_income'],
                            'overriding' => $data['overriding'],
                            'minimum_withdraw' => $data['minimum_withdraw'],
                            'minimum_transfer' => $data['minimum_transfer'],
                            'bank_charges' => $data['bank_charges'],
                            'coin_payment_charges' => $data['coin_payment_charges'],
                            'withdraw_button' => $withdraw_button,
                            'transfer_button' => $transfer_button,
                        ];
                        $res = $this->Main_model->update('tbl_site_settings',['id' => '1'],$siteData);
                        if($res){
                            $this->session->set_flashdata('message','<div class="text-success">Setting updated successfully</div>');
                             redirect('Admin/Settings/site_settings');
                        }else{
                            $this->session->set_flashdata('message','Network error,please try later');
                        }
                    }
                }else{
                    $siteData = [
                        'company_name' => $data['company_name'],
                        'mobile' => $data['mobile'],
                        'email' => $data['email'],
                        'website' => $data['website'], 
                        'address' => $data['address'],
                        'popup' => $popup, 
                        'username' => $data['username'], 
                        'direct_income' => $data['direct_income'],
                        'matching_income' => $data['matching_income'],
                        'overriding' => $data['overriding'],
                        'minimum_withdraw' => $data['minimum_withdraw'],
                        'minimum_transfer' => $data['minimum_transfer'],
                        'bank_charges' => $data['bank_charges'],
                        'coin_payment_charges' => $data['coin_payment_charges'],
                        'withdraw_button' => $withdraw_button,
                        'transfer_button' => $transfer_button,
                    ];
                    $res = $this->Main_model->update('tbl_site_settings',['id' => '1'],$siteData);
                    if($res){
                        $this->session->set_flashdata('message','<div class="text-success">Setting updated successfully</div>');
                        redirect('Admin/Settings/site_settings');
                    }else{
                        $this->session->set_flashdata('message','Network error,please try later');
                    }
                }
            }
            $response['info']  =  $this->Main_model->get_single_record('tbl_site_settings',[],'*');
            $this->load->view('company.php',$response);

        }else{
            redirect('Admin/Management/login');
        }
    }
}
 