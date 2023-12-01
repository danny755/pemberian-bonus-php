

<div class="row justify-content-center">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="row justify-content-center">
        </div>
        <div class="card-tools">
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 450px;">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th><b>No</b></th>
              <th><b>Nama</b></th>
              <th><b>Peringkat</b></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $stmt = $pdo->query("SELECT hasilproses.* , karyawan.* FROM `hasilproses` INNER JOIN karyawan ON karyawan.id = hasilproses.karyawanid ORDER BY `peringkat` ASC");
              $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach($data as $key => $hasilperingkat){
                $nomor = $key + 1;
                $nama = $hasilperingkat['namakaryawan'];
                $peringkat = $hasilperingkat['peringkat'];
                echo 
                "<tr>
                  <td>$nomor</td>
                  <td>$nama</td>
                  <td>$peringkat</td>
                </tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-2">
      </div>
      <div class="col-4">
        <a href="index.php" class="btn btn-primary btn-block">Halaman Utama</a>
      </div>
      <div class="col-4">
        <a href="proses/prosesexport.php" class="btn btn-primary btn-block">Simpan</a>
      </div>
    </div>
  </div>     
</div>
