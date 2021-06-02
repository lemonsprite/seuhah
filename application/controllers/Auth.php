<?php

class Auth extends CI_Controller
{
    /**
     * Tampilan Login sebagai default Controller Auth
     */
    public function index()
    {
        $data = array(
            'title' => 'Login'
        );
        //Laman Login
        $this->load->view('template/header', $data);
        $this->load->view('login');
    }

    /**
     * Tampilan Register
     */
    public function register()
    {
        $data = array(
            'title' => 'Register'
        );
        //Laman Login
        $this->load->view('template/header', $data);
        $this->load->view('register');
    }


    /**
     * Fungsi Proses Login
     */
    public function log($data = 'login')
    {
        switch ($data) {
            default:
                // Login eksekusi
                // database tabel user belum ada
                $data = array(
                    'email' => trim($this->input->post('email')),
                    'pass' => md5($this->input->post('password'))
                );

                $callback = $this->AuthModel->auth($data);
                

                if ($callback == false) {
                    // Login Gagal
                    redirect(base_url('login'));
                } else {
                    /**
                     * Login Berhasil
                     * - Set Session
                     * - Redirect ke Landing
                     */

                    // Durasi Session (12 jam)
                    $time = 3600 * 12;

                    $user = $callback->row_array();
                    $sess = array(
                        'username' => $user['email'],
                        'status' => TRUE
                    );
                    $this->session->set_userdata($sess);
                    $this->session->mark_as_temp(array('username', 'status'), $time);

                    if ($_SESSION['status'] == true) {
                        redirect(base_url('home'));
                    } else {
                        // redirect(base_url('login'));
                        echo var_dump($callback->row_array);
                    }
                }
                break;
            case 'daftar':
                // Daftar Eksekusi


                /**
                 * Form Rules
                 */
                $this->form_validation->set_rules(
                    'nama_depan',
                    'Nama_Depan',
                    'required|trim',
                    array(
                        'required' => 'Nama Harus Diisi'
                    )
                );

                $this->form_validation->set_rules(
                    'nama_belakang',
                    'Nama_Belakang',
                    'required|trim',
                    array(
                        'required' => 'Nama Harus Diisi'
                    )
                );

                $this->form_validation->set_rules(
                    'email',
                    'Email',
                    'required|valid_email|is_unique[users.email]',
                    array(
                        'required' => 'Email Harus Diisi',
                        'email' => 'Email tidak valid',
                    )
                );

                $this->form_validation->set_rules(
                    'password',
                    'Password',
                    'required|matches[password2]',
                    array(
                        'required' => 'Email Harus Diisi',
                        'matches' => 'Password tidak sama'
                    )
                );

                $this->form_validation->set_rules(
                    'password2',
                    'Password2',
                    'required|matches[password]',
                    array(
                        'required' => 'Password harus Diisi',
                        'matches' => 'Password tidak sama'
                    )
                );

                if ($this->form_validation->run() == false) {
                    // error
                    $this->register();
                } else {
                    // jalan

                    $date = new DateTime();

                    $data = array(
                        'nama_depan' => strip_tags($this->input->post('nama_depan')),
                        'nama_belakang' => strip_tags($this->input->post('nama_belakang')),
                        'email' => strip_tags($this->input->post('email')),
                        'pass' => md5(strip_tags($this->input->post('password'))),
                        'tgl_edit' => $date->getTimestamp(),
                        'tgl_buat' => $date->getTimestamp()
                    );
                    
                    $this->UserModel->add_user($data);
                    $this->session->set_flashdata('pesan', '<div class="bg-blue-200 p-4 mt-2">Akun anda berhasil dibuat!</div>
                    </div>');
                    redirect(base_url('login'));
                }
                break;
        }
    }

    /**
     * Logout
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
