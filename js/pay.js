const optionMenu = document.querySelector(".select-menu"),
       selectBtn = optionMenu.querySelector(".select-btn"),
       options = optionMenu.querySelectorAll(".option"),
       sBtn_text = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));       

options.forEach(option =>{
    option.addEventListener("click", ()=>{
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtn_text.innerText = selectedOption;

        optionMenu.classList.remove("active");
    });
});


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

document.getElementById('imagepay').addEventListener('change', function (event) {
    handleFileInputChange(event, 'showimgpay');
});

document.getElementById('imagemsg').addEventListener('change', function (event) {
    handleFileInputChange(event, 'showimgmsg');
})

document.getElementById('profilimage').addEventListener('change', function (event) {
    handleFileInputChange(event, 'showimgprofil');
})
