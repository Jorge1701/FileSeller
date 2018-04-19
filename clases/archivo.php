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


}
 ?>