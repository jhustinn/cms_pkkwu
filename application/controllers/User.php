<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Activity_model', 'activity');

        // isAdmin();




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

    // Add User Modal
    // public function addUserModal()
    // {
    //     if ($this->input->is_ajax_request()) {
    //         $res = [
    //             'status' => 200,
    //             'message' => 'User Fetch Successfully',
    //         ];
    //         echo json_encode($res);

    //     } else {
    //         $res = [
    //             'status' => 404,
    //             'message' => 'Failed'
    //         ];
    //         echo json_encode($res);
    //     }
    // }

    public function addUser()
    {
        if ($this->input->is_ajax_request()) {


            $user = $this->user->get_user_by_email($this->session->userdata('email'));

            $data = [
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'role_id' => $this->input->post('role'),
                'is_active' => 0,
                'since' => time()
            ];

            $this->activity->insert('user', 'Menambahkan data user dengan email : ' . $this->input->post('email'), '', $this->input->post('email'), date('Y-m-d H:i:s'), $user['name']);

            $this->db->from('user');
            $this->db->where('email', $this->input->post('email'));
            $cek = $this->db->get()->result_array();

            if ($cek <> NULL) {
                $res = [
                    'status' => 422,
                    'message' => 'Email has been used!',
                ];
            } else {

                $query = $this->db->insert('user', $data);
                if ($query) {
                    $res = [
                        'status' => 200,
                        'message' => 'User added! Please activate the email.'
                    ];
                } else {
                    $res = [
                        'status' => 500,
                        'message' => 'Failed to add user!.'
                    ];
                }
            }
            echo json_encode($res);

        }
    }

    // Edit User Modal
    public function editUserModal($id)
    {
        if ($this->input->is_ajax_request()) {

            $id = $this->db->escape_str($id);

            $query = $this->db->get_where('user', ['id' => $id], 1);

            if ($query->num_rows() == 1) {

                $user = $query->row_array();

                $res = [
                    'status' => 200,
                    'message' => 'User Fetch Successfully',
                    'data' => $user
                ];
                echo json_encode($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'User ID Not Found'
                ];
                echo json_encode($res);
            }
        }
    }

    // Edit User
    public function editUser()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $role = $this->input->post('role');


            $update_data = [
                'name' => $name,
                'email' => $email,
                'role_id' => $role
            ];

            $this->db->where('id', $id);
            $query = $this->db->update('user', $update_data);

            if ($query) {
                $res = [
                    'status' => 200,
                    'message' => 'User edited!'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Failed to edit user!.'
                ];
            }
            echo json_encode($res);
        }
    }

    public function deleteUserModal($id)
    {
        if ($this->input->is_ajax_request()) {
            // Pastikan $id telah di-escape sebelum digunakan dalam query untuk mencegah SQL Injection
            $id = $this->db->escape_str($id);

            $query = $this->db->get_where('user', ['id' => $id], 1);

            if ($query->num_rows() == 1) {

                $user = $query->row_array();

                $res = [
                    'status' => 200,
                    'message' => 'User Fetch Successfully',
                    'data' => $user
                ];
                echo json_encode($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'User ID Not Found'
                ];
                echo json_encode($res);
            }
        }
    }
    public function deleteUser()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $user = $this->user->get_user_by_id($id);

            $this->activity->insert('user', 'Menghapus data user dengan email : ' . $user['email'], '', $user['email'], date('Y-m-d H:i:s'), $user['name']);

            $this->db->where('id', $id);
            $query = $this->db->delete('user');
            unlink("./assets/images/profile/" . $user['image']);

            if ($query) {
                $res = [
                    'status' => 200,
                    'message' => 'User deleted!.'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Failed to delete user.'
                ];
            }

            echo json_encode($res);
        }
    }

}