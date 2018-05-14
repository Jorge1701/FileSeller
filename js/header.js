$("#btnBuscar").click (function () {
	// window.location = "Location:";
    window.location.assign($("#url_base").val () + "inicio/buscar/" + $("#busqueda").val ());
});


$("#campanaNotif").click(function(){
		$("#notifAlert").hide();
});

function eliminarNotificacion(idNotif){
	$('#'+idNotif).hide();
	
}