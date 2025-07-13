<?php
include('koneksi.php');
$no = 1;
$qdata = mysqli_query($koneksi, "SELECT * FROM spp");
?>
<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>SPP</h2>
        </div>
    </div>
</div>
<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0 d-flex justify-content-between align-items-center">
                    <h2>Data SPP</h2> 
                    <a href="index.php?page=tambahspp" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nominal</th>
                                <th>Tahun Pelajaran</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_array($qdata)) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo number_format($data['nominal'], 0, ',', '.'); ?></td>
                                <td><?php echo $data['tahunpelajaran']; ?></td>
                                <td><?php echo $data['keterangan']; ?></td>
                                <td>
                                    <a href="index.php?page=editspp&id=<?php echo $data['idspp']; ?>" class="btn btn-warning btn-sm">Edit</a>
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
