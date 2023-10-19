<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Dashboard";
        $this->load->view('template/header', $data);
        // $this->load->view('template/navbar');
        $this->load->view('front/index');
        $this->load->view('template/footer');
    }

}