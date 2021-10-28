<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email','pagination'));
        $this->load->model(array('Main_model'));
        $this->load->helper(array('admin', 'security'));
    }


      function addProduct(){
        if (is_admin()) {
            $response = array();
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());

                 $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('discount', 'Discount', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('mrp', 'MRP', 'trim|required|xss_clean');
                //$this->form_validation->set_rules('dp', 'DP', 'trim|required|xss_clean');
                //$this->form_validation->set_rules('bv', 'Business Volume', 'trim|required|xss_clean');
               
                $data = html_escape($data);
                // if($data['type'] == 'image'){
                    if (!empty($_FILES['Pimage']['name'])) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
                        $config['file_name'] = 'product'.time();
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('Pimage')) {
                            $this->session->set_flashdata('message', $this->upload->display_errors());
                        } else {
                            $fileData = array('upload_data' => $this->upload->data());
                            $fileData = array('upload_data' => $this->upload->data());
                            $userData['image'] = $fileData['upload_data']['file_name'];
                            $userData['mrp'] = $data['mrp'];
                            //$userData['dp'] = $data['dp'];
                            $userData['discount'] = $data['discount'];
                            //$userData['bv'] = $data['bv'];
                            $userData['title'] = $data['product_name'];
                          
                            $updres = $this->Main_model->add('tbl_products',$userData);
                            if ($updres == true) {
                                $this->session->set_flashdata('message', 'Product Uploaded Successfully');
                            } else {
                                $this->session->set_flashdata('message', 'There is an error while uploading Product, Please try Again ..');
                            }
                        }
                    }else{
                        $this->session->set_flashdata('message', 'There is an error while uploading Product, Please try Again ..');
                    }
                // }
            }
            // $response['popup'] = $this->Main_model->get_single_record('tbl_user_popup',[],'status');
            // $response['users'] = 1;
            $response['header'] = 'Add Products'; 
            $this->load->view('edit_product.php',$response);
        } else {
            redirect('Admin/Management/login');
        }
    }

     public function productList(){
        if(is_admin()){
            $response['products'] = $this->Main_model->get_records('tbl_products',[],'*');
            $this->load->view('products_list',$response);
        }else{
            redirect('Admin/Management/login');
        }
    }

    public function deleteProduct($id=""){
        if(is_admin()){
            $check = $this->Main_model->get_single_record('tbl_products',['id' => $id],'*');
            if(!empty($check)){
                $this->Main_model->delete('tbl_products',$check['id']);
                redirect('Admin/Products/productList');
            }else{
                $this->session->set_flashdata('message','Product Not Found!');
                redirect('Admin/Products/productList');
            }
        }else{
            redirect('Admin/Management/login');
        }
    }


    public function addVender(){
        if(is_admin()){
            if($this->input->server("REQUEST_METHOD") == "POST"){
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('name','Vender Name','trim|required|xss_clean');
                // $this->form_validation->set_rules('city','City','trim|required|xss_clean');
                // $this->form_validation->set_rules('state','State','trim|required|xss_clean');
                if($this->form_validation->run() != false ){
                    if (!empty($_FILES['image']['name'])) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'jpg|png|pdf|jpeg';
                        $config['file_name'] = 'vender'.time();
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('image')) {
                            $this->session->set_flashdata('message', $this->upload->display_errors());
                        } else {
                            $fileData = array('upload_data' => $this->upload->data());
                            $fileData = array('upload_data' => $this->upload->data());
                            $userData['image'] = $fileData['upload_data']['file_name'];
                            $userData['name'] = $data['name'];
                            $userData['city'] = $data['city'];
                            $userData['state'] = $data['state'];
                            $updres = $this->Main_model->add('tbl_vender',$userData);
                            if ($updres == true) {
                                $this->session->set_flashdata('message', 'Vender Uploaded Successfully');
                            } else {
                                $this->session->set_flashdata('message', 'There is an error while uploading Product, Please try Again ..');
                            }
                        }
                    }else{
                        $this->session->set_flashdata('message', 'There is an error while uploading Product, Please try Again ..');
                    }
                }else{
                    $this->session->set_flashdata('message',validation_errors());
                }
            }
            $response['header'] = 'Add Vender';
            $response['city'] = $this->Main_model->get_records('cities',[],'*');
            $response['state'] = $this->Main_model->get_records('states',[],'*');

            $this->load->view('add_vender',$response);
        }else{
            redirect('Admin/Management/login');
        }
    } 


     public function orderDetails(){
        if(is_admin()){
            $where=array();
            $config['total_rows'] = $this->Main_model->get_sum('tbl_orders', $where, 'ifnull(count(id),0) as sum');
            $config['base_url'] = base_url() . 'Admin/Products/orderDetails';
            $config ['uri_segment'] = 4;
            $config['per_page'] = 50;
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
            $response['order'] = $this->Main_model->get_limit_records('tbl_orders', $where, '*', $config['per_page'], $segment);
            foreach($response['order'] as $key => $order){
                $response['order'][$key]['orderName'] = $this->Main_model->get_single_record('tbl_users',['user_id' => $order['seller_id']],'name');
                $response['order'][$key]['orderDetails'] = $this->Main_model->get_single_record('tbl_order_details',['order_id' => $order['order_id']],'*');
                $response['order2'] = $this->Main_model->get_records('tbl_order_details',['order_id' => $order['order_id']],'product_id');
                $response['order'][$key]['product'] = $this->Main_model->get_single_record('tbl_products',['id' =>$response['order'][$key]['orderDetails']['product_id']],'*');
            }
            $response['header'] = 'Order Details';
            $this->load->view('orderDetail', $response);

        }else{
            redirect('Admin/Management/login');
        }
    }

  
}