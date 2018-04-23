<?php

require_once ("clases/template.php");
require_once ("clases/session.php");
require_once ("clases/Archivo.php");
require_once ("clases/Auth.php");
require_once ("controladores/ctrl_index.php");


class ControladorUsuario extends ControladorIndex {

	function registro () {
	$datos = array(
		"active_registrarse" => "active",
	);
	$tpl = Template::getInstance();
	$tpl->mostrar("registro",$datos);
	}

	function perfil () {
		$id = Auth::estaLogueado();
		if(!$id){
			(new ControladorIndex())->redirect("inicio","principal");
		}
		$archivos = (new Archivo())->getArchivosUser($id);
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