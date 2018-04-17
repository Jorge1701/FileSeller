<?php

require_once ("clases/usuario.php");
require_once ("clases/template.php");
require_once ("clases/session.php");


class ControladorUsuario extends ControladorIndex {


	function registro () {
	$datos = array(
		"active_registrarse" => "active",
	);
	$tpl = Template::getInstance();
	$tpl->mostrar("registro",$datos);
	}	

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