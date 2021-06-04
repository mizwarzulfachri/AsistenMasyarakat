<?php 
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "asisten_masyarakat");

$nama = $_SESSION['Nama'];
$cari = "SELECT Kode FROM user_ma WHERE Nama='$nama'";
$hasil = mysqli_query($koneksi, $cari);
$row = mysqli_fetch_assoc($hasil);
$number = $_GET['id'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // fetch file to download from database
    $sql = "SELECT * FROM masyarakat WHERE nomor='$id'";
    $result = mysqli_query($koneksi, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../Asisten Masyarakat Main/uploads/'. $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        if($row['Kode'] == 1) {
            //header("location:../Asisten Masyarakat Main/viewtugaspetugas.php?id=".urlencode($number));
        } else {
            //header('location:../Asisten Masyarakat Main/viewtugasmas.php?id='.urlencode($number));
        }
    } else {
        echo '<script>
        alert("Tidak ketemu");
        window.location.href="Notif.php";
        </script>';
    }

}
?>