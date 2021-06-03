<?php

class Admin extends CI_Controller
{
    /**
     * Fungsi default controller Admin (Admin/Dashboard)
     */
    public function index()
    {
        // Dashboard
        $data = array(
            'title' => 'Dashboard'
        );
        $this->load->view('template/admin/adm.head', $data);
    }
}