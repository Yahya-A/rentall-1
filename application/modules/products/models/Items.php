<?php

class Items extends CI_Model{

    public function getAllBarang()
    {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('items');
        $this->db->join('kategori', 'items.id_kategori = kategori.id_kategori');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getBarang($id)
    {   
        $this->db->where('id_item', $id);
        return $this->db->get('items')->result_array();
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

}