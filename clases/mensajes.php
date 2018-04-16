<?php


class Mensajes extends ClaseBase {
	public $id_desde = "";
	public $id_para = "";
	public $dia = "";
	public $hora = "";
	public $mensaje = "";

	public function __construct ($obj = NULL) {
        if(isset($obj)){
            foreach ($obj as $key => $value) {
                $this->$key=$value;
            }    
        }
        $tabla="mensajes";
        parent::__construct($tabla);
	}

	public function getChat ($usuario1, $usuario2) {
		$stmt = DB::conexion ()->prepare ("SELECT dia, hora, mensaje, id_desde, u1.id AS 'id' FROM mensajes AS m, usuario AS u1, usuario AS u2 WHERE u1.nombre = \"" . $usuario1 . "\" AND u2.nombre = \"" . $usuario2 . "\" AND ((m.id_desde = u1.id AND m.id_para = u2.id) OR (m.id_desde = u2.id AND m.id_para = u1.id))");

		$stmt->execute ();
		$resultado = $stmt->get_result ();

		while ($fila = $resultado->fetch_object ())
			$res[] = new M ($fila->dia, $fila->hora, $fila->mensaje, $fila->id_desde == $fila->id);

		return isset ($res) ? $res : [];
	}

	public function getDia () {
		return $this->dia;
	}
	
	public function setDia ($dia) {
		$this->dia = $dia;
	}

	public function getHora () {
		return $this->hora;
	}
	
	public function setHora ($hora) {
		$this->hora = $hora;
	}

	public function getMensaje () {
		return $this->mensaje;
	}
	
	public function setMensaje ($mensaje) {
		$this->mensaje = $mensaje;
	}
}

class M {
	public $dia = "";
	public $hora = "";
	public $mensaje = "";
	public $propio = false;

	public function __construct ($dia, $hora, $mensaje, $propio) {
		$this->dia = $dia;
		$this->hora = $hora;
		$this->mensaje = $mensaje;
		$this->propio = $propio;
	}

	public function getDia () {
		return $this->dia;
	}
	
	public function setDia ($dia) {
		$this->dia = $dia;
	}

	public function getHora () {
		return $this->hora;
	}
	
	public function setHora ($hora) {
		$this->hora = $hora;
	}

	public function getMensaje () {
		return $this->mensaje;
	}
	
	public function setMensaje ($mensaje) {
		$this->mensaje = $mensaje;
	}

	public function esPropio () {
		return $this->propio;
	}
	
	public function setPropio ($propio) {
		$this->propio = $propio;
	}
}

?>