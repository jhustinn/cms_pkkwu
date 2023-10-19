<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activity_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getActivity()
    {
        $this->db->from('log_aktivitas a');
        $this->db->join('user b', 'a.name = b.name');
        $query = $this->db->get()->result_array();
        return $query;
    }


    function insert($tables_name, $description, $before, $after, $date, $name)
    {
        $data = [
            'name' => $name,
            'deskripsi' => $description,
            'tanggal' => $date,
            'nama_tabel' => $tables_name,
            'sebelum' => $before,
            'sesudah' => $after,
        ];
        $this->db->insert('log_aktivitas', $data);
    }


}