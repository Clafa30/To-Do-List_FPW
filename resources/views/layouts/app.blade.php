<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sistem Pengelola Tugas Kuliah') }}</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Custom Style --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- Laravel Vite (opsional kalau kamu juga pakai app.css/app.js dari vite) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- Tempat untuk konten dari setiap halaman --}}
    @yield('content')

    {{-- Bootstrap Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Script tambahan tiap halaman --}}
    @yield('scripts')
</body>
</html>
