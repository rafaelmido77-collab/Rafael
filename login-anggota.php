<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Anggota - Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#1e3a8a] min-h-screen flex items-center justify-center p-6">

    <div class="bg-white rounded-[2.5rem] shadow-xl p-8 w-full max-w-sm text-center">
        
        <div class="flex justify-center mb-4">
            <div class="w-20 h-20 bg-[#22c55e] rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-900/50" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <h1 class="text-2xl font-bold text-gray-800">Login Anggota</h1>
        <p class="text-gray-500 text-xs mt-1 mb-6">Aplikasi Perpustakaan Digital Sekolah</p>

        <form action="#" method="POST" class="space-y-3">
            <input type="text" 
                   placeholder="Masukkan Username" 
                   class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-gray-600 placeholder-gray-400">
            
            <input type="password" 
                   placeholder="Masukkan Password" 
                   class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-gray-600 placeholder-gray-400">

            <button type="submit" 
                    class="w-full bg-[#15803d] hover:bg-[#166534] text-white font-semibold py-3 rounded-xl shadow-md transition duration-200 mt-2">
                Login Sekarang
            </button>
        </form>

        <div class="mt-8 space-y-3 text-sm">
            <div class="flex items-center justify-center gap-2">
                <span>💻</span>
                <a href="#" class="text-[#15803d] font-medium hover:underline">Login sebagai Admin</a>
            </div>
            <div class="flex items-center justify-center gap-2">
                <span>👥</span>
                <a href="#" class="text-[#15803d] font-medium hover:underline">Daftar Anggota Baru</a>
            </div>
        </div>
    </div>

</body>
</html>
