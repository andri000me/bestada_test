<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saldo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in_admin_saldo') != TRUE) {
            redirect('login');
        }
        $this->load->model('M_saldo');
    }

    public function index()
    {
        // $this->load->view('vw_saldo/vw_tampil_saldo');
        $data = ['title' => 'Saldo'];
        $this->template->load('template', 'vw_saldo/vw_tampil_saldo', $data);
    }
}
