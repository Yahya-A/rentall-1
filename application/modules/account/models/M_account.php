<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_account extends CI_Model
{

    public function getKat(){
        $this->db->select('kategori');
        $this->db->group_by('kategori');
        return $this->db->get('kategori')->result_array();
    }

    public function getSubKat(){
        return $this->db->get('kategori')->result_array();
    }

    public function change_password()
    {
        $id = $this->session->userdata('id');
        $password_lama = $this->input->post('password_lama', true);
        $password_baru = $this->input->post('password_baru', true);
        $query = $this->db->get_where('user',array('id_user'=>$id,'password' => md5($password_lama)));
        if($query->num_rows() == 1) {
            $data = array(
                'password' => md5($password_baru)
            );
            $this->db->where('id_user', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('sukses', "Password berhasil diubah");
        } else {
            $this->session->set_flashdata('error', "Password lama tidak sesuai");
        }
        redirect('account/renter');
    }
    public function getOrder()
    {
        $id_user = $this->session->userdata('id');
        
        $this->db->where_not_in('status', 5);
        $this->db->where('id_user', $id_user);
        return $this->db->get('order_item')->result_array();
    }

    public function getRiwayat()
    {
        $id_user = $this->session->userdata('id');
        
        $this->db->where('status', 5);
        $this->db->where('id_user', $id_user);
        return $this->db->get('order_item')->result_array();
    }

    public function getTotal()
    {
        $id_user = $this->session->userdata('id');
        $rows = $this->db->query('select sum(harga * durasi * qty) as total from items, cart where items.id_item = cart.id_item and cart.id_user = "' . $id_user . '"');
        $price = $rows->row();
        return $harga = $price->total;
    }

    public function cart()
    {
        $id_user = $this->session->userdata('id');

        $this->db->where('id_user', $id_user);
        return $this->db->get('cart')->result_array();
    }

    public function daftar()
    {
        $data['username'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($this->input->post('password'));
        $data['level'] = "1";
        $data['status'] = "1";
        $data['verif'] = "0";
        $this->db->insert('user', $data);
    }

    public function getNewProduct()
    {   
        $this->db->select('*');
        $this->db->from('items');
        $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');
        $this->db->order_by('id_item', 'DESC');
        $this->db->where('stock >',  0);
        $this->db->limit(8);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getUserData()
    {
        $id = $this->session->userdata('id');
        $query = "SELECT * FROM user u, renter_profile r WHERE u.id_user = $id and r.id_user = $id";
        return $this->db->query($query)->result_array();
    }

    public function getBank()
    {
        $id = $this->session->userdata('id');
        $this->db->where('id_user', $id);
        return $this->db->get('bank_profile')->result_array();
    }

    public function add_bank()
    {
        $nama = $this->input->post('nama', true);
        $an = $this->input->post('an', true);
        $nomor = $this->input->post('nomor', true);
        $id = $this->session->userdata('id');

        $data = array(
            'id_user' => $id,
            'bank' => $nama,
            'an' => $an,
            'rekening' => $nomor
        );

        $this->db->insert('bank_profile', $data);
        redirect('account/bank');
    }

    public function edit_bank()
    {
        $nama = $this->input->post('nama', true);
        $an = $this->input->post('an', true);
        $nomor = $this->input->post('nomor', true);
        $id = $this->input->post('id', true);

        $data = array(
            'bank' => $nama,
            'an' => $an,
            'rekening' => $nomor,
        );
        $this->db->where('id', $id);
        $this->db->update('bank_profile', $data);

        redirect('account/bank');
    }

    public function editbiodata()
    {
        $nama = $this->input->post('nama', true);
        $no_hp = $this->input->post('no_hp', true);
        $alamat = $this->input->post('alamat', true);
        $email = $this->input->post('email', true);
        $id_user = $this->input->post('id_user', true);
        $image = $this->input->post('upload_image', true);

        $config = array(
            'upload_path' => "./assets/img/foto_profile/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => true,
            'file_name' => $id_user . ".jpeg",
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $image = $this->upload->do_upload('upload_image');

        if ($image != null) {
            $data['errors'] = $this->upload->display_errors('<p>', '</p>');
            $data['result'] = print_r($this->upload->data(), true);
            $data['files'] = print_r($_FILES, true);
            $data['post'] = print_r($_POST, true);
            if ($data['errors'] = $this->upload->display_errors('<p>', '</p>')) {
                $this->update();
            } else {
                $data = array(
                    'nama' => $nama,
                    'no_hp' => $no_hp,
                    'alamat' => $alamat,
                    'email' => $email,
                    'foto' => $config['file_name'],
                );

                $this->db->where('id_user', $id_user);
                $this->db->update('renter_profile', $data);
            }
        } else {
            $data = array(
                'nama' => $nama,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
                'email' => $email,
            );

            $this->db->where('id_user', $id_user);
            $this->db->update('renter_profile', $data);
        }

        $data = array(
            'status' => '2',
        );

        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);

        $this->session->set_userdata('status', 2);

        redirect('account/readRenter');
    }

    public function mverif_akun()
    {
        $id_user = $this->session->userdata('id');
        $nama_identitas = $this->input->post('nama_identitas', true);
        $no_identitas = $this->input->post('no_identitas', true);
        $image = $this->input->post('upload_image', true);
        $image2 = $this->input->post('upload_image2', true);
        $update = $this->input->post('id', true);
        if ($update != "") {
            $update = 2;
        } else {
            $update = 0;
        }

        $config = array(
            'upload_path' => "./assets/img/verif/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => true,
            'file_name' => $id_user . "_1.jpeg",
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $image = $this->upload->do_upload('upload_image');

        $config2 = array(
            'upload_path' => "./assets/img/verif/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => true,
            'file_name' => $id_user . "_2.jpeg",
        );
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        $image = $this->upload->do_upload('upload_image2');

        if ($image != null || $image2 != null) {
            $data['errors'] = $this->upload->display_errors('<p>', '</p>');
            $data['result'] = print_r($this->upload->data(), true);
            $data['files'] = print_r($_FILES, true);
            $data['post'] = print_r($_POST, true);
            if ($data['errors'] = $this->upload->display_errors('<p>', '</p>')) {
                $this->session->set_flashdata('error', $this->upload->display_errors('<p>', '</p>'));
                redirect('account/renter');
            } else {
                if ($update == 1) {
                    $data = array(
                        'nama_identitas' => $nama_identitas,
                        'no_identitas' => $no_identitas,
                        'foto1' => $config['file_name'],
                        'foto2' => $config2['file_name'],
                    );
                    $this->db->where('id_user', $id_user);
                    $this->db->update('verif_identity', $data);
                    $this->session->set_flashdata('sukses', 'Berhasil mengubah data');
                } else {
                    $data = array(
                        'id_user' => $id_user,
                        'nama_identitas' => $nama_identitas,
                        'no_identitas' => $no_identitas,
                        'foto1' => $config['file_name'],
                        'foto2' => $config2['file_name'],
                    );

                    $this->db->insert('verif_identity', $data);
                    $this->session->set_flashdata('sukses', 'Verifikasi akan ditinjau');
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Foto Tidak Boleh Kosong');
            redirect('account/renter');
        }

        redirect('account/renter');
    }

    public function updateVendor()
    {
        $nama = $this->input->post('nama', true);
        $deskripsi = $this->input->post('deskripsi', true);
        $alamat = $this->input->post('alamat', true);
        $image = $this->input->post('upload_image', true);
        $id_user = $this->session->userdata('id');
        $update = $this->input->post('id', true);
        if ($update != "") {
            $update = 1;
        } else {
            $update = 0;
        }

        $config = array(
            'upload_path' => "./assets/img/vendor_logo/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => true,
            'file_name' => $id_user . ".jpeg",
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $image = $this->upload->do_upload('upload_image');

        if ($image != null) {
            $data['errors'] = $this->upload->display_errors('<p>', '</p>');
            $data['result'] = print_r($this->upload->data(), true);
            $data['files'] = print_r($_FILES, true);
            $data['post'] = print_r($_POST, true);
            if ($data['errors'] = $this->upload->display_errors('<p>', '</p>')) {
                $this->session->set_flashdata('error', $this->upload->display_errors('<p>', '</p>'));
                redirect('account/vendorBoard');
            } else {
                if ($update == 1) {
                    $data = array(
                        'nama_vendor' => $nama,
                        'deskripsi_vendor' => $deskripsi,
                        'alamat' => $alamat,
                        'foto' => $config['file_name']
                    );
                    $this->db->where('id_user', $id_user);
                    $this->db->update('vendor_profile', $data);
                } else {
                    $data = array(
                        'id_user' => $id_user,
                        'nama_vendor' => $nama,
                        'deskripsi_vendor' => $deskripsi,
                        'alamat' => $alamat,
                        'foto' => $config['file_name']
                    );

                    $this->db->insert('vendor_profile', $data);
                }
            }
        } else {
            if ($update == 1) {
                $data = array(
                    'nama_vendor' => $nama,
                    'deskripsi_vendor' => $deskripsi,
                    'alamat' => $alamat
                );
                $this->db->where('id_user', $id_user);
                $this->db->update('vendor_profile', $data);
            } else {
                $data = array(
                    'id_user' => $id_user,
                    'nama_vendor' => $nama,
                    'deskripsi_vendor' => $deskripsi,
                    'alamat' => $alamat
                );

                $this->db->insert('vendor_profile', $data);
            }
        }
        $this->session->set_userdata('level', '2');

        $data = array(
            'level' => "2"
        );
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);

        redirect('account/vendorBoard');
    }

    public function getMenunggu($id_vendor){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('order_item');
        $this->db->join('order_detail', 'order_item.id_order = order_detail.id_order');
        $this->db->join('items', 'items.id_item = order_detail.id_item', 'inner');
        $this->db->where('order_item.id_vendor', $id_vendor);
        $this->db->where('status_sewa', 0);
        $this->db->group_by('order_item.id_order');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getSiap($id_vendor){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('order_item');
        $this->db->join('order_detail', 'order_item.id_order = order_detail.id_order');
        $this->db->join('items', 'items.id_item = order_detail.id_item', 'inner');
        $this->db->where('order_item.id_vendor', $id_vendor);
        $this->db->where('status_sewa', 1);
        $this->db->group_by('order_item.id_order');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getSewa($id_vendor){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('order_item');
        $this->db->join('order_detail', 'order_item.id_order = order_detail.id_order');
        $this->db->join('items', 'items.id_item = order_detail.id_item', 'inner');
        $this->db->where('order_item.id_vendor', $id_vendor);
        $this->db->where('status_sewa', 2);
        $this->db->group_by('order_item.id_order');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getKembali($id_vendor){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('order_item');
        $this->db->join('order_detail', 'order_item.id_order = order_detail.id_order');
        $this->db->join('items', 'items.id_item = order_detail.id_item', 'inner');
        $this->db->where('order_item.id_vendor', $id_vendor);
        $this->db->where('status_sewa', 3);
        $this->db->group_by('order_item.id_order');
        $query=$this->db->get();
        return $query->result_array();
    }
} 
