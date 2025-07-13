<?php
include('koneksi.php');

// Tangkap ID dari parameter GET
$idkelas = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Ambil data kelas berdasarkan ID
$qdata = mysqli_query($koneksi, "SELECT * FROM kelas WHERE idkelas = '$idkelas'");
$data = mysqli_fetch_assoc($qdata);

// Jika tidak ada data, redirect
if (!$data) {
    echo "<script>alert('Data tidak ditemukan');</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?page=datakelas'>";
    exit;
}

// Proses update jika tombol submit ditekan
if (isset($_POST['edit'])) {
    $namakelas = mysqli_real_escape_string($koneksi, $_POST['namakelas']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    $sql = mysqli_query($koneksi, "UPDATE kelas SET namakelas='$namakelas', keterangan='$keterangan' WHERE idkelas='$idkelas'");

    if ($sql) {
        echo "<script>alert('Data kelas berhasil diupdate');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datakelas'>";
    } else {
        echo "<script>alert('Gagal mengupdate data kelas');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=editkelas&id=$idkelas'>";
    }
}
?>

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>KELAS</h2>
        </div>
    </div>
</div>

<div class="row column1">
    <div class="col-md-10">
        <div class="white_shd full margin_bottom_20">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Edit Kelas</h2> 
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group-row mb-4">
                    <label for="namakelas" class="col-sm-2">Nama Kelas</label>
                    <div class="col-sm-12">
                        <input type="text" name="namakelas" id="namakelas" class="form-control" value="<?php echo htmlspecialchars($data['namakelas']); ?>" required>
                    </div>
                </div>
                <div class="form-group-row mb-4">
                    <label for="keterangan" class="col-sm-2">Keterangan</label>
                    <div class="col-sm-12">
                        <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?php echo htmlspecialchars($data['keterangan']); ?>" required>
                    </div>
                </div>
                <div class="form-group-row mb-4">
                    <div class="col-sm-12">
                        <button type="submit" name="edit" class="form-control btn btn-warning">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
