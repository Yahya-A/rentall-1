<?php

class mOrder extends CI_Model{

    public function getStatus($id)
    {
        $row = $this->db->query("select status from orders where order_num = $id");
		$status = $row->row();
        return $status->status;
    }

    public function prosesOrder($id)
    {
        if ($id == 1) {
            $data = array('status' => 2 );
        } else if ($id == 2) {
            $data = array('status' => 3 );
        }
        $order_num = $this->session->userdata('order_num');
        $this->db->where('order_num', $order_num);
        $this->db->update('orders', $data);
    }

    public function insertRent($Rent){
        $this->db->insert('order_item', $Rent);
        
    }

    public function insertDetail($Detail){
        $this->db->insert('order_detail', $Detail);
        
    }
    
    public function uID(){
        $this->db->select_max('substr(id_order, 12)', 'id');
        $query = $this->db->get('order_item');
        return $query->result_array();
    }

    public function getpesan($id_user){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('order_item');
        $this->db->join('order_detail', 'order_item.id_order = order_detail.id_order');
        $this->db->join('items', 'items.id_item = order_detail.id_item', 'inner');
        $this->db->where('id_user', $id_user);
        // $this->db->where('status_sewa', 4);
        $this->db->where('status_sewa', 0);
        $this->db->group_by('order_item.id_order');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getsewa($id_user){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('order_item');
        $this->db->join('order_detail', 'order_item.id_order = order_detail.id_order');
        $this->db->join('items', 'items.id_item = order_detail.id_item', 'inner');
        $this->db->where('status_sewa', 1);
        $this->db->where('id_user', $id_user);
        // $this->db->or_where('status_sewa !=', 0);
        $this->db->or_where('status_sewa', 2);
        $this->db->group_by('order_item.id_order');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function getkembali($id_user){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('order_item');
        $this->db->join('order_detail', 'order_item.id_order = order_detail.id_order');
        $this->db->join('items', 'items.id_item = order_detail.id_item', 'inner');
        $this->db->where('id_user', $id_user);
        $this->db->where('status_sewa', 3);
        $this->db->group_by('order_item.id_order');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function cancelOrder($id){
        $this->db->delete('order_item', array('id_order' => $id));
        $this->db->delete('order_detail', array('id_order' => $id));
    }

    public function OrderReady($id){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('order_item');
        $this->db->join('order_detail', 'order_item.id_order = order_detail.id_order');
        $this->db->join('items', 'items.id_item = order_detail.id_item');
        $this->db->where('order_item.id_order', $id);
        $this->db->group_by('order_item.id_order');
        $query =$this->db->get()->row();
        $qty = $query->stock - $query->qty;

        $this->db->where('id_item', $query->id_item);
        $this->db->update('items', array('stock'=>$qty));

        $this->db->where('id_order', $id);
        $this->db->update('order_item', array('status_sewa'=>'1'));
    }

    public function OrderRent($id){
        $this->db->where('id_order', $id);
        $this->db->update('order_item', array('status_sewa'=>'2'));
    }

    public function OrderReturn($id){
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('order_item');
        $this->db->join('order_detail', 'order_item.id_order = order_detail.id_order');
        $this->db->join('items', 'items.id_item = order_detail.id_item');
        $this->db->where('order_item.id_order', $id);
        $this->db->group_by('order_item.id_order');
        $query =$this->db->get()->row();
        $qty = $query->stock + $query->qty;

        $this->db->where('id_item', $query->id_item);
        $this->db->update('items', array('stock'=>$qty));

        $this->db->where('id_order', $id);
        $this->db->update('order_item', array('status_sewa'=>'3'));
    }

}