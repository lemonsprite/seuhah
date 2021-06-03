<?php

class AuthModel extends CI_Model
{
    public function auth(array $data)
    {
        $record = $this->db->get_where('users',$data);
        if($record->num_rows() > 0)
        {
            return $record;
        } else {
            return false;
        }
    }
}