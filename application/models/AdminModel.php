<?php

class AdminModel extends CI_Model
{

    public function get_user($id = null)
    {
        if ($id == null)
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
            $this->db->where('id_user', $id);
            return $this->db->get('users');
        }
    }
    
    public function set_user(array $data, $id)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
    }






    public function get_produk(int $id = null, $limit = null)
    {
        if($id == null)
        {
            return $this->db->get('produk', $limit);
        } else {
            $this->db->where('id_produk', $id);
            return $this->db->get_where('produk');
        }
    }

    public function add_produk(array $data = null)
    {
        return $this->db->insert('produk',$data);
    }

    public function del_produk(int $id = null)
    {
        $this->db->where('id_produk', $id);
        return $this->db->delete('produk',);
    }

    public function set_produk(int $id = null, array $data)
    {
        return $this->db->update('produk', $data,array('id_produk' => $id));
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