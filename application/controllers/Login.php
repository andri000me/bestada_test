<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('vw_login/vw_login');
        } else {
            $valid = $this->M_login->user_check();
            if ($valid->num_rows() > 0) {
                $data = $valid->row_array();
                $id = $data['id_user'];
                $user = $data['username'];
                $pass = $data['password'];
                $sesdata = [
                    'id_user' => $id,
                    'username' => $user,
                    'password' => $pass,
                    'logged_in_admin_saldo' => true
                ];
                $this->session->set_userdata($sesdata);
                redirect('saldo');
            } else {
                // echo "gagal wle!";
                // $this->session->set_flashdata('msg','Username or Password is Wrong');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        session_destroy();
        redirect('login');
    }
}
