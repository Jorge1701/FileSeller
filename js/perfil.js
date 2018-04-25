function showPassword(inputId, eyeId) {
    var x = document.getElementById(inputId);
    if (x.type === "password") {
        x.type = "text";
        $('#'+eyeId).addClass('fa-eye-slash').removeClass('fa-eye');
    } else {
        x.type = "password";
        $('#'+eyeId).addClass('fa-eye').removeClass('fa-eye-slash');
    }

}