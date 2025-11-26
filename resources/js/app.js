import "./bootstrap";

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

    // === Page Transition ===
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

    // === Mobile Menu ===
    const menuToggle = document.getElementById("menu-toggle");
    const navMenu = document.querySelector("nav ul");

    if (menuToggle && navMenu) {
        menuToggle.addEventListener("click", () => {
            navMenu.classList.toggle("hidden");
        });
    }

    // === Smooth Scrolling ===
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: "smooth" });
            }
        });
    });

    // === VALIDASI LOGIN ===
    if (loginIn) {
        const loginBtn = loginIn.querySelector(".login__button");

        if (loginBtn) {
            loginBtn.addEventListener("click", function (e) {
                e.preventDefault();

                const email = loginIn
                    .querySelector("input[name='email']")
                    .value.trim();
                const password = loginIn
                    .querySelector("input[name='password']")
                    .value.trim();

                if (!email || !password)
                    return showNotif("Email dan Password harus diisi.");
                if (!validateEmail(email))
                    return showNotif("Format email tidak valid.");
                if (password.length < 6)
                    return showNotif("Password minimal 6 karakter.");

                loginIn.submit();
            });
        }
    }

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    // === ADMIN OTP CHECK ===
    const isAdminCheckbox = document.getElementById("is_admin");
    const otpField = document.getElementById("otpField");

    if (isAdminCheckbox && otpField) {
        otpField.classList.toggle("show", isAdminCheckbox.checked);
        isAdminCheckbox.addEventListener("change", function () {
            otpField.classList.toggle("show", this.checked);
        });
    }

    // === RANDOM CARD ACCENT COLOR ===
    const accentColors = [
        "#FF6B6B",
        "#4ECDC4",
        "#C7F464",
        "#A16AE8",
        "#F9A620",
    ];

    document.querySelectorAll(".task-card").forEach((card) => {
        const random =
            accentColors[Math.floor(Math.random() * accentColors.length)];
        card.style.setProperty("--accent-color", random);
    });
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

// notif js global
setTimeout(() => {
    document.querySelectorAll('.custom-alert').forEach(alert => {
        alert.style.transition = "opacity 0.5s ease";
        alert.style.opacity = "0";
        setTimeout(() => alert.remove(), 500);
    });
}, 3000);

