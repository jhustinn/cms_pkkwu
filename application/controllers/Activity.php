<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activity extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Activity_model', 'activity');
        $this->load->model('User_model', 'user');
        $admin = $this->user->get_user_by_email($this->session->userdata('email'));
        is_logged_in();

        if ($admin['role_id'] != 1) {
            redirect('blocked');
        }
    }

    public function index()
    {
        $data['title'] = "Activity";
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));
        $data['activity'] = $this->activity->getActivity();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/top_bar', $data);
        $this->load->view('activity/index');
        $this->load->view('template/footer');
    }

}