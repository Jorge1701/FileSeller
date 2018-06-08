<?php

require_once("clases/clase_base.php");

class Strike extends ClaseBase {

    private $id = 0;
    private $id_usuario = 0;
    private $comentario = "";

    public function __construct($obj = NULL) {
        if (isset($obj)) {
            foreach ($obj as $key => $value) {
                $this->$key = $value;
            }
        }

        parent::__construct("strikes");
    }

    public function registrarStrike ($usuario_correo, $comentario) {
        $u = (new Usuario ())->obtenerPorCorreo ($usuario_correo);

        if (!isset ($u))
            return false;

        $id_usuario = $u->getId ();
        
        if ($this->esStrikeDefinitivo ($id_usuario, $usuario_correo))
            $eliminado = "ELIMINADO";

        $insert = DB::conexion ()->prepare ("INSERT INTO strikes (id_usuario, comentario) VALUES (?, ?)");
        $insert->bind_param ("is", $id_usuario, $comentario);
        $res = $insert->execute () ? "OK" : "ERR";

        if ($res == "OK") {
            $cant = $this->cantStrikes ($usuario_correo);
            (new Notificacion ())->enviar ($id_usuario, ($cant == 1 ? "Primer" : "Segundo") .  " strike debido a " . $comentario);
        }

        return isset ($eliminado) ? $eliminado : $res;
    }

    public function obtenerStrikes ($usuario_correo) {
        $u = (new Usuario ())->obtenerPorCorreo ($usuario_correo);

        if (!isset ($u))
            return null;

        $id_usuario = $u->getId ();

        return $this->obtenerStrikesId ($id_usuario);
    }


    public function obtenerStrikesId ($id_usuario) {
        if (!$id_usuario)
            return null;

        $stmt = DB::conexion ()->prepare ("SELECT * FROM strikes WHERE id_usuario = ?");
        $stmt->bind_param ("i", $id_usuario);
        $stmt->execute ();
        $resultado = $stmt->get_result ();

        while ($fila = $resultado->fetch_object ())
            $res[] = new $this->modelo ($fila);

        return isset ($res) ? $res : null;
    }

    public function cantStrikes ($usuario_correo) {
        $u = (new Usuario ())->obtenerPorCorreo ($usuario_correo);

        if (!isset ($u))
            return false;

        $id_usuario = $u->getId ();

        $stmt = DB::conexion ()->prepare ("SELECT COUNT(*) AS cant FROM strikes WHERE id_usuario = ?");
        $stmt->bind_param ("i", $id_usuario);
        $stmt->execute ();
        return $stmt->get_result ()->fetch_object ()->cant;
    }

    public function esStrikeDefinitivo ($id_usuario, $usuario_correo) {
        if ($this->cantStrikes ($usuario_correo) >= 2) {
            DB::conexion ()->query ("UPDATE usuarios SET activo = 0 WHERE id = " . $id_usuario);
            return true;
        } else
        return false;
    }

    public function getId () {
        return $this->id;
    }
    
    public function setId ($id) {
        $this->id = $id;
    }

    public function getIdUsuario () {
        return $this->idusuario;
    }
    
    public function setIdUsuario ($idusuario) {
        $this->idusuario = $idusuario;
    }

    public function getComentario () {
        return $this->comentario;
    }
    
    public function setComentario ($comentario) {
        $this->comentario = $comentario;
    }
}

?>
