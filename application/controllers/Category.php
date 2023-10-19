<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('User_model', 'user');
        $this->load->model('Activity_model', 'activity');


    }

    public function index()
    {

        // Tambah User
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));
        $data['category'] = $this->db->get('kategori')->result_array();
        $data['title'] = "Category";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/top_bar', $data);
        $this->load->view('category/index', $data);
        $this->load->view('template/footer');

    }

    // Add User Modal
    public function addCategoryModal()
    {
        if ($this->input->is_ajax_request()) {
            $res = [
                'status' => 200,
                'message' => 'Modal Fetch Successfully',
            ];
            echo json_encode($res);

        } else {
            $res = [
                'status' => 404,
                'message' => 'Failed'
            ];
            echo json_encode($res);
        }
    }


    public function addCategory()
    {
        if ($this->input->is_ajax_request()) {

            $data = [
                'nama_kategori' => $this->input->post('nama_kategori'),
            ];

            $user = $this->user->get_user_by_email($this->session->userdata('email'));
            $this->db->from('kategori');
            $this->db->where('nama_kategori', $this->input->post('nama_kategori'));
            $cek = $this->db->get()->result_array();

            if ($cek <> NULL) {
                $res = [
                    'status' => 422,
                    'message' => 'Category elready exist!',
                ];
            } else {
                $query = $this->db->insert('kategori', $data);
                if ($query) {
                    $this->activity->insert('kategori', 'Menambahkan data kategori dengan nama kategori : ' . $this->input->post('nama_kategori'), '', $this->input->post('nama_kategori'), date('Y-m-d H:i:s'), $user['name']);
                    $res = [
                        'status' => 200,
                        'message' => 'Category added!'
                    ];
                } else {
                    $res = [
                        'status' => 500,
                        'message' => 'Failed to add category!.'
                    ];
                }
            }
            echo json_encode($res);
        }
    }




    // Edit User Modal
    public function editCategoryModal($id)
    {
        if ($this->input->is_ajax_request()) {

            $id = $this->db->escape_str($id);

            $query = $this->db->get_where('kategori', ['id_kategori' => $id], 1);

            if ($query->num_rows() == 1) {

                $user = $query->row_array();

                $res = [
                    'status' => 200,
                    'message' => 'Category Fetch Successfully',
                    'data' => $user
                ];
                echo json_encode($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'Category ID Not Found'
                ];
                echo json_encode($res);
            }
        }
    }

    // Edit User
    public function editCategory()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $name = $this->input->post('name');



            $update_data = [
                'nama_kategori' => $name,
            ];

            $this->db->where('id_kategori', $id);
            $query = $this->db->update('kategori', $update_data);

            if ($query) {
                $res = [
                    'status' => 200,
                    'message' => 'Category edited!'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Failed to edit category!.'
                ];
            }
            echo json_encode($res);
        }
    }


    public function deleteCategoryModal($id)
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->db->escape_str($id);

            $query = $this->db->get_where('kategori', ['id_kategori' => $id], 1);

            if ($query->num_rows() == 1) {
                $category = $query->row_array();

                $res = [
                    'status' => 200,
                    'message' => 'Category Fetch Successfully',
                    'data' => $category
                ];
                echo json_encode($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'Category ID Not Found'
                ];
                echo json_encode($res);
            }
        }
    }
    public function deleteCategory()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');


            $this->db->where('id_kategori', $id);
            $query = $this->db->delete('kategori');

            if ($query) {
                $res = [
                    'status' => 200,
                    'message' => 'Category deleted!.'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Failed to delete category!.'
                ];
            }

            echo json_encode($res);
        }
    }

}