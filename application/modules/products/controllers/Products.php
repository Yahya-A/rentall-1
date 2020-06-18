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
        $data['judul'] = "Daftar Produk";
        $data['items'] = $this->Items->getBarangSaya();
        $data['kategori'] = $this->Items->getAllKategori();
        $data['username'] = $this->session->userdata('username');
        $this->load->view('beranda/themes/head');
        $this->load->view('beranda/themes/vendornav', $data);
        $this->load->view('index', $data);
        $this->load->view('beranda/themes/foot');
    }

    public function edit($id)
    {
        $data['active'] = array(
            '1' => '',
            '2' => '',
            '3' => ''
        );
        $data['username'] = $this->session->userdata('username');
        //digunakan untuk menampilkan data product

        $data['detail'] = $this->Items->getDetail($id);
        $data['kategoriDB'] = $data['detail']['0']['kategori'];
        $data['kategori'] = $this->Items->getKategori($data['kategoriDB']);
        $data['judul'] = "Daftar Produk";
        $this->load->view('beranda/themes/head');
        $this->load->view('beranda/themes/vendornav', $data);
        switch ($data['kategoriDB']) {
            case 'Elektronik & Gadgets':
                $this->load->view('edit/elektronik', $data);
            break;
            case 'Games & Toys':
                $this->load->view('edit/games', $data);
            break;
            case 'Otomotif':
                $this->load->view('edit/otomotif', $data);
            break;
            case 'Photography & Videography':
                $this->load->view('edit/photography', $data);
            break;
            default:
            break;
        }
        $this->load->view('beranda/themes/foot');
        
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

    //digunakan untuk menerima form tambah data produk
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
            $id_user = $this->session->userdata('id');

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
                'file_name' => $id_items ."_". $id_user . ".jpeg"
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
                    'id_user' => $id_user,
                    'status' => 1
                );
                $this->Items->insertBarang($items, $id_items);
    
                redirect('products');
            }
        }
    }

    // digunakan untuk menerima form edit produk
    public function edit_produk($id_items)
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
            redirect('products');
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
            $id_user = $this->session->userdata('id');

            $config = array(
                'upload_path' => "./assets/img/produk/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'file_name' => $id_items ."_". $id_user . ".jpeg"
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
                        'id_user' => $id_user,
                        'status' => 1
                    );
                    $this->Items->updateBarang($items, $id_items);
        
                    redirect('products');
                }
            } else {
                $items = array(
                    'nama' => $nama_produk,
                    'harga' => $harga,
                    'merk' => $merk,
                    'id_kategori' => $kategori_produk,
                    'kondisi' => $kondisi,
                    'antar' => $antar,
                    'deskripsi' => $deskripsi,
                    'stock' => $stock,
                    'deposit' => $deposit,
                    'id_user' => $id_user,
                    'status' => 1
                );
                $this->Items->updateBarang($items, $id_items);
    
                redirect('products');
            }
        }
    }

    public function hapus($id)
    {
        $this->Items->deleteBarang($id);
        redirect('products');
    }
}
