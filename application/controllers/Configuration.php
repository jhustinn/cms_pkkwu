<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Configuration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', 'user');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Configuration";
        $data['admin'] = $this->session->userdata('email');
        $data['config'] = $this->db->get('konfigurasi')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('configuration/index', $data);
        $this->load->view('template/footer');
    }

    public function addConfig()
    {
        $id = $this->input->post('configId');


        $update_data = [
            'judul_website' => $this->input->post('web_title'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('address'),
            'profil_website' => $this->input->post('web_profile'),
            'instagram' => $this->input->post('instagram'),
            'no_wa' => $this->input->post('whatsapp')
        ];

        $this->db->where('id_konfigurasi', $id);
        $query = $this->db->update('konfigurasi', $update_data);

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Configuration Updated!</div>');
            redirect('configuration');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Failed to Update Configuration!</div>');
            redirect('configuration');
        }
    }



}