<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Login'
        );
        //Laman Login
        $this->load->view('template/header', $data);
        $this->load->view('login');
    }

    public function register()
    {
        $data = array(
            'title' => 'Login'
        );
        //Laman Login
        $this->load->view('template/header', $data);
        $this->load->view('register');
    }
}