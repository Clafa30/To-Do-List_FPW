<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
<<<<<<< HEAD
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>To Do List</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Pre-header Starts -->
  <div class="pre-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8 col-7">
          <ul class="info">
            <li><a href="#"><i class="fa fa-envelope"></i>todolist@company.com</a></li>
            <li><a href="#"><i class="fa fa-phone"></i>0812-3456-78910</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-sm-4 col-5">
        </div>
      </div>
    </div>
  </div>
  <!-- Pre-header End -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="assets/images/tugasku-logo.jpg" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#about">About</a></li>
              <li class="scroll-to-section"><a href="#services">Services</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Our Team</a></li>
              <li class="scroll-to-section"><a href="#contact">Contact</a></li> 
              <li class="scroll-to-section"><div class="border-first-button"> <a href="{{ route('login.form') }}">Get Started</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h6>PLAN. PRIORITIZE. PERFORM.</h6>
                    <h2>Simplify Your Life with To-Do List</h2>
                    <p>Turn chaos into clarity by organizing all your tasks in one app. Boost your productivity, accomplish goals faster,and enjoy a more balanced, stress-free day.</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="border-first-button scroll-to-section">
                      <a href="{{ route('login.form') }}">Get Started</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/home.png" alt="">
              </div>
=======
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TugasKu: Aplikasi manajemen tugas kuliah untuk mahasiswa. Kelola tugasmu dengan mudah dan tetap produktif!">
    <title>TugasKu | Company Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #E0F2FE; /* Consistent light blue background */
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        /* Animated Background Pattern */
        .animated-bg {
            background-image: linear-gradient(to bottom, #E0F2FE, #E0F2FE), 
                             url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="20" viewBox="0 0 100 20"><line x1="0" y1="10" x2="100" y2="10" stroke="%231E3A8A" stroke-width="0.5" opacity="0.3"/></svg>');
            background-size: 100% 20px;
            background-position: 0 0;
            animation: scrollBackground 10s linear infinite; /* Scrolling animation */
        }
        @keyframes scrollBackground {
            0% { background-position: 0 0; }
            100% { background-position: 0 -20px; }
        }
        .hero-bg {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.9), rgba(59, 130, 246, 0.9));
            animation: fadeIn 1.5s ease-in-out;
            position: relative;
            z-index: 1;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }
        /* Responsive Buttons */
        .btn-primary {
            background-color: #3B82F6;
            color: white;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1E3A8A;
            transform: scale(1.05);
        }
        .btn-accent {
            background-color: #FBBF24;
            color: #1E3A8A;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 0.5rem;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }
        .btn-accent:hover {
            background-color: #F59E0B;
            transform: scale(1.05);
        }
        /* Media Queries for Responsiveness */
        @media (max-width: 640px) {
            .btn-primary, .btn-accent {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
                width: 100%;
            }
        }
        h1 { font-size: 3rem; font-weight: 700; line-height: 1.2; }
        h2 { font-size: 2.25rem; font-weight: 600; }
        h3 { font-size: 1.5rem; font-weight: 600; }
        p { font-size: 1rem; font-weight: 400; line-height: 1.6; }
        .animate-section {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
</head>
<body class="animated-bg text-gray-800">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white shadow-lg z-50">
        <div class="container mx-auto flex justify-between items-center px-6 py-4">
            <a href="#home" class="text-2xl font-bold text-blue-600">
                <img src="{{ asset('img/Tugasku.png') }}" alt="TugasKu Logo" class="inline-block w-10 h-10 mr-2">TugasKu
            </a>
            <ul class="hidden md:flex space-x-6">
                <li><a href="#home" class="hover:text-blue-600 font-medium">Home</a></li>
                <li><a href="#about" class="hover:text-blue-600 font-medium">About Us</a></li>
                <li><a href="#products" class="hover:text-blue-600 font-medium">Products</a></li>
                <li><a href="#team" class="hover:text-blue-600 font-medium">Team</a></li>
                <li><a href="#contact" class="hover:text-blue-600 font-medium">Contact</a></li>
            </ul>
            <div class="flex space-x-3">
                <a href="{{ route('login.form') }}" class="btn-primary">Sign In</a>
                <a href="{{ route('register.form') }}" class="btn-accent">Sign Up</a>
            </div>
            <button class="md:hidden text-gray-800 focus:outline-none" id="menu-toggle">
                <i class='bx bx-menu text-2xl'></i>
            </button>
        </div>
    </nav>

    <!-- Home -->
    <section id="home" class="flex items-center justify-center min-h-screen hero-bg text-white">
        <div class="text-center max-w-3xl px-6 animate-section">
            <img src="{{ asset('img/Tugasku.png') }}" alt="TugasKu Logo" class="w-24 mx-auto mb-6">
            <h1 class="mb-4">Tugas Kuliah Jadi Mudah dengan <span class="text-blue-400">TugasKu</span></h1>
            <p class="text-gray-200 mb-8">
                Atur tugas kuliahmu, pantau deadline, dan tetap produktif dengan TugasKu. Aplikasi sederhana yang membantu mahasiswa mengelola waktu dengan lebih baik! 🌟
            </p>
            <a href="{{ route('register.form') }}" class="btn-primary">Mulai Sekarang!</a>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="flex items-center justify-center min-h-screen animated-bg">
        <div class="container mx-auto px-6 animate-section">
            <div class="max-w-5xl flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0 md:space-x-12">
                <div class="text-center md:text-left w-full md:w-1/2">
                    <h2 class="mb-6 text-gray-900">Tentang Kami</h2>
                    <p class="text-gray-700 mb-8">
                        TugasKu adalah aplikasi manajemen tugas berbasis Laravel yang dirancang untuk mahasiswa. Kami hadir untuk membantu kamu mengatasi kekacauan jadwal kuliah dan tugas dengan antarmuka yang intuitif dan fitur yang praktis.
                    </p>
                    <a href="#contact" class="btn-accent">Hubungi Kami</a>
                </div>
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('img/TentangKami.png') }}" alt="Tentang Kami" class="w-full h-auto max-h-96 object-contain rounded-lg shadow-md">
                </div>
>>>>>>> 59aa07ab23da978baaa9643728a65228c6c93167
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<<<<<<< HEAD
  <div id="about" class="about section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <div class="about-left-image  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/about-dec.png" alt="">
              </div>
            </div>
            <div class="col-lg-6 align-self-center  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="about-right-content">
                <div class="section-heading">
                  <h6>About Us</h6>
                  <h4>Who We <em>Are</em></h4>
                  <div class="line-dec"></div>
=======
    <!-- Products -->
    <section id="products" class="flex items-center justify-center min-h-screen animated-bg">
        <div class="container mx-auto px-6 text-center animate-section">
            <h2 class="mb-6 text-gray-800">Produk Kami</h2>
            <div class="bg-white shadow-lg rounded-xl p-8 max-w-lg mx-auto card-hover">
                <img src="https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80" alt="TugasKu To-Do List Screenshot" class="w-full h-64 object-cover rounded-lg mb-6">
                <h3 class="mb-3 text-blue-600">TugasKu - To Do List</h3>
                <p class="text-gray-600 mb-6">
                    Kelola tugas kuliahmu dengan mudah! Catat, atur, dan lacak semua tugas serta deadline dalam satu tempat. TugasKu membuatmu tetap terorganisir dan fokus pada tujuan akademikmu.
                </p>
                <a href="{{ route('register.form') }}" class="btn-primary">Coba Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section id="team" class="flex items-center justify-center min-h-screen animated-bg">
        <div class="container mx-auto px-6 text-center animate-section">
            <h2 class="mb-12 text-gray-800">Tim Kami</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="bg-white p-6 shadow-lg rounded-xl card-hover">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Anggota 1" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h4 class="text-blue-600">Rafaisya Dwi Adrianto</h4>
                    <p class="text-gray-500">Rektor</p>
                    <p class="text-gray-600 text-sm mt-2">Mengkoordinasikan tim untuk menghadirkan TugasKu yang inovatif.</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-xl card-hover">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Anggota 2" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h4 class="text-blue-600">Dimas Agung Fitriyanto</h4>
                    <p class="text-gray-500">Koruptor</p>
                    <p class="text-gray-600 text-sm mt-2">Membangun sistem yang andal untuk pengalaman terbaik.</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-xl card-hover">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Anggota 3" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h4 class="text-blue-600">Muhammad Firdaus.A</h4>
                    <p class="text-gray-500">Mahasiswa</p>
                    <p class="text-gray-600 text-sm mt-2">Merancang antarmuka yang menarik dan mudah digunakan.</p>
                </div>
                <div class="bg-white p-6 shadow-lg rounded-xl card-hover">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Anggota 4" class="w-24 h-24 rounded-full mx-auto mb-4">
                    <h4 class="text-blue-600">Yayan Mulyana</h4>
                    <p class="text-gray-500">Kang Poci</p>
                    <p class="text-gray-600 text-sm mt-2">Menciptakan desain yang intuitif untuk pengguna.</p>
>>>>>>> 59aa07ab23da978baaa9643728a65228c6c93167
                </div>
                <p>We built this To-Do List App to help you stay productive every day.
                Our goal is to provide a simple yet powerful tool that keeps your tasks organized,
                your goals clear, and your life stress-free.</p>
                <div class="row">
                  <div class="col-lg-4 col-sm-4">
                    <div class="skill-item first-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                      <div class="progress" data-percentage="90">
                        <span class="progress-left">
                          <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                          <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value">
                          <div>
                            90%<br>
                            <span>Goal Tracking</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="skill-item second-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                      <div class="progress" data-percentage="80">
                        <span class="progress-left">
                          <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                          <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value">
                          <div>
                            80%<br>
                            <span>Task Management</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4">
                    <div class="skill-item third-skill-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                      <div class="progress" data-percentage="80">
                        <span class="progress-left">
                          <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                          <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value">
                          <div>
                            80%<br>
                            <span>Productivity Boost</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<<<<<<< HEAD
  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>Our Services</h6>
            <h4>What Our Tugasku <em>Provides</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="menu">
                    <div class="first-thumb active">
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/taks1.png" alt=""></span>
                        Tasks
                      </div>
                    </div>
                    <div>
                      <div class="thumb">                 
                        <span class="icon"><img src="assets/images/service-icon-01.png" alt=""></span>
                       Goals
                      </div>
                    </div>
                    <div>
                      <div class="thumb">                 
                        <span class="icon"><img src="assets/images/calender.png" alt=""></span>
                        Calendar
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">                 
                        <span class="icon"><img src="assets/images/lonceng.png" alt=""></span>
                        Reminders
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="col-lg-12">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-6 align-self-center">
                              <div class="left-text">
                                <h4>Organize Your Day &amp; Stay focused, stay productive.</h4>
                                <p>Manage your daily to-dos effortlessly and keep everything in order.</p>
                                <div class="ticks-list"><span><i class="fa fa-check"></i> Create, edit, and check off tasks</span>
                                  <span><i class="fa fa-check"></i> Add deadlines & tags for priority</span> <span><i class="fa fa-check"></i> Organize tasks into simple categories</span> </div>
                                <p>With Tasks, you can simplify your workflow and reduce stress. No more forgetting what needs to be done — everything is neatly organized in one place, ready whenever you are.</p>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/services-image.jpeg" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-6 align-self-center">
                              <div class="left-text">
                                <h4>Achieve What Matters &amp; Turn big dreams into small steps.</h4>
                                <p>Track your progress and reach milestones with confidence./p>
                                <div class="ticks-list"><span><i class="fa fa-check"></i> Set personal or work goals</span> <span><i class="fa fa-check"></i> Break goals into manageable tasks</span> <span><i class="fa fa-check"></i> Visual tracker to measure achievements</span></div>
                                <p>Goals help you stay committed to what really matters. By breaking down ambitions into smaller, doable tasks, you’ll see steady progress and stay motivated along the way.</p>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/2.png" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-6 align-self-center">
                              <div class="left-text">
                                <h4>Plan Ahead &amp; Your time, perfectly scheduled.</h4>
                                <p>See all your tasks, events, and deadlines in one clear view.</p>
                                <div class="ticks-list"><span><i class="fa fa-check"></i> Daily, weekly, monthly planners</span> <span><i class="fa fa-check"></i> Sync with your device calendar</span> <span><i class="fa fa-check"></i> Drag & drop task scheduling</span></div>
                                <p>Calendar gives you full control of your schedule. Whether it’s daily routines, meetings, or long-term projects, everything is displayed in one simple and clear timeline.</p>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/4.png" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-6 align-self-center">
                              <div class="left-text">
                                <h4>Never Miss a Thing &amp; Stay on track with smart alerts.</h4>
                                <p>Get notified about tasks, events, or deadlines at the right time.</p>
                                <div class="ticks-list"><span><i class="fa fa-check"></i> Custom reminders & repeat options</span> <span><i class="fa fa-check"></i> Smart notifications across devices</span> <span><i class="fa fa-check"></i> Snooze feature to keep control</span></div>
                                <p>Reminders make sure you never lose track of important moments. Customize alerts to fit your lifestyle and always stay one step ahead with timely notifications.</p>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/3.png" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>          
              </div>
=======
    <!-- Contact -->
    <section id="contact" class="flex items-center justify-center min-h-screen animated-bg">
        <div class="container mx-auto px-6 text-center animate-section">
            <h2 class="mb-6 text-gray-800">Hubungi Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-8">
                Ada pertanyaan atau saran? Kirim pesan kepada kami, dan tim TugasKu akan segera merespons!
            </p>
            <form action="#" method="POST" class="max-w-lg mx-auto text-left space-y-6">
                <input type="text" placeholder="Nama" class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-600" required>
                <input type="email" placeholder="Email" class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-600" required>
                <textarea placeholder="Pesan" rows="5" class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-600" required></textarea>
                <button type="submit" class="btn-primary w-full">Kirim Pesan</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6 text-center">
        <div class="container mx-auto px-6">
            <p>&copy; {{ date('Y') }} TugasKu. All Rights Reserved.</p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#" class="text-gray-300 hover:text-blue-400"><i class='bx bxl-instagram text-2xl'></i></a>
                <a href="#" class="text-gray-300 hover:text-blue-400"><i class='bx bxl-twitter text-2xl'></i></a>
                <a href="#" class="text-gray-300 hover:text-blue-400"><i class='bx bxl-linkedin text-2xl'></i></a>
>>>>>>> 59aa07ab23da978baaa9643728a65228c6c93167
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<<<<<<< HEAD
  
  <div id="free-quote" class="free-quote">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
            <h6>START TODAY FOR FREE</h6>
            <h4>Organize Your Life With Tugasku</h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-8 offset-lg-2  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
          <form id="search" action="#" method="GET">
            <div class="row">
              <div class="col-lg-4 col-sm-4">
                <fieldset>
                  <input type="web" name="web" class="website" placeholder="Your Name..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-4 col-sm-4">
                <fieldset>
                  <input type="address" name="address" class="email" placeholder="Email Address..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-4 col-sm-4">
                <fieldset>
                  <button type="submit" class="main-button">Get Started</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
            <h6>Our Team</h6>
            <h4>Team Of This Project <em>Projects</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
      <div class="row">
        <div class="col-lg-12">
          <div class="loop owl-carousel">
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/Albert-Einstein.jpg" alt="">
                </div>
                <div class="down-content">
                  <h4>Yayan</h4>
                  <span>Provokator</span>
                </div>
              </div>
              </a>  
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/alva.jpg" alt="">
                </div>
                <div class="down-content">
                  <h4>Dimas</h4>
                  <span>Orang Sakti</span>
                </div>
              </div>
              </a>  
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/prabowo.jpeg" alt="">
                </div>
                <div class="down-content">
                  <h4>Uus</h4>
                  <span>Tukang Maen</span>
                </div>
              </div>
              </a>  
            </div>    
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                <div class="thumb">
                  <img src="assets/images/tesla.jpeg" alt="">
                </div>
                <div class="down-content">
                  <h4>Raffa</h4>
                  <span>Orang Dalem</span>
                </div>
              </div>
              </a>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>Contact Us</h6>
            <h4>Get In Touch With Us <em>Now</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="contact-dec">
                  <img src="assets/images/contact-dec.png" alt="">
                </div>
              </div>
              <div class="col-lg-5">
                <div id="map">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.545718958939!2d107.30639839999999!3d-6.323239800000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6977ccb34822e1%3A0x6c4c7c12678610e0!2sUniversitas%20Singaperbangsa%20Karawang%20(UNSIKA)!5e0!3m2!1sid!2sid!4v1759037428589!5m2!1sid!2sid" width="100%" height="800" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
              </div>
              <div class="col-lg-7">
                <div class="fill-form">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="assets/images/phone-icon.png" alt="">
                          <a href="#">0812345678910</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="assets/images/email-icon.png" alt="">
                          <a href="#">projeksukasuka</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="assets/images/location-icon.png" alt="">
                          <a href="#">Karawang</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                      </fieldset>
                      <fieldset>
                        <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                      </fieldset>
                      <fieldset>
                        <input type="subject" name="subject" id="subject" placeholder="Subject" autocomplete="on">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button ">Send Message Now</button>
                      </fieldset>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2025 Projek Suka Suka. All Rights Reserved. 
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/animation.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

=======
    <!-- Scripts -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', () => {
            document.querySelector('ul').classList.toggle('hidden');
        });
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>
>>>>>>> 59aa07ab23da978baaa9643728a65228c6c93167
</body>
</html>