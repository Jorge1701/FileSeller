<?php

class ControladorInicio extends ControladorIndex {
	
	function principal () {
		$datos = array(
			"active_inicio" => "active",
		);
		$tpl = Template::getInstance();
		$tpl->mostrar('inicio',$datos);
	}

	function ayuda () {
		$datos = array(
			"active_ayuda" => "active",
		);
		$tpl = Template::getInstance();
		$tpl->mostrar('ayuda',$datos);	
	}
}

?>