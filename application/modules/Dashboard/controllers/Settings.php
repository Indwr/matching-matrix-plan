<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
        $this->load->model(array('Shopping_model','User_model'));
        $this->load->helper(array('user', 'birthdate', 'security', 'email'));
    }

    public function index() {
        if (is_logged_in()) {
            $response['products'] = $this->Shopping_model->get_product();
            $this->load->view('Shopping/products', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function SendSmsUser() {
        if (is_logged_in()) {
            $response = array();
            $this->load->view('send_sms_user', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function SendYoutubeUser() {
        if (is_logged_in()) {
            $response = array();
            $this->load->view('send_youtube_user', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function BusinessPlan() {
        if (is_logged_in()) {
            $response = array();
            $this->load->view('businesss-plan', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function PurchaseCourse() {
        if (is_logged_in()) {
            $response = array();
            $this->load->view('purchase_course', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
    public function PurchaseSite() {
        if (is_logged_in()) {
            $response = array();
            $this->load->view('purchase_site', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    } 
    public function OnlineShopping() {
        if (is_logged_in()) {
            $response = array();
            $this->load->view('online_shopping', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function payout_summary() {
        if (is_logged_in()) {
            $response = array();
            $response['records'] = $this->User_model->payout_summary();
            foreach($response['records'] as $key => $record){
                //
                $incomes = $this->User_model->get_incomes('tbl_income_wallet', 'date(created_at) = "'.$record['date'].'" and user_id = "'.$this->session->userdata['user_id'].'" and amount > 0', 'ifnull(sum(amount),0) as sum,type');
                $response['records'][$key]['incomes'] = calculate_income($incomes);
            }
            $response['type'] = $this->User_model->get_records('tbl_income_wallet'," amount > '0' Group by type",'type');
            //pr($response,true);
            $this->load->view('payout_summary', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function week_payout_summary() {
        if (is_logged_in()) {
            $response = array();
            $response['records'] = $this->User_model->week_summary();
            foreach($response['records'] as $key => $record){
                //
                $incomes = $this->User_model->get_incomes('tbl_income_wallet', 'WEEK(created_at)%MONTH(created_at)+1 = "'.$record['date'].'" and user_id = "'.$this->session->userdata['user_id'].'" and amount > 0', 'ifnull(sum(amount),0) as sum,type');
                $response['records'][$key]['incomes'] = calculate_income($incomes);
            }
            $response['type'] = $this->User_model->get_records('tbl_income_wallet'," amount > '0' Group by type",'type');
            $this->load->view('week_payout_summary', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function weekWisePayout($date = '') {
        if (is_logged_in()) {
            $response['header'] = 'Week Payout Summary';
            // $config['base_url'] = base_url() . 'Dashboard/Settings/incomeLedgar';
            // $config['total_rows'] = $this->User_model->get_sum('tbl_income_wallet', 'date(created_at) = "'.$date.'" and user_id = "'.$this->session->userdata['user_id'].'"', 'ifnull(count(id),0) as sum');
            // $config ['uri_segment'] = 4;
            // $config['per_page'] = 100;
            // $this->pagination->initialize($config);
            // $segment = $this->uri->segment(4);
            $response['total_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'week(created_at)+1 = "'.$date.'" and user_id = "'.$this->session->userdata['user_id'].'"', 'ifnull(sum(amount),0) as total_income');
            $response['user_incomes'] = $this->User_model->get_records('tbl_income_wallet', 'week(created_at)+1 = "'.$date.'" and user_id = "'.$this->session->userdata['user_id'].'"', '*');
            //$response['segament'] = 0;
            // pr($response,true);
            $this->load->view('incomes', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function dateWisePayout($date = '') {
        if (is_logged_in()) {
            $response['header'] = 'Datewise Payout Summary';
            // $config['base_url'] = base_url() . 'Dashboard/Settings/incomeLedgar';
            // $config['total_rows'] = $this->User_model->get_sum('tbl_income_wallet', 'date(created_at) = "'.$date.'" and user_id = "'.$this->session->userdata['user_id'].'"', 'ifnull(count(id),0) as sum');
            // $config ['uri_segment'] = 4;
            // $config['per_page'] = 100;
            // $this->pagination->initialize($config);
            // $segment = $this->uri->segment(4);
            $response['total_income'] = $this->User_model->get_single_record('tbl_income_wallet', 'date(created_at) = "'.$date.'" and user_id = "'.$this->session->userdata['user_id'].'"', 'ifnull(sum(amount),0) as total_income');
            $response['user_incomes'] = $this->User_model->get_records('tbl_income_wallet', 'date(created_at) = "'.$date.'" and user_id = "'.$this->session->userdata['user_id'].'"', '*');
            //$response['segament'] = 0;
            // pr($response,true);
            $this->load->view('incomes', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }
}
