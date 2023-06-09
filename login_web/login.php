<?php
session_start();

// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "loginadmin";

// Membuat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Mengambil data username dan password dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa keberadaan pengguna dengan username dan password yang cocok
$query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

// Menjalankan query
$result = $koneksi->query($query);

// Memeriksa apakah query berhasil dijalankan dan ditemukan pengguna
if ($result && $result->num_rows > 0) {
    // Mendapatkan data pengguna dalam bentuk asosiatif
    $data_pengguna = $result->fetch_assoc();

    // Menyimpan ID pengguna ke dalam session
    $_SESSION['id'] = $data_pengguna['id'];

    // Mengalihkan pengguna ke halaman profil
    header("Location: index.php");
    exit();
} else {
    // Jika username atau password tidak cocok, tampilkan pesan kesalahan
    header("Location: password_salah.php");
}

// Menutup koneksi database
$koneksi->close();
?>
