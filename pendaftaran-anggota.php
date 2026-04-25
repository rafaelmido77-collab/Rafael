<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota - Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#1a2e35] min-h-screen flex items-center justify-center p-4">

    <div class="bg-[#f8fafc] rounded-[2.5rem] shadow-2xl p-8 w-full max-w-sm text-center">
        
        <div class="flex justify-center mb-4">
            <div class="w-20 h-20 bg-[#22c55e] rounded-full flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-800/60" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-1.815-4.27C14.482 10.394 15.202 10 16 10a4 4 0 014 4v4h-4zM2 18v-3a4 4 0 014-4c.798 0 1.518.394 2.185 1.73A5.972 5.972 0 006 15v3H2z" />
                </svg>
            </div>
        </div>

        <h1 class="text-2xl font-bold text-gray-800">Pendaftaran Anggota</h1>
        <p class="text-gray-500 text-xs mt-1 mb-6">Aplikasi Perpustakaan Digital Sekolah</p>

        <form action="#" method="POST" class="space-y-3">
            <input type="text" placeholder="Masukkan NIS" 
                   class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-white text-gray-700 placeholder-gray-400">
            
            <input type="text" placeholder="Nama Lengkap" 
                   class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-white text-gray-700 placeholder-gray-400">
            
            <input type="text" placeholder="Username" 
                   class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-white text-gray-700 placeholder-gray-400">
            
            <input type="password" placeholder="Password" 
                   class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-white text-gray-700 placeholder-gray-400">

            <input type="text" placeholder="Kelas" 
                   class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 bg-white text-gray-700 placeholder-gray-400">

            <button type="submit" 
                    class="w-full bg-[#15803d] hover:bg-[#166534] text-white font-bold py-3.5 rounded-xl shadow-lg transition duration-300 mt-4">
                Daftar Sekarang
            </button>
        </form>

        <div class="mt-6 space-y-3 text-sm">
            <div class="flex items-center justify-center gap-2">
                <span class="text-blue-600">👤</span>
                <a href="#" class="text-[#15803d] font-semibold hover:underline">Login sebagai Admin</a>
            </div>
            <div class="flex items-center justify-center gap-2">
                <span class="text-blue-600">👥</span>
                <a href="#" class="text-[#15803d] font-semibold hover:underline">Login sebagai Anggota</a>
            </div>
        </div>
    </div>

</body>
</html>
