<?php

require_once ("clases/session.php");

class Auth extends ControladorIndex
{
    public  static function estaLogueado()
    {
		Session::init();
		if (isset($_SESSION['usuario_id'])) {
			$u = (new Usuario ())->obtenerPorId ($_SESSION["usuario_id"]);
			if ($u->getActivo())
				return $_SESSION['usuario_id'];
			else {
				return false;
			}
		}else{
			return false;
		}
    }
}?>