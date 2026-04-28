<?php
session_start();
require 'koneksi.php';

// Proses Hapus Data (DELETE)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $_SESSION['pesan'] = "Data berhasil dihapus!";
        $_SESSION['tipe'] = "success";
    } else {
        $_SESSION['pesan'] = "Gagal menghapus data!";
        $_SESSION['tipe'] = "danger";
    }
    $stmt->close();
    header("Location: index.php");
    exit();
}

// Fitur Pencarian (SELECT dengan WHERE LIKE)
$search = "";
if (isset($_GET['cari'])) {
    $search = $_GET['cari'];
    $cari_param = "%" . $search . "%";
    $stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE nama LIKE ? OR nim LIKE ? ORDER BY id DESC");
    $stmt->bind_param("ss", $cari_param, $cari_param);
} else {
    $stmt = $conn->prepare("SELECT * FROM mahasiswa ORDER BY id DESC");
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa - Tugas Pertemuan 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Data Mahasiswa</h2>

    <?php if (isset($_SESSION['pesan'])): ?>
        <div class="alert alert-<?= $_SESSION['tipe']; ?> alert-dismissible fade show">
            <?= $_SESSION['pesan']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php session_unset(); endif; ?>

    <div class="d-flex justify-content-between mb-3">
        <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
        <form action="" method="GET" class="d-flex">
            <input type="text" name="cari" class="form-control me-2" placeholder="Cari Nama/NIM..." value="<?= htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-outline-success">Cari</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($row = $result->fetch_assoc()): 
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nim']); ?></td>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['jurusan']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="index.php?hapus=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
            
            <?php if ($result->num_rows == 0): ?>
            <tr><td colspan="6" class="text-center">Data tidak ditemukan</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $stmt->close(); $conn->close(); ?>