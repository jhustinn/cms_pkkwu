<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getConfiguration()
    {

        return $this->db->get('konfigurasi')->result_array();
        // return $this->db->get('konten')->result_array();

    }

}