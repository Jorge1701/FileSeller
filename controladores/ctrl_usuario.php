<?php

require_once ("clases/template.php");
require_once ("clases/session.php");
require_once("clases/usuario.php");
require_once ("clases/Archivo.php");
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

                        setcookie("correo", $_POST["correo"], time() + (86400 * 30), "/");
                        setcookie("password", $_POST["password"], time() + (86400 * 30), "/");
                        $this->redirect("inicio", "principal");
                    } else {
                        $datos = array(
                            "titulo" => "Registrarse",
                            "mensaje" => "Error al ingresar al usuario.",
                        );
                        $tpl->mostrar("registro", $datos);
                    }
                } else if ($img == -1) {
                    $datos = array(
                        "titulo" => "Registrarse",
                        "mensaje" => "El archivo excedió el límite permitido (5MB).",
                    );
                    $tpl->mostrar("registro", $datos);
                } else {
                    $datos = array(
                        "titulo" => "Registrarse",
                        "mensaje" => "No se pudo subir su imagen.",
                    );
                    $tpl->mostrar("registro", $datos);
                }
            } else {

                $accion = 0;

                if ($usuario->registro($nombre, $apellido, $correo, $password, "", $fecha, $accion)) {
                    setcookie("correo", $_POST["correo"], time() + (86400 * 30), "/");
                    setcookie("password", $_POST["password"], time() + (86400 * 30), "/");
                    $this->redirect("inicio", "principal");
                } else {
                    $datos = array(
                        "titulo" => "Registrarse",
                        "mensaje" => "Error al ingresar al usuario.",
                    );

                    $tpl->mostrar("registro", $datos);
                }
            }
        } else {
            $datos = array(
                "titulo" => "Registrarse",
                "mensaje" => "",
            );

            $tpl->mostrar("registro", $datos);
        }
    }

    function perfil() {
        $id = Auth::estaLogueado();
        if(!$id){
            (new ControladorIndex())->redirect("inicio","principal");
        }
        $archivos = (new Archivo())->getArchivosUser($id);
        $datos = array(
            "active_perfil" => "active",
            "archivos" => $archivos,
            "url_agregar_pago" => (new ControladorIndex())->getUrl("usuario","agregarCuenta"),
            "url_eliminar_usuario" => (new ControladorIndex())->getUrl("usuario","eliminarUsuario"),
            "url_editar_perfil" =>(new ControladorIndex())->getUrl("usuario","editarPerfil"),
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
        echo isset($_FILES["archivo"]);
        if($_FILES["archivo"]["error"] == UPLOAD_ERR_OK){
            $imgOK = (new Archivo())->subirImagen();
            if($imgOK == 1){
                $usuario->setImagen("uploads/" . $_FILES["archivo"]["name"]);
            }
        }else if($_FILES["archivo"]["error"] == UPLOAD_ERR_NO_FILE || $imgOK != 1){
            $usuario->setImagen($_POST["archivo_old"]);
        }
        $resultado = $usuario->editar();
        if($resultado > 0){
            $datos = array(
                "mensaje_editar" => "Los datos fueron actualizados correctamente",
            );
        }else{
            $datos = array(
                "mensaje_editar" => "No se actualizó ningun dato",
            );
        }
        $tpl = Template::getInstance();
        $tpl->mostrar("perfil", $datos);
    }

    function agregarCuenta(){
        $id = Auth::estaLogueado();
        if(!$id){
             (new ControladorIndex())->redirect("inicio","principal");
        }
        (new Cuenta())->agregar($id);
        (new ControladorIndex())->redirect("usuario","perfil");
    }

    function eliminarUsuario(){
        $id = Auth::estaLogueado();
        if(!$id){
             (new ControladorIndex())->redirect("inicio","principal");
        }
        (new Usuario())->eliminar($id);
        $this->logout();
    }

}

?>
