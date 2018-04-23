<?php 

require_once ("clase_base.php");

class Usuario extends ClaseBase{
	private $nombre = "";
	private $apellido = "";
	private $fnac = "";
	private $cuentas = "";
	private $correo = "";
	private $contrasenia = "";
	private $imagen = "img/user-default.png";
	private $activo = true;
	private $id = 0;

	public function __construct($obj=NULL) {
        //$this->db=DB::conexion();
        if(isset($obj)){
            foreach ($obj as $key => $value) {
                $this->$key=$value;
            }    
        }

        parent::__construct("usuarios");	

    }

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}
	public function setfnac($fnac){
		$this->fnac = $fnac;
	}
	public function setCuentas($cuentas){
		$this->cuentas = $cuentas;
	}
	public function setCorreo($correo){
		$this->correo = $correo;
	}
	public function setContrasenia($contrasenia){
		$this->contrasenia = $contrasenia;
	}

	public function setImagen($imagen){
		$this->imagen = $imagen;
	}

	public function setActivo($activo){
		$this->activo = $activo;
	}


	public function getNombre(){
		return $this->nombre;
	}
	public function getApellido(){
		return $this->apellido;
	}
	public function getfnac(){
		return $this->fnac;
	}	
	public function getCuentas(){
		return $this->cuentas;
	}
	public function getCorreo(){
		return $this->correo;
	}
	public function getContrasenia(){
		return $this->contrasenia;
	}

	public function getImagen(){
		return $this->imagen;
	}

	public function getActivo(){
		return $this->activo;
	}

	public function getId(){
		return $this->id;
	}

	public function obtenerPorCorreo($corre){
	    $sql="select * from usuarios where correo='$corre'";
	    $res=NULL;
	    $resultado =$this->db->query($sql)   
	        or die ("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
	     if($fila = $resultado->fetch_object()) {
	       $res= new $this->modelo($fila);
	    }
	    return $res;
	}

	public function login($correo,$pass){

		ini_set("display_errors", 1);
		error_reporting(E_ALL & ~E_NOTICE);

		$sql = DB::conexion()->prepare("SELECT * FROM usuarios WHERE correo= ? AND contrasenia= ?");

		$sql->bind_param("ss",$correo,$pass);

		$sql->execute();

		$resultado = $sql->get_result();

		if($resultado->num_rows < 1){
			return false;
		}else{
			
			while($fila=$resultado->fetch_object()) {

				Session::init();
				Session::set('usuario_correo',$fila->correo);
				Session::set('usuario_id', $fila->id);
				Session::set('usuario_nombre', $fila->nombre);
				return true;

			}

			
		}

	}

}


?>
