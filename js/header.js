$("#btnBuscar").click (function () {
	// window.location = "Location:";
	window.location.assign($("#url_base").val () + "inicio/buscar/" + $("#busqueda").val ());
});


$("#campanaNotif").click(function(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "/FileSeller/inicio/vistaNotificacion",
		data: {},
		success: function (data) {
			if (data.status == 'success') {
				$("#notifAlert").hide();
			}
		},
		error: function (data) {
			console.log(data);
		}
	});
});

function eliminarNotificacion(idNotif){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "/FileSeller/inicio/eliminarNotificacion/"+idNotif,
		data: {},
		success: function (data) {
			if (data.status == 'success') {
				$('#'+idNotif).hide();
			}
		},
		error: function (data) {
			console.log(data);
		}
	});
}