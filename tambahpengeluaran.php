<?php
include("koneksi.php");

$qkode = mysqli_query($koneksi, "SELECT MAX(kodepengeluaran) as kode FROM pengeluaran");
$kode  = mysqli_fetch_array($qkode);
$kd    = $kode['kode'] ?? 'LD-000000'; // Gunakan default jika NULL

$urutan = (int) substr($kd, 3, 6); // Pastikan substr hanya dieksekusi jika string valid
$huruf  = 'PR-';
$urutan++;
$urut = sprintf("%06s", $urutan);
$kodekeluar = $huruf . $urut;

// echo $kodekeluar; // Untuk memastikan kode yang dihasilkan benar
?>

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>PENGELUARAN</h2>
        </div>
    </div>
</div>
<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_20">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                <h2>Pengeluaran Baru</h2> 
                </div>
            </div>
        <form action="prosessimpanpengeluaran.php" method="post">
            <div class="form-group-row mb-4">
                <label for="kode" class="col-sm-2">KODE</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $kodekeluar;?>" readonly name="kode" id="kode" class="form-control"required>
                </div>
            </div>
            <div class="form-group-row mb-4">
                <label for="tanggal" class="col-sm-2">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" name="tanggal" id="tanggal" class="form-control"required>
                </div>
            </div>
            <div class="form-group-row mb-4">
                <label for="nominal" class="col-sm-2">Nominal</label>
                <div class="col-sm-10">
                    <input type="number" name="nominal" id="nominal" class="form-control"required>
                </div>
            </div>
            <div class="form-group-row mb-4">
                <label for="keterangan" class="col-sm-2">Keterangan</label>
                <div class="col-sm-10">
                    <input type="keterangan" name="keterangan" id="keterangan" class="form-control"required>
                </div>
            </div>
           
            <div class="form-group-row mb-4">
            <div class="col-sm-10">
                <button type="submit" class="form-control btn btn-success">simpan</button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>