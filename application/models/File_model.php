<?php
defined('BASEPATH') or exit('not allowed access script direct');

class File_model extends CI_Model
{
    private $table = 'files';

    public function read_data($where = [], $limit = null, $offset = null)
    {
        $this->db->select('a.file_id, a.file_desc, a.file_path, a.file_created_at');
        $this->db->where($where);
        $this->db->order_by('a.file_id', 'desc');
        return $this->db->get($this->table.' a', $limit, $offset);
    }

    public function count_data($where = [])
    {
        $this->db->select('count(*) total');
        $this->db->where($where);
        return $this->db->get($this->table);
    }

    public function insert_data($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function update_data($id, $data)
    {
        $this->db->where(['file_id' => $id]);
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }
}
