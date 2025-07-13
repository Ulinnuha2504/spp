<?php

// definisikan koneksi ke database
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'pembayaran_spp';

// Masukkan masing-masing variabel
setlocale(LC_ALL, 'id-ID', 'id_ID');
$koneksi = mysqli_connect("$server", "$username", "$password", "$database");
$hariini= new DateTime();
$autokodetransaksi = $hariini->format('YmdHis');
$sekarang = date('Y-m-d H:i:s');
date_default_timezone_set('Asia/Jakarta');
$tanggalhariini=date('Y-m-d');
// cek jika koneksi ke mysql gagal, maka akan tampil pesam berikut
if (mysqli_connect_errno()) {
    echo 'Maaf Gaes Server OFF'.mysqli_connect_error();
}