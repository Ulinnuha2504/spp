<?php
include("koneksi.php"); // Pastikan koneksi database tersedia

// Ambil data dari form
$kode = $_POST['kode'];
$tanggal = $_POST['tanggal'];
$nominal = $_POST['nominal'];
$keterangan = $_POST['keterangan'];

// Pastikan semua input tidak kosong
if (!empty($kode) && !empty($tanggal) && !empty($nominal) && !empty($keterangan)) {
    // Query untuk menyimpan data ke dalam tabel pengeluaran
    $query = "INSERT INTO pengeluaran (kodepengeluaran, tanggalpengeluaran, nominalpengeluaran, keteranganpengeluaran) 
              VALUES ('$kode', '$tanggal', '$nominal', '$keterangan')";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo "<script>alert('Data Pengeluaran Berhasil Di Tambahkan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengeluaran'>";
    }else {
        echo "<script>alert('Data Pengeluaran Gagal Di Tambahkan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengeluaran'>";
    }
} else {
    echo "<script>alert('Harap isi semua data!'); window.history.back();</script>";
}
?>
