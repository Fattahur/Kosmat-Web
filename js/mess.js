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

document.getElementById('imagemsg').addEventListener('change', function (event) {
    handleFileInputChange(event, 'showimgmsg');
})