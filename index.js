const form = document.getElementById('form');
const nama = document.getElementById('nmalngkp');
const alamat = document.getElementById('alamat');
const telp = document.getElementById('telp');
const username = document.getElementById('username');
const nik = document.getElementById('nik');
const pass = document.getElementById('regpass');
const valpass = document.getElementById('regvalpass');


form.addEventListener('submit', e => {
    e.preventDefault();
    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
};

const setSucces = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const validateInputs = () => {
    const namaValue = nama.value.trim();
    const alamatValue = alamat.value.trim();
    const telpValue = telp.value.trim();
    const usernameValue = username.value.trim();
    const nikValue = nik.value.trim();
    const passValue = pass.value.trim();
    const valpassValue = valpass.value.trim();

    if (namaValue === '') {
        setError(nama, 'harus di isi!');
    } else {
        setSucces(nama);
    }

    if (alamatValue === '') {
        setError(alamat, 'harus di isi!');
    } else {
        setSucces(alamat);
    }

    if (telpValue === '') {
        setError(telp, 'harus di isi!');
    } else {
        setSucces(telp);
    }

    if (usernameValue === '') {
        setError(username, 'harus di isi!');
    } else {
        setSucces(username);
    }

    if (nikValue === '') {
        setError(nik, 'harus di isi!');
    } else {
        setSucces(nik);
    }

    if (passValue === '') {
        setError(pass, 'harus di isi!');
    } else if (passValue.length < 4) {
        setError(pass, 'password harus lebih dari 4');
    } else {
        setSucces(pass);
    }

    if (valpassValue === '') {
        setError(valpass, 'silahkan masukkan ulang password');
    } else if (passValue !== valpassValue) {
        setError(valpass, 'Password tidak sama');
    } else {
        setSucces(valpass);
    }
};
