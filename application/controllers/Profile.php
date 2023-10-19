<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Activity_model', 'activity');

        // isAdmin();




        $this->load->library('form_validation');
        $this->load->model('User_model', 'user');



    }

    public function index()
    {
        $data['user'] = $this->db->get('user')->result_array();

        $data['title'] = "Profile";
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/top_bar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('template/footer');
    }

    public function UserProfile()
    {
        $data['title'] = "Profile";
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));

        // $this->load->view('template/header', $data);
        // $this->load->view('template/sidebar', $data);
        // $this->load->view('template/top_bar', $data);
        $this->load->view('user/editUserProfile', $data);
        // $this->load->view('template/footer');
    }
    public function aboutUserProfile()
    {
        $data['title'] = "Profile";
        $data['admin'] = $this->user->get_user_by_email($this->session->userdata('email'));

        // $this->load->view('template/header', $data);
        // $this->load->view('template/sidebar', $data);
        // $this->load->view('template/top_bar', $data);
        $this->load->view('user/aboutUserProfile', $data);
        // $this->load->view('template/footer');
    }

    // Edit User
    public function editUserProfile()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('idImageProfile');
            $id_user = $this->input->post('idProfile');
            $name = $this->input->post('name');



            $upload_image = $_FILES['profileImage']['name'];

            if ($upload_image) {
                date_default_timezone_set("Asia/Jakarta");
                $namaFoto = date('YmdHis') . '.jpg';
                $config['upload_path'] = 'assets/images/profile/';
                $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
                $config['allowed_types'] = '*';
                $config['overwrite'] = TRUE;
                $config['file_name'] = $namaFoto;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('profileImage')) {
                    $new_image = $namaFoto;
                    // $filename = FCPATH . '/assets/images/konten/' . $old_image;
                    $filename = FCPATH . '/assets/images/profile/' . $id;
                    if (file_exists($filename)) {
                        unlink("./assets/images/profile/" . $id);
                    }
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }



            $update_data = [
                'name' => $name,
            ];


            $this->db->where('id', $id_user);
            $query = $this->db->update('user', $update_data);



            if ($query) {
                $res = [
                    'status' => 200,
                    'message' => 'Profile edited!'
                ];
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Failed to edit profile!.'
                ];
            }
            echo json_encode($res);
        }
    }

}