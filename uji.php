<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pembayaran SPP</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .form-section { margin-bottom: 30px; }
        input, select { padding: 6px; margin: 5px 0; width: 100%; }
        .btn { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
        .btn:hover { background-color: #45a049; }
    </style>

    <!-- jQuery & Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>

<h2>💳 Pembayaran SPP</h2>

<!-- PILIH SISWA -->
<div class="form-section">
    <form method="GET">
        <label for="idsiswa">Pilih Siswa:</label>
        <select name="idsiswa" id="select-siswa" onchange="this.form.submit()">
            <option value="">-- Pilih --</option>
            <?php
            $querySiswa = mysqli_query($koneksi, "SELECT idsiswa, namasiswa FROM siswa ORDER BY namasiswa ASC");
            while ($s = mysqli_fetch_assoc($querySiswa)) {
                $selected = (@$_GET['idsiswa'] == $s['idsiswa']) ? 'selected' : '';
                echo "<option value='{$s['idsiswa']}' $selected>{$s['namasiswa']}</option>";
            }
            ?>
        </select>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#select-siswa').select2({
            placeholder: "-- Cari siswa --",
            width: '100%'
        });
    });
</script>

<?php
if (isset($_GET['idsiswa'])):
    $idsiswa = intval($_GET['idsiswa']);

    // Ambil data siswa + kelas
    $sqlSiswa = mysqli_query($koneksi, "SELECT s.*, k.namakelas FROM siswa s LEFT JOIN kelas k ON s.idkelas = k.idkelas WHERE s.idsiswa = $idsiswa");
    $siswa = mysqli_fetch_assoc($sqlSiswa);

    // Ambil SPP aktif
    $sqlSPP = mysqli_query($koneksi, "SELECT * FROM spp ORDER BY idspp DESC LIMIT 1");
    $spp = mysqli_fetch_assoc($sqlSPP);
?>

<!-- DETAIL SISWA -->
<div class="form-section">
    <h3>📌 Data Siswa</h3>
    <table>
        <tr><th>Nama</th><td><?= $siswa['namasiswa']; ?></td></tr>
        <tr><th>Kelas</th><td><?= $siswa['namakelas']; ?></td></tr>
        <tr><th>Jenis Kelamin</th><td><?= $siswa['jeniskelamin']; ?></td></tr>
        <tr><th>Telepon</th><td><?= $siswa['telp']; ?></td></tr>
    </table>
</div>

<!-- FORM PEMBAYARAN -->
<div class="form-section">
    <h3>📝 Form Pembayaran</h3>
    <form method="POST">
        <input type="hidden" name="idsiswa" value="<?= $idsiswa; ?>">
        <input type="hidden" name="idspp" value="<?= $spp['idspp']; ?>">

        <label>Bulan Bayar:</label>
        <select name="bulanbayar" required>
            <?php
            $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
            foreach ($bulan as $b) echo "<option value='$b'>$b</option>";
            ?>
        </select>

        <label>Tanggal Bayar:</label>
        <input type="date" name="tanggalbayar" required>

        <label>Jumlah Bayar (Rp):</label>
        <input type="number" name="jumlahbayar" value="<?= $spp['nominal']; ?>" required>

        <label>Status Pembayaran:</label>
        <select name="statuspembayaran" required>
            <option value="Lunas">Lunas</option>
            <option value="Belum Bayar">Belum Bayar</option>
        </select>

        <label>ID Pengguna:</label>
        <input type="number" name="idpengguna" value="1" required> <!-- bisa disesuaikan -->

        <button type="submit" name="simpan" class="btn">Simpan Pembayaran</button>
    </form>
</div>

<!-- PROSES SIMPAN -->
<?php
if (isset($_POST['simpan'])) {
    $idspp = $_POST['idspp'];
    $idsiswa = $_POST['idsiswa'];
    $tanggalbayar = $_POST['tanggalbayar'];
    $bulanbayar = $_POST['bulanbayar'];
    $jumlahbayar = $_POST['jumlahbayar'];
    $status = $_POST['statuspembayaran'];
    $idpengguna = $_POST['idpengguna'];

    // Cek duplikat
    $cek = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE idsiswa=$idsiswa AND bulanbayar='$bulanbayar'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<p style='color:red;'>⚠️ Bulan $bulanbayar sudah dibayar!</p>";
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO pembayaran 
            (idspp, idsiswa, tanggalbayar, bulanbayar, jumlahbayar, statuspembayaran, idpengguna) 
            VALUES ('$idspp', '$idsiswa', '$tanggalbayar', '$bulanbayar', '$jumlahbayar', '$status', '$idpengguna')");
        echo $insert 
            ? "<p style='color:green;'>✅ Pembayaran berhasil disimpan.</p>" 
            : "<p style='color:red;'>❌ Gagal menyimpan data.</p>";
    }
}
?>

<!-- RIWAYAT PEMBAYARAN -->
<div class="form-section">
    <h3>📅 Riwayat Pembayaran</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Bulan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
        <?php
        $no = 1;
        $riwayat = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE idsiswa = $idsiswa ORDER BY tanggalbayar DESC");
        while ($r = mysqli_fetch_assoc($riwayat)) {
            echo "<tr>
                <td>$no</td>
                <td>{$r['bulanbayar']}</td>
                <td>{$r['tanggalbayar']}</td>
                <td>Rp " . number_format($r['jumlahbayar'], 0, ',', '.') . "</td>
                <td>{$r['statuspembayaran']}</td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</div>

<?php endif; ?>

</body>
</html>
