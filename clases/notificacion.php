<?php

require_once("clases/clase_base.php");

class Notificacion extends ClaseBase {

    private $id = 0;
    private $usuario = 0;
    private $nombre = "";
    private $tipo = "";
    private $tamanio = "";
    private $precio = "";
    private $descripcion = "";
    private $ubicacion = "";
    private $duenio = 0;
    private $fecSubido = "";
    private $horaSubido = "";

    public function __construct($obj = NULL) {
        if (isset($obj)) {
            foreach ($obj as $key => $value) {
                $this->$key = $value;
            }
        }

        parent::__construct("archivos");
    }
}
    /*
    //Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getImg() {
        return $this->img;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getTamanio() {
        return $this->tamanio;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function getDuenio() {
        return $this->duenio;
    }

    public function getFecSubido() {
        return $this->fecSubido;
    }

    public function getHoraSubido() {
        return $this->horaSubido;
    }

    public function getArchivosUser($idUsuario) {
        $sql = "select * from archivos where activo=1 and duenio=$idUsuario";
        $res = NULL;
        $resultado = $this->db->query($sql) or die("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
        while ($fila = $resultado->fetch_object()) {
            $res[] = new $this->modelo($fila);
        }
        return $res;
    }

    public function getRecomendados(){
        
    }


    public function buscar($filtro) {
        if ($filtro == NULL)
            return NULL;

        $sql = "SELECT * FROM `archivos` WHERE activo=1 AND duenio IN (SELECT id from `usuarios` WHERE activo=1)";
        $res = NULL;
        $resultado = $this->db->query($sql) or die("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");

        while ($fila = $resultado->fetch_object()) {
            if (strpos($fila->nombre, $filtro) !== false || strpos($fila->descripcion, $filtro) !== false)
                $res[] = new $this->modelo($fila);
        }

        return $res;
    }

    public function getArchivo($idArchivo) {

        $sql = "select * from archivos where id=$idArchivo and activo=1";
        $res = NULL;
        $resultado = $this->db->query($sql) or die("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
        $fila = $resultado->fetch_object();
        $res = new $this->modelo($fila);
        return $res;
    }

    public function eliminarArchivo($idArchivo) {
        
        $sql = $this->db->prepare("UPDATE archivos SET activo=0 WHERE id=?");
        $sql->bind_param("i", $idArchivo);
        
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    public function getListado() {
        $sql = "SELECT * FROM `archivos` WHERE activo=1 AND duenio IN (SELECT id from `usuarios` WHERE activo=1)";
        $res = NULL;
        $resultado = $this->db->query($sql) or die("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
        while ($fila = $resultado->fetch_object()) {
            $res[] = new $this->modelo($fila);
        }
        return $res;
    }

    public function bajarArchivo($name) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/force-download');
        header("Content-Disposition: attachment; filename=\"" . basename($name) . "\";");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($name));
        ob_clean();
        flush();
        readfile($name);
        return 0;
    }

    public function subirArchivo($idDuenio) {
        $nombre = $_POST["nombre"];
        $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
        $tamanio = $this->convertirTamanio($_FILES["archivo"]["size"]);
        $tipo = explode(".", $_FILES["archivo"]["name"])[1];  //$_FILES["archivo"]["type"];
        $precio = $_POST["moneda"] . " " . $_POST["precio"];
        date_default_timezone_set('America/Montevideo');
        $fecSubido = date("Y-m-d");
        $horaSubido = date("H:i:s");


        $target_dir = "uploads/";
        $target_file = $target_dir . $idDuenio . "_" . $fecSubido . "_" . str_replace(":", "-", $horaSubido) . "_" . basename($_FILES["archivo"]["name"]);
        $uploadStatus = -1;

        $target_img = "";
        $imgOk = false;

        if (($_FILES["img"]["error"]) == UPLOAD_ERR_NO_FILE) {
            $target_img = $this->obtenerDefault($_FILES["archivo"]["name"]);
            $imgOk = true;
        } else if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $target_img = $target_dir . "muestra/" . $idDuenio . "_" . $fecSubido . "_" . str_replace(":", "-", $horaSubido) . "_" . basename($_FILES["img"]["name"]);
            $imgOk = move_uploaded_file($_FILES["img"]["tmp_name"], $target_img);
        }

        if ($_FILES['archivo']['error'] === UPLOAD_ERR_OK) {//Chekear que se haya subido correctamte
            if ($_FILES["archivo"]["size"] > 104857600) {// Checkear tamaño, limite 100MB en este caso 
                $uploadStatus = 1;
            } elseif (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file) && $imgOk) {//Si el archivo se movio correctamente desde la carpeta temporal a la indicada, guardarlo en la BD.
                $i = 1;
                $sql = $this->db->prepare("INSERT INTO archivos (nombre,tipo,tamanio,precio,descripcion,ubicacion,duenio,fecSubido,horaSubido,img,activo) VALUES( ?,?,?,?,?,?,?,?,?,?,?)");
                $sql->bind_param("ssssssisssi", $nombre, $tipo, $tamanio, $precio, $descripcion, $target_file, $idDuenio, $fecSubido, $horaSubido, $target_img,$i);
                $sql->execute();

                $uploadStatus = 0;
            } else {
                $uploadStatus = 2;
            }
        } else {
            $uploadStatus = 2;
        }

        return $uploadStatus;
    }

    private function obtenerDefault($nombre) {
        if (strpos($nombre, ".cpp") !== false)
            return "img/iconos_archivos/def_cpp.png";
        if (strpos($nombre, ".jpg") !== false || strpos($nombre, ".jpeg") !== false)
            return "img/iconos_archivos/def_jpg.png";
        if (strpos($nombre, ".png") !== false)
            return "img/iconos_archivos/def_png.png";
        if (strpos($nombre, ".js") !== false)
            return "img/iconos_archivos/def_js.png";
        if (strpos($nombre, ".css") !== false)
            return "img/iconos_archivos/def_css.png";
        if (strpos($nombre, ".html") !== false)
            return "img/iconos_archivos/def_html.png";
        if (strpos($nombre, ".java") !== false)
            return "img/iconos_archivos/def_java.png";
        if (strpos($nombre, ".rar") !== false)
            return "img/iconos_archivos/def_rar.png";
        if (strpos($nombre, ".txt") !== false)
            return "img/iconos_archivos/def_txt.png";
        if (strpos($nombre, ".exe") !== false)
            return "img/iconos_archivos/def_exe.png";

        return "img/iconos_archivos/def_file.png";
    }

    private function convertirTamanio($tamanio) {
        if ($tamanio < 1024) {             //Si el tamanio no llega a 1KB devolverlo en Bytes
            return $tamanio . " Bytes";
        } elseif ($tamanio < pow(1024, 2)) {  // Si el tamanio no llega a 1MB devolverlo en KB
            return round($tamanio / 1024, 1, PHP_ROUND_HALF_UP) . " KB";
        } else {
            return round($tamanio / pow(1024, 2), 1, PHP_ROUND_HALF_UP) . " MB"; //Si el tamanio supera 1MB devolverlo en MB
        }
    }

    public function subirImagen() {

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
        //$uploadStatus = -1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($_FILES["archivo"]["size"] > 5000000) {
            return -1;
        } else {

            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
                return 1;
            } else {
                return 0;
            }
        }
    }

}*/

?>
