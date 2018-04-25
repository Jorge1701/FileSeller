<?php

require_once "clases/mensajes.php";
require_once "clases/template.php";

class ControladorMensajes extends ControladorIndex {

	function chat ($params = array ()) {
		$id = Auth::estaLogueado ();

		// Si no hay usuario logueado regresar al inicio
		if ($id == false) {
			$this->redirect ("inicio", "principal");
			return;
		}

		// Obtener usuario logueado
		$usuario_logueado = (new Usuario ())->obtenerPorId ($id);
		// Obtener conversaciones del usuario logueado
		$conversaciones = (new Mensajes ())->getConversaciones ($usuario_logueado->getCorreo ());

		// En el parametro 0 puede venir un correo
		// Casos:
		// Que no ingrese ninguno  (NO seleccionado, NO existe)
		// Ingreso un correo de un usuario no registrado (SI seleccionado, NO existe)
		// Correo de usuario registrado con el que NO tiene conversacion abierta (SI seleccionado, SI existe pero no va a estar en la lista de conversaciones)
		// Correo de usuario registrado con el que SI tiene conversacion abierta (SI seleccionado, SI existe)
		$seleccionado = "no";
		$existe_seleccionado = "no";
		$correo_seleccionado = "";
		$usuario_seleccionado = NULL;
		if (isset ($params[0]) && $params[0] !== "") {
			$correo_seleccionado = $params[0];
			$seleccionado = "si";
			$usuario_seleccionado = (new Usuario ())->obtenerPorCorreo ($params[0]);
			if ($usuario_seleccionado !== null)
				$existe_seleccionado = "si";
		}

		$conversacion_abierta_con_seleccionado = "no";
		$mensajes = NULL;
		if ($existe_seleccionado === "si") {
			// Enviar mensaje
			if (isset ($_POST["mensaje"])) {
				(new Mensajes ())->enviarMensaje ($usuario_logueado->getCorreo (), $usuario_seleccionado->getCorreo (), $_POST["mensaje"]);
				// Obtener conversaciones nuevamente en caso de que el mensaje fue a una nueva persona
				$conversaciones = (new Mensajes ())->getConversaciones ($usuario_logueado->getCorreo ());
			}

			// Obtener mensajes en el chat
			$mensajes = (new Mensajes ())->getMensajes ($usuario_logueado->getCorreo (), $usuario_seleccionado->getCorreo ());
		
			foreach ($conversaciones as $c)
				if ($c->getCorreo () === $usuario_seleccionado->getCorreo ()) {
					$conversacion_abierta_con_seleccionado = "si";
					break;
				}
		}

		$tpl = Template::getInstance ();
		$datos = array (
			"conversaciones" => $conversaciones,
			"seleccionado" => $seleccionado,
			"correo_seleccionado" => $correo_seleccionado,
			"existe_seleccionado" => $existe_seleccionado,
			"conversacion_abierta_con_seleccionado" => $conversacion_abierta_con_seleccionado,
			"mensajes" => $mensajes,
			"usuario_seleccionado" => $usuario_seleccionado,
			"active_mensajes" => "active"
		);
		$tpl->mostrar ("ver_mensaje", $datos);
	}
}

?>
