<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recharge extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security'));
        $this->load->model(array('User_model'));
        $this->load->helper(array('user', 'security'));
        $this->api_key = '150862237342121';
        $this->api_url = 'https://joloapi.com/api/demo';
        $this->api_user_id = 'eindians';
    }

    public function index() {
        if (is_logged_in()) {
            $response = [];
            $response['mob'] = '';
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('mob', 'Phone', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
                    $withdraw_amount = $this->input->post('amount');
                    $master_key = $this->input->post('master_key');
                    $response['mob'] = $data['mob'];
                    $balance = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '"', 'ifnull(sum(amount),0) as balance');
                    if ($balance['balance'] >= $withdraw_amount) {
//                        if ($user['master_key'] == $master_key) {
                        if ($user['paid_status'] == 1) {
                            $myorderid = $this->generate_order_id();
                            $this->session->set_flashdata('message', 'Please Purchase Api License');
                            // $ch = curl_init();
                            // $timeout = 61;
                            // $myurl = "https://joloapi.com/api/v1/recharge.php?userid=" . $this->api_user_id . "&key=" . $this->api_key . "&operator=" . $data['operator_code'] . "&service=" . $data['mob'] . "&amount=" . $data['amount'] . "&orderid=" . $myorderid;
                            // curl_setopt($ch, CURLOPT_URL, $myurl);
                            // curl_setopt($ch, CURLOPT_HEADER, 0);
                            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                            // $file_contents = curl_exec($ch);
                            // $curl_error = curl_errno($ch);
                            // curl_close($ch);

                            // if (!empty($file_contents)) {
                            //     $jsondata = json_decode($file_contents, true);
                            //     $countxx = count($jsondata);
                            //     if ($jsondata['status'] == 'SUCCESS') {
                            //         $DirectIncome = array(
                            //             'user_id' => $this->session->userdata['user_id'],
                            //             'amount' => - $withdraw_amount,
                            //             'type' => 'recharge_amount',
                            //             'description' => 'Mobile Recharge',
                            //         );
                            //         $this->User_model->add('tbl_income_wallet', $DirectIncome);
                            //         $transactionArr = array(
                            //             'user_id' => $this->session->userdata['user_id'],
                            //             'operator' => $data['operator_code'],
                            //             'amount' => $data['amount'],
                            //             'status' => $jsondata['status'],
                            //             'orderid' => $myorderid,
                            //             'service' => $data['mob'],
                            //         );
                            //         $this->User_model->add('tbl_recharge', $transactionArr);
                            //         $this->session->set_flashdata('message', $jsondata['status']);
                            //     } else {
                            //         if ($jsondata['error'] == 'Insufficient API balance') {
                            //             $this->session->set_flashdata('message', 'Server Not Responding Please Try Again');
                            //         } else {
                            //             $this->session->set_flashdata('message', $jsondata['error']);
                            //         }
                            //     }
                            // } else {
                            //     $this->session->set_flashdata('message', 'Api Not Responding Please Try Again');
                            // }
                        } else {
                            $this->session->set_flashdata('message', 'Please Activate Your Account For Recharge');
                        }
//                        } else {
//                            $this->session->set_flashdata('message', 'Invalid Master Key');
//                        }
                    } else {
                        $this->session->set_flashdata('message', 'Insuffcient Balance');
                    }
                } else {
                    $this->session->set_flashdata('message', $this->validation_error());
                }
            }
            $this->load->view('Recharge/recharge_index.php', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function bank_transfer_summary() {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = 'Bank Transfer Summary';
            $response['transactions'] = $this->User_model->get_records('tbl_money_transfer', array('user_id' => $this->session->userdata['user_id']), '*');
            $this->load->view('bank_transfer_summary', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function findoperator($phone = '') {
        if (is_logged_in()) {
            $response = [];
            $response['success'] = 0;
            $ch = curl_init();
            $timeout = 61;
            $myurl = "https://joloapi.com/api/v1/operatorfinder.php?userid=" . $this->api_user_id . "&key=" . $this->api_key . "&mob=" . $phone;
            curl_setopt($ch, CURLOPT_URL, $myurl);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $file_contents = curl_exec($ch);
            $curl_error = curl_errno($ch);
            curl_close($ch);
            if (!empty($file_contents)) {
                $jsondata = json_decode($file_contents, true);
                if ($jsondata['status'] == 'SUCCESS') {
                    $response['data'] = $jsondata;
                    $response['success'] = 1;
                } else {
                    $response['message'] = $jsondata['error'];
                }
            } else {
                $countxx = "0"; //fake    
                $response['success'] = 0;
                $response['message'] = 'Api Not Responding';
            }
            echo json_encode($response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function findplan($operator_code = '', $circle_code = '') {
        if (is_logged_in()) {
            $response = [];
            $response['success'] = 0;
            $ch = curl_init();
            $timeout = 61;
            $myurl = "https://joloapi.com/api/v1/operatorplanfinder.php?userid=" . $this->api_user_id . "&key=" . $this->api_key . "&operator_code=" . $operator_code . "&circle_code=" . $circle_code;
            curl_setopt($ch, CURLOPT_URL, $myurl);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $file_contents = curl_exec($ch);
            $curl_error = curl_errno($ch);
            curl_close($ch);
            if (!empty($file_contents)) {
                $jsondata = json_decode($file_contents, true);
                if ($jsondata['status'] == 'SUCCESS') {
                    $response['data'] = $jsondata;
                    $response['success'] = 1;
                } else {
                    $response['message'] = $jsondata['error'];
                }
            } else {
                $countxx = "0"; //fake    
                $response['success'] = 0;
                $response['message'] = 'Api Not Responding';
            }
            echo json_encode($response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function History() {
        if (is_logged_in()) {
            $response = array();
            $response['header'] = 'Recharge History';
            $response['transactions'] = $this->User_model->get_records('tbl_recharge', array('user_id' => $this->session->userdata['user_id']), '*');
            $this->load->view('Recharge/recharge_history', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function generate_order_id() {
        $order_id = rand(10000, 99999);
        $order = $this->User_model->get_single_record('tbl_recharge', array('orderid' => $order_id), 'orderid');
        if (!empty($order)) {
            return $this->generate_order_id();
        } else {
            return $order_id;
        }
    }

    public function DTH() {
        if (is_logged_in()) {
            $response = [];
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('service', 'Customer ID', 'trim|required|xss_clean');
                $this->form_validation->set_rules('master_key', 'Master Key', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    // $user_id = $data['user_id'];
                    $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
                    $withdraw_amount = $this->input->post('amount');
                    $master_key = $this->input->post('master_key');
                    $balance = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '"', 'ifnull(sum(amount),0) as balance');

                    if ($balance['balance'] >= $withdraw_amount) {
//                        if ($user['master_key'] == $master_key) {
                        if ($user['paid_status'] == 1) {
                            $myorderid = $this->generate_order_id();
                            $ch = curl_init();
                            $timeout = 61;
                            echo $myurl = "https://joloapi.com/api/v1/recharge.php?userid=" . $this->api_user_id . "&key=" . $this->api_key . "&operator=" . $data['operator_code'] . "&service=" . $data['service'] . "&amount=" . $data['amount'] . "&orderid=" . $myorderid;
                            //https://joloapi.com/api/v1/recharge.php?userid=xx&key=xx&operator=xx&service=xx&amount=xx&orderid=xx
                            curl_setopt($ch, CURLOPT_URL, $myurl);
                            curl_setopt($ch, CURLOPT_HEADER, 0);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                            $file_contents = curl_exec($ch);
                            $curl_error = curl_errno($ch);
                            curl_close($ch);

                            if (!empty($file_contents)) {
                                $jsondata = json_decode($file_contents, true);
                                $countxx = count($jsondata);
                                if ($jsondata['status'] == 'SUCCESS') {
                                    $DirectIncome = array(
                                        'user_id' => $this->session->userdata['user_id'],
                                        'amount' => - $withdraw_amount,
                                        'type' => 'recharge_amount',
                                        'description' => 'DTH Recharge',
                                    );
                                    $this->User_model->add('tbl_income_wallet', $DirectIncome);
                                    $transactionArr = array(
                                        'user_id' => $this->session->userdata['user_id'],
                                        'operator' => $data['operator_code'],
                                        'amount' => $data['amount'],
                                        'status' => $jsondata['status'],
                                        'orderid' => $myorderid,
                                        'service' => $data['service'],
                                    );
                                    $this->User_model->add('tbl_recharge', $transactionArr);
                                    $this->session->set_flashdata('message', $jsondata['status']);
                                } else {
                                    if ($jsondata['error'] == 'Insufficient API balance') {
                                        $this->session->set_flashdata('message', 'Server Not Responding Please Try Again');
                                    } else {
                                        $this->session->set_flashdata('message', $jsondata['error']);
                                    }
                                }
                            } else {
                                $this->session->set_flashdata('message', 'Api Not Responding Please Try Again');
                            }
                        } else {
                            $this->session->set_flashdata('message', 'Please Activate Your Account For Recharge');
                        }
//                        } else {
//                            $this->session->set_flashdata('message', 'Invalid Master Key');
//                        }
                    } else {
                        $this->session->set_flashdata('message', 'Insuffcient Balance');
                    }
                } else {
                    $this->session->set_flashdata('message', $this->validation_error());
                }
            }
            $this->load->view('Recharge/dth', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function dth_operators($op_code) {
        if (is_logged_in()) {
            $response = [];
            $response['success'] = 0;
            $ch = curl_init();
            $timeout = 61;
            $myurl = "https://joloapi.com/api/v1/operatorplanfinder_dth.php?userid=" . $this->api_user_id . "&key=" . $this->api_key . "&operator_code=DT&dthid=" . $op_code . "&circle_code=AL";
            //https://joloapi.com/api/v1/operatorfinder_dth.php?userid=xx&key=xx&dthid=xx
            curl_setopt($ch, CURLOPT_URL, $myurl);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $file_contents = curl_exec($ch);
            $curl_error = curl_errno($ch);
            curl_close($ch);
            if (!empty($file_contents)) {
                $jsondata = json_decode($file_contents, true);
                if ($jsondata['status'] == 'SUCCESS') {
                    $response['data'] = $jsondata;
                    $response['success'] = 1;
                } else {
                    $response['message'] = $jsondata['error'];
                }
            } else {
                $countxx = "0"; //fake    
                $response['success'] = 0;
                $response['message'] = 'Api Not Responding';
            }
            echo json_encode($response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

}
