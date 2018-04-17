<?php

require_once ("clases/usuario.php");
require_once ("clases/template.php");


class ControladorUsuario extends ControladorIndex {

	function inicio () {
		
	}

	function registro () {

	}	

	function perfil ($params) {
		
		$usuario = (new Usuario())->obtenerPorId($params);
		$datos = array(
			"usuario" => $usuario,
		);
		$tpl = Template::getInstance();
		$tpl->mostrar("perfil", $datos);
	}

	function editar_perfil ($params) {

	}
}

?>