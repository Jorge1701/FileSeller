<?php

class ControladorIndex {

	function cargarControlador ($controller) {
		$controlador = "ctrl_" . $controller;
		$controlador_clase = "Controlador" . ucfirst ($controller);
		$strFileController = "controladores/" . $controlador . ".php";

		if (!is_file ($strFileController)) {
			$strFileController = "controladores/ctrl_index.php";
			$controlador_clase = "ControladorIndex";
		}

		require_once $strFileController;
		$controllerObj = new $controlador_clase ();
		return $controllerObj;
	}

	function cargarAccion ($controllerObj, $action, $params) {
		$controllerObj->$action ($params);
	}

	function ejecutarAccion ($controllerObj, $action, $params) {
		if (isset ($action) && method_exists($controllerObj, $action)) {
			$this->cargarAccion ($controllerObj, $action, $params);
		} else {
			$this->cargarAccion ($controllerObj, "page_not_found", $params);
		}
	}

	function getUrl ($controlador = "inicio", $accion = "page_not_found", $params = array ()) {
		$url = URL_BASE . $controlador . "/" . $accion . "/";
		
		foreach ($params as $key => $value)
			$url .= $value . "/";

		return $url;
	}

	function redirect ($controlador = "inicio", $accion = "page_not_found", $params = array ()) {
		header ("Location:" . $this->getUrl ($controlador, $accion, $params));
	}

	function page_not_found () {
		echo "pagina no encontrada";
	}
}

?>