<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kategori extends CI_Model
{
    public function list_kategori()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;

        $keyword = $this->input->post('keyword');

        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query = "SELECT * FROM tb_kategori WHERE 
                keterangan LIKE '%$keyword%'
                OR note LIKE '%$keyword%'
                OR aktif LIKE '%$keyword%'
                ORDER BY id_kategori ASC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        } else {
            if ($keyword == '') {
                $query = "SELECT * FROM tb_kategori ORDER BY id_kategori ASC";
            } else {
                $query = "SELECT * FROM tb_kategori WHERE 
                keterangan LIKE '%$keyword%'
                OR note LIKE '%$keyword%'
                OR aktif LIKE '%$keyword%'
                ORDER BY id_kategori ASC";
            }
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        }
        foreach ($data_tabel as $hasil) {
            $row = array();
            $ket = "'" . $hasil->keterangan . "'";
            $note = "'" . $hasil->note . "'";
            $aktif = "'" . $hasil->aktif . "'";
            $row[] = $no++;
            $row[] = $hasil->keterangan;
            $row[] = $hasil->note;
            $row[] = $hasil->aktif == 'Yes' ? '<label style="color: blue;">Yes</label>' : '<label style="color: red;">No</label>';
            $row[] = '<button class="btn btn-primary btn-xs" id="btn_edit_' . $hasil->id_kategori . '" onclick="func_edit(' . $hasil->id_kategori . ',' . $ket . ',' . $note . ',' . $aktif . ')"><i class="ace-icon fa fa-edit bigger-60"></i> Edit</button>
            <button class="btn btn-danger btn-xs" id="btn_del_' . $hasil->id_kategori . '" onclick="func_del(' . $hasil->id_kategori . ')"><i class="ace-icon fa fa-trash bigger-60"></i> Delete</button>';
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

    public function add_kategori()
    {
        $ket = $this->input->post('ket');
        $note = $this->input->post('note');
        $aktif = $this->input->post('aktif');
        $data = [
            'keterangan' => $ket,
            'note' => $note,
            'aktif' => $aktif,
        ];
        return $this->db->insert('tb_kategori', $data);
    }
    public function edit_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $ket = $this->input->post('ket');
        $note = $this->input->post('note');
        $aktif = $this->input->post('aktif');
        $data = [
            'keterangan' => $ket,
            'note' => $note,
            'aktif' => $aktif,
        ];
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->update('tb_kategori', $data);
    }

    function del_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->delete('tb_kategori');
        // var_dump($email.$nama);
    }
}
