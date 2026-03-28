<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Praktikum - Hitung Nilai</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .result { border: 1px solid black; padding: 15px; width: 300px; margin-top: 20px; }
    </style>
</head>
<body>

    <h2>Form Input Nilai Mahasiswa</h2>
    <form method="post" action="">
        Nama: <input type="text" name="nama" required><br><br>
        Nilai: <input type="number" name="nilai" required><br><br>
        <input type="submit" name="proses_nilai" value="Proses">
    </form>

    <?php
    // Mengecek apakah tombol proses ditekan
    if (isset($_POST['proses_nilai'])) {
        $nama = $_POST['nama'];
        $nilai = $_POST['nilai'];
        $predikat = "";
        $status = "";

        // Menentukan Predikat berdasarkan rentang nilai menggunakan if-elseif-else
        if ($nilai >= 85 && $nilai <= 100) {
            $predikat = "A";
            $status = "Lulus";
        } elseif ($nilai >= 75 && $nilai <= 84) {
            $predikat = "B";
            $status = "Lulus";
        } elseif ($nilai >= 65 && $nilai <= 74) {
            $predikat = "C";
            $status = "Lulus";
        } elseif ($nilai >= 50 && $nilai <= 64) {
            $predikat = "D";
            $status = "Tidak Lulus";
        } elseif ($nilai >= 0 && $nilai <= 49) {
            $predikat = "E";
            $status = "Tidak Lulus";
        } else {
            $predikat = "Tidak valid";
            $status = "Tidak valid";
        }

        // Menampilkan Luaran
        echo "<div class='result'>";
        echo "<b>Luaran yang diharapkan</b><br><br>";
        echo "Nama : " . htmlspecialchars($nama) . "<br>";
        echo "Nilai : " . htmlspecialchars($nilai) . "<br>";
        echo "Predikat : " . $predikat . "<br>";
        echo "Status : " . $status . "<br>";
        echo "</div>";
    }
    ?>

</body>
</html>