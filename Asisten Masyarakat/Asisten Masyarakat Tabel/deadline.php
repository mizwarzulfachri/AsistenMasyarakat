<?php
session_start();
include "koneksi.php";

$number=$_GET['id'];
$deadline =  $_POST['tahun'].'-'.$_POST['bulan'].'-'.$_POST['tanggal'];
$query = "UPDATE masyarakat SET deadline = '$deadline' WHERE nomor = '$number'";

$ditambah = mysqli_query($koneksi, $query);
                               
if (!$ditambah) {
    echo '<script>
        alert("Ada masalah");
        window.location.href="tabelpetugas.php";
    </script>';
} else {
    header('location:tabelpetugas.php');
}
 
?>