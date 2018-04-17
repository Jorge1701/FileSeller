<?php

require_once ("clases/usuario.php");
require_once ("clases/auth.php");

class ControladorInicio extends ControladorIndex {
	
	function principal () {
		$id = Auth::estaLogueado();
		$usuario = null;

		if( $id != false){
			$usuario = (new Usuario())->obtenerPorId($id);
		}
		
		$datos = array(
			"titulo" => "principal",
			"usuario" => $usuario,
		);
		$tpl = Template::getInstance();
		$tpl->mostrar('inicio',$datos);
	}

	function login(){
		$datos = array(
			"titulo" => "Iniciar sesión",
		);
		$tpl = Template::getInstance();
		$tpl->mostrar('login',$datos);
	}
}

?>