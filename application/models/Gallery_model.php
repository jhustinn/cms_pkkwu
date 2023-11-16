<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getGaleri()
    {

        return $this->db->get('gallery')->result_array();

    }

}