<?php
include ("koneksi.php");

// Query total pengguna, siswa, pembayaran lunas, dan belum lunas
$sqlPengguna = "SELECT COUNT(*) AS total_pengguna FROM pengguna";
$sqlSiswa = "SELECT COUNT(*) AS total_siswa FROM siswa";
$sqlLunas = "SELECT COUNT(*) AS total_lunas FROM pembayaran WHERE statuspembayaran = 'Lunas'";
$sqlBelumLunas = "SELECT COUNT(*) AS total_belum FROM pembayaran WHERE statuspembayaran = 'Belum Bayar'";

// Eksekusi query
$totalPengguna = $koneksi->query($sqlPengguna)->fetch_assoc()['total_pengguna'] ?? 0;
$totalSiswa = $koneksi->query($sqlSiswa)->fetch_assoc()['total_siswa'] ?? 0;
$totalLunas = $koneksi->query($sqlLunas)->fetch_assoc()['total_lunas'] ?? 0;
$totalBelum = $koneksi->query($sqlBelumLunas)->fetch_assoc()['total_belum'] ?? 0;
?>

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Dashboard</h2>
      </div>
   </div>
</div>

<div class="row column1">
   <!-- Total Pengguna -->
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon"><div><i class="fa fa-user yellow_color"></i></div></div>
         <div class="counter_no">
            <p class="total_no"><?= $totalPengguna; ?></p>
            <p class="head_couter">Pengguna</p>
         </div>
      </div>
   </div>

   <!-- Total Pembayaran Lunas -->
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon"><div><i class="fa fa-check green_color"></i></div></div>
         <div class="counter_no">
            <p class="total_no"><?= $totalLunas; ?></p>
            <p class="head_couter">Pembayaran Lunas</p>
         </div>
      </div>
   </div>

   <!-- Total Pembayaran Belum Lunas -->
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon"><div><i class="fa fa-times red_color"></i></div></div>
         <div class="counter_no">
            <p class="total_no"><?= $totalBelum; ?></p>
            <p class="head_couter">Belum Lunas</p>
         </div>
      </div>
   </div>

   <!-- Total Siswa -->
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon"><div><i class="fa fa-users blue1_color"></i></div></div>
         <div class="counter_no">
            <p class="total_no"><?= $totalSiswa; ?></p>
            <p class="head_couter">Siswa</p>
         </div>
      </div>
   </div>

   <!-- Selamat Datang -->
   <div class="col-md-12 col-lg-12">
      <div class="full counter_section margin_bottom_30">
         <div class="counter_no">
            <p class="total_no">SELAMAT DATANG <?= $_SESSION['nama']; ?></p>
            <p class="head_couter">ANDA MASUK SEBAGAI <?= $_SESSION['role']; ?></p>
         </div>
      </div>
   </div>
</div>
