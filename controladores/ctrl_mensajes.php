<?php

require "clases/mensajes.php";
require "clases/usuario.php";
require_once "clases/template.php";

class ControladorMensajes extends ControladorIndex {

	function chat ($params = array ()) {
		$usuario_logueado = "Jorge";
		// TODO: Chequear si el param 0 esta ingresado
		// Si no: Ingresarle el nombre del usuario
		// TODO: Chequear si el param 1 esta ingresado
		// Si no: Agregar dato para solo abrir listado de contactos

		$tpl = Template::getInstance();

		$mensajes = new Mensajes ();
		$usuario = new Usuario ();

		if (isset ($_POST["mensaje"])) {
			$mensajes->enviarMensaje ($usuario_logueado, $params[0], $_POST["mensaje"]);
		}

		// TODO: chequear params[0] igual al nombre de usuario logueado
		//Session::init ();
		//if (Session::get ("usuario_nombre") === params[0]) {}

	 	$chats = $mensajes->getChats ($usuario_logueado);

	 	$existe = false;

	 	foreach ($chats as $c)
	 		if ($c === $params[0]) {
	 			$existe = true;
	 			break;
	 		}

	 	$conversacion = $mensajes->getChat ($usuario_logueado, $params[0]);

	 	if (!$existe)
		 	$datos = array(
		 		"nom_usuario" => $params[0],
		 		"usuarios" => $chats
		    );
	 	else
		 	$datos = array(
		 		"nom_usuario" => $params[0],
		 		"usuarios" => $chats,
		 		"seleccionado" => $params[0],
		 		"mensajes" => $conversacion
		    );

	 	$datos = array(
	 		"usuario" => "Pepe",
	 		"mensajes" => $mensajes->getChat ("Juan", "Pepe")
	    );
	    
	    $tpl->mostrar ("ver_mensaje", $datos);
	}
}

?>