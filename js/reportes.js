
//0:idArchivo , 1:nombreArchivo , 2:idReporte, 3:tipo, 4:descripcion
function masInfo(idArchivo,nombre,idReporte,tipo,descripcion){
	$('#listMas').empty();
	$('#listMas').append('<li class="list-group-item"><strong>Nombre:</strong> '+nombre+'</li>');
	$('#listMas').append('<li class="list-group-item"><strong>Tipo De Reporte:</strong> '+tipo+'</li>');
	$('#listMas').append('<li class="list-group-item"><strong>Descripcion:</strong> '+descripcion+'</li>');
	$('#listMas').append('<li class="list-group-item"><strong>Cantidad De Reportes Iguales:</strong> '+3+'</li>');
	$('#masInfo').modal();

}