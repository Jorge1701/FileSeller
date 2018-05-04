<?php

require_once ("clases/archivo.php");
require_once ("controladores/ctrl_index.php");
require_once ("clases/usuario.php");

class ControladorArchivo extends ControladorIndex {

	function descargar ($params = array ()) {
		(new Archivo ())->bajarArchivo ("uploads/" . $params[1]);
	}

	function ver ($params = array ()) {
		$tpl = Template::getInstance();
		$archivo = (new Archivo())->obtenerPorId ($params[0]);
		$duenio = (new usuario())->obtenerPorId($archivo->getDuenio());
		$datos = array(
			"archivo" => $archivo,
			"duenio"  => $duenio,
			"url_ver_perfil_duenio" => (new ControladorIndex())->getUrl("usuario","perfil"),
		);
		$tpl->mostrar("ver_archivo",$datos);
	}


	function subir () {
		$tpl = Template::getInstance();
		$id = Auth::estaLogueado();
		if(isset($_FILES["archivo"]) && isset($_POST["nombre"])){
			$subidoOK = (new Archivo())->subirArchivo($id);
			if($subidoOK == 0){
				$datos = array(
					"archivo_subido" => "Su archivo fue subido exitosamente",
				
					"active_incio" => "active",//Activar el boton inicio del header
					"lista_archivos" => (new Archivo())->getListado(),//Lista de futuras recomendaciones
				);
				$tpl->mostrar("inicio",$datos);
				return;
			}elseif ($subidoOK == 1) {
				$mensaje = "El archivo excede el tamaño maximo soportado (100MB)";
			}else{
				$mensaje = "Hubo un error al subir el archivo, es posible que haya un problema en la configuracion del servidor, o que no se haya podido mover el archivo.";	
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
			if(!$id){
				(new ControladorIndex())->redirect("inicio","principal");
			}
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
