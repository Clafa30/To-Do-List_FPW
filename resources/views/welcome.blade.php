<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TugasKu: Aplikasi manajemen tugas kuliah untuk mahasiswa. Kelola tugasmu dengan mudah dan tetap produktif!">
    <title>TugasKu | Company Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1506784365847-bbadad4e01f6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
        }
        .section-bg {
            background-color: #F0F4F8; /* Light blue background */
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #4A90E2;
        }
        .btn-primary:hover {
            background-color: #357ABD;
        }
        .btn-accent {
            border-color: #FF6F61;
            color: #FF6F61;
        }
        .btn-accent:hover {
            background-color: #FF6F61;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="fixed w-full bg-white shadow-lg z-50">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <a href="#home" class="text-2xl font-bold text-blue-500">
                <img src="{{ asset('img/Tugasku.png') }}" alt="TugasKu Logo" class="inline-block w-10 h-10 mr-2">TugasKu
            </a>
            <ul class="hidden md:flex space-x-6">
                <li><a href="#home" class="hover:text-blue-500 font-medium">Home</a></li>
                <li><a href="#about" class="hover:text-blue-500 font-medium">About Us</a></li>
                <li><a href="#products" class="hover:text-blue-500 font-medium">Products</a></li>
                <li><a href="#team" class="hover:text-blue-500 font-medium">Team</a></li>
                <li><a href="#contact" class="hover:text-blue-500 font-medium">Contact</a></li>
            </ul>
            <div class="flex space-x-3">
                <a href="{{ route('login.form') }}" class="px-4 py-2 btn-primary text-white rounded-lg hover:bg-blue-600 transition">Sign In</a>
                <a href="{{ route('register.form') }}" class="px-4 py-2 btn-accent border rounded-lg hover:bg-blue-50 transition">Sign Up</a>
            </div>
            <!-- Mobile Menu Button -->
            <button class="md:hidden text-gray-800 focus:outline-none" id="menu-toggle">
                <i class='bx bx-menu text-2xl'></i>
            </button>
        </div>
    </nav>

    <!-- Home -->
    <section id="home" class="flex items-center justify-center min-h-screen hero-bg text-white">
        <div class="text-center max-w-3xl px-6">
            <img src="{{ asset('img/Tugasku.png') }}" alt="TugasKu Logo" class="w-24 mx-auto mb-6">
            <h1 class="text-5xl font-bold mb-4">Tugas Kuliah Jadi Mudah dengan <span class="text-blue-500">TugasKu</span></h1>
            <p class="text-lg text-gray-200 mb-8">
                Atur tugas kuliahmu, pantau deadline, dan tetap produktif dengan TugasKu. Aplikasi sederhana yang membantu mahasiswa mengelola waktu dengan lebih baik! 🌟
            </p>
            <a href="{{ route('register.form') }}" class="px-6 py-3 btn-primary text-white rounded-lg hover:bg-blue-600 transition">Mulai Sekarang!</a>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="flex items-center justify-center min-h-screen section-bg">
        <div class="container mx-auto px-6">
            <div class="max-w-5xl flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0 md:space-x-12">
                <div class="text-center md:text-left w-full md:w-1/2">
                    <h2 class="text-4xl font-bold mb-6 text-gray-900">Tentang Kami</h2>
                    <p class="text-lg text-gray-700 mb-8">
                        TugasKu adalah aplikasi manajemen tugas berbasis Laravel yang dirancang untuk mahasiswa. Kami hadir untuk membantu kamu mengatasi kekacauan jadwal kuliah dan tugas dengan antarmuka yang intuitif dan fitur yang praktis.
                    </p>
                    <a href="#contact" class="px-6 py-3 btn-accent border rounded-lg hover:bg-blue-50 transition">Hubungi Kami</a>
                </div>
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('img/TentangKami.png') }}" alt="Tentang Kami" class="w-full h-auto max-h-96 object-contain rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </section>

    <!-- Products -->
    <section id="products" class="flex items-center justify-center min-h-screen bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6 text-gray-800">Produk Kami</h2>
            <div class="bg-white shadow-lg rounded-xl p-8 max-w-lg mx-auto card-hover">
                <img src="https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="TugasKu To-Do List Screenshot" class="w-full h-64 object-cover rounded-lg mb-6">
                <h3 class="text-2xl font-semibold mb-3 text-blue-500">TugasKu - To Do List</h3>
                <p class="text-gray-600 mb-6">
                    Kelola tugas kuliahmu dengan mudah! Catat, atur, dan lacak semua tugas serta deadline dalam satu tempat. TugasKu membuatmu tetap terorganisir dan fokus pada tujuan akademikmu.
                </p>
                <a href="{{ route('register.form') }}" class="px-6 py-3 btn-primary text-white rounded-lg hover:bg-blue-600 transition">Coba Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section id="team" class="flex items-center justify-center min-h-screen section-bg">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-12 text-gray-800">Tim Kami</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="bg-white p-6 shadow-lg rounded-xl card-hover">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Anggota 1" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-blue-500">Rafaisya Dwi Adrianto</h4>
                    <p class="text-gray-500">Rektor</p>
                    <p class="text-gray-600 text-sm mt-2">Mengkoordinasikan tim untuk menghadirkan TugasKu yang inovatif.</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-xl card-hover">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Anggota 2" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-blue-500">Dimas Agung Fitriyanto</h4>
                    <p class="text-gray-500">Giga Ched</p>
                    <p class="text-gray-600 text-sm mt-2">Membangun sistem yang andal untuk pengalaman terbaik.</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-xl card-hover">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Anggota 3" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-blue-500">Muhammad Firdaus.A</h4>
                    <p class="text-gray-500">Progaymer Handal</p>
                    <p class="text-gray-600 text-sm mt-2">Merancang antarmuka yang menarik dan mudah digunakan.</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-xl card-hover">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Anggota 4" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-blue-500">Yayan Mulyana</h4>
                    <p class="text-gray-500">Kang Poci</p>
                    <p class="text-gray-600 text-sm mt-2">Menciptakan desain yang intuitif untuk pengguna.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="flex items-center justify-center min-h-screen bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6 text-gray-800">Hubungi Kami</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                Ada pertanyaan atau saran? Kirim pesan kepada kami, dan tim TugasKu akan segera merespons!
            </p>
            <form action="#" method="POST" class="max-w-lg mx-auto text-left space-y-6">
                <input type="text" placeholder="Nama" class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                <input type="email" placeholder="Email" class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                <textarea placeholder="Pesan" rows="5" class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500" required></textarea>
                <button type="submit" class="w-full btn-primary text-white py-3 rounded-lg hover:bg-blue-600 transition">Kirim Pesan</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 text-center">
        <div class="container mx-auto px-6">
            <p class="text-lg">&copy; {{ date('Y') }} TugasKu. All Rights Reserved.</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#" class="text-gray-300 hover:text-blue-500"><i class='bx bxl-instagram text-2xl'></i></a>
                <a href="#" class="text-gray-300 hover:text-blue-500"><i class='bx bxl-twitter text-2xl'></i></a>
                <a href="#" class="text-gray-300 hover:text-blue-500"><i class='bx bxl-linkedin text-2xl'></i></a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile Menu Toggle
        document.getElementById('menu-toggle').addEventListener('click', () => {
            document.querySelector('ul').classList.toggle('hidden');
        });

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>

</body>
</html>