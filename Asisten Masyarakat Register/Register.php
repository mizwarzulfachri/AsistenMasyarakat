<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Asisten Masyarakat</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="../../Asisten Masyarakat Login/style.css?v=<?php echo time(); ?>">
  <link rel="shortcut icon" type="image/png" href="../../Asisten Masyarakat Icon/Icon Asisten Masyarakat.png">

</head>

<body>
  <form class="box" action="tambah.php" method="post">
    <img class="img-responsive" src="../../Asisten Masyarakat Icon/Logo Asisten Masyarakat.png" alt="" width="350" height="197">

    <h2>Register</h2>
    <!-- Error -->
    <?php if (isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <!-- Form -->
    <div>
    <input type="text" id="Username" name="Username" placeholder="Nama">
    <input type="text" id="Email" name="Email" placeholder="Email">
    <input type="number" id="NIK" name="NIK" placeholder="NIK">
    <input type="password" id="Password" name="Password" placeholder="Kata sandi">
    <input type="password" id="cPassword" name="cPassword" placeholder="Konfirmasi sandi">

    <input type="submit" name="" value="Register">
    </div>
  </form>
</body>
</html>