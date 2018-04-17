<?php

require_once ("clases/template.php");
require_once ("clases/session.php");


class ControladorUsuario extends ControladorIndex {


<<<<<<< HEAD
	/*function registro () {
		$tpl = Template::getInstance();
		$tpl->mostrar("registro");
	}*/	
=======
	function registro () {
	$datos = array(
		"active_registrarse" => "active",
	);
	$tpl = Template::getInstance();
	$tpl->mostrar("registro",$datos);
	}	
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6

	function perfil () {
		$datos = array(
			"active_perfil" => "active",
		);
		$tpl = Template::getInstance();
		$tpl->mostrar("perfil",$datos);
	}

	function logout(){
		Session::init();
		Session::destroy();
		$this->redirect("inicio","principal");
	}

	function editar_perfil ($params) {

	}
}

?>