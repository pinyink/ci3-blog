<?php
defined('BASEPATH') or exit('not allowed access script');

class Profils_model extends CI_Model
{
    private $table = 'profils';

    public function read_data($where = [])
    {
        $this->db->select('a.*');
        $this->db->where($where);
        return $this->db->get($this->table.' a');
    }

    public function insert_data($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function update_data($id, $data)
    {
        $this->db->where('profil_user_id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
}
