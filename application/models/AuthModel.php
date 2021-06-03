<?php

class AuthModel extends CI_Model
{
    public function auth($data)
    {
        $data = $this->db->get_where('users',$data);
        if($data->num_rows() > 0)
        {
            return $data;
        } else {
            return $data;
        }
    }
}