<?php

class User extends CI_Controller
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
    $data['title'] = 'pengguna';
    $data['user'] = $this->user_akun->show_data()->result();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar', $data);
    $this->load->view('admin/user', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_akun()
  {
    $nama = $this->input->post('nama');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $role_id = $this->input->post('role_id');



    $data = array(
      'nama' => $nama,
      'username' => $username,
      'password' => $password,
      'role_id' => $role_id,
    );

    $this->user_akun->tambah_akun($data, 'tb_user');
    redirect('admin/user/index');
  }

  public function hapus($id)
  {
    $this->user_akun->hapus_data($id);
    redirect('admin/user/index');
  }
}
