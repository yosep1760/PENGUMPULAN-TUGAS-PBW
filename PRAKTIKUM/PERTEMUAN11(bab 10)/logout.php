<?php
// Memulai session agar bisa mengakses data session saat ini
session_start();

// Menghapus semua variabel session
session_unset();

// Menghancurkan session secara keseluruhan
session_destroy();

// Mengarahkan pengguna kembali ke halaman login dengan pesan sukses
header("Location: login.php?message=" . urlencode("Anda telah berhasil logout."));
exit;
?>