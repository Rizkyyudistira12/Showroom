<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
    public function index()
    {
        $data['mobil'] = $this->mobil_model->get_data('mobil')->result();
        $data['title'] = 'KIA Showroom';
        
        $this->load->view('templates/customer_header',$data);
        $this->load->view('customer/dashboard',$data);
        $this->load->view('templates/customer_footer');
    }

    public function about()
    {
        $data['title'] = 'Tentang Kami';
        
        $this->load->view('templates/customer_header',$data);
        $this->load->view('customer/tentang_kami',$data);
        $this->load->view('templates/customer_footer');
    }

    public function detail_mobil($id)
    {

        $data['detail'] = $this->mobil_model->ambil_id_mobil($id);
        $data['title'] = 'Detail Mobil';
        
        $this->load->view('templates/customer_header',$data);
        $this->load->view('customer/detail_mobil',$data);
        $this->load->view('templates/customer_footer');
    }
}