<?php
defined('BASEPATH') or exit('not allowed access direct script');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['template', 'parser']);
        $this->load->helper(['form']);
        $this->load->model('Blog_model');
    }

    private function init()
    {
        $this->template->css('assets/plugins/toastr/toastr.min.css');
        $this->template->js('assets/plugins/toastr/toastr.min.js');
        $this->template->js('assets/js/notify.js');
    }

    public function index()
    {
        self::init();
        $this->template->datatables();
        $this->template->js('assets/js/admin/blog/view.js');
        $this->template->admin('admin/blog/view');
    }

    public function ajax_list()
    {
        $List = $this->Blog_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row      = array();
            $id = $r->blog_url;
            $row[] = $no;
            $row[] = $id;
            $row[] = $r->blog_title;
            $row[] = $r->blog_desc;
            $row[] = '<a href="'.base_url().'admin/blog/edit/'.$id.'" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>';
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Blog_model->count_all(),
            "recordsFiltered" => $this->Blog_model->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function input()
    {
        auth_method('GET');
        $this->init();
        $this->template->blog_input();
        $this->template->admin('admin/blog/input');
    }

    public function simpan()
    {
        auth_method('POST');
        $data['blog_title'] = $this->input->post('blog_title');
        $data['blog_desc'] = $this->input->post('blog_desc');
        $data['blog_text'] = str_replace(base_url(), '{base_url}', $this->input->post('blog_text'));
        $data['blog_image'] = str_replace(base_url(), '{base_url}', $this->input->post('blog_image'));
        $data['blog_url'] = $this->input->post('blog_url');
        $data['blog_updated_at'] = date('Y-m-d H:i:s');

        $redirect = 'N';
        if ($this->input->post('blog_id', 'true')) {
            $id = $this->input->post('blog_id');
            $data['blog_publish'] = $this->input->post('blog_publish');
            $query_insert = $this->Blog_model->update_data($id, $data);
        } else {
            $data['blog_created_at'] = date('Y-m-d H:i:s');
            $data['blog_created_by'] = $this->session->userdata('username');
            $query_insert = $this->Blog_model->insert_data($data);
            $redirect = 'Y';
        }
        if ($query_insert >= 1) {
            $log = [
                'errorCode' => 1,
                'errorMessage' => 'Posting Berhasil Di Simpan'
            ];
        } else {
            $log = [
                'errorCode' => 2,
                'errorMessage' => 'Posting Gagal Di Simpan'
            ];
        }
        $log['redirect'] = $redirect;
        $log['url'] = $data['blog_url'];

        $this->output->set_content_type('application/json')->set_output(json_encode($log));
    }

    public function cek_url($any)
    {
        $query = $this->Blog_model->read_data(['blog_url' => $any])->num_rows();
        if ($query == 0) {
            $log = [
                'errorCode' => 1,
                'errorMessage' => 'Okay'
            ];
        } else {
            $log = [
                'errorCode' => 2,
                'errorMessage' => 'Url Sudah Dipakai'
            ];
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($log));
    }

    public function edit($id)
    {
        $query_cek = $this->Blog_model->read_data(['blog_url' => $id]);
        if ($query_cek->num_rows() >= 1) {
            $data = [
                'detail' => $query_cek->row()
            ];
            self::init();
            $this->template->blog_input();
            $this->template->admin('admin/blog/edit', $data);
        } else {
            echo "<script>alert('ID Not Found');history.back();</script>";
        }
    }
}
