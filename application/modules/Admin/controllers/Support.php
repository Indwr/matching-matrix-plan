<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
        $this->load->model(array('Main_model'));
        $this->load->helper(array('admin', 'security'));
    }

    public function index() {
        if (is_admin()) {
            $response['users'] = $this->Main_model->get_chat_users();
            $this->load->view('support_messages1', $response);
        } else {
            redirect('Admin/Management/login');
        }
    }
    public function show_users() {
        if (is_admin()) {
            $response['users'] = $this->Main_model->get_chat_users();
            echo json_encode($response);
            exit();
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function user_messages($user_id) {
        if (is_admin()) {
            $response['messages'] = $this->Main_model->user_chat($user_id);
            echo json_encode($response);
        } else {
            redirect('Admin/Management/login');
        }
    }

    public function SubmitQuery() {
        if (is_admin()) {
            $message = $this->input->post('message');
            $user_id = $this->input->post('user_id');
            $messageArr = array(
                'user_id' => $user_id,
                'message' => $message,
                'sender' => 'admin'
            );
            $res = $this->Main_model->add('tbl_support_message', $messageArr);
            if ($res) {
                $data['message'] = 'Message Sent Successfully';
                $data['success'] = 1;
            } else {
                $data['message'] = 'Error while sending message';
                $data['success'] = 0;
            }
            echo json_encode($data);
            exit();
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function inbox() {
        if (is_admin()) {
            $response = array();
            $response['header'] = 'Inbox';
            $response['messages'] = $this->Main_model->get_records('tbl_support_message', array('user_id !=' => 'admin'), '*');
            foreach ($response['messages'] as $key => $value) {
                $response['messages'][$key]['name'] = $this->Main_model->get_single_record('tbl_users', 'user_id = "'.$value['user_id'].'"', 'name');
            }
            $this->load->view('composed_message', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function Outbox() {
        if (is_admin()) {
            $response = array();
            $response['header'] = 'Inbox';
            $response['messages'] = $this->Main_model->get_records('tbl_support_message', array('user_id =' => 'admin'), '*');
            $this->load->view('composed_message', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function Compose() {
        if (is_admin()) {
            $response = array();
            $response['header'] = 'Inbox';
            $response['messages'] = $this->Main_model->get_records('tbl_support_message', array('user_id !=' => 'admin'), '*');
            $this->load->view('composed_message', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function view($id){
        if (is_admin()) {
            $response = array();
            $data = $this->security->xss_clean($this->input->post());
            $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
            $this->form_validation->set_rules('remark', 'Remark', 'trim|xss_clean');
            if ($this->form_validation->run() != FALSE) {
                $packArr = array(
                    'status' => $data['status'],
                    'remark' => $data['remark'],
                );
                $res = $this->Main_model->update('tbl_support_message', array('id' => $id),$packArr);
                if ($res == TRUE) {
                    $this->session->set_flashdata('message', 'Remarks Updated Successfully');
                } else {
                    $this->session->set_flashdata('message', 'Error While Updating Remarks  Please Try Again ...');
                }   
            }
        
            $response['message'] = $this->Main_model->get_single_record('tbl_support_message', array('id' => $id), '*');
            $this->load->view('view_support_message', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
}
