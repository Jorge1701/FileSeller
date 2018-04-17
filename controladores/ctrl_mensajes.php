<?php

require "clases/mensajes.php";
require_once "clases/template.php";

class ControladorMensajes extends ControladorIndex {

	function chat ($params = array ()) {
		$usuario_logueado = (new Usuario ())->obtenerPorId (Auth::estaLogueado ());

		$tpl = Template::getInstance();
		if ($usuario_logueado == false) {
			$this->redirect ("inicio", "principal");
		} else {
			$mensaje = new Mensajes ();

			$conversaciones = $mensaje->getChats ($usuario_logueado->getCorreo ());
			if (!isset ($params[0])) {
				$datos = array(
					"usuarios" => $conversaciones,
					"sin_seleccionar" => "si"
				);
			} else {
				if (isset ($_POST["mensaje"])) {
					$mensaje->enviarMensaje ($usuario_logueado->getCorreo (), $params[0], $_POST["mensaje"]);
				}

				$existe = false;

				foreach ($conversaciones as $c)
					if ($c === $params[0]) {
						$existe = true;
						break;
					}

				if (!$existe)
					$datos = array(
						"usuarios" => $conversaciones,
						"correo" => $params[0]
					);
				else {
					$mensajes = $mensaje->getChat ($usuario_logueado->getCorreo (), $params[0]);
					$datos = array(
						"usuarios" => $conversaciones,
						"seleccionado" => (new Usuario ())->obtenerPorCorreo ($params[0]),
						"mensajes" => $mensajes
					);
				}
			}

			$tpl->mostrar ("ver_mensaje", $datos);
		}
	}
}

?>