<?php
session_start();
if (empty($_SESSION['id_admin'])) {
    header("Location:../login-admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard admin - Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .navbar-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            border-radius: 0 0 20px 20px;
        }

        .nav-link-custom {
            transition: all 0.3s ease;
            border-radius: 10px;
            padding: 10px 20px;
            margin: 0 5px;
            font-weight: 500;
        }

        .nav-link-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .card-welcome {
            background: white;
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .welcome-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 20px 20px 0 0;
        }

        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-left: 4px solid;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .content-area {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-top: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            min-height: 400px;
        }

        .btn-custom {
            border-radius: 10px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .greeting-text {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            font-size: 1rem;
        }

        .icon-feature {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-glass mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-book-open me-2"></i>
                Perpustakaan Digital
            </a>
            <div class="ms-auto">
                <span class="badge bg-primary rounded-pill me-3">
                    <i class="fas fa-user me-1"></i> <?= htmlspecialchars($_SESSION['nama_admin']); ?>
                </span>
            </div>
        </div>
    </nav>

    <div class="container mb-4">
        <!-- Menu Navigasi -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
            <a href="dashboard.php" class="btn btn-primary btn-custom">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="?halaman=data_buku" class="btn btn-success btn-custom">
                <i class="fas fa-book me-2"></i>Buku
            </a>
            <a href="?halaman=data_anggota" class="btn btn-info btn-custom text-white">
                <i class="fas fa-users me-2"></i>Anggota
            </a>
            <a href="?halaman=data_peminjaman" class="btn btn-warning btn-custom text-white">
                <i class="fas fa-exchange-alt me-2"></i>Peminjaman
            </a>
            <a href="logout.php" class="btn btn-danger btn-custom">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </div>

        <!-- Konten Utama -->
        <div class="content-area">
            <?php
            $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';
            
            if (!empty($halaman) && file_exists($halaman . ".php")) {
                include $halaman . ".php";
            } else {
            ?>
                <div class="welcome-header text-center mb-4">
                    <i class="fas fa-chalkboard-teacher icon-feature"></i>
                    <h1 class="greeting-text">Selamat Datang, <?= htmlspecialchars($_SESSION['nama_admin']); ?>! 👋</h1>
                    <p class="subtitle">Senang bertemu dengan Anda kembali</p>
                </div>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="stats-card" style="border-left-color: #667eea;">
                            <i class="fas fa-book fa-2x mb-3" style="color: #667eea;"></i>
                            <h3>Total Buku</h3>
                            <p class="display-4 fw-bold" id="totalBuku">-</p>
                            <small class="text-muted">Koleksi perpustakaan</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stats-card" style="border-left-color: #48c774;">
                            <i class="fas fa-users fa-2x mb-3" style="color: #48c774;"></i>
                            <h3>Total Anggota</h3>
                            <p class="display-4 fw-bold" id="totalAnggota">-</p>
                            <small class="text-muted">Anggota terdaftar</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stats-card" style="border-left-color: #ffa502;">
                            <i class="fas fa-book-reader fa-2x mb-3" style="color: #ffa502;"></i>
                            <h3>Peminjaman Aktif</h3>
                            <p class="display-4 fw-bold" id="totalPeminjaman">-</p>
                            <small class="text-muted">Sedang dipinjam</small>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4 pt-3">
                    <p class="text-muted" style="line-height: 1.8;">
                        <i class="fas fa-info-circle me-2"></i>
                        Aplikasi Perpustakaan Sekolah Digital merupakan sistem berbasis web 
                        yang dirancang untuk membantu pengelolaan data buku, peminjaman, 
                        dan pengembalian secara lebih mudah, cepat, dan terorganisir.
                    </p>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="alert alert-info border-0 rounded-3">
                            <i class="fas fa-lightbulb me-2"></i>
                            <strong>Tips:</strong> Gunakan menu di atas untuk mengelola data perpustakaan
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-success border-0 rounded-3">
                            <i class="fas fa-chart-line me-2"></i>
                            <strong>Statistik:</strong> buku jendela duniya
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <footer>
        <p class="mb-0">&copy; <?= date('Y'); ?> Perpustakaan Digital | Sistem Informasi Perpustakaan Modern</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simulasi pengambilan data statistik (Anda bisa mengganti dengan AJAX request ke database)
        document.getElementById('totalBuku').textContent = Math.floor(Math.random() * 500) + 100;
        document.getElementById('totalAnggota').textContent = Math.floor(Math.random() * 200) + 50;
        document.getElementById('totalPeminjaman').textContent = Math.floor(Math.random() * 50) + 10;
    </script>
</body>

</html>