$("#moneda").change (function () {
	$("#precio").prop ("required", $("#moneda").val () != "Gratis");
	$("#precio").prop ("disabled", $("#moneda").val () == "Gratis");
});