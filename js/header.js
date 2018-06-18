$("#btnBuscar").click (function () {
	// window.location = "Location:";
	window.location.assign($("#url_base").val () + "inicio/buscar/" + $("#busqueda").val ());
});

var vistas = false;
$("#campanaNotif").click(function(){
	if(vistas === true){
		$(".notification").removeClass("nueva");
		return;
	}
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "/FileSeller/inicio/vistaNotificacion",
		data: {},
		success: function (data) {
			if (data.status == 'success') {
				$("#notifAlert").hide();
				vistas = true;
			}
		},
		error: function (data) {
			console.log(data);
		}
	});
});

$('.notification').bind('click', function (e) {
	e.stopPropagation() 
});

function eliminarNotificacion(idNotif){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "/FileSeller/inicio/eliminarNotificacion/"+idNotif,
		data: {},
		success: function (data) {
			if (data.status == 'success') {
				$('#'+idNotif).remove();

				if($("#tabla_notificaciones tr").length == 0){
					$("#tabla_notificaciones tbody").html("<tr><th>Todas las notificaciones han sido eliminadas</th></tr>");
				}
			}
		},
		error: function (data) {
			console.log(data);
		}
	});
}