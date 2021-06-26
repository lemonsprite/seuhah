<?php date_default_timezone_set("Asia/Bangkok");

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->status == false || !isset($this->session->status))
        {
            redirect(base_url('home'));
        }
        // var_dump((int)$this->session->role);
        // die;
        if ((int)$this->session->role == 2 || !isset($this->session->role))
        {
            redirect(base_url('home'));
        }
    }

    public function dashboard()
    {
        // Dashboard
        $data = array(
            'title' => 'Dashboard',
            'user' => $this->AdminModel->get_user($this->session->iduser)->row(),
            'member' => $this->AdminModel->get_user()->result(),
            'pesanan' => $this->AdminModel->get_invoice(null, 5)->result(),
            'memberCount' => $this->AdminModel->get_user()->num_rows(),
            'produkCount' => $this->AdminModel->get_produk()->num_rows(),
            'invoiceCount' => $this->AdminModel->get_invoice()->num_rows(),
        );

        // var_dump($data['pesanan']);
        // return;

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template//navbar');
        $this->load->view('admin/index');
        $this->load->view('admin/template/footer');
    }

    public function users()
    {
        $data = array(
            'title' => 'Users',
            'user' => $this->AdminModel->get_user($this->session->iduser)->row(),
            'member' => $this->AdminModel->get_user()->result(),
        );
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template//navbar');
        $this->load->view('admin/users');
        $this->load->view('admin/template/footer');
    }

    public function produk()
    {
        $data = array(
            'title' => 'Produk',
            'user' => $this->AdminModel->get_user($this->session->iduser)->row(),
            'produk' => $this->AdminModel->get_produk()->result(),
        );
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template//navbar');
        $this->load->view('admin/produk');
        $this->load->view('admin/template/footer');
    }


    public function tambah_produk()
    {
        $img = $this->input->post('foto');

        $imgname = $this->upload($img);


        // Generate Kode Produk
        $rowData = $this->AdminModel->get_produk()->num_rows() + 1;
        $kodeProduk = 'KSP' . date('Y') . date('m') . $rowData;

        $data = array(
            'nama_produk' => $this->input->post('namaProduk'),
            'kode_produk' => $kodeProduk,
            'harga' => $this->input->post('hargaProduk'),
            'foto' => $imgname,
            'tgl_buat' => time(),
            'tgl_edit' => time()
        );

        // var_dump($data);
        // return;
        $run = $this->AdminModel->add_produk($data);
        if ($run)
        {
            redirect('admin/produk');
        }
    }

    public function hapus_produk($id)
    {
        $run = $this->AdminModel->del_produk($id);

        if ($run)
        {
            redirect(base_url('admin/produk'));
        }
    }

    public function edit_produk($id)
    {
        $data = array(
            'title' => 'Ubah Produk',
            'user' => $this->AdminModel->get_user($this->session->iduser)->row(),
            'produk' => $this->AdminModel->get_produk($id)->row()
        );

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template//navbar');
        $this->load->view('admin/ubahProduk');
        $this->load->view('admin/template/footer');
    }

    public function update_produk()
    {
        $id = $this->input->post('id_produk');
        $data = array(
            'nama_produk' => $this->input->post('namaProduk'),
            'harga' => $this->input->post('hargaProduk'),
            'deskripsi_produk' => $this->input->post('deskripsiProduk'),
            'tgl_edit' => time(),
        );

        // Logic kalo foto ada
        if ($this->input->post('foto') != null)
        {
            $img = $this->input->post('foto');
            $this->delete($this->input->post('currFoto'));
            $imgname = $this->upload($img);
            $data['foto'] = $imgname;
        }


        $run = $this->AdminModel->set_produk($id, $data);

        if ($run)
        {
            redirect(base_url('admin/produk'));
        }
    }










    public function pesanan()
    {
        $data = array(
            'title' => 'Produk',
            'user' => $this->AdminModel->get_user($this->session->iduser)->row(),
            'pesanan' => $this->AdminModel->get_invoice()->result(),
        );
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template//navbar');
        $this->load->view('admin/pesanan');
        $this->load->view('admin/template/footer');
    }


    private function upload($img)
    {
        $img = explode(';', $img);
        $img = explode(',', $img[1]);

        $img = base64_decode($img[1]);

        $imgname = time() . '.png';

        // var_dump(FCPATH.'assets\\upload\\');
        // return;
        file_put_contents(FCPATH . 'assets/uploads/' . $imgname, $img);
        return $imgname;
    }

    private function delete($name)
    {
        unlink(FCPATH . 'assets/uploads/' . $name);
    }



    public function accorder($param)
    {
        $this->session->set_tempdata('pesan', 'Pesanan sudah berhasil diverifikasi!', 2);
        $this->AdminModel->set_invoice_stat($param, array('status' => 2));
        redirect('admin/pesanan');
    }

    public function rejorder($param)
    {
        $this->session->set_tempdata('pesan', 'Pesanan sudah berhasil ditolak!', 3);
        $this->AdminModel->set_invoice_stat($param, array('status' => 3));
        redirect('admin/pesanan');
    }

    public function orderdetail($param)
    {
        $data = array(
            'title' => 'Detail Pesanan',
            'pesanan' => $this->AdminModel->get_invoice_bynotrans($param)->result(),
            'id' => $param
        );

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template//navbar');
        $this->load->view('admin/pesanan_detail', $data);
        $this->load->view('admin/template/footer');
    }

    public function userdelete($param)
    {
        $this->AdminModel->del_user($param);
        $this->session->set_tempdata('pesan', 'User berhasil dihapus!', 3);
        redirect('admin/users');
    }
}
