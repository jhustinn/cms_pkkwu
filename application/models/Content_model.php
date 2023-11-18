<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getContent()
    {
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori = b.id_kategori', 'left');
        $this->db->order_by('tanggal', 'desc'); // Replace 'nama_kolom' with the actual column name you want to use for sorting
        return $this->db->get()->result_array();

    }
    public function getContentFotoId($id)
    {

        return $this->db->get_where('konten', ['foto' => $id])->result_array();

    }

}