<?php
include('koneksi.php');
session_start();
$username  = mysqli_real_escape_string($koneksi,$_POST['username']);
$password  = mysqli_real_escape_string($koneksi,$_POST['password']);
$password = md5($password);

// CEK DATA
$qdata = mysqli_query($koneksi,"SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
$cek   = mysqli_num_rows($qdata);
$data = mysqli_fetch_array($qdata);


if ($cek < 1) {
    echo "<script>alert('Gaal Masuk')</script>";
    header('location:login.php?pesan=2');
} else {
    // SESSION
    $_SESSION['id']=$data['idpengguna'];
    $_SESSION['nama']=$data['namapengguna'];
    $_SESSION['role']=$data['hakakses'];
    echo "<script>alert('Berhasil Masuk')</script>";
    header('location:./');


}
