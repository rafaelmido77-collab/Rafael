<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan Digital</title>
    <style>
        /* Mengatur dasar halaman */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, #a1c4fd 0%, #c2e9fb 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 25px;
            width: 90%;
            max-width: 400px;
            padding: 20px;
        }

        /* Styling Card */
        .card {
            background-color: #ffffff;
            border-radius: 25px;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Avatar / Emoji Style */
        .icon {
            font-size: 60px;
            margin-bottom: 15px;
            display: block;
        }

        .icon-img {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        /* Teks Judul dan Deskripsi */
        h2 {
            margin: 10px 0;
            color: #333;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        p {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 25px;
            padding: 0 10px;
        }

        /* Tombol Login */
        .btn-login {
            display: block;
            width: 100%;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 12px 0;
            border-radius: 12px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            color: #7a9eb3;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <div class="container">
        
        <div class="card">
            <div class="icon">👨‍💻</div> 
            <h2>ADMIN</h2>
            <p>Kelola buku, anggota, dan transaksi perpustakaan.</p>
            <a href="#" class="btn-login">Login Admin</a>
        </div>

        <div class="card">
            <div class="icon">👤</div>
            <h2>ANGGOTA</h2>
            <p>Cari buku favoritmu dan lihat history peminjaman.</p>
            <a href="#" class="btn-login">Login Anggota</a>
        </div>

    </div>

    <div class="footer">
        © 2026 Aplikasi Perpustakaan Digital
    </div>

</body>
</html>
