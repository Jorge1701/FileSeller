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

	public function getConversaciones ($usuario) {
		$stmt = DB::conexion ()->prepare ("(SELECT u2.nombre, u2.apellido, u2.correo, u2.imagen FROM mensajes AS m, usuarios AS u1, usuarios AS u2 WHERE m.id_para = u1.id AND u1.correo = \"" . $usuario . "\" AND m.id_desde = u2.id) UNION (SELECT u2.nombre, u2.apellido, u2.correo, u2.imagen FROM mensajes AS m, usuarios AS u1, usuarios AS u2 WHERE m.id_desde = u1.id AND u1.correo = \"" . $usuario . "\" AND m.id_para = u2.id)");
		
		$stmt->execute ();
		$resultado = $stmt->get_result ();

		while ($fila = $resultado->fetch_object ())
			$res[] = new C ($fila->nombre . " " . $fila->apellido, $fila->correo, $fila->imagen, 0);

		if (!isset ($res))
			return [];

		foreach ($res as $r)
			$r->setCant ($this->getCantSinVer ($usuario, $r->getCorreo ()));

		return isset ($res) ? $res : [];
	}

	private function getCantSinVer ($u1, $u2) {
		$stmt = DB::conexion ()->prepare ("SELECT COUNT(*) AS cant FROM mensajes AS m, usuarios AS u1, usuarios AS u2 WHERE u1.correo = \"" . $u1 . "\" AND u2.correo = \"" . $u2 . "\" AND m.id_desde = u2.id AND m.id_para = u1.id AND m.visto = FALSE");

		$stmt->execute ();
		$resultado = $stmt->get_result ();
		return $resultado->fetch_object ()->cant;
	}

	public function enviarMensaje ($usuario1, $usuario2, $mensaje) {
		$u1 = (new Usuario ())->obtenerPorCorreo ($usuario1);
		$u2 = (new Usuario ())->obtenerPorCorreo ($usuario2);

		if (isset ($u1) && isset ($u2)) {
			$insert = DB::conexion ()->query ("INSERT INTO mensajes (id_desde, id_para, dia, hora, mensaje) VALUES (" . $u1->getId () . ", " . $u2->getId () . ", NOW(), CURTIME(), \"" . $mensaje . "\")");
			return true;
		}

		return false;
	}

	public function getMensajes ($usuario1, $usuario2) {
		DB::conexion ()->query ("SET lc_time_names = 'es_MX'");
		$stmt = DB::conexion ()->prepare ("SELECT DATE_FORMAT(dia, '%d de %M del %Y') AS dia, TIME_FORMAT(hora, '%H:%i') AS hora, mensaje, id_desde, u1.id AS 'id', visto FROM mensajes AS m, usuarios AS u1, usuarios AS u2 WHERE u1.correo = \"" . $usuario1 . "\" AND u2.correo = \"" . $usuario2 . "\" AND ((m.id_desde = u1.id AND m.id_para = u2.id) OR (m.id_desde = u2.id AND m.id_para = u1.id))");

		$stmt->execute ();
		$resultado = $stmt->get_result ();

		while ($fila = $resultado->fetch_object ())
			$res[] = new M ($fila->dia, $fila->hora, $fila->mensaje, $fila->id_desde == $fila->id, $fila->visto);

		$u1 = (new Usuario ())->obtenerPorCorreo ($usuario1);
		$u2 = (new Usuario ())->obtenerPorCorreo ($usuario2);

		DB::conexion ()->query ("UPDATE mensajes SET visto = TRUE WHERE id_para = " . $u1->getId () . " AND id_desde = " . $u2->getId ());

		return isset ($res) ? $res : [];
	}

	public function getNotificacionesMensajes ($correo) {
		$stmt = DB::conexion ()->prepare ("SELECT u2.nombre, u2.apellido, u2.correo, mensaje FROM mensajes AS m, usuarios AS u, usuarios AS u2 WHERE u.correo = \"" . $correo . "\" AND u.id = m.id_para AND m.visto = FALSE AND m.id_desde = u2.id AND m.id_m =
(SELECT MAX(m2.id_m) FROM mensajes AS m2 WHERE m2.id_desde = m.id_desde AND m2.id_para = m.id_para)");

		$stmt->execute ();
		$resultado = $stmt->get_result ();

		while ($fila = $resultado->fetch_object ())
			$res[] = new NotificacionMensaje ($fila->nombre . " " . $fila->apellido, $fila->correo, $fila->mensaje);

		return isset ($res) ? $res : null;
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

class NotificacionMensaje {
	public $nombre;
	public $correo;
	public $mensaje;

	public function __construct ($nombre, $correo, $mensaje) {
		$this->nombre = $nombre;
		$this->correo = $correo;
		$this->mensaje = $mensaje;
	}

	public function getNombre () {
		return $this->nombre;
	}
	
	public function setNombre ($nombre) {
		$this->nombre = $nombre;
	}

	public function getCorreo () {
		return $this->correo;
	}
	
	public function setCorreo ($correo) {
		$this->correo = $correo;
	}

	public function getMensaje () {
		return $this->mensaje;
	}
	
	public function setMensaje ($mensaje) {
		$this->mensaje = $mensaje;
	}
}

class C {
	public $nombre = "";
	public $correo = "";
	public $imagen = "";
	public $cant = 0;

	public function __construct ($nombre, $correo, $imagen, $cant) {
		$this->nombre = $nombre;
		$this->correo = $correo;
		$this->imagen = $imagen;
		$this->cant = $cant;
	}

	public function getNombre () {
		return $this->nombre;
	}
	
	public function setNombre ($nombre) {
		$this->nombre = $nombre;
	}

	public function getCorreo () {
		return $this->correo;
	}
	
	public function setCorreo ($correo) {
		$this->correo = $correo;
	}

	public function getImagen () {
		return $this->imagen;
	}
	
	public function setImagen ($imagen) {
		$this->imagen = $imagen;
	}

	public function getCant () {
		return $this->cant;
	}
	
	public function setCant ($cant) {
		$this->cant = $cant;
	}
}

?>
