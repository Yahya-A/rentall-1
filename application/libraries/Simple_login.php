<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

    /*
    * Simple_login Class
    * Class ini digunakan untuk fitur login, proteksi halaman dan logout
    */
    
class Simple_login {

    // SET SUPER GLOBAL 
    var $CI = NULL; 

    /**
    * Class constructor
    *
    * @return   void
    */

    public function __construct() 
    {
        $this->CI =& get_instance(); 
    }

    /*
    * cek username dan password pada table user, jika ada set session berdasar data user daritable user.
    * @param string username dari input form
    * @param string password dari input form
    */ 
    
    public function login($username, $password) 
    {
        //cek username dan password
        $query = $this->CI->db->get_where('user',array('username'=>$username,'password' => md5($password)));
        if($query->num_rows() == 1) {
            //ambil data user berdasar username
            $row = $this->CI->db->query('SELECT id_user, level, status FROM user where username = "'.$username.'"'); 
            $admin = $row->row();
            $id = $admin->id_user;
            $level = $admin->level;
            $status = $admin->status;
            //set session user 
            $this->CI->session->set_userdata('status',$status);
            $this->CI->session->set_userdata('level',$level);
            $this->CI->session->set_userdata('username',$username);
            $this->CI->session->set_userdata('id_login',uniqid(rand()));
            $this->CI->session->set_userdata('id', $id); 
            //redirect ke halaman dashboard 
            if ($level == 1 || $level == 2) {
                redirect(site_url('account'));
            } else if ($level == 3){
                redirect(site_url('dashboard'));
            } else {
                redirect(site_url('beranda'));
            }
        }else{
            //jika tidak ada, set notifikasi dalam flashdata. 
            $this->CI->session->set_flashdata('sukses','Username atau password anda salah, silakan coba lagi.. ');
            //redirect ke halaman login
            redirect(site_url('account/login'));    
        } return false;
    }

    /**
    * Cek session login, jika tidak ada, set notifikasi dalam flashdata, lalu dialihkan ke halaman
    * login
    */
    public function cek_login() {
        //cek session username 
        if($this->CI->session->userdata('username') == '') {
            //set notifikasi 
            $this->CI->session->set_flashdata('sukses','Anda belum login');
            //alihkan ke halaman login
            redirect(site_url('account'));    
        }
    }
    
    public function cek_admin() {
        //cek session username 
        if($this->CI->session->userdata('level') == 1 || $this->CI->session->userdata('level') == '') {
            //set notifikasi 
            $this->CI->session->set_flashdata('sukses','Halaman hanya untuk admin');
            //alihkan ke halaman login
            redirect('account');
        }
    }

    /**
    * Hapus session, lalu set notifikasi kemudian di alihkan * ke halaman login
    */
    public function logout() {
        $this->CI->session->unset_userdata('level'); 
        $this->CI->session->unset_userdata('status'); 
        $this->CI->session->unset_userdata('username'); 
        $this->CI->session->unset_userdata('id_login'); 
        $this->CI->session->unset_userdata('id'); 
        $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
        redirect(site_url(''));    
    } 
}
?>