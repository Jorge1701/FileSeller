<?php 

require_once ("clase_base.php");


class Usuario extends ClaseBase{
	private $nombre = "";
	private $apellido = "";
	private $fNac = "";
	private $cuentas = "";
	private $correo = "";
	private $contrasenia = "";
	private $imagen = "";
	private $activo = true;
	private $id = 0;

	public function __construct ($nombre = "Usuario",$apellido = "Prueba", $fNac = "1995-06-07",$cuentas = "", $correo = "usuario@prueba.com", $contrasenia = "1234",$imagen = "../../img/user-default.png", $activo = true, $id = 0){
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->fNac = $fNac;
		$this->cuentas = $cuentas;
		$this->correo = $correo;
		$this->contrasenia = $contrasenia;
		$this->imagen = $imagen;
		$this->activo = $activo;
		$this->id = $id;

		parent::__construct("usuarios");	

	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}
	public function setFnac($fNac){
		$this->fNac = $fNac;
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
	public function getFnac(){
		return $this->fNac;
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

	public function getUserByCorreo($correo){
		$sql=$this->db->prepare("select * from usuarios where correo= ?");
		$sql->bind_param("s",$correo);
		$res=NULL;
		$resultado =$this->db->query($sql) or die ("Fallo en la consulta");
		if($fila = $resultado->fetch_object()) {
			$res= new Usuario($fila->nombre,$fila->apellido,$fila->fnac,$fila->ci,$fila->cuentas,$fila->correo,$fila->contrasenia);
		}
		return $res;
	}

	public function login($correo,$pass){

		ini_set("display_errors", 1);
		error_reporting(E_ALL & ~E_NOTICE);

		$sql = DB::conexion()->prepare("SELECT * FROM usuarios WHERE correo= ? ");

		$sql->bind_param("s",$correo);

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
				echo "<h1>".$fila->nombre."</h1>";
				return true;

			}

			
		}

	}

	public function logout(){
		Session::init();
		Session::destroy();
	}

}


?>
