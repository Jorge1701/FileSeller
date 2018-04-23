<?php

require_once ("clases/template.php");
require_once ("clases/session.php");
require_once ("clases/Archivo.php");
require_once ("clases/Auth.php");


class ControladorUsuario extends ControladorIndex {

	function registro () {
	$datos = array(
		"active_registrarse" => "active",
	);
	$tpl = Template::getInstance();
	$tpl->mostrar("registro",$datos);
	}

	function perfil () {
		$archivos = (new Archivo())->getArchivosUser(Auth::estaLogueado());

		$datos = array(
			"active_perfil" => "active",
			"archivos" => $archivos,
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