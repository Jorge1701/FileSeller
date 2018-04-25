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
public function getArchivo($idArchivo){

    $sql="select * from archivos where id=$idArchivo";
    $res=NULL;
    $resultado =$this->db->query($sql) or die ("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
    $fila = $resultado->fetch_object();
    $res = new $this->modelo($fila);
    return $res;

}

public function getListado(){
    $sql = "select id,nombre,tipo,descripcion from archivos";
    $res=NULL;
    $resultado =$this->db->query($sql) or die ("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");while($fila = $resultado->fetch_object()) {
        $res[] = new $this->modelo($fila);
    }
    return $res;    


}

public function bajarArchivo($name){
    
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

public function subirArchivo($idDuenio){

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
    $uploadStatus = -1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $nombre = $_POST["nombre"];
    $descripcion =  isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";


    $tamanio = round ($_FILES["archivo"]["size"] / 1024,2,PHP_ROUND_HALF_UP)."KB";
    $tipo= explode(".",$_FILES["archivo"]["name"])[1];
    $precio = $_POST["precio"];
    date_default_timezone_set('America/Montevideo');
    $fecSubido = date("Y-m-d");
    $horaSubido = date("H:i:s");

        // Checkear tamaño, limite 100MB en este caso
    if ($_FILES["archivo"]["size"] > 100000000) {
       $uploadStatus = 2;
   } else {
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {


        ini_set("display_errors", 1);
        error_reporting(E_ALL & ~E_NOTICE);

        $sql = $this->db->prepare("INSERT INTO archivos (nombre,tipo,tamanio,precio,descripcion,ubicacion,duenio,fecSubido,horaSubido) VALUES( ?,?,?,?,?,?,?,?,?)");

        $sql->bind_param("ssssssiss",$nombre,$tipo,$tamanio,$precio,$descripcion,$target_file,$idDuenio,$fecSubido,$horaSubido);

        $sql->execute();

        $uploadStatus = 0;
    } else {
        $uploadStatus = 1;
    }
}

return $uploadStatus;

}


}
?>