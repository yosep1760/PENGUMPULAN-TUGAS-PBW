<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perhitungan Total Pembelian</title>
    <style>
        .box {
            border: 2px solid black;
            padding: 20px;
            width: 450px;
            font-family: "Times New Roman", Times, serif;
        }
        h2 {
            margin-top: 0;
            margin-bottom: 10px;
        }
        hr {
            border: 1px solid black;
            margin-bottom: 15px;
        }
        p {
            margin: 2px 0;
        }
    </style>
</head>
<body>

<?php
// 1. Konstanta untuk pajak sebesar 10%
define("PAJAK", 0.10);

// 2. Informasi harga barang disimpan dalam array
$barang = [
    "nama" => "Keyboard",
    "harga" => 150000
];

// 3. Jumlah yang dibeli menggunakan variabel
$jumlah_beli = 2;

// 4. Perhitungan total harga menggunakan operator aritmatika
$total_sebelum_pajak = $barang["harga"] * $jumlah_beli;
$nilai_pajak = $total_sebelum_pajak * PAJAK;
$total_bayar = $total_sebelum_pajak + $nilai_pajak;
?>

    <div class="box">
        <h2>Perhitungan Total Pembelian (Dengan Array)</h2>
        <hr>
        <p>Nama Barang: <?php echo $barang["nama"]; ?></p>
        <p>Harga Satuan: Rp <?php echo number_format($barang["harga"], 0, ',', '.'); ?></p>
        <p>Jumlah Beli: <?php echo $jumlah_beli; ?></p>
        <p>Total Harga (Sebelum Pajak): Rp <?php echo number_format($total_sebelum_pajak, 0, ',', '.'); ?></p>
        <p>Pajak (10%): Rp <?php echo number_format($nilai_pajak, 0, ',', '.'); ?></p>
        <p><b>Total Bayar: Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></b></p>
    </div>

</body>
</html>