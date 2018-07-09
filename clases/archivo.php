<?php

require_once("clases/clase_base.php");

class Archivo extends ClaseBase {

   private $id = 0;
   private $img = "";
   private $nombre = "";
   private $tipo = "";
   private $tamanio = "";
   private $precio = "";
   private $moneda = "";
   private $descripcion = "";
   private $ubicacion = "";
   private $duenio = 0;
   private $fecSubido = "";

   public function __construct($obj = NULL) {
    if (isset($obj)) {
        foreach ($obj as $key => $value) {
            $this->$key = $value;
        }
    }

    parent::__construct("archivos");
}


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

public function getMoneda(){
    return $this->moneda;
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
        //puntuacion_general
    $sql = "SELECT * FROM `archivos` WHERE activo=1 ORDER BY `puntuacion_general` DESC  LIMIT 0,10";

    $res = NULL;

    $resultado = $this->db->query($sql) or die("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");

    while ($fila = $resultado->fetch_object()) {
        $res[] = new $this->modelo($fila);
    }

    return $res;
}


public function buscar($filtro) {
    if ($filtro == NULL)
        return NULL;

    $sql = "SELECT a.*, u.nombre AS nomDuenio, u.apellido FROM `archivos` as a, usuarios as u WHERE a.duenio = u.id AND a.activo=1 AND a.duenio IN (SELECT u2.id from `usuarios` as u2 WHERE u2.activo=1)";
    $res = NULL;
    $resultado = $this->db->query($sql) or die("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");

    while ($fila = $resultado->fetch_object()) {
        if (strpos(strtolower($fila->nombre), strtolower($filtro)) !== false || strpos(strtolower($fila->descripcion), strtolower($filtro)) !== false || strpos(strtolower($fila->tipo), strtolower($filtro)) !== false || strpos(strtolower($fila->nomDuenio), strtolower($filtro)) !== false || strpos(strtolower($fila->apellido), strtolower($filtro)) !== false)
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

public function eliminar($idArchivo) {

    $sql = $this->db->prepare("UPDATE archivos SET activo=0 WHERE id=?");
    $sql->bind_param("i", $idArchivo);

    if($sql->execute()){
        return true;
    }else{
        return false;
    }

}

public function bajar($name) {
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

public function subir($idDuenio,$nombre,$descripcion,$tamanio,$tipo,$precio,$moneda,$fecSubido){

    $tamanio = $this->convertirTamanio($tamanio);

    $pathDestinoArchivo = "uploads/" . $idDuenio. "_" . str_replace(":", "-", $fecSubido) . "_" . basename($_FILES["archivo"]["name"]);
    $pathDestinoImagen = "uploads/muestra/" . $idDuenio . "_" . str_replace(":", "-", $fecSubido) . "_" . basename($_FILES["img"]["name"]);


    $archivo = $this->subirArchivo($pathDestinoArchivo);
    if($archivo == "ok"){

     $imagen = $this->subirImagenArchivo($pathDestinoImagen,$_FILES["archivo"]["name"]);
     if($imagen != "error"){

        $sql = $this->db->prepare("INSERT INTO archivos (img,nombre,tipo,tamanio,precio,moneda,descripcion,ubicacion,duenio,fecSubido) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("ssssssssis", $imagen, $nombre, $tipo, $tamanio, $precio, $moneda, $descripcion, $pathDestinoArchivo, $idDuenio, $fecSubido);
        $sql->execute();

    }else{
        return $imagen;
    }

}
return $archivo;
}

private function subirArchivo($pathDestino){
         if ($_FILES['archivo']['error'] == UPLOAD_ERR_OK) {//Chekear que se haya subido correctamente el archivo.
            if ($_FILES["archivo"]["size"] > 104857600) {// Checkear tamaño, limite 100MB. 
                return "El archivo excede el tamaño máximo soportado (100MB)";
            } elseif (move_uploaded_file($_FILES["archivo"]["tmp_name"], $pathDestino)) {
                return "ok";
            }else{
                return "Error: No se pudo subir el archivo, reintente.";
            }
        }else{
            return "Error: No se pudo subir el archivo, reintente";
        }
    }


    private function subirImagenArchivo($pathDestino, $nombreArchivo){
        //Si no se subió imagen, obtener una imagen por defecto dependiendo el tipo de archivo subido.
        if (($_FILES["img"]["error"]) == UPLOAD_ERR_NO_FILE) {
         return $this->obtenerDefault($nombreArchivo); 
        } else if ($_FILES['img']['error'] === UPLOAD_ERR_OK) { //Si se subió imagen, moverla a la carpeta muestra.
            if (!move_uploaded_file($_FILES["img"]["tmp_name"], $pathDestino)){
                return "Error: No se pudo subir la imagen del archivo"; 
            }else{
                return $pathDestino;
            }
        }

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
        if (strpos($nombre, ".pdf") !== false)
            return "img/iconos_archivos/def_pdf.png";

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
        $permitido = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        if($_FILES["archivo"]["size"] > 5000000){
            return -1;
        }else if(!array_key_exists($imageFileType,$permitido)){
            return 0;
        }else{

            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
                return 1;
            }else{
                return 0;
            }
        }
    }

    public function editar($idArchivo,$nombre,$descripcion,$precio,$moneda){
        $archivoAnterior = $this->getArchivo($idArchivo);
        $imagenCambiada = false;
        $archivoCambiado = false;
        date_default_timezone_set('America/Montevideo');
        $fecSubido = date("Y-m-d H:i:s");
        $pathDestinoImagen = "uploads/muestra/" . $archivoAnterior->getDuenio() . "_" . str_replace(":", "-", $fecSubido) . "_" . basename($_FILES["img"]["name"]);


        //Si se cambio el archivo
        if(isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == UPLOAD_ERR_OK){

          $tamanio = $_FILES["archivo"]["size"];
          $tipo = explode(".", $_FILES["archivo"]["name"])[1];  //$_FILES["archivo"]["type"];

          $pathDestinoArchivo = "uploads/" . $archivoAnterior->getDuenio(). "_" . str_replace(":", "-", $fecSubido) . "_" . basename($_FILES["archivo"]["name"]);

          //Subir el nuevo archivo
          $archivo = $this->subirArchivo($pathDestinoArchivo);
          if($archivo == "ok"){
            $archivoCambiado = true;
        }else{
            return $archivo;
        }

            //Si la imagen del archivo era una por defecto, se cambia por otra dependiendo del tipo del nuevo archivo.
        if(strpos($archivoAnterior->getImg(), 'iconos_archivos') !== false){
            $imagen = $this->subirImagenArchivo($pathDestinoImagen,$_FILES["archivo"]["name"]);
            if(strpos($imagen,'Error') == false ){
                $imagenCambiada = true;
            }else{
                return "Error: No se pudo actualizar la imagen";
            }
        }else if($_FILES['img']['error'] === UPLOAD_ERR_OK){ // Si la imagen del archivo no era por defecto y se subio otra se cambia por la nueva.
            if(move_uploaded_file($_FILES["img"]["tmp_name"], $pathDestinoImagen)){
                $imagenCambiada = true;
                $imagen = $pathDestinoImagen;
            }else{
                return "Error: No se pudo actualizar la imagen";
            }
        }
    }else if($_FILES['img']['error'] === UPLOAD_ERR_OK){ // Si se cambio solo la imagen.
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $pathDestinoImagen)){
            $imagenCambiada = true;
            $imagen = $pathDestinoImagen;
        }else{
            return "Error: No se pudo actualizar la imagen";
        }
    }

    if($imagenCambiada && $archivoCambiado){
        $sql = $this->db->prepare("UPDATE archivos SET img='$imagen', nombre='$nombre', tipo='$tipo', tamanio='$tamanio',precio='$precio',moneda='$moneda',descripcion='$descripcion',ubicacion='$pathDestinoArchivo',fecSubido='$fecSubido' WHERE id=$idArchivo");     
    }else if ($imagenCambiada) {
        $sql = $this->db->prepare("UPDATE archivos SET img='$imagen', nombre='$nombre', precio='$precio',moneda='$moneda',descripcion='$descripcion' WHERE id=$idArchivo");
    }else if($archivoCambiado){
        $sql = $this->db->prepare("UPDATE archivos SET nombre='$nombre', tipo='$tipo', tamanio='$tamanio',precio='$precio',moneda='$moneda',descripcion='$descripcion',ubicacion='$pathDestinoArchivo',fecSubido='$fecSubido' WHERE id=$idArchivo");
    }else{
        $sql = $this->db->prepare("UPDATE archivos SET nombre='$nombre', precio='$precio',moneda='$moneda',descripcion='$descripcion' WHERE id=$idArchivo");
    }

    if($sql->execute()){
        return "ok";
    }else{
        return "Error: No se pudieron persistir los datos";
    }        
}

public function reportar($id,$reporte,$descripcion){
    ini_set("display_errors", 1);
    error_reporting(E_ALL & ~E_NOTICE);

    $sql = $this->db->prepare("INSERT INTO reportes(idArchivo,tipo,descripcion) VALUES(?,?,?)");
    $sql->bind_param("iss",$id,$reporte,$descripcion);
    if($sql->execute()){
        return "ok";
    }else{
        return "error";
    }

}

public function ya_puntuo($idArchivo,$idUsuario)
{
    $puntuacion = DB::conexion ()->prepare("SELECT puntuacion  from puntuacion where idArchivo= \"" . $idArchivo . "\" and idUsuario= \"" . $idUsuario . "\"");
    $puntuacion->execute ();
    $res = $puntuacion->get_result();
    if($res->num_rows >= 1){
       return $res->fetch_object ()->puntuacion;
   }else
   {return "no";}

}
public function suma($idArchivo){
    $sum = DB::conexion ()->prepare("SELECT SUM(puntuacion) AS sum from puntuacion where idArchivo= \"" . $idArchivo . "\" ");
    $sum->execute ();
    $resultadoSum = $sum->get_result ();
    return $resultadoSum->fetch_object ()->sum;

} 
public function cantidad($idArchivo){
    $cant = DB::conexion ()->prepare("SELECT COUNT(*) AS cant from puntuacion where idArchivo= \"" . $idArchivo . "\" ");
    $cant->execute ();
    $resultadoCant = $cant->get_result ();
    return $resultadoCant->fetch_object ()->cant;
}

public function puntuar($idArchivo,$idUsuario,$puntuacion){
    $sql = $this->db->prepare("INSERT INTO puntuacion (idArchivo,idUsuario,puntuacion) VALUES(?,?,?)");
    $sql->bind_param("iid",$idArchivo,$idUsuario,$puntuacion);
    if($sql->execute()){
        return "ok";
    }else{
        return "error";
    }

}
public function puntuacionGeneral($puntuacion,$idArchivo){
    $sql = $this->db->prepare("UPDATE archivos SET puntuacion_general=? WHERE id=?");
    $sql->bind_param("di",$puntuacion,$idArchivo);
    if($sql->execute()){
        return "ok";
    }else{
        return "error";
    }

}
public function actualizarPuntuacio($idArchivo,$idUsuario,$puntuacion){

    $sql = $this->db->prepare("UPDATE puntuacion SET puntuacion=? WHERE idArchivo=? AND idUsuario=?");
    $sql->bind_param("dii",$puntuacion,$idArchivo,$idUsuario);
    if($sql->execute()){
        return "ok";
    }else{
        return "error";
    }

}

public function comprarArchivo($archivo,$idUsuario,$fecha){
    $sql = $this->db->prepare("INSERT INTO compras (idArchivo,idUsuario,fecha,moneda,precio) VALUES(?,?,?,?,?)");
    $sql->bind_param("iisss",$archivo->id,$idUsuario,$fecha,$archivo->moneda,$archivo->precio);
    if($sql->execute()){
        return true;
    }else{
        return false;
    }

}

public function verificarCompra($idUsuario,$idArchivo){
    $sql = $this->db->prepare("SELECT * FROM compras WHERE idUsuario=? AND idArchivo=?");
    $sql->bind_param("ii",$idUsuario,$idArchivo);
    $sql->execute();
    $resultado = $sql->get_result();
    if($resultado->num_rows > 0){
        return true;
    }else{
        return false;
    }
}

}?>
