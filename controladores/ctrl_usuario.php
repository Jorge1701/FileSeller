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

    function editar_perfil($params) {
        
    }

}

?>
