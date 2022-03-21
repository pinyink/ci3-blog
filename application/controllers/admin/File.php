<?php
defined('BASEPATH') or exit('not allowed access direct script');

class File extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('File_model');
    }

    public function add_data()
    {
        auth_method('POST');
        $dir = './assets/upload/file/'.date('Y').'/'.date('m').'/'.date('d');
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $config['upload_path']          = $dir;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('file')) {
            $message = $this->upload->display_errors();
            $log['errorMessage'] = $message;
        } else {
            $log['errorMessage'] = 'assets/upload/file/'.date('Y').'/'.date('m').'/'.date('d').'/'.$this->upload->data('file_name');
            $data_insert = array(
                'file_path' => $log['errorMessage']
            );
            $this->File_model->insert_data($data_insert);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($log));
    }

    public function get_data($limit = null, $offset = null)
    {
        auth_method('GET');
        if ($offset != null && is_numeric($offset) && $offset != 1 && is_numeric($limit)) {
            $count = ($offset - 1) * $limit;
        } else {
            $count = null;
        }
        $query = $this->File_model->read_data([], $limit, $count);
        $query_count = $this->File_model->count_data()->row();
        $data = [
            'num_rows' => $query_count->total,
            'data' => $query->result_array()
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
