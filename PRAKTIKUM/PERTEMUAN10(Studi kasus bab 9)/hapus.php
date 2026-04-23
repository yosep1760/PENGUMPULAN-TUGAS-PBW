<?php 
include 'koneksi_db.php'; 

// Mengambil semua data buku dari database
$query = "SELECT * FROM Buku";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hapus Buku</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    
    <div class="container mt-4">
        <div class="alert alert-danger" role="alert">
            <strong>Perhatian!</strong> Pilih buku yang ingin Anda hapus dari sistem. Tindakan ini tidak dapat dibatalkan.
        </div>
        
        <h2>Daftar Buku untuk Dihapus</h2>

        <table class="table table-hover table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['ID'] ?></td>
                    <td><?php echo htmlspecialchars($row['Judul']) ?></td>
                    <td><?php echo htmlspecialchars($row['Penulis']) ?></td>
                    <td><?php echo $row['Tahun_terbit'] ?></td>
                    <td><?php echo $row['Stok'] ?></td>
                    <td>
                        <a href="proses_hapus.php?id=<?php echo $row['ID'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda sangat yakin ingin menghapus buku <?php echo htmlspecialchars($row['Judul']); ?>?')">Hapus Permanen</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>