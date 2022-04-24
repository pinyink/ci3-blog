<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Template
{
    private $CI;
    private $_js = array();
    private $_css = array();
    private $_meta = array();
    private $_canonical = array();
    private $template_data = array();
    private $sidebar_data = array();
    
    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function set($content_area, $value)
    {
        $this->template_data[$content_area] = $value;
    }

    public function section($name='', $view = '', $view_data = array())
    {
        $this->set($name, $this->CI->load->view($view, $view_data, true));
    }

    public function css()
    {
        $css_files = func_get_args();
        foreach ($css_files as $value) {
            $this->_css[] = $value;
        }
        return;
    }

    public function js()
    {
        $js_files = func_get_args();
        foreach ($js_files as $value) {
            $this->_js[] = $value;
        }
        return;
    }

    public function set_meta($name, $content)
    {
        $this->_meta[$name] = $content;
        return true;
    }

    public function set_canonical($url)
    {
        $this->_canonical = $url;
    }

    public function load($template = '', $name='', $view = '', $view_data = array(), $return = false)
    {
        $this->template_data['js'] = $this->_js;
        $this->template_data['css'] = $this->_css;
        $this->template_data['meta'] = $this->_meta;
        $this->set($name, $this->CI->load->view($view, $view_data, true));
        $this->CI->load->view($template, $this->template_data);
    }

    // take your custom template setting in here

    public function admin($content, $data= array())
    {
        $this->section('navbar', 'admin/template/navbar');
        $this->section('sidebar', 'admin/template/sidebar', $this->sidebar_data);
        $this->load('admin/template/index', 'content', $content, $data);
    }

    // admin input js & css
    public function blog_input()
    {
        $this->css('assets/plugins/summernote/summernote-bs4.min.css');
        $this->js('assets/plugins/summernote/summernote-bs4.min.js');

        $this->css('assets/plugins/dropzone/min/dropzone.min.css');
        $this->js('assets/plugins/dropzone/min/dropzone.min.js');

        $this->css('assets/plugins/jquery-simplePagination/simplePagination.css');
        $this->js('assets/plugins/jquery-simplePagination/jquery.simplePagination.js');
        
        $this->js('assets/js/admin/blog/input.js');
    }

    public function datatables()
    {
        $this->css('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');
        $this->css('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
        $this->css('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');
        $this->js('assets/plugins/datatables/jquery.dataTables.min.js');
        $this->js('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
        $this->js('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');
        $this->js('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');
        $this->js('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js');
        $this->js('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js');
    }

    public function front($content, $data = [])
    {
        $this->section('header', 'front/header');

        $this->CI->load->model('Blog_model');
        $recent_post = $this->CI->Blog_model->read_data_short(['blog_publish' => 'Y'], 5)->result();
        $this->section('sidebar', 'front/sidebar', ['data' => $recent_post]);
        $this->load('front/index', 'content', $content, $data);
    }
}
/* Location: ./application/libraries/Template.php */
