

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




var idA=null;
var correoDuenio=null;
var tipoReporte = "";
//0:idArchivo , 1:nombreArchivo , 2:idReporte, 3:tipo, 4:descripcion, 5:correo
function masInfo(idArchivo,nombre,idReporte,tipo,descripcion,correo){
	idA=idArchivo;
	correoDuenio = correo;
	tipoReporte = tipo;
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
	$.ajax({
		type: "POST",
		url: "/FileSeller/archivo/eliminarArchivo/",
		data: {
			id: idA,
			razon: tipoReporte
		},
		dataType: "JSON",
		success: function (data) {
			if (data["status"] == "error") {
				alert (data["error"]);
				return;
			}else{
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
function darStrike(){
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
				$('#OkStrike').modal();	
			}
		},		
		error: function () {
			console.log("Error Funcion Dar Strike");
		}

	});


}