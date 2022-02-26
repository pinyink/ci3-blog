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

    public function index()
    {
        auth_method('GET');
        $this->template->js('assets/js/admin/profil.js');
        $this->template->admin('admin/profil/view');
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
        $query_cek = $this->Profils_model->read_data(['a.profil_user_id' => $this->session->userdata('user_id')]);
        if ($query_cek->num_rows() >= 1) {
            $query = $this->Profils_model->update_data($this->session->userdata('user_id'), $data);
        } else {
            $query = $this->Profils_model->insert_data($data);
        }

        if ($query >= 1) {
            $log = [
                'errorCode' => 1,
                'errorMessage' => 'Update Data Success'
            ];
        } else {
            $log = [
                'errorCode' => 2,
                'errorMessage' => 'Nothing Update'
            ];
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($log));
    }
}
