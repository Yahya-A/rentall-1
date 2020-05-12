<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model{

    function daftar()
    {
        $data['username'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($this->input->post('password'));
        $data['level'] = "1";
        $data['status'] = "1";
        $data['verif'] = "0";
        $this->db->insert('user', $data); 
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
            'rekening' => $nomor
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
            'overwrite' => TRUE,
            'file_name' => $id_user . ".jpeg"
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
                $this->update();
            } else {
                $data = array(
                    'nama' => $nama,
                    'no_hp' => $no_hp,
                    'alamat' => $alamat,
                    'email' => $email,
                    'foto' => $config['file_name']
                );

                $this->db->where('id_user', $id_user);
                $this->db->update('renter_profile', $data);
            }
        } else {
            $data = array(
                'nama' => $nama,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
                'email' => $email
            );

            $this->db->where('id_user', $id_user);
            $this->db->update('renter_profile', $data);
        }

        $data = array(
            'status' => '2'
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
        if( $update != ""){
            $update = 1;
        } else {
            $update = 0;
        }

        $config = array(
            'upload_path' => "./assets/img/verif/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'file_name' => $id_user ."_1.jpeg"
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $image = $this->upload->do_upload('upload_image');

        $config2 = array(
            'upload_path' => "./assets/img/verif/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'file_name' => $id_user ."_2.jpeg"
        );
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        $image = $this->upload->do_upload('upload_image2');

        if ($image != null || $image2 != null) {
            $data['errors'] = $this->upload->display_errors('<p>', '</p>');
            $data['result'] = print_r($this->upload->data(), true);
            $data['files']  = print_r($_FILES, true);
            $data['post']   = print_r($_POST, true);
            if ($data['errors'] = $this->upload->display_errors('<p>', '</p>')) {
                $this->session->set_flashdata('error', $this->upload->display_errors('<p>', '</p>'));
                redirect('account/verif');
            } else {
                if($update == 1){
                    $data = array(
                        'nama_identitas' => $nama_identitas,
                        'no_identitas' => $no_identitas,
                        'foto1' => $config['file_name'],
                        'foto2' => $config2['file_name']
                    );
                    $this->db->where('id_user', $id_user);
                    $this->db->update('verif_identity', $data);
                } else {
                    $data = array(
                        'id_user' => $id_user,
                        'nama_identitas' => $nama_identitas,
                        'no_identitas' => $no_identitas,
                        'foto1' => $config['file_name'],
                        'foto2' => $config2['file_name']
                    );
    
                    $this->db->insert('verif_identity', $data);
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Foto KTP');
            redirect('account/verif');
        }

        redirect('account/read');
    }

    public function updateVendor()
    {
        $nama = $this->input->post('nama', true);
        $deskripsi = $this->input->post('deskripsi', true);
        $alamat = $this->input->post('alamat', true);
        $image = $this->input->post('upload_image', true);
        $id_user = $this->session->userdata('id');
        $update = $this->input->post('id', true);
        if( $update != ""){
            $update = 1;
        } else {
            $update = 0;
        }

        $config = array(
            'upload_path' => "./assets/img/vendor_logo/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'file_name' => $id_user . ".jpeg"
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
                redirect('account/vendorBoard');
            } else {
                if($update == 1){
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
            if($update == 1){
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
} 