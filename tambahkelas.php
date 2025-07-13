<?php
include('koneksi.php');

if (isset($_POST['tambah'])) {
    $namakelas = mysqli_real_escape_string($koneksi, $_POST['namakelas']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    $sql = mysqli_query($koneksi, "INSERT INTO kelas (namakelas, keterangan) VALUES ('$namakelas', '$keterangan')");

    if ($sql) {
        echo "<script>alert('Data kelas berhasil ditambahkan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datakelas'>";
    } else {
        echo "<script>alert('Gagal menambahkan data kelas');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=tambahkelas'>";
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
                    <h2>Tambah Kelas</h2> 
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group-row mb-4">
                    <label for="namakelas" class="col-sm-2">Nama Kelas</label>
                    <div class="col-sm-12">
                        <input type="text" name="namakelas" id="namakelas" class="form-control" required>
                    </div>
                </div>
                <div class="form-group-row mb-4">
                    <label for="keterangan" class="col-sm-2">Keterangan</label>
                    <div class="col-sm-12">
                        <input type="text" name="keterangan" id="keterangan" class="form-control" required>
                    </div>
                </div>
                <div class="form-group-row mb-4">
                    <div class="col-sm-12">
                        <button type="submit" name="tambah" class="form-control btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
