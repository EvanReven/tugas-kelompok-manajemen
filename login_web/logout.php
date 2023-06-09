<?php
// Mulai sesi (pastikan ini sudah ada di awal file)
session_start();

// Menghapus semua data sesi
session_unset();

// Menghancurkan sesi
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: index.php");
exit();
?>
