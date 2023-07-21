// email.php
<?php
require_once("phpmailer/src/PHPMailer.php");
require_once("phpmailer/src/SMTP.php");

session_start();

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION["success"] = true;
  $_SESSION["nama"] = $_POST['nama'];

  if ( !isset($_POST['nama']) || !isset($_POST['phone']) || !isset($_POST['email']) || !isset($_POST['pesan']) ) {
      $_SESSION["success"] = false;
      $_SESSION["message"] = 'nama, phone, email, atau pesan wajib di isi';
  } else {
    $nama = $_POST['nama'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $judul = $_POST['judul'];
    $pesan = $_POST['pesan'];

    kirimEmail($nama, $phone, $email, $judul, $pesan);
  }
}

function kirimEmail($nama, $phone, $email, $judul, $pesan){

  $kirimPesan = "ada pesan dari: ".$nama;
  $kirimPesan .= "<br/>phone: ".$phone;
  $kirimPesan .= "<br/>email: ".$email;
  $kirimPesan .= "<br/>pesan: ".$pesan;

  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->SMTPDebug = 3;
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "genta.rpd@gmail.com";
  $mail->Password = "yufzvxjtwnvasrpg";
  $mail->SMTPSecure = "ssl";
  $mail->Port = 465;
  $mail->From = "genta.rpd@gmail.com";
  $mail->FromName = "Pengaduan Masyarakat";

  $mail->addAddress("genta.rpd@gmail.com", "Humas RSUDZM");
  $mail->isHTML(true);
  $mail->Subject = $judul;
  $mail->Body = $kirimPesan;
  // $mail->AltBody = $kirimPesan;

  if(!$mail->send()) {
    $_SESSION["success"] = false;
    $_SESSION["message"] = 'Ada masalah di server kami!';
  } else {
    $_SESSION["success"] = true;
    $_SESSION["message"] = 'Laporan Anda berhasil terkirim!';
  }

  return header('Location: '. $_SERVER['HTTP_REFERER']);
}