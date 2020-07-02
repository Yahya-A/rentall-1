<?php
require_once('SMTP.php');
require_once('PHPMailer.php');
require_once('Exception.php');

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

$mail=new PHPMailer(true); // Passing `true` enables exceptions

try {
    //settings
    $mail->SMTPDebug=1; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true; // Enable SMTP authentication
    $mail->Username='super090hero030@gmail.com'; // SMTP username
    $mail->Password='rentall002'; // SMTP password
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('noreply@rentall.com', 'RENTALL');

    $id_user = $this->session->userdata('id');
    if ($id_user > 0) {
        $this->db->where("user.id_user", $id_user);
        $this->db->from('user');
        $this->db->join('renter_profile', 'renter_profile.id_user = user.id_user');
        $row = $this->db->get()->row();
        $nama = $row->nama;
        $email = $row->email;
        $token = $row->token;
        $url = base_url("account/cekverif/$id_user/$token");
    } else {
        $array = array('email' => $email, 'username' => $username);
        $this->db->where($array);
        $this->db->from('user');
        $row = $this->db->get()->row();
        $nama = $row->nama;
        $email = $row->email;
        $id_user = $row->id_user;
        $url = base_url("account/activate/$id_user");
    }

    //recipient
    $mail->addAddress("$email", "$nama");     // Add a recipient

    //content
    $mail->Subject='Verifikasi Akun RENTALL';
    $mail->Body="Klik link ini untuk melakukan verifikasi akun \n $url" ;
    $mail->AltBody="Klik link ini untuk melakukan verifikasi akun \n $url";

    $mail->send();
    $this->session->set_flashdata('sukses', 'Link verifikasi sudah terkirim di email.');
    redirect('account');

} 
catch(Exception $e) {
    $this->session->set_flashdata('error',"Pengiriman verifikasi email gagal.");
    redirect("account");
}

?>