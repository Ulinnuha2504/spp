<?php
include('koneksi.php');

// Fungsi buat ID siswa otomatis: yyyymm + urutan
function generateIdSiswa($koneksi) {
    $prefix = date('Ym');
    $query = mysqli_query($koneksi, "SELECT MAX(idsiswa) AS maxid FROM siswa WHERE idsiswa LIKE '$prefix%'");
    $data = mysqli_fetch_assoc($query);

    $lastId = $data['maxid'];

    if ($lastId) {
        $lastNumber = (int)substr($lastId, 6); // ambil 3 digit terakhir
        $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    } else {
        $nextNumber = '001';
    }

    return $prefix . $nextNumber;
}

// Proses simpan
if (isset($_POST['tambah'])) {
    $idsiswa       = generateIdSiswa($koneksi);
    $nis           = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $namasiswa     = mysqli_real_escape_string($koneksi, $_POST['namasiswa']);
    $jeniskelamin  = mysqli_real_escape_string($koneksi, $_POST['jeniskelamin']);
    $alamat        = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $telp          = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $idkelas       = (int)$_POST['idkelas'];

    $sql = mysqli_query($koneksi, "INSERT INTO siswa (idsiswa, nisn, namasiswa, jeniskelamin, alamat, telp, idkelas)
                                   VALUES ('$idsiswa', '$nis', '$namasiswa', '$jeniskelamin', '$alamat', '$telp', '$idkelas')");

    if ($sql) {
        echo "<script>alert('Data siswa berhasil ditambahkan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datasiswa'>";
    } else {
        echo "<script>alert('Gagal menambahkan data siswa');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=tambahsiswa'>";
    }
}
?>

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>SISWA</h2>
        </div>
    </div>
</div>

<div class="row column1">
    <div class="col-md-10">
        <div class="white_shd full margin_bottom_20">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Tambah Siswa</h2> 
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group-row mb-3">
                    <label for="nis" class="col-sm-2">NIS</label>
                    <div class="col-sm-12">
                        <input type="text" name="nis" id="nis" class="form-control" required>
                    </div>
                </div>

                <div class="form-group-row mb-3">
                    <label for="namasiswa" class="col-sm-2">Nama Siswa</label>
                    <div class="col-sm-12">
                        <input type="text" name="namasiswa" id="namasiswa" class="form-control" required>
                    </div>
                </div>

                <div class="form-group-row mb-3">
                    <label for="jeniskelamin" class="col-sm-2">Jenis Kelamin</label>
                    <div class="col-sm-12">
                        <select name="jeniskelamin" id="jeniskelamin" class="form-control" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group-row mb-3">
                    <label for="alamat" class="col-sm-2">Alamat</label>
                    <div class="col-sm-12">
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="form-group-row mb-3">
                    <label for="telp" class="col-sm-2">Telepon</label>
                    <div class="col-sm-12">
                        <input type="text" name="telp" id="telp" class="form-control" required>
                    </div>
                </div>

                <div class="form-group-row mb-3">
                    <label for="idkelas" class="col-sm-2">Kelas</label>
                    <div class="col-sm-12">
                        <select name="idkelas" id="idkelas" class="form-control" required>
                            <option value="">-- Pilih Kelas --</option>
                            <?php
                            $kelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY namakelas ASC");
                            while ($k = mysqli_fetch_array($kelas)) {
                                echo "<option value='{$k['idkelas']}'>{$k['namakelas']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group-row mt-4">
                    <div class="col-sm-12">
                        <button type="submit" name="tambah" class="form-control btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
