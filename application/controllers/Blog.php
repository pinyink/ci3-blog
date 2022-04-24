<?php

defined('BASEPATH') or exit('access script denied');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['template', 'parser', 'pagination']);
        $this->load->model('Blog_model');
    }
    
    public function index()
    {
        $page = !empty($this->input->get('page')) ? $this->input->get('page') - 1: 0;
        $per_page = 6;
        $offset = $page * $per_page;
        $search = !empty($this->input->get('search')) ? str_replace('+', ' ', $this->input->get('search')): null;
        $data['blog'] = $this->Blog_model->read_data_short(['blog_publish' => 'Y'], $per_page, $offset, $search)->result();
        $count = $this->Blog_model->read_count(['blog_publish' => 'Y'], $search)->row();
        $data['count'] = $count->total;

        $config['base_url'] = base_url();
        $config['total_rows'] = $count->total;
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = true;
        $config['page_query_string'] = true;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<ul class="justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:;">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = '<';
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $this->template->front('front/content', $data);
    }

    public function detail($any)
    {
        $data = [
            'data' => $this->Blog_model->read_data(['blog_url' => $any])->row()
        ];
        $this->template->front('front/detail', $data);
    }
}
