const countdownTime = 60;

const timerLabel = document.getElementById('countdown');
const timerButton = document.getElementById('timerButton');

let timeRemaining = countdownTime;
updateTimerLabel();

const countdownInterval = setInterval(() =>{
    timeRemaining--;
    updateTimerLabel();

    if (timeRemaining <= 0) {
        clearInterval(countdownInterval);
        timerLabel.textContent = 'Kirim ulang kode';
        makeLabelClickable();
        
    }
}, 1000);

function makeLabelClickable() {
    timerLabel.style.cursor = 'pointer';
    timerLabel.style.color = 'blue';
    timerLabel.style.textDecoration = 'underline';
    timerLabel.addEventListener('click', kirimUlang);
}
function updateTimerLabel() {
    const minutes = Math.floor(timeRemaining / 60);
    const seconds = timeRemaining % 60;
    timerLabel.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
}

function kirimUlang() {
    document.location="./php/cekusername.php";
}

