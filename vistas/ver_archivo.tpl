<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}

	<title>File Seller - Ver Archivo</title>
	<link rel="stylesheet" type="text/css" href="{$url_base}style/ver_archivo.css">
</head>
<body background="{$url_base}img/wallpaper.jpg">
	{include file="header.tpl"}

	<div class="row panelMain">
		<div class="col-lg-3 col-md-4 col-sm-5 col-xs-6 pizq">
			<img src="{$url_base}{$archivo->getImg ()}" id="imgArchivo">
			<h4>
				Precio: {$archivo->getPrecio ()}
			</h4>
			<h5>
				Puntuacion:
				<span id="estrellas">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
			</h5>
			<button id="btnDescargar" class="btn btn-success" onclick="window.location='{$url_descargar_archivo}'+'{$archivo->getUbicacion()}'">
				Descargar <span class="fa fa-download"></span>
			</button>
		</div>
		<div class="col-lg-9 col-md-8 col-sm-7 col-xs-6">
			<h2 id="titulo">{$archivo->getNombre ()}</h2>
			<p>
				{$archivo->getDescripcion ()}
			</p>
		</div>
	</div>
	<div class="row panelMain panel-mio">
		<h2 id="tit_comentarios">Comentarios</h2>
		<div id="comentarios">
			En futuras actualizacions
		</div>
	</div>
	{include file="include_js.tpl"}
</body>
</html>
