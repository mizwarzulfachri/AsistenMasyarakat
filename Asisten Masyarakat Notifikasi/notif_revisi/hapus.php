<?php
include"koneksi.php";
 
 
$query = "DELETE FROM masyarakat
                            WHERE id_masyarakat ='$_GET[id]'
                                ";
 
mysqli_query($koneksi, $query)
or die ("Gagal Perintah SQL".mysql_error());
header('location:index.php');
 
?>