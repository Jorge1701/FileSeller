<?php

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
		setcookie("correo", "", time() - 3600, "/");
		setcookie("password", "", time() - 3600, "/");
		$this->redirect("inicio","principal");
	}

	function editar_perfil ($params) {

	}
}

?>