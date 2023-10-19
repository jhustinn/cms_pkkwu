<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        if ($this->session->userdata('email')) {

            $user_data = $this->session->userdata('level');

            if ($user_data == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }


        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
            // $this->_gauth();
        } else {
            // Validation success
            $this->_login();

        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Jika Usernya Ada
        if ($user) {
            // var_dump($password);
            // var_dump($user['password']);
            // die;
            // Cek password
            if ($password==$user['password']) {
                $data = [
                    'email' => $user['email'],
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
                if ($user['level'] == 1 || $user['level'] == 2) {
                    redirect('admin');
                } else {
                    redirect('blocked');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert  alert-danger" role="alert">
                    Wrong password!
                    </div>');
                redirect('auth');
            }

        } else {
            $this->session->set_flashdata('message', '<div class="alert  alert-danger" role="alert">
            Email is not registered!
            </div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');

        if ($this->input->is_ajax_request()) {
            $res = [
                'status' => 200,
                'message' => 'You have been logout!',
            ];
            echo json_encode($res);

        } else {
            $res = [
                'status' => 404,
                'message' => 'Failed to logout!'
            ];
            echo json_encode($res);
        }
        // redirect('auth');
    }

    public function blocked()
    {
        $data['title'] = "Blocked!";
        $this->load->view('auth/blocked', $data);
    }

}