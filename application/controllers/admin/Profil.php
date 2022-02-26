<?php
defined('BASEPATH') or exit('not allowed access script');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
    }

    public function index()
    {
        auth_method('GET');
        $this->template->admin('admin/profil/view');
    }
}
