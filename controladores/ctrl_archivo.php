<?php

require_once ("clases/archivo.php");
require_once ("controladores/ctrl_index.php");
require_once ("clases/archivo.php");
require_once ("clases/usuario.php");
require_once ("clases/comentarios.php");

class ControladorArchivo extends ControladorIndex {

	function descargar($params = array()) {
		(new Archivo ())->bajar("uploads/" . $params[1]);
	}

	function ver($params = array()) {
		$idUsuario = Auth::estaLogueado();
		$archivo = (new Archivo())->obtenerPorId ($params[0]);
		$duenio = (new usuario())->obtenerPorId($archivo->getDuenio());
		$res = null;
		$puntuo = $archivo->ya_puntuo($archivo->getId(),$idUsuario);
		$puntuacion = $archivo->suma($archivo->getId()) / $archivo->cantidad($archivo->getId()) ;
		if($idUsuario){

			if (isset ($_POST["reporte"])) {
				$descripcion="";
				if (isset ($_POST["descripcion"]))
					$descripcion=$_POST["descripcion"];
				(new Archivo())->reportar($archivo->getId(),$_POST["reporte"],$descripcion);
				header("Location: " . $_SERVER['REQUEST_URI']."/ok");
			}
			if (isset($params[1]) ) {
				$res="ok";
			}
			if (isset ($_POST["puntuar"])) {
				if ($puntuo == "si") {
					(new Archivo())->actualizarPuntuacio($archivo->getId(),$idUsuario,$_POST["puntuar"]);
					header("Location: " . $_SERVER['REQUEST_URI']."/ok");
				}else{
					(new Archivo())->puntuar($archivo->getId(),$idUsuario,$_POST["puntuar"]);
					header("Location: " . $_SERVER['REQUEST_URI']);
				}
			}


		}

		if (isset ($_POST["comentario"])) {
			$id = Auth::estaLogueado();
			if ($id != null) {
				(new Comentarios ())->enviarComentario ($params[0], (new Usuario ())->obtenerPorId ($id)->getCorreo (), $_POST["comentario"]);
			}
		}

		$tpl = Template::getInstance();
		$datos = array(
			"archivo" => $archivo,
			"duenio" => $duenio,
			"url_ver_perfil_duenio" => (new ControladorIndex())->getUrl("usuario", "perfil"),
			"comentarios" => (new Comentarios ())->obtenerComentarios ($params[0]),
			"reporte" => $res,
			"puntuo" => $puntuo,
			"puntuacion"=>$puntuacion
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

			if($usuario_logueado->getId() == $duenio->getId() || $usuario_logueado->esAdmin()){

				if($usuario_logueado->esAdmin()){

					$contenido = "Su archivo "."<strong>".$a->getNombre()."</strong>"." ha sido eliminado por contenido indebido.";

					if((new Notificacion())->enviar($duenio->getId(),$contenido)){
						$flag = true;
					}
				}

				if ((new Archivo())->eliminar($a->getId())) {


					$nuevos_archivos = (new Archivo())->getArchivosUser($duenio->getId());

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
			
			$nombre = $_POST["nombre"];
			$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
			$tamanio = $_FILES["archivo"]["size"];
        			$tipo = explode(".", $_FILES["archivo"]["name"])[1];  //$_FILES["archivo"]["type"];
        			$precio = isset($_POST["precio"]) ? $_POST["precio"] : "";
        			$moneda = $_POST["moneda"];
        			date_default_timezone_set('America/Montevideo');
        			$fecSubido = date("Y-m-d H:i:s");
        			
        			$subidoOK = (new Archivo())->subir($id,$nombre,$descripcion,$tamanio,$tipo,$precio,$moneda,$fecSubido);
        			if ($subidoOK == "ok") {
        				$datos = array(
        					"archivo_subido" => "Su archivo fue subido exitosamente",
                			"active_incio" => "active", //Activar el boton inicio del header
                			"lista_archivos" => (new Archivo())->getListado(), //Lista de futuras recomendaciones
                		);
        				$tpl->mostrar("inicio", $datos);
        				return;
        			} else {
        				$datos = array(
        					"active_subir_archivo" => "active",
        					"nombre_archivo" => $_POST["nombre"],
        					"descripcion_archivo" => $_POST["descripcion"],
        					"precio_archivo" => isset($_POST["precio"]) ? $_POST["precio"] : "",
        					"moneda_archivo" => $_POST["moneda"],
        					"mensaje" => $subidoOK,
        				);
        				$tpl->mostrar("subir_archivo", $datos);
        			}
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

        	function editar($params){
        		$idArchivo = $params[0];
        		if($idArchivo != null){
        			$archivo = (new Archivo())->getArchivo($idArchivo);
        			if($archivo != null){
        				$tpl = Template::getInstance();
        				
        				$datos = array(
        					"id_archivo" => $idArchivo,
        					"nombre_archivo" => $archivo->getNombre(),
        					"descripcion_archivo" => $archivo->getDescripcion(),
        					"precio_archivo" => $archivo->getPrecio() == "" ? null : $archivo->getPrecio(),
        					"moneda_archivo" => $archivo->getMoneda(),
        				);
        				$tpl->mostrar("editar_archivo", $datos);
        			}
        		}else{
        			$idArchivo = $_POST["id"];
        			$nombre = $_POST["nombre"];
        			$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
        			$precio = isset($_POST["precio"]) ? $_POST["precio"] : "";
        			$moneda = $_POST["moneda"];
        			
        			$estado = (new Archivo())->editar($idArchivo,$nombre,$descripcion,$precio,$moneda);
        			
        			$archivo = (new Archivo())->getArchivo($idArchivo);
        			$tpl = Template::getInstance();
        			
        			if($estado == "ok"){
        				$duenio = (new usuario())->obtenerPorId($archivo->getDuenio());
        				$datos = array(
        					"mensaje_editar" => "Los cambios se realizaron correctamente",
        					"archivo" => $archivo,
        					"duenio" => $duenio,
        					"url_ver_perfil_duenio" => (new ControladorIndex())->getUrl("usuario", "perfil"),
        					"comentarios" => (new Comentarios ())->obtenerComentarios ($idArchivo)
        				);
        				$tpl->mostrar("ver_archivo", $datos);
        			}else{
        				$datos = array(
        					"id_archivo" => $idArchivo,
        					"nombre_archivo" => $nombre,
        					"descripcion_archivo" => $descripcion,
        					"moneda_archivo" => $moneda,
        					"mensaje" => $estado,
        				);
        				$tpl->mostrar("editar_archivo", $datos);
        			}
        		}

        	}



        	function comentar ($params = array ()) {
        		header ('Content-type: application/json');

        		if (!isset ($params[0]) || $params[0] == "" || !isset ($_POST["comentario"])) {
        			$response_array['status'] = 'error';
        			$response_array['error'] = 'No hay id de archivo';
        			echo json_encode ($response_array);
        			return;
        		}

        		(new Comentarios ())->enviarComentario ($params[0], (new Usuario ())->obtenerPorId (Auth::estaLogueado ())->getCorreo (), $_POST["comentario"]);

        		$response_array['status'] = 'success';
        		$response_array['comentarios'] = (new Comentarios ())->obtenerComentarios ($params[0]);

        		echo json_encode ($response_array);
        	}

        	function comentarios ($params = array ()) {
        		header ('Content-type: application/json');

        		if (!isset ($params[0]) || $params[0] == "") {
        			$response_array['status'] = 'error';
        			$response_array['error'] = 'No hay id de archivo';
        			echo json_encode ($response_array);
        			return;
        		}

        		$response_array['status'] = 'success';
        		$response_array['comentarios'] = (new Comentarios ())->obtenerComentarios ($params[0]);

        		echo json_encode ($response_array);
        	}

        	function eliminarComentario ($params = array ()) {
        		header ('Content-type: application/json');

        		if (!isset ($_POST["id"]) || $_POST["id"] == "") {
        			$response_array['status'] = 'error';
        			$response_array['error'] = 'No hay id de archivo';
        			echo json_encode ($response_array);
        			return;
        		}

        		$response_array['status'] = "success";
        		(new Comentarios ())->eliminar ($_POST["id"]);

        		echo json_encode ($response_array);
        	}

        }

        ?>
