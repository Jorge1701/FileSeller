<?php

require_once ("clases/usuario.php");
require_once ("clases/auth.php");
require_once ("clases/archivo.php");

class ControladorInicio extends ControladorIndex {
	
	function principal () {

		//obtener el id de usuario, para obtener el ranking

		//$id = Auth::estaLogueado();

		$datos = array(
			"active_inicio" => "active",
			"lista_archivos" => (new Archivo())->getListado(),
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
				if (isset ($_POST["check"])) {
					setcookie("correo", $_POST["correo"], time() + (86400 * 30), "/");
					setcookie("password", $_POST["password"], time() + (86400 * 30), "/");
				}
				$this->redirect("inicio","principal");
			}else{
				$mensaje = "Email/Contraseña incorrectos";
				$datos = array(
					"titulo" => "Iniciar sesión",
					"mensaje" => $mensaje,
					"active_iniciarSesion" => "active"
				);
				$tpl = Template::getInstance();
				$tpl->mostrar('login',$datos);
			}

		}else{
			$datos = array(
				"active_iniciarSesion" => "active",
			);
			$tpl = Template::getInstance();
			$tpl->mostrar('login',$datos);
		}
	}

	function buscar ($params = array ()) {
		$busqueda = NULL;
		if (isset ($params[0]) && $params[0] !== "")
			$busqueda = $params[0];

		$archivos = (new Archivo ())->buscar ($busqueda);

		$tpl = Template::getInstance ();
		$datos = array (
			"busqueda" => $busqueda,
			"encontrados" => isset ($archivos),
			"archivos" => $archivos
		);
		$tpl->mostrar ("buscar", $datos);
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
