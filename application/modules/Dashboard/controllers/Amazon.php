<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Amazon extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security'));
        $this->load->model(array('User_model'));
        $this->load->helper(array('user', 'security'));
    }

    public function index() {
        if (is_logged_in()) {
            $response = array();
            $this->load->view('amazon', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

}
