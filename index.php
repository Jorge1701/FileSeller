<?php

ini_set ("display_errors", 1);
error_reporting(E_ALL & ~E_DEPRECATED);
//error_reporting (E_ERROR | E_PARSE);

require "db/db.php";
require "controladores/ctrl_index.php";
require_once "clases/clase_base.php";
require_once ("clases/template.php");

$ctrlIndex = new ControladorIndex ();

$tpl = Template::getInstance ();
$tpl->asignar ("url_base", "http://localhost/FileSeller/");
$tpl->asignar ("nombre_proyecto", "File Seller");
<<<<<<< HEAD
$tpl->asignar ("inicio", $ctrlIndex->getUrl ("inicio", "principal"));
=======
$tpl->asignar ("url_perfil",$ctrlIndex->getUrl("usuario","perfil"));
$tpl->asignar ("url_inicio",$ctrlIndex->getUrl("inicio","principal"));
$tpl->asignar ("url_login",$ctrlIndex->getUrl("usuario","login"));
$tpl->asignar ("url_logout", $ctrlIndex->getUrl("usuario","logout"));
$tpl->asignar ("url_registro",$ctrlIndex->getUrl("usuario","registro"));
$tpl->asignar ("url_ayuda", $ctrlIndex->getUrl("inicio","ayuda"));
$tpl->asignar ("url_subir_archivo", $ctrlIndex->getUrl("archivo","subir"));

>>>>>>> b165b004bf904941b4a0ac939c6afa4d11a16e5e

if (isset ($_GET["url"])) {
	$partes = explode ('/', $_GET["url"]);
	$controlador = !empty ($partes[0]) ? $partes[0] : "inicio";
	$accion = !empty ($partes[1]) ? $partes[1] : "principal";
	$params = array ();

	for ($i = 2; $i < count ($partes); $i++)
		$params[] = $partes[$i];
} else {
	$controlador = "inicio";
	$accion = "principal";
	$params = array ();
	header("Location: " .$ctrlIndex->getUrl($controlador,$accion));
}

$ctrl = $ctrlIndex->cargarControlador ($controlador);
$ctrlIndex->ejecutarAccion ($ctrl, $accion, $params);

?>