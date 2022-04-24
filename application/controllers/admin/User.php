<?php
defined('BASEPATH') or exit('not allowed access script');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['Template']);
        $this->load->helper(['form']);
        $this->load->model(['Users_model']);
    }

    private function init()
    {
        $this->template->css('assets/plugins/toastr/toastr.min.css');
        $this->template->js('assets/plugins/toastr/toastr.min.js');
        $this->template->js('assets/js/notify.js');
    }

    public function index()
    {
        auth_method('GET');
        self::init();
        $this->template->datatables();
        $this->template->js('assets/js/admin/user/view.js');
        $this->template->admin('admin/user/view');
    }

    public function ajax_list()
    {
        auth_method('POST');
        $List = $this->Users_model->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row      = array();
            $id = $r->user_username;
            $row[] = $no;
            $row[] = $id;
            $row[] = $r->user_created_at;
            $row[] = $r->user_active;
            $row[] = '<a href="javascript:;" onclick="get_user(\''.$id.'\')" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>';
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Users_model->count_all(),
            "recordsFiltered" => $this->Users_model->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function save_user()
    {
        auth_method('POST');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');
        $active = $this->input->post('active');
        if ($password != $repassword) {
            $log = [
                'errorCode' => 2,
                'errorMessage' => 'Password Tidak Sama'
            ];
        } else {
            $cek_username = $this->Users_model->read_data(['user_username' => $username])->num_rows();
            if ($cek_username >= 1) {
                $log = [
                    'errorCode' => 2,
                    'errorMessage' => 'Username Sudah Ada'
                ];
            } else {
                $data_insert = [
                    'user_username' => $username,
                    'user_password' => password_hash($password, PASSWORD_BCRYPT),
                    'user_active' => $active
                ];
                $this->Users_model->insert_data($data_insert);
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($log));
    }

    public function get_user($username)
    {
        auth_method('GET');
        $cek_username = $this->Users_model->read_data_short(['user_username' => $username]);
        if ($cek_username->num_rows() >= 1) {
            $log = [
                'errorCode' => 1,
                'errorMessage' => 'Username Ada',
                'data' => $cek_username->row()
            ];
        } else {
            $log = [
                'errorCode' => 2,
                'errorMessage' => 'Username Tidak Ada'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($log));
    }

    public function update_user()
    {
        auth_method('POST');
        $user_id = $this->input->post('user_id');
        $active = $this->input->post('active');
        $data_update = [
            'user_active' => $active
        ];
        $this->Users_model->update_data($user_id, $data_update);
        $log = [
            'errorCode' => 1,
            'errorMessage' => 'Update Berhasil'
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($log));
    }
}
