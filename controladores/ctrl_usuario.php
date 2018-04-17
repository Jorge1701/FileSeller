<?php

require_once ("clases/template.php");
require_once ("clases/session.php");


class ControladorUsuario extends ControladorIndex {

	function inicio () {
		
	}

	/*function registro () {
		$tpl = Template::getInstance();
		$tpl->mostrar("registro");
	}*/	

	function perfil () {
		$tpl = Template::getInstance();
		$tpl->mostrar("perfil");
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