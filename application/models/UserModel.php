<?php

class UserModel extends CI_Model
{
    public function get_user(array $id = null)
    {
        if ($id == null)
        {
            $this->db->join('role','users.role=role.id_role','inner');
            $this->db->order_by('tgl_buat','DESC');
            return $this->db->get('users');
        }
        else
        {
            $this->db->join('role','users.role=role.id_role','inner');
            $this->db->order_by('tgl_buat','DESC');
            $this->db->where('id_user', $id['id']);
            return $this->db->get('users');
        }
    }

    public function get_member(array $id = null, int $limit = null)
    {
        if ($id == null)
        {
            $this->db->join('role','users.role=role.id_role','inner');
            $this->db->order_by('tgl_buat','DESC');
            $this->db->where('role', 2);
            return $this->db->get('users', $limit);
        }
        else
        {
            $this->db->join('role','users.role=role.id_role','inner');
            $this->db->order_by('tgl_buat','DESC');
            $this->db->where('id_user', $id['id']);
            $this->db->where('role', 2);
            return $this->db->get('users', $limit);
        }
    }

    public function add_user(array $data)
    {
        return $this->db->insert('users', $data);
    }

    public function del_user(array $param = null)
    {
        $this->db->join('role','users.role=role.id_role','inner');
        $this->db->where('id_user', $param['id']);
        return $this->db->delete('users');
    }
}
