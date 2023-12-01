
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
              <th><b>1</b></th>
              <th><b>2</b></th>
              <th><b>3</b></th>
              <th><b>4</b></th>
              <th><b>5</b></th>
            </tr>
          </thead>
          <tbody>
            <form action="proses/prosesinputpenilaian.php" id="formNilai" method="post" onsubmit="return konfirmasi()">
            <?php
              $stmt = $pdo->query("SELECT karyawanid, nilai FROM `penilaian` WHERE `kategori` = 'kerajinan'");
              $dataInput = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

              $stmt = $pdo->query("SELECT * FROM `karyawan`");
              $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach($data as $key => $namakaryawan){
                $nomor = $key + 1;
                $nama = $namakaryawan['namakaryawan'];
                $idkaryawan = $namakaryawan['id'];
                $nilaikaryawan =  @$dataInput[$idkaryawan];
                $listnilai = [1,2,3,4,5];
                $forminput = '';
                foreach($listnilai as $formnilai){
                  if($nilaikaryawan == $formnilai){
                    $dicheck = 'checked';
                  }
                  else{
                    $dicheck = '';
                  }
                  $forminput = $forminput.
                  "<td>
                    <div class='form-check form-check-inline'>
                      <input class='form-check-input' type='radio' name='radio[$idkaryawan]' id='inlineRadio1' value='$formnilai' $dicheck>
                    </div>
                  </td>";
                }
                echo 
                "<tr>
                  <td>$nomor</td>
                  <td>$nama</td>
                  $forminput
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
      <input type="hidden" name="kategoriinput" value="kerajinan"></input>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </div>
  </div>     
</div>
<script>
  function konfirmasi(){
    var formkonfirmasi = false;
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Melakukan input penilaian kinerja!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Simpan!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          /*'Deleted!',
          'Your file has been deleted.',*/
          'success'
        )
        document.getElementById("formNilai").submit();
      }
    })
    return formkonfirmasi
  }
</script>
