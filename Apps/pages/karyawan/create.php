<div class="row justify-content-center">
  <div class="col-12">
    <div class="card border-0">
      <div class="card-header">
        <div class="row justify-content-left">
        </div>
        <div class="card-tools">
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive" style="height: 450px;">
        <form action="index.php?halaman=store_karyawan" method="POST">

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="namakaryawan" placeholder="Masukkan Nama Karyawan" class="form-control">
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="index.php?halaman=karyawan" class="btn btn-danger1">Batal</a>

        </form>
      </div>
    </div>
  </div>
</div>