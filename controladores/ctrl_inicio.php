<?php

class ControladorInicio extends ControladorIndex {

	function principal () {

		$datos = array(
			"titulo" => "principal",
			"perfil" => $this->getUrl("usuario","perfil"),
			"inicio" => $this->getUrl("inicio","principal"),
			//"ayuda" => $this->getUrl("inicio","ayuda"),
		);
		$tpl = Template::getInstance();
		$tpl->mostrar('inicio',$datos);
	}
}

?>