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

    public function add_user(array $data)
    {
        $this->db->insert('users', $data);
    }







    public function get_produk(int $id = null, $limit = null)
    {
        if ($id == null)
        {
            return $this->db->get('produk', $limit);
        }
        else
        {
            $this->db->where('id_produk', $id);
            return $this->db->get_where('produk');
        }
    }

    public function add_produk(array $data = null)
    {
        return $this->db->insert('produk', $data);
    }

    public function del_produk(int $id = null)
    {
        $this->db->where('id_produk', $id);
        return $this->db->delete('produk',);
    }

    public function set_produk(int $id = null, array $data)
    {
        return $this->db->update('produk', $data, array('id_produk' => $id));
    }







    public function get_invoice($id = null, $limit = null)
    {
        // $this->db->join('invoice_detail', 'invoice.id=invoice_detail.id_invoice');
        $this->db->join('users', 'invoice.id_user=users.id_user');

        if ($id == null)
        {
            $this->db->select('*');
            return $this->db->get('invoice', $limit);
        }
        else
        {
            $this->db->where('id_invoice', $id);
            return $this->db->get('invoice', $limit);
        }
    }

    public function get_invoice_byuser($id, $limit = null)
    {
        $this->db->join('users', 'invoice.id_user=users.id_user');
        $this->db->where('invoice.id_user', $id);
        return $this->db->get('invoice', $limit);
    }
    public function add_invoice(array $data)
    {
        return $this->db->insert('invoice', $data);
    }

    public function add_invoiceDetail(array $data)
    {
        return $this->db->insert('invoice_detail', $data);
    }

    public function set_invoice_bukti($id, $data)
    {
        $this->db->where('id_invoice', $id);
        return $this->db->update('invoice', $data);
    }
    
    public function set_invoice_stat($param,$data)
    {
        $this->db->where('id_invoice', $param);
        return $this->db->update('invoice', $data);
    }
    public function get_invoice_bynotrans($notrans)
    {
        $this->db->join('invoice_detail', 'invoice.no_invoice=invoice_detail.id_invoice');
        $this->db->join('produk', 'produk.id_produk=invoice_detail.id_produk');
        $this->db->where('invoice.no_invoice', $notrans);
        return $this->db->get('invoice');
    }
}
