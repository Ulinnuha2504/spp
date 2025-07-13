<?php
include ('koneksi.php');
$kodepengguna=mysqli_real_escape_string($koneksi,$_POST['idpengguna']);
$namapengguna=mysqli_real_escape_string($koneksi,$_POST['namapengguna']);
$password=mysqli_real_escape_string($koneksi,$_POST['password']);
$hakakses=mysqli_real_escape_string($koneksi,$_POST['hakakses']);
$username=mysqli_real_escape_string($koneksi,$_POST['username']);

// echo $kodepengguna;
// echo $namapengguna;
// echo $password;
// echo $jabatan;
if (!empty($password)) {
    $password = md5($password);
    $sql=mysqli_query($koneksi,"update pengguna set 
                                                namapengguna='$namapengguna'
                                                ,password='$password'
                                                ,username='$username'
                                                ,hakakses='$hakakses'
                                    where idpengguna='$kodepengguna'");
    if ($sql) {
        echo "<script>alert('Data Pengguna Berhasil Di Perbarui')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengguna'>";
    }else {
        echo "<script>alert('Data Pengguna Gagal Di Perbarui')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengguna'>";
    }
}
else {
    $sql=mysqli_query($koneksi,"update pengguna set 
                                                namapengguna='$namapengguna'
                                                ,username='$username'
                                                ,hakakses='$hakakses'
                                    where idpengguna='$kodepengguna'");
    if ($sql) {
        echo "<script>alert('Data Pengguna Berhasil Di Perbarui')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengguna'>";
    }else {
        echo "<script>alert('Data Pengguna Gagal Di Perbarui')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengguna'>";
    }
    
}


