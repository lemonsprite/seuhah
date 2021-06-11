<?php

class Admin extends CI_Controller
{
    public function index()
    {
        if($this->session->status == false)
        {
            // Dashboard
            $data = array(
                'title' => 'Dashboard'
            );
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('admin/template/footer', $data);
        } else {
            redirect(base_url('login'));
        }
            
    }
}