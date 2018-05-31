var txtComentario = $("#comentariooo");
var btnEnviar = $("#btnEnviar");
var comentarios = $("#comentarios");

var tempComentario = $("#tempComentario");
var msjNoHayComents = $("#msjNoHayComents");
var tempIniciesesion = $("#iniciesesion");

$(document).ready (function () {
	if (correoUsuario == "")
		$("#enviar_comentario").hide ();

	cargarComentarios ();
});

function cargarComentarios () {
	$.ajax ({
		type: "POST",
		url: "/FileSeller/archivo/comentarios/" + id,
		dataType: "JSON",
		success: function (data) {
			comentarios.html ("");
			if (data["status"] == "error") {
				alert (data["error"]);
				return;
			}
			if (data["comentarios"].length == 0) {
				comentarios.append (msjNoHayComents.clone ());
			} else
				for (var i in data["comentarios"]) {
					var c = data["comentarios"][i];
					var com = tempComentario.clone ();
					if (admin || correoUsuario == c.usuario)
						com.find (".fa-times").attr ("onclick", "eliminarComentario (" + c.idCom + ")");
					else
						com.find (".fa-times").hide ();
					com.find (".aColor").css ("color", "#" + c.color);
					if (!c.inactivo)
						com.find (".aColor").attr ("href", "/FileSeller/usuario/perfil/" + c.usuario);
					if (!c.inactivo) {
						com.find (".inactivoComentario").hide ();
					}
					if (c.duenio) {
						com.find (".duenioComentario").show ();
						com.addClass ("mio");
					} else {
						com.addClass ("otro");
						com.find (".duenioComentario").hide ();
					}
					com.find (".nomComentario").html (c.nombre);
					com.find (".com_comentario").html (c.comentario);
					comentarios.append (com);
				}

			if (correoUsuario == "")
				comentarios.append (tempIniciesesion.clone ());
		},
		error: function () {
			alert ("Error!");
		}
	});
}

function eliminarComentario (id) {
	pregunta ("Dese borrar " + (admin ? "el" : "su") + " comentario?", "eliminarPosta", id);
}

function eliminarPosta (id) {
	$.ajax ({
		type: "POST",
		url: "/FileSeller/archivo/eliminarComentario",
		dataType: "JSON",
		data: {
			id: id
		},
		success: function (data) {
			if (data["status"] == "error") {
				alert (data["error"]);
				return;
			}

			cargarComentarios ();
		},
		error: function () {
			alert ("Error!");
		}
	});
}

btnEnviar.click (function () {
	if (txtComentario.val ().trim () == "")
		return;

	$.ajax ({
		type: "POST",
		url: "/FileSeller/archivo/comentar/" + id,
		dataType: "JSON",
		data: {
			comentario: txtComentario.val ()
		},
		success: function (data) {
			if (data["status"] == "error") {
				alert (data["error"]);
				return;
			}

			cargarComentarios ();
			txtComentario.val ("");
		},
		error: function () {
			alert ("Error!");
		}
	});
	console.log (txtComentario.val ());
});