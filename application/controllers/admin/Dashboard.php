<?php
defined('BASEPATH') or exit('no direct access script allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
    }
    public function index()
    {
        auth_method('GET');
        $this->template->admin('admin/template/content', ['user' => 'pindis']);
    }
}
