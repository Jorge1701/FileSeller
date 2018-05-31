var listaMsjs = document.getElementById ("listaMsjs");

if (listaMsjs != null)
	document.getElementById ("chat").scrollTop = listaMsjs.getClientRects ()[0].height;

var tempLinkContacto = $("#linkContacto");
var noTieneContactos = $("#noTieneContactos");
var noHayMensajes = $("#msjNoHayMensajes");
var tempMsjOtro = $("#msjOtro");
var tempMsjMio = $("#msjMio");
var tempFecha = $("#fechaaaA");
var tempmsjNuevos = $("#msjNuevoooososs");
var tempnoUsuReg = $("#msjnousurcc");
var tmepleidohaqui = $("#leidohastaaqui");

var conversacionAbierta = null;

$(document).ready (function () {
	var partes = window.location.toString ().split ("/");
	var correo = partes[partes.length - 1].includes ("@") ? partes[partes.length - 1] : "";

	if (correo != "")
		$.ajax ({
			type: "POST",
			url: "/FileSeller/mensajes/existeConversacion/" + correo,
			dataType: "JSON",
			data: {},
			success: function (data) {
				if (data["status"] == "error") {
					alert (data["error"]);
					return;
				}

				if (data["existe"] == "no") {
					$("#listaMsjs").html ("");
					var msjsjsj = tempnoUsuReg.clone ();
					msjsjsj.find (".nombre").html (correo);
					$("#listaMsjs").append (msjsjsj);
				}

				if (data["existe"] == "si" && data["hay"] == "no") {
					conversacionAbierta = correo;
					$("#listaMsjs").html ("");
					noHayMensajes.find (".nombre").html (correo);
					$("#listaMsjs").append (noHayMensajes);
				}

				if (data["hay"] == "ok:void")
					cargarContactos (correo, "si");
				else
					cargarContactos ();
			},
			error: function () {
				alert ("Error!");
			}
		});
	else
		cargarContactos ();
});

function cargarContactos (seleccionado = "", cargar = "") {
	$.ajax ({
		type: "GET",
		dataType: "json",
		url: "/FileSeller/mensajes/obtenerConversaciones",
		data: {},
		success: function (data) {
			$("#contactos").html ("");
			if (data["status"] == "success") {
				if (data["conversaciones"].length == 0) {
					$("#contactos").append (noTieneContactos);
				} else {
					for (var i in data["conversaciones"]) {
						var c = data["conversaciones"][i];
						var contacto = tempLinkContacto.clone ();
						contacto.find (".img-usuario").attr ("src", "/FileSeller/" + c.imagen);
						contacto.find (".txtNombreContacto").html (c.nombre);
						contacto.attr ("onclick", "cargarConversacion ('" + i + "','" + c.nombre + "','" + c.correo + "')")
						contacto.attr ("id", "id" + i)
						if (seleccionado != "" && seleccionado == c.correo) {
							contacto.find (".contacto").addClass ("seleccionado");
							if (cargar == "si")
								cargarConversacion (i, c.nombre, c.correo);
						}
						if (c.cant == 0) {
							contacto.find (".num-msj").hide ();
						} else {
							contacto.find (".num-msj").html (c.cant);
						}
						$("#contactos").append (contacto);
					}
				}
			} else
				alert (data["error"]);
		},
		error: function () {
			alert ("Error!");
		}
	});
}

function cargarConversacion (id, nombre, contacto) {
	$("#txtNombre").html (nombre);
	var i = 0;
	while ($("#id" + i).length != 0) {
		$("#id" + i).find (".contacto").removeClass ("seleccionado");
		i++;
	}
	$("#id" + id).find (".contacto").addClass ("seleccionado");
	$("#id" + id).find (".num-msj").hide ();
	llenarMensajes (contacto);
}

function llenarMensajes (contacto) {
	$.ajax ({
		type: "POST",
		dataType: "JSON",
		url: "/FileSeller/mensajes/conversacioncon/" + contacto,
		data: {},
		success: function (data) {
			$("#listaMsjs").html ("");
			if (data["status"] == "error") {
				alert (data["error"]);
				return;
			}

			if (data["mensajes"].length == 0) {
				noHayMensajes.find (".nombre").html (contacto);
				$("#listaMsjs").append (noHayMensajes);
			} else {
				var fAnterior = "";
				var nuevos = false;
				var leido = false;
				for (var i in data["mensajes"]) {
					var m = data["mensajes"][i];
					if (fAnterior != m.dia) {
						var fecha = tempFecha.clone ();
						fecha.html (m.dia);
						$("#listaMsjs").append (fecha);
						fAnterior = m.dia;
					}
					if (!nuevos && !m.propio && !m.visto) {
						var nnn = tempmsjNuevos.clone ();
						$("#listaMsjs").append (nnn);
						nuevos = true;
					}

					if (!leido && m.propio && !m.visto) {
						console.log ("no leido");
						var nnn = tmepleidohaqui.clone ();
						nnn.find (".nombre").html (contacto);
						$("#listaMsjs").append (nnn);
						leido = true;
					}

					var msj = m.propio ? tempMsjMio.clone () : tempMsjOtro.clone ();
					msj.find (".mensaje-texto").html (m.mensaje);
					msj.find (".mensaje-hora").html (m.hora);
					$("#listaMsjs").append (msj);
				}
			}

			if (listaMsjs != null)
				document.getElementById ("chat").scrollTop = listaMsjs.getClientRects ()[0].height;
			conversacionAbierta = contacto;
		},
		error: function () {
			alert ("Error!");
		}
	});
}

$("#btnEnviar").click (function () {
	if ($("#msjAEnviar").val ().trim () === "")
		return;

	if (conversacionAbierta === null)
		return; 

	$.ajax ({
		type: "POST",
		dataType: "JSON",
		url: "/FileSeller/mensajes/enviar/" + conversacionAbierta,
		data: {
			mensaje: $("#msjAEnviar").val ()
		},
		success: function (data) {
			if (data["status"] == "error") {
				alert (data["error"]);
				return;
			}
			$("#msjAEnviar").val ("");
			cargarContactos (conversacionAbierta, "si");
		},
		error: function () {
			alert ("Error!");
		}
	});
});