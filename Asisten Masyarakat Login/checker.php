<?php 
    session_start();
    include "connect.php";

    if(isset($_POST['Username']) && isset($_POST['NIK']) && isset($_POST['Password'])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Username = validate($_POST['Username']);
        $NIK = validate($_POST['NIK']);
        $Password = validate($_POST['Password']);

        if(empty($Username)) {
            header('Location: Login.php?error=Perlu isi nama!');
            exit();
        } else if (empty($NIK)) {
            header('Location: Login.php?error=Perlu isi NIK!');
            exit();
        } else if (empty($Password)) {
            header('Location: Login.php?error=Perlu kata sandi!');
            exit();
        } else { 
            $sql = "SELECT * FROM user_ma WHERE Nama='$Username' AND NIK = '$NIK' AND Password='$Password'";
            
            $hasil = mysqli_query($koneksi, $sql);

            if(mysqli_num_rows($hasil) === 1) {
                $row = mysqli_fetch_assoc($hasil);
                print_r($row);
                if($row['Nama'] === $Username && $row['NIK'] && $row['Password'] === $Password) {
                    //echo "Logged in";
                    $_SESSION['Nama'] = $row['Nama'];
                    $_SESSION['id'] = $row['ID'];
                    header('Location: ../Asisten Masyarakat Main/Halaman Masyarakat/index.php');
                    exit();
                } else {
                    header('Location: Login.php?error=Salah Nama, NIK, atau Password');
                    exit();
                }
            } else {
                header('Location: Login.php?error=Salah Nama, NIK, atau Password');
                exit();
            }
        }
    } else {
        header('Location: Login.php');
        exit();
    }        
?>