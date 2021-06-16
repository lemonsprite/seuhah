<?php

class UserModel extends CI_Model
{
    public function get_user(array $param = null)
    {
        if ($param == null)
        {
            $this->db->join('role', 'users.role=role.id_role', 'inner');
            $this->db->order_by('tgl_buat', 'DESC');
            return $this->db->get('users');
        }
        else
        {
            $this->db->join('role', 'users.role=role.id_role', 'inner');
            $this->db->order_by('tgl_buat', 'DESC');
            $this->db->where('id_user', $param['id']);
            return $this->db->get('users');
        }
    }

    public function get_member(int $limit = null)
    {
        $this->db->join('role', 'users.role=role.id_role');
        $this->db->order_by('tgl_buat', 'DESC');
        $this->db->where('role', 2);
        return $this->db->get('users', $limit);
    }

    public function add_user(array $param)
    {
        return $this->db->insert('users', $param);
    }

    public function del_user(array $param = null)
    {
        $this->db->join('role', 'users.role=role.id_role', 'inner');
        $this->db->where('id_user', $param['id']);
        return $this->db->delete('users');
    }

    public function set_user(array $param = null, $where = null)
    {

        return $this->db->update('users', $param, $where);
    }
}
