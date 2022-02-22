<?php
defined('BASEPATH') or exit('no direct access script allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        auth_method('GET');
        $this->load->view('admin/template/index');
    }
}
