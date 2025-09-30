import './bootstrap';

document.addEventListener("DOMContentLoaded", () => {
  // === Toggle Sign In / Sign Up ===
  const signUpBtn = document.getElementById("sign-up");
  const signInBtn = document.getElementById("sign-in");
  const loginIn = document.getElementById("login-in");
  const loginUp = document.getElementById("login-up");

  function showForm(show, hide) {
    if (!show || !hide) return;
    hide.classList.add("fade-out");
    hide.classList.remove("active");

    setTimeout(() => {
      hide.classList.remove("fade-out");
      show.classList.add("active");
    }, 500);
  }

  if (signUpBtn && signInBtn) {
    signUpBtn.addEventListener("click", () => showForm(loginUp, loginIn));
    signInBtn.addEventListener("click", () => showForm(loginIn, loginUp));
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

  // === Mobile Menu Toggle ===
  const menuToggle = document.getElementById("menu-toggle");
  const navMenu = document.querySelector("nav ul");

  if (menuToggle && navMenu) {
    menuToggle.addEventListener("click", () => {
      navMenu.classList.toggle("hidden");
    });
  }

  // === Smooth Scrolling ===
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: "smooth" });
      }
    });
  });
});
