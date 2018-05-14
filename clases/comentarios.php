<?php

class Comentarios extends ClaseBase {
	public $id = "";
	public $id_archivo = "";
	public $id_usuario = "";
	public $comentario = "";

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

		DB::conexion ()->query ("INSERT INTO comentarios (id_archivo, id_usuario, comentario) VALUES (" . $archivo . ", " . $u->getId () . ", \"" . $comentario . "\")");
	}

	public function obtenerComentarios ($id_archivo) {
		$stmt = DB::conexion ()->prepare ("SELECT u.correo AS correo, c.comentario AS comentario FROM comentarios AS c, usuarios AS u WHERE c.id_usuario = u.id AND c.id_archivo = " . $id_archivo);
		
		$stmt->execute ();
		$resultado = $stmt->get_result ();

		while ($fila = $resultado->fetch_object ())
			$res[] = new Com ($fila->correo, $fila->comentario);

		return isset ($res) ? $res : [];
	}
}

class Com {
	private $usuario;
	private $comentario;

	public function __construct ($usuario, $comentario) {
		$this->usuario = $usuario;
		$this->comentario = $comentario;
	}

	public function getUsuario () {
		return $this->usuario;
	}
	
	public function setUsuario ($usuario) {
		$this->usuario = $usuario;
	}

	public function getComentario () {
		return $this->comentario;
	}
	
	public function setComentario ($comentario) {
		$this->comentario = $comentario;
	}
}

?>