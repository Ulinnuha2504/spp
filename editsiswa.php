<?php
include('koneksi.php');

if (!isset($_GET['id'])) {
    echo "<script>alert('ID siswa tidak ditemukan');</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?page=datasiswa'>";
    exit;
}

$idsiswa = $_GET['id'];

// Ambil data siswa
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE idsiswa = '$idsiswa'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Data siswa tidak ditemukan');</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?page=datasiswa'>";
    exit;
}

// Proses update
if (isset($_POST['update'])) {
    $nis           = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $namasiswa     = mysqli_real_escape_string($koneksi, $_POST['namasiswa']);
    $jeniskelamin  = mysqli_real_escape_string($koneksi, $_POST['jeniskelamin']);
    $alamat        = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $telp          = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $idkelas       = (int)$_POST['idkelas'];

    $sql = mysqli_query($koneksi, "UPDATE siswa SET 
                nisn = '$nis',
                namasiswa = '$namasiswa',
                jeniskelamin = '$jeniskelamin',
                alamat = '$alamat',
                telp = '$telp',
                idkelas = '$idkelas'
            WHERE idsiswa = '$idsiswa'");

    if ($sql) {
        echo "<script>alert('Data siswa berhasil diupdate');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datasiswa'>";
    } else {
        echo "<script>alert('Gagal mengupdate data siswa');</script>";
    }
}
?>

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>Edit Siswa</h2>
        </div>
    </div>
</div>

<div class="row column1">
    <div class="col-md-10">
        <div class="white_shd full margin_bottom_20">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Form Edit Siswa</h2> 
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group-row mb-3">
                    <label for="nis" class="col-sm-2">NIS</label>
                    <div class="col-sm-12">
                        <input type="number" name="nis" id="nis" class="form-control" 
                            value="<?= $data['nisn']; ?>" required 
                            max="9999999999" oninput="this.value = this.value.slice(0, 10)">
                    </div>
                </div>

                <div class="form-group-row mb-3">
                    <label for="namasiswa" class="col-sm-2">Nama Siswa</label>
                    <div class="col-sm-12">
                        <input type="text" name="namasiswa" id="namasiswa" class="form-control" value="<?= $data['namasiswa']; ?>" required>
                    </div>
                </div>

                <div class="form-group-row mb-3">
                    <label for="jeniskelamin" class="col-sm-2">Jenis Kelamin</label>
                    <div class="col-sm-12">
                        <select name="jeniskelamin" id="jeniskelamin" class="form-control" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki" <?= ($data['jeniskelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="Perempuan" <?= ($data['jeniskelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group-row mb-3">
                    <label for="alamat" class="col-sm-2">Alamat</label>
                    <div class="col-sm-12">
                        <textarea name="alamat" id="alamat" class="form-control" required><?= $data['alamat']; ?></textarea>
                    </div>
                </div>

                <div class="form-group-row mb-3">
                    <label for="telp" class="col-sm-2">Telepon</label>
                    <div class="col-sm-12">
                        <input type="text" name="telp" id="telp" class="form-control" value="<?= $data['telp']; ?>" required>
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
                                $selected = ($k['idkelas'] == $data['idkelas']) ? 'selected' : '';
                                echo "<option value='{$k['idkelas']}' $selected>{$k['namakelas']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group-row mt-4">
                    <div class="col-sm-12">
                        <button type="submit" name="update" class="form-control btn btn-warning">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
