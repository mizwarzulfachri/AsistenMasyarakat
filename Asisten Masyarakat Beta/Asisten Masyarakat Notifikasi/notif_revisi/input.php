<?php
session_start();
include"koneksi.php";
 
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$tempat_lahir  = $_POST['tempat_lahir'];
$tanggal =  $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];

 
$query = "insert INTO masyarakat SET
                                nama = '$nama',
                                jenis_kelamin = '$jenis_kelamin',
                                alamat = '$alamat',
                                telepon = '$telepon',
                                tempat_lahir = '$tempat_lahir',
                                tanggal =  '$tanggal'
                                ";
 
mysqli_query($koneksi, $query)
or die ("Gagal Perintah SQL".mysql_error());
$_SESSION['pesan'] = 'Data berhasil di tambahkan';
header('location:index.php');
 
?>