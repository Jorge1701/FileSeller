<?php

ini_set ("display_errors", 1);
error_reporting(E_ALL & ~E_NOTICE);
//error_reporting (E_ERROR | E_PARSE);

require "db/db.php";
require "controladores/ctrl_index.php";
require_once "clases/clase_base.php";
require_once ("clases/template.php");

$ctrlIndex = new ControladorIndex ();

$tpl = Template::getInstance ();
$tpl->asignar ("url_base", "http://localhost/FileSeller/");
$tpl->asignar ("nombre_proyecto", "File Seller");

if (isset ($_GET["url"])) {
	$partes = explode ('/', $_GET["url"]);
	$controlador = !empty ($partes[0]) ? $partes[0] : "inicio";
	$accion = !empty ($partes[1]) ? $partes[1] : "page_not_found";
	$params = array ();

	for ($i = 2; $i < count ($partes); $i++)
		$params[] = $partes[$i];
} else {
	$controlador = "inicio";
	$accion = "page_not_found";
	$params = array ();
}

$ctrl = $ctrlIndex->cargarControlador ($controlador);
$ctrlIndex->ejecutarAccion ($ctrl, $accion, $params);

?>