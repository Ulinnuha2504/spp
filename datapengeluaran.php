<?php
include('koneksi.php');
if (isset($_GET['hapus'])) {
    $hapus = $_GET['hapus'];
    $sql   = mysqli_query($koneksi,"DELETE FROM pengeluaran WHERE kodepengeluaran='$hapus'");
    
    if ($sql) {
        echo "<script>alert('Data Pengeluaran Berhasil Di Hapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengeluaran'>";
    }else {
        echo "<script>alert('Data Pengeluaran Gagal Di Hapus')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?page=datapengeluaran'>";
    }
}
$no = 1;
$qdata = mysqli_query($koneksi,"SELECT*FROM pengeluaran");
?>
<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>PENGELUARAN</h2>
        </div>
    </div>
</div>
<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                <h2>Daftar Pengeluaran</h2> 
                <a href="index.php?page=tambahpengeluaran" class="btn btn-primary">Pengeluaran Baru</a>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center font-weight-bold">
                            <th width="5%">No</th>
                            <th width="15%">Kode</th>
                            <th width="15%">Tanggal</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data=mysqli_fetch_array($qdata)) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++;?></td>
                            <td class="text-center"><?php echo $data['kodepengeluaran'];?></td>
                            <td  class="text-center"><?php echo date("d/m/Y", strtotime($data['tanggalpengeluaran'])); ?></td>
                            <td><?php echo $data['keteranganpengeluaran'];?></td>
                            <td class="text-right"><?php echo $data['nominalpengeluaran'];?></td>
                            <td>
                                <a href="index.php?page=editpengeluaran&kode=<?php echo $data['kodepengeluaran'];?>"class="btn btn-warning">Edit</a>
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