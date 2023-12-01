
<?php
    include("../lib/database.php");
    require_once __DIR__ . '/../vendor/autoload.php';

    $stmt = $pdo->query("SELECT hasilproses.* , karyawan.* FROM `hasilproses` INNER JOIN karyawan ON karyawan.id = hasilproses.karyawanid ORDER BY `peringkat` ASC");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row = "";
    foreach($data as $key => $hasilperingkat){
    $nomor = $key + 1;
    $nama = $hasilperingkat['namakaryawan'];
    $peringkat = $hasilperingkat['peringkat'];
    $row .= 
    "<tr>
        <td>$nomor</td>
        <td>$nama</td>
        <td>$peringkat</td>
    </tr>";
    }

    $html = "
    <h1>REPORT PERINGKAT</h1>
    <table border='1'>
        <thead>
            <tr>
                <th><b>No</b></th>
                <th><b>Nama</b></th>
                <th><b>Peringkat</b></th>
            </tr>
        </thead>
        <tbody>
            $row
        </tbody>
        </table>";

    $mpdf = new \Mpdf\Mpdf();
    // Load a stylesheet
    $stylesheet = file_get_contents('assets/mpdfstyletables.css'); 
    $mpdf->WriteHTML($stylesheet, 1); // The parameter 1 tells that this is css/style only and no body/html/text
    $mpdf->WriteHTML($html,2);
    $mpdf->Output();
    