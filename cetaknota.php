<?php
include('koneksi.php');
$kode = $_GET['kode']; // idpembayaran
$tanggalhariini = date('Y-m-d');

// Ambil data detail pembayaran
$q = mysqli_query($koneksi, "
    SELECT pembayaran.*, 
           siswa.namasiswa, siswa.alamat,
           spp.tahunpelajaran, spp.nominal AS nominalspp,
           pengguna.namapengguna
    FROM pembayaran
    LEFT JOIN siswa ON pembayaran.idsiswa = siswa.idsiswa
    LEFT JOIN spp ON pembayaran.idspp = spp.idspp
    LEFT JOIN pengguna ON pembayaran.idpengguna = pengguna.idpengguna
    WHERE pembayaran.idpembayaran = '$kode'
");

$data = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pembayaran SPP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 20px auto;
            max-width: 700px;
        }
        .judul {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .subjudul {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .table-bukti {
            width: 100%;
            border-collapse: collapse;
        }
        .table-bukti td {
            padding: 6px;
        }
        .ttd {
            width: 100%;
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }
        .btn-print {
            margin-bottom: 20px;
            text-align: center;
        }
        @media print {
            .btn-print {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="btn-print">
    <a href="javascript:window.print();" class="btn btn-sm btn-primary">🖨️ Cetak</a>
    <a href="javascript:window.close();" class="btn btn-sm btn-danger">❌ Tutup</a>
</div>

<div class="row text-center" style="width: 750px; margin: 2px auto;">
    <div class="col-md-12" style="padding-top: 25px;">
        <div class="judul2">SMK WIDYA MANDALA KOTA SEMARANG</div>
        <div class="judul1">Jl. Menoreh Tengah X No.9</div>
        <div class="judul1">Sampangan, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50232</div>
    </div>
</div>
<hr>

<table class="table-bukti">
    <tr>
        <td><strong>ID Pembayaran</strong></td>
        <td>: <?= $data['idpembayaran']; ?></td>
    </tr>
    <tr>
        <td><strong>Nama Siswa</strong></td>
        <td>: <?= $data['namasiswa']; ?></td>
    </tr>
    <tr>
        <td><strong>Alamat</strong></td>
        <td>: <?= $data['alamat']; ?></td>
    </tr>
    <tr>
        <td><strong>Bulan Bayar</strong></td>
        <td>: <?= $data['bulanbayar']; ?></td>
    </tr>
    <tr>
        <td><strong>Tahun Ajaran</strong></td>
        <td>: <?= $data['tahunpelajaran']; ?></td>
    </tr>
    <tr>
        <td><strong>Tanggal Pembayaran</strong></td>
        <td>: <?= date('d-m-Y', strtotime($data['tanggalbayar'])); ?></td>
    </tr>
    <tr>
        <td><strong>Jumlah Bayar</strong></td>
        <td>: Rp <?= number_format($data['jumlahbayar'], 0, ',', '.'); ?></td>
    </tr>
    <tr>
        <td><strong>Status</strong></td>
        <td>: <?= $data['statuspembayaran']; ?></td>
    </tr>
    <tr>
        <td><strong>Petugas</strong></td>
        <td>: <?= $data['namapengguna']; ?></td>
    </tr>
</table>

<div class="ttd">
    <div>
        <p>Semarang, <?= date('d F Y', strtotime($tanggalhariini)); ?></p>
        <p>Petugas,<br><br><br><strong>(<?= $data['namapengguna']; ?>)</strong></p>
    </div>
    <div style="text-align: right;">
        <img src="images/fevicon.png" width="80" alt="Logo">
    </div>
</div>

</body>
</html>
