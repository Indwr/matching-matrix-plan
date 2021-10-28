<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'encryption', 'form_validation', 'security', 'email'));
        $this->load->model(array('User_model'));
        $this->load->helper(array('user', 'birthdate', 'security', 'email'));
        $this->api_token = '';
    }

    public function index() {
        die('why are you here');
        $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => 'supermarts'), 'id,user_id,name,phone,netbanking,email');
        $ch = curl_init();
        $timeout = 61;
        $myurl = "https://jolosoft.com/dmr/cdmr_detail.php?mode=1&key=$this->api_token&service=" . urlencode($response['user']['phone']);
        curl_setopt($ch, CURLOPT_URL, $myurl);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        $curl_error = curl_errno($ch);
        curl_close($ch);
        if (!empty($file_contents)) {
            $jsondata = json_decode($file_contents, true);
            pr($jsondata);
            $countxx = count($jsondata);
        } else {
            $countxx = "0"; //fake
        }
        if ($countxx > 2) {
            //success
            $rcstatus = $jsondata['status'];
            $errormsg = $jsondata['error'];
            $fulldata = $jsondata['fulldata'];
        } else {
            //failed
            $rcstatus = $jsondata['status'];
            $errormsg = $jsondata['error'];
        }
    }

    public function ActivateBanking() {
        if (is_logged_in()) {
            $response = array();
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,name,phone,netbanking,email');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('otp', 'OTP', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $ch = curl_init();
                    $timeout = 61;
                    $myurl = "https://jolosoft.com/dmr/cdmr_signup_verify.php?mode=1&key=$this->api_token&service=" . urlencode($response['user']['phone']) . "&otp=" . $data['otp'];
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
                            $this->User_model->update('tbl_users', array('user_id' => $response['user']['user_id']), array('netbanking' => 1));
                            $this->session->set_flashdata('message', $jsondata['desc']);
                        } else {
                            $this->session->set_flashdata('message', 'Error while Activating Number');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'API Not Supported');
                    }
                }
            } else {
                // if($response['user']['netbanking'] == 0){
                $ch = curl_init();
                $timeout = 61;
                $myurl = "https://jolosoft.com/dmr/cdmr_signup.php?mode=1&key=$this->api_token&service=" . urlencode($response['user']['phone']) . "&name=" . urlencode($response['user']['user_id']) . "&address=" . urlencode($response['user']['user_id'] . ' Address') . "&email=" . urlencode($response['user']['user_id']) . "@gmail.com";
                curl_setopt($ch, CURLOPT_URL, $myurl);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                $file_contents = curl_exec($ch);
                $curl_error = curl_errno($ch);
                // pr($file_contents);
                curl_close($ch);
                if (!empty($file_contents)) {
                    $jsondata = json_decode($file_contents, true);
                    $countxx = count($jsondata);
                    // pr($jsondata['desc']);
                    if ($jsondata['status'] == 'SUCCESS') {
                        $this->session->set_flashdata('message', $jsondata['desc']);
                    } else {
                        $this->session->set_flashdata('message', $jsondata['error']);
                    }
                } else {
                    $this->session->set_flashdata('message', 'Error while Activating Number');
                }
                // }else{
                //     $this->session->set_flashdata('message', 'Mobile Banking is Already Activated');
                // }
            }
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,name,phone,netbanking,email');
            $this->load->view('activate_banking', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function BeneficiaryList() {
        if (is_logged_in()) {
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,name,phone,netbanking,email');
            $response['beneficiary'] = array();
            // if($response['user']['netbanking'] == 1){
            $ch = curl_init();
            $timeout = 61;
            $myurl = "https://jolosoft.com/dmr/cdmr_detail.php?mode=1&key=$this->api_token&service=" . urlencode($response['user']['phone']);
            curl_setopt($ch, CURLOPT_URL, $myurl);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $file_contents = curl_exec($ch);
            // pr($file_contents);
            $curl_error = curl_errno($ch);
            curl_close($ch);
            if (!empty($file_contents)) {
                $jsondata = json_decode($file_contents, true);
                $countxx = count($jsondata);
                // pr($jsondata);
                if ($jsondata['status'] == 'SUCCESS') {
                    $response['beneficiary'] = $jsondata['fulldata']['beneficiary'];
                } else {
                    $this->session->set_flashdata('message', 'Please Activate Your Banking');
                }
            } else {
                $countxx = "0"; //fake
            }
            // }
            $this->load->view('beneficiary_list', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function generate_order_id() {
        $order_id = rand(10000, 99999);
        $order = $this->User_model->get_single_record('tbl_money_transfer', array('orderid' => $order_id), 'orderid');
        if (!empty($order)) {
            return $this->generate_order_id();
        } else {
            return $order_id;
        }
    }

    public function withdraw_amount($beneficiry_id) {
        if (is_logged_in()) {
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
            $response['pool'] = $this->User_model->get_single_record('tbl_pool', 'user_id = "' . $this->session->userdata['user_id'] . '"', '*');
            $response['beneficiary_id'] = $beneficiry_id;
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|xss_clean');
                $this->form_validation->set_rules('master_key', 'Master Key', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    // $user_id = $data['user_id'];
                    $user = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), '*');
                    $kyc_status = $this->User_model->get_single_record('tbl_bank_details', array('user_id' => $this->session->userdata['user_id']), '*');
                    $withdraw_amount = $this->input->post('amount');
                    // $winto_user_id = $this->input->post('user_id');
                    $master_key = $this->input->post('master_key');
                    $balance = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '"', 'ifnull(sum(amount),0) as balance');
                    $today_money = $this->User_model->get_single_record('tbl_money_transfer', ' user_id = "' . $this->session->userdata['user_id'] . '"  and status = "SUCCESS" and date(created_at) = date(now())', '*');
                    if (empty($today_money)) {
                        if ($withdraw_amount >= 300 && $withdraw_amount <= 10000) {
                            if ($withdraw_amount % 100 == 0) {
                                if ($balance['balance'] >= $withdraw_amount) {
                                    if ($user['otp'] == $data['otp']) {
                                        if ($user['otp_time'] > date('Y-m-d H:i:s')) {
                                            if ($user['master_key'] == $master_key) {
                                                if ($user['paid_status'] == 1) {
                                                    $transfer_amount = round($data['amount'] * 90 / 100);
                                                    $myorderid = $this->generate_order_id();
                                                    $ch = curl_init();
                                                    $timeout = 61;
                                                    $myurl = "https://jolosoft.com/dmr/cdmr_transfer.php?mode=1&key=$this->api_token&service=" . urlencode($response['user']['phone']) . "&beneficiaryid=" . $beneficiry_id . "&orderid=" . $myorderid . "&amount=" . $transfer_amount;
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
                                                                'type' => 'bank_transfer',
                                                                'description' => 'Bank Transfer',
                                                            );
                                                            $this->User_model->add('tbl_income_wallet', $DirectIncome);
                                                            $transactionArr = array(
                                                                'user_id' => $this->session->userdata['user_id'],
                                                                'beneficiaryid' => $beneficiry_id,
                                                                'amount' => $transfer_amount,
                                                                'status' => $jsondata['status'],
                                                                'orderid' => $myorderid,
                                                                'payable_amount' => $withdraw_amount,
                                                            );
                                                            $this->User_model->add('tbl_money_transfer', $transactionArr);
                                                            $sms_text = 'Dear ' . $user['name'] . ', Your amount INR. ' . $transfer_amount . ' have been successfully credit into your Account By Eindians. Thank you. ' . base_url();
                                                            notify_user($transactionArr['user_id'], $sms_text);
                                                            // $this->session->set_flashdata('message', 'Transaction Completed Successfully');
                                                            $this->session->set_flashdata('message', $jsondata['desc']);
                                                        } else {
                                                            if ($jsondata['error'] == 'Insufficient API balance') {
                                                                $this->session->set_flashdata('message', 'Server Not Responding Please Try Again');
                                                            } else {
                                                                $this->session->set_flashdata('message', $jsondata['error']);
                                                            }
                                                        }
                                                    } else {
                                                        $this->session->set_flashdata('message', 'Api Not Responding Please Try Again');
                                                        // $countxx="0";//fake
                                                    }
                                                } else {
                                                    $this->session->set_flashdata('message', 'Please Activate Your Account For WIthdraw');
                                                }
                                            } else {
                                                $this->session->set_flashdata('message', 'Invalid Master Key');
                                            }
                                        } else {
                                            $this->session->set_flashdata('message', 'Otp Expired');
                                        }
                                    } else {
                                        $this->session->set_flashdata('message', 'Invalid Otp');
                                    }
                                } else {
                                    $this->session->set_flashdata('message', 'Insuffcient Balance');
                                }
                            } else {
                                $this->session->set_flashdata('message', 'Withdraw Amount is multiple of 100');
                            }
                        } else {
                            $this->session->set_flashdata('message', 'Minimum Withdraw Amount is 300');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'You Can Withdraw Only Once in a Day');
                    }
                } else {
                    $this->session->set_flashdata('message', 'erorrrrr');
                }
            }
            $response['balance'] = $this->User_model->get_single_record('tbl_income_wallet', ' user_id = "' . $this->session->userdata['user_id'] . '"', 'ifnull(sum(amount),0) as balance');
            $this->load->view('send_money_bank', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function AddBeneficiary() {
        if (is_logged_in()) {
            $response['user'] = $this->User_model->get_single_record('tbl_users', array('user_id' => $this->session->userdata['user_id']), 'id,user_id,name,phone,netbanking,email');
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $data = $this->security->xss_clean($this->input->post());
                $this->form_validation->set_rules('beneficiary_name', 'Beneficiary Name', 'trim|required|xss_clean');
                $this->form_validation->set_rules('beneficiary_account_no', 'Beneficiary Account Number', 'trim|required|xss_clean');
                $this->form_validation->set_rules('beneficiary_ifsc', 'IFSC Code', 'trim|required|xss_clean');
                if ($this->form_validation->run() != FALSE) {
                    $ch = curl_init();
                    $timeout = 61;
                    $myurl = "https://jolosoft.com/dmr/cdmr_beneficiary_reg_skipotp.php?mode=1&key=$this->api_token&service=" . urlencode($response['user']['phone']) . "&beneficiary_name=" . urlencode($data['beneficiary_name']) . "&beneficiary_ifsc=" . urlencode(strtoupper($data['beneficiary_ifsc'])) . "&beneficiary_account_no=" . urlencode($data['beneficiary_account_no']);
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
                    } else {
                        $countxx = "0"; //fake
                    }
                    if ($countxx > 2) {
                        //success
                        $rcstatus = $jsondata['status'];
                        $errormsg = $jsondata['error'];
                        $beneficiaryid = $jsondata['beneficiaryid'];
                    } else {
                        //failed
                        $rcstatus = $jsondata['status'];
                        $errormsg = $jsondata['error'];
                    }

                    if (!empty($file_contents)) {
                        if ($rcstatus == 'SUCCESS') {
                            $this->session->set_flashdata('message', "Beneficiary added successfully. Beneficiary ID: $beneficiaryid");
                        }

                        if ($rcstatus == 'FAILED') {
                            $this->session->set_flashdata('message', $errormsg);
                        }
                        // $countxx = count($jsondata);
                        // pr($jsondata['desc']);
                    } else {
                        $this->session->set_flashdata('message', 'API Not Supported');
                    }
                }
            }
            $this->load->view('add_beneficiary', $response);
        } else {
            redirect('Dashboard/User/login');
        }
    }

    public function jolo_callback_url() {
        //status=SUCCESS&operatortxnid=9001110002&joloorderid=Z123456789012345&userorderid=TEST123456
        $data = array();
        $res = array();
        $data['status'] = $this->input->post('status');
        $data['operatortxnid'] = $this->input->post('operatortxnid');
        $data['joloorderid'] = $this->input->post('joloorderid');
        $data['userorderid'] = $this->input->post('userorderid');
        $res = $this->User_model->update('tbl_money_transfer', array('orderid' => $data['userorderid']), $data);
        if ($res) {
            if ($data['status'] == 'FAILED') {
                $transaction = $this->User_model->get_single_record('tbl_money_transfer', array('orderid' => $data['userorderid']), '*');
                $DirectIncome = array(
                    'user_id' => $transaction['user_id'],
                    'amount' => $transaction['payable_amount'],
                    'type' => 'bank_transfer',
                    'description' => 'Failed Bank Transaction',
                );
                $this->User_model->add('tbl_income_wallet', $DirectIncome);
            }
            $res['status'] = 'SUCCESS';
            $res['message'] = 'Request Updated Successfully';
        } else {
            $res['status'] = 'FAILED';
            $res['message'] = 'Error While Updating Request';
        }
        echo json_encode($res);
    }

    public function generate_otp($user_id) {
        if (is_logged_in()) {
            $response = [];
            $user = $this->User_model->get_single_record('tbl_users', ['user_id' => $this->session->userdata['user_id']], 'id,user_id,phone,name,otp_time');
            if (!empty($user)) {
//                if($user['phone'] != '7448299559'){
                $updArr = ['otp' => rand(1000, 9999), 'otp_time' => date('Y-m-d H:i:s', strtotime('+5 minutes', strtotime(date('Y-m-d H:i:s'))))];
                $sms_text = 'Dear ' . $user['name'] . ', One Time Password for Bank Transaction is  ' . $updArr['otp'] . ' Thanks ' . base_url();
                notify_user($user['user_id'], $sms_text);
                $this->User_model->update('tbl_users', array('user_id' => $user['user_id']), $updArr);
                $response['success'] = true;
                $response['message'] = 'A One Time Password Sent on Your Registered Phone Number';
//                }else{
//                    $sms_text = 'Be Alert Hacker is trying';
//                    notify_user('ourdream', $sms_text);
//                    notify_user('ourdream1', $sms_text);
//                    $response['success'] = false;
//                    $response['message'] = 'Invalid User ID';
//                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Invalid User ID';
            }
            echo json_encode($response);
            exit();
        } else {
            redirect('Dashboard/User/login');
        }
    }

}
