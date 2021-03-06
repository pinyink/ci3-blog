<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Profils_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        method('GET');
        $this->session->sess_destroy();
        $this->load->view('admin/login');
    }

    public function verify()
    {
        method('POST');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $error = validation_errors('<div class="alert alert-danger">', '</div>');
            $this->session->set_flashdata('login_message', $error);
            redirect('auth/login', 'refresh');
        }
        $query = $this->Users_model->read_data(['user_username' => $username]);
        if ($query->num_rows() >= 1) {
            $query_row = $query->row();
            if (password_verify($password, $query_row->user_password)) {
                if ($query_row->user_active == 'active') {
                    $session_data = [
                        'user_id' => $query_row->user_id,
                        'username' => $username,
                        'user_image' => base_url().'assets/dist/img/avatar5.png'
                    ];
                    $query_profil = $this->Profils_model->read_data(['a.profil_user_id' => $query_row->user_id]);
                    if ($query->num_rows() >= 1) {
                        $query_profil_row = $query_profil->row();
                        if ($query_profil_row->profil_image != '') {
                            $session_data['user_image'] = base_url().$query_profil_row->profil_image;
                        }
                    }
                    $this->session->set_userdata($session_data);
                    redirect('admin/dashboard', 'location');
                } else {
                    $this->session->set_flashdata('login_message', '<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h5><i class="icon fas fa-ban"></i> Alert!</h5>
						Account Is Non Active
					</div>');
                    redirect('auth/login', 'refresh');
                }
            } else {
                $this->session->set_flashdata('login_message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-ban"></i> Alert!</h5>
					Wrong Password
				</div>');
                redirect('auth/login', 'refresh');
            }
        } else {
            $this->session->set_flashdata('login_message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-ban"></i> Alert!</h5>
				Users Not Found
			</div>');
            redirect('auth/login', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->set_flashdata('login_message', '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-user-check"></i> Alert!</h5>
				Logout Success
			</div>');
        redirect('auth/login', 'refresh');
    }

    public function coba()
    {
        echo password_verify('12345', '$2y$10$ZkGbFG6.zLkRqjzc0J3HLeG6qhSWL9OzCx5Z986NdYK1AMNO4PiZi');
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */
