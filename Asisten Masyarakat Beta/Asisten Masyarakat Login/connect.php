<?php 
    $koneksi = mysqli_connect("localhost", "root", "", "asisten_masyarakat");

    if (!$koneksi){
        echo "<script>Something went wrong.</script>";
    } else {
        echo "Yes";
    }
?>