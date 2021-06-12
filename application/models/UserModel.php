<?php

class UserModel extends CI_Model
{
    public function get_user(array $id = null)
    {
        if ($id == null) { return $this->db->get('users'); }
        else {
            return $this->db->get_where('users', $id);
        }
    }

    public function add_user(array $data)
    {
        $this->db->insert('users', $data);
    }

    public function get_member(array $where = null, int $limit = null)
    {
        if ($where == null)
        {
            return $this->db->get('users',$limit);
        } else {
            $this->db->where('id_user', $where['id']);
            $this->db->limit($limit);
            return $this->db->get('users');
        }
    }
}
