<?php 
$koneksi = mysqli_connect("localhost", "root", "", "asisten_masyarakat");

if (!$koneksi){
    echo "<script>Sesuatu bermasalah</script>";
} else {
    echo "Hi, You have logged in!";
}
?>