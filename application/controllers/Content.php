<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Activity_model', 'activity');
        $this->load->model('Content_model', 'content');
        $this->load->model('User_model', 'user');

    }

    public function index()
    {

        // Tambah User
        $data['admin'] = $this->session->userdata('email');
        $data['category'] = $this->db->get('kategori')->result_array();
        $data['title'] = "Content";

        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $data['content'] = $this->db->get()->result_array();



        $this->load->view('template/header', $data);
        $this->load->view('content/index', $data);
        $this->load->view('template/footer');

    }

    public function addContent()
    {
        date_default_timezone_set("Asia/Jakarta");
        $namaFoto = date('YmdHis') . '.jpg';
        $config['upload_path'] = 'assets/images/konten/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $namaFoto;
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 500 * 1024) {
            $this->session->set_flashdata('message', '
        <div class="alert alert-primary" role="alert"> File size is too big! </div>
        ');
            redirect('content');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }


        $user = $this->user->get_user_by_email($this->session->userdata('email'));
        $data = [
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
            'foto' => $namaFoto,
            'id_kategori' => $this->input->post('kategori'),
            'slug' => str_replace(' ', '-', $this->input->post('judul')),
            'tanggal' => date('Y:m:d'),
            'username' => $user['name'],
        ];


        $this->db->from('konten');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();

        if ($cek <> NULL) {
            $this->session->set_flashdata('message', '
        <div class="alert alert-primary" role="alert"> Title elready exist! </div>
        ');
            redirect('content');
        } else {
            $query = $this->db->insert('konten', $data);
            $this->upload->do_upload('foto');
            if ($query) {

                $this->session->set_flashdata('message', '
        <div class="alert alert-primary" role="alert"> Content added! </div>
        ');
                redirect('content');
            } else {
                $this->session->set_flashdata('message', '
        <div class="alert alert-primary" role="alert"> Failed to add content! </div>
        ');
                redirect('content');
            }
        }
    }

    // Edit
    public function editPhoto()
    {

    }


    // Edit User
    public function editContent()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('judul');
        $description = $this->input->post('keterangan');
        $category = $this->input->post('edit_category');
        $upload_image = $_FILES['editImage']['name'];

        if ($upload_image) {
            date_default_timezone_set("Asia/Jakarta");
            $namaFoto = date('YmdHis') . '.jpg';
            $config['upload_path'] = 'assets/images/konten/';
            $config['max_size'] = 500 * 1024; // 500KB
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $namaFoto;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('editImage')) {
                $new_image = $namaFoto;
                $filename = FCPATH . '/assets/images/konten/' . $id;
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
            'keterangan' => $description,
            'id_kategori' => $category,
        ];

        $this->db->where('foto', $id);
        $query = $this->db->update('konten', $update_data);

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Content Edited!</div>');
            redirect('content');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to edit Content!</div>');
            redirect('content');
        }
    }


    public function deleteContent()
    {
        if ($this->input->is_ajax_request()) {
            $user = $this->user->get_user_by_email($this->session->userdata('email'));
            $id = $this->input->post('id');
            // $filename = FCPATH . '/assets/images/konten/' . $id;
            // if (file_exists($filename)) {
            unlink("./assets/images/konten/" . $id);
            // }

            $query = $this->db->get_where('konten', ['foto' => $id]);
            if ($query->num_rows() > 0) {
                $row = $query->row(); // Get the first row
                $judul_value = $row->judul; // Access the 'judul' property


            } else {
                echo 'NOOO!';
            }




            $this->db->where('foto', $id);
            $query = $this->db->delete('konten');



            if ($query) {
                $res = [
                    'status' => 200,
                    'message' => 'Content deleted!.'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Failed to delete content!.'
                ];
            }

            echo json_encode($res);
        }
    }

    public function viewImage($id)
    {
        if ($this->input->is_ajax_request()) {

            $id = $this->db->escape_str($id);

            $query = $this->db->get_where('konten', ['foto' => $id], 1);

            if ($query->num_rows() == 1) {

                $image = $query->row_array();

                $res = [
                    'status' => 200,
                    'message' => 'Content Fetch Successfully',
                    'data' => $image
                ];
                echo json_encode($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'Content ID Not Found!'
                ];
                echo json_encode($res);
            }
        }
    }

}
