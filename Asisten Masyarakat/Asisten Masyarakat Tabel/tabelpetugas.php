<?php
  session_start();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="jquer">

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
        <!-- Divider -->
        <hr class="sidebar-divider my-0" />
        <!-- Nav Item-->
        <li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-user-alt"></i>
              <span><?php echo $_SESSION['Nama']; ?></span></a
          >
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0" />
        <!-- Nav Item-->
        <li class="nav-item">
          <a class="nav-link" style="color: #ffff" href="../Asisten Masyarakat Main/Main petugas.php">
            <i class="fas fa-fw fa-home text-light"></i>
            <span>Beranda</span></a
          >
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0" />
        <!-- Nav Item-->
        <li class="nav-item">
          <a class="nav-link" href="tabelpetugas.php">
            <i class="fas fa-fw fa-envelope -alt text-light"></i>
            <span>Daftar Tugas</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />
        <!-- Nav Item-->
        <li class="nav-item">
          <a class="nav-link" href="../Asisten Masyarakat Notif/Notif.php">
            <i class="fas fa-fw fa-bell text-light"></i>
            <span>Pemberitahuan</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />
        <!-- Nav Item-->
        <li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-calendar text-light"></i>
            <span>Deadline Tugas</span></a
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
          <div class="container-fluid pt-4">
            <!-- Page Heading -->

            <!-- Data -->
            
            <div class="card shadow mb-4">
         
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #4767a6">
                <h6 class="m-0 font-weight-bold text-light">Data User Peminjam</h6>
                <td>
                <a href="../Asisten Masyarakat Daftar Tugas/formmasyarakat.php" class="btn btn-success">+Tambah</a>
              </td>
              </div>
              
              <div class="card-body" style="background-color: #fff">
                <div class="table-responsive">
                  <table class="table table-light table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tempat/Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Status</th>
                        <th>Kewarganegaraan</th>
                        <th>Aksi</th>
                      </tr>
                      <?php
                        include "koneksi.php";
                        $no = 1;
                        $data = mysqli_query ($koneksi, " select
                                                                nomor,
                                                                nama,
                                                                tempattgl_lahir,
                                                                jenis_kelamin,
                                                                alamat,
                                                                agama,
                                                                status,
                                                                kewarganegaraan 
                                                          from
                                                          masyarakat
                                                          order by id DESC");
                        while ($row = mysqli_fetch_array ($data))
                        {
                    ?>
                    </thead>
                    <tbody>
                    <tr>
                      <td> <?php echo $no++; ?> </td>
                      <td> <?php echo $row['nama']; ?> </td>
                      <td> <?php echo $row['tempattgl_lahir']; ?> </td>
                      <td> <?php echo $row['jenis_kelamin']; ?> </td>
                      <td> <?php echo $row['alamat']; ?> </td>
                      <td> <?php echo $row['agama']; ?> </td>
                      <td> <?php echo $row['status'];?> </td>
                      <td> <?php echo $row['kewarganegaraan'];?> </td>
                      <td> <a href="../Asisten Masyarakat Main/viewtugaspetugas.php?id=<?php echo $row['nomor'] ?>" class="btn btn-secondary">View</a> </td>
                        <td> 
                      <td> <a href="tanggal.php?id=<?php echo $row['nomor'] ?>" class="btn btn-success" >Terima</a> </td>
                        <td>
                        <td>
                        <a href="tolak.php?id=<?php echo $row['nomor'] ?>" class="btn btn-danger">Tolak</a>
                        </td>
                      </tr>
                      <?php
                         }
                      ?>
                    </tbody>
                  </table>
                </div>
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
    <script src="../Asisten Masyarakat Main/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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