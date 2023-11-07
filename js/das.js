function toggleNavbar() {
    var navbar = document.getElementById("Navbar");
    navbar.classList.toggle("hidden");
}

function showNavbar() {
    var navbar = document.getElementById("myNavbar");
    navbar.classList.add("active");
}

function hideNavbar() {
    var navbar = document.getElementById("myNavbar");
    navbar.classList.remove("active");
}
