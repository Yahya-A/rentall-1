<?php

class mBeranda extends CI_Model{

    public function getAllKategori()
    {   
        return $this->db->get('kategori')->result_array();
    }

    public function getProduct($id)
    {   
        $this->db->where('id_kategori', $id);
        return $this->db->get('items')->result_array();
    }

    public function getAllProduct()
    {   
        return $this->db->get('items')->result_array();
    }

    public function getDetail($id)
    {   
        $this->db->where('prod_id', $id);
        return $this->db->get('items')->result_array();
    }

    public function addTC()
    {
        $id_product = $this->input->post('id', true);
        $durasi = $this->input->post('durasi', true);
        $username = $this->session->userdata('username');

        $id_user = $this->session->userdata('id');

		$rows = $this->db->query('select * from cart where prod_id ="'.$id_product.'" and id_user = "'.$id_user.'"');
        if ($rows->num_rows() == 1) {
            $product = $rows->row();
            $qty = $product->qty + $durasi;
            $data = array(
                    'qty' => $qty
            );
            $this->db->where('prod_id', $id_product);
            $this->db->update('cart', $data);
        } else {
            $data = array(
                'prod_id' => $id_product,
                'qty' => $durasi,
                'id_user' => $id_user
            );
            
            $this->db->insert('cart', $data);  
        }

        redirect('beranda/keranjang');
    }

    public function getATC()
    {
        $id_user = $this->session->userdata('id');

        $this->db->where('id_user', $id_user);
        return $this->db->get('cart')->result_array();
    }

    public function getTotal()
    {
        $id_user = $this->session->userdata('id');
        $rows = $this->db->query('select sum(harga * durasi) as total from items, cart where items.id_item = cart.id_item and cart.id_user = "' . $id_user . '"');
        $price = $rows->row();
        return $harga = $price->total;
    }

    public function co()
    {
        $id_user = $this->session->userdata('id');

		$row = $this->db->query('select max(id_order) as id_order from order_item');
		$id_order = $row->row();
        $nomor = $id_order->id_order;
        $no_order = 1;
        if($nomor == 0){
            $no_orderf= $no_order;
        } else {
            $no_orderf= $nomor+1;
        }

        if ($this->input->post('pembayaran', true) == "ditempat") {
            $pembayaran = 1;
        } else {
            $pembayaran = 2;
        }


        if ($this->input->post('antar', true) == "antar") {
            $antar = 1;
        } else {
            $antar = 2;
        }
        
        $query = $this->db->query('select * from cart where id_user = "'.$id_user.'"')->result_array();
        
        $data = array(
            'id_order' => $no_orderf, 
            'id_user' => $id_user,
            'status' => 0,
            'id_pembayaran' => $pembayaran,
            'antar' => $antar
        );

        $this->db->insert('order_item', $data);

        foreach ($query as $q ) {
            $datetime1 = date_create($q['tgl_sewa']);
            $datetime2 = date_create($q['tgl_kembali']);
            $durasi = date_diff($datetime1, $datetime2)->format('%a');
            
            $id_item = $q['id_item'];
            $data_d = array(
                'id_order' => $no_orderf,
                'id_item' => $id_item,
                'qty' => $q['qty'],
                'tgl_sewa' => $q['tgl_sewa'],
                'tgl_kembali' => $q['tgl_kembali'],
                'durasi_sewa' => $durasi
            );
            $this->db->insert('order_detail', $data_d);
        }
        $total_bayar = $this->getTotal(); 
        $this->db->where('id_user', $id_user);
        $this->db->delete('cart');
        if ($pembayaran == 1) {
            $this->session->set_flashdata('success', 'Silahkan lakukan pembayaran saat pengambilan barang sebesar Rp. '.number_format($total_bayar,0,",",".").' ');
        } else {
            $this->session->set_flashdata('success', 'Silahkan lakukan pembayaran sebesar Rp. '.number_format($total_bayar,0,",",".").' ');
        }
        redirect('account/penyewaanRenter');
    }

    public function getOrder()
    {
        $id_user = $this->session->userdata('id');

        $this->db->where('cust_id', $id_user);
        return $this->db->get('orders')->result_array();
    }
}