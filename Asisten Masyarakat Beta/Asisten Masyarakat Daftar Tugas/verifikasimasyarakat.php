<?php 
    session_start();
    $koneksi = mysqli_connect("localhost", "root", "", "asisten_masyarakat");
    $nama = $_SESSION['Nama'];

    $sql = "SELECT Kode FROM user_ma WHERE Nama='$nama'";
    $hasil = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($hasil);

    $number = $_POST['number'];

    if($row['Kode'] == 1) {
      $url = "../Asisten Masyarakat Main/Main petugas.php";
    } else {
      $url = "../Asisten Masyarakat Main/Main masyarakat.php";
    }

    if(isset($_SESSION['id']) && isset($_SESSION['Nama'])) {

      $number = $_POST['number'];
 
    if($_FILES["file"]["error"]) {
      $ditambah = mysqli_query($koneksi, "DELETE FROM masyarakat WHERE id='$number'");
      echo '<script>
            alert("File tidak bisa diupload, tolong ulang lagi");
            window.location.href="../Asisten Masyarakat Daftar Tugas/formmasyarakat.php";
        </script>';
    } else {

      move_uploaded_file($_FILES["file"]["tmp_name"],"../Asisten Masyarakat Main/uploads/".$_FILES["file"]["name"]);
      $permohon = $_POST['permohonan'];
      $filename=$_FILES['file']['name'];

      $ditambah = mysqli_query($koneksi, "UPDATE masyarakat SET Permohonan='$permohon', file='$filename' WHERE no='$number'");

      //header("refresh:20; url=Main masyarakat.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title></title>

    <!--fonts-->
    <link href="../Asisten Masyarakat Main/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link href="../Asisten Masyarakat Main/css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="../Asisten Masyarakat Main/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

    <link rel="shortcut icon" type="image/png" href="../Asisten Masyarakat Icon/Icon Asisten Masyarakat.png">
    
    <style type="text/css">
      .nav-link {
        color: #fff;
        transition-duration: 250ms;
      }
      .nav-link:hover {
        color: #8a8d94 !important;
      }
    </style>
  </head>

  <body id="page-top" style="font-family: poppins">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top" style="background-color: #4767a6 !important; margin-bottom: 0% !important; border-bottom: solid black 2px">
      <h1 class="h3 mb-0 text-light" style="font-weight: 700">Asisten Masyarakat</h1>
    </nav>
    <!-- End of Topbar -->

    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-secondary bg-gradient sidebar accordion" style="background-color: #4767a6 !important; border-right: solid black 1px; color: rgb(0, 0, 126)" id="accordionSidebar">
      <li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-user-alt"></i>
              <span><?php echo $_SESSION['Nama']; ?></span></a
          >
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0" />
        <!-- Divider -->
        <hr class="sidebar-divider my-0" />
        <!-- Nav Item-->
        <li class="nav-item">
          <a class="nav-link" style="color: #ffff" href="<?php echo $url ?>">
            <i class="fas fa-fw fa-home text-light"></i>
            <span>Beranda</span></a
          >
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0" />
        <!-- Nav Item-->
        <li class="nav-item">
          <a class="nav-link" href="formmasyarakat.php">
            <i class="fas fa-fw fa-envelope -alt text-light"></i>
            <span>Pembuatan Surat</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />
        <!-- Nav Item-->
        <li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-bell text-light"></i>
            <span>Pemberitahuan</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />
        <!-- Nav Item-->
        <li class="nav-item">
          <a class="nav-link" href="../Asisten Masyarakat Login/LogOut.php">
            <i class="fas fa-fw fa-sign-out-alt text-light"></i>
            <span>Logout</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="" style="background-color: #e7e8df !important">
        <!-- Main Content -->
        <div id="content" style="background-color: #e7e8df !important">
          <!-- Begin Page Content -->
          <div class="container-fluid d-flex justify-content-center align-items-center pt-5">
            <!-- Page Heading -->

            <!-- Data -->
            <div class="shadow card text-center">
              <div class="card-body" style="background-color: rgb(105, 105, 105)">
                <h5 class="card-text text-light pb-3">Surat anda sedang diproses, mohon tunggu diverifikasi. Terima Kasih !!</h5>
                <a href="../Asisten Masyarakat Main/Main masyarakat.php" class="btn btn-primary">Kembali</a>
              </div>
            </div>
            <!-- end Data -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../Asisten Masyarakat Main/assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../Asisten Masyarakat Main/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../Asisten Masyarakat Main/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../Asisten Masyarakat Main/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../Asisten Masyarakat Main/js/demo/chart-area-demo.js"></script>
    <script src="../Asisten Masyarakat Main/js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="../Asisten Masyarakat Main/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../Asisten Masyarakat Main/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../Asisten Masyarakat Main/js/demo/datatables-demo.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>

<?php 
} else {
  header("Location: ../Asisten Masyarakat Login/Login.php?error=Ada yang bermasalah");
  exit();
} 
?>