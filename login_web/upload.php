<?php
session_start(); // Memulai sesi

// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "loginadmin";

$koneksi = new mysqli($host, $username, $password, $database);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Memeriksa apakah ada file yang diunggah
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $photo = $_FILES['photo'];
    $filename = $photo['name'];
    $filepath = 'uploads/' . $filename;

    // Memindahkan file ke folder tujuan
    if (move_uploaded_file($photo['tmp_name'], $filepath)) {
        // Mengambil ID pengguna yang sedang login (misalnya menggunakan session)
        $id_pengguna = $_SESSION['id'];

        // Memperbarui kolom 'fotoPath' pada tabel 'login' dengan alamat file foto
        $query = "UPDATE login SET fotoPath='$filepath' WHERE id=$id_pengguna";
        if ($koneksi->query($query) === TRUE) {
            echo "Foto berhasil diunggah.";
        } else {
            echo "Gagal mengunggah foto: " . $koneksi->error;
        }
    } else {
        echo "Gagal memindahkan foto ke folder tujuan.";
    }
}

// Mengambil data foto dari database
if (isset($_SESSION['id'])) {
    $id_pengguna = $_SESSION['id'];
    $query = "SELECT fotoPath FROM login WHERE id=$id_pengguna";
    $result = $koneksi->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filepath = $row['fotoPath'];

        header("Location: profil.php");
        return;
    } else {
        echo "Tidak ada foto yang ditemukan.";
    }
} else {
    echo "Tidak ada pengguna yang sedang login.";
}

$koneksi->close();
?>
