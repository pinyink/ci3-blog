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
    private $_js_view = 'template/js_view';
    private $template_data = array();
    private $sidebar_data = array();
    private $_js_view_data = array();

    /**
     * @param mixed $_js_view_data
     *
     * @return self
     */
    public function setJsViewData($_js_view_data)
    {
        $this->_js_view_data = $_js_view_data;

        return $this;
    }
    
    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function set($content_area, $value)
    {
        $this->template_data[$content_area] = $value;
    }

    public function section($name='', $view = '',$view_data = array())
    {
        $this->set($name, $this->CI->load->view($view, $view_data, TRUE));
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

    public function set_meta($name, $content){
        $this->_meta[$name] = $content;
        return true;
    }

    public function set_canonical($url)
    {
       $this->_canonical = $url;
    }

    public function load($template = '', $name='', $view = '',$view_data = array(),$return = FALSE)
    {
        $this->template_data['js'] = $this->_js;
        $this->template_data['css'] = $this->_css;
        $this->template_data['meta'] = $this->_meta;
        $this->set($name, $this->CI->load->view($view, $view_data, TRUE));
        $this->CI->load->view($template , $this->template_data); 
    }

    // take your custom template setting in here

    public function toko($content, $data= array(),$js_view=NULL, $return= FALSE)
    {
        if ($js_view != NULL) {
            $this->_js_view = $js_view;
        }

        $this->section('nav_bar','toko_view/template/nav_bar');
        $this->section('js_view',$this->_js_view, $this->_js_view_data);
        if ($this->getQuickSidebar() == 1) {
            $this->section('sidebar','toko_view/template/_sidebar', $this->sidebar_data);
        } else {
            $this->section('sidebar','toko_view/template/sidebar', $this->sidebar_data);
        }
        $this->load('toko_view/template/default','content',$content, $data);
    }
}
/* Location: ./application/libraries/Template.php */
