<?php 



require_once ("clase_base.php");


class Usuario extends ClaseBase{
	private $nombre = "";
	private $apellido = "";
	private $fNac = "";
	private $ci = 0;
	private $cuentas = NULL;
	private $correo = "";
	private $contrasenia = "";
	private $activo = true;

	public function __construct ($nombre = "",$apellido = "", $fNac = "", $ci = 0, $cuentas = NULL, $correo = "", $contrasenia = "", $activo = true){
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->fNac = $fNac;
		$this->ci = $ci;
		$this->cuentas = $cuentas;
		$this->correo = $correo;
		$this->contrasenia = $contrasenia;
		$this->activo = $activo;

		$tabla="usuarios";
        parent::__construct($tabla);	

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
	public function setCi($ci){
		$this->ci = $ci;
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
	public function getCi(){
		return $this->ci; 
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
	public function getActivo(){
		return $this->activo;
	}



}


 ?>
