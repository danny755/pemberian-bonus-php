<?php

include("../../lib/database.php");

$id = $_GET['id'];

$query = "DELETE FROM karyawan WHERE id = '$id'";

if ($pdo->query($query)) {

	header("location: index.php?halaman=karyawan");
} else {

	echo "Data Gagal Dihapus!";
}
