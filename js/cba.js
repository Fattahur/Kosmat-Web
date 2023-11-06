function toggleNavbar() {
    var navbar = document.getElementById("myNavbar");
    navbar.classList.toggle("active");
}
function toggleNavbar() {
    var navbar = document.getElementById("myNavbar");
    var logoContainer = document.querySelector(".logo-container");
    navbar.classList.toggle("active");
    if (navbar.classList.contains("active")) {
        logoContainer.style.marginRight = "10px";
    } else {
        logoContainer.style.marginRight = "auto";
    }
}

// Fungsi showNavbar() dan hideNavbar() tetap sama
