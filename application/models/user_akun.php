<?php

class user_akun extends CI_Model
{
    public function show_data()
    {
        return $this->db->get('tb_user');
    }

    public function tambah_akun($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function hapus_data($id)
    {
        $this->db->delete('tb_user', ['id' => $id]);
    }
}
