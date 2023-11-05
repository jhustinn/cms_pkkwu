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
        $data['admin'] = $this->session->userdata('email');
        $data['category'] = $this->db->get('kategori')->result_array();
        $data['title'] = "Category";

        $this->load->view('template/header', $data);
        $this->load->view('category/index', $data);
        $this->load->view('template/footer');

    }



    public function addCategory()
    {

        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
        ];

        $this->db->from('kategori');
        $this->db->where('nama_kategori', $this->input->post('nama_kategori'));
        $cek = $this->db->get()->result_array();

        if ($cek <> NULL) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Category elready exist!</div>');
            redirect('category');
        } else {
            $query = $this->db->insert('kategori', $data);
            if ($query) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category added!</div>');
                redirect('category');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to add category!</div>');
                redirect('category');
            }
        }
    }




    // Edit User
    public function editCategory()
    {
        $id = $this->input->post('id_kategori');
        $name = $this->input->post('nama_kategori');



        $update_data = [
            'nama_kategori' => $name,
        ];

        $this->db->where('id_kategori', $id);
        $query = $this->db->update('kategori', $update_data);

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category edited!</div>');
            redirect('category');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to edit category!</div>');
            redirect('category');
        }
    }


    public function deleteCategory($id)
    {


        $this->db->where('id_kategori', $id);
        $query = $this->db->delete('kategori');

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Category Deleted!</div>');
            redirect('category');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to delete category!</div>');
            redirect('category');
        }
    }

}