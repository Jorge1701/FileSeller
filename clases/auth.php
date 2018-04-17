<?php

require_once ("clases/session.php");

class Auth extends ControladorIndex
{
    public  static function estaLogueado()
    {
    	Session::init();
        if (isset($_SESSION['usuario_id'])) {
           return $_SESSION['usuario_id'];
        }else{
        	return false;
        }
    }
}?>