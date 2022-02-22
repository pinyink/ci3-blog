<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    private $table = 'users';

    public function read_data($where = [])
    {
        $this->db->where($where);
        return $this->db->get($this->table);
    }
}