$("#btnLogin").click(function () {

    $.ajax({
        type: "POST",
        url: "/Tarea2/SSesion",
        data: {
            "accion": "iniciarSesion",
            "nickname": $("#usuario").val().toString(),
            "contrasenia": md5($("#password").val().toString())
        },
        success: function (data) {
            if (data.toString() === "correcto") {
                window.location = "/Tarea2/SInicio";
            } else {
                window.location = "/Tarea2/SSesion?accion=error&mensaje=" + data.toString();
            }
        }

    });

});