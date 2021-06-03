<html>
<title>Aplikasi CRUD Sederhana</title>
<head>
<link rel="stylesheet" href="style/bootstrap.min.css" />
</head>
<body>
 
 
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
                                      where id_masyarakat = $_GET[id]");
    $row = mysqli_fetch_array ($data);
   
?>
<div class="container" style="margin-top:8%">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
            <br>
            <p>
                <a class="btn btn-success" href="index.php">Kembali</a>
            </p>
            <table class="table table-stripped">
                <tr>
                    <td style="width:10%;">
                        Nama
                    </td>
                    <td>
                        : <?php echo $row['nama']; ?>
                    </td>
                </tr>
                <tr>                   
                    <td>
                        Telepon
                    </td>
                    <td>
                        : <?php echo $row['telepon']; ?>
                    </td>
                </tr>
                <tr>       
                    <td>
                        Alamat
                    </td>
                    <td>
                        : <?php echo $row['alamat']; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
   
</div>
</body>
</html>
