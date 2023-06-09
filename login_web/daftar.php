<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Akun Pencari Kerja</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <style>

    @keyframes fade-in {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

    .fade-in {
        animation: fade-in 1s ease-in-out;
    }

        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 400px;
            margin: 50px auto;
        }
        
        h1 {
            text-align: center;
        }
        
        form {
            margin-top: 20px;
        }
        
        button {
            margin-top: 20px;
        }
        
        p {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body class="fade-in">
    <div class="container py-4">
        <h1 class="text-center mb-3">Pendaftaran Akun Pekerjaan</h1>
        <?php
        session_start();
        if (isset($_SESSION['registrasi_success'])) {
            $message = $_SESSION['registrasi_success'];
            echo '<div class="alert alert-success">' . $message . '</div>';
            unset($_SESSION['registrasi_success']);
        }
        ?>
        <form method="post" action="simpan_data.php">
            <div class="mb-2">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-2">
                <label for="perusahaan" class="form-label">Nomor Handphone</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-2">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-2">
                <label for="konfirmasi-password" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="konfirmasi-password" name="konfirmasi-password" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Daftar</button>
            </div>
        </form><br>
        <p class="text-center mt-2">Sudah punya akun? <a href="login_utama.php">Masuk disini</a></p>
    </div>
</body>
</html>
