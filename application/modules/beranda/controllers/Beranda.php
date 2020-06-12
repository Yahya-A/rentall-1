<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

     var $data;

	function __construct()
	{
          parent::__construct();
          $this->load->model('mBeranda');
          $this->data = $this->mBeranda->getAllKategori();
     }
     
     public function index()
     {
          if ($this->session->userdata('username') != '') {
               $data['showmodal'] = "<script type='text/javascript'>
                                   $(document).ready(function(){
                                   $('#Modal').modal('show');
                                   });
                                   </script>";
               
          }
          $data['kategori'] = $this->data;
          $data['title'] = "RentALL";
          $data['product'] = $this->mBeranda->getAllProduct();
          $this->load->view('themes/head');
          $this->load->view('themes/mainnav');
          $this->load->view('etalase',$data);
          $this->load->view('themes/foot');
     }
     
     public function daftar($id)
     {
          $data['kategori'] = $this->data;
          $data['product'] = $this->mBeranda->getProduct($id);
          $data['title'] = "Daftar Produk";
          $this->load->view('template/beranda_header', $data);
          $this->load->view('daftar', $data);
          $this->load->view('template/beranda_footer');
     }

     public function product($id)
     {
          $data['kategori'] = $this->data;
          $data['product'] = $this->mBeranda->getDetail($id);
          $data['title'] = "Detail Produk";
          $this->load->view('template/beranda_header', $data);
          $this->load->view('product', $data);
          $this->load->view('template/beranda_footer');
     }

     public function atc()
     {
          if ($this->simple_login->cek_login() ) {
               $this->load->view('account/beranda');
          } else {
               $this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');

               if ($this->form_validation->run() == false) {
                    redirect('');
               } else {
                    $this->mBeranda->addTC();
               }
          }
     }

     public function login()
     {
          $this->load->view('account/beranda');
     }

     public function keranjang()
     {
          
          if ($this->simple_login->cek_login() == TRUE){
               redirect('');
          } else {
               $data['kategori'] = $this->data;
               $data['product'] = $this->mBeranda->getATC();
               $data['price'] = $this->mBeranda->getTotal();
               $data['title'] = "Keranjang Belanja";
               $this->load->view('template/beranda_header', $data);
               $this->load->view('keranjang', $data);
               $this->load->view('template/beranda_footer');
          }
     }

     public function editatc()
     {
          $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'trim|required');
          $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'trim|required');

          if ($this->form_validation->run() == false) {
               redirect('account/penyewaanRenter');
          } else {
               $id = $this->input->post('id', true);
               $tgl_awal = $this->input->post('tgl_awal', true);
               $tgl_akhir = $this->input->post('tgl_akhir', true);
               $datetime1 = date_create($tgl_awal);
               $datetime2 = date_create($tgl_akhir);
               $durasi = date_diff($datetime1, $datetime2)->format('%a');
                    $data = array(
                         'tgl_sewa' => $tgl_awal,
                         'tgl_kembali' => $tgl_akhir,
                         'durasi' => $durasi
                    );
                    $this->db->where('id_cart', $id);
                    $this->db->update('cart', $data);
                    $this->session->set_flashdata('success', 'Berhasil mengubah tanggal sewa');
                    redirect('account/penyewaanRenter');
          }
     }

     public function hapusatc($id)
     {
          $this->db->where('id_cart', $id);
          $this->db->delete('cart');
          $this->session->set_flashdata('success', 'Berhasil menghapus item'); 
          redirect('account/penyewaanRenter');
     }

     public function co()
     {
          $user_id = $this->session->userdata('id');
          $this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required');
          $this->form_validation->set_rules('antar', 'Antar', 'required');
  
          if ($this->form_validation->run() == false) {
               $this->session->set_flashdata('error', 'Checkout gagal. Pastikan telah memilih metode pengiriman dan pembayaran'); 
               redirect('account/penyewaanRenter');
          } else {
              $this->mBeranda->co();
          }
     }

     public function berhasil()
     {
          $data['kategori'] = $this->data;
          $data['title'] = "Pesanan Berhasil";
          $this->load->view('template/beranda_header', $data);
          $this->load->view('berhasil');
          $this->load->view('template/beranda_footer');
     }

     public function pesanan()
     {
          if ($this->simple_login->cek_login() == TRUE){
               redirect('');
          } else {
          $data['kategori'] = $this->data;
               $data['order'] = $this->mBeranda->getOrder();
               $data['title'] = "Daftar Pesanan";
               $this->load->view('template/beranda_header', $data);
               $this->load->view('pesanan', $data);
               $this->load->view('template/beranda_footer');
          }
     }

     public function pembayaran()
     {
               $data['title'] = "Cara Pembayaran";
               $data['kategori'] = $this->data;
               $this->load->view('template/beranda_header', $data);
               $this->load->view('pembayaran');
               $this->load->view('template/beranda_footer');
     }

     public function about()
     {
               $data['title'] = "Tentang RentALL";
          $data['kategori'] = $this->data;
               $this->load->view('template/beranda_header', $data);
               $this->load->view('about');
               $this->load->view('template/beranda_footer');
     }
}