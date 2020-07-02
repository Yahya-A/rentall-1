<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        // $this->simple_login->cek_admin(); 
        $this->load->model('Kategori');
        $this->load->library('pagination');
	}
	
	public function index($id)
	{
		switch ($id) {
			case '1':
				$cat = 'Otomotif';
				break;
			case '2':
				$cat = 'Photography & Videography';
				break;
			case '3':
				$cat = 'Elektronik & Gadgets';
				break;
			case '4':
				$cat = 'Games & Toys';
				break;	
			default:
				$cat = '';
				break;
		}
		$data['active'] = array(
            '1' => 'font-weight-bold',
            '2' => '',
            '3' => ''
		);

		//pagination
		$config['base_url'] = base_url('category/index/'.$id);
		$config['total_rows'] = $this->Kategori->getRow($cat); //total row
        $config['per_page'] = 3;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '&raquo;';
        $config['prev_link']        = '&laquo;';
        $config['full_tag_open']    = '<ul class="pagination pg-blue justify-content-center mt-5">';
        $config['full_tag_close']   = '</ul>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '</span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link" aria-label="Next"><span aria-hidden="true">';
        $config['next_tagl_close']  = '</span><span class="sr-only">Next</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link" aria-label="Previous"><span aria-hidden="true">';
        $config['prev_tagl_close']  = '</span><span class="sr-only">Previous</span></span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link" aria-label="Previous"><span aria-hidden="true">';
        $config['first_tagl_close'] = '</span><span class="sr-only">Previous</span></span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link" aria-label="Next"><span aria-hidden="true">';
        $config['last_tagl_close']  = '</span><span class="sr-only">Next</span></span></li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['PerKategori'] = $this->Kategori->getPerKategori($cat , $config["per_page"], $data['page']);           
 
        $data['paging'] = $this->pagination->create_links();
		//pagination


		// $data['PerKategori'] = $this->Kategori->getPerKategori($cat);
		$data['kategori'] = $this->Kategori->getKategori();
		$data['username'] = $this->session->userdata('username');
		if ($this->session->userdata('username') == "") {
			$this->load->view('beranda/themes/head');
			$this->load->view('beranda/themes/mainnav', $data);
			$this->load->view('index', $data);
			$this->load->view('beranda/themes/foot');
		}else{
			$this->load->view('beranda/themes/head');
			$this->load->view('beranda/themes/vendornav', $data);
			$this->load->view('index', $data);
			$this->load->view('beranda/themes/foot');
		}
	}
	
	// public function Category($id){
	// 	$data['kategori'] = $this->Kategori->getKategori();
	// 	$data['username'] = $this->session->userdata('username');
	// 	$this->load->view('beranda/themes/head');
    //     $this->load->view('beranda/themes/vendornav', $data);
    //     $this->load->view('index', $data);
    //     $this->load->view('beranda/themes/foot');
	// }

    public function barang()
    {
		$data['judul'] = "Daftar Barang";
        $data['kategori'] = $this->Kategori->getAllKategori();
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('barang', $data);
		$this->load->view('dashboard/template/home_footer');
	}
	
	public function daftar($id)
	{
		$data['judul'] = "Daftar Produk";
        $data['barang'] = $this->Kategori->getBarangKategori($id);
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('products/index', $data);
		$this->load->view('dashboard/template/home_footer');
	}

	public function add()
	{
		$data['judul'] = "Tambah Kategori";
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('add');
		$this->load->view('dashboard/template/home_footer');
	}


	public function edit($id)
	{
		$data['judul'] = "Edit Produk";
		$data['edit'] = $this->Kategori->getKategori($id);
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('edit', $data);
		$this->load->view('dashboard/template/home_footer');
	}

    public function tambah_category()
    {
		$this->form_validation->set_rules('id_kategori', 'ID', 'trim|required');
		$this->form_validation->set_rules('nama_kategori', 'Nama', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['errors'] = null;
			$this->load->view('dashboard/template/home_header', $data);
			$this->load->view('dashboard/template/home_sidebar');
			$this->load->view('dashboard/template/home_topbar', $data);
			$this->load->view('add', $data);
			$this->load->view('dashboard/template/home_footer');
		} else {
			$this->Kategori->tambahKategori();
			redirect('category');
		}
    }

	public function edit_kategori()
	{
		$this->form_validation->set_rules('id_kategori', 'ID', 'trim|required');
		$this->form_validation->set_rules('nama_kategori', 'Nama', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['errors'] = null;
			$this->load->view('dashboard/template/home_header', $data);
			$this->load->view('dashboard/template/home_sidebar');
			$this->load->view('dashboard/template/home_topbar', $data);
			$this->load->view('add', $data);
			$this->load->view('dashboard/template/home_footer');
		} else {
			$this->Kategori->editKategori();
			redirect('category');
		}
	}

    public function delete($id)
    {
		$row = $this->db->query('select prod_name from products where cat_id ="'.$id.'"');
		$kategori = $row->row();
		$namaa = $kategori->prod_name;
		if($namaa != null){ 
			$this->session->set_flashdata('error', 'Kategori tidak dapat dihapus karena terdapat produk');
		} else {
			$row = $this->db->query('select cat_name from category where cat_id ="'.$id.'"');
			$kategori = $row->row();
			$nama = $kategori->cat_name;

			$this->db->where('cat_id', $id);
			$this->db->delete('category');
			
			$ip_address = $_SERVER['REMOTE_ADDR'];
			$username = $this->session->userdata('username');
			$keterangan = "Menghapus kategori $nama";
			$data = array(
				'username' => $username,
				'ip' => $ip_address,
				'keterangan' => $keterangan
			);
			$this->db->insert('log', $data);
		}
		
		redirect('category'); 
    }

	

}