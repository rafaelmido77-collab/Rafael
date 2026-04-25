<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-b from-blue-500 via-blue-400 to-emerald-400 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-[3rem] shadow-2xl p-10 w-full max-w-md text-center">
        
        <div class="flex justify-center mb-6">
            <div class="w-24 h-24 bg-emerald-700 rounded-full flex items-center justify-center overflow-hidden border-4 border-white shadow-sm">
                <span class="text-5xl">👨‍💻</span>
            </div>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-2">Login Admin</h1>
        <p class="text-gray-500 mb-8 text-sm">Aplikasi Perpustakaan Digital Sekolah</p>

        <form action="#" method="POST" class="space-y-4">
            <div>
                <input type="text" 
                       placeholder="Masukkan Username" 
                       class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 text-gray-700 placeholder-gray-400"
                       required>
            </div>
            
            <div>
                <input type="password" 
                       placeholder="Masukkan Password" 
                       class="w-full px-6 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 text-gray-700 placeholder-gray-400"
                       required>
            </div>

            <button type="submit" 
                    class="w-full bg-emerald-700 hover:bg-emerald-800 text-white font-bold py-4 rounded-2xl shadow-lg transition duration-300 transform active:scale-[0.98]">
                Login Sekarang
            </button>
        </form>

        <div class="mt-8">
            <a href="#" class="text-emerald-700 font-medium hover:underline text-sm">
                Login sebagai Anggota?
            </a>
        </div>
    </div>

</body>
</html>
