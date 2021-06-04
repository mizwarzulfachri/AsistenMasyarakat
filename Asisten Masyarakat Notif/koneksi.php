<?php 

$koneksi = mysqli_connect("localhost", "root", "", "asisten_masyarakat");
 
//periksa koneksi, tampilkan pesan kesalahan jika gagal
if(!$koneksi){
     echo "<script>Something went wrong.</script>";
} else {
     echo "Yes";
}
?>