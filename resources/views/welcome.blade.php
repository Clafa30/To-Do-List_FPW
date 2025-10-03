<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="TugasKu - Aplikasi manajemen tugas untuk membantu Anda tetap terorganisir dan produktif setiap hari.">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>TugasKu - Manajemen Tugas</title>

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
            <li><a href="#"><i class="fa fa-envelope"></i>tugasku@company.com</a></li>
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
              <img src="assets/images/tugasku-logo.jpg" alt="Logo TugasKu">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Beranda</a></li>
              <li class="scroll-to-section"><a href="#about">Tentang Kami</a></li>
              <li class="scroll-to-section"><a href="#services">Layanan</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Tim Kami</a></li>
              <li class="scroll-to-section"><a href="#contact">Kontak</a></li> 
              <li class="scroll-to-section"><div class="border-first-button"> <a href="{{ route('login.form') }}">Mulai Sekarang</a></div></li> 
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
                    <h6>RANCANG. PRIORITASKAN. LAKSANAKAN.</h6>
                    <h2>Sederhanakan Hidup Anda dengan TugasKu</h2>
                    <p>Ubah kekacauan menjadi kejelasan dengan mengatur semua tugas Anda dalam satu aplikasi. Tingkatkan produktivitas, capai tujuan lebih cepat, dan nikmati hari yang lebih seimbang serta bebas stres.</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="border-first-button scroll-to-section">
                      <a href="{{ route('login.form') }}">Mulai Sekarang</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/home.png" alt="Gambar Beranda TugasKu">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <div class="about-left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/about-dec.png" alt="Dekorasi Tentang Kami">
              </div>
            </div>
            <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="about-right-content">
                <div class="section-heading">
                  <h6>Tentang Kami</h6>
                  <h4>Siapa <em>Kami</em></h4>
                  <div class="line-dec"></div>
                </div>
                <p>Kami mengembangkan aplikasi TugasKu untuk membantu Anda tetap produktif setiap hari. Tujuan kami adalah menyediakan alat yang sederhana namun kuat untuk menjaga tugas Anda terorganisir, tujuan Anda jelas, dan hidup Anda bebas dari stres.</p>
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
                            <span>Pelacakan Tujuan</span>
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
                            <span>Manajemen Tugas</span>
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
                            <span>Peningkatan Produktivitas</span>
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

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>Layanan Kami</h6>
            <h4>Apa yang <em>TugasKu</em> Tawarkan</h4>
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
                        <span class="icon"><img src="assets/images/taks1.png" alt="Ikon Tugas"></span>
                        Tugas
                      </div>
                    </div>
                    <div>
                      <div class="thumb">                 
                        <span class="icon"><img src="assets/images/service-icon-01.png" alt="Ikon Tujuan"></span>
                        Tujuan
                      </div>
                    </div>
                    <div>
                      <div class="thumb">                 
                        <span class="icon"><img src="assets/images/calender.png" alt="Ikon Kalender"></span>
                        Kalender
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">                 
                        <span class="icon"><img src="assets/images/lonceng.png" alt="Ikon Pengingat"></span>
                        Pengingat
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
                                <h4>Atur Hari Anda &amp; Tetap Fokus, Tetap Produktif</h4>
                                <p>Kelola tugas harian Anda dengan mudah dan jaga semuanya tetap teratur.</p>
                                <div class="ticks-list">
                                  <span><i class="fa fa-check"></i> Buat, edit, dan tandai tugas selesai</span>
                                  <span><i class="fa fa-check"></i> Tambahkan tenggat waktu & label prioritas</span>
                                  <span><i class="fa fa-check"></i> Atur tugas ke dalam kategori sederhana</span>
                                </div>
                                <p>Dengan fitur Tugas, Anda dapat menyederhanakan alur kerja dan mengurangi stres. Tidak ada lagi lupa apa yang harus dilakukan — semuanya terorganisir rapi di satu tempat, siap kapan pun Anda butuhkan.</p>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/services-image.jpeg" alt="Gambar Layanan Tugas">
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
                                <h4>Capai yang Penting &amp; Wujudkan Impian Besar dalam Langkah Kecil</h4>
                                <p>Lacak kemajuan Anda dan capai milestone dengan percaya diri.</p>
                                <div class="ticks-list">
                                  <span><i class="fa fa-check"></i> Tetapkan tujuan pribadi atau kerja</span>
                                  <span><i class="fa fa-check"></i> Pecah tujuan menjadi tugas yang mudah dikelola</span>
                                  <span><i class="fa fa-check"></i> Pelacak visual untuk mengukur pencapaian</span>
                                </div>
                                <p>Fitur Tujuan membantu Anda tetap berkomitmen pada hal yang benar-benar penting. Dengan memecah ambisi besar menjadi tugas-tugas kecil yang dapat dilakukan, Anda akan melihat kemajuan stabil dan tetap termotivasi.</p>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/2.png" alt="Gambar Layanan Tujuan">
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
                                <h4>Rencanakan ke Depan &amp; Waktu Anda Terjadwal dengan Sempurna</h4>
                                <p>Lihat semua tugas, acara, dan tenggat waktu dalam satu tampilan jelas.</p>
                                <div class="ticks-list">
                                  <span><i class="fa fa-check"></i> Perencana harian, mingguan, bulanan</span>
                                  <span><i class="fa fa-check"></i> Sinkronkan dengan kalender perangkat Anda</span>
                                  <span><i class="fa fa-check"></i> Penjadwalan tugas dengan drag & drop</span>
                                </div>
                                <p>Fitur Kalender memberikan Anda kendali penuh atas jadwal Anda. Baik itu rutinitas harian, rapat, atau proyek jangka panjang, semuanya ditampilkan dalam satu garis waktu yang sederhana dan jelas.</p>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/4.png" alt="Gambar Layanan Kalender">
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
                                <h4>Jangan Lewatkan Apa Pun &amp; Tetap di Jalur dengan Peringatan Cerdas</h4>
                                <p>Dapatkan pemberitahuan tentang tugas, acara, atau tenggat waktu pada waktu yang tepat.</p>
                                <div class="ticks-list">
                                  <span><i class="fa fa-check"></i> Pengingat kustom & opsi ulang</span>
                                  <span><i class="fa fa-check"></i> Notifikasi cerdas di semua perangkat</span>
                                  <span><i class="fa fa-check"></i> Fitur tunda untuk menjaga kendali</span>
                                </div>
                                <p>Fitur Pengingat memastikan Anda tidak pernah kehilangan jejak momen penting. Sesuaikan peringatan agar sesuai dengan gaya hidup Anda dan selalu selangkah lebih maju dengan notifikasi tepat waktu.</p>
                              </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                              <div class="right-image">
                                <img src="assets/images/3.png" alt="Gambar Layanan Pengingat">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>          
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="free-quote" class="free-quote">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
            <h6>MULAI GRATIS HARI INI</h6>
            <h4>Atur Hidup Anda dengan TugasKu</h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-8 offset-lg-2 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
          <form id="search" action="#" method="GET">
            <div class="row">
              <div class="col-lg-4 col-sm-4">
                <fieldset>
                  <input type="text" name="name" class="website" placeholder="Nama Anda..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-4 col-sm-4">
                <fieldset>
                  <input type="email" name="email" class="email" placeholder="Alamat Email..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-4 col-sm-4">
                <fieldset>
                  <button type="submit" class="main-button">Mulai Sekarang</button>
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
            <h6>Tim Kami</h6>
            <h4>Tim di Balik <em>TugasKu</em></h4>
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
                    <img src="assets/images/Albert-Einstein.jpg" alt="Foto Yayan">
                  </div>
                  <div class="down-content">
                    <h4>Yayan</h4>
                    <span>Desainer Kreatif</span>
                  </div>
                </div>
              </a>  
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                  <div class="thumb">
                    <img src="assets/images/alva.jpg" alt="Foto Dimas">
                  </div>
                  <div class="down-content">
                    <h4>Dimas</h4>
                    <span>Pengembang Utama</span>
                  </div>
                </div>
              </a>  
            </div>
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                  <div class="thumb">
                    <img src="assets/images/prabowo.jpeg" alt="Foto Uus">
                  </div>
                  <div class="down-content">
                    <h4>Uus</h4>
                    <span>Programmer Kali</span>
                  </div>
                </div>
              </a>  
            </div>    
            <div class="item">
              <a href="#">
                <div class="portfolio-item">
                  <div class="thumb">
                    <img src="assets/images/tesla.jpeg" alt="Foto Raffa">
                  </div>
                  <div class="down-content">
                    <h4>Raffa</h4>
                    <span>Manajer Proyek</span>
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
            <h6>Hubungi Kami</h6>
            <h4>Segera Hubungi Kami <em>Sekarang</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="contact-dec">
                  <img src="assets/images/contact-dec.png" alt="Dekorasi Kontak">
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
                          <img src="assets/images/phone-icon.png" alt="Ikon Telepon">
                          <a href="#">0812-3456-78910</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="assets/images/email-icon.png" alt="Ikon Email">
                          <a href="#">tugasku@company.com</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="info-post">
                        <div class="icon">
                          <img src="assets/images/location-icon.png" alt="Ikon Lokasi">
                          <a href="#">Karawang, Jawa Barat</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="name" id="name" placeholder="Nama" autocomplete="on" required>
                      </fieldset>
                      <fieldset>
                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email Anda" required>
                      </fieldset>
                      <fieldset>
                        <input type="text" name="subject" id="subject" placeholder="Subjek" autocomplete="on">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <textarea name="message" type="text" class="form-control" id="message" placeholder="Pesan" required></textarea>  
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button">Kirim Pesan Sekarang</button>
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
          <p>Hak Cipta © 2025 TugasKu. Semua Hak Dilindungi.</p>
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
</body>
</html>