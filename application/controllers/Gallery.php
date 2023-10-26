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
        $data['title'] = "Configuration";
        $data['admin'] = $this->session->userdata('email');
        $data['gallery'] = $this->db->get('gallery')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('gallery/index', $data);
        $this->load->view('template/footer');
    }
}