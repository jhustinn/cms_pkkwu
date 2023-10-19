<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oops extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Oops!";
        // $this->load->view('template/header', $data);
        // $this->load->view('template/navbar');
        $this->load->view('404', $data);
        // $this->load->view('template/footer');
    }

}