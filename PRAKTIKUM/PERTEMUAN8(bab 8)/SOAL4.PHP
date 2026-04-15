<?php
include 'nav.php';

echo "<h3>4. Cek Ganjil Genap</h3>";
$angka = 7;
$status = ($angka % 2 == 0) ? "Genap" : "Ganjil";
echo "Angka <strong>$angka</strong> adalah bilangan <strong>$status</strong>.";
?>