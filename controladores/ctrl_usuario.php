<?php

require_once ("clases/usuario.php");
require_once ("clases/template.php");
require_once ("clases/session.php");


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

	function login(){
		$datos = array(
			"active_iniciarSesion" => "active",
		);
		$tpl = Template::getInstance();
		$tpl->mostrar('login',$datos);
	}

	/*function registro () {
		$datos = array(
			"active_registrarse" => "active",
		);
		$tpl = Template::getInstance();
		$tpl->mostrar("registro",$datos);
	}*/	

	function perfil () {
		$datos = array(
			"active_perfil" => "active",
		);
		$tpl = Template::getInstance();
		$tpl->mostrar("perfil",$datos);
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