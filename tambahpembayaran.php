<?php
include('koneksi.php');

// Proses simpan pembayaran
if (isset($_POST['simpan'])) {
    $idsiswa = $_POST['idsiswa'];
    $idspp = $_POST['idspp'];
    $bulanbayar = $_POST['bulanbayar'];
    $tanggalbayar = $_POST['tanggalbayar'];
    $jumlahbayar = $_POST['jumlahbayar'];
    $statuspembayaran = $_POST['statuspembayaran'];
    $idpengguna = $_POST['idpengguna'];

    // Cek duplikat pembayaran bulan yang sama
    $cek = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE idsiswa=$idsiswa AND bulanbayar='$bulanbayar'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('⚠️ Pembayaran bulan tersebut sudah ada!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=tambahpembayaran'>";
    } else {
        $insert = mysqli_query($koneksi, "
            INSERT INTO pembayaran 
            (idspp, idsiswa, tanggalbayar, bulanbayar, jumlahbayar, statuspembayaran, idpengguna) 
            VALUES 
            ('$idspp', '$idsiswa', '$tanggalbayar', '$bulanbayar', '$jumlahbayar', '$statuspembayaran', '$idpengguna')
        ");

        if ($insert) {
            echo "<script>alert('✅ Pembayaran berhasil disimpan');</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapembayaran'>";
        } else {
            echo "<script>alert('❌ Gagal menyimpan pembayaran');</script>";
        }
    }
}
?>

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>PEMBAYARAN SPP</h2>
        </div>
    </div>
</div>

<div class="row column1">
    <div class="col-md-10">
        <div class="white_shd full margin_bottom_20">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Form Pembayaran SPP</h2> 
                </div>
            </div>

            <form action="" method="post">
                <div class="form-group-row mb-4">
                    <label for="idsiswa" class="col-sm-12">Pilih Siswa</label>
                    <div class="col-sm-12">
                        <select name="idsiswa" id="idsiswa" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <?php
                            $qsiswa = mysqli_query($koneksi, "SELECT idsiswa, namasiswa FROM siswa ORDER BY namasiswa ASC");
                            while ($s = mysqli_fetch_assoc($qsiswa)) {
                                echo "<option value='{$s['idsiswa']}'>{$s['namasiswa']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group-row mb-4">
                    <label for="idspp" class="col-sm-12">Tahun Ajaran (SPP)</label>
                    <div class="col-sm-12">
                        <select name="idspp" id="idspp" class="form-control" required>
                            <?php
                            $qspp = mysqli_query($koneksi, "SELECT * FROM spp ORDER BY idspp DESC");
                            while ($sp = mysqli_fetch_assoc($qspp)) {
                                echo "<option value='{$sp['idspp']}'>Tahun: {$sp['tahun']} - Rp " . number_format($sp['nominal'], 0, ',', '.') . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group-row mb-4">
                    <label for="bulanbayar" class="col-sm-12">Bulan Bayar</label>
                    <div class="col-sm-12">
                        <select name="bulanbayar" id="bulanbayar" class="form-control" required>
                            <?php
                            $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                            foreach ($bulan as $b) {
                                echo "<option value='$b'>$b</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group-row mb-4">
                    <label for="tanggalbayar" class="col-sm-12">Tanggal Bayar</label>
                    <div class="col-sm-12">
                        <input type="date" name="tanggalbayar" id="tanggalbayar" class="form-control" required>
                    </div>
                </div>

                <div class="form-group-row mb-4">
                    <label for="jumlahbayar" class="col-sm-12">Jumlah Bayar</label>
                    <div class="col-sm-12">
                        <input type="number" name="jumlahbayar" id="jumlahbayar" class="form-control" placeholder="Masukkan nominal pembayaran" required>
                    </div>
                </div>

                <div class="form-group-row mb-4">
                    <label for="statuspembayaran" class="col-sm-12">Status Pembayaran</label>
                    <div class="col-sm-12">
                        <select name="statuspembayaran" id="statuspembayaran" class="form-control" required>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Bayar">Belum Bayar</option>
                        </select>
                    </div>
                </div>

                <div class="form-group-row mb-4">
                    <!-- <label for="idpengguna" class="col-sm-12">ID Pengguna</label> -->
                    <div class="col-sm-12">
                        <input type="hidden" name="idpengguna" id="idpengguna" class="form-control" value="1" required>
                    </div>
                </div>

                <div class="form-group-row mb-4">
                    <div class="col-sm-12">
                        <button type="submit" name="simpan" class="form-control btn btn-success">Simpan Pembayaran</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    // Ambil data SPP dari PHP ke JavaScript
    const sppData = {
        <?php
        $querySpp = mysqli_query($koneksi, "SELECT * FROM spp");
        while ($sp = mysqli_fetch_assoc($querySpp)) {
            echo "'{$sp['idspp']}': {$sp['nominal']},";
        }
        ?>
    };

    // Saat select spp berubah
    document.getElementById("idspp").addEventListener("change", function () {
        const selectedId = this.value;
        const nominal = sppData[selectedId] || 0;
        document.getElementById("jumlahbayar").value = nominal;
    });

    // Isi awal jika sudah terpilih default
    window.addEventListener("DOMContentLoaded", function () {
        const selected = document.getElementById("idspp").value;
        if (selected && sppData[selected]) {
            document.getElementById("jumlahbayar").value = sppData[selected];
        }
    });
</script>
