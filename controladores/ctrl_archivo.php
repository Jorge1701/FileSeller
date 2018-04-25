<?php

require_once ("clases/archivo.php");
require_once ("clases/usuario.php");
class ControladorArchivo extends ControladorIndex {

	function ver ($params) {

		if( !empty($params[1]) ){
			$ubicacion = $params[1]."/".$params[2];
			$ok = (new Archivo())->bajarArchivo($ubicacion);
		}else{
			echo "vacio";

		}

		$archivo = (new Archivo())->getArchivo(current($params));

		$user  = (new Usuario())->obtenerPorId($archivo->getDuenio());
		$datos  = array('archivo' => $archivo ,
			'user' => $user);

		$tpl = Template::getInstance();

		$tpl->mostrar("ver_archivo",$datos);


	}


	function subir () {
		$tpl = Template::getInstance();

		if(isset($_FILES["archivo"]) && isset($_POST["nombre"])){
			$subidoOK = (new Archivo())->subirArchivo(Auth::estaLogueado());
			if($subidoOK == 0){
				$datos = array(
					"active_incio" => "active",
					"archivo_subido" => "Su archivo fue subido exitosamente",
				);
				$tpl->mostrar("inicio",$datos);
				return;
			}elseif ($subidoOK == 2) {
				$mensaje = "El archivo excede el tamaño maximo soportado (100MB)";
			}else{
				$mensaje = "Hubo un error al subir el archivo, Reintente";	
			}
			$datos = array(
				"active_subir_archivo" => "active",
				"nombre_archivo" => $_POST["nombre"],
				"descripcion_archivo" => $_POST["descripcion"],
				"precio_archivo" => $_POST["precio"],
				"mensaje" => $mensaje,
			);
			$tpl->mostrar("subir_archivo",$datos);
		}else{
			$datos = array(
				"active_perfil" => "active",
			);
			$tpl->mostrar("subir_archivo",$datos);
		}
	}



	function editar ($params) {

	}
}

?>