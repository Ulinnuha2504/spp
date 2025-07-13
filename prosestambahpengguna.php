<?php
include ('koneksi.php');
$namapengguna=mysqli_real_escape_string($koneksi,$_POST['namapengguna']);
$password=mysqli_real_escape_string($koneksi,$_POST['password']);
$username=mysqli_real_escape_string($koneksi,$_POST['username']);
$hakakses=mysqli_real_escape_string($koneksi,$_POST['hakakses']);

// echo $kodepengguna;
// echo $namapengguna;
// echo $password;
// echo $jabatan;
$password=md5($password);
$sql=mysqli_query($koneksi,"insert into pengguna (namapengguna,username,password,hakakses) values('$namapengguna','$username','$password','$hakakses')");

if ($sql) {
    echo "<script>alert('Data Pengguna Berhasil Di Tambahkan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengguna'>";
}else {
    echo "<script>alert('Data Pengguna Gagal Di Tambahkan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengguna'>";
}