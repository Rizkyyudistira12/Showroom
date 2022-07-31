<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 

{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user',['name' => 
             $this->session->userdata('name')])->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('templates/footer');
    }

    public function data_mobil()
    {

        $data['title'] = 'Data  Mobil Nissan';
        $data['user'] = $this->db->get_where('user',['name' => 
             $this->session->userdata('name')])->row_array();
        $data['mobil'] = $this->mobil_model->get_data('mobil')->result();
        $data['type'] = $this->mobil_model->get_data('type')->result();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/data_mobil',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_mobil()
    {
        $data['title'] = 'Tambah Data Mobil Nissan';
        $data['user'] = $this->db->get_where('user',['name' => 
             $this->session->userdata('name')])->row_array();
        $data['type'] = $this->mobil_model->get_data('type')->result();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/form_tambah_mobil',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_mobil_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == false){
            $this->tambah_mobil();
        } else {
            $kode_type      = $this->input->post('kode_type');
            $merk           = $this->input->post('merk');
            $harga          = $this->input->post('harga');
            $warna          = $this->input->post('warna');
            $tahun          = $this->input->post('tahun');
            $status         = $this->input->post('status');
            $gambar         = $_FILES['gambar']['name'];
            if($gambar=''){}else{
                $config ['upload_path']     = './assets/upload';
                $config ['allowed_types']   = 'jpg|jpeg|png|tiff';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('gambar')){
                    echo "Gambar Mobil Gagal Diupload !";
                }else {
                    $gambar=$this->upload->data('file_name');
                }
            }

            $data = array (
                'kode_type' =>  $kode_type,
                'merk'      =>  $merk,
                'harga'     =>  $harga,
                'tahun'     =>  $tahun,
                'warna'     =>  $warna,
                'status'    =>  $status,
                'gambar'    =>  $gambar,
            );

            $this->mobil_model->insert_data($data,'mobil');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan ! </div>');
            redirect('admin/data_mobil');
        }
    }

    public function update_mobil($id)
    {
        $where = array('id_mobil' => $id);
        $data['mobil'] = $this->db->query("SELECT * FROM mobil mb, type tp WHERE mb.kode_type=tp.kode_type AND mb.id_mobil='$id'")->result();
        $data['type'] = $this->mobil_model->get_data('type')->result();
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['title'] = 'Update Data Mobil';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/form_update_mobil', $data);
        $this->load->view('templates/footer');
    }

    public function update_mobil_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == false)
        {
            $this->update_mobil();
        } else {
            $id = $this->input->post('id_mobil');
            $kode_type = $this->input->post('kode_type');
            $merk = $this->input->post('merk');
            $harga = $this->input->post('harga');
            $warna = $this->input->post('warna');
            $tahun = $this->input->post('tahun');
            $status = $this->input->post('status');
            $gambar = $_FILES['gambar']['name'];
            if($gambar){
                $config ['upload_path'] = './assets/upload';
                $config ['allowed_types'] = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('gambar'))
                {
                    $gambar=$this->upload->data('file_name');
                    $this->db->set('gambar', $gambar);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'kode_type' => $kode_type,
                'merk' => $merk,
                'harga' => $harga,
                'warna' => $warna,
                'tahun' => $tahun,
                'status' => $status,
            );

            $where = array(
                'id_mobil' => $id
            );

            $this->mobil_model->update_data('mobil',$data,$where);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diupdate ! </div>');
            redirect('admin/data_mobil');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_type','Kode Type','required');
        $this->form_validation->set_rules('merk','Merk','required');
        $this->form_validation->set_rules('harga','Harga','required');
        $this->form_validation->set_rules('tahun','Tahun','required');
        $this->form_validation->set_rules('warna','Warna','required');
        $this->form_validation->set_rules('status','Status','required');
    }

    public function detail_mobil($id)
    {
        $data['detail'] = $this->mobil_model->ambil_id_mobil($id);
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

        $data['title'] = 'Detail Data Mobil';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_mobil', $data);
        $this->load->view('templates/footer');
    }

    public function delete_mobil($id)
    {
        $where = array('id_mobil' => $id);
        $this->mobil_model->delete_data($where,'mobil');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil Dihapus ! </div>');
            redirect('admin/data_mobil');
    }

    public function data_type()
    {
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['type'] = $this->mobil_model->get_data('type')->result();

        $data['title'] = 'Data Tipe Mobil';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_type', $data);
        $this->load->view('templates/footer');       
    }

    public function tambah_type()
    {
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

        $data['title'] = 'Data Tipe Mobil';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/form_tambah_type', $data);
        $this->load->view('templates/footer'); 
    }

    public function tambah_type_aksi()
    {
        $this->_rule();

        if($this->form_validation->run() == false)
        {
            $this->tambah_type();
        }else {
            $kode_type = $this->input->post('kode_type');
            $nama_type = $this->input->post('nama_type');

            $data = array(
                'kode_type' => $kode_type,
                'nama_type' => $nama_type,
            );

            $this->mobil_model->insert_data($data,'type');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Diinput ! </div>');
            redirect('admin/data_type');
        }
    }

    public function update_type($id)
    {
        $where = array('id_type' => $id);
        $data['type'] = $this->db->query("SELECT * FROM type WHERE id_type='$id'")->result();
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();
        $data['title'] = 'Data Tipe Mobil';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/form_update_type', $data);
        $this->load->view('templates/footer');
    }

    public function update_type_aksi()
    {
        $this->_rule();

        if($this->form_validation->run() == false)
        {
            $this->update_type();
        } else {
            $id = $this->input->post('id_type');
            $kode_type = $this->input->post('kode_type');
            $nama_type = $this->input->post('nama_type');

            $data = array(
                'kode_type' => $kode_type,
                'nama_type' => $nama_type
            );

            $where = array(
                'id_type' => $id
            );

            $this->mobil_model->update_data('type',$data,$where);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Tipe Data Berhasil Diupdate ! </div>');
            redirect('admin/data_type');

        }
    }

    public function _rule()
    {
        $this->form_validation->set_rules('kode_type','Kode Type','required');
        $this->form_validation->set_rules('nama_type','Nama Type','required');
    }

    public function delete_type($id)
    {
        $where = array('id_type' => $id);
        $this->mobil_model->delete_data($where,'type');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Berhasil Dihapus ! </div>');
            redirect('admin/data_type');
    }

    public function data_customer()
    {
        $data['customer'] = $this->mobil_model->get_data('customer')->result();
        $data['user'] = $this->db->get_where('user',['name' => 
        $this->session->userdata('name')])->row_array();

        $data['title'] = 'Data Customer Showroom KIA Siliwangi';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data_customer', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_customer()
    {
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

        $data['title'] = 'Data Tambah Customer';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/form_tambah_customer', $data);
        $this->load->view('templates/footer'); 
    }

    public function tambah_customer_aksi()
    {
        $this->_setting();
        if ($this->form_validation->run() == false)
        {
            $this->tambah_customer();
        }else {
            $nama           = $this->input->post('nama');
            $email          = $this->input->post('email');
            $alamat         = $this->input->post('alamat');
            $gender         = $this->input->post('gender');
            $no_telepon     = $this->input->post('no_telepon');
            $nik            = $this->input->post('nik');
            $password       = md5($this->input->post('password'));

            $data = array (
                'nama'          => $nama,
                'email'         => $email,
                'alamat'        => $alamat,
                'gender'        => $gender,
                'no_telepon'    => $no_telepon,
                'nik'           => $nik,
                'password'      => $password
            );

            $this->mobil_model->insert_data($data,'user');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Customer Data Berhasil Ditambahkan ! </div>');
            redirect('admin/data_customer');
        }
    }

    public function update_customer($id)
    {
        $where = array('id' => $id);
        $data['user'] = $this->db->query("SELECT * FROM user WHERE id ='$id'")->result();
        $data['title'] = 'Update Customer';
        $data['user'] = $this->db->get_where('user', ['name' => $this->session->userdata('name')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/form_update_customer', $data);
        $this->load->view('templates/footer');
    }

    public function update_customer_aksi()
    {
        $this->_setting();
        if ($this->form_validation->run() == false)
        {
            $this->tambah_customer();
        }else {
            $id             = $this->input->post('id');
            $nama           = $this->input->post('nama');
            $email          = $this->input->post('email');
            $alamat         = $this->input->post('alamat');
            $gender         = $this->input->post('gender');
            $no_telepon     = $this->input->post('no_telepon');
            $nik            = $this->input->post('nik');
            $password       = md5($this->input->post('password'));

            $data = array (
                'nama'          => $nama,
                'email'         => $email,
                'alamat'        => $alamat,
                'gender'        => $gender,
                'no_telepon'    => $no_telepon,
                'nik'           => $nik,
                'password'      => $password
            );

            $where = array(
                'id' => $id
            );

            $this->mobil_model->update_data('user',$data,$where);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Customer Data Berhasil Diupdate ! </div>');
            redirect('admin/data_customer');
        }
    }

    public function delete_customer($id)
    {
        $where = array('id' => $id);
        $this->mobil_model->delete_data($where,'user');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Customer Data Berhasil Dihapus ! </div>');
            redirect('admin/data_customer');
    }

    public function _setting()
    {
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('gender','Gender','required');
        $this->form_validation->set_rules('no_telepon','No. Telepon','required');
        $this->form_validation->set_rules('nik','NIK','required');
        $this->form_validation->set_rules('password','Password','required');
    }


}