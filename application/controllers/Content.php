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


    public function addContent()
    {
        if ($this->input->is_ajax_request()) {
            date_default_timezone_set("Asia/Jakarta");
            $namaFoto = date('YmdHis') . '.jpg';
            $config['upload_path'] = 'assets/images/konten/';
            $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $namaFoto;
            $this->load->library('upload', $config);
            if ($_FILES['foto']['size'] >= 500 * 1024) {
                $res = [
                    'status' => 422,
                    'message' => 'File size is too big!',
                ];
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

            $this->activity->insert('konten', 'Menambahkan data konten dengan judul : ' . $this->input->post('judul'), '', $this->input->post('judul'), date('Y-m-d H:i:s'), $user['name']);

            $this->db->from('konten');
            $this->db->where('judul', $this->input->post('judul'));
            $cek = $this->db->get()->result_array();

            if ($cek <> NULL) {
                $res = [
                    'status' => 422,
                    'message' => 'Title elready exist!',
                ];
            } else {
                $query = $this->db->insert('konten', $data);
                $this->upload->do_upload('foto');
                if ($query) {

                    $res = [
                        'status' => 200,
                        'message' => 'Content added!'
                    ];
                } else {
                    $res = [
                        'status' => 500,
                        'message' => 'Failed to add content!.'
                    ];
                }
            }
            echo json_encode($res);
        }
    }


    // Edit User Modal
    public function editContentModal($id)
    {
        if ($this->input->is_ajax_request()) {

            $id = $this->db->escape_str($id);

            $query = $this->db->get_where('konten', ['foto' => $id], 1);

            if ($query->num_rows() == 1) {

                $content = $query->row_array();

                $res = [
                    'status' => 200,
                    'message' => 'Content Fetch Successfully',
                    'data' => $content
                ];
                echo json_encode($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'Content ID Not Found'
                ];
                echo json_encode($res);
            }
        }
    }

    // Edit User
    public function editContent()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id_edit_image');
            $id_konten = $this->input->post('id_edit_content');

            $title = $this->input->post('edit_title');
            $description = $this->input->post('edit_description');
            $category = $this->input->post('edit_category');

            $upload_image = $_FILES['editImage']['name'];

            if ($upload_image) {
                date_default_timezone_set("Asia/Jakarta");
                $namaFoto = date('YmdHis') . '.jpg';
                $config['upload_path'] = 'assets/images/konten/';
                $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
                $config['allowed_types'] = '*';
                $config['overwrite'] = TRUE;
                $config['file_name'] = $namaFoto;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('editImage')) {
                    $new_image = $namaFoto;
                    // $filename = FCPATH . '/assets/images/konten/' . $old_image;
                    $filename = FCPATH . '/assets/images/konten/' . $id;
                    if (file_exists($filename)) {
                        unlink("./assets/images/konten/" . $id);
                    }
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }



            $update_data = [
                'judul' => $title,
                'foto' => $namaFoto,
                'keterangan' => $description,
                'id_kategori' => $category,
            ];


            $this->db->where('id_konten', $id_konten);
            $query = $this->db->update('konten', $update_data);



            if ($query) {
                $res = [
                    'status' => 200,
                    'message' => 'Content edited!'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Failed to edit content!.'
                ];
            }
            echo json_encode($res);
        }
    }


    public function deleteContentModal($id)
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->db->escape_str($id);

            $query = $this->db->get_where('konten', ['foto' => $id]);

            if ($query->num_rows() == 1) {
                $content = $query->row_array();

                $res = [
                    'status' => 200,
                    'message' => 'Content Fetch Successfully',
                    'data' => $content
                ];
                echo json_encode($res);
            } else {
                $res = [
                    'status' => 404,
                    'message' => 'Content ID Not Found'
                ];
                echo json_encode($res);
            }
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

                $this->activity->insert('konten', 'Menghapus data konten dengan judul : ' . $judul_value, $judul_value, '', date('Y-m-d H:i:s'), $user['name']);

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