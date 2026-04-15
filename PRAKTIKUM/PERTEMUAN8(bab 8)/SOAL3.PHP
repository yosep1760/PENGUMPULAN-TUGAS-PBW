<?php
include 'nav.php';

echo "<h3>3. Daftar Nama Hewan</h3>";
$daftar_hewan = ["Kucing", "Anjing", "Harimau", "Gajah", "Jerapah", "Panda"];
echo "<ul>";
foreach ($daftar_hewan as $hewan) {
    echo "<li>" . $hewan . "</li>";
}
echo "</ul>";
?>