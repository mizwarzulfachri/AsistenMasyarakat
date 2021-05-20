<?php
$id = @$_GET['id'];
$no = 1;
if(@$_GET['action'] != 'pembuatan Tugas') { ?>
<div class="row">
<div class="col-md-12">
<h4 class="page-head-line">Tugas / Quiz</h4>
</div>
<?php
} else if(@$_GET['action'] == 'deadline') { ?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Daftar Tugas</div>
<div class="panel-body">
<div class="table-responsive">
<?php
$id_mapel =
@$_GET['id_mapel'];
$sql_tq = mysqli_query($db,
"SELECT * FROM tb_topik_quiz WHERE id_mapel = '$id_mapel' AND id_kelas = '$data_terlogin[id_kelas]' AND status = 'aktif'") or die ($db->error);
 

0) {
 
if(mysqli_num_rows($sql_tq) >

while($data_tq =
 
mysqli_fetch_array($sql_tq)) { ?>
<table width="100%">
<tr> if(mysqli_num_rows($sql_nilai) > 0 ||
mysqli_num_rows($sql_jwb) > 0) { ?>
<a href="?page=quiz" class="btn btn-primary">Kembali</a>
<?php
} else {
$sql_cek_soal_pilgan = mysqli_query($db, "SELECT * FROM tb_soal_pilgan WHERE id_tq = '$_GET[id_tq]'") or die ($db->error);
$sql_cek_soal_essay = mysqli_query($db, "SELECT * FROM tb_soal_essay WHERE id_tq = '$_GET[id_tq]'") or die ($db->error);

if(mysqli_num_rows($sql_cek_soal_pilgan) > 0 || mysqli_num_rows($sql_cek_soal_essay) > 0) { ?>
<a href="soal.php?id_tq=<?php echo @$_GET['id_tq']; ?>" class="btn btn-primary">Mulai Mengerjakan</a>
<?php
} else { ?>
<a onclick="alert('Data soal tidak ditemukan, mungkin karena belum dibuat. Silahkan hubungi guru yang bersangkutan');" class="btn btn-primary">Mulai Mengerjakan</a>
<?php
