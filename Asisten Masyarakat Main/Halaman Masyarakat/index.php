<?php 
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['Nama'])) {
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Sider Menu Bar CSS</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="shortcut icon" type="image/png" href="../../Asisten Masyarakat Icon/Icon Asisten Masyarakat.png">
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
          <a href="#"><i class="fas fa-user-alt"></i><?php echo $_SESSION['Nama']; ?></a>
        </li>
        <li>
          <a href="#"><i class="fas fa-qrcode"></i>Beranda</a>
        </li>
        <li>
          <a href="#"><i class="fas fa-envelope"></i>Pembuatan Surat</a>
        </li>
        <li>
          <a href="#"><i class="fas fa-bell"></i>Pemberitahuan</a>
        </li>
        <li>
          <a href="../../Asisten Masyarakat Login/LogOut.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
        </li>
      </ul>
    </div>
    <section></section>
  </body>
</html>

<?php 
} else {
  header("Location: ../../Asisten Masyarakat Login/Login.php");
  exit();
} 
?>
