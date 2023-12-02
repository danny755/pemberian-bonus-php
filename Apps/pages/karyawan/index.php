<div class="row justify-content-center">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row justify-content-left">
          <div class="col-3">
            <a href="index.php?halaman=create_karyawan" class="btn btn-primary btn-block">Tambah Karyawan</a>
          </div>
        </div>
        <div class="card-tools">
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 450px;">
        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Karyawan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM `karyawan` ORDER BY `id` DESC");
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($data as $key => $karyawan) {
              $nomor = $key + 1;
            ?>
              <tr>
                <td><?= $nomor ?></td>
                <td><?= $karyawan['namakaryawan'] ?></td>
                <td>

                  <a href="index.php?halaman=edit_karyawan&id=<?= $karyawan['id'] ?>" class="btn btn-warning">Edit</a>
                  <a href="index.php?halaman=delete_karyawan&id=<?= $karyawan['id'] ?>" class="btn btn-danger">Hapus</a>
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