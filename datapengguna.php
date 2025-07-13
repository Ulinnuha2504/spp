<?php
include('koneksi.php');
if (isset($_GET['hapus'])) {
    $hapus = $_GET['hapus'];
    $sql   = mysqli_query($koneksi,"DELETE FROM pengguna WHERE idpengguna='$hapus'");
    
    if ($sql) {
        echo "<script>alert('Data Pengguna Berhasil Di Hapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengguna'>";
    }else {
        echo "<script>alert('Data Pengguna Gagal Di Hapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengguna'>";
    }
}
$no = 1;
$qdata = mysqli_query($koneksi,"SELECT*FROM pengguna");
?>
<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>PENGGUNA</h2>
        </div>
    </div>
</div>
<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                <h2>Data Pengguna</h2> 
                <a href="index.php?page=tambahpengguna" class="btn btn-primary">tambah</a>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Hak Akses</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data=mysqli_fetch_array($qdata)) {
                        ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $data['namapengguna'];?></td>
                            <td><?php echo $data['username'];?></td>
                            <td><?php echo $data['password'];?></td>
                            <td><?php echo $data['hakakses'];?></td>
                            <td>
                                <a href="index.php?page=editpengguna&kode=<?php echo $data['idpengguna'];?>"class="btn btn-warning">Edit</a>
                                <a href="index.php?page=datapengguna&hapus=<?php echo $data['idpengguna'];?>"class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>