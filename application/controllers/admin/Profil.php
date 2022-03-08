<?php
defined('BASEPATH') or exit('not allowed access script');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('Profils_model');
    }

    private function init()
    {
        $this->template->css('assets/plugins/toastr/toastr.min.css');
        $this->template->js('assets/plugins/toastr/toastr.min.js');
    }

    public function index()
    {
        auth_method('GET');
        $this->init();
        $this->template->js('assets/js/admin/profil.js');
        $this->template->js('assets/js/notify.js');
        $this->template->admin('admin/profil/view');
    }

    public function get_data()
    {
        auth_method('GET', true);
        $query = $this->Profils_model->read_data(['a.profil_user_id' => $this->session->userdata('user_id')]);
        if ($query->num_rows() >= 1) {
            $log = [
                'errorCode' => 1,
                'errorMessage' => 'Data Found',
                'data' => $query->row()
            ];
        } else {
            $log = [
                'errorCode' => 2,
                'errorMessage' => 'Data Not Found'
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($log));
    }

    public function save_setting()
    {
        auth_method('POST', true);
        $name = $this->input->post('inputName');
        $email = $this->input->post('inputEmail');
        $education = $this->input->post('inputEducation');
        $location = $this->input->post('inputLocation');
        $skills = $this->input->post('inputSkills');
        $experience = $this->input->post('inputExperience');

        $data = [
            'profil_user_id' => $this->session->userdata('user_id'),
            'profil_name' => $name,
            'profil_email' => $email,
            'profil_education' => $education,
            'profil_location' => $location,
            'profil_skill' => $skills,
            'profil_experience' => $experience
        ];

        $message = '';
        if (!empty($_FILES['inputImage']['name'])) {
            $config['upload_path']          = './assets/upload/profil/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('inputImage')) {
                $message = $this->upload->display_errors();
            } else {
                $data['profil_image'] = 'assets/upload/profil/'.$this->upload->data('file_name');

                // update session
                $session_data['user_image'] = base_url().'assets/upload/profil/'.$this->upload->data('file_name');
                $this->session->set_userdata($session_data);
            }
        }
        $query_cek = $this->Profils_model->read_data(['a.profil_user_id' => $this->session->userdata('user_id')]);
        if ($query_cek->num_rows() >= 1) {
            $query = $this->Profils_model->update_data($this->session->userdata('user_id'), $data);
        } else {
            $query = $this->Profils_model->insert_data($data);
        }

        if ($query >= 1) {
            $log = [
                'errorCode' => 1,
                'errorMessage' => 'Update Data Success',
                'image_url' => $this->session->userdata('user_image')
            ];
        } else {
            $log = [
                'errorCode' => 2,
                'errorMessage' => 'Nothing Update'
            ];
        }

        $log['errorMessage'] .= PHP_EOL.$message;

        $this->output->set_content_type('application/json')->set_output(json_encode($log));
    }
}
