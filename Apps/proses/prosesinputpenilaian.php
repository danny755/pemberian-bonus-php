<?php
    include("../lib/database.php");
    $radiopenilaian = $_POST['radio'];
    $katergoripenilaian = $_POST['kategoriinput'];
    $stmt = $pdo->query("DELETE FROM `penilaian` WHERE `kategori` = '$katergoripenilaian'");
    foreach($radiopenilaian as $idkaryawan => $penilaian){
        $stmt = $pdo->query("INSERT INTO `penilaian` (`nilai`, `kategori`, `karyawanid`) VALUES ('$penilaian', '$katergoripenilaian', '$idkaryawan')");
    }
    if($katergoripenilaian=='kinerja'){
        header('Location:..\index.php?halaman=kinerja');
    }
    else{
        if($katergoripenilaian=='kerajinan'){
            header('Location:..\index.php');
        }
        else{
            header('Location:..\index.php?halaman=kerajinan');
        }
    }
    
