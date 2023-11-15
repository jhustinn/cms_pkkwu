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

    public function simpan()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'level' => 1,
        );
        $this->db->insert('user', $data);
    }
    public function update()
    {
        $where = array(
            'id_user' => $this->input->Post('id_user')
        );
        $data = array(
            'nama' => $this->input->post('nama')
        );
        $this->db->update('user', $data, $where);
    }
}


