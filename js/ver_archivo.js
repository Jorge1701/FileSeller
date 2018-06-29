function salir(){

	window.location=url_ver_archivo+idArchivo;
}



function reporteExito(){
	window.onload($("#fin").modal());


}

function comprarArchivo(idArchivo){

	var mensaje = document.getElementById("mensajeCompra");
	var nro_tarjeta = $("#nroTarjeta").val();
	var pin = $("#pin").val();

	if(nro_tarjeta == ""){
		mensaje.style.color = 'red';
		mensaje.innerText = 'Número de tarjeta inválido';
		return;
	}

	if(pin == ""){
		mensaje.style.color = 'red';
		mensaje.innerText = 'Pin inválido';
		return;
	}


	$.ajax ({
		type: "POST",
		url: "/FileSeller/archivo/comprar/" + idArchivo,
		dataType: "JSON",
		success: function (data) {
			
			if(data.status == 'error'){
				mensaje.style.color = 'red';
				mensaje.innerText = 'Ha ocurrido un error con su compra';
			}else{	
				$("#btnDescargar").trigger("click");
				$("#modalCompras").modal("hide");
				$("#compraExito").modal("show");
				window.location='/FileSeller/archivo/descargar/'+ubicacion;
				//salir();
			}
		},
		error: function () {
			alert ("Error!");
		}
	});
}

function puntuar(punto){
	$("#aux").val(punto);
	document.getElementById("form").submit();
}



$('.star-rating').click(function(){
	if ($('.open-rating').css('visibility') == 'hidden' ) {
		$('.open-rating').attr('style','visibility: visible');
	}else{

		$('.open-rating').attr('style','visibility: hidden');
	}
});

$('.1').hover(function() {
	$('.1').attr('src',url_base+'img/llena.png');

}, function() {
	$('.1').attr('src',url_base+'img/vacia.png');
});

$('.2').hover(function() {
	$('.2,.1').attr('src',url_base+'img/llena.png');

}, function() {
	$('.2,.1').attr('src',url_base+'img/vacia.png');
});

$('.3').hover(function() {
	$('.3,.2,.1').attr('src',url_base+'img/llena.png');

}, function() {
	$('.3,.2,.1').attr('src',url_base+'img/vacia.png');
});

$('.4').hover(function() {
	$('.4,.3,.2,.1').attr('src',url_base+'img/llena.png');

}, function() {
	$('.4,.3,.2,.1').attr('src',url_base+'img/vacia.png');
});

$('.5').hover(function() {
	$('.5,.4,.3,.2,.1').attr('src',url_base+'img/llena.png');

}, function() {
	$('.5,.4,.3,.2,.1').attr('src',url_base+'img/vacia.png');
});

var txtComentario = $("#comentariooo");
var btnEnviar = $("#btnEnviar");
var comentarios = $("#comentarios");

var tempComentario = $("#tempComentario");
var msjNoHayComents = $("#msjNoHayComents");
var tempIniciesesion = $("#iniciesesion");
let formEnviar = $("#enviar_mensaje");



$(document).ready (function () {
	
	if (correoUsuario == "")
		$("#enviar_comentario").hide ();
	CargarEstrellas();
	cargarComentarios ();
});


function CargarEstrellas(){

	if( puntuo !="no"){
		for (var i = puntuo; i >= 1; i--) {
			$('.'+i).attr('src',url_base+'img/llena.png');
		}
	}
}


function cargarComentarios () {
	$.ajax ({
		type: "POST",
		url: "/FileSeller/archivo/comentarios/" + idArchivo,
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
;

txtComentario[0].onkeypress = function(e){
	if((e.keyCode ? e.keyCode: e.which) == 13)
		formEnviar.submit();
};


formEnviar.submit (function () {
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
	return false;
});
