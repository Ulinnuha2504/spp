<?php
include('koneksi.php');
$no = 1;
$qdata = mysqli_query($koneksi, "
    SELECT 
        siswa.idsiswa, 
        siswa.namasiswa, 
        siswa.jeniskelamin, 
        siswa.alamat,
        siswa.telp,
        kelas.namakelas
    FROM siswa 
    LEFT JOIN kelas ON siswa.idkelas = kelas.idkelas
");
?>

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>SISWA</h2>
        </div>
    </div>
</div>

<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Data Siswa</h2> 
                    <a href="index.php?page=tambahsiswa" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_array($qdata)) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['idsiswa']; ?></td>
                                <td><?php echo $data['namasiswa']; ?></td>
                                <td><?php echo $data['jeniskelamin']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td>
                                    <a href="index.php?page=editsiswa&id=<?php echo $data['idsiswa']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
