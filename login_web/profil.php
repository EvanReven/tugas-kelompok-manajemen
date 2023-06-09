<!DOCTYPE html>
<html lang="en">
<head>
<script>
 function submitForm() {
 document.forms[0].submit();
 }
 </script>
     <style>
    @keyframes fade-in {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    .fade-in {
        animation: fade-in 1s ease-in-out;
    }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil</title>
    <!-- Menambahkan CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>

        body {
            
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        /* Kustomisasi Footer */
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>
<body class="fade-in">
    <!-- Header -->
    <header class="bg-dark text-white py-3">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
        <img src="icon/logo.png" alt="Icon" style="width: 30px; height: 30px; margin-right: 5px;">
            <a class="navbar-brand" href="#" style="font-size: 24px;">Pencari Kerja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link" href="profil.php" style="font-size: 18px;">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="font-size: 18px;">Pekerjaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login_utama.php" style="font-size: 18px;">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="daftar.php" style="font-size: 18px;">Daftar</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
    
</header>

<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center mb-4">Profil Pengguna</h2>
                    </div>
                    <div class="card-body col-md-7">
                        <!-- Konten Profil Pengguna -->
                    </div>
                    <?php
                        $host = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "loginadmin";

                        // Membuat koneksi
                        $koneksi = new mysqli($host, $username, $password, $database);

                        // Memeriksa koneksi
                        if ($koneksi->connect_error) {
                            die("Koneksi gagal: " . $koneksi->connect_error);
                        }

                        // Memulai session
                        session_start();

                        // Memeriksa apakah pengguna sudah login
                        if (!isset($_SESSION['id'])) {
                            header("Location: login_utama.php"); // Redirect ke halaman login jika belum login
                            exit();
                        }

                        // Mendapatkan data pengguna yang sedang login
                        $id_pengguna = $_SESSION['id'];

                        // Query untuk mendapatkan data pengguna berdasarkan ID
                        $query = "SELECT * FROM login WHERE id = $id_pengguna";
                        $query = "SELECT *, fotoPath FROM login WHERE id = $id_pengguna";

                        // Menjalankan query
                        $result = $koneksi->query($query);

                        // Memeriksa apakah query berhasil dijalankan
                        if ($result && $result->num_rows > 0) {
                            // Mendapatkan data pengguna dalam bentuk asosiatif
                            $data_pengguna = $result->fetch_assoc();
                            $filepath = $data_pengguna['fotoPath'];
                            
                            // Menampilkan data pengguna
                            echo "<div class='card-body col-lg-10 col-md-2'>";
                            echo "<div class='d-flex align-items-center'>";
                            echo "<img class='rounded-circle img-fluid' style='width: 150px; height: 150px;' src='" . $data_pengguna['fotoPath'] . "' alt='Foto Profil'>";
                            echo "<div class='ms-4'>";
                            echo "<p class='fw-bold pr-2 ms-2'>Nama : " . $data_pengguna['nama'] . "</p>";
                            echo "<p class='fw-bold pr-2 ms-2'>Username : " . $data_pengguna['username'] . "</p>";
                            echo "<p class='fw-bold pr-2 ms-2'>No HP : " . $data_pengguna['no_hp'] . "</p>";
                            echo "<p class='fw-bold pr-2 ms-2'>Email : " . $data_pengguna['email'] . "</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "<form class='d-flex align-items-center' method='POST' action='upload.php' enctype='multipart/form-data'>";
                            echo "<div class='input-group ms-4'>";
                            echo "<input type='file' id='photo' name='photo' accept='image/*' class='form-control d-none' onchange='submitForm()'>";
                            echo "<label for='photo' class='btn btn-primary'>Upload Foto</label>";
                            echo "</div>";
                            echo "</form>";
                            echo "</div>";
                            
                            
                            
                            } 
                            else {
                            echo "Gagal mendapatkan data pengguna.";
                        }

                        // Menutup koneksi
                        $koneksi->close();
                        ?>

                    <div class="card-footer text-end">
                        <form method="post" action="logout.php" >
                            <button type="submit" class="btn btn-danger" name="logout">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2023 Pencari Kerja. All rights reserved.</p>
    </div>

    <!-- Menambahkan Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
