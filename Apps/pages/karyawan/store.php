<?php

include("../../lib/database.php");

$namakaryawan = $_POST['namakaryawan'];

$query = "INSERT INTO karyawan (namakaryawan) VALUES ('$namakaryawan')";

if ($pdo->query($query)) {

	header("location: index.php?halaman=karyawan");
} else {

	echo "Data Gagal Disimpan!";
}
