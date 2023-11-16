<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousel_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCarousel()
    {

        return $this->db->get('carousel')->result_array();


    }

}