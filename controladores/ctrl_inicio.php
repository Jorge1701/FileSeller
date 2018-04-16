<?php

require_once ("clases/usuario.php");

class ControladorInicio extends ControladorIndex {

	function principal () {


		$usuario = new Usuario(); //Obtener el usuario con lo que esté guardado en la sesion( cedula, correo)
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
}

?>