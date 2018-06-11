<?php

class Comentarios extends ClaseBase {
	private $palabras_a_censurar = ["puta", "puto"];

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

	public function eliminar ($id) {
		DB::conexion ()->query ("DELETE FROM comentarios WHERE id = " . $id);
	}

	public function enviarComentario ($archivo, $usuario, $comentario) {
		$u = (new Usuario ())->obtenerPorCorreo ($usuario);
		$a = (new Archivo ())->obtenerPorId ($archivo);

		$comentario = $this->censurarComentario ($comentario);

		DB::conexion ()->query ("INSERT INTO comentarios (id_archivo, id_usuario, comentario, duenio) VALUES (" . $archivo . ", " . $u->getId () . ", \"" . $comentario . "\", " . ($u->getId () == $a->getDuenio () ? "1" : "0") . ")");

		if($u->getId() != $a->getDuenio()){
		(new Notificacion())->enviar($a->getDuenio(),"Su archivo <a href='/FileSeller/archivo/ver/".$a->getId()."'>".$a->getNombre()."</a> a recibido un comentario");
		}
	}

	public function obtenerComentarios ($id_archivo) {
		$stmt = DB::conexion ()->prepare ("SELECT c.id AS idCom, u.correo AS correo, c.comentario AS comentario, c.duenio AS duenio, u.nombre AS nombre, u.apellido AS apellido, u.id AS id, u.activo AS activo FROM comentarios AS c, usuarios AS u WHERE c.id_usuario = u.id AND c.id_archivo = " . $id_archivo . " ORDER BY c.id");
		
		$stmt->execute ();
		$resultado = $stmt->get_result ();

		while ($fila = $resultado->fetch_object ())
			$res[] = new Comen ($fila->idCom, $fila->correo, $fila->nombre . " " . $fila->apellido, $fila->comentario, $fila->duenio, $fila->id, !$fila->activo);

		return isset ($res) ? $res : [];
	}

	private function censurarComentario ($comentario) {
		return str_ireplace ($this->palabras_a_censurar, "#!$@*!", $comentario);
	}
}

class Comen {
	public $idCom;
	public $usuario;
	public $nombre;
	public $comentario;
	public $duenio;
	public $color;
	public $inactivo;

	public function __construct ($idCom, $usuario, $nombre, $comentario, $duenio, $id, $inactivo) {
		$this->idCom = $idCom;
		$this->usuario = $usuario;
		$this->nombre = $nombre;
		$this->comentario = $comentario;
		$this->duenio = $duenio;
		$this->inactivo = $inactivo;

		$hash = md5 ("function" . $id);
		$this->color = substr ($hash, 0, 2) . substr ($hash, 2, 2). substr ($hash, 4, 2);
	}

	public function getId () {
		return $this->idCom;
	}
	
	public function setId ($idCom) {
		$this->idCom = $idCom;
	}

	public function getColor () {
		return $this->color;
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
	public function getInactivo () {
		return $this->inactivo;
	}
	
	public function setInactivo ($inactivo) {
		$this->inactivo = $inactivo;
	}
}

?>
