<?php

class Home extends CI_Controller
{


    public function index()
    {

        //asd
        $data = array(
            'title' => 'Home'
        );

        $this->load->view('template/header', $data);
        $this->load->view('index', $data);
        $this->load->view('template/modal', $data);
        $this->load->view('template/footer', $data);
    }
}