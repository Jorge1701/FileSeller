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

	public function __construct ($nombre = "Usuario",$apellido = "Prueba", $fNac = "1995-06-07",$cuentas = "", $correo = "usuario@prueba.com", $contrasenia = "",$imagen = "../../img/user-default.png", $activo = true, $id = 0){
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

		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE correo= ?");

		$sql->bind_param("s",$correo);

		$resultado = $this->db->query($sql) or die ("Fallo la consulta");

		if($resultado->num_rows < 1){
			return false;
		}else{
			Session::init();
			Session::set('usuario_email',$resultado->correo);
			Session::set('usuario_correo',$resultado->correo);
			Session::set('usuario_id', $resultado->id);

			return true;
		}

	}

	public function logout(){
		Session::init();
		Session::destroy();
	}

}


?>
