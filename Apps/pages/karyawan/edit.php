<?php
$id = $_GET['id'];

$query = "SELECT * FROM karyawan WHERE id = $id LIMIT 1";

$result = $pdo->query($query);

$karyawan = $result->fetch(PDO::FETCH_ASSOC);

?>

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
				<form action="index.php?halaman=update_karyawan" method="POST">
					<input type="hidden" name="id" value="<?php echo $karyawan['id'] ?>">

					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="namakaryawan" placeholder="Masukkan Nama Karyawan" value="<?= $karyawan['namakaryawan'] ?>" class="form-control">
					</div>
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="index.php?halaman=karyawan" class="btn btn-danger1">Batal</a>

				</form>
			</div>
		</div>
	</div>
</div>