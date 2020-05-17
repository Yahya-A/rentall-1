<?php

class M_dashboard extends CI_Model{

    public function getReqVerif(){
        $this->db->select('user.id_user,username,no_identitas,nama_identitas,foto1,foto2');
        $this->db->from('user');
        $this->db->join('verif_identity', 'user.id_user = verif_identity.id_user');
        $this->db->where('user.verif = ', 2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function setVerified($id_user, $data){
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
        redirect(site_url('dashboard/VerifRequest'));
    }
}