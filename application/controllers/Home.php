<?php

class Home extends CI_Controller
{

    private $ongkir =  10000;
    private $rekening = array(
        'OVO' => array(
            'Seuhah Corp.',
            '08123450000'
        ),
        'DANA' => array(
            'Seuhah Corp.',
            '08123456789'
        ),
        'BRI' => array(
            'Kedai Seuhah',
            '4015-2424-2424-1242'
        )
    );

    /** 
     * Tampilan default Kontroller Home (Landing Page)
     */
    public function index()
    {
        $data = array(
            'title' => 'Home',
            'produk' => $this->AdminModel->get_produk(null, 8)->result(),
            'user' => $this->AdminModel->get_user($this->session->id)->row_array()
        );

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('home/template/cart', $data);
        $this->load->view('home/template/footer', $data);
    }

    public function profil()
    {
        $meta = array(
            'title' => 'Home',
            // 'produk' => $this->AdminModel->get_produk(null,8)->result(),
            'user' => $this->AdminModel->get_user($this->session->iduser)->row(),
        );

        // var_dump($data['user']->nama_depan);
        // return;


        if (isset($_POST))
        {
            // New Logic
            $this->form_validation->set_rules('namaDepan', 'Nama Depan', 'required|trim');
            $this->form_validation->set_rules('namaBelakang', 'Nama Belakang', 'required|trim');

            $this->form_validation->set_error_delimiters('<div id="liveToast" class="toast hide mb-3" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-header bg-info text-white"><strong class="me-auto">Notifikasi</strong><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div><div class="toast-body">', '</div></div>');
            $this->form_validation->set_message('required', '{field} tidak boleh kosong!');
            $this->form_validation->set_message('matches', 'Password tidak sama!');


            $id = $this->session->iduser;




            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('home/template/header', $meta);
                $this->load->view('home/template/navbar');
                $this->load->view('home/profil', $meta);
                $this->load->view('home/template/cart');
                $this->load->view('home/template/footer');
            }
            else
            {
                $p = $this->input->post('pass1');
                $p2 = $this->input->post('pass2');

                $data = array(
                    'nama_depan' => $this->input->post('namaDepan'),
                    'nama_belakang' => $this->input->post('namaBelakang'),
                );
                $this->AdminModel->set_user($data, $id);
                $this->session->set_tempdata('pesan', 'Data user telah berhasil diubah!.', 3);

                if ($p != NULL && $p2 != NULL)
                {

                    $new = password_hash($p, PASSWORD_DEFAULT);
                    $in = array(
                        'pass' => $new
                    );
                    $this->AdminModel->set_user($in, $id);
                    $this->session->set_tempdata('pesan', 'Data user dan kata sandi berhasil diubah!', 3);
                }
                redirect('home/profil');
            }
        }
        else
        {
            $this->load->view('home/template/header', $meta);
            $this->load->view('home/template/navbar');
            $this->load->view('home/profil', $meta);
            $this->load->view('home/template/cart');
            $this->load->view('home/template/footer');
        }
    }


    public function upload_avatar()
    {
        $data = array();
        if ($this->input->post('img') != null)
        {
            $img = $this->input->post('img');
            $this->del_userimage($this->input->post('currFoto'));
            $imgname = $this->set_userimage($img);
            $data['foto'] = $imgname;
        }
        $this->AdminModel->set_user($data, $this->session->iduser);
        $this->session->set_userdata('foto', $data['foto']);

        echo json_encode($data);
    }

    private function set_userimage($img)
    {
        $img = explode(';', $img);
        $img = explode(',', $img[1]);

        $img = base64_decode($img[1]);

        $imgname = time() . '.png';

        // var_dump(FCPATH.'assets\\upload\\');
        // return;
        file_put_contents(FCPATH . 'assets\\uploads\\users\\' . $imgname, $img);
        return $imgname;
    }

    private function del_userimage($name)
    {
        $file = FCPATH . 'assets\\uploads\\users\\' . $name;
        if (file_exists($file))
            unlink($file);
    }

    public function checkout()
    {
        if (count($this->cart->contents()) === 0)
        {
            $this->session->set_tempdata('pesan', 'Keranjang masih kosong! tidak bisa cekout.', 3);
            redirect('home');
        }
        else
        {
            if ($this->session->iduser == null)
            {
                $this->session->set_tempdata('pesan', 'Silahkan masuk untuk melanjutkan', 3);
                redirect('login');
            }
            else
            {
                $data = array(
                    'user' => $this->AdminModel->get_user($this->session->iduser)->row(),
                    'cart' => $this->cart->contents(),
                    'ongkir' => $this->ongkir,
                    'total' => $this->cart->total() + $this->ongkir
                );

                $this->load->view('home/template/header');
                $this->load->view('home/template/navbar');
                $this->load->view('home/checkout', $data);
                $this->load->view('home/template/cart');
                $this->load->view('home/template/footer');
            }
        }
    }

    public function invoice_commit()
    {
        // Regen Kode Pembayaran atau Invoice
        $rw = $this->AdminModel->get_invoice()->num_rows();
        $kode = "KSI" . date('Y') . date('m') . $rw + 1;


        // Masukan ke Tabel Transaksi
        // $this->ModelAdmin->add_invoice();
        $data = array(
            'no_pemabayaran' => $kode,
            'waktu_pesan' => time(),
            'total bayar' => null,
            'alamat_pengiriman' => null,
            'catatan' => null,
            'status' => 0
        );


        // Masukan Detail Transaksina

        var_dump($kode);
    }



    public function pesan_commit()
    {
        // Regen Kode Pembayaran atau Invoice
        $rw = $this->AdminModel->get_invoice()->num_rows();
        $kode = "KSI" . date('Y') . date('m') . $rw + 1;


        // Masukan ke Tabel Transaksi
        // $this->ModelAdmin->add_invoice();
        $data = array(
            'no_pemabayaran' => $kode,
            'waktu_pesan' => time(),
            'total bayar' => null,
            'alamat_pengiriman' => null,
            'catatan' => null,
            'status' => 0
        );


        // Masukan Detail Transaksina

        var_dump($kode);
        $this->load->view('home/template/header');
        $this->load->view('home/template/navbar');
        $this->load->view('home/pembayaran');
        $this->load->view('home/template/cart');
        $this->load->view('home/template/footer');
    }
}
