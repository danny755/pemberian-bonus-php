<?php
include("../lib/database.php");
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $pdo->query("SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!empty($data)) {
    session_start();
    $_SESSION['username'] = $username;
    if ($username == "kepaladivisi") {
        header('Location:..\index.php?halaman=kinerja');
    } else {
        header('Location:..\index.php?aksi=berhasil-login');
    }
} else {
    header('Location:..\login.php?aksi=salah-login');
}
