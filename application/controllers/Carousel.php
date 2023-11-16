<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Content_model', 'content');
        $this->load->model('Carousel_model', 'carousel');
        $this->load->model('User_model', 'user');

    }

    public function index()
    {

        // Tambah User
        $data['admin'] = $this->session->userdata('email');
        $data['carousel'] = $this->db->get('carousel')->result_array();
        $data['title'] = "Carousel";

        // $this->db->from('konten a');
        // $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        // $data['content'] = $this->db->get()->result_array();



        $this->load->view('template/header', $data);
        $this->load->view('carousel/index', $data);
        $this->load->view('template/footer');

    }

    // Add User Modal
    public function addContentModal()
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


    public function addPhoto()
    {
        date_default_timezone_set("Asia/Jakarta");
        $namaFoto = date('YmdHis') . '.jpg';
        $config['upload_path'] = 'assets/images/carousel/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $namaFoto;
        $this->load->library('upload', $config);
        // if ($_FILES['foto']['size'] >= 500 * 1024) {
        // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File size is too big!</div>');
        // redirect('carousel');
        // } else
        if (!$this->upload->do_upload('foto')) {
            echo $this->upload->display_errors();
        } else {
            $data = array('upload_data' => $this->upload->data());
        }


        $data = [
            'judul' => $this->input->post('title'),
            'foto' => $namaFoto,
        ];


        $this->db->from('carousel');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();

        if ($cek <> NULL) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Title Already Exist!</div>');
            redirect('carousel');
        } else {
            $query = $this->db->insert('carousel', $data);
            $this->upload->do_upload('foto');
            if ($query) {

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo Added!</div>');
                redirect('carousel');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to add Photo!</div>');
                redirect('carousel');
            }
        }
    }


    // Edit User Modal
    public function editPhoto()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $upload_image = $_FILES['editImage']['name'];

        if ($upload_image) {
            date_default_timezone_set("Asia/Jakarta");
            $namaFoto = date('YmdHis') . '.jpg';
            $config['upload_path'] = 'assets/images/carousel/';
            $config['max_size'] = 500 * 1024; // 500KB
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $namaFoto;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('editImage')) {
                $new_image = $namaFoto;
                $filename = FCPATH . '/assets/images/carousel/' . $id;
                if (file_exists($filename)) {
                    unlink($filename);
                }
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            // Jika pengguna tidak mengunggah gambar baru, gunakan nama file yang ada
            $new_image = $id;
        }

        $update_data = [
            'judul' => $title,
            'foto' => $new_image,
        ];

        $this->db->where('foto', $id); // Ubah kondisi sesuai dengan struktur tabel Anda
        $query = $this->db->update('carousel', $update_data);

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo Edited!</div>');
            redirect('carousel');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to edit Photo!</div>');
            redirect('carousel');
        }
    }


    public function deletePhoto($id)
    {
        unlink("./assets/images/carousel/" . $id);

        $this->db->where('foto', $id);
        $query = $this->db->delete('carousel');



        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo Deleted!</div>');
            redirect('carousel');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to delete Photo!</div>');
            redirect('carousel');
        }
    }

}