<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Items');
        // $this->simple_login->cek_admin();
    }

    public function index()
    {
        $data['active'] = array(
            '1' => 'font-weight-bold',
            '2' => '',
            '3' => ''
        );
        $id_user = $this->session->userdata('id');
        $data['judul'] = "Daftar Produk";
        $data['items'] = $this->Items->getAllBarang($id_user);
        $data['kategori'] = $this->Items->getAllKategori();
        $data['username'] = $this->session->userdata('username');
        $this->load->view('beranda/themes/head');
        $this->load->view('beranda/themes/vendornav', $data);
        $this->load->view('index', $data);
        $this->load->view('beranda/themes/foot');
    }

    public function AllProduct(){
        $data['active'] = array(
            '1' => 'font-weight-bold',
            '2' => '',
            '3' => ''
        );
        $config['base_url'] = base_url('products/allProduct/');
		$config['total_rows'] = $this->db->count_all_results('items'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
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
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['items'] = $this->Items->getAllProduct($config["per_page"], $data['page']);           
        $data['username'] = $this->session->userdata('username');
        $data['kategori'] = $this->Items->getallKategori();
        $data['paging'] = $this->pagination->create_links();
        if ($this->session->userdata('username') == "") {
			$this->load->view('beranda/themes/head');
            $this->load->view('beranda/themes/renternav', $data);
            $this->load->view('allProduct', $data);
            $this->load->view('beranda/themes/foot');
		}else{
			$this->load->view('beranda/themes/head');
            $this->load->view('beranda/themes/renternav', $data);
            $this->load->view('allProduct', $data);
            $this->load->view('beranda/themes/foot');
		}
        
        // $data['items'] = $this->Items->getAllProduct();
        
        // $this->load->view('beranda/themes/head');
        // $this->load->view('beranda/themes/renternav', $data);
        // $this->load->view('allProduct', $data);
        // $this->load->view('beranda/themes/foot');

    }

    public function read($id)
    {
        $data['username'] = $this->session->userdata('username');
        //digunakan untuk menampilkan data product

        $data['judul'] = "Daftar Produk";
        $data['detail'] = $this->Items->getDetail($id);
        $this->load->view('account/template/account_header', $data);
        $this->load->view('account/template/account_sidebar');
        $this->load->view('account/template/account_topbar', $data);
        switch ($data['detail']['0']['kategori']) {
            case 'Elektronik & Gadgets':
                $this->load->view('read/elektronik', $data);
            break;
            case 'Games & Toys':
                $this->load->view('read/games', $data);
            break;
            case 'Otomotif':
                $this->load->view('read/otomotif', $data);
            break;
            case 'Photography & Videography':
                $this->load->view('read/photography', $data);
            break;
            default:
            break;
        }
        $this->load->view('account/template/account_footer');
        
    }

    public function add($kategori)
    {
        $data['active'] = array(
            '1' => '',
            '2' => '',
            '3' => ''
        );
        $data['judul'] = "Tambah Item";
        $data['username'] = $this->session->userdata('username');
        $data['kategori'] = $this->Items->getKategori($kategori);
        $this->load->view('beranda/themes/head');
        $this->load->view('beranda/themes/vendornav', $data);
        switch ($kategori) {
            case 'Elektronik':
                $this->load->view('add/elektronik', $data);
            break;
            case 'Games':
                $this->load->view('add/games', $data);
            break;
            case 'Otomotif':
                $this->load->view('add/otomotif', $data);
            break;
            case 'Photography':
                $this->load->view('add/photography', $data);
            break;
            default:
                redirect('products');
            break;
        }
        $this->load->view('beranda/themes/foot');
        
    }

    public function edit($id)
    {
        $data['judul'] = "Edit Produk";
        $data['kategori'] = $this->Items->getAllKategori();
        $data['edit'] = $this->Items->getBarang($id);
        $data['username'] = $this->session->userdata('username');
        $this->load->view('account/template/account_header', $data);
        $this->load->view('account/template/account_sidebar');
        $this->load->view('account/template/account_topbar', $data);
        $this->load->view('edit', $data);
        $this->load->view('account/template/account_footer');
    }

    public function tambah_produk()
    {
        $username = $this->session->userdata('username');

        $this->form_validation->set_rules('nama_produk', 'Nama', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|numeric');
        $this->form_validation->set_rules('deposit', 'Deposit', 'trim|numeric');
        $this->form_validation->set_rules('merk', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('kategori_produk', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'trim|required');
        $this->form_validation->set_rules('antar', 'Kategori', 'trim|required');

        if ($this->form_validation->run() == false) {
            switch ($kategori) {
                case 'Elektronik':
                    redirect('products/add/elektronik');
                break;
                case 'Games':
                    redirect('products/add/games');
                break;
                case 'Otomotif':
                    redirect('products/add/otomotif');
                break;
                case 'Photography':
                    redirect('products/add/photography');
                break;
                default:
                    redirect('products');
                break;
            }
            // redirect('products/add/');
        } else {
            $nama_produk = $this->input->post('nama_produk', true);
            $harga = $this->input->post('harga', true);
            $merk = $this->input->post('merk', true);
            $kategori_produk = $this->input->post('kategori_produk', true);
            $kondisi = $this->input->post('kondisi', true);
            $antar = $this->input->post('antar', true);
            $stock = $this->input->post('stock', true);
            $deposit = $this->input->post('deposit', true);
            $deskripsi = $this->input->post('deskripsi', true);

            $this->db->select_max('id_item');
            $query = $this->db->get('items')->row();
            if ($query->id_item == ''){
                $id_items = 1;
            } else {
                $id_items = $query->id_item + 1;
            }

            $config = array(
                'upload_path' => "./assets/img/produk/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'file_name' => $id_items . ".jpeg"
            );
    
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('upload_image');
    
            $data['errors'] = $this->upload->display_errors('<p>', '</p>');
            $data['result'] = print_r($this->upload->data(), true);
            $data['files']  = print_r($_FILES, true);
            $data['post']   = print_r($_POST, true);
    
            if ($data['errors'] = $this->upload->display_errors('<p>', '</p>')) {
                $this->session->set_flashdata('error', $this->upload->display_errors('<p>', '</p>'));
                redirect('products');
            } else {
                $items = array(
                    'nama' => $nama_produk,
                    'harga' => $harga,
                    'merk' => $merk,
                    'id_kategori' => $kategori_produk,
                    'kondisi' => $kondisi,
                    'antar' => $antar,
                    'foto' => $config['file_name'], 
                    'deskripsi' => $deskripsi,
                    'stock' => $stock,
                    'deposit' => $deposit,
                    'status' => 1
                );
                $this->Items->insertBarang($items, $id_items);
    
                redirect('products');
            }
        }
    }

    public function edit_produk()
    {
        $username = $this->session->userdata('username');

        if ($username == '') {
            redirect('login');
        } else {
            $this->form_validation->set_rules('nama_produk', 'Nama', 'trim|required');
            $this->form_validation->set_rules('harga_produk', 'Harga', 'trim|required');
            $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi', 'trim|required');
            $this->form_validation->set_rules('kategori_produk', 'Kategori', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data['errors'] = null;
                $this->index();
            } else {
                $this->_editproduk();
            }
        }
    }

    private function _editproduk()
    {
        $nama_produk = $this->input->post('nama_produk', true);
        $harga_produk = $this->input->post('harga_produk', true);
        $deskripsi_produk = $this->input->post('deskripsi_produk', true);
        $kategori_produk = $this->input->post('kategori_produk', true);
        $prod_id = $this->input->post('prod_id', true);
        $total_produk = $this->db->count_all_results('products');
        $final = $total_produk + 1;
        $image = $this->input->post('upload_image', true);

        $config = array(
            'upload_path' => "./assets/img/produk/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'file_name' => $final . ".jpeg"
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $image = $this->upload->do_upload('upload_image');

        if ($image != null) {

            $data['errors'] = $this->upload->display_errors('<p>', '</p>');
            $data['result'] = print_r($this->upload->data(), true);
            $data['files']  = print_r($_FILES, true);
            $data['post']   = print_r($_POST, true);
            if ($data['errors'] = $this->upload->display_errors('<p>', '</p>')) {
                $data['username'] = $this->session->userdata('username');
                $this->load->view('account/template/account_header', $data);
                $this->load->view('account/template/account_sidebar');
                $this->load->view('account/template/account_topbar');
                $this->load->view('add', $data);
                $this->load->view('account/template/account_footer');
            } else {
                $data = array(
                    'prod_id' => $final,
                    'vend_id' => $final,
                    'prod_name' => $nama_produk,
                    'prod_price' => $harga_produk,
                    'prod_desc' => $deskripsi_produk,
                    'prod_image' => $config['file_name'],
                    'cat_id' => $kategori_produk
                );

                $this->db->where('prod_id', $prod_id);
                $this->db->update('products', $data);
            }
        } else {
            $data = array(
                'prod_id' => $final,
                'vend_id' => $final,
                'prod_name' => $nama_produk,
                'prod_price' => $harga_produk,
                'prod_desc' => $deskripsi_produk,
                'cat_id' => $kategori_produk
            );

            $this->db->where('prod_id', $prod_id);
            $this->db->update('products', $data);
        }

        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Mengubah produk $nama_produk";
        $data = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan
        );
        $this->db->insert('log', $data);

        redirect('products');
    }

    public function delete($id)
    {
        $this->db->where('prod_id', $id);
        $image = $this->db->get('products')->result_array();

        foreach ($image as $p) :
            $nama = $p['prod_name'];
            $gambar = $p['prod_image'];
            $path = "./assets/img/produk/$gambar";
            unlink($path);
        endforeach;

        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Menghapus produk $nama";
        $data = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan
        );
        $this->db->insert('log', $data);

        $this->db->where('prod_id', $id);
        $this->db->delete('products');
        redirect('products');
    }

    public function detail($id_item){
        $data['active'] = array(
            '1' => 'font-weight-bold',
            '2' => '',
            '3' => ''
        );
        $data['items'] = $this->Items->getDetail($id_item);
        $data['username'] = $this->session->userdata('username');
        $data['id_user'] = $this->session->userdata('id');
        $this->load->view('beranda/themes/head');
        if ($this->session->userdata("username") == "") {
        $this->load->view('beranda/themes/mainnav');
        } else{

        $this->load->view('beranda/themes/renternav', $data);
        }
        $this->load->view('detail', $data);
        $this->load->view('beranda/themes/foot');
    }
}
