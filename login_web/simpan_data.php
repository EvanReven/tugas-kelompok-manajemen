<?php
session_start();

// Konfigurasi koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'loginadmin';

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Memeriksa apakah formulir pendaftaran telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan nilai dari input form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $usernames = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi-password'];
    $no_hp = $_POST['no_hp'];

    // Memeriksa apakah password dan konfirmasi password cocok
    if ($password !== $konfirmasi_password) {
        echo 'Konfirmasi password tidak cocok';
        exit;
    }

    // Membuat query untuk menyimpan data ke database
    $query = "INSERT INTO login (nama, email, username, password, no_hp) VALUES ('$nama', '$email', '$usernames', '$password', '$no_hp')";

    // Menjalankan query dan memeriksa apakah berhasil
    if (mysqli_query($koneksi, $query)) {
        $_SESSION['registrasi_success'] = 'Pendaftaran akun berhasil'; // Set notifikasi pendaftaran akun berhasil
        header('Location: daftar.php');
        exit;
    } else {
        echo 'Pendaftaran akun gagal: ' . mysqli_error($koneksi);
    }

    // Menutup koneksi database
    mysqli_close($koneksi);
}
?>
