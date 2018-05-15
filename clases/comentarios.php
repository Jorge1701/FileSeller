<?php

class Comentarios extends ClaseBase {
	public $id = "";
	public $id_archivo = "";
	public $id_usuario = "";
	public $comentario = "";
	public $duenio = "";

	public function __construct ($obj = NULL) {
        if(isset($obj)){
            foreach ($obj as $key => $value) {
                $this->$key=$value;
            }    
        }
        $tabla="comentarios";
        parent::__construct($tabla);
	}

	public function enviarComentario ($archivo, $usuario, $comentario) {
		$u = (new Usuario ())->obtenerPorCorreo ($usuario);
		$a = (new Archivo ())->obtenerPorId ($archivo);

		DB::conexion ()->query ("INSERT INTO comentarios (id_archivo, id_usuario, comentario, duenio) VALUES (" . $archivo . ", " . $u->getId () . ", \"" . $comentario . "\", " . ($u->getId () == $a->getDuenio () ? "1" : "0") . ")");
	}

	public function obtenerComentarios ($id_archivo) {
		$stmt = DB::conexion ()->prepare ("SELECT u.correo AS correo, c.comentario AS comentario, c.duenio AS duenio, u.nombre AS nombre, u.apellido AS apellido FROM comentarios AS c, usuarios AS u WHERE c.id_usuario = u.id AND c.id_archivo = " . $id_archivo);
		
		$stmt->execute ();
		$resultado = $stmt->get_result ();

		while ($fila = $resultado->fetch_object ())
			$res[] = new Com ($fila->correo, $fila->nombre . " " . $fila->apellido, $fila->comentario, $fila->duenio);

		return isset ($res) ? $res : null;
	}
}

class Com {
	private $usuario;
	private $nombre;
	private $comentario;
	private $duenio;

	public function __construct ($usuario, $nombre, $comentario, $duenio) {
		$this->usuario = $usuario;
		$this->nombre = $nombre;
		$this->comentario = $comentario;
		$this->duenio = $duenio;
	}

	public function getUsuario () {
		return $this->usuario;
	}
	
	public function setUsuario ($usuario) {
		$this->usuario = $usuario;
	}

	public function getNombre () {
		return $this->nombre;
	}
	
	public function setNombre ($nombre) {
		$this->nombre = $nombre;
	}

	public function getComentario () {
		return $this->comentario;
	}
	
	public function setComentario ($comentario) {
		$this->comentario = $comentario;
	}

	public function getDuenio () {
		return $this->duenio;
	}
	
	public function setDuenio ($duenio) {
		$this->duenio = $duenio;
	}
}

?>