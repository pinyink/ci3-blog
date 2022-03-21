<?php
defined('BASEPATH') or exit('not allowed access direct script');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
    }

    private function init()
    {
        $this->template->css('assets/plugins/toastr/toastr.min.css');
        $this->template->js('assets/plugins/toastr/toastr.min.js');
        $this->template->js('assets/js/notify.js');
    }

    public function input()
    {
        auth_method('GET');
        $this->init();
        $this->template->css('assets/plugins/summernote/summernote-bs4.min.css');
        $this->template->js('assets/plugins/summernote/summernote-bs4.min.js');

        $this->template->css('assets/plugins/dropzone/min/dropzone.min.css');
        $this->template->js('assets/plugins/dropzone/min/dropzone.min.js');

        $this->template->css('assets/plugins/jquery-simplePagination/simplePagination.css');
        $this->template->js('assets/plugins/jquery-simplePagination/jquery.simplePagination.js');
        
        $this->template->js('assets/js/admin/blog/input.js');
        $this->template->admin('admin/blog/input');
    }
}
