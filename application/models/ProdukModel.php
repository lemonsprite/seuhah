<?php

class ProdukModel extends CI_Model
{
    public function get_produk(array $param = null)
    {
        if($param == null)
        {
            return $this->db->get('produk');
        } else {
            return $this->db->get_where('produk', $param);
        }
    }
}