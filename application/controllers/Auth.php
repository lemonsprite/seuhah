<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->status != false)
        {
            redirect('home');
        }
    }



    public function index()
    {
        if (isset($_POST))
        {
            // New Logic
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_error_delimiters('<div id="liveToast" class="toast hide mb-3" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header bg-info text-white"><strong class="me-auto">Notifikasi</strong><button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body">', '</div></div>');
            $this->form_validation->set_message('required', '%s tidak boleh kosong!');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('auth/login');
            }
            else
            {
                // var_dump('berhasil');
                $u = $this->input->post('email');
                $p = $this->input->post('password');

                $data = array(
                    'email' => $u
                );

                // Ambil data sesuai email di tbl user
                $cek = $this->AuthModel->auth($data);
                // var_dump($cek);
                // return;
                // Kalu callback bukan false cek password
                if ($cek != false)
                {
                    if (password_verify($p, $cek->pass))
                    {
                        $sess = array(
                            'iduser' => $cek->id_user,
                            'nama' => $cek->nama_depan.' '.$cek->nama_belakang,
                            'foto' => $cek->foto,
                            'status' => TRUE
                        );
                        $time = 3600 * 4; // 4 Jam
                        $this->session->set_userdata($sess);
                        $this->session->mark_as_temp(array('username', 'status', 'nama', 'role', 'id'), $time);

                        $this->session->set_tempdata('pesan', 'Login berhasil!.', 3);
                        if ($this->session->status == TRUE)
                            redirect('home');
                    }
                    else
                    {
                        $this->session->set_tempdata('pesan', 'Email atau Password salah silahkan coba lagi.', 3);
                        $this->load->view('auth/login');
                    }
                }
                else
                {
                    $this->session->set_tempdata('pesan', 'User tidak ditemukan. silahkan coba lagi.', 3);
                    $this->load->view('auth/login');
                }
            }
        }
        else
        {
            $this->load->view('auth/login');
        }
    }

    /**
     * Tampilan Register
     */
    public function register()
    {

        if (isset($_POST))
        {
            // New Logic
            $this->form_validation->set_rules('namaDepan', 'Nama Depan', 'required|trim');
            $this->form_validation->set_rules('namaBelakang', 'Nama Belakang', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]|trim');
            $this->form_validation->set_rules('pass1', 'Password', 'required|matches[pass2]|trim');
            $this->form_validation->set_rules('pass2', 'Password Verifikasi', 'required|matches[pass1]|trim');

            $this->form_validation->set_error_delimiters('<div id="liveToast" class="toast hide mb-3" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header bg-info text-white"><strong class="me-auto">Notifikasi</strong><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body">', '</div></div>');
            $this->form_validation->set_message('required', '{field} tidak boleh kosong!');
            $this->form_validation->set_message('valid_email', '{field} tidak valid!');
            $this->form_validation->set_message('is_unique', '{field} sudah terdaftar!');
            $this->form_validation->set_message('matches', 'Password tidak sama!');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('auth/register');
            }
            else
            {
                $p = $this->input->post('pass1');

                $encrypt = password_hash($p, PASSWORD_DEFAULT);
                $data = array(
                    'nama_depan' => $this->input->post('namaDepan'),
                    'nama_belakang' => $this->input->post('namaBelakang'),
                    'email' => $this->input->post('email'),
                    'pass' => $encrypt,
                    'role' => 2,
                    'tgl_edit' => time(),
                    'tgl_buat' => time()
                );
                $this->AdminModel->add_user($data);
                $this->session->set_tempdata('pesan', 'User telah didaftarkan!.', 3);
                redirect('login');
            }
        }
        else
        {
            $this->load->view('auth/register');
        }
    }

}
