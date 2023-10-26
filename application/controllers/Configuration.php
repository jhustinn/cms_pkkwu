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
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('configId');


            $update_data = [
                'judul_website' => $this->input->post('web_title'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('address'),
                'profil_website' => $this->input->post('web_profile'),
                'instagram' => $this->input->post('instagram'),
                'no_wa' => $this->input->post('wa_number')
            ];

            $this->db->where('id_konfigurasi', $id);
            $query = $this->db->update('konfigurasi', $update_data);

            if ($query) {
                $res = [
                    'status' => 200,
                    'message' => 'Configuration saved!'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Configruation Failed!.'
                ];
            }
            echo json_encode($res);
        }
    }



}