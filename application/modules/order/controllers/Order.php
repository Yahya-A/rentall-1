<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		// $this->simple_login->cek_admin(); 
		$this->load->model('mOrder');
    }
    
	public function index()
	{
		$data['judul'] = "Daftar Order";
        $data['orders'] = $this->db->query('select * from orders, users where orders.cust_id = users.id_user')->result_array();
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('index', $data);
		$this->load->view('dashboard/template/home_footer');
	}

	public function proses($id)
	{
		$data['judul'] = "Daftar Product";
        $data['orders'] = $this->db->query("select * from orderitems od, products p, category c where od.order_num = $id and p.prod_id = od.prod_id and p.cat_id = c.cat_id ")->result_array();
		$data['username'] = $this->session->userdata('username');
		$data['status'] = $this->mOrder->getStatus($id);
		$data['nomor'] = $id; 
		$this->session->set_userdata('order_num', $id); 
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('proses', $data);
		$this->load->view('dashboard/template/home_footer');		
	}

	public function proses_order($id)
	{
		$this->mOrder->prosesOrder($id);
		$this->session->unset_userdata('order_num');
		redirect('order');
	}

	public function RentNow(){
		if($this->session->userdata('id')) {

			if ($this->input->post('pembayaran') == 2) {
				$id_vendor = $this->input->post('id_vendor');
				$this->db->where('id_user', $id_vendor);
				$query = $this->db->get('bank_profile');
				
				if($query->num_rows() == 1) { 
					$row = $this->mOrder->uID();
					$randnum = random_string('nozero', 3);
					$randcode = strtoupper(random_string('alpha', 4));
					$tgl_order = date("Y-m-d H:i:s");
					$dd = date("d");
					$status = "0";
					foreach($row as $uid){
						if ($uid['id'] == null) {
							$final = 1;
						}else{
							$final = $uid['id']+1;
						}
					}
					$id_order = "RN".$dd.$randnum.$randcode.$final;
					$data['order'] = array(
						'id_order' => $id_order,
						'id_user'=> $this->input->post('id_user'),
						'id_vendor'=> $this->input->post('id_vendor'),
						'tanggal_order'=> $tgl_order,
						'status_sewa'=> $status,
						'antar'=> $this->input->post('antar'),
						'id_pembayaran'=> $this->input->post('pembayaran')
					);
					$this->mOrder->insertRent($data['order']);
					$data['detail'] = array(
						'id_order' => $id_order,
						'id_item'=> $this->input->post('id_item'),
						'tgl_sewa'=> $this->input->post('tgl_sewa'),
						'tgl_kembali'=> $this->input->post('tgl_kembali'),
						'qty'=> $this->input->post('qty'),
						'durasi_sewa'=> $this->input->post('durasi'),
						'total_harga'=> $this->input->post('total_harga')
					);
					$this->mOrder->insertDetail($data['detail']);
					$response = array('notif' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Pemesanan berhasil - </strong> Tunggu sampai Vendor mengkonfimasi pesanan Anda
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
					echo $response['notif'];
				} else {
					$response = array('notif' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Pemesanan gagal - </strong> Vendor ini hanya melayani pembayaran melalui COD
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>');
				  echo $response['notif'];
				}
				
			} else { 
				$row = $this->mOrder->uID();
				$randnum = random_string('nozero', 3);
				$randcode = strtoupper(random_string('alpha', 4));
				$tgl_order = date("Y-m-d H:i:s");
				$dd = date("d");
				$status = "0";
				foreach($row as $uid){
					if ($uid['id'] == null) {
						$final = 1;
					}else{
						$final = $uid['id']+1;
					}
				}
				$id_order = "RN".$dd.$randnum.$randcode.$final;
				$data['order'] = array(
					'id_order' => $id_order,
					'id_user'=> $this->input->post('id_user'),
					'id_vendor'=> $this->input->post('id_vendor'),
					'tanggal_order'=> $tgl_order,
					'status_sewa'=> $status,
					'antar'=> $this->input->post('antar'),
					'id_pembayaran'=> $this->input->post('pembayaran')
				);
				$this->mOrder->insertRent($data['order']);
				$data['detail'] = array(
					'id_order' => $id_order,
					'id_item'=> $this->input->post('id_item'),
					'tgl_sewa'=> $this->input->post('tgl_sewa'),
					'tgl_kembali'=> $this->input->post('tgl_kembali'),
					'qty'=> $this->input->post('qty'),
					'durasi_sewa'=> $this->input->post('durasi'),
					'total_harga'=> $this->input->post('total_harga')
				);
				$this->mOrder->insertDetail($data['detail']);
				$response = array('notif' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Pemesanan berhasil - </strong> Tunggu sampai Vendor mengkonfimasi pesanan Anda
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				echo $response['notif'];
			}
			
		} else {
			$response = array('notif' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Pemesanan gagal - </strong> Sebelum melakukan pemesanan, silahkan login terlebih dahulu
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
		  echo $response['notif'];
		}
	}

	public function penyewaanRenter()
    {
		if ($this->simple_login->cek_login() == TRUE) {
			redirect('');
		}
            $data['active'] = array(
                '1' => '',
                '2' => 'font-weight-bold',
                '3' => ''
			);
			$id_user = $this->session->userdata('id');
			$data['dipesan'] = $this->mOrder->getpesan($id_user);
			$data['sewa'] = $this->mOrder->getsewa($id_user);
			$data['kembali'] = $this->mOrder->getkembali($id_user);
            $data['judul'] = "Dashboard";
            $data['username'] = $this->session->userdata('username');
            $this->load->view('beranda/themes/head');
            $this->load->view('beranda/themes/renternav', $data);
            $this->load->view('penyewaan', $data);
            $this->load->view('beranda/themes/foot');
	}

	public function Cancel($id){
		$this->mOrder->cancelOrder($id);
		redirect(base_url('order/penyewaanRenter'));
	}

	public function Ready($id){
		$this->mOrder->OrderReady($id);
		redirect(base_url('account/penyewaanVendor'));
	}

	public function Rent($id){
		$this->mOrder->OrderRent($id);
		redirect(base_url('order/penyewaanRenter'));
	}

	public function Return($id){
		$this->mOrder->OrderReturn($id);
		redirect(base_url('account/penyewaanVendor'));
	}
}