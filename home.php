<?php
include ("koneksi.php");
// Query untuk menghitung jumlah data di tabel pengguna dan pengeluaran
$sqlPengguna = "SELECT COUNT(*) AS total_pengguna FROM pengguna";
$sqlPengeluaran = "SELECT COUNT(*) AS total_pengeluaran FROM pengeluaran";

$resultPengguna = $koneksi->query($sqlPengguna);
$resultPengeluaran = $koneksi->query($sqlPengeluaran);

// Ambil hasil query
$totalPengguna = ($resultPengguna->num_rows > 0) ? $resultPengguna->fetch_assoc()['total_pengguna'] : 0;
$totalPengeluaran = ($resultPengeluaran->num_rows > 0) ? $resultPengeluaran->fetch_assoc()['total_pengeluaran'] : 0;

?>

<div class="row column_title">
   <div class="col-md-12">
      <div class="page_title">
         <h2>Dashboard</h2>
      </div>
   </div>
</div>
<div class="row column1">
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div> 
               <i class="fa fa-user yellow_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no"><?= $totalPengguna; ?></p>
               <p class="head_couter">Pengguna</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div> 
               <i class="fa fa-bar-chart-o blue1_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no"><?= $totalPengeluaran; ?></p>
               <p class="head_couter">Pengeluaran</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div> 
               <i class="fa fa-cloud-download green_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">0</p>
               <p class="head_couter">Penerimaan</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div> 
               <i class="fa fa-comments-o red_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">0</p>
               <p class="head_couter">Other</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-12 col-lg-12">
      <div class="full counter_section margin_bottom_30">
         <div class="counter_no">
            <div>
               <p class="total_no">SELAMAT DATANG <?= $_SESSION['nama'];?></p>
               <p class="head_couter">ANDA MASUK SEBAGAI <?= $_SESSION['role'];?></p>
            </div>
         </div>
      </div>
   </div>
</div>
