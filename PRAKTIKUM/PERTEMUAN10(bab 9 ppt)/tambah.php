<?php
session_start();
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nim, $nama, $jurusan, $email);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Data berhasil ditambahkan!";
        $_SESSION['tipe'] = "success";
        header("Location: index.php");
        exit();
    } else {
        $error = "Gagal menyimpan data!";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card" style="max-width: 500px; margin: auto;">
        <div class="card-header bg-primary text-white">Tambah Data Mahasiswa</div>
        <div class="card-body">
            <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>