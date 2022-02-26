<?php

function method($method)
{
    $ci =& get_instance();
    if ($ci->input->server('REQUEST_METHOD') != $method) {
        show_404();
        die;
    }
}

function auth_method($method, $ajax = false)
{
    $ci =& get_instance();
    if ($ci->input->server('REQUEST_METHOD') == $method) {
        if ($ci->session->userdata('username') == '') {
            if ($ajax == true) {
                $ci->output->set_content_type('application/json')->set_output(json_encode(['errorCode' => 2, 'errorMessage' => 'You are not allowed access']));
            } else {
                $ci->session->set_flashdata('login_message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-ban"></i> Alert!</h5>
					You are not allowed access
				</div>');
                redirect('auth/login', 'refresh');
                die;
            }
        }
    } else {
        if ($ajax == true) {
            $ci->output->set_content_type('application/json')->set_output(json_encode(['errorCode' => 2, 'errorMessage' => 'You are not allowed access']));
        } else {
            show_404();
            die;
        }
    }
}
