<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
=======
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  {{-- CSS via Vite --}}
  @vite(['resources/css/login.css', 'resources/js/app.js'])

  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

  <title>TugasKu</title>
</head>
<body class="font-sans page-transition">

  <div class="login">
    <div class="login__content">

      <div class="login__img">

        <lottie-player 
          src="https://assets10.lottiefiles.com/packages/lf20_jcikwtux.json"
          background="transparent"
          speed="1"
          style="width:100%; max-width:380px; height:380px;"
          loop
          autoplay>
        </lottie-player>
=======
        <img src="{{ asset('/img/TugasKu.png') }}" alt="Login Illustration" />
      </div>

      {{-- === Form Wrapper === --}}
      <div class="login__forms form-wrapper">

        {{-- SIGN IN FORM --}}
        <form action="{{ route('login') }}" method="POST" 
              class="login__form form-container {{ ($activeForm ?? 'login') == 'login' ? 'active' : '' }}" 
              id="login-in" autocomplete="off" novalidate>
          @csrf
          <h1 class="login__title">Sign In</h1>

          <div class="login__box">
            <i class="bx bx-user login__icon"></i>
            <input type="text" name="username" placeholder="Username" class="login__input" required />
          </div>

          <div class="login__box">
            <i class="bx bx-lock-alt login__icon"></i>
            <input type="password" name="password" placeholder="Password" class="login__input" required />
          </div>

          <a href="#" class="login__forgot">Forgot password?</a>

          <button type="submit" class="login__button">Sign In</button>

          <div class="login__toggle-text">
            <span class="login__account">Don't have an Account?</span>
            <span class="login__link" id="sign-up">Sign Up</span>
          </div>
        </form>

        {{-- SIGN UP FORM --}}
        <form action="{{ route('register') }}" method="POST" 
              class="login__form form-container {{ ($activeForm ?? 'login') == 'register' ? 'active' : '' }}" 
              id="login-up" autocomplete="off" novalidate>
          @csrf
          <h1 class="login__title">Create Account</h1>

          <div class="login__box">
            <i class="bx bx-user login__icon"></i>
            <input type="text" name="username" placeholder="Username" class="login__input" required />
          </div>

          <div class="login__box">
            <i class="bx bx-at login__icon"></i>
            <input type="email" name="email" placeholder="Email" class="login__input" required />
          </div>

          <div class="login__box">
            <i class="bx bx-lock-alt login__icon"></i>
            <input type="password" name="password" placeholder="Password" class="login__input" required />
          </div>

          <button type="submit" class="login__button">Sign Up</button>

          <div class="login__toggle-text">
            <span class="login__account">Already have an Account?</span>
            <span class="login__link" id="sign-in">Sign In</span>
          </div>

=======
          
          <div class="login__social">
            <a href="#" class="login__social-icon"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="login__social-icon"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="login__social-icon"><i class="bx bxl-google"></i></a>
          </div>
        </form>

      </div>
      {{-- === /Form Wrapper === --}}
    </div>
  </div>

  {{-- Notification Overlay --}}
  <div id="notifOverlay" class="notif-overlay hidden">
    <div class="notif-box">
      <p id="notifMessage">Pesan notifikasi</p>
      <button onclick="closeNotif()" class="btn-notif-close">&times;</button>
    </div>
  </div>

  @if(session('error'))
  <script>
    showNotif("{{ session('error') }}");
  </script>
  @endif
</body>
</html>
