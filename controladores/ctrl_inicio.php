<?php

<<<<<<< HEAD
=======

>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
require_once ("clases/usuario.php");
require_once ("clases/auth.php");
//require_once("clases/subir_imagen.php");

class ControladorInicio extends ControladorIndex {
	
	function principal () {
		$datos = array(
			"active_inicio" => "active",
		);
		$tpl = Template::getInstance();
		$tpl->mostrar('inicio',$datos);
	}

	function login(){

		if(isset($_POST["correo"]) && isset($_POST["password"])){

			$usr = new Usuario();
			$correo = $_POST["correo"]; 
			$pass = sha1($_POST["password"]);
			if($usr->login($correo,$pass)){
				$this->redirect("inicio","principal");
			}else{
				$mensaje = "Email/Contraseña incorrectos";
				$datos = array(
					"titulo" => "Iniciar sesión",
					"mensaje" => $mensaje,
				);
				$tpl = Template::getInstance();
				$tpl->mostrar('login',$datos);
			}

		}else{
			$datos = array(
<<<<<<< HEAD
				"titulo" => "Iniciar sesión",
=======
			"active_iniciarSesion" => "active",
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
			);
			$tpl = Template::getInstance();
			$tpl->mostrar('login',$datos);
		}
	}


	function registro (){
		//subirImagen();


		$mensaje = "";
		$datos = array(
			"titulo" => "Registrarse",
			"mensaje" => $mensaje,
		);
		$tpl = Template::getInstance();
		$tpl->mostrar('registro',$datos);
	}

	function subirImagen(){
<<<<<<< HEAD
=======
	}


	function ayuda () {
		$datos = array(
			"active_ayuda" => "active",
		);
		$tpl = Template::getInstance();
		$tpl->mostrar('ayuda',$datos);	
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
	}
}

?>