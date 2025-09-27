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
