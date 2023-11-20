<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
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
        $data['title'] = "Blog";
        $data['gallery'] = $this->db->get('gallery')->result_array();
        $data['config'] = $this->configu->getConfiguration();
        $data['konten'] = $this->konten->getContent();
        $data['galeri'] = $this->galeri->getGaleri();
        $data['kategori'] = $this->kategori->getCategory();
        $data['carousel'] = $this->carousel->getCarousel();
        $this->load->view('front/template/header', $data);
        $this->load->view('front/blog_index', $data);
        $this->load->view('front/template/footer', $data);
    }

    public function detail($id)
    {

        $this->db->from('konten');
        $this->db->where('slug', $id);
        $cek = $this->db->get()->result_array();

        if ($cek <> NULL) {
            $data['title'] = "Blog";
            $data['gallery'] = $this->db->get('gallery')->result_array();
            $data['config'] = $this->configu->getConfiguration();
            $data['konten'] = $this->konten->getContentBySlug($id);
            $data['kontenAll'] = $this->konten->getContentDetail($id);
            $data['galeri'] = $this->galeri->getGaleri();
            $data['kategori'] = $this->kategori->getCategory();
            $data['carousel'] = $this->carousel->getCarousel();
            $this->load->view('front/template/header', $data);
            $this->load->view('front/detail_index', $data);
            $this->load->view('front/template/footer', $data);
        } else {
            $data['title'] = "Blog";
            $data['gallery'] = $this->db->get('gallery')->result_array();
            $data['config'] = $this->configu->getConfiguration();
            $data['konten'] = $this->konten->getContent();
            $data['kontenAll'] = $this->konten->getContentDetail($id);
            $data['galeri'] = $this->galeri->getGaleri();
            $data['kategori'] = $this->kategori->getCategory();
            $data['carousel'] = $this->carousel->getCarousel();
            $this->load->view('front/template/header', $data);
            $this->load->view('404', $data);
            $this->load->view('front/template/footer', $data);
        }
    }

}