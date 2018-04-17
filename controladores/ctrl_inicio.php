<?php

require_once ("clases/usuario.php");
require_once ("clases/auth.php");
//require_once("clases/subir_imagen.php");

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

		if(isset($_POST["correo"]) && isset($_POST["password"])){

			$usr = new Usuario();
			$correo = $_POST["correo"]; 
			$pass = sha1($_POST["password"]);
			if($usr->login($correo,$pass)){
				$datos= array();
				$tpl = Template::getInstance();
				$tpl->mostrar('inicio',$datos);
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
				"titulo" => "Iniciar sesión",
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
	}
}

?>