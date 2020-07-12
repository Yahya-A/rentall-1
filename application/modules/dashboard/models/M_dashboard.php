<?php

class M_dashboard extends CI_Model{

    public function getReqVerif(){
        $this->db->select('user.id_user,username,no_identitas,nama_identitas,foto1,foto2');
        $this->db->from('user');
        $this->db->join('verif_identity', 'user.id_user = verif_identity.id_user');
        $this->db->where('user.verif = ', 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function setVerified($id_user, $data){
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
        redirect(site_url('dashboard/VerifRequest'));
    }

    public function getOrder(){
        $this->db->select('order_item.id_order, renter_profile.nama as penyewa, items.nama as item, qty, total_harga, nama_vendor');
        $this->db->where('order_item.id_order = order_detail.id_order');
        $this->db->where('vendor_profile.id_vendor = order_item.id_vendor');
        $this->db->where('renter_profile.id_user = order_item.id_user');
        $this->db->where('items.id_item = order_detail.id_item');
        $this->db->from('order_item');
        $this->db->from('renter_profile');
        $this->db->from('vendor_profile');
        $this->db->from('order_detail');
        $this->db->from('items');
        $query = $this->db->get('');
        return $query->result();
    }

    public function getVendor()
    {
        return $this->db->get('vendor_profile')->result();
    }

    public function getPengguna()
    {
        return $this->db->get('renter_profile')->result();
    }
}