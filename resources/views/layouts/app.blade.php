<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    {{-- Include Navbar --}}
    @include('layouts.navbar')

    <div class="container">
        <div class="sidebar">
            {{-- Include Sidebar --}}
            @include('layouts.sidebar')
        </div>
        <div class="content">
            {{-- Isi konten page --}}
            @yield('content')
        </div>
    </div>
</body>
</html>