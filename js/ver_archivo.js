function salir(){

	window.location=url_ver_archivo+idArchivo;
}



function reporteExito(){
	window.onload($("#fin").modal());


}

function puntuar(punto){
 	$("#aux").val(punto);
 	document.getElementById("form").submit();
}



$('.star-rating').click(function(){
	if ($('.open-rating').css('display') == 'none' ) {
		$('.open-rating').attr('style','display: inline-block');
	}else{

		$('.open-rating').attr('style','display: none');
	}
});


$('#uno').hover(function() {
	$('#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#uno').attr('src',url_base+'img/vacia.png');
});

$('#dos').hover(function() {
	$('#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#tres').hover(function() {
	$('#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#cuatro').hover(function() {
	$('#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#cinco').hover(function() {
	$('#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#seis').hover(function() {
	$('#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#siete').hover(function() {
	$('#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#ocho').hover(function() {
	$('#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#nueve').hover(function() {
	$('#nueve,#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#nueve,#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});

$('#diez').hover(function() {
	$('#diez,#nueve,#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/llena.png');

}, function() {
	$('#diez,#nueve,#ocho,#siete,#seis,#cinco,#cuatro,#tres,#dos,#uno').attr('src',url_base+'img/vacia.png');
});
var txtComentario = $("#comentariooo");
var btnEnviar = $("#btnEnviar");
var comentarios = $("#comentarios");

var tempComentario = $("#tempComentario");
var msjNoHayComents = $("#msjNoHayComents");
var tempIniciesesion = $("#iniciesesion");

$(document).ready (function () {
	console.log ("AS");
	if (correoUsuario == "")
		$("#enviar_comentario").hide ();

	cargarComentarios ();
});

function cargarComentarios () {
	$.ajax ({
		type: "POST",
		url: "/FileSeller/archivo/comentarios/" + idArchivo,
		dataType: "JSON",
		success: function (data) {
			console.log (data);
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
		url: "/FileSeller/archivo/comentar/" + idArchivo,
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
