<?php
include('koneksi.php');
$no = 1;
$qdata = mysqli_query($koneksi,"SELECT*FROM kelas");
?>
<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>KELAS</h2>
        </div>
    </div>
</div>
<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_30">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                <h2>Data Kelas</h2> 
                <a href="index.php?page=tambahkelas" class="btn btn-primary">tambah</a>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Keterangan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($data=mysqli_fetch_array($qdata)) {
                        ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $data['namakelas'];?></td>
                            <td><?php echo $data['keterangan'];?></td>
                            <td>
                                <a href="index.php?page=editkelas&id=<?php echo $data['idkelas'];?>"class="btn btn-warning">Edit</a>
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