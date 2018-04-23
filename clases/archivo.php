<?php 

require_once("clases/clase_base.php");

class Archivo extends ClaseBase{
	private $id = 0;
	private $nombre = "";
	private $tipo = "";
	private $tamanio = "";
	private $precio = "";
	private $descripcion = "";
	private $ubicacion = "";
	private $duenio = 0;
	private $fecSubido = "";
	private $horaSubido = "";
	private $vendido = false;
	private $fecVenido = "";
	private $horaVendido = "";


	public function __construct($obj=NULL) {
        if(isset($obj)){
            foreach ($obj as $key => $value) {
                $this->$key=$value;
            }    
        }

        parent::__construct("archivos");
    }

    //Getters
    public function getId(){
    	return $this->id; 	
    }

    public function getNombre(){
    	return $this->nombre; 	
    }

    public function getTipo(){
    	return $this->tipo; 	
    }

    public function getTamanio(){
    	return $this->tamanio;
    }

    public function getPrecio(){
    	return $this->precio;
    }

    public function getDescripcion(){
    	return $this->descripcion;
    }

    public function getUbicacion(){
    	return $this->ubicacion; 	
    }

    public function getDuenio(){
    	return $this->duenio; 	
    }

    public function getFecSubido(){
    	return $this->fecSubido; 	
    }

    public function getHoraSubido(){
    	return $this->horaSubido; 	
    }

    public function getVendido(){
    	return $this->vendido; 	
    }

    public function getFecVendido(){
    	return $this->fecVenido; 	
    }

    public function getHoraVendido(){
    	return $this->horaVendido; 	
    }


    public function getArchivosUser($idUsuario){
      $sql="select * from archivos where duenio=$idUsuario";
      $res=NULL;
      $resultado =$this->db->query($sql) or die ("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
      while($fila = $resultado->fetch_object()) {
        $res[] = new $this->modelo($fila);
    }
    return $res;
}

public function subirArchivo($idDuenio){
    $nombre = $_POST["nombre"];
    $descripcion =  isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $tamanio = $this->convertirTamanio($_FILES["archivo"]["size"]);
    $tipo=  $_FILES["archivo"]["type"];//explode(".",$_FILES["archivo"]["name"])[1];
    $precio = $_POST["precio"];
    date_default_timezone_set('America/Montevideo');
    $fecSubido = date("Y-m-d");
    $horaSubido = date("H:i:s");

    $target_dir = "uploads/";
    $target_file = $target_dir . $idDuenio ."_". $fecSubido ."_". str_replace(":","-",$horaSubido) ."_". basename($_FILES["archivo"]["name"]);
    $uploadStatus = -1;


    if ($_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
       // Checkear tamaño, limite 100MB en este caso 
        if ($_FILES["archivo"]["size"] > 104857600) {
           $uploadStatus = 1;
       } elseif (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
        $sql = $this->db->prepare("INSERT INTO archivos (nombre,tipo,tamanio,precio,descripcion,ubicacion,duenio,fecSubido,horaSubido) VALUES( ?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("ssssssiss",$nombre,$tipo,$tamanio,$precio,$descripcion,$target_file,$idDuenio,$fecSubido,$horaSubido);
        $sql->execute();

        $uploadStatus = 0;
    }else{
        $uploadStatus = 2;
    } 
}else{
    $uploadStatus = 2; 
}

return $uploadStatus;

}

private function convertirTamanio($tamanio){
    if($tamanio < 1024){             //Si el tamanio no llega a 1KB devolverlo en Bytes
        return  $tamanio."Bytes";

    }elseif ($tamanio < pow(1024,2)) {  // Si el tamanio no llega a 1MB devolverlo en KB
     return round ($tamanio / 1024,1,PHP_ROUND_HALF_UP)."KB";

 }else{
        return round ($tamanio / pow(1024,2),1,PHP_ROUND_HALF_UP)."MB"; //Si el tamanio supera 1MB devolverlo en MB
    }
}


public function subirImagen(){

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
                //$uploadStatus = -1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($_FILES["archivo"]["size"] > 5000000) {
        return -1;
    }else{

        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
            return 1;
        }else {
            return 0;
        }

    }
}

}
?>