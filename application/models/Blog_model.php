<?php

class Blog_model extends CI_Model
{
    protected $table = 'blogs';
    private $column_order  = array(null, 'a.blog_url', 'a.blog_title', 'a.blog_desc');
    private $column_search = array('a.blog_title', 'a.blog_desc', 'a.blog_url');
    private $order         = array('a.blog_id' => 'desc');

    private function _get_datatables_query()
    {
        $this->db->select("a.blog_id, a.blog_title, a.blog_desc, a.blog_url");
        $this->db->from($this->table.' a');

        if ($this->input->post('status') != '') {
            $this->db->where('a.status_user_toko', $this->input->post('status', 'true'));
        }

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } elseif (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function read_data_short($where = [], $limit = null, $offset = null, $like = null)
    {
        $this->db->select('a.blog_id, a.blog_title, a.blog_desc, a.blog_url, a.blog_created_at, a.blog_updated_at, a.blog_created_by, a.blog_publish, a.blog_image');
        $this->db->where($where);
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->order_by('blog_created_at', 'desc');
        if ($like != null) {
            $this->db->like('blog_title', $like, 'both');
        }
        return $this->db->get($this->table.' a');
    }

    public function read_count($where = [], $like = null)
    {
        $this->db->select('count(a.blog_id) total');
        $this->db->where($where);
        if ($like != null) {
            $this->db->like('blog_title', $like, 'both');
        }
        return $this->db->get($this->table.' a');
    }

    public function read_data($where = [])
    {
        $this->db->select('a.blog_id, a.blog_title, a.blog_desc, a.blog_url, a.blog_text, a.blog_created_at, a.blog_updated_at, a.blog_created_by, a.blog_publish, a.blog_image');
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
        $this->db->where('blog_id', $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
}
