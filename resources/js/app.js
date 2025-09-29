import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
  // === Toggle Sign In / Sign Up ===
  const signUpBtn = document.getElementById("sign-up");
  const signInBtn = document.getElementById("sign-in");
  const loginIn = document.getElementById("login-in");
  const loginUp = document.getElementById("login-up");

  function showForm(show, hide) {
    hide.classList.add("fade-out");
    hide.classList.remove("active");

    setTimeout(() => {
      hide.classList.remove("fade-out");
      show.classList.add("active");
    }, 500);
  }

  if (signUpBtn && signInBtn) {
    signUpBtn.addEventListener("click", () => {
      showForm(loginUp, loginIn);
    });

    signInBtn.addEventListener("click", () => {
      showForm(loginIn, loginUp);
    });
  }

  // === Animasi transisi halaman ===
  const loginForm = document.getElementById("login-in"); 
  const logoutBtn = document.getElementById("logoutBtn");

  document.body.classList.remove("fade-out");

  if (loginForm) {
    loginForm.addEventListener("submit", (e) => {
      e.preventDefault();
      document.body.classList.add("fade-out");
      setTimeout(() => loginForm.submit(), 600);
    });
  }

  if (logoutBtn) {
    logoutBtn.addEventListener("click", (e) => {
      e.preventDefault();
      document.body.classList.add("fade-out");
      setTimeout(() => {
        window.location.href = logoutBtn.getAttribute("href");
      }, 600);
    });
  }
});

  // Notif Overlay
  function showNotif(message) {
      const overlay = document.getElementById("notifOverlay");
      const messageBox = document.getElementById("notifMessage");
      messageBox.textContent = message;
      overlay.classList.remove("hidden");
  }
  
  function closeNotif() {
      document.getElementById("notifOverlay").classList.add("hidden");
  }

document.addEventListener("DOMContentLoaded", function () {
    // Toggle form login/sign-up
    const signInBtn = document.getElementById("sign-in");
    const signUpBtn = document.getElementById("sign-up");
    const loginInForm = document.getElementById("login-in");
    const loginUpForm = document.getElementById("login-up");

    signUpBtn.addEventListener("click", () => {
        loginInForm.classList.add("none");
        loginUpForm.classList.remove("none");
    });

    signInBtn.addEventListener("click", () => {
        loginInForm.classList.remove("none");
        loginUpForm.classList.add("none");
    });

    // Validasi Sign In
    loginInForm.querySelector(".login__button").addEventListener("click", function (e) {
        e.preventDefault(); // Tetap dicegah dulu

        const email = loginInForm.querySelector("input[name='email']").value.trim();
        const password = loginInForm.querySelector("input[name='password']").value.trim();

        if (!email || !password) {
            showNotif("Email dan Password harus diisi.");
            return;
        }

        if (!validateEmail(email)) {
            showNotif("Format email tidak valid.");
            return;
        }

        if (password.length < 6) {
            showNotif("Password minimal 6 karakter.");
            return;
        }

        const otpInput = document.getElementById("otp");
        if (otpInput) {
            const otpValue = otpInput.value;
            console.log("OTP:", otpValue);
        }

        // Kirim ke server
        loginInForm.submit(); 
    });

    // Validasi Sign In
    loginInForm.querySelector(".login__button").addEventListener("click", function (e) {
        e.preventDefault(); // Cegah submit dulu

        const email = loginInForm.querySelector("input[name='email']").value.trim();
        const password = loginInForm.querySelector("input[name='password']").value.trim();

        if (!email || !password) {
            showNotif("Email dan Password harus diisi.");
            return;
        }

        if (!validateEmail(email)) {
            showNotif("Format email tidak valid.");
            return;
        }

        if (password.length < 6) {
            showNotif("Password minimal 6 karakter.");
            return;
        }

        // Kirim ke server
        loginInForm.submit();
    });

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // Checker Untuk Register ADMIN
    const isAdminCheckbox = document.getElementById('is_admin');
    const otpField = document.getElementById('otpField');

    if (!isAdminCheckbox || !otpField) return;

    // set visual awal sesuai state checkbox
    otpField.classList.toggle('show', isAdminCheckbox.checked);

    // tambahkan listener
    isAdminCheckbox.addEventListener('change', function () {
      otpField.classList.toggle('show', this.checked);
    });
});
