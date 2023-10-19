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

        return $this->db->get('konten')->result_array();

    }
    public function getContentFotoId($id)
    {

        return $this->db->get_where('konten', ['foto' => $id])->result_array();

    }

}