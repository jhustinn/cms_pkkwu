<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catagory_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getContentByCategory()
    {

        return $this->db->get('kategori')->result_array();


    }

}