<?php

require_once ("clases/usuario.php");

class ControladorInicio extends ControladorIndex {

	function principal () {
		$this->login();
		return;
		$usuario = new Usuario(); //Obtener el usuario con lo que esté guardado en la sesion(correo)
		$datos = array(
			"titulo" => "principal",
			"perfil" => $this->getUrl("usuario","perfil"),
			"inicio" => $this->getUrl("inicio","principal"),
			"usuario" => $usuario,
			//"ayuda" => $this->getUrl("inicio","ayuda"),
		);
		$tpl = Template::getInstance();
		$tpl->mostrar('inicio',$datos);
	}

	function login(){
		$datos = array(
			"titulo" => "Login",
			"perfil" => $this->getUrl("usuario","perfil"),
			"inicio" => $this->getUrl("inicio","principal"),
			//"ayuda" => $this->getUrl("inicio","ayuda"),
		);
		$tpl = Template::getInstance();
		$tpl->mostrar('login',$datos);
	}
}

?>