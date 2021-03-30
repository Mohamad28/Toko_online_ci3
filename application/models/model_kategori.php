<?php

class Model_kategori extends CI_Model
{
    public function data_nintendo()
    {
        return  $this->db->get_where("tb_barang", array('kategori' => 'nintendo'));
    }

    public function data_xbox()
    {
        return  $this->db->get_where("tb_barang", array('kategori' => 'xbox'));
    }

    public function data_playstation()
    {
        return  $this->db->get_where("tb_barang", array('kategori' => 'playstation'));
    }
}
