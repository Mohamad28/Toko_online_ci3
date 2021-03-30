<?php

class Kategori extends CI_Controller
{
    public function nintendo()
    {
        $data['nintendo'] = $this->model_kategori->data_nintendo()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('nintendo', $data);
        $this->load->view('templates/footer');
    }
    public function xbox()
    {
        $data['xbox'] = $this->model_kategori->data_xbox()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('xbox', $data);
        $this->load->view('templates/footer');
    }
    public function playstation()
    {
        $data['playstation'] = $this->model_kategori->data_playstation()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('playstation', $data);
        $this->load->view('templates/footer');
    }
}
