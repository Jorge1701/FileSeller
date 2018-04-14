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

		$usuario = new Usuario("Alejandro","Peculio","25/07/1997",51117521,NULL,"alejandropeculio@gmail.com","lacontraseniadeale",true);
		
		$datos = array(
			"usuario" => $usuario,
		);

		$tpl->mostrar("perfil", $datos);
	}

	function editar_perfil ($params) {

	}
}

?>