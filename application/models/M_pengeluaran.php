<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengeluaran extends CI_Model
{
    public function list_kategori()
    {
        $query = "SELECT * FROM tb_kategori WHERE aktif = 'Yes'";
        return $this->db->query($query)->result();
    }

    public function list_pengeluaran()
    {
        $data = array();
        $start = $_POST['start'];
        $length = $_POST['length'];
        $no = $start + 1;

        $keyword = $this->input->post('keyword');
        $kategori = $this->input->post('kategori');
        if (!empty($_POST['search']['value'])) {
            $keyword = $_POST['search']['value'];
            $query = "SELECT * FROM tb_pengeluaran WHERE 
                keterangan LIKE '%$keyword%'
                OR total_rp LIKE '%$keyword%'
                OR total_usd LIKE '%$keyword%'
                OR total_real LIKE '%$keyword%'
                OR lampiran LIKE '%$keyword%'
                ORDER BY id_pengeluaran ASC";
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        } else {
            if ($keyword == '') {
                $query = "SELECT * FROM tb_pengeluaran WHERE kategori = '$kategori' ORDER BY id_pengeluaran ASC";
            } else {
                $query = "SELECT * FROM tb_pengeluaran WHERE kategori = '$kategori' AND (
                keterangan LIKE '%$keyword%'
                OR total_rp LIKE '%$keyword%'
                OR total_usd LIKE '%$keyword%'
                OR total_real LIKE '%$keyword%'
                OR lampiran LIKE '%$keyword%')
                ORDER BY id_pengeluaran ASC";
            }
            $count_all = $this->db->query($query)->num_rows();
            $data_tabel = $this->db->query($query . " LIMIT $start,$length")->result();
        }
        foreach ($data_tabel as $hasil) {
            $row = array();
            $tanggal = "'" . date_format(date_create($hasil->tanggal), 'd-m-Y') . "'";
            $ket = "'" . $hasil->keterangan . "'";
            $total = "'" . $hasil->total_rp . "'";
            $kategori = "'" . $hasil->kategori . "'";
            $lampiran = "'" . $hasil->lampiran . "'";
            $row[] = $no++;
            $row[] = $hasil->keterangan;
            $row[] = 'Rp ' . number_format($hasil->total_rp);
            $row[] = $hasil->lampiran;
            $row[] = '<button class="btn btn-primary btn-xs" id="btn_edit_' . $hasil->id_pengeluaran . '" onclick="func_edit(' . $hasil->id_pengeluaran . ',' . $tanggal . ',' . $ket . ',' . $total . ',' . $kategori . ')"><i class="ace-icon fa fa-edit bigger-60"></i> Edit</button>
            <button class="btn btn-danger btn-xs" id="btn_del_' . $hasil->id_pengeluaran . '" onclick="func_del(' . $hasil->id_pengeluaran . ',' . $lampiran . ')"><i class="ace-icon fa fa-trash bigger-60"></i> Delete</button>';
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

    public function add_pengeluaran()
    {
        $tanggal = date_format(date_create($this->input->post('tanggal')), 'Y-m-d');
        $ket = $this->input->post('keterangan');
        $total = $this->input->post('total');
        $pilih_kategori = $this->input->post('pilih_kategori');
        $this->load->library('upload');
        $config['upload_path'] = './templates/images/lampiran';
        $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
        $config['max_size'] = '5020';  //5MB max
        $config['file_name'] = $_FILES['lampiran']['name'];
        $config['overwrite'] = false;
        $this->upload->initialize($config);
        if (!empty($_FILES['lampiran']['name'])) {
            if ($this->upload->do_upload('lampiran')) {
                $foto = $this->upload->data();
                $data = [
                    'tanggal' => $tanggal,
                    'keterangan' => $ket,
                    'total_rp' => $total,
                    'kategori' => $pilih_kategori,
                    'lampiran' => $foto['file_name'],
                ];
                return $this->db->insert('tb_pengeluaran', $data);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function edit_pengeluaran()
    {
        $tanggal = date_format(date_create($this->input->post('edit_tanggal')), 'Y-m-d');
        $id_pengeluaran = $this->input->post('id_pengeluaran');
        $ket = $this->input->post('edit_keterangan');
        $total = $this->input->post('edit_total');
        $pilih_kategori = $this->input->post('edit_pilih_kategori');
        $this->load->library('upload');
        if (!empty($_FILES['edit_lampiran']['name'])) {
            $config['upload_path'] = './templates/images/lampiran';
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|JPEG|PNG';
            $config['max_size'] = '5020';  //5MB max
            $config['file_name'] = $_FILES['edit_lampiran']['name'];
            $config['overwrite'] = false;
            $this->upload->initialize($config);
            if ($this->upload->do_upload('edit_lampiran')) {
                $foto = $this->upload->data();
                $data = [
                    'tanggal' => $tanggal,
                    'keterangan' => $ket,
                    'total_rp' => $total,
                    'kategori' => $pilih_kategori,
                    'lampiran' => $foto['file_name'],
                ];
                $this->db->where('id_pengeluaran', $id_pengeluaran);
                return $this->db->update('tb_pengeluaran', $data);
            } else {
                return false;
            }
        } else {
            $data = [
                'tanggal' => $tanggal,
                'keterangan' => $ket,
                'total_rp' => $total,
                'kategori' => $pilih_kategori,
            ];
            $this->db->where('id_pengeluaran', $id_pengeluaran);
            return $this->db->update('tb_pengeluaran', $data);
        }
    }

    function del_pengeluaran()
    {
        $id_pengeluaran = $this->input->post('id_pengeluaran');
        $lampiran = $this->input->post('lampiran');
        $path = './templates/images/lampiran/';
        @unlink($path . $lampiran);

        $this->db->where('id_pengeluaran', $id_pengeluaran);
        return $this->db->delete('tb_pengeluaran');
        // var_dump($email.$nama);
    }
}
