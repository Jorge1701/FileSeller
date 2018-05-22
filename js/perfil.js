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

function seguir(idSeguidor, idSeguido){
	$.ajax({
        type: "GET",
        dataType: "json",
        url: "/FileSeller/usuario/seguir/"+idSeguidor+"/"+idSeguido,
        data: {
        },
        success: function (data) {
            if (data.status == 'success') {
                $('#btnSeguir').hide();
                $('#btnDejarSeguir').removeAttr("hidden");
                $('#btnDejarSeguir').show();
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function dejarSeguir(idSeguidor, idSeguido){
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/FileSeller/usuario/dejarSeguir/"+idSeguidor+"/"+idSeguido+"/",
        data: {
        },
        success: function (data) {
            if (data.status == 'success') {
                $('#btnDejarSeguir').hide();
                $('#btnSeguir').removeAttr("hidden");
                $('#btnSeguir').show();
            }
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function ir (correo) {
    window.location.assign ("/FileSeller/mensajes/chat/" + correo);
}

function strike (correo) {
    preguntaMensaje ("Seguro desea dar un strike?", "Comentario", "enviarStrike", "'" + correo + "'");
}

function enviarStrike (texto, correo) {
    $.ajax ({
        type: "POST",
        dataType: "JSON",
        url: "/FileSeller/usuario/strike/" + correo + "/" + $("#" + texto).val (),
        data: {},
        success: function (data) {
            if (data["status"] == "OK")
                mensaje ("El strike se registro con exito");
            else if (data["status"] == "ELIMINADO")
                mensaje ("El usuario llego a los 3 strikes y fue eliminado");
            else
                mensajeErr ("No se pudo registrar el strike");
        },
        error: function () {
            mensajeErr ("No se pudo registrar el strike");
        }
    });
}