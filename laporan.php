<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>Laporan Administrasi Keuangan</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-body white_shd full margin_bottom_30">
            <form action="cetaklaporan.php" method="GET" target="_blank">
                <div class="row">
                    <!-- Dari Tanggal -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tanggalmulai">Dari Tanggal</label>
                            <input type="date" name="awal" id="tanggalmulai" class="form-control" required>
                        </div>
                    </div>

                    <!-- Sampai Tanggal -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tanggalsampai">Sampai Tanggal</label>
                            <input type="date" name="akhir" id="tanggalsampai" class="form-control" required>
                        </div>
                    </div>

                    <!-- Tombol Lihat Laporan -->
                    <div class="col-sm-4 d-flex align-items-end">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success w-100">Lihat Laporan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
