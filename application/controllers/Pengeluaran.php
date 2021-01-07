<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in_admin_saldo') != TRUE) {
            redirect('login');
        }
        $this->load->model('M_pengeluaran');
    }

    public function index()
    {
        $data = ['title' => 'Pengeluaran'];
        $this->template->load('template', 'vw_pengeluaran/vw_tampil_pengeluaran', $data);
    }

    public function list_kategori()
    {
        $data = $this->M_pengeluaran->list_kategori();
        echo json_encode($data);
    }

    public function list_pengeluaran()
    {
        $data = $this->M_pengeluaran->list_pengeluaran();
        echo json_encode($data);
    }

    public function add_pengeluaran()
    {
        $data = $this->M_pengeluaran->add_pengeluaran();
        echo json_encode($data);
    }

    public function edit_pengeluaran()
    {
        $data = $this->M_pengeluaran->edit_pengeluaran();
        echo json_encode($data);
    }

    public function del_pengeluaran()
    {
        $data = $this->M_pengeluaran->del_pengeluaran();
        echo json_encode($data);
    }
}
