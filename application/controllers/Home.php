<?php

class Home extends CI_Controller
{

    /** 
     * Tampilan default Kontroller Home (Landing Page)
     */
    public function index()
    {
        $data = array(
            'title' => 'Home',
            'produk' => $this->AdminModel->get_produk()->result()
        );

        $this->load->view('template/header', $data);
        $this->load->view('index', $data);
        $this->load->view('template/modal', $data);
        $this->load->view('template/footer', $data);
    }
}