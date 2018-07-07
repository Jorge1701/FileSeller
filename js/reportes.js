

var idR=null;
function setIdReporte(idReporte){
	idR = idReporte;

}
function AZA(){
	var i =document.getElementById("faArchivo") ;
	i.className = (i.className == "fa fa-sort-alpha-up") ? "fa fa-sort-alpha-down":"fa fa-sort-alpha-up";
}
function AZT(){
	var i =document.getElementById("faTipo") ;
	i.className = (i.className == "fa fa-sort-alpha-up") ? "fa fa-sort-alpha-down":"fa fa-sort-alpha-up";
}
function verPerfil(correo){
window.location=url_perfil+correo;
url_perfil
}


function verArchivo2(id){
	window.location=url_ver_archivo+id;
}

function verArchivo(){
	window.location=url_ver_archivo+idA;
}

var idA=null;
var tipoReporte = null;
var correoDuenio=null;
//0:idArchivo , 1:nombreArchivo , 2:idReporte, 3:tipo, 4:descripcion, 5:correo
function masInfo(idArchivo,nombre,idReporte,tipo,descripcion,correo){
	idA=idArchivo;
	idR=idReporte;
	tipoReporte = tipo;
	correoDuenio = correo;
	$('#sp').attr('style','visibility: hidden');

	$('#listMas').empty();
	$('#listMas').append('<li class="list-group-item"><strong>Nombre:</strong> '+nombre+'</li>');
	$('#listMas').append('<li class="list-group-item"><strong>Tipo De Reporte:</strong> '+tipo+'</li>');
	$('#listMas').append('<li class="list-group-item"><strong>Descripcion:</strong> '+descripcion+'</li>');
	console.log("/FileSeller/archivo/cantidad/"+idA+"/"+tipo);
	$.ajax({
		type: "POST",
		url: "/FileSeller/archivo/cantidad/"+idA+"/"+tipo,
		dataType: "JSON",
		success: function (data) {
			if (data["status"] == "error") {
				alert (data["error"]);
				return;
			}else{
				$('#listMas').append('<li class="list-group-item"><strong>Cantidad De Reportes Iguales:</strong> '+data["cantidad"]+'</li>');
				$('#masInfo').modal();				
			}

		},		
		error: function () {
			console.log("Error Funcion Mas Info");
		}

	});
}



function eliminarArchivo(){
	console.log("Id Archvio "+idA);
	console.log("Tipo reporte "+tipoReporte);
	tipoReporte
	$.ajax({
		type: "POST",
		url: "/FileSeller/archivo/eliminarArchivo/",
		data: {
			id: idA,
			tipo:tipoReporte
		},
		dataType: "JSON",
		success: function (data) {
			if (data["status"] == "error") {
				alert (data["error"]);
				return;
			}else{
				finReporte();
				$('#OkEliminar').modal();			
			}

		},		
		error: function () {
			console.log("Error Funcion Eliminar Archivo");
		}

	});
	
}

function eliminarReporte(){
	
	$.ajax({
		type: "POST",
		url: "/FileSeller/archivo/eliminarReporte/",
		data: {
			id: idR
		},
		dataType: "JSON",
		success: function (data) {
			if (data["status"] == "error") {
				alert (data["error"]);
				return;
			}else{
				var fila = document.getElementById(idR);
				fila.parentNode.removeChild(fila);
				$('#eliminar').modal('toggle');
				
			}

		},		
		error: function () {
			console.log("Error Funcion Eliminar Reporte");
		}

	});

}
function finReporte(){
	
	$.ajax({
		type: "POST",
		url: "/FileSeller/archivo/eliminarReporte/",
		data: {
			id: idR
		},
		dataType: "JSON",
		success: function (data) {
			if (data["status"] == "error") {
				alert (data["error"]);
				return;
			}else{
				var fila = document.getElementById(idR);
				fila.parentNode.removeChild(fila);
			}

		},		
		error: function () {
			console.log("Error Funcion Eliminar Reporte");
		}

	});

}
function darStrike(){
	if($('#mensaje').val().trim() == ""){
		$('#sp').attr('style','visibility: visible ; color: red;margin-left: 1vw');
		return;
	}
	var mensaje = $('#mensaje').val().trim();
	$.ajax({
		type: "POST",
		url: "/FileSeller/usuario/strike/"+correoDuenio+"/"+mensaje,
		dataType: "JSON",
		success: function (data) {
			if (data["status"] == "ERR") {
				alert (data["error"]);
				return;
			}else{
				finReporte();
				
				$('#strike').modal("toggle");	
				$('#OkStrike').modal();	
			}
		},		
		error: function () {
			console.log("Error Funcion Dar Strike");
		}

	});


}