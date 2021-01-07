<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Saldo extends CI_Model
{

    public function add_saldo()
    {
        $tanggal = date_format(date_create($this->input->post('tanggal')), 'Y-m-d');
        $kategori = $this->input->post('kategori');
        $nt_rp = $this->input->post('nt_rp');
        $nt_rl = $this->input->post('nt_rl');
        $saldo = $this->input->post('saldo');
        $data = [
            'tanggal' => $tanggal,
            'kategori' => $kategori,
            'nilai_tukar_rp' => $nt_rp,
            'nilai_tukar_rl' => $nt_rl,
            'saldo_usd' => $saldo,
        ];
        return $this->db->insert('tb_saldo', $data);
    }

    function list_saldo()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;

        $keyword = $this->input->post('keyword');
        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query = "SELECT a.saldo_usd, a.kategori, a.nilai_tukar_rp, SUM(b.total_rp) AS sisa_saldo FROM tb_saldo a, tb_pengeluaran b WHERE a.kategori = b.kategori AND
            a.kategori LIKE '%$keyword%'
            OR a.saldo_usd LIKE '%$keyword%'
                ORDER BY a.id_saldo ASC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        } else {
            if ($keyword == '') {
                $query = "SELECT a.id_saldo, a.saldo_usd, a.kategori, a.nilai_tukar_rp, SUM(b.total_rp) AS sisa_saldo FROM tb_saldo a, tb_pengeluaran b WHERE a.kategori = b.kategori ORDER BY id_saldo ASC";
            } else {
                $query = "SELECT a.id_saldo, a.saldo_usd, a.kategori, a.nilai_tukar_rp, SUM(b.total_rp) AS sisa_saldo FROM tb_saldo a, tb_pengeluaran b WHERE a.kategori = b.kategori AND
                (a.kategori LIKE '%$keyword%'
                OR a.saldo_usd LIKE '%$keyword%')
                ORDER BY a.id_saldo ASC";
            }
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        }
        foreach ($data_tabel as $hasil) {
            $row = array();
            $kategori = "'" . $hasil->kategori . "'";
            $saldo = "'" . $hasil->saldo_usd . "'";
            $row[] = $no++;
            $row[] = $hasil->kategori;
            $row[] = 'Rp ' . number_format($hasil->saldo_usd * $hasil->nilai_tukar_rp);
            $row[] = 'Rp ' . number_format(($hasil->saldo_usd * $hasil->nilai_tukar_rp) - $hasil->sisa_saldo);
            $row[] = '<button class="btn btn-primary btn-xs" id="btn_edit_' . $hasil->id_saldo . '" onclick="func_edit(' . $hasil->id_saldo . ',' . $kategori . ')"><i class="ace-icon fa fa-edit bigger-60"></i> Edit</button>
            <button class="btn btn-danger btn-xs" id="btn_del_' . $hasil->id_saldo . '" onclick="func_del(' . $hasil->id_saldo . ')"><i class="ace-icon fa fa-trash bigger-60"></i> Delete</button>';
            $data[] = $row;
        }
        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $count_all,
            "recordsFiltered"   => $count_all,
            "data"              => $data,
        );
        return $output;
    }
}
