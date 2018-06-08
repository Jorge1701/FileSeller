<?php

require_once "clases/mensajes.php";
require_once "clases/template.php";

class ControladorMensajes extends ControladorIndex {

	function obtenerConversaciones ($params = array ()) {
		header ('Content-type: application/json');

		$id = Auth::estaLogueado ();

		if ($id == false) {
			$response_array['status'] = 'error';
			$response_array['error'] = 'Debe estar logueado';
			echo json_encode ($response_array);
			return;
		}

		$usuario_logueado = (new Usuario ())->obtenerPorId ($id);
		$conversaciones = (new Mensajes ())->getConversaciones ($usuario_logueado->getCorreo ());

		$response_array['status'] = 'success';
		$response_array['conversaciones'] = $conversaciones;
		echo json_encode ($response_array);
	}

	function conversacioncon ($params = array ()) {
		header ('Content-type: application/json');

		$id = Auth::estaLogueado ();

		if ($id == false) {
			$response_array['status'] = 'error';
			$response_array['error'] = 'Salga de aca';
			echo json_encode ($response_array);
			return;
		}

		$usuario_logueado = (new Usuario ())->obtenerPorId ($id);

		$mensajes = (new Mensajes ())->getMensajes ($usuario_logueado->getCorreo (), $params[0]);

		$response_array['status'] = 'success';
		$response_array['mensajes'] = $mensajes;
		echo json_encode ($response_array);
	}

	function existeConversacion ($params = array ()) {
		header ('Content-type: application/json');

		$id = Auth::estaLogueado ();

		if ($id == false || !isset ($params[0])) {
			$response_array['status'] = 'error';
			$response_array['error'] = 'Debe estar logueado';
			echo json_encode ($response_array);
			return;
		}

		$existe_seleccionado = "no";
		$hay = "no";
		$usuario_seleccionado = (new Usuario ())->obtenerPorCorreo ($params[0]);
		if ($usuario_seleccionado != null)
			$existe_seleccionado = "si";

		if ($usuario_seleccionado != null && (new Mensajes ())->hayConversacion ($id, $usuario_seleccionado->getId ())) {
			$hay = "ok:void";
		}

		$response_array['status'] = 'success';
		$response_array['existe'] = $existe_seleccionado;
		$response_array['hay'] = $hay;
		echo json_encode ($response_array);
	}

	function enviar ($params = array ()) {
		$id = Auth::estaLogueado ();

		if ($id == false) {
			$response_array['status'] = 'error';
			$response_array['error'] = 'Debe estar logueado';
			echo json_encode ($response_array);
			return;
		}

		if (isset ($_POST["mensaje"]) && isset ($params[0])) {
			$usuario_logueado = (new Usuario ())->obtenerPorId ($id);
			if ($usuario_logueado->getCorreo () == $params[0]) {
				$response_array['status'] = 'error';
				$response_array['error'] = 'Forever alone';
				echo json_encode ($response_array);
				return;
			}
			(new Mensajes ())->enviarMensaje ($usuario_logueado->getCorreo (), $params[0], $_POST["mensaje"]);
		}

		$response_array['status'] = 'success';
		echo json_encode ($response_array);
	}

	function chat ($params = array ()) {
		$tpl = Template::getInstance ();
		$tpl->mostrar ("ver_mensaje2", array ());
	}
}

?>
