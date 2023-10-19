<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', 'user');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/top_bar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

}