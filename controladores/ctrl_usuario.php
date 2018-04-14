<?php

require_once ("clases/usuario.php");
require_once ("clases/template.php");


class ControladorUsuario extends ControladorIndex {

	function inicio () {
		
	}

	function registro () {

	}	

	function ver_perfil ($params) {
		$tpl = Template::getInstance();

		//$usuario = (new Usuario())->getUserByCi("51117521");
		//$usuario = (new Usuario())->getUserByCorreo("correo@gmail.com");
		  $usuario = new Usuario();

		$datos = array(
			"usuario" => $usuario,
		);

		$tpl->mostrar("perfil", $datos);
	}

	function editar_perfil ($params) {

	}
}

?>