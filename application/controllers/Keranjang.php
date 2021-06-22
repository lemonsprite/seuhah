<?php


class Keranjang extends CI_Controller
{
    
    public function add()
    {
        $data = array (
            'id' => $this->input->post('id_produk'),
            'name' => $this->input->post('nama_produk'),
            'price' => $this->input->post('harga'),
            'qty' => $this->input->post('qyt')
        );
        $this->cart->insert($data);
        $this->session->set_tempdata('pesan', 'Item berhasil ditambahkan!', 3);
        $this->load();

    }

    public function load()
    {
        $output = '';
        $no = 0;
        // foreach ($this->cart->contents() as $items) {
        //     $output .= "
        //     <li class='list-group-item list-group-item-action py-3 lh-tight' aria-current='true'>
        //         <div class='d-flex w-100 align-items-center justify-content-between'>
        //             <strong class='mb-1 fs-5'>{$items['name']}</strong>
        //             <small><span class='fs-4'>{$items['qty']}</span>x</small>
        //         </div>
        //         <div class='col-10 mb-1 small fs-6'>Rp {$items['harga']}</div>
        //     </li>";
        // }
        // $output .= '
        //     <tr>
        //         <th colspan="3">Total</th>
        //         <th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
        //     </tr>
        // ';
        $data = array(
            'count' => count($this->cart->contents()),
            'data' => $this->cart->contents(),
            'total' => $this->cart->total(),
            'pesan' => $this->session->tempdata('pesan')
        );
        
        echo json_encode($data);
    }

    public function del()
    {
        $data = array (
            'rowid' => $this->input->post('row_id'),
            'qty' => 0
        );
        $this->cart->update($data);
        $this->session->set_tempdata('pesan', 'Item berhasil dihapus!', 3);
        $this->load();
    }
    public function plus()
    {
        $data = array (
            'rowid' => $this->input->post('row_id'),
            'qty' => $this->input->post('qty')
        );
        $this->cart->update($data);
        $this->session->set_tempdata('pesan', 'Item berhasil ditambahkan!', 3);
        $this->load();
    }
    public function min()
    {
        $data = array (
            'rowid' => $this->input->post('row_id'),
            'qty' => $this->input->post('qty')
        );
        $this->cart->update($data);
        $this->session->set_tempdata('pesan', 'Item berhasil dikurangi!', 3);
        $this->load();
    }
}
