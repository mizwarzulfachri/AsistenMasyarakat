<?php
    session_start();
    include "koneksi.php";

    $number=$_GET['id'];
    echo $number;
    $query = "UPDATE logs SET view = '1' WHERE no = $number";

    $ditambah = mysqli_query($koneksi, $query);

    $nama = $_SESSION['Nama'];
    $sql = "SELECT Kode FROM user_ma WHERE Nama='$nama'";
    $hasil = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($hasil);
    
    if (!$ditambah){
        echo '<script>
        alert("Ada masalah");
        window.location.href="Notif.php";
        </script>';
    } else {
        echo $row['Kode'];
        if($row['Kode'] == 1) {
            header("location:../Asisten Masyarakat Main/viewtugaspetugas.php?id=".urlencode($number));
        } else {
            header('location:../Asisten Masyarakat Main/viewtugasmas.php?id='.urlencode($number));
        }
    }
?>