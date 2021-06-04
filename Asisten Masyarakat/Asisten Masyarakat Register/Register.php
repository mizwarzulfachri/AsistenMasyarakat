<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Asisten Masyarakat</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="../Asisten Masyarakat Login/style.css?v=<?php echo time(); ?>">
  <link rel="shortcut icon" type="image/png" href="../Asisten Masyarakat Icon/Icon Asisten Masyarakat.png">

</head>

<body>
  <form class="box" action="tambah.php" method="post">
    <img class="img-responsive" src="../Asisten Masyarakat Icon/Logo Asisten Masyarakat.png" alt="" width="350" height="197">

    <h2>Register</h2>
    <!-- Error -->
    <?php if (isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <!-- Form -->
    <div>
    <input type="text" id="Username" name="Username" placeholder="Nama">
    <input type="email" id="Email" name="Email" placeholder="Email">
    <input type="number" id="NIK" name="NIK" placeholder="NIK">
    <input type="password" id="Password" name="Password" placeholder="Kata sandi">
    <input type="password" id="cPassword" name="cPassword" placeholder="Konfirmasi sandi">
    <input type="radio" id="Warga" name="Kode" value="0">
    <label for="Warga">Warga</label>
    <input type="radio" id="Petugas" name="Kode" value="1">
    <label for="Petugas">Petugas</label><br>

    <input type="submit" name="" value="Register">
    </div>
  </form>
</body>
</html>