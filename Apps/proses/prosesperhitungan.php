<?php
    include("../lib/database.php");

    /*mengambil data*/
    $stmt = $pdo->query("SELECT karyawanid, nilai FROM `penilaian` WHERE `kategori` = 'kinerja' ORDER BY `penilaian`.`nilai` DESC");
    $dataOutput['K1'] = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    
    $stmt = $pdo->query("SELECT karyawanid, nilai FROM `penilaian` WHERE `kategori` = 'kehadiran' ORDER BY `penilaian`.`nilai` DESC");
    $dataOutput['K2'] = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

    $stmt = $pdo->query("SELECT karyawanid, nilai FROM `penilaian` WHERE `kategori` = 'kerajinan' ORDER BY `penilaian`.`nilai` DESC");
    $dataOutput['K3'] = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

    /*melakukan normalisasi nilai*/
    $datanormalisasi = [];
    foreach($dataOutput as $key => $data){
        $nilaiterbesar = 0;
        foreach($data as $karyawanid => $nilai){
            if($nilaiterbesar < $nilai) $nilaiterbesar = $nilai;
            $datanormalisasi[$karyawanid][$key] = $nilai/$nilaiterbesar;
        }
    }
    $bobot['K1'] = 0.7370;
    $bobot['K2'] = 0.1863;
    $bobot['K3'] = 0.0767; 
    $hasilperhitungan = [];
    foreach($datanormalisasi as $karyawanid => $bobotaray){
        foreach($bobotaray as $bobotk => $nilainormalisasi){
            if(empty($hasilperhitungan[$karyawanid]))$hasilperhitungan[$karyawanid] = 0;
            $hasilperhitungan[$karyawanid] = ($bobot[$bobotk]*$nilainormalisasi) + $hasilperhitungan[$karyawanid];
        }
    }
    arsort($hasilperhitungan);
    $peringkat = 0;
    $penilaianterakhir = 0;
    $stmt = $pdo->query("DELETE FROM `hasilproses`");
    foreach($hasilperhitungan as $idkaryawan => $penilaian){
        if($penilaianterakhir != $penilaian){
            $peringkat = $peringkat+1;
            $penilaianterakhir = $penilaian;
        }
        $stmt = $pdo->query("INSERT INTO `hasilproses` (`karyawanid`, `hasil`, `peringkat`) VALUES ('$idkaryawan', '$penilaian', '$peringkat')");
    }
    header('Location:..\index.php?halaman=peringkat');