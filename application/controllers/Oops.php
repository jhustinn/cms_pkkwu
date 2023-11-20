<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oops extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model', 'configu');
        $this->load->model('Content_model', 'konten');
        $this->load->model('Gallery_model', 'galeri');
        $this->load->model('Category_model', 'kategori');
        $this->load->model('Carousel_model', 'carousel');
    }

    public function index()
    {
        $data['title'] = "Oops!";
        $data['gallery'] = $this->db->get('gallery')->result_array();
        $data['config'] = $this->configu->getConfiguration();
        $data['konten'] = $this->konten->getContent();
        $data['galeri'] = $this->galeri->getGaleri();
        $data['kategori'] = $this->kategori->getCategory();
        $data['carousel'] = $this->carousel->getCarousel();
        $this->load->view('front/template/header', $data);
        $this->load->view('404', $data);
        $this->load->view('front/template/footer', $data);
    }

}