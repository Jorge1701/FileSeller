<?php

require_once ("clases/archivo.php");
require_once ("controladores/ctrl_index.php");
require_once ("clases/usuario.php");

class ControladorArchivo extends ControladorIndex {

	function descargar($params = array()) {
		(new Archivo ())->bajarArchivo("uploads/" . $params[1]);
	}

	function ver($params = array()) {
		$tpl = Template::getInstance();
		$archivo = (new Archivo())->obtenerPorId($params[0]);
		$duenio = (new usuario())->obtenerPorId($archivo->getDuenio());
		$datos = array(
			"archivo" => $archivo,
			"duenio" => $duenio,
			"url_ver_perfil_duenio" => (new ControladorIndex())->getUrl("usuario", "perfil"),
		);
		$tpl->mostrar("ver_archivo", $datos);
	}

	function eliminar($params = array()) {
		$tpl = Template::getInstance();
		$usuario_logueado =  (new usuario())->obtenerPorId(Auth::estaLogueado());
		$flag = false;

		if($usuario_logueado != null){

			$a = (new Archivo())->obtenerPorId($params[0]);
			$duenio = (new usuario())->obtenerPorId($a->getDuenio());

			if($usuario_logueado->getId() == $duenio->getId() || $usuario_logueado->getCorreo() == 'admin@prueba.com'){

				if($usuario_logueado->getCorreo() == 'admin@prueba.com'){

					$contenido = "Su archivo: ".$a->getNombre()." ha sido eliminado por un admin, por mas info contactenos.";

					if((new Notificacion())->agregarNotif($duenio->getId(),$contenido)){
						$flag = true;
					}
				}

				if ((new Archivo())->eliminarArchivo($a->getId())) {

					if($flag){
						$datos = array(
							"archivo_subido" => "Archivo eliminado correctamente",
							"lista_archivos" => $nuevos_archivos,
						);

					}else{
						$datos = array(
							"archivo_subido" => "Archivo eliminado correctamente(Fallo notificar)",
							"lista_archivos" => $nuevos_archivos,
						);
					}

					$nuevos_archivos = (new Archivo())->getArchivosUser($duenio->getId());
					

					$tpl->mostrar("inicio",$datos);

					}else{ //error al eliminar

						$datos = array(
							"archivo_subido" => "Hubo un error al procesar su solicitud",
						);

						$tpl->mostrar("inicio",$datos);
					}

				}else{

					$datos = array(
						"archivo_subido" => "Archivo Elimina.. opa te la creiste, suerte la proxima!",
					);

					$tpl->mostrar("inicio", $datos);

				}


				}else{//redirigir al inicio
					$datos = array(
						"archivo_subido" => "Debe loguearse para ver esta pagina",
					);

					$tpl->mostrar("inicio",$datos);
				}

			}



			function subir() {

				$tpl = Template::getInstance();
				$id = Auth::estaLogueado();
				if (isset($_FILES["archivo"]) && isset($_POST["nombre"])) {
					$subidoOK = (new Archivo())->subirArchivo($id);
					if ($subidoOK == 0) {
						$datos = array(
							"archivo_subido" => "Su archivo fue subido exitosamente",
                "active_incio" => "active", //Activar el boton inicio del header
                "lista_archivos" => (new Archivo())->getListado(), //Lista de futuras recomendaciones
            );
						$tpl->mostrar("inicio", $datos);
						return;
					} elseif ($subidoOK == 1) {
						$mensaje = "El archivo excede el tamaño maximo soportado (100MB)";
					} else {
						$mensaje = "Hubo un error al subir el archivo, es posible que haya un problema en la configuracion del servidor, o que no se haya podido mover el archivo.";
					}
					$datos = array(
						"active_subir_archivo" => "active",
						"nombre_archivo" => $_POST["nombre"],
						"descripcion_archivo" => $_POST["descripcion"],
						"precio_archivo" => $_POST["precio"],
						"mensaje" => $mensaje,
					);
					$tpl->mostrar("subir_archivo", $datos);
				} else {

					if (!$id) {
						(new ControladorIndex())->redirect("inicio", "principal");
					}
					$datos = array(
						"active_perfil" => "active",
					);
					$tpl->mostrar("subir_archivo", $datos);
				}
			}

		}

		?>
