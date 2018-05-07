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
            document.getElementById('mensaje_dia').innerHTML = "Formato incorrecto, verifique.";
            $("#modal_dia").modal();
            return correctoDia = false;
        } else {
            return correctoDia = true;
        }
    } else {
        document.getElementById('mensaje_dia').innerHTML = "Formato incorrecto, verifique.";
        $("#modal_dia").modal();
        return correctoDia = false;
    }
});


var correctoAnio = false;
$("#anio").focusout(function () {
    var anio = $("#anio").val();
    if (!isNaN(anio) && anio !== "") {
        anio = parseInt(anio);
        if (anio <= 1900 || anio >= 2018) {
            document.getElementById('mensaje_anio').innerHTML = "Formato incorrecto, verifique.";
            $("#modal_anio").modal();
            return correctoAnio = false;
        } else {
            return correctoAnio = true;
        }
    } else {
        document.getElementById('mensaje_anio').innerHTML = "Formato incorrecto, verifique.";
        $("#modal_anio").modal();
        return correctoAnio = false;
    }
});


var correctoMes = false;
$("#mes").focusout(function () {
    var mes = $("#mes").val().toString();
    if (mes === "mes") {
        document.getElementById('mensaje_mes').innerHTML = "Seleccione un mes.";
        $("#modal_mes").modal();
        mes.focus;
        return correctoMes = false;
    } else {
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
        document.getElementById('mensaje_correo').innerHTML = "Formate de correo incorrecto.";
        $("#modal_correo").modal();
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
                document.getElementById('mensaje_correo').innerHTML = "Ya existe un usuario con ese correo.";
                $("#modal_correo").modal();
                return correctoEmail = false;


            } else {
                
            }
        },
        error: function () {
            alert("ERROR AJAX");
        }
    });

});