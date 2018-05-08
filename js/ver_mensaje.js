var listaMsjs = document.getElementById ("listaMsjs");

if (listaMsjs != null)
	document.getElementById ("chat").scrollTop = listaMsjs.getClientRects ()[0].height;