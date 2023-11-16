<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();




        $this->load->library('form_validation');
        $this->load->model('User_model', 'user');
        // $admin = $this->user->get_user_by_email($this->session->userdata('email'));

        // if ($admin['role_id'] != 1) {
        //     redirect('blocked');
        // }

    }

    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.email]', [
            'is_unique' => '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
            Email Used!
            </div>'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // Tambah User
        // $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));
        // $this->db->where('email !=', $this->session->userdata('email'));
        $data['user'] = $this->db->get('user')->result_array();
        $data['title'] = "User";

        $this->load->view('template/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');

    }

    public function addUser()
    {
        $this->db->from('user');
        $this->db->where('email', $this->input->post('email'));
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('message', '
        <div class="alert alert-danger" role="alert"> Username Sudah Ada! </div>
        ');
            redirect('user');
        }
        $this->user->simpan();
        $this->session->set_flashdata('message', '
        <div class="alert alert-primary" role="alert"> Berhasil Menambahkan User! </div>
        ');
        redirect('user');

    }

    // Edit User Modal

}