<?php

require("../config/db_sql.php");
require('../helper/QueryConverter.php');

$sql = "SELECT * FROM tb_berkas";
$result = $mysqli->query($sql);
$converter = new QueryConverter;
$berkas = $converter->toJson($result);
$sql = "SELECT * FROM tb_pengguna";
$result = $mysqli->query($sql);
$pengguna = $converter->toJson($result);
//grafik dokumen per bulan
$sql = "SELECT COUNT(*) as jumlah FROM tb_berkas WHERE tanggal LIKE ?";
$stmt = $mysqli->prepare($sql);
$bulan = [
    '2020-01%', '2020-02%', '2020-03%', '2020-04%', '2020-5%', '2020-06%', '2020-07%', '2020-08%',
    '2020-09%', '2020-10%', '2020-11%', '2020-12%'
];
$dataPerBulan = array();
for ($i = 0; $i <= 12; $i++) {
    # code...
    $tempBulan = $bulan[$i];
    $stmt->bind_param('s', $tempBulan);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $dataPerBulan[$i] = $data;
}
$stmt->close();
//grafik jumlah dokumen per divisi
$sql = "SELECT tb_divisi.id_divisi, tb_divisi.divisi, tb_pengguna.id_pengguna, tb_pengguna.id_divisi, tb_berkas.id_pengguna, 
COUNT(divisi) AS jumlahdokumen FROM tb_divisi, tb_pengguna, tb_berkas 
WHERE tb_divisi.id_divisi = tb_pengguna.id_divisi AND tb_pengguna.id_pengguna = tb_berkas.id_pengguna
GROUP BY divisi";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$jumlahDokumenPerDivisi = $stmt->get_result()->fetch_assoc();
$jumlahDokumen = array();
foreach($jumlahDokumenPerDivisi as $jum) {
    echo $jum;
}
?>
