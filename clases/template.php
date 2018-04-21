<?php

require_once ("libs/smarty/Smarty.class.php");
require_once ("config/config.php");
require_once ("clases/auth.php");
require_once ("clases/usuario.php");
require_once ("clases/mensajes.php");

class Template {

	public $_smarty;

	public static function getInstance () {
		static $instane = null;

		if ($instane === null)
			$instane = new static ();

		return $instane;
	}

	protected function __construct () {
		$this->_smarty = new Smarty ();

		global $template_config;
		$this->_smarty->template_dir = $template_config['template_dir'];
		$this->_smarty->compile_dir = $template_config['compile_dir'];
		$this->_smarty->cache_dir = $template_config['cache_dir'];
		$this->_smarty->config_dir = $template_config['config_dir'];
	}

	private function __clone () {
	}

	private function __wakeup () {
	}

	function mostrar ($template, $data = array ()) {
		if(isset($_COOKIE["correo"]) && isset($_COOKIE["password"])) {
			(new Usuario ())->login ($_COOKIE["correo"], sha1 ($_COOKIE["password"]));
		}

		$id = Auth::estaLogueado();
		$usuario = null;
		$notificacionesMensaje = null;
		$ctrlIndex = new ControladorIndex(); 

		if( $id != false){
			$usuario = (new Usuario())->obtenerPorId($id);
			$notificacionesMensaje = (new Mensajes())->getNotificacionesMensajes($usuario->getCorreo());

		}
		
		$this->asignar("usuario",$usuario);
		$this->asignar("notificacionesMensaje",$notificacionesMensaje);
		$this->asignar("url_mensaje",substr($ctrlIndex->getUrl("mensajes","chat"),0,-1));
		
		foreach ($data as $key => $value)
			$this->_smarty->assign ($key, $value);

		$this->_smarty->display ($template . ".tpl");
	}

	function asignar ($clave, $valor) {
		$this->_smarty->assign ($clave, $valor);
	}

}

?>