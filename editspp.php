<?php
include('koneksi.php');

// Ambil data SPP berdasarkan ID dari URL
if (isset($_GET['id'])) {
    $idspp = (int) $_GET['id'];
    $q = mysqli_query($koneksi, "SELECT * FROM spp WHERE idspp = '$idspp'");
    $data = mysqli_fetch_assoc($q);

    if (!$data) {
        echo "<script>alert('Data tidak ditemukan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=dataspp'>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak diberikan');</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?page=dataspp'>";
    exit;
}

// Proses update data
if (isset($_POST['update'])) {
    $nominal = (int) $_POST['nominal'];
    $tahunpelajaran = mysqli_real_escape_string($koneksi, $_POST['tahunpelajaran']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

    $sql = mysqli_query($koneksi, "UPDATE spp SET nominal = '$nominal', tahunpelajaran = '$tahunpelajaran', keterangan = '$keterangan' WHERE idspp = '$idspp'");

    if ($sql) {
        echo "<script>alert('Data SPP berhasil diupdate');</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=dataspp'>";
    } else {
        echo "<script>alert('Gagal mengupdate data SPP');</script>";
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
                    <h2>Edit SPP</h2> 
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group-row mb-4">
                    <label for="nominal" class="col-sm-2">Nominal</label>
                    <div class="col-sm-12">
                        <input type="number" name="nominal" id="nominal" class="form-control" required min="0" value="<?= $data['nominal'] ?>">
                    </div>
                </div>
                <div class="form-group-row mb-4">
                    <label for="tahunpelajaran" class="col-sm-2">Tahun Pelajaran</label>
                    <div class="col-sm-12">
                        <input type="text" name="tahunpelajaran" id="tahunpelajaran" class="form-control" placeholder="Contoh: 2024/2025" maxlength="10" required value="<?= $data['tahunpelajaran'] ?>">
                    </div>
                </div>
                <div class="form-group-row mb-4">
                    <label for="keterangan" class="col-sm-2">Keterangan</label>
                    <div class="col-sm-12">
                        <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= $data['keterangan'] ?>">
                    </div>
                </div>
                <div class="form-group-row mb-4">
                    <div class="col-sm-12">
                        <button type="submit" name="update" class="form-control btn btn-warning">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
