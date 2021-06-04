<?php 

//connect to MySQL
include 'koneksi.php';

//input data
$username = $_POST['Username'];
$nik = $_POST['NIK'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$cpassword = $_POST['cPassword'];
$vkey = md5(time().$username);
$kode = $_POST['Kode'];

if (strlen($password) < 8) {
  header('Location: Register.php?error=Password harus minimal 8 karakter!');
} else if ($password != $cpassword) {
  header('Location: Register.php?error=Password tidak sama!');
} else {

  //encrypted password
  $password = md5($password);

  $ditambah = mysqli_query($koneksi, "INSERT INTO user_ma(Nama, NIK, Password, Email, verify_key, Kode) 
    VALUES ('$username', '$nik', '$password', '$email', '$vkey', '$kode')");
  
  /*if (!$ditambah){
    header("location:../Asisten Masyarakat Register/Register.php?error=Ada masalah.");
  } else {
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    
    require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
    require("vendor/phpmailer/phpmailer/src/SMTP.php");
    require("vendor/phpmailer/phpmailer/src/Exception.php");
    
    //use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\Exception;
    //use PHPMailer\PHPMailer\SMTP;

    $mail = new PHPMailer(true);
    $mail->isSMTP(); //If local server!
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='ssl';
    $mail->SMTPDebug = 0; 
    $mail->Host = "smtp.gmail.com"; 
    $mail->Port=587;
    $mail->IsHTML(true);

    $mail->Username='';
    $mail->Password='';

    $mail->setFrom('hackersrepel@gmail.com', 'Asisten Masyrakat Service');
    $mail->Subject='Verifikasi Email';
    $mail->Body="<a href='http://localhost/Asisten Masyarakat Register/verify.php?vkey=$vkey'>Verify Account</a>";
    $mail->addAddress($email);*/

    /*if(!$mail->Send()){
      header("location:../Asisten Masyarakat Register/Register.php?error=Email gagal dikirim mungkin salah email."). $mail->ErrorInfo;
    } else {*/
      header("location:../Asisten Masyarakat Login/Login.php");
    //}
  //}

  }
?>