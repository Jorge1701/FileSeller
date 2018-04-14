<?php

require "clases/mensajes.php";
require_once "clases/template.php";

class ControladorMensajes extends ControladorIndex {

	function chat ($params = array ()) {
	 	$tpl = Template::getInstance();

	 	$mensajes = new Mensajes ();

	 	$datos = array(
	 		"usuario" => "Pepe",
	 		"mensajes" => $mensajes->getChat ("Juan", "Pepe")
	    );
	    
	    $tpl->mostrar ("ver_mensaje", $datos);
	}
}

?>