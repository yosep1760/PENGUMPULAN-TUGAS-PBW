<?php
include 'nav.php';

echo "<h3>1. Menentukan Kendaraan Berdasarkan Roda</h3>";

$jumlah_roda = 6;

switch ($jumlah_roda) {
    case 2:
        echo "Kendaraan beroda $jumlah_roda adalah Sepeda Motor atau Sepeda.";
        break;
    case 3:
        echo "Kendaraan beroda $jumlah_roda adalah Becak atau Bajaj.";
        break;
    case 4:
        echo "Kendaraan beroda $jumlah_roda adalah Mobil.";
        break;
    case 6:
    case 8:
        echo "Kendaraan beroda $jumlah_roda adalah Truk atau Bus.";
        break;
    default:
        echo "Jenis kendaraan dengan $jumlah_roda roda tidak diketahui/belum terdaftar.";
}
?>