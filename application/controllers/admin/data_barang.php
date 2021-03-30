<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }

    public function index()
    {

        $data['title'] = 'Data Barang';
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "gambar gagal di upload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar
        );

        $this->model_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function edit($id)
    {
        $where = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_brg');
        $nama_brg = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        $data = array(
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok
        );

        $where = array(
            'id_brg' => $id
        );

        $this->model_barang->update_data($where, $data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function hapus($id)
    {
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function detail($id_brg)
    {
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/detail_barang_admin', $data);
        $this->load->view('templates_admin/footer');
    }
}




// start
        // {
    //     $config['upload_path']          = './uploads/';
    //     $config['allowed_types']        = 'gif|jpg|png|jpeg';
    //     $config['max_size']             = 100000;
    //     $config['max_width']            = 100000;
    //     $config['max_height']           = 100000;

    //     $this->load->library('upload', $config);
    //     $this->upload->initialize($config);

    //     if (!$this->upload->do_upload('gambar')) {
    //         echo "Gagal upload gambar!";
    //     } else {
    //         $gambar = $this->upload->data();
    //         $gambar = $gambar['file_name'];
    //         $nama_brg = $this->input->post('nama_brg');
    //         $keterangan = $this->input->post('keterangan');
    //         $kategori = $this->input->post('kategori');
    //         $harga = $this->input->post('harga');
    //         $stok = $this->input->post('stok');

    //         $data = array(
    //             'nama_brg' => $nama_brg,
    //             'keterangan' => $keterangan,
    //             'kategori' => $kategori,
    //             'harga' => $harga,
    //             'stok' => $stok,
    //             'gambar' => $gambar,
    //         );

    //         $this->db->insert('tb_barang', $data);
    //         $this->session->set_flasdata('message', '<div 
    //                     class="alert alert-success" role="alert">
    //                     Berhasil upload Barang</div>');
    //         redirect('admin/data_barang/index');
    //     }



    // star

        // {

    //     $nama_brg = $this->input->post('nama_brg');
    //     $keterangan = $this->input->post('keterangan');
    //     $kategori = $this->input->post('kategori');
    //     $harga = $this->input->post('harga');
    //     $stok = $this->input->post('stok');
    //     $gambar = $_FILES['gambar']['name'];
    //     if ($gambar = '') {
    //     } else {
    //         $config['upload_path'] = './uploads/';
    //         $config['allowed_types'] = 'jpg|jpeg|png|gif';
    //         $config['max_size'] = '4000';

    //         // $this->load->library('upload', $config);
    //         $this->load->library('upload');
    //         $this->upload->initialize($config);
    //         if (!$this->upload->do_upload('gambar')) {
    //             echo "Gambar Gagal diupload!";
    //         } else {
    //             $gambar = $this->upload->data('file_name');
    //         }
    //     }

    //     $data = array(
    //         'nama_brg' => $nama_brg,
    //         'keterangan' => $keterangan,
    //         'kategori' => $kategori,
    //         'harga' => $harga,
    //         'stok' => $stok,
    //         'gambar' => $gambar
    //     );

    //     $this->model_barang->tambah_barang($data, 'tb_barang');
    //     redirect('admin/data_barang/index');
    // }