<?php 

//connect
include 'koneksi.php';

//input data
$username = $_POST['Username'];
$nik = $_POST['NIK'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$cpassword = $_POST['cPassword'];

if ($password == $cpassword) {
    mysqli_query($koneksi, "INSERT INTO user_ma VALUES ('', '$username', '$nik', '$cpassword', '$email')");

    header("location:../Asisten Masyarakat Login/Login.php");
} else {
    header('Location: Register.php?error=Password tidak sama!');
}
?>