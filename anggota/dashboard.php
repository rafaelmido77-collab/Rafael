<?php
include '../koneksi.php';
session_start();
if (empty($_SESSION['id_anggota'])) {
    header("location:../login-anggota.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Anggota - Perpustakaan Digital</title>
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
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding-bottom: 30px;
        }

        /* Navbar Styling */
        .navbar-modern {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            border-radius: 0 0 20px 20px;
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Card Styling */
        .card-glass {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card-glass:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
        }

        .book-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Table Styling */
        .table-modern {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .table-modern thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .table-modern tbody tr:hover {
            background-color: #f8f9ff;
        }

        /* Button Styling */
        .btn-custom {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 5px;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Search Box */
        .search-box {
            background: white;
            border-radius: 50px;
            padding: 5px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .search-box input {
            border: none;
            border-radius: 50px;
            padding: 12px 20px;
            outline: none;
        }

        .search-box button {
            border-radius: 50px;
            padding: 10px 30px;
        }

        /* Welcome Section */
        .welcome-banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
        }

        /* Badge Styling */
        .badge-custom {
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Section Title */
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #667eea;
            display: inline-block;
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
    <!-- Navbar Modern -->
    <nav class="navbar navbar-modern mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-book-reader me-2"></i>
                Perpustakaan Digital
            </a>
            <div class="ms-auto d-flex gap-2">
                <span class="badge bg-primary rounded-pill px-3 py-2">
                    <i class="fas fa-user me-1"></i> <?= htmlspecialchars($_SESSION['nama_anggota']); ?>
                </span>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Menu Navigasi -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
            <a href="dashboard.php" class="btn btn-primary btn-custom">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="?halaman=history" class="btn btn-info btn-custom text-white">
                <i class="fas fa-history me-2"></i>History Peminjaman
            </a>
            <a href="logout.php" class="btn btn-danger btn-custom">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </div>

        <!-- Konten Utama -->
        <div class="card-glass p-4">
            <?php
            $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : "";
            
            if (!empty($halaman) && file_exists($halaman . ".php")) {
                include $halaman . ".php";
            } else {
            ?>
                <!-- Welcome Banner -->
                <div class="welcome-banner text-center">
                    <i class="fas fa-buku-cap fa-3x mb-3"></i>
                    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['nama_anggota']); ?>! 👋</h2>
                    <p class="mb-0">Nikmati kemudahan mengakses koleksi buku perpustakaan secara digital</p>
                </div>

                <!-- Search Box -->
                <div class="row justify-content-center mb-5">
                    <div class="col-md-8">
                        <form action="?halaman=cari" method="post" class="search-box d-flex">
                            <input type="text" name="kunci" class="form-control flex-grow-1" 
                                   placeholder="🔍 Cari judul buku yang ingin Anda baca..." required>
                            <button type="submit" class="btn btn-primary ms-2">
                                <i class="fas fa-search me-2"></i>Cari
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Daftar Buku yang Dipinjam -->
                <?php
                $query_peminjaman = "SELECT * FROM transaksi, buku WHERE buku.id_buku=transaksi.id_buku 
                                     AND transaksi.id_anggota='$_SESSION[id_anggota]' 
                                     AND status_transaksi='peminjaman'";
                $data_peminjaman = mysqli_query($koneksi, $query_peminjaman);
                $jumlah_peminjaman = mysqli_num_rows($data_peminjaman);
                
                if ($jumlah_peminjaman > 0) {
                ?>
                    <div class="mb-5">
                        <h4 class="section-title">
                            <i class="fas fa-book me-2"></i>Buku yang Sedang Dipinjam
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-modern table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    mysqli_data_seek($data_peminjaman, 0);
                                    foreach ($data_peminjaman as $peminjaman) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <strong><?= htmlspecialchars($peminjaman['judul_buku']); ?></strong>
                                            </td>
                                            <td>
                                                <i class="fas fa-calendar-alt me-1"></i>
                                                <?= date('d/m/Y', strtotime($peminjaman['tgl_pinjam'])); ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-sm" 
                                                   href="?halaman=pengembalian&id=<?= $peminjaman['id_transaksi'] ?>&id_buku=<?= $peminjaman['id_buku'] ?>"
                                                   onclick="return confirm('Kembalikan buku <?= addslashes($peminjaman['judul_buku']); ?>?')">
                                                    <i class="fas fa-undo-alt me-1"></i>Kembalikan
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>

                <!-- Daftar Semua Buku -->
                <div>
                    <h4 class="section-title">
                        <i class="fas fa-book-open me-2"></i>Koleksi Buku Perpustakaan
                    </h4>
                    <div class="row mt-3">
                        <?php
                        $data_buku = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id_buku DESC");
                        if (mysqli_num_rows($data_buku) > 0) {
                            foreach ($data_buku as $buku) { ?>
                                <div class="col-md-3 col-sm-6">
                                    <div class="book-card">
                                        <div class="text-center mb-3">
                                            <i class="fas fa-book fa-3x" style="color: #667eea;"></i>
                                        </div>
                                        <h6 class="fw-bold text-center"><?= htmlspecialchars($buku['judul_buku']); ?></h6>
                                        <hr>
                                        <p class="mb-1">
                                            <i class="fas fa-user-edit me-2"></i>
                                            <strong>Pengarang:</strong> <?= htmlspecialchars($buku['pengarang']); ?>
                                        </p>
                                        <p class="mb-3">
                                            <i class="fas fa-calendar me-2"></i>
                                            <strong>Tahun:</strong> <?= $buku['tahun_terbit']; ?>
                                        </p>
                                        
                                        <?php if ($buku['status'] == "tersedia") { ?>
                                            <span class="badge bg-success badge-custom mb-3 d-block text-center">
                                                <i class="fas fa-check-circle me-1"></i>Tersedia
                                            </span>
                                            <a href="?halaman=peminjaman&id=<?= $buku['id_buku'] ?>" 
                                               class="btn btn-primary btn-sm w-100"
                                               onclick="return confirm('Pinjam buku <?= addslashes($buku['judul_buku']); ?>?')">
                                                <i class="fas fa-hand-holding-heart me-1"></i>Pinjam Buku
                                            </a>
                                        <?php } else { ?>
                                            <span class="badge bg-danger badge-custom mb-3 d-block text-center">
                                                <i class="fas fa-times-circle me-1"></i>Dipinjam
                                            </span>
                                            <button class="btn btn-secondary btn-sm w-100" disabled>
                                                <i class="fas fa-ban me-1"></i>Tidak Tersedia
                                            </button>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Belum ada buku dalam koleksi perpustakaan
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

    <footer>
        <p class="mb-0">
            <i class="fas fa-copyright me-1"></i> <?= date('Y'); ?> Perpustakaan Digital
           
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>