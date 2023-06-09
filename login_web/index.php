<!DOCTYPE html>
<html>
<head>
    <title>Pencari Kerja</title>
    <style>
    @keyframes fade-in {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    .fade-in {
        animation: fade-in 1s ease-in-out;
    }
</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>
<body class="fade-in">
<header class="bg-dark text-white py-3 ">
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

    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">Cari Pekerjaan</h2>
            <form class="row" method="GET" action="">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" placeholder="Kata Kunci" name="search">
                </div>
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" placeholder="Lokasi" name="location">
                </div>
                <div class="col-md-4 mb-3">
<select class="form-select" name="category">
        <option value="">Semua Kategori</option>
    <option <?php if (isset($searchCategory) && $searchCategory == 'IT') echo 'selected'; ?>>IT</option>
    <option <?php if (isset($searchCategory) && $searchCategory == 'Keuangan') echo 'selected'; ?>>Keuangan</option>
    <option <?php if (isset($searchCategory) && $searchCategory == 'Pemasaran') echo 'selected'; ?>>Pemasaran</option>
</select>





                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="submit"  value="Cari">Cari</button>
                </div>
            </form>
        </div>
    </section>
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

    // Mengatur jumlah pekerjaan yang ditampilkan per halaman
    $pekerjaanPerHalaman = 4;

    

    // Mengambil kata kunci pencarian, lokasi, dan kategori dari form
    $searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';
    $searchLocation = isset($_GET['location']) ? $_GET['location'] : '';
    $searchCategory = isset($_GET['category']) ? $_GET['category'] : '';

    // Membangun query pencarian
// Membangun query pencarian
$sql = "SELECT * FROM lowongan WHERE judul LIKE '%$searchKeyword%'";

if (!empty($searchLocation)) {
    $sql .= " AND lokasi LIKE '%$searchLocation%'";
}

if (!empty($searchCategory)) {
    $sql .= " AND kategori_id = '$searchCategory'";
}


    // Menghitung jumlah total pekerjaan
    $result = $koneksi->query($sql);
    $totalPekerjaan = $result->num_rows;

    // Menghitung jumlah halaman yang diperlukan
    $totalHalaman = ceil($totalPekerjaan / $pekerjaanPerHalaman);

    // Menentukan halaman saat ini
    $halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;

    // Menghitung indeks data awal dan akhir
    $indeksAwal = ($halamanAktif - 1) * $pekerjaanPerHalaman;
    $indeksAkhir = $indeksAwal + $pekerjaanPerHalaman;

    // Membangun query pencarian dengan batasan halaman
    $sql .= " LIMIT $indeksAwal, $pekerjaanPerHalaman";

    // Mengambil data pekerjaan sesuai halaman saat ini
    $result = $koneksi->query($sql);

    ?>
    <section class="py-5 bg-light">
        <div class="container">
        <?php
if (isset($_GET['submit']) && $_GET['submit'] == 'Cari') {
    echo '<h2 class="mb-4">Pekerjaan Yang ditemukan</h2>';
}
?>


            <div class="row">
                <?php
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-6 mb-4">';
                        echo '<div class="card h-100">';
                        echo '<div class="card-body d-flex flex-column">';
                        echo '<h3 class="card-title">' . $row['judul'] . '</h3>';
                        echo '<p class="card-text" style="font-style: italic; font-size: medium; color: #808080;">Kategori: ' . $row['kategori_id'] . '</p>';
                        echo '<p class="text-justify">' . $row['deskripsi'] . '</p>';
                        echo '<p class="card-text">Lokasi: ' . $row['lokasi'] . '</p>';
                        echo '<div class="mt-auto text-end">';
                        
                     
                        
                        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                            echo '<a href="lamaran.html" class="btn btn-primary">Lamar Sekarang</a>';
                        } else {
                            echo '<a href="login_utama.php" class="btn btn-primary">Lamar Sekarang</a>';
                        }
                        
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    
                    
                    

                    
                } else {
                    echo '<p>Tidak ada pekerjaan yang ditemukan.</p>';
                }
                ?>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <nav aria-label="Halaman Pekerjaan">
                        <ul class="pagination justify-content-center">
                            <?php
                            // Membuat tombol halaman
                            for ($i = 1; $i <= $totalHalaman; $i++) {
                                echo '<li class="page-item' . ($i == $halamanAktif ? ' active' : '') . '">';
                                echo '<a class="page-link" href="?page=' . $i . '&search=' . $searchKeyword . '&location=' . $searchLocation . '&category=' . $searchCategory . '">' . $i . '</a>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p class="m-0">Hak Cipta &copy; 2023 Pencari Kerja</p>
        </div>
    </footer>
</body>
</html>

<?php
// Menutup koneksi database
$koneksi->close();
?>
