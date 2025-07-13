<?php
include('koneksi.php');
$awal = $_GET['awal'];
$akhir = $_GET['akhir'];
$jenis = $_GET['jenis'];
if ($jenis == 1) {
    echo "<script>
        alert('DATA LAPORAN PEMASUKAN BELUM TERSEDIA');
         window.close();
    </script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN</title>
    <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
    <style>
        body, td, th {
            max-width: 210mm;
            max-height: 290mm;
            font-size: 14px;
        }
        th, td {
            padding: 4px 4px 4px 4px;
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
        @media screen{
            .noprint{display:block;}
            .noshow{display:none;}
        }
        @media print{
            .noprint{display:none;}
            .noshow{display:block;}
        }
        .judul1 {
            text-align: center; /* Mengubah menjadi center */
            font-size: 14px;
            line-height: 90%;
            margin-bottom: 3px;
        }
        .judul2 {
            text-align: center; /* Mengubah menjadi center */
            font-weight: bold;
            font-size: 35px;
            line-height: 90%;
            margin-bottom: 5px;
        }
        body {
            margin: 0 auto; /* Menengahkan konten */
            text-align: center; /* Menengahkan konten */
        }
        .hilang {
            border: 0;
        }
        hr.new1 {
            border-top: 2px solid;
            margin-top: 10px;
            margin-bottom: 1px;
            width: 210mm;
        }
        hr.new2 {
            border-top: 1px solid;
            margin-top: 1px;
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
    <div class="row text-center" style="width: 750px; margin: 2px auto;"> <!-- Menambahkan style untuk menengahkan konten -->
        <div id="#nama" class="col-md-12"style="padding-top: 25px;">
            <div class="judul2">SMK WIDYA MANDALA KOTA SEMARANG</div>
            <div class="judul1">Jl. Menoreh Tengah X No.9
            </div>
            <div class="judul1">Sampangan, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50232</div>
        </div>
    </div>
    <hr class="new1">
    </center>

           <?php
        $no=1;
            $qdata = mysqli_query($koneksi,"SELECT*FROM pengeluaran  where tanggalpengeluaran between '$awal' AND '$akhir' ORDER BY kodepengeluaran asc");
            ?>
         
    <strong style="text-decoration: underline;">LAPORAN PENGELUARAN DANA</strong><br>
    <span>Periode</span>
    <div class="judul1 text-center mb-4"><?=  date('d F Y', strtotime($awal)).' Sampai '.date('d F Y', strtotime($akhir));?></div>
    <center>
    <table width="90%"class="table-bordered">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $total = 0;
                while ($data=mysqli_fetch_array($qdata)){ $total = $total + $data['nominalpengeluaran'];?>
            <tr class="text-center">
                <td><?= $no++?></td>
                <td><?= $data['kodepengeluaran'];?></td>
                <td><?=  date('d F Y', strtotime($data['tanggalpengeluaran']));?></td>
                <td><?= $data['keteranganpengeluaran'];?></td>
                <td><?= $data['nominalpengeluaran'];?></td>
            </tr>
               <?php }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-center">Total Pengeluaran</th>
                <th class="text-center"><?= $total;?></th>
            </tr>
        </tfoot>
    </table>
    </center>
   

   
    <div class="row mt-5"style="width: 750px; margin: 2px auto;">
        <div class="col-sm-3 text-center">Mengetahui <br>Kepala Sekolah<br><br><br><br>(...................................)</div>
        <div class="col-sm-5 text-center"></div>
        <div class="col-sm-4 text-center">Semarang, <?= date('d F Y', strtotime($tanggalhariini)); ?> <br>Bendahara, <br><br><br> <br>(...................................)</div>
    </div>
    <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
</body>
</html>
