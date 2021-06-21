<?php

class Home extends CI_Controller
{

    private $ongkir =  10000;
    private $rekening = array(
        array(
            'bank' => 'OVO',
            'an' => 'Seuhah Corp.',
            'norek' => '08123450000'
        ),
        array(
            'bank' => 'DANA',
            'an' => 'Seuhah Corp.',
            'norek' => '08123456789'
        ),
        array(
            'bank' => 'BRI',
            'an' => 'Kedai Seuhah',
            'norek' => '4015-2424-2424-1242'
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
        $meta = array(
            'title' => 'Checkout',
        );
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
                    'total' => $this->cart->total() + $this->ongkir,
                    'rekening' => $this->rekening
                );


                // return;
                $this->load->view('home/template/header', $meta);
                $this->load->view('home/template/navbar');
                $this->load->view('home/checkout', $data);
                $this->load->view('home/template/cart');
                $this->load->view('home/template/footer');
            }
        }
    }



    public function pesan_commit()
    {
        $this->form_validation->set_rules('alamat', 'Nama Depan', 'required|trim');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong!');


        if ($this->form_validation->run() === FALSE)
        {
            $this->session->set_tempdata('pesan', 'Alamat harus diisi!.', 3);
            redirect('checkout');
        }
        else
        {
            $meta = array(
                'title' => 'Invoice'
            );

            // Regen Kode
            $metode = $this->input->post('metode');

            $row = $this->AdminModel->get_invoice()->num_rows();
            $md5 = substr(md5($metode), 0, 4);
            $invoiceid = 'KSI' . $md5 . $row;

            // Masukan ke Tabel Transaksi
            // $this->ModelAdmin->add_invoice();
            $data = array(
                'no_invoice' => $invoiceid,
                'waktu_pesan' => time(),
                'total_bayar' => $this->input->post('total'),
                'alamat_pengiriman' => $this->input->post('alamat'),
                'catatan' => $this->input->post('catatan'),
                'id_user' => $this->session->iduser,
                'status' => 0
            );

            // Masuken data ka invoice
            $this->AdminModel->add_invoice($data);





            // Masukan item karanjjan kana detail
            // input tiap item ka deital order
            $this->AdminModel->get_invoice()->num_rows();
            foreach ($this->cart->contents() as $c)
            {
                $detail = array(
                    'qty' => $c['qty'],
                    'id_produk' => $c['id'],
                    'id_invoice' => $invoiceid,
                );
                $this->AdminModel->add_invoiceDetail($detail);
            }
            $this->cart->destroy();
            // return;

            // var_dump($data);
            // return;
            $this->load->view('home/template/header', $meta);
            $this->load->view('home/template/navbar');
            $this->load->view('home/pembayaran', $data);
            $this->load->view('home/template/cart');
            $this->load->view('home/template/footer');
        }
    }

    public function confirm($param = null)
    {
        $meta = array(
            'title' => 'Upload Bukti',
            'id' => $param
        );
        $this->load->view('home/template/header', $meta);
        $this->load->view('home/template/navbar');
        $this->load->view('home/up_bukti_bayar');
        $this->load->view('home/template/cart');
        $this->load->view('home/template/footer');
    }

    public function buktiup($param)
    {
        $config['upload_path']          = './assets/uploads/bukti/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $config['file_name']            = time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti'))
        {
            $this->session->set_tempdata('pesan', $this->upload->display_errors(), 3);
            redirect("riwayat/{$param}/konfirmasi");
        }
        else
        {
            $foto = $this->upload->data();
            $filename = $foto['file_name'];

            $data = array(
                'bukti' => $filename,
                'status' => 1
            );

            $this->session->set_tempdata('pesan', 'Foto berhasil diupload!', 3);
            $this->AdminModel->set_invoice_bukti($param, $data);
            // return;
            redirect('riwayat');
        }
    }


    public function user_trans()
    {
        $data = array(
            'title' => 'Riwayat Transaksi',
            'pesanan' => $this->AdminModel->get_invoice_byuser($this->session->iduser)->result()
        );
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar');
        $this->load->view('home/usertrans', $data);
        $this->load->view('home/template/cart');
        $this->load->view('home/template/footer');
    }
}
