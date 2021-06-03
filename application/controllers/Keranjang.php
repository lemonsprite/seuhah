<?php

class Keranjang extends CI_Controller
{
    public function __construct() { parent::__construct(); }
    
    public function tambah_item()
    {
        $data = array(
            'id_produk' => $this->input->post('produk_id'), 
            'nama_produk' => $this->input->post('produk_nama'), 
            'harga' => $this->input->post('produk_harga'), 
            'jumlah' => $this->input->post('quantity')
        );
        $this->cart->insert($data);
        echo $this->getall_item();
    }

    /**
     * Ambil data data dari cart
     */
    public function getall_item()
    {

    }

    /**
     * Refresh semua item di keranjang
     */
    public function load_item()
    {
        
    }

    /**
     * Hapus item di dalam keranjang
     */
    public function del_item()
    {
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->getall_item();
    }
}