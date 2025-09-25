<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | TugasKu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Boxicons -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center max-w-lg p-6 bg-white shadow-lg rounded-2xl">
        <div class="mb-6">
            <img src="{{ asset('assets/img/img-login.svg') }}" alt="TugasKu" class="w-48 mx-auto">
        </div>
        
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang di <span class="text-blue-500">TugasKu</span></h1>
        <p class="text-gray-600 mb-6">
            Aplikasi manajemen tugas kuliah Anda.  
            Mulai atur jadwal, kelola tugas, dan tetap produktif 🚀
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('login.form') }}" 
               class="flex items-center justify-center gap-2 px-6 py-3 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition">
                <i class="bx bx-log-in"></i> Sign In
            </a>
            <a href="{{ route('register.form') }}" 
               class="flex items-center justify-center gap-2 px-6 py-3 border border-blue-500 text-blue-500 font-medium rounded-lg hover:bg-blue-50 transition">
                <i class="bx bx-user-plus"></i> Sign Up
            </a>
        </div>
    </div>
</body>
</html>
