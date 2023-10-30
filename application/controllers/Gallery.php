<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Gallery";
        $data['admin'] = $this->session->userdata('email');
        $data['gallery'] = $this->db->get('gallery')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('gallery/index', $data);
        $this->load->view('template/footer');
    }

    public function addPhoto()
    {
        date_default_timezone_set("Asia/Jakarta");
        $namaFoto = date('YmdHis') . '.jpg';
        $config['upload_path'] = 'assets/images/galeri/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $namaFoto;
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 500 * 1024) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">File size is too big!</div>');
            redirect('gallery');
        } elseif (!$this->upload->do_upload('foto')) {
            echo $this->upload->display_errors();
        } else {
            $data = array('upload_data' => $this->upload->data());
        }


        $data = [
            'judul' => $this->input->post('title'),
            'foto' => $namaFoto,
        ];


        $this->db->from('gallery');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();

        if ($cek <> NULL) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Title Already Exist!</div>');
            redirect('gallery');
        } else {
            $query = $this->db->insert('gallery', $data);
            $this->upload->do_upload('foto');
            if ($query) {

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo Added!</div>');
                redirect('gallery');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to add Photo!</div>');
                redirect('gallery');
            }
        }
    }

    public function editPhoto()
    {
        $id = $this->input->post('id');

        $title = $this->input->post('title');

        $upload_image = $_FILES['edit']['name'];

        if ($upload_image) {
            date_default_timezone_set("Asia/Jakarta");
            $namaFoto = date('YmdHis') . '.jpg';
            $config['upload_path'] = 'assets/images/galeri/';
            $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $namaFoto;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('editImage')) {
                $new_image = $namaFoto;
                // $filename = FCPATH . '/assets/images/konten/' . $old_image;
                $filename = FCPATH . '/assets/images/faleri/' . $id;
                if (file_exists($filename)) {
                    unlink("./assets/images/galeri/" . $id);
                }
                $this->db->set('foto', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }



        $update_data = [
            'judul' => $title,
            'foto' => $new_image,
        ];


        $this->db->where('foto', $id);
        $query = $this->db->update('gallery', $update_data);



        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo Edited!</div>');
            redirect('gallery');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to edit Photo!</div>');
            redirect('gallery');
        }
    }

    public function deletePhoto($id)
    {
        $id = $this->input->post('id');
        unlink("./assets/images/galeri/" . $id);

        $this->db->where('foto', $id);
        $query = $this->db->delete('gallery');



        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo Deleted!</div>');
            redirect('gallery');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to delete Photo!</div>');
            redirect('gallery');
        }
    }

}