<?php
session_start();
require 'koneksi.php';

// Ambil data berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
    
    if (!$data) {
        header("Location: index.php");
        exit();
    }
}

// Proses Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_update = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE mahasiswa SET nim=?, nama=?, jurusan=?, email=? WHERE id=?");
    $stmt->bind_param("ssssi", $nim, $nama, $jurusan, $email, $id_update);

    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Data berhasil diperbarui!";
        $_SESSION['tipe'] = "success";
        header("Location: index.php");
        exit();
    } else {
        $error = "Gagal memperbarui data!";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card" style="max-width: 500px; margin: auto;">
        <div class="card-header bg-warning">Edit Data Mahasiswa</div>
        <div class="card-body">
            <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <div class="mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?= htmlspecialchars($data['nim']); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="<?= htmlspecialchars($data['jurusan']); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($data['email']); ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>