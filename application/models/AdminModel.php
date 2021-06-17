<?php

class AdminModel extends CI_Model
{

    public function get_user(array $param = null)
    {
        if ($param == null)
        {
            $this->db->join('role', 'users.role=role.id_role', 'inner');
            $this->db->select('*, role.nama as role');
            $this->db->order_by('tgl_buat', 'DESC');
            return $this->db->get('users');
        }
        else
        {
            $this->db->join('role', 'users.role=role.id_role', 'inner');
            $this->db->select('*, role.nama as role');
            $this->db->order_by('tgl_buat', 'DESC');
            $this->db->where('id_user', $param['id']);
            return $this->db->get('users');
        }
    }

    public function get_produk(array $param = null)
    {
        if($param == null)
        {
            return $this->db->get('produk');
        } else {
            return $this->db->get_where('produk', $param);
        }
    }

    public function add_produk(array $data = null)
    {
        return $this->db->insert('produk',$data);
    }








    public function get_invoice(array $param = null, $limit = null)
    {
        if($param == null)
        {
            $this->db->select('*');
            $this->db->join('users','invoice.id_user=users.id_user');
            return $this->db->get('invoice', $limit);
        } else {
            return $this->db->get_where('invoice', $param);
        }
    }
}