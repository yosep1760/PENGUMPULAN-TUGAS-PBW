<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Praktikum - Diskon UKT</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .result { border: 2px solid black; padding: 15px; width: 450px; margin-top: 20px; }
        .result p { margin: 5px 0; }
    </style>
</head>
<body>

    <h2>Form Pembayaran UKT Mahasiswa</h2>
    <form method="post" action="">
        NPM: <input type="text" name="npm" required><br><br>
        Nama: <input type="text" name="nama" required><br><br>
        Prodi: <input type="text" name="prodi" required><br><br>
        Semester: <input type="number" name="semester" required><br><br>
        Biaya UKT (Rp): <input type="number" name="ukt" required><br><br>
        <input type="submit" name="proses_diskon" value="Proses">
    </form>

    <?php
    if (isset($_POST['proses_diskon'])) {
        $npm = $_POST['npm'];
        $nama = strtoupper($_POST['nama']); // strtoupper agar nama menjadi huruf kapital semua
        $prodi = strtoupper($_POST['prodi']);
        $semester = $_POST['semester'];
        $ukt = $_POST['ukt'];
        
        $persen_diskon = 0;

        // Logika penentuan diskon
        // Cek kondisi yang paling spesifik/besar terlebih dahulu
        if ($ukt >= 5000000 && $semester > 8) {
            $persen_diskon = 15;
        } elseif ($ukt >= 5000000) {
            $persen_diskon = 10;
        }

        // Perhitungan nilai diskon dan total yang harus dibayar
        $nilai_diskon = ($persen_diskon / 100) * $ukt;
        $total_bayar = $ukt - $nilai_diskon;

        // Menampilkan Luaran sesuai format di modul
        echo "<div class='result'>";
        echo "<p>Luaran yang diharuskan</p>";
        echo "<hr>";
        echo "<p>NPM : " . htmlspecialchars($npm) . "</p>";
        echo "<p>NAMA : " . htmlspecialchars($nama) . "</p>";
        echo "<p>PRODI : " . htmlspecialchars($prodi) . "</p>";
        echo "<p>SEMESTER : " . htmlspecialchars($semester) . "</p>";
        echo "<p>BIAYA UKT : Rp. " . number_format($ukt, 0, ',', '.') . ",-</p>";
        echo "<p>DISKON : " . $persen_diskon . "% (otomatis ditentukan oleh if)</p>";
        echo "<p>YANG HARUS DIBAYAR : Rp. " . number_format($total_bayar, 0, ',', '.') . ",- (otomatis ditentukan oleh if)</p>";
        echo "</div>";
    }
    ?>

</body>
</html>