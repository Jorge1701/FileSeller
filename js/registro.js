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
        return correctoMes = false;
    } else {
        return correctoMes = true;
    }
});

//fin comprobacion de fecha

/*SUBIR IMAGEN*/

var imagen="";

function subirImagen(){
    var formElement = $("[name='formArchivo']")[0];
    var fd = new FormData(formElement);
    var fileInput = $("[name='archivo']")[0];
    fd.append('file', fileInput.files[0]);

    var ruta = $("#archivo").val();
    if (ruta !== "") {
        imagen = ruta.split("\\")[2];
        var ext = imagen.split(".").splice(-1, 1);
        if (ext.toString().localeCompare("jpg") === 0 || ext.toString().localeCompare("jpeg") === 0 || ext.toString().localeCompare("png") === 0 || ext.toString().localeCompare("PNG") === 0) {
            $.ajax({
                url: 'inicio/subirImagen',
                data: fd,
                processData: false,
                contentType: false,
                type: 'POST',
                async: false,
                success: function (data) {
                    imagen = data;
                    return true;
                }
            });
        } else {
            imagen = "";
            return false;

        }
    }

}

/*

//Verificar que no exista el Email
var correctoEmail = false;
$("#correo").keyup(function () {
    var email = $("#correo").val().toString();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (email === "") {
        $("#emailAlerta").hide();
        $("#emailSuccess").hide();
        $("#faltaEmail").show();
        $("#formatoIncorrecto").hide();
        return correctoEmail = false;
    } else if (!filter.test(email)) {
        $("#emailAlerta").hide();
        $("#emailSuccess").hide();
        $("#faltaEmail").hide();
        $("#formatoIncorrecto").show();
        email.focus;
        return correctoEmail = false;
    }

    $.ajax({
        type: "POST",
        url: "/Tarea2/SRegistro",
        data: {"email": $("#txtEmail").val().toString(),
        "accion": "email"},

        success: function (data) {
            if (data === "si") {
                $("#emailAlerta").show();
                $("#emailSuccess").hide();
                $("#faltaEmail").hide();
                $("#formatoIncorrecto").hide();
                return correctoEmail = false;
            } else {
                $("#emailAlerta").hide();
                $("#emailSuccess").show();
                $("#faltaEmail").hide();
                $("#formatoIncorrecto").hide();
                return correctoEmail = true;
            }
        },
        error: function () {
            alert("Error en el servlet, al momento de chequear el Email");
        }
    });

});


//Ocultar boton Registrarse(del header)

$("#btnRegistrarse").hide();

//Verificacion de contraseña

var correctoContrasenia = false;

$("#txtContrasenia").focusout(function () {
    var contrasenia = $("#txtContrasenia").val().toString();
    if (contrasenia === "") {
        $("#faltaContrasenia").show();
        return correctoContrasenia = false;
    } else {
        $("#faltaContrasenia").hide();
        return correctoContrasenia = true;
    }
});



var correctoConfContrasenia = false;
$("#txtConfContrasenia").keyup(function () {
    $("#alertaContrasenia").hide();
    var contrasenia = $("#txtContrasenia").val().toString();
    var verifContrasenia = $("#txtConfContrasenia").val().toString();

    if (contrasenia.indexOf(verifContrasenia) !== -1) {
        if (contrasenia.length === verifContrasenia.length) {
            $("#alertaContrasenia").hide();
            return correctoConfContrasenia = true;
        } else {
            return correctoConfContrasenia = false;
        }
    } else {
        $("#alertaContrasenia").show();
        return correctoConfContrasenia = false;
    }
});
$("#txtContrasenia").click(function () {
    $("#alertaContrasenia").hide();
    $("#faltaContrasenia").hide();
});
$("#txtConfContrasenia").click(function () {
    $("#alertaContrasenia").hide();
});


//Comprobacion de Nombre y Apellido

var correctoNombre = false;
$("#txtNombre").focusout(function () {
    var nombre = $("#txtNombre").val().toString();

    if (nombre === "") {
        $("#alertaNombre").show();
        return correctoNombre = false;
    } else {
        $("#alertaNombre").hide();
        return correctoNombre = true;
    }
});
var correctoApellido = false;
$("#txtApellido").focusout(function () {
    var apellido = $("#txtApellido").val().toString();

    if (apellido === "") {
        $("#alertaNombre").show();
        return correctoApellido = false;
    } else {
        $("#alertaNombre").hide();
        return correctoApellido = true;
    }
}); 
*/
