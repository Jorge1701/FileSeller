<?php

class ControladorInicio extends ControladorIndex {
	
	function principal () {
		$tpl = Template::getInstance();
		$tpl->mostrar('inicio');
	}
}

?>