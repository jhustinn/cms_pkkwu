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

}