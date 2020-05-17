<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_account'); 
    }
    public function index()
    {
        if($this->session->userdata('status') == 1) {
            $this->updateRenter();
        } else if ($this->session->userdata('status') == 2){
            $this->renterEtalase();
        } else {
            redirect(site_url());
        }
    }

    // Manajemen Renter Start

    public function renterEtalase()
    {
        if ($this->simple_login->cek_login()== TRUE) {
            redirect(site_url(''));
        } else {
            $data['active'] = array(
                '1' => 'font-weight-bold',
                '2' => '',
                '3' => ''
            );
            $data['judul'] = "Dashboard";
            $data['username'] = $this->session->userdata('username');
            $this->load->view('beranda/themes/head');
            $this->load->view('beranda/themes/renternav', $data);
            $this->load->view('beranda/etalase');
            $this->load->view('beranda/themes/foot');
        }
    }

    public function renter()
    {
        if($this->session->userdata('status') == 1) {
            $this->updateRenter();
        }  else if ($this->session->userdata('status') == 2){
            $this->readRenter();
        }
    }

    public function updateRenter()
    {
        $data['active'] = array(
            '1' => '',
            '2' => '',
            '3' => ''
        );
        $data['judul'] = "Update Data Diri";
        $data['daftar'] = $this->M_account->getUserData();
        $data['username'] = $this->session->userdata('username');
        $this->load->view('beranda/themes/head');
        $this->load->view('beranda/themes/renternav', $data);
        $this->load->view('renterprofile', $data);
        $this->load->view('beranda/themes/foot');
    }

    public function readRenter()
    {
        if($this->session->userdata('status') == 1) {
            redirect('account/update');
        } else if ($this->session->userdata('status') == 2){
            $data['active'] = array(
                '1' => '',
                '2' => '',
                '3' => ''
            );
            $id = $this->session->userdata('id');
            $query = $this->db->query("select verif from user where id_user = $id");
            $data['verif'] = $query->row()->verif;
            $data['daftar'] = $this->M_account->getUserData();
            $data['judul'] = "Biodata Diri";
            $data['username'] = $this->session->userdata('username');
            $this->load->view('beranda/themes/head');
            $this->load->view('beranda/themes/renternav', $data);
            $this->load->view('renterprofile', $data);
            $this->load->view('beranda/themes/foot');
        }
    }

    public function penyewaanRenter()
    {
            $data['active'] = array(
                '1' => '',
                '2' => 'font-weight-bold',
                '3' => ''
            );
            $data['judul'] = "Dashboard";
            $data['username'] = $this->session->userdata('username');
            $this->load->view('beranda/themes/head');
            $this->load->view('beranda/themes/renternav', $data);
            $this->load->view('beranda/penyewaan');
            $this->load->view('beranda/themes/foot');
    }

    // Manajemen Renter End

    // Manajemen Vendor Start

    public function vendorBoard()
    {
        // $data['active'] = array(
        //     '1' => '',
        //     '2' => '',
        //     '3' => ''
        // );
        $data['judul'] = "Data Vendor";
        $data['username'] = $this->session->userdata('username');
        $id = $this->session->userdata('id');
        if($this->session->userdata('level') == 1 ){
            redirect("account/dataVendor/$id");
        } else {
            $this->vendorProfile();
            // $data['active'] = array(
            //     '1' => 'font-weight-bold',
            //     '2' => '',
            //     '3' => ''
            // );
            // $this->db->where('id_user', $id);
            // $data['vendor'] = $this->db->get('vendor_profile')->result_array();
            // $this->load->view('beranda/themes/head');
            // $this->load->view('beranda/themes/vendornav', $data);
            // $this->load->view('products/index', $data);
            // $this->load->view('beranda/themes/foot');
        }
    }

    public function dataVendor($id) 
    {
        $data['active'] = array(
            '1' => 'font-weight-bold',
            '2' => '',
            '3' => ''
        );
        $data['judul'] = "Data Vendor";
        $data['username'] = $this->session->userdata('username');
        $data['id'] = $id;
        $this->db->where('id_user', $id);
        $data['vendor'] = $this->db->get('vendor_profile')->result_array();
        $this->load->view('beranda/themes/head');
        $this->load->view('beranda/themes/vendornav', $data);
        $this->load->view('vendor/update', $data);
        $this->load->view('beranda/themes/foot');
    }

    public function update_vendor($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['errors'] = null;
            $this->vendorBoard();
        } else {
            $this->M_account->updateVendor();
        }
    }

    public function additem()
    {
        $data['active'] = array(
            '1' => 'font-weight-bold',
            '2' => '',
            '3' => ''
        );
        $data['username'] = $this->session->userdata('username');
        $data['vendor'] = $this->db->get('vendor_profile')->result_array();
        $this->load->view('beranda/themes/head');
        $this->load->view('beranda/themes/vendornav', $data);
        $this->load->view('vendor/additem', $data);
        $this->load->view('beranda/themes/foot');
    }

    public function penyewaanVendor()
    {
        $data['active'] = array(
            '1' => '',
            '2' => 'font-weight-bold',
            '3' => ''
        );
        $data['username'] = $this->session->userdata('username');
        $data['vendor'] = $this->db->get('vendor_profile')->result_array();
        $this->load->view('beranda/themes/head');
        $this->load->view('beranda/themes/vendornav', $data);
        $this->load->view('vendor/penyewaan', $data);
        $this->load->view('beranda/themes/foot');
    }

    public function vendorProfile()
    {
        $data['active'] = array(
            '1' => '',
            '2' => '',
            '3' => ''
        );
        $data['judul'] = "Data Vendor";
        $data['username'] = $this->session->userdata('username');
        $id = $this->session->userdata('id');
        $this->db->where('id_user', $id);
        $data['vendor'] = $this->db->get('vendor_profile')->result_array();
        $this->load->view('beranda/themes/head');
        $this->load->view('beranda/themes/vendornav', $data);
        $this->load->view('vendor/vendorprofile', $data);
        $this->load->view('beranda/themes/foot');
    }

    // Manajemen Vendor End

    public function logout(){
        $this->simple_login->logout(); 
    }

    public function login()
    {
        $valid = $this->form_validation;
        $username = $this->input->post('username'); 
        $password = $this->input->post('password'); 
        $valid->set_rules('username','Username','required');
        $valid->set_rules('password','Password','required');

        if($valid->run()) { 
            $this->simple_login->login($username,$password,base_url('dashboard'), base_url('account/login')); 
        }

        if($this->session->userdata('username') == '') {
            redirect(site_url(''));
        } else {
            $this->dashboard();
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['errors'] = null;
            $this->updateRenter();
        } else {
            $this->M_account->editbiodata();
        }
    }


    public function verif_akun()
    {
        $this->form_validation->set_rules('no_identitas', 'No Identitas', 'trim|required');
        $this->form_validation->set_rules('nama_identitas', 'Nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['errors'] = null;
            $this->verif();
        } else {
            $this->M_account->mverif_akun();
        }
    }

    public function verif()
    {   
        $id = $this->session->userdata('id');
        $row = $this->db->query("select * from verif_identity where id_user = $id");
		$hasil = $row->row();
        if($hasil == null){
            redirect('account/updateVerifikasi');
        } else {
            $query = $this->db->query("select verif from user where id_user = $id");
            $data['verif'] = $query->row()->verif;
            $this->db->where('id_user', $id);
            $data['data'] = $this->db->get('verif_identity')->result_array();
            $data['judul'] = "Biodata Diri";
            $data['username'] = $this->session->userdata('username');
            $this->load->view('template/account_header', $data);
            $this->load->view('template/account_sidebar');
            $this->load->view('template/account_topbar', $data);
            $this->load->view('verifikasi/read_verif', $data);
            $this->load->view('template/account_footer');
        }

    }

    public function updateVerifikasi()
    {
        $id = $this->session->userdata('id');
        $row = $this->db->query("select * from verif_identity where id_user = $id");
        $data['data'] = $row->result_array();
        
        $data['judul'] = "Verif Data Diri";
        $data['username'] = $this->session->userdata('username');
        $this->load->view('template/account_header', $data);
        $this->load->view('template/account_sidebar');
        $this->load->view('template/account_topbar', $data);
        $this->load->view('verifikasi/verif', $data);
        $this->load->view('template/account_footer');
    }

    public function register()
    {
        $this->load->library(array('form_validation')); 
        $this->load->helper(array('url','form')); 
        
        $this->form_validation->set_rules('username', 'USERNAME','required');
        $this->form_validation->set_rules('email','EMAIL','required|valid_email');
        $this->form_validation->set_rules('password','PASSWORD','required'); 
        $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password] ');
        if($this->form_validation->run() == FALSE) { 
            if($this->session->userdata('username') == '') {
                $this->load->view('dashboard');
            } else {
                redirect(site_url('dashboard'));
            }
        }else{
            $this->M_account->daftar();
            $pesan['message'] = "Pendaftaran berhasil";
            $this->load->view('account/v_success',$pesan);
        }
    }

    public function log()
    {
        $this->simple_login->cek_admin(); 
        $data['judul'] = "Daftar Log";
        $data['log'] = $this->db->get('log')->result_array();
        $data['username'] = $this->session->userdata('username');
		$this->load->view('template/account_header', $data);
		$this->load->view('template/account_sidebar');
		$this->load->view('template/account_topbar', $data);
		$this->load->view('index', $data);
		$this->load->view('template/account_footer');
    }

    public function bank()
    {
        $data['judul'] = "Akun Bank";
        $data['bank'] = $this->M_account->getBank();
        $data['username'] = $this->session->userdata('username');
        $this->load->view('template/account_header', $data);
        $this->load->view('template/account_sidebar');
        $this->load->view('template/account_topbar', $data);
        $this->load->view('bank/bank', $data);
        $this->load->view('template/account_footer');
    }

    public function add_bank()
    {
        $this->form_validation->set_rules('nama', 'Bank', 'trim|required');
        $this->form_validation->set_rules('an', 'Atas Nama', 'trim|required');
        $this->form_validation->set_rules('nomor', 'Nomor Rekening', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Tambah Akun Bank";
            $data['username'] = $this->session->userdata('username');
            $this->load->view('template/account_header', $data);
            $this->load->view('template/account_sidebar');
            $this->load->view('template/account_topbar', $data);
            $this->load->view('bank/add', $data);
            $this->load->view('template/account_footer');
        } else {
            $this->M_account->add_bank();
        }
    }
    
    public function e_bank($id)
    {
        $this->form_validation->set_rules('nama', 'Bank', 'trim|required');
        $this->form_validation->set_rules('an', 'Atas Nama', 'trim|required');
        $this->form_validation->set_rules('nomor', 'Nomor Rekening', 'trim|required');

        $data['judul'] = "Edit Akun Bank";
        $data['username'] = $this->session->userdata('username');
        $data['id'] = $id;
        $this->db->where('id', $id);
        $data['bank'] = $this->db->get('bank_profile')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/account_header', $data);
            $this->load->view('template/account_sidebar');
            $this->load->view('template/account_topbar', $data);
            $this->load->view('bank/edit', $data);
            $this->load->view('template/account_footer');
        } else {
            $this->M_account->edit_bank();
        }
    }
    
    public function d_bank($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('bank_profile');
        redirect('account/bank');
    }
}