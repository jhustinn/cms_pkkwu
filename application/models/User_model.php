<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsers()
    {
        return $this->db->get('user')->result();
    }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }
    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('user')->row_array();
    }

}