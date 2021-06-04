<?php
include "koneksi.php";

$nomor=$_GET['id'];
 
$query = "DELETE FROM masyarakat WHERE nomor ='$nomor'";

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