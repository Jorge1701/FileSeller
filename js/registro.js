// funcion que muestra u oculta el password

function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
        $('#eyePass').addClass('fa-eye-slash').removeClass('fa-eye');
    } else {
        x.type = "password";
        $('#eyePass').addClass('fa-eye').removeClass('fa-eye-slash');
    }

}
//fin 
// fa fa-eye-slash

//Comprobacion de fecha

var correctoDia = false;
$("#dia").focusout(function () {
    var dia = $("#dia").val();
    if (!isNaN(dia) && dia !== "") {
        dia = parseInt(dia);
        if (dia <= 0 || dia >= 32) {
            $('#dia').addClass('is-invalid').removeClass('is-valid');
            return correctoDia = false;
        } else {
            $('#dia').addClass('is-valid').removeClass('is-invalid');
            return correctoDia = true;
        }
    } else {
        return correctoDia = false;
    }
});


var correctoAnio = false;
$("#anio").focusout(function () {
    var anio = $("#anio").val();
    if (!isNaN(anio) && anio !== "") {
        anio = parseInt(anio);
        if (anio <= 1900 || anio >= 2018) {
            $('#anio').addClass('is-invalid').removeClass('is-valid');
            return correctoAnio = false;
        } else {
         $('#anio').addClass('is-valid').removeClass('is-invalid');
         return correctoAnio = true;
     }
 } else {
    return correctoAnio = false;
}
});


var correctoMes = false;
$("#mes").focusout(function () {
    var mes = $("#mes").val().toString();
    if (mes === "mes") {
        $('#mes').addClass('is-invalid').removeClass('is-valid');
        return correctoMes = false;
    } else {
        $('#mes').addClass('is-valid').removeClass('is-invalid');
        return correctoMes = true;
    }
});

//fin comprobacion de fecha

//comprobar correo

var correctoEmail = false;


$("#correo").focusout(function () {

    var correo = $("#correo").val().toString();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (correo === "") {

        return correctoEmail = false;

    } else if (!filter.test(correo)) {
        $('#correo').addClass('is-invalid').removeClass('is-valid');
        return correctoEmail = false;
    }

    $.ajax({
        type: "POST",
        url: "localhost/FileSeller/usuario/registro",
        data: {"correo": $("#correo").val().toString(),
        "check": "check"},

        success: function (data) {

            if (data.status == 'success') {
                $('#correo').addClass('is-valid').removeClass('is-invalid');
                return correctoEmail = true;

            } else if (data.status == 'error') {
                $('#correo').addClass('is-invalid').removeClass('is-valid');
                document.getElementById('mensaje_correo').innerHTML = "El email ingresado está en uso.";
                $("#modal_correo").modal();
                return correctoEmail = false;
            } 
        },
        error: function () {
            alert("ERROR AJAX");
        }
    });

});

$('#formRegistro').submit(function(ev) {
    ev.preventDefault(); // to stop the form from submitting
    /* Validations go here */
    if(correctoDia == false){
        document.getElementById('mensaje_correo').innerHTML = "Día incorrecto, verifique.";
        $("#modal_correo").modal();
        return false;
    }else if(correctoMes == false ){
        document.getElementById('mensaje_correo').innerHTML = "Escoja un mes válido";
        $("#modal_correo").modal();
        return false;
    }else if(correctoEmail == false ){
        document.getElementById('mensaje_correo').innerHTML = "Email incorrecto, verifique";
        $("#modal_correo").modal();
        return false;
    }else if(correctoAnio == false){
        document.getElementById('mensaje_correo').innerHTML = "Año incorrecto, verifique";
        $("#modal_correo").modal();
        return false;
    }else if(document.getElementById("archivo").files.length != 0){
        var file = document.getElementById("archivo").files[0];
        var tipo = file["type"];
        var formatos = ["image/gif", "image/jpeg", "image/png" , "image/jpg"];
        if($.inArray(tipo , formatos) < 0){
            document.getElementById('mensaje_correo').innerHTML = "El archivo que intenta subir no es válido.";
            $("#modal_correo").modal();
            return false;
        }
    }

    this.submit(); // If all the validations succeeded
});