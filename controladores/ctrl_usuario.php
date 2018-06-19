<?php

require_once ("clases/template.php");
require_once ("clases/session.php");
require_once("clases/usuario.php");
require_once ("clases/Archivo.php");
require_once ("clases/strike.php");
require_once ("clases/Auth.php");
require_once ("controladores/ctrl_index.php");

class ControladorUsuario extends ControladorIndex {

    function registro() {
        ini_set("display_errors", 1);
        error_reporting(E_ALL & ~E_NOTICE);

        $tpl = Template::getInstance();

        $usuario = new Usuario();
        //empieza el chequeo del correo por ajax
        if (isset($_POST["check"]) && isset($_POST["correo"])) {

            header('Content-type: application/json');

            if ($usuario->chequearCorreo($_POST["correo"])) {

                $response_array['status'] = 'error';

                echo json_encode($response_array);
                return;
            } else {
                $response_array['status'] = 'success';
                echo json_encode($response_array);
                return;
            }
        }//hasta aca para chequear si esta el correo

        if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["correo"]) && isset($_POST["password"]) && isset($_POST["dia"]) && isset($_POST["mes"]) && isset($_POST["anio"])) {

            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $correo = $_POST["correo"];
            $password = sha1($_POST["password"]);

            $fecha = $_POST["anio"] . "-" . $_POST["mes"] . "-" . $_POST["dia"];

            $accion;

            if (isset($_FILES["archivo"]) && !($_FILES['archivo']['error'])) {

                $url = "uploads/" . $_FILES["archivo"]["name"];
                $img = (new Archivo())->subirImagen();

                if ($img == 1) {

                    $accion = 1;

                    if ($usuario->registro($nombre, $apellido, $correo, $password, $url, $fecha, $accion)) {

                        $datos = array(
                            "titulo" => "Registrarse",
                            "mensaje_registro" => "Registro Correcto",
                        );

                        $tpl->mostrar("registro", $datos);
                    } else {
                        $datos = array(
                            "titulo" => "Registrarse",
                            "mensaje_registro" => "Error al ingresar al usuario.",
                        );
                        $tpl->mostrar("registro", $datos);
                    }
                } else if ($img == -1) {
                    $datos = array(
                        "titulo" => "Registrarse",
                        "mensaje_registro" => "El archivo excedió el límite permitido (5MB).",
                    );
                    $tpl->mostrar("registro", $datos);
                } else {
                    $datos = array(
                        "titulo" => "Registrarse",
                        "mensaje_registro" => "Ocurrió un error al procesar su archivo, verifique el formato.",
                    );
                    $tpl->mostrar("registro", $datos);
                }
            } else {

                $accion = 0;

                if ($usuario->registro($nombre, $apellido, $correo, $password, "", $fecha, $accion)) {
                 $datos = array(
                    "titulo" => "Registrarse",
                    "mensaje_registro" => "Registro Correcto",
                );
                 $tpl->mostrar("registro", $datos);
             } else {
                $datos = array(
                    "titulo" => "Registrarse",
                    "mensaje_registro" => "Error al ingresar al usuario.",
                );

                $tpl->mostrar("registro", $datos);
            }
        }
    } else {
        $datos = array(
            "titulo" => "Registrarse",
            "active_registrarse" => "active",
        );

        $tpl->mostrar("registro", $datos);
    }
}

function perfil($correoUsuario) {
    $id = Auth::estaLogueado();
    $usuarioOtro = null;
    $archivos = null;
    $ctrlIndex = new ControladorIndex();
    $urlIniciarConversacion = null;
    $active_archivo = null;

        if (isset ($correoUsuario[0]) && $correoUsuario[0] != null){     //Si una persona quiere consultar el perfil del duenio del archivo.         
            $usuarioOtro = (new Usuario())->obtenerPorCorreo($correoUsuario[0]); 
            
            if (!$usuarioOtro->getActivo ()) {
                $ctrlIndex->redirect ("inicio", "principal");
                return;
            } else if($usuarioOtro->getId() != $id){  //Si la persona que consulta no es el propio duenio. 
                $archivos = (new Archivo())->getArchivosUser($usuarioOtro->getId());
                if(!$id){ //Si la persona que consulta no inicio session, redirigir al login al tratar de iniciar una conversacion
                    $urlIniciarConversacion = $ctrlIndex->getUrl("inicio","login");
                }else{
                    $urlIniciarConversacion = $ctrlIndex->getUrl("mensajes","chat");
                }
                
            }else{
                $usuarioOtro = null;
                $archivos = (new Archivo())->getArchivosUser($id);
                $active_archivo = "si";
            }
        }else{      //Si el usuario esta consultando su propio perfil.
            if(!$id){
                $ctrlIndex->redirect("inicio","principal");
            }
            $archivos = (new Archivo())->getArchivosUser($id);
        }

        $datos = array(
            "active_perfil" => "active",
            "active_archivo" => $active_archivo,
            "usuarioOtro" => $usuarioOtro,
            "archivos" => $archivos,
            "url_agregar_pago" => $ctrlIndex->getUrl("usuario","agregarCuenta"),
            "url_eliminar_usuario" => $ctrlIndex->getUrl("usuario","eliminarUsuario"),
            "url_editar_perfil" =>$ctrlIndex->getUrl("usuario","editarPerfil"),
            "url_iniciar_conversacion" => $urlIniciarConversacion,
            "strikes" => (new Strike ())->obtenerStrikesId (Auth::estaLogueado ())
        );
        $tpl = Template::getInstance();
        $tpl->mostrar("perfil", $datos);
    }

    function logout() {
        Session::init();
        Session::destroy();
        setcookie("correo", "", time() - 3600, "/");
        setcookie("password", "", time() - 3600, "/");
        $this->redirect("inicio", "principal");
    }

    function editarPerfil($params) {
        $id = Auth::estaLogueado();
        if(!$id){
            (new ControladorIndex())->redirect("inicio","principal");
        }
        $usuario = new Usuario();
        $usuario->setId($id);
        $usuario->setNombre($_POST["nombre"]);
        $usuario->setApellido($_POST["apellido"]);
        $usuario->setCorreo($_POST["correo"]);
        $usuario->setContrasenia((isset($_POST["password"]) && $_POST["password"] != "") ? sha1($_POST["password"]):$_POST["password_old"]);
        $usuario->setfnac($_POST["anio"]."-".$_POST["mes"]."-".$_POST["dia"]);
        $imgOK = -2;
        if($_FILES["archivo"]["error"] == UPLOAD_ERR_OK){
            $imgOK = (new Archivo())->subirImagen();
            if($imgOK == 1){
                $usuario->setImagen("uploads/" . $_FILES["archivo"]["name"]);
            }
        }else if($_FILES["archivo"]["error"] == UPLOAD_ERR_NO_FILE || $imgOK != 1){
            $usuario->setImagen($_POST["archivo_old"]);
        }
        $resultado = $usuario->editar();
        $archivos = (new Archivo())->getArchivosUser(Auth::estaLogueado());
        if($resultado > 0){
            $datos = array(
                "archivos" => $archivos,
                "mensaje_editar" => "Los datos fueron actualizados correctamente",
            );
        }else{
            $datos = array(
                "archivos" => $archivos,
                "mensaje_editar" => "No se actualizó ningun dato",
            );
        }
        $tpl = Template::getInstance();
        $tpl->mostrar("perfil", $datos);
    }

    function eliminarUsuario(){
        $id = Auth::estaLogueado();
        if(!$id){
         (new ControladorIndex())->redirect("inicio","principal");
     }
     (new Usuario())->eliminar($id);
     $this->logout();
 }


 function seguir($params){
    $usuario = new Usuario();
    $usuario->setId($params[0]);
    if($usuario->seguir($params[1])){
        header('Content-type: application/json');
        $response_array['status'] = 'success';
        echo json_encode($response_array);
    }else{
        header('Content-type: application/json');
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }
}

function dejarSeguir($params){
    $usuario = new Usuario();
    $usuario->setId($params[0]);
    if($usuario->dejarSeguir($params[1])){
        header('Content-type: application/json');
        $response_array['status'] = 'success';
        echo json_encode($response_array);
    }else{
        header('Content-type: application/json');
        $response_array['status'] = 'error';
        echo json_encode($response_array);
    }
}

function strike ($params = array ()) {
    header('Content-type: application/json');
    if (!isset ($params[0]) || !isset ($params[1]))
        $response_array["status"] = "ERR";
    else
        $response_array["status"] = (new Strike ())->registrarStrike ($params[0], $params[1]);
    
    echo json_encode($response_array);
}

}

?>
