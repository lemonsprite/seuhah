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
            'produk' => $this->AdminModel->get_produk(null,8)->result(),
            'user' => $this->AdminModel->get_user(array('id' => $this->session->id))->row_array(),
        );

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('home/template/footer', $data);
    }
    public function lamanbaru()
    {
        $data = array(
            'title' => 'Dashboard',
            'produk' => $this->AdminModel->get_produk()->result(),
            'user' => $this->AdminModel->get_user(array('id' => $this->session->id))->row_array(),
        );
        $this->load->view('home/indexbaru',$data);
    }
}