<?php

include("../../lib/database.php");

$id = $_POST['id'];
$namakaryawan = $_POST['namakaryawan'];

$query = "UPDATE karyawan SET namakaryawan = '$namakaryawan' WHERE id = '$id'";

if ($pdo->query($query)) {

	header("location: index.php?halaman=karyawan");
} else {

	echo "Data Gagal Disimpan!";
}
