<?php
include('koneksi.php');

if (isset($_POST['tambah'])) {
    $nominal = (int) $_POST['nominal'];
    $tahunpelajaran = mysqli_real_escape_string($koneksi, $_POST['tahunpelajaran']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    $sql = mysqli_query($koneksi, "INSERT INTO spp (nominal, tahunpelajaran, keterangan) VALUES ('$nominal', '$tahunpelajaran', '$keterangan')");

    if ($sql) {
        echo "<script>alert('Data SPP berhasil ditambahkan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=dataspp'>";
    } else {
        echo "<script>alert('Gagal menambahkan data SPP');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=tambahspp'>";
    }
}
?>

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>SPP</h2>
        </div>
    </div>
</div>

<div class="row column1">
    <div class="col-md-10">
        <div class="white_shd full margin_bottom_20">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Tambah SPP</h2> 
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group-row mb-4">
                    <label for="nominal" class="col-sm-2">Nominal</label>
                    <div class="col-sm-12">
                        <input type="number" name="nominal" id="nominal" class="form-control" required min="0">
                    </div>
                </div>
                <div class="form-group-row mb-4">
                    <label for="tahunpelajaran" class="col-sm-2">Tahun Pelajaran</label>
                    <div class="col-sm-12">
                        <input type="text" name="tahunpelajaran" id="tahunpelajaran" class="form-control" placeholder="Contoh: 2024/2025" maxlength="10" required>
                    </div>
                </div>
                <div class="form-group-row mb-4">
                    <label for="keterangan" class="col-sm-2">Keterangan</label>
                    <div class="col-sm-12">
                        <input type="text" name="keterangan" id="keterangan" class="form-control">
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
