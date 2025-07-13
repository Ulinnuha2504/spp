<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>Laporan Administrasi Keuangan</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class=" card-body white_shd full margin_bottom_30">
            <form action="cetaklaporan.php" method="GET" target="_blank">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="">Jenis Laporan</label>
                            <div>
                                <select name="jenis" id="jenis" class="form-control">
                                    <option value="">Pilih Transaksi</option>
                                    <option value="1">Pemasukan</option>
                                    <option value="2">Pengeluaran</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Dari Tanggal</label>
            <input type="date" name="awal" id="tanggalmulai" class="form-control" required>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="">Sampai Tanggal</label>
            <input type="date" name="akhir" id="tanggalsampai" class="form-control" required>
        </div>
    </div>

                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success">Lihat Laporan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>