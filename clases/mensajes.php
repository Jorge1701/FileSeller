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

	public function getChats ($usuario) {
		$stmt = DB::conexion ()->prepare ("(SELECT u2.nombre FROM mensajes AS m, usuario AS u1, usuario AS u2 WHERE m.id_para = u1.id AND u1.nombre = \"" . $usuario . "\" AND m.id_desde = u2.id) UNION (SELECT u2.nombre FROM mensajes AS m, usuario AS u1, usuario AS u2 WHERE m.id_desde = u1.id AND u1.nombre = \"" . $usuario . "\" AND m.id_para = u2.id)");
		
		$stmt->execute ();
		$resultado = $stmt->get_result ();

		while ($fila = $resultado->fetch_object ())
			$res[] = $fila->nombre;

		return isset ($res) ? $res : [];
	}

	public function enviarMensaje ($usuario1, $usuario2, $mensaje) {
		$id1 = DB::conexion ()->prepare ("SELECT id FROM usuario WHERE nombre = \"" . $usuario1 . "\"");
		$id1->execute ();
		$res1 = $id1->get_result ();
		$i1 = $res1->fetch_object ()->id;

		$id2 = DB::conexion ()->prepare ("SELECT id FROM usuario WHERE nombre = \"" . $usuario2 . "\"");
		$id2->execute ();
		$res2 = $id2->get_result ();
		$i2 = $res2->fetch_object ()->id;

		if (isset ($i1) && isset ($i2)) {
			$insert = DB::conexion ()->query ("INSERT INTO mensajes (id_desde, id_para, dia, hora, mensaje) VALUES (" . $i1 . ", " . $i2 . ", NOW(), CURTIME(), \"" . $mensaje . "\")");
			return true;
		}

		return false;
	}

	public function getChat ($usuario1, $usuario2) {
		$stmt = DB::conexion ()->prepare ("SELECT dia, hora, mensaje, id_desde, u1.id AS 'id' FROM mensajes AS m, usuario AS u1, usuario AS u2 WHERE u1.nombre = \"" . $usuario1 . "\" AND u2.nombre = \"" . $usuario2 . "\" AND ((m.id_desde = u1.id AND m.id_para = u2.id) OR (m.id_desde = u2.id AND m.id_para = u1.id))");
		DB::conexion ()->query ("SET lc_time_names = 'es_MX'");
		$stmt = DB::conexion ()->prepare ("SELECT DATE_FORMAT(dia, '%d de %M del %Y') AS dia, TIME_FORMAT(hora, '%H:%i') AS hora, mensaje, id_desde, u1.id AS 'id', visto FROM mensajes AS m, usuario AS u1, usuario AS u2 WHERE u1.nombre = \"" . $usuario1 . "\" AND u2.nombre = \"" . $usuario2 . "\" AND ((m.id_desde = u1.id AND m.id_para = u2.id) OR (m.id_desde = u2.id AND m.id_para = u1.id))");

		$stmt->execute ();
		$resultado = $stmt->get_result ();

		while ($fila = $resultado->fetch_object ())
			$res[] = new M ($fila->dia, $fila->hora, $fila->mensaje, $fila->id_desde == $fila->id);
			$res[] = new M ($fila->dia, $fila->hora, $fila->mensaje, $fila->id_desde == $fila->id, $fila->visto);

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
	public $visto = true;

	public function __construct ($dia, $hora, $mensaje, $propio) {
	public function __construct ($dia, $hora, $mensaje, $propio, $visto) {
		$this->dia = $dia;
		$this->hora = $hora;
		$this->mensaje = $mensaje;
		$this->propio = $propio;
		$this->visto = $visto;
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

	public function estaVisto () {
		return $this->visto;
	}
}

?>