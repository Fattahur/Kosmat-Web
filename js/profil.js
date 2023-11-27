function handleFileInputChange(event, imgElementId) {
    var input = event.target;

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById(imgElementId).src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById('profilimage').addEventListener('change', function (event) {
    handleFileInputChange(event, 'showimgprofil');
})


// Selecting form and input elements
const form = document.querySelector("form");
const passwordInput = document.getElementById("password");
const passToggleBtn = document.getElementById("pass-toggle-btn");

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
    const teleponInput = document.getElementById("telepon");
    const teleponwaliInput = document.getElementById("teleponwali");
    const usernameInput = document.getElementById("username");
    const nikInput = document.getElementById("nik");
    const dateInput = document.getElementById("date");
    const genderInput = document.getElementById("gender");

    // Getting trimmed values from input fields
    const fullname = fullnameInput.value.trim();
    const nik = nikInput.value.trim();
    const alamat= alamatInput.value.trim();
    const telepon= teleponInput.value.trim();
    const teleponwali= teleponwaliInput.value.trim();
    const username= usernameInput.value.trim();
    const password = passwordInput.value.trim();
    const date = dateInput.value;
    const gender = genderInput.value;

    // pattern untuk inputan Angka dan nama
    const validangka = /^[0-9]+$/;
    const validnama = /^[A-Za-z ]*$/;

    // Clearing previous error messages
    document.querySelectorAll(".form-group .error").forEach(field => field.classList.remove("error"));
    document.querySelectorAll(".error-text").forEach(errorText => errorText.remove());

    // cek validasi
    if (nik === "") {
        showError(nikInput, "Silahkan Masukkan NIK Anda");
    }else if (!validangka.test(nik)) {
        showError(nikInput, "NIK anda Tidak Valid");
    }else if (nik.length > 16) {
        showError(nikInput, "NIK Tidak Boleh Lebih Dari 16");
    }else if (nik.length < 16) {
        showError(nikInput, "NIK Tidak Boleh Kurang Dari 16");
    }

    if (fullname === "") {
        showError(fullnameInput, "Silahkan Masukkan Nama Lengkap Anda!");
    }else if (!validnama.test(fullname)) {
        showError(fullnameInput, "Nama Tidak Boleh Berupa/ Angka!");
    }

    if (alamat === "") {
        showError(alamatInput, "Silahkan Masukkan Alamat");
    }

    if (telepon === "") {
        showError(teleponInput, "Silahkan Masukkan Nomor Whatsapp Anda");
    }else if (!validangka.test(telepon)) {
        showError(teleponInput, "Silahkan Masukkan Nomor yang Valid");
    }else if (telepon.length > 13) {
        showError(teleponInput, "Nomor Telepon Anda Tidak Valid");
    }else if (telepon.length < 11) {
        showError(teleponInput, "Nomor Telepon Anda Tidak Valid");
    }

    if (teleponwali === "") {
        showError(teleponwaliInput, "Silahkan Masukkan Nomor Whatsapp(Wali) Anda");
    }else if (!validangka.test(teleponwali)) {
        showError(teleponwaliInput, "Silahkan Masukkan Nomor yang Valid");
    }else if (teleponwali.length > 13) {
        showError(teleponwaliInput, "Nomor Telepon Anda Tidak Valid");
    }else if (teleponwali.length < 11) {
        showError(teleponwaliInput, "Nomor Telepon Anda Tidak Valid");
    }

    if (username === "") {
        showError(usernameInput, "Silahkan Masukkan Username Anda!");
    }

    if (password === "") {
        showError(passwordInput, "Silahkan Masukkan Password");
    }else if (password.length < 8 ) {
        showError(passwordInput, "Password Kurang");
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


// Handling form submission event
form.addEventListener("submit", handleFormData);


