<?php

class Items extends CI_Model{

    // digunakan untuk menginput barang "INSERT"
    public function insertBarang($items, $id_items){

        switch ($this->input->post('id_kat', true)) {
            case 'elektronik':
                $this->form_validation->set_rules('os', 'Sistem Operasi', 'trim');
                $this->form_validation->set_rules('layar', 'Layar', 'trim');
                $this->form_validation->set_rules('memori', 'Memori', 'trim');
                $this->form_validation->set_rules('harddisk', 'Penyimpanan', 'trim');
                $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim');
        
                if ($this->form_validation->run() == false) {
                    redirect('products');
                } else {
                    $this->db->insert('items', $items);
                    $elektronik = array(
                        'os' => $this->input->post('os', true),
                        'layar' => $this->input->post('layar', true),
                        'memori' => $this->input->post('memori', true),
                        'harddisk' => $this->input->post('harddisk', true),
                        'resolusi' => $this->input->post('resolusi', true),
                        'id_item' => $id_items
                    );
                    $this->db->insert('k_elektronik', $elektronik);
                }
                break;

            case 'games':
                $this->form_validation->set_rules('berat', 'Berat', 'trim');
                $this->form_validation->set_rules('ukuran', 'Ukuran', 'trim');
                $this->form_validation->set_rules('gender', 'Gender', 'trim');
        
                if ($this->form_validation->run() == false) {
                    redirect('products');
                } else {
                    $this->db->insert('items', $items);
                    $games = array(
                        'berat' => $this->input->post('berat', true),
                        'ukuran' => $this->input->post('ukuran', true),
                        'gender' => $this->input->post('gender', true),
                        'id_item' => $id_items
                    );
                    $this->db->insert('k_games', $games);
                }
                break;

            case 'otomotif':
                $this->form_validation->set_rules('bahan_bakar', 'Bahan Bakar', 'trim');
                $this->form_validation->set_rules('mesin', 'Kapasitas Mesin', 'trim');
                $this->form_validation->set_rules('km', 'KM', 'trim');
                $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'trim');
                $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim');
                $this->form_validation->set_rules('transmisi', 'Transmisi', 'trim');
                $this->form_validation->set_rules('ac', 'AC', 'trim');
                $this->form_validation->set_rules('warna', 'Warna', 'trim');
                $this->form_validation->set_rules('usb', 'USB', 'trim');
        
                if ($this->form_validation->run() == false) {
                    redirect('products');
                } else {
                    $this->db->insert('items', $items);
                    $otomotif = array(
                        'bahan_bakar' => $this->input->post('bahan_bakar', true),
                        'mesin' => $this->input->post('mesin', true),
                        'km' => $this->input->post('km', true),
                        'tahun_terbit' => $this->input->post('tahun_terbit', true),
                        'kapasitas' => $this->input->post('kapasitas', true),
                        'transmisi' => $this->input->post('transmisi', true),
                        'ac' => $this->input->post('ac', true),
                        'warna' => $this->input->post('warna', true),
                        'usb' => $this->input->post('usb', true),
                        'id_item' => $id_items
                    );
                    $this->db->insert('k_otomotif', $otomotif);
                }
                break;
                    
            case 'photography':
                $this->form_validation->set_rules('berat', 'Bahan Bakar', 'trim');
                $this->form_validation->set_rules('ukuran', 'Ukuran', 'trim');
                $this->form_validation->set_rules('material', 'Material', 'trim');
        
                if ($this->form_validation->run() == false) {
                    redirect('products');
                } else {
                    $this->db->insert('items', $items);
                    $photography = array(
                        'berat' => $this->input->post('berat', true),
                        'ukuran' => $this->input->post('ukuran', true),
                        'material' => $this->input->post('material', true),
                        'id_item' => $id_items
                    );
                    $this->db->insert('k_photography', $photography);
                }
                break;
                    
            default:
                redirect('products');
                break;
        }
    }

    // digunakan untuk mengupdate barang "UPDATE"
    public function updateBarang($items, $id_items){

        switch ($this->input->post('id_kat', true)) {
            case 'elektronik':
                $this->form_validation->set_rules('os', 'Sistem Operasi', 'trim');
                $this->form_validation->set_rules('layar', 'Layar', 'trim');
                $this->form_validation->set_rules('memori', 'Memori', 'trim');
                $this->form_validation->set_rules('harddisk', 'Penyimpanan', 'trim');
                $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim');
        
                if ($this->form_validation->run() == false) {
                    redirect('products');
                } else {
                    $this->db->where('id_item', $id_items);
                    $this->db->update('items', $items);
                    $elektronik = array(
                        'os' => $this->input->post('os', true),
                        'layar' => $this->input->post('layar', true),
                        'memori' => $this->input->post('memori', true),
                        'harddisk' => $this->input->post('harddisk', true),
                        'resolusi' => $this->input->post('resolusi', true)
                    );
                    $this->db->where('id_item', $id_items);
                    $this->db->update('k_elektronik', $elektronik);
                }
                break;

            case 'games':
                $this->form_validation->set_rules('berat', 'Berat', 'trim');
                $this->form_validation->set_rules('ukuran', 'Ukuran', 'trim');
                $this->form_validation->set_rules('gender', 'Gender', 'trim');
        
                if ($this->form_validation->run() == false) {
                    redirect('products');
                } else {
                    $this->db->where('id_item', $id_items);
                    $this->db->update('items', $items);
                    $games = array(
                        'berat' => $this->input->post('berat', true),
                        'ukuran' => $this->input->post('ukuran', true),
                        'gender' => $this->input->post('gender', true)
                    );
                    $this->db->where('id_item', $id_items);
                    $this->db->update('k_games', $games);
                }
                break;

            case 'otomotif':
                $this->form_validation->set_rules('bahan_bakar', 'Bahan Bakar', 'trim');
                $this->form_validation->set_rules('mesin', 'Kapasitas Mesin', 'trim');
                $this->form_validation->set_rules('km', 'KM', 'trim');
                $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'trim');
                $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim');
                $this->form_validation->set_rules('transmisi', 'Transmisi', 'trim');
                $this->form_validation->set_rules('ac', 'AC', 'trim');
                $this->form_validation->set_rules('warna', 'Warna', 'trim');
                $this->form_validation->set_rules('usb', 'USB', 'trim');
        
                if ($this->form_validation->run() == false) {
                    redirect('products');
                } else {
                    $this->db->where('id_item', $id_items);
                    $this->db->update('items', $items);
                    $otomotif = array(
                        'bahan_bakar' => $this->input->post('bahan_bakar', true),
                        'mesin' => $this->input->post('mesin', true),
                        'km' => $this->input->post('km', true),
                        'tahun_terbit' => $this->input->post('tahun_terbit', true),
                        'kapasitas' => $this->input->post('kapasitas', true),
                        'transmisi' => $this->input->post('transmisi', true),
                        'ac' => $this->input->post('ac', true),
                        'warna' => $this->input->post('warna', true),
                        'usb' => $this->input->post('usb', true)
                    );
                    $this->db->where('id_item', $id_items);
                    $this->db->update('k_otomotif', $otomotif);
                }
                break;
                    
            case 'photography':
                $this->form_validation->set_rules('berat', 'Bahan Bakar', 'trim');
                $this->form_validation->set_rules('ukuran', 'Ukuran', 'trim');
                $this->form_validation->set_rules('material', 'Material', 'trim');
        
                if ($this->form_validation->run() == false) {
                    redirect('products');
                } else {
                    $this->db->where('id_item', $id_items);
                    $this->db->update('items', $items);
                    $photography = array(
                        'berat' => $this->input->post('berat', true),
                        'ukuran' => $this->input->post('ukuran', true),
                        'material' => $this->input->post('material', true)
                    );
                    $this->db->where('id_item', $id_items);
                    $this->db->update('k_photography', $photography);
                }
                break;
                    
            default:
                redirect('products');
                break;
        }
    }


    public function getAllProduct($limit, $start){
        $this->db->select('*');
        $this->db->from('items');
        $this->db->where('stock >',  0);
        $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');
        $this->db->limit( $limit, $start);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function deleteBarang($id)
    {
        $this->db->from('items');
        $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');
        $this->db->where('id_item', $id);
        $data = $this->db->get()->result_array();

        $gambar = $data['0']['foto'];
        $kategori = $data['0']['kategori'];

        switch ($kategori) {
            case 'Otomotif':
                $path = "./assets/img/produk/$gambar";
                unlink($path);
        
                $this->db->where('id_item', $id);
                $this->db->delete('items');

                $this->db->where('id_item', $id);
                $this->db->delete('k_otomotif');
                break;
            case 'Elektronik & Gadgets':
                $path = "./assets/img/produk/$gambar";
                unlink($path);
        
                $this->db->where('id_item', $id);
                $this->db->delete('items');

                $this->db->where('id_item', $id);
                $this->db->delete('k_elektronik');
                break;
            case 'Games & Toys':
                $path = "./assets/img/produk/$gambar";
                unlink($path);
        
                $this->db->where('id_item', $id);
                $this->db->delete('items');

                $this->db->where('id_item', $id);
                $this->db->delete('k_games');
                break;
            case 'Photography & Videography':
                $path = "./assets/img/produk/$gambar";
                unlink($path);
        
                $this->db->where('id_item', $id);
                $this->db->delete('items');

                $this->db->where('id_item', $id);
                $this->db->delete('k_photography');
                break;
            
            default:
                redirect('products');
                break;
        }
    }

    public function getAllBarang()
    {
        $id_user = $this->session->userdata('id');
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('items');
        $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');
        $this->db->where('id_vendor', $id_user);
        $query=$this->db->get();
        return $query->result_array();
    }

    //digunakan untuk mengambil seluruh data barang pada menu "Item Saya"
    public function getBarangSaya()
    {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->where('id_user', $this->session->userdata('id'));
        $this->db->from('items');
        $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');
        $query=$this->db->get();
        return $query->result_array();
    }

    // digunakan untuk mengambil detail barang "READ"
    public function getDetail($id)
    {
        $this->db->where('id_item', $id);
        $this->db->from('items');
        $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');
        $kategori = $this->db->get()->row();

        switch ($kategori->kategori) {
            case 'Otomotif':
                $this->db->where('items.id_item', $id);
                $this->db->where('k_otomotif.id_item', $id);
                $this->db->from('items');
                $this->db->from('k_otomotif');
                $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');
                $this->db->join('vendor_profile', 'vendor_profile.id_vendor = items.id_vendor');
                $query=$this->db->get();
                return $query->result_array();
                break;

            case 'Elektronik & Gadgets':
                $this->db->where('items.id_item', $id);
                $this->db->where('k_elektronik.id_item', $id);
                $this->db->from('items');
                $this->db->from('k_elektronik');
                $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');
                $this->db->join('vendor_profile', 'vendor_profile.id_vendor = items.id_vendor');
                $query=$this->db->get();
                return $query->result_array();
                break;

            case 'Games & Toys':
                $this->db->where('items.id_item', $id);
                $this->db->where('k_games.id_item', $id);
                $this->db->from('items');
                $this->db->from('k_games');
                $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');
                $this->db->join('vendor_profile', 'vendor_profile.id_vendor = items.id_vendor');
                $query=$this->db->get();
                return $query->result_array();
                break;

            case 'Photography & Videography':
                $this->db->where('items.id_item', $id);
                $this->db->where('k_photography.id_item', $id);
                $this->db->from('items');
                $this->db->from('k_photography');
                $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');
                $this->db->join('vendor_profile', 'vendor_profile.id_vendor = items.id_vendor');
                $query=$this->db->get();
                return $query->result_array();
                break;
            
            default:
                # code...
                break;
        }
        
    }
    
    public function getAllKategori()
    {
        $this->db->group_by("kategori");
        return $this->db->get('kategori')->result_array();
    }

    public function getKategori($kategori)
    {
        $this->db->like('kategori', $kategori);
        return $this->db->get('kategori')->result_array();
    }

    public function search($keyword){
        $this->db->select('*');
        $this->db->like('nama', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        $this->db->from('items');
        $this->db->where('stock >',  0);
        $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');   
        $result = $this->db->get(); // Tampilkan data siswa berdasarkan keyword
        return $result;
   }
}