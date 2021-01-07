<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in_admin_saldo') != TRUE) {
            redirect('login');
        }
        $this->load->model('M_kategori');
    }

    public function index()
    {
        // $this->load->view('vw_saldo/vw_tampil_saldo');
        $data = ['title' => 'Kategori'];
        $this->template->load('template', 'vw_kategori/vw_tampil_kategori', $data);
    }

    public function list_kategori()
    {
        $data = $this->M_kategori->list_kategori();
        echo json_encode($data);
    }

    public function add_kategori()
    {
        $data = $this->M_kategori->add_kategori();
        echo json_encode($data);
    }

    public function edit_kategori()
    {
        $data = $this->M_kategori->edit_kategori();
        echo json_encode($data);
    }

    public function del_kategori()
    {
        $data = $this->M_kategori->del_kategori();
        echo json_encode($data);
    }
}
