<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
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

    public function create() {
        if (is_admin()) {
            $response = [];
            $response['products'] = $this->Main_model->get_records('tbl_products', array(), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
                $this->form_validation->set_rules('bv', 'BV', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('description', 'description', 'trim|required|xss_clean');
                $this->form_validation->set_rules('price', 'Price', 'trim|required|xss_clean');
                $this->form_validation->set_rules('commision', 'Commision', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $q = $this->input->post('item_count');
                    $products = $this->input->post('product');
                    foreach ($products as $key => $p) {
                        $product[$key]['id'] = $p;
                        $product[$key]['quantity'] = $q[$key];
                    }
                    $packArr = array(
                        'title' => $data['title'],
                        'description' => $data['description'],
                        'price' => $data['price'],
                        'bv' => $data['bv'],
                        'products' => json_encode($product),
                        'commision' => $data['commision'],
                    );
                    $res = $this->Main_model->add('tbl_package', $packArr);
                    if ($res == TRUE) {
                        $this->session->set_flashdata('message', 'New Package Created Successfully');
                    } else {
                        $this->session->set_flashdata('message', 'Error While Creating New Package Please Try Again ...');
                    }
                }
            }
            $this->load->view('create_package', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function Edit($id) {
        if (is_admin()) {
            $response = [];
            $response['products'] = $this->Main_model->get_records('tbl_products', array(), '*');
            $response['package'] = $this->Main_model->get_single_record('tbl_package', array('id' => $id), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
//                $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
//                $this->form_validation->set_rules('bv', 'BV', 'trim|required|numeric|xss_clean');
//                $this->form_validation->set_rules('description', 'description', 'trim|required|xss_clean');
//                $this->form_validation->set_rules('price', 'Price', 'trim|required|xss_clean');
//                $this->form_validation->set_rules('commision', 'Commision', 'trim|required|xss_clean');
//                if ($this->form_validation->run() != FALSE) {
//                    pr($data);
//                    $products = implode(',', $data['product']);
                $q = $this->input->post('item_count');
                $products = $this->input->post('product');
                if (empty($product))
                    $product = array();
                else {
                    foreach ($products as $key => $p) {
                        $product[$key]['id'] = $p;
                        $product[$key]['quantity'] = $q[$key];
                    }
                }

                $packArr = array(
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'bv' => $data['bv'],
                    'products' => json_encode($product),
                    'commision' => $data['commision'],
                );
                $res = $this->Main_model->update('tbl_package', array('id' => $id), $packArr);
                if ($res) {
                    $this->session->set_flashdata('message', 'Package Updated Successfully');
                    $response['package'] = $this->Main_model->get_single_record('tbl_package', array('id' => $id), '*');
                } else {
                    $this->session->set_flashdata('message', 'Error While Updating  Package Please Try Again ...');
                }
//                }else{
//                    echo form_error();
//                    die('we are here');
//                }
            }

            $this->load->view('edit_package', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function upload_package_image() {
        if (is_admin()) {
            $response = array();
            $data = $_POST['image'];
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);

            $data = base64_decode($data);
            $imageName = 'pack' . time() . '.png';
            file_put_contents(APPPATH . '../uploads/' . $imageName, $data);
            $imageArray = array(
                'image' => $imageName,
            );
            $package_id = $this->input->post('package_id');
            $updres = $this->Main_model->update('tbl_package', array('id' => $package_id), $imageArray);
            $response['message'] = 'Image uploaed Succesffully';
            echo json_encode($response);
            exit();
        }
    }

    public function Products() {
        if (is_admin()) {
            $response['products'] = $this->Main_model->get_records('tbl_products', array(), '*');
            $this->load->view('products_list', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function CreateProduct() {
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
                $this->form_validation->set_rules('bv', 'BV', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('mrp', 'MRP', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('dp', 'DP', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('igst', 'IGST', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('sgst', 'SGST', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $data = $this->security->xss_clean($this->input->post());
                    $productArr = array(
                        'title' => $data['title'],
                        'bv' => $data['bv'],
                        'mrp' => $data['mrp'],
                        'dp' => $data['dp'],
                        'igst' => $data['igst'],
                        'sgst' => $data['sgst'],
                        'description' => $data['description'],
                    );
                    $res = $this->Main_model->add('tbl_products', $productArr);
                    if ($res) {
                        $this->session->set_flashdata('message', 'New Product Created Successfully');
                        redirect('Admin/Package/EditProduct/' . $res);
                    } else {
                        $this->session->set_flashdata('message', 'Error While Creating New Product   Please Try Again ...');
                    }
                }
            }
            $this->load->view('create_product', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function EditProduct($id) {
        if (is_admin()) {
            $response = array();
            $response['product'] = $this->Main_model->get_single_record('tbl_products', array('id' => $id), '*');
            $response['product_images'] = $this->Main_model->get_records('tbl_product_images', array('product_id' => $id), '*');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
                $this->form_validation->set_rules('bv', 'BV', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('member_price', 'Member Price', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('retail_price', 'Retail Price', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('description', 'description', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $data = $this->security->xss_clean($this->input->post());
                    $productArr = array(
                        'title' => $data['title'],
                        'bv' => $data['bv'],
                        'member_price' => $data['member_price'],
                        'retail_price' => $data['retail_price'],
                        'description' => $data['description'],
                    );
                    $res = $this->Main_model->update('tbl_products', array('id' => $id), $productArr);
                    if ($res) {
                        $this->session->set_flashdata('message', 'Product Updated Successfully');
                    } else {
                        $this->session->set_flashdata('message', 'Error While Updating Product Please Try Again ...');
                    }
                }
            }

            $this->load->view('edit_product', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function upload_product_image($id) {
        if (is_admin()) {
            $response = array();
            $response['success'] = 0;
            $response['token_name'] = $this->security->get_csrf_token_name();
            $response['token_value'] = $this->security->get_csrf_hash();
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['file_name'] = 'payment_slip';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $response['message'] =  $this->upload->display_errors();
            }else{
                $fileData = array('upload_data' => $this->upload->data());
                $imageArray['product_id'] = $id;
                $imageArray['image'] = $fileData['upload_data']['file_name'];
                $updres = $this->Main_model->add('tbl_product_images', $imageArray);
                $response['message'] = 'Image uploaed Succesffully';
                $response['success'] = 1;
            }
            
            echo json_encode($response);
            exit();
        }
    }

    public function DeleteProduct($id) {
        if (is_admin()) {
            $product = $this->Main_model->get_single_record('tbl_products', array('id' => $id), '*');
            if (!empty($product)) {
                $res = $this->Main_model->delete('tbl_products', $id);
                if ($res) {
                    $this->session->set_flashdata('message', 'Product Deleted Successfully');
                } else {
                    $this->session->set_flashdata('message', 'Error While Deleting Product   Please Try Again ...');
                }
            } else {
                $this->session->set_flashdata('message', 'No Product Found');
            }
            redirect('Admin/Package/Products');
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function delete_product_image($product_id, $id) {
        if (is_admin()) {
            $product = $this->Main_model->get_single_record('tbl_product_images', array('id' => $id), '*');
            if (!empty($product)) {
//                PR('file://'.$_SERVER['DOCUMENT_ROOT'].$product['image']);
//                unlink('file://' . $_SERVER['DOCUMENT_ROOT'] . $product['image']);
//                unlink(APPPATH('uploads/' . $product['image']));
                $res = $this->Main_model->delete('tbl_product_images', $id);
                if ($res) {
                    $this->session->set_flashdata('message', 'Product Image Deleted Successfully');
                } else {
                    $this->session->set_flashdata('message', 'Error While Deleting Product image  Please Try Again ...');
                }
            } else {
                $this->session->set_flashdata('message', 'No Image Found');
            }
            redirect('Admin/Package/EditProduct/' . $product_id);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function Tax() {
        if (is_admin()) {
            $response['tax'] = $this->Main_model->get_single_record('tbl_tax', array('id' => 1), '*');
            $this->form_validation->set_rules('tax', 'Tax', 'trim|required|numeric|xss_clean');
            if ($this->form_validation->run() != FALSE) {
                $data = $this->security->xss_clean($this->input->post());
                $res = $this->Main_model->update('tbl_tax', array('id' => 1), array('tax' => $data['tax']));
                if ($res) {
                    $this->session->set_flashdata('message', 'Tax Updated Successfully');
                    $response['tax'] = $this->Main_model->get_single_record('tbl_tax', array('id' => 1), '*');
                } else {
                    $this->session->set_flashdata('message', 'Error While Updating  Tax Please Try Again ...');
                }
            }
            $this->load->view('tax', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function topupRequest(){
       if (is_admin()) { 
            $response['header'] = 'Topup Request';
            $data =  $this->Main_model->get_records('tbl_topup_request',[''],'user_id,package_amount,account_type,status,topup_date');

            $tbody = [];
            $response['thead'] = ['#','User ID','Package Amount','Account Type','Status','Topup Request Date','Action'];
            foreach($data as $key => $d){
                if($d['status'] == 0){
                    $status = 'Pending';
                    $button = '<a href="'.base_url('Admin/Package/activateAccount/'.$d['user_id']).'" onclick="return confirm()">Activate</a>';
                }elseif ($d['status'] == 1) {
                    $status = 'Approved';
                    $button = '';
                }
               $tbody[] = '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$d['user_id'].'</td>
                    <td>'.$d['package_amount'].'</td>
                    <td>'.$d['account_type'].'</td>
                    <td>'.$status.'</td>
                    <td>'.$d['topup_date'].'</td>
                    <td>'.$button.'</td>
                </tr>';
            }
            $response['tbody'] = $tbody;

            $this->load->view('table',$response);
       } else {
            redirect('Admin/Management/login');
        } 
    }

    Public function registrationRequest(){
        if(is_admin()){
            $response['header'] = 'Registration Request';
            $data =  $this->Main_model->get_records('tbl_temp_users',"status != '1' and status != '2'",'*');
            $tbody = [];
            $response['thead'] = ['#','User ID','Name','UTR Number','Receipt','Package Amount','Account Type','Status','Topup Request Date','Action'];
            foreach($data as $key => $d){
                $package = $this->Main_model->get_single_record('tbl_package',['id' => $d['package_id']],'price');
                if($d['status'] == 0){
                    $status = 'Pending';
                    $button = '<a href="'.base_url('Admin/Package/approveRegistration/'.$d['user_id']).'" onclick="return confirm()">Register</a>';
                }elseif ($d['status'] == 1) {
                    $status = 'Approved';
                    $button = '';
                }
               $tbody[] = '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$d['user_id'].'</td>
                    <td>'.$d['name'].'</td>
                    <td>'.$d['utr_number'].'</td>
                    <td><img src="'.base_url('uploads/'.$d['image']).'"></td>
                    <td>'.$package['price'].'</td>
                    <td>'.$d['accountType'].'</td>
                    <td>'.$status.'</td>
                    <td>'.$d['created_at'].'</td>
                    <td>'.$button.'</td>
                </tr>';
            }
            $response['tbody'] = $tbody;

            $this->load->view('table',$response);
        }else{
            redirect('Admin/Management/login');
        }
    }

    Public function approveRegistration($user_id){
        if(is_admin()){
            $user = $this->Main_model->get_single_record('tbl_temp_users',['user_id' => $user_id,'status' => 0],'*');
            if(!empty($user['user_id'])){
                $package = $this->Main_model->get_single_record('tbl_package',['id' => $user['package_id']],'*');
                $sponser = $this->Main_model->get_single_record('tbl_users',['user_id' => $user['sponser_id']],'*');
                $userData['user_id'] =  $user['user_id'];
                $userData['sponser_id'] = $user['sponser_id'];
                $userData['name'] = $user['name'];
                $userData['phone'] = $user['phone'];
                $userData['password'] = $user['password'];;
                $userData['position'] = $user['position'];;
                $userData['last_left'] = $user['user_id'];
                $userData['last_right'] = $user['user_id'];
                $userData['email'] = $user['email'];
                $userData['country'] = $user['country'];
                $userData['master_key'] = $user['master_key'];
                $userData['accountType'] = $user['accountType'];
                $userData['package_id'] = $package['id'];
                $userData['package_amount'] = $package['price'];
                $userData['paid_status'] = 1;
                $userData['topup_date'] = date('Y-m-d H:i:s');
                $userData['capping'] = $package['capping'];
                if($userData['position'] == 'L'){
                    $userData['upline_id'] = $sponser['last_left'];
                }else{
                    $userData['upline_id'] = $sponser['last_right'];
                }
                $res = $this->Main_model->add('tbl_users', $userData);
                $res = $this->Main_model->add('tbl_bank_details',array('user_id' => $userData['user_id'] ));
                if ($res) {
                    if ($userData['position'] == 'R') {
                        $this->Main_model->update('tbl_users', array('last_right' => $userData['upline_id']), array('last_right' => $userData['user_id']));
                        $this->Main_model->update('tbl_users', array('user_id' => $userData['upline_id']), array('right_node' => $userData['user_id']));
                    } elseif ($userData['position'] == 'L') {
                        $this->Main_model->update('tbl_users', array('last_left' => $userData['upline_id']), array('last_left' => $userData['user_id']));
                        $this->Main_model->update('tbl_users', array('user_id' => $userData['upline_id']), array('left_node' => $userData['user_id']));
                    }
                    $this->add_counts($userData['user_id'], $userData['user_id'], 1);
                    $this->add_sponser_counts($userData['user_id'],$userData['user_id'], $level = 1);
                    $roiData = [
                        'user_id' => $userData['user_id'],
                        'amount' => $package['commision'] * $package['days'],
                        'days' => $package['days'],
                        'roi_amount' => $package['commision'],
                    ];
                    $this->Main_model->add('tbl_roi', $roiData);
                    $this->Main_model->update_directs($user['sponser_id']);
                    $checkSponser = $this->Main_model->get_single_record('tbl_users',['user_id' => $user['sponser_id']],'paid_status');
                    if($checkSponser['paid_status'] == 1){
                        $DirectIncome = array(
                            'user_id' => $user['sponser_id'],
                            'amount' => $package['direct_income'],
                            'type' => 'direct_income',
                            'description' => 'Refferal Points from Activation of Member '.$user['user_id'],
                        );
                        $this->Main_model->add('tbl_income_wallet', $DirectIncome);
                    }
                    $this->update_business($user['user_id'], $user['user_id'], $level = 1, $package['bv'], $type = 'topup');
                    $this->update_units($user['user_id'] , $user['sponser_id'], $package['commision']);
                    $sms_text = 'Dear ' .$userData['name']. ', Your Account Successfully created. User ID :  ' . $userData['user_id'] . ' Password :' . $userData['password'] . ' Transaction Password:' .$userData['master_key'] . base_url();
                    sendMail($userData['email'],$sms_text,'Registration Alert');
                    notify_user($userData['user_id'] , $sms_text);
                    $this->Main_model->update('tbl_temp_users',['user_id' => $user['user_id']],['status' => 1]);
                    $this->session->set_flashdata('message','User ID Registered successfully');
                    redirect('Admin/Package/registrationRequest');
                }
            }else{
                $this->session->set_flashdata('message','<h3 class="text-danger">Invalid User ID</h3>');
                redirect('Admin/Package/registrationRequest');
            }
        }else{
            redirect('Admin/Management/login');
        }
    }

    public function activateAccount($user_id){
        if (is_admin()) { 
            $users = $this->Main_model->get_single_record('tbl_topup_request',['status' => 0,'user_id' => $user_id],'user_id,package_amount,account_type');
        //foreach($users as $key => $u){
            if(!empty($users['user_id'])){
                $user = $this->Main_model->get_single_record('tbl_users',['paid_status' => 0,'user_id' => $user_id],'user_id,sponser_id');
                //$coinPayment = $this->Main_model->get_single_record('tbl_coinbase_transactions',['user_id' => $user['user_id'],'status' => 'charge:confirmed'],'*');
                if(!empty($user['user_id'])){
                    $package = $this->Main_model->get_single_record('tbl_package',['price' => $users['package_amount']],'*');
                    $topupData = array(
                        'paid_status' => 1,
                        'package_id' => $package['id'],
                        'package_amount' => $package['price'],
                        'topup_date' => date('Y-m-d H:i:s'),
                        'capping' => $package['capping'],
                        'accountType' => $users['account_type'],
                    );
                    $this->Main_model->update('tbl_users', array('user_id' => $user['user_id']), $topupData);
                    $roiData = [
                        'user_id' => $user['user_id'],
                        'amount' => $package['commision'] * $package['days'],
                        'days' => $package['days'],
                        'roi_amount' => $package['commision'],
                    ];
                    $this->Main_model->add('tbl_roi', $roiData);
                    $this->Main_model->update_directs($user['sponser_id']);
                    $checkSponser = $this->Main_model->get_single_record('tbl_users',['user_id' => $user['sponser_id']],'paid_status');
                    if($checkSponser['paid_status'] == 1){
                        $DirectIncome = array(
                            'user_id' => $user['sponser_id'],
                            'amount' => $package['direct_income'],
                            'type' => 'direct_income',
                            'description' => 'Refferal Points from Activation of Member '.$user['user_id'],
                        );
                        $this->Main_model->add('tbl_income_wallet', $DirectIncome);
                    }
                    $this->update_business($user['user_id'], $user['user_id'], $level = 1, $package['bv'], $type = 'topup');
                    $this->update_units($user['user_id'] , $user['sponser_id'], $package['commision']);
                    $this->Main_model->update('tbl_topup_request',['user_id' => $user['user_id']],['status' => 1]);
                    $this->session->set_flashdata('message','User ID Activated successfully');
                    redirect('Admin/Package/topupRequest');
                }else{
                    $this->session->set_flashdata('message','This User ID is already activated');
                    redirect('Admin/Package/topupRequest');
                }
            }else{
                $this->session->set_flashdata('message','This User ID is invalid');
                redirect('Admin/Package/topupRequest');
            }
        //}
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function activateAccount2($user_id){
        if (is_admin()) { 
            $user = $this->Main_model->get_single_record('tbl_users',['paid_status' => 0,'user_id' => $user_id],'user_id,sponser_id');
        //foreach($users as $key => $u){
            if(!empty($user['user_id'])){
                $coinPayment = $this->Main_model->get_single_record('tbl_coinbase_transactions',['user_id' => $user['user_id'],'status' => 'charge:confirmed'],'*');
                if(!empty($coinPayment['user_id'])){
                    $package = $this->Main_model->get_single_record('tbl_package',['price' => $coinPayment['data']],'*');
                    $topupData = array(
                        'paid_status' => 1,
                        'package_id' => $package['id'],
                        'package_amount' => $package['price'],
                        'topup_date' => date('Y-m-d H:i:s'),
                        'capping' => $package['capping']
                    );
                    $this->Main_model->update('tbl_users', array('user_id' => $user['user_id']), $topupData);
                    $roiData = [
                        'user_id' => $user['user_id'],
                        'amount' => $package['commision'] * $package['days'],
                        'days' => $package['days'],
                        'roi_amount' => $package['commision'],
                    ];
                    $this->Main_model->add('tbl_roi', $roiData);
                    $this->Main_model->update_directs($user['sponser_id']);
                    $checkSponser = $this->Main_model->get_single_record('tbl_users',['user_id' => $user['sponser_id']],'paid_status');
                    if($checkSponser['paid_status'] == 1){
                        $DirectIncome = array(
                            'user_id' => $user['sponser_id'],
                            'amount' => $package['direct_income'],
                            'type' => 'direct_income',
                            'description' => 'Refferal Points from Activation of Member '.$user['user_id'],
                        );
                        $this->Main_model->add('tbl_income_wallet', $DirectIncome);
                    }
                    $this->update_business($user['user_id'], $user['user_id'], $level = 1, $package['bv'], $type = 'topup');
                    $this->update_units($user['user_id'] , $user['sponser_id'], $package['commision']);
                }else{
                    $this->session->set_flashdata('message','This User ID already activated');
                    redirect('Admin/Task/ApprovedTransactions');
                }
            }else{
                $this->session->set_flashdata('message','This User ID already activated');
                redirect('Admin/Task/ApprovedTransactions');
            }
        //}
        } else {
            redirect('Admin/Management/login');
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

    private function add_counts($user_name , $downline_id , $level) {
        $user = $this->Main_model->get_single_record('tbl_users', array('user_id' => $user_name), $select = 'upline_id , position,user_id');
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
            $this->Main_model->update_count($c, $user['upline_id']);
            $downlineArray = array(
                'user_id' => $user['upline_id'],
                'downline_id' => $downline_id,
                'position' => $user['position'],
                'created_at' => date('Y-m-d h:i:s'),
                'level' => $level,
            );
            $this->Main_model->add('tbl_downline_count', $downlineArray);
            $user_name = $user['upline_id'];

            if ($user['upline_id'] != '') {
                $this->add_counts($user_name, $downline_id, $level + 1);
            }
        }
    }

    private function add_sponser_counts($user_name, $downline_id, $level) {
        $user = $this->Main_model->get_single_record('tbl_users', array('user_id' => $user_name), $select = 'sponser_id,user_id');
        if ($user['sponser_id'] != '') {
                $downlineArray = array(
                    'user_id' => $user['sponser_id'],
                    'downline_id' => $downline_id,
                    'position' => '',
                    'created_at' => 'CURRENT_TIMESTAMP',
                    'level' => $level,
                );
                $this->Main_model->add('tbl_sponser_count', $downlineArray);
                $user_name = $user['sponser_id'];
                $this->add_sponser_counts($user_name, $downline_id, $level + 1);
        }
    }


    ////
}
