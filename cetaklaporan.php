<?php
include('koneksi.php');
$awal = $_GET['awal'];
$akhir = $_GET['akhir'];
$tanggalhariini = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pembayaran SPP</title>
    <link rel="icon" href="images/fevicon.png" type="image/png" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/colors.css" />
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <style>
        body, td, th {
            max-width: 210mm;
            max-height: 290mm;
            font-size: 14px;
        }
        th, td {
            padding: 4px;
        }
        th {
            border-top: 1px solid #333333;
            border-bottom: 1px solid #333333;
        }
        tfoot td {
            border-top: 2px solid #333333;
            padding-top: 2px;
            border-bottom: 2px solid #333333;
        }
        @media screen {
            .noprint { display: block; }
            .noshow { display: none; }
        }
        @media print {
            .noprint { display: none; }
            .noshow { display: block; }
        }
        .judul1 {
            text-align: center;
            font-size: 14px;
            line-height: 90%;
            margin-bottom: 3px;
        }
        .judul2 {
            text-align: center;
            font-weight: bold;
            font-size: 35px;
            line-height: 90%;
            margin-bottom: 5px;
        }
        body {
            margin: 0 auto;
            text-align: center;
        }
        hr.new1 {
            border-top: 2px solid;
            margin-top: 10px;
            margin-bottom: 1px;
            width: 210mm;
        }
    </style>
</head>
<body>
    <center>
        <span class="noprint text-center">
            <a href="javascript:window.print();" class="btn btn-outline-primary"><i class="fa fa-print"></i></a>
            <a href="javascript:window.close();" class="btn btn-outline-danger"><i class="fa fa-power-off"></i></a>
        </span>

        <div class="row text-center" style="width: 750px; margin: 2px auto;">
            <div class="col-md-12" style="padding-top: 25px;">
                <div class="judul2">SMK WIDYA MANDALA KOTA SEMARANG</div>
                <div class="judul1">Jl. Menoreh Tengah X No.9</div>
                <div class="judul1">Sampangan, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50232</div>
            </div>
        </div>
        <hr class="new1">
    </center>

    <?php
    $no = 1;
    $qdata = mysqli_query($koneksi, "
        SELECT pembayaran.*, siswa.namasiswa, spp.tahunpelajaran, spp.nominal AS nominalspp, pengguna.namapengguna AS namapengguna
        FROM pembayaran 
        LEFT JOIN siswa ON pembayaran.idsiswa = siswa.idsiswa
        LEFT JOIN spp ON pembayaran.idspp = spp.idspp
        LEFT JOIN pengguna ON pembayaran.idpengguna = pengguna.idpengguna
        WHERE tanggalbayar BETWEEN '$awal' AND '$akhir'
        ORDER BY tanggalbayar ASC
    ");
    ?>

    <strong style="text-decoration: underline;">LAPORAN PEMBAYARAN SPP</strong><br>
    <span>Periode</span>
    <div class="judul1"><?= date('d F Y', strtotime($awal)) . ' sampai ' . date('d F Y', strtotime($akhir)); ?></div>

    <center>
        <table width="90%" class="table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Siswa</th>
                    <th>Bulan</th>
                    <th>Tahun Ajaran</th>
                    <th>Jumlah Bayar</th>
                    <th>Status</th>
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                while ($data = mysqli_fetch_array($qdata)) {
                    $total += $data['jumlahbayar'];
                ?>
                <tr class="text-center">
                    <td><?= $no++; ?></td>
                    <td><?= date('d-m-Y', strtotime($data['tanggalbayar'])); ?></td>
                    <td><?= $data['namasiswa']; ?></td>
                    <td><?= $data['bulanbayar']; ?></td>
                    <td><?= $data['tahunpelajaran']; ?></td>
                    <td>Rp <?= number_format($data['jumlahbayar'], 0, ',', '.'); ?></td>
                    <td><?= $data['statuspembayaran']; ?></td>
                    <td><?= $data['namapengguna']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5" class="text-center">Total Pembayaran</th>
                    <th colspan="3" class="text-center">Rp <?= number_format($total, 0, ',', '.'); ?></th>
                </tr>
            </tfoot>
        </table>
    </center>

    <div class="row mt-5" style="width: 750px; margin: 2px auto;">
        <div class="col-sm-3 text-center">Mengetahui <br>Kepala Sekolah<br><br><br><br>(...................................)</div>
        <div class="col-sm-5 text-center"></div>
        <div class="col-sm-4 text-center">
            Semarang, <?= date('d F Y', strtotime($tanggalhariini)); ?><br>Bendahara,<br><br><br><br>(...................................)
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
