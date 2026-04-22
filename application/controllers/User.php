<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }


    public function index()
    {

        if (!$this->session->userdata('logged_in')) {
            $this->load->view('User/login');
        } else {
            $this->load->view('User/index');
        }
    }


    public function register()
    {
        if ($this->input->post()) {

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('phone', 'Phone', 'required');

            if ($this->form_validation->run() == TRUE) {

                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'phone' => $this->input->post('phone')
                ];

                $this->User_model->register($data);

                redirect('User/login');
            }
        }

        $this->load->view('User/register');
    }

    public function login()
    {

        // print_r($_POST);
        // die();
        if ($this->input->post()) {

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $role_type = $this->input->post('role_type');

            $user = $this->User_model->getUserByEmail($email);

            if ($user && password_verify($password, $user->password)) {

                $session_data = [
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'role_type' => $user->role_type,
                    'logged_in' => TRUE
                ];

                $this->session->set_userdata($session_data);

                redirect('User/index');
            } else {
                $data['error'] = "Invalid login credentials";
                $this->load->view('User/login', $data);
                return;
            }
        }

        $this->load->view('User/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('User/login');
    }
}
