<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 

{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Profilku';
        $data['user'] = $this->db->get_where('user',['name' => 
             $this->session->userdata('name')])->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/index',$data);
        $this->load->view('templates/footer');
    }
}