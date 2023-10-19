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

    public function verifyEmail()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (6 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    // $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type, $email)
    {

        $this->load->library('email');
        // $name = $this->input->post("fname");
        // $cemail = $this->input->post("email");
        // $pno = $this->input->post("phone");
        // $message = $this->input->post("message");
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'cmssaya@gmail.com';
        $config['smtp_pass'] = 'gbgj ujlo ecbh vpwr';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = FALSE;

        $this->email->initialize($config);
        $this->email->from('CMS Saya', 'Admin');
        $this->email->to($email);
        // $this->email->subject('Account Verification');
        // $this->email->message('Account Verification');
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verifyEmail?email=' . $email . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $email . '&token=' . urlencode($token) . '">Reset Password</a>');
        }
        $send = $this->email->send();
        if ($send) {
            // echo json_encode("send");
            return true;
        } else {
            $error = $this->email->print_debugger(array('headers'));
            echo json_encode($error);
            die;
        }

    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Jika Usernya Ada
        if ($user) {
            // Cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
                if ($user['level'] == 1) {
                    redirect('admin');
                } else {
                    redirect('user');
                }
                // if ($user['level'] == 1) {
                //     redirect('admin');
                // } else if ($user['level'] == 2) {
                //     redirect('user');
                // }

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

    public function registration()
    {

        if ($this->session->userdata('email')) {

            $user_data = $this->session->userdata('level');

            if ($user_data == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }


        }
    }
    public function sendEmail()
    {
        if ($this->input->is_ajax_request()) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify', $this->input->post('email'));
            $res = [
                'status' => 200,
                'message' => 'Email has sended, please check your email to activate.',
            ];
            echo json_encode($res);

        } else {
            $res = [
                'status' => 422,
                'message' => 'Email not found!'
            ];
            echo json_encode($res);
        }

    }

    public function logoutModal()
    {
        if ($this->input->is_ajax_request()) {
            $res = [
                'status' => 200,
                'message' => 'modal Fetch Successfully',
            ];
            echo json_encode($res);

        } else {
            $res = [
                'status' => 404,
                'message' => 'Failed!'
            ];
            echo json_encode($res);
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