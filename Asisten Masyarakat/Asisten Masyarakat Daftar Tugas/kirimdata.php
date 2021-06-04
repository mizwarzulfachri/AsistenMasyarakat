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
    $lahir = $_POST['lahir'];
    $alamat = $_POST['Alamat'];
    $jk = $_POST['JK'];
    $agama = $_POST['Agama'];
    $status = $_POST['Status'];
    $warga =$_POST['Kewarganegaraan'];

    $ditambah = mysqli_query($koneksi, "INSERT INTO masyarakat(id, nama, tempattgl_lahir, jenis_kelamin, alamat, agama, status, kewarganegaraan) 
        VALUES ('$id', '$nama', '$lahir', '$jk', '$alamat', '$agama', '$status', '$warga')");

    $ambil = mysqli_query($koneksi, "SELECT nomor FROM masyarakat ORDER BY nomor DESC LIMIT 1");
    $row = mysqli_fetch_assoc($ambil);
    $number= $row['nomor'];

    if (!$ditambah) {
        echo '<script>
            alert("Ada masalah");
            window.location.href="../Asisten Masyarakat Daftar Tugas/formmasyarakat.php";
        </script>';
        echo "<br/>didn't work";
    } else {
        //echo $number;
        header("location:../Asisten Masyarakat Daftar Tugas/uploaddata.php?data=".urlencode($number));
        exit();
    }
}
?>