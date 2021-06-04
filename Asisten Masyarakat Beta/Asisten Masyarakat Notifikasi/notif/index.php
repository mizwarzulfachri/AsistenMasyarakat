<?php
session_start();
?>

<!DOCTYPE html>          
<html>
<title> Notifikasi Data Tersimpan</title>
<head>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<input type="checkbox" id="check" />
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Menu</header>
      <ul>
        <li>
          <a href="#"><i class="fas fa-qrcode"></i>Beranda</a>
        </li>
        <li>
          <a href="#"><i class="fas fa-envelope"></i>Daftar Tugas</a>
        </li>
        <li>
          <a href="#"><i class="fas fa-calendar"></i>Deadline Tugas</a>
        </li>
        <li>
          <a href="#"><i class="fas fa-bell"></i>Pemberitahuan</a>
        </li>
      </ul>
    </div>
    <section>
 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           
            <div>
                 <?php
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo '<div id="pesan" class="alert alert-success" style="display:none;">'.$_SESSION['pesan'].'</div>';
                    }
                    $_SESSION['pesan'] = '';
                ?>
            </div>
            <p>
                <div class="tambah">
                    <a class="btn btn-primary" href="tambah.php" id="tmbh">Tambah</a>
                </div>
            </p>
            <table class="table table-dark table-borderless" id="tbl">
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Nama
                    </th>
                    <th>
                        Jenis Kelamin
                    </th>
                    <th>
                        Telepon
                    </th>
                    <th>
                        Alamat
                    </th>
                    <th>
                        Opsi
                    </th>
                    <th>
                        verifikasi
                    </th>
                </tr>
                    <?php
                        include"koneksi.php";
                        $no = 1;
                        $data = mysqli_query ($koneksi, " select
                                                                id_masyarakat,
                                                                nama,
                                                                jenis_kelamin,
                                                                telepon,
                                                                alamat
                                                          from
                                                          masyarakat
                                                          order by id_masyarakat DESC");
                        while ($row = mysqli_fetch_array ($data))
                        {
                    ?>
                <tr>
                    <td>
                        <?php echo $no++; ?>
                    </td>
                    <td>
                        <?php echo $row['nama']; ?>
                    </td>
                    <td>
                        <?php echo $row['jenis_kelamin']; ?>
                    </td>
                    <td>
                        <?php echo $row['telepon']; ?>
                    </td>
                    <td>
                        <?php echo $row['alamat']; ?>
                    </td>
                    <td class="opsi">
                        <a href="hapus.php?id=<?php echo $row['id_masyarakat']; ?>"> <button type="button">Hapus</button></a> | 
                        <a href="detail.php?id=<?php echo $row['id_masyarakat']; ?>"><button>Detail</button></a> 
                    </td>
                    <td>
                        <?php echo $row['verifikasi']; ?>
                        <a href="terima.php?id=<?php echo $row['id_masyarakat']; ?>"><button type="button"> Terima</button></a> 
                        <a href="tolak.php?id=<?php echo $row['id_masyarakat']; ?>"><button> Tolak</button></a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
    </section>

</div>
        <script src="style/jquery.min.js"></script>
        <script>
            $(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
            setTimeout(function(){$("#pesan").fadeOut('slow');}, 3000);
        </script>
</body>
</html>
