<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $data['config'] = $this->configu->getConfiguration();
        $data['konten'] = $this->konten->getContent();
        $data['galeri'] = $this->galeri->getGaleri();
        $data['kategori'] = $this->kategori->getCategory();
        $data['carousel'] = $this->carousel->getCarousel();
        $this->load->view('front/template/header', $data);
        // $this->load->view('template/navbar');
        $this->load->view('front/index', $data);
        $this->load->view('front/template/footer', $data);
    }

}