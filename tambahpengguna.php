<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>PENGGUNA</h2>
        </div>
    </div>
</div>
<div class="row column1">
    <div class="col-md-12">
        <div class="white_shd full margin_bottom_20">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                <h2>Tambah Pengguna</h2> 
                </div>
            </div>
        <form action="prosestambahpengguna.php" method="post">
            <div class="form-group-row mb-4">
                <label for="namapengguna" class="col-sm-2">Nama Pengguna</label>
                <div class="col-sm-10">
                    <input type="text" name="namapengguna" id="namapengguna" class="form-control"required>
                </div>
            </div>
            <div class="form-group-row mb-4">
                <label for="username" class="col-sm-2">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" id="username" class="form-control"required>
                </div>
            </div>
            <div class="form-group-row mb-4">
                <label for="password" class="col-sm-2">Password</label>
                <div class="col-sm-10">
                    <input type="text" name="password" id="password" class="form-control"required>
                </div>
            </div>
            <div class="form-group-row mb-4">
                <label for="hakakses" class="col-sm-2">Hak Akses</label>
                <div class="col-sm-10">
                    <select name="hakakses"  required id="hakakses" class="form-control">
                        <option value="">Pilih Hak Akses</option>
                        <option value="Admin">Admin</option>
                        <option value="Superadmin">Superadmin</option>
                    </select>
                </div> 
            </div>
            <div class="form-group-row mb-4">
                <button type="submit" class="form-control btn btn-success">simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>