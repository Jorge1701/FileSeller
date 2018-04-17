<?php

require_once ("clases/usuario.php");
require_once ("clases/template.php");


class ControladorUsuario extends ControladorIndex {

	function inicio () {
		echo "<h1>ASDASDASDASD</h1>";
		if(isset($_POST["correo"])){

			$usr = new Usuario();
			$correo = $_POST["correo"]; 
			$pass = sha1($_POST["password"]);

			if($usr->login($correo,$pass)){
				echo "<h1>ASDASDASDASD</h1>";
				$this->redirect("inicio","principal");
				
				exit;
			}else{

				echo "ERROR CONTROLADOR LOGIN";
			}

		}

		$tpl = Template::getInstance();
		$tpl->mostrar('login',array());

	}

	function registro () {

	}	

	function perfil ($params) {
		
		$usuario = (new Usuario())->obtenerPorId($params[0]);
		$datos = array(
			"usuario" => $usuario,
		);
		$tpl = Template::getInstance();
		$tpl->mostrar("perfil", $datos);
	}

	function editar_perfil ($params) {

	}
}

?>