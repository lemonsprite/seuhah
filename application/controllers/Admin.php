<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->status == false || !isset($this->session->status))
        {
            redirect(base_url('home'));
        }
    }
    public function dashboard()
    {

        $member = $this->UserModel->get_member(null, 5);

        // Dashboard
        $data = array(
            'title' => 'Dashboard',
            'user' => $this->UserModel->get_user(array('id_user' => $this->session->id))->row_array(),
            'member' => $member->result(),
            'memberCount' => $member->num_rows()
        );


        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function member()
    {
        $member = $this->UserModel->get_member();

        // Dashboard
        $data = array(
            'title' => 'Member',
            'user' => $this->UserModel->get_user(array('id_user' => $this->session->id))->row_array(),
            'member' => $member->result(),
            'memberCount' => $member->num_rows()
        );


        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('admin/template/footer', $data);
    }
}
