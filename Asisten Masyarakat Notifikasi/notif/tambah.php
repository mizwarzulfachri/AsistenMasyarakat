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



    <div class="container2">
  <form action="/action_page.php">
    <label for="fname">Nama</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">
<br>
    <label for="jeniskelamin">Male</label>
    <input type="radio" id="male" name="gender" value="male">
    <label for="female">Female</label>
    <input type="radio" id="female" name="gender" value="female">
<br> <br>
    <label for="Telepon">Telepon</label>
    <input type="text" id="telepon" name="telepon" placeholder="your phone number">

    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat">
    
  
    <input type="submit" value="Submit">
    <a href="index.php" class="btn btn-success pull-right" style="margin-right:1%;">Batal</a>
  </form>
</div>
 

   
</div>
    
</section>
  
</div>
</body>
</html>
