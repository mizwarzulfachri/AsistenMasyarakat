<?php 
session_start();
//connect to MySQL
$koneksi = mysqli_connect("localhost", "root", "", "asisten_masyarakat");

if (!$koneksi){
    echo '<script>
        alert("Ada masalah");
        window.location.href="../Asisten Masyarakat Main/formmasyarakat.php";
    </script>';
} else {

    //input data
    $id = $_SESSION['id'];;
    $nama = $_POST['Nama'];
    $alamat = $_POST['Alamat'];
    $jk = $_POST['JK'];
    $agama = $_POST['Agama'];
    $status = $_POST['Status'];
    $warga =$_POST['Kewarganegaraan'];

    $ditambah = mysqli_query($koneksi, "INSERT INTO masyarakat(id, nama, jenis_kelamin, alamat, agama, status, kewarganegaraan) 
        VALUES ('$id', '$nama', '$jk', '$alamat', '$agama', '$status', '$warga')");
    
    $ambil = mysqli_query($koneksi, "SELECT no FROM masyarakat ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_assoc($ambil);
    $number= $row['no'];
    
    if (!$ditambah) {
        echo '<script>
            alert("Ada masalah");
            window.location.href="../Asisten Masyarakat Daftar Tugas/formmasyarakat.php";
        </script>';
        echo "<br/>didn't work";
    } else {
        header("location:../Asisten Masyarakat Daftar Tugas/uploaddata.php?data=".urlencode($number));
        exit();
    }
}
?>