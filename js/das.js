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


// Selecting form and input elements
const form = document.querySelector("form");
const passwordInput = document.getElementById("regpass");
const passwordInput2 = document.getElementById("regvalpass");
const passToggleBtn = document.getElementById("pass-toggle-btn");
const passToggleBtn2 = document.getElementById("pass-toggle-btn2");

// Function to display error messages
const showError = (field, errorText) => {
    field.classList.add("error");
    const errorElement = document.createElement("small");
    errorElement.classList.add("error-text");
    errorElement.innerText = errorText;
    field.closest(".form-group").appendChild(errorElement);
}

// Function to handle form submission
const handleFormData = (e) => {
    e.preventDefault();

    // Retrieving input elements
    const fullnameInput = document.getElementById("fullname");
    const alamatInput = document.getElementById("alamat");
    const nikInput = document.getElementById("nik");
    const dateInput = document.getElementById("date");
    const genderInput = document.getElementById("gender");

    // Getting trimmed values from input fields
    const fullname = fullnameInput.value.trim();
    const nik = nikInput.value.trim();
    const alamat= alamatInput.value.trim();
    const password = passwordInput.value.trim();
    const password2 = passwordInput2.value.trim();
    const date = dateInput.value;
    const gender = genderInput.value;

    // pattern untuk inputan Angka
    const validangka = /^[0-9]+$/;

    // Clearing previous error messages
    document.querySelectorAll(".form-group .error").forEach(field => field.classList.remove("error"));
    document.querySelectorAll(".error-text").forEach(errorText => errorText.remove());

    // cek validasi
    if (nik === "") {
        showError(nikInput, "Silahkan Masukkan NIK Anda");
    }else if (!validangka.test(nik)) {
        showError(nikInput, "NIK anda Tidak Valid");
    }

    if (fullname === "") {
        showError(fullnameInput, "Silahkan Masukkan Nama Lengkap Anda!");
    }

    if (alamat === "") {
        showError(alamatInput, "Silahkan Masukkan Alamat");
    }

    if (password === "") {
        showError(passwordInput, "Silahkan Masukkan Password");
    }else if (password.length < 8 ) {
        showError(passwordInput, "Password Kurang");
    }

    if (password2 === "") {
        showError(passwordInput2, "Silahkan Masukkan Password");
    }else if (password2.length < 8 ) {
        showError(passwordInput2, "Password Kurang");
    }else if (password !== password2) {
        showError(passwordInput2, "Password Tidak Sama!");
    }

    if (date === "") {
        showError(dateInput, " Silahkan Pilih Tanggal Lahir Anda");
    }

    if (gender === "") {
        showError(genderInput, "Silahkan Pilih Jenis Kelamin Anda");
    }

    // Checking for any remaining errors before form submission
    const errorInputs = document.querySelectorAll(".form-group .error");
    if (errorInputs.length > 0) return;

    // Submitting the form
    form.submit();
}

// Toggling password visibility
passToggleBtn.addEventListener('click', () => {
    passToggleBtn.className = passwordInput.type === "password" ? "fa-solid fa-eye-slash" : "fa-solid fa-eye";
    passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    
});

passToggleBtn2.addEventListener('click', () => {
    passToggleBtn2.className = passwordInput2.type === "password" ? "fa-solid fa-eye-slash" : "fa-solid fa-eye";
    passwordInput2.type = passwordInput2.type === "password" ? "text" : "password";
    
});

// Handling form submission event
form.addEventListener("submit", handleFormData);
