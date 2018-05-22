<?php 

require_once ("clase_base.php");
require_once ("notificacion.php");

class Usuario extends ClaseBase{
	private $nombre = "";
	private $apellido = "";
	private $fnac = "";
	private $cuentas = null;
	private $correo = "";
	private $contrasenia = "";
	private $imagen = "img/user-default.png";
	private $activo = true;
	private $id = 0;
	private $notificaciones = null;
	private $seguidos = null;
	private $admin = false;

	public function __construct($obj=NULL) {
        //$this->db=DB::conexion();
		if(isset($obj)){
			foreach ($obj as $key => $value) {
				$this->$key=$value;
			}    
		}

		parent::__construct("usuarios");	

	}

	public function setId($id){
		$this->id = $id;
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

	public function setNotificaciones($notificaciones){
		$this->notificaciones = $notificaciones;
	}

	public function setSeguidos($seguidos){
		$this->seguidos = $seguidos;
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

	public function esAdmin () {
		return $this->admin;
	}
	
	public function setAdmin ($admin) {
		$this->admin = $admin;
	}

	public function getId(){
		return $this->id;
	}

	public function getNotificaciones(){
		return $this->notificaciones;
	}

	public function getSeguidos(){
		return $this->seguidos;
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
	public function obtenerPorId($id){
		$sql="select * from usuarios where id='$id'";
		$res=NULL;
		$resultado =$this->db->query($sql)   
		or die ("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
		if($fila = $resultado->fetch_object()) {
			$res= new $this->modelo($fila);
			$res->setNotificaciones((new Notificacion())->getNotifUser($res->getId()));
			$res->setSeguidos($res->obtenerSeguidos());
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

				if($fila->activo == false){
					return false;
				}
				Session::init();
				Session::set('usuario_correo',$fila->correo);
				Session::set('usuario_id', $fila->id);
				Session::set('usuario_nombre', $fila->nombre);
				return true;

			}

			
		}

	}

	public function registro($nombre,$apellido,$correo,$contrasenia,$imagen,$fnac,$accion){

		ini_set("display_errors", 1);
		error_reporting(E_ALL & ~E_NOTICE);

		$act = 1;

		if($accion == 1){

			$sql = $this->db->prepare("INSERT INTO usuarios(nombre,apellido,correo,contrasenia,imagen,activo,fnac) VALUES(?,?,?,?,?,?,?)");
			$sql->bind_param("sssssis",$nombre,$apellido,$correo,$contrasenia,$imagen,$act,$fnac);
			if($sql->execute()){
				return true;
			}else{
				return false;
			}
		}else{

			$def = "img/user-default.png";

			$sql2 = $this->db->prepare("INSERT INTO usuarios(nombre,apellido,correo,contrasenia,imagen,activo,fnac) VALUES(?,?,?,?,?,?,?)");
			$sql2->bind_param("sssssis",$nombre,$apellido,$correo,$contrasenia,$def,$act,$fnac);

			if($sql2->execute()){
				return true;
			}else{
				return false;
			}

		}

		
	}

	public function chequearCorreo($correo){

		ini_set("display_errors", 1);
		error_reporting(E_ALL & ~E_NOTICE);

		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE correo = ?");

		$sql->bind_param("s",$correo);

		$sql->execute();

		$resultado = $sql->get_result();

		if($resultado->num_rows == 0){
			return false;
		}else{
			return true;
		}
	}


	public function eliminar($idUsuario){
		ini_set("display_errors", 1);
		error_reporting(E_ALL & ~E_NOTICE);

		$sql=$this->db->prepare("UPDATE `usuarios` SET `activo`= 0  WHERE id=$idUsuario");
		$sql->execute();

	}

	public function editar(){
		ini_set("display_errors", 1);
		error_reporting(E_ALL & ~E_NOTICE);

		$sql="UPDATE `usuarios` SET `nombre`='".$this->getNombre()."',`apellido`='".$this->getApellido()."',`correo`= '".$this->getCorreo()."',`contrasenia`='".$this->getContrasenia()."',`imagen`='".$this->getImagen()."',`fnac`='".$this->getfnac()."' WHERE `id` = ".$this->getId();
		$this->db->query($sql)   
		or die ("<h3 style='text-align: center; margin-top: 5%'>Fallo en la consulta</h3>");
		
		return $this->db->affected_rows;
	}

	public function seguir($idSeguido){
		$idSeguidor = $this->getId();
		$sql2 = $this->db->prepare("INSERT INTO seguidos(idSeguidor,idSeguido) VALUES(?,?)");
		$sql2->bind_param("ss",$idSeguidor,$idSeguido);

		if($sql2->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function dejarSeguir($idSeguido){
		$idSeguidor = $this->getId();
		$sql2 = $this->db->prepare("DELETE FROM `seguidos` WHERE `idSeguidor` = $idSeguidor AND `idSeguido` = $idSeguido");
		
		if($sql2->execute()){
			return true;
		}else{
			return false;
		}
	}

	public function obtenerSeguidos(){
		$sql="SELECT * FROM usuarios WHERE id IN (SELECT idSeguido FROM seguidos WHERE idSeguidor = $this->id)";
    	$resultados=array();

        $resultado =$this->db->query($sql)   
            or die ("Fallo en la consulta");

        while ( $fila = $resultado->fetch_object() )
        {
            
            $objeto= new $this->modelo($fila);
            $resultados[]=$objeto;
        } 
     return $resultados; 
	}
}

?>
