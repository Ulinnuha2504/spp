<?php
include('koneksi.php');
$no = 1;

// Query gabungan: pembayaran + siswa + spp
$qdata = mysqli_query($koneksi, "
    SELECT 
        pembayaran.*, 
        siswa.namasiswa, 
        siswa.jeniskelamin, 
        spp.nominal
    FROM pembayaran 
    LEFT JOIN siswa ON pembayaran.idsiswa = siswa.idsiswa
    LEFT JOIN spp ON pembayaran.idspp = spp.idspp
    ORDER BY pembayaran.tanggalbayar DESC
");
?>

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>PEMBAYARAN SPP</h2>
        </div>
    </div>
</div>

<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Daftar Pembayaran</h2>
                    <a href="index.php?page=tambahpembayaran" class="btn btn-primary">Tambah Pembayaran</a>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Bulan</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah Bayar</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_array($qdata)) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['namasiswa']; ?></td>
                                <td><?php echo $data['jeniskelamin']; ?></td>
                                <td><?php echo $data['bulanbayar']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($data['tanggalbayar'])); ?></td>
                                <td>Rp <?php echo number_format($data['jumlahbayar'], 0, ',', '.'); ?></td>
                                <td>
                                    <?php if ($data['statuspembayaran'] == 'Lunas') { ?>
                                        <span class="badge badge-success">Lunas</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">Belum Bayar</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="cetaknota.php?kode=<?php echo $data['idpembayaran']; ?>" 
                                    class="btn btn-primary btn-sm" 
                                    onclick="
                                        const width = 800;
                                        const height = 600;
                                        const left = (screen.width - width) / 2;
                                        const top = (screen.height - height) / 2;
                                        window.open(this.href, 'popupwindow', `width=${width},height=${height},top=${top},left=${left},scrollbars=yes,resizable=yes`);
                                        return false;">
                                    Cetak
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php if (mysqli_num_rows($qdata) === 0) { ?>
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data pembayaran.</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
