<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Dashboard";
        $this->load->view('front/template/header', $data);
        // $this->load->view('template/navbar');
        $this->load->view('front/index');
        $this->load->view('front/template/footer');
    }

}