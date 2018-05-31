<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}

	<title>File Seller - Ver Archivo</title>
	<link rel="stylesheet" type="text/css" href="{$url_base}style/ver_archivo.css">
</head>
<body background="{$url_base}img/wallpaper.jpg">
	{include file="header.tpl"}

	<div hidden>
		<div id="tempComentario" class="comentario">
			<p class="com_usuario">
				<a class="aColor" href="">
					<span class="inactivoComentario">[ Usuario Inactivo ]</span> <span class="duenioComentario">[ Dueño ]</span> <span class="nomComentario">Ale</span>
				</a>
				<span class="fas fa-times"></span>
			</p>
			<p class="com_comentario">
				Comentario
			</p>
		</div>

		<div id="iniciesesion" class="comentario">
			<p class="com_comentario" style="text-align: center">
				<a href="/FileSeller/inicio/login/">Inicie Sesion</a> o <a href="/FileSeller/usuario/registro/">Cree una cuenta</a> para poder comentar.
			</p>
		</div>

		<div id="msjNoHayComents">
			No hay comentarios, se el primero!
		</div>
	</div>

	<div class="row panelMain">
		<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6 pizq">
			<img src="{$url_base}{$archivo->getImg ()}" id="imgArchivo">
		</div>
		<div class="col-lg-8 col-md-7 col-sm-7 col-xs-6">
			<h2 id="titulo">{$archivo->getNombre ()}</h2>
			<p id="parrafo">
				{$archivo->getDescripcion ()}
			</p>
			<h4>
				Precio: {$archivo->getPrecio ()}
			</h4>
			<h5>
				Puntuación:
				<span id="estrellas">
					<i class="fa fa-star"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-half-full "></i>
					<i class="fa fa-star-o"></i>
					<i class="fa fa-star-o"></i>
					2,5
				</span>
			</h5>
			<h5>Vendedor: <a href="{$url_ver_perfil_duenio}{$duenio->getCorreo()}" title="Ver perfil de {$duenio->getNombre()} {$duenio->getApellido()}">{$duenio->getNombre()} {$duenio->getApellido()}</a></h5>
			<button id="btnDescargar" class="btn btn-success" onclick="window.location='{$url_descargar_archivo}'+'{$archivo->getUbicacion()}'">
				Descargar <span class="fa fa-download"></span>
			</button>
		</div>
	</div>
	<div class="row panelMain panel-mio">
		<h2 id="tit_comentarios">Comentarios</h2>
		<div id="comentarios">

		</div>
		<div id="enviar_comentario">
			<form method="POST" id="enviar_mensaje">
				<div class="input-group">
				    <textarea required class="form-control custom-control" rows="1" style="resize:none" id="comentariooo" name="comentario"></textarea>
			    	<span class="input-group-addon btn btn-primary" id="btnEnviar">Enviar</span>
				</div>
			</form>
		</div>
	</div>
	{include file="include_js.tpl"}
	{include file="dialogos.tpl"}
	<script type="text/javascript">
		var id = {$archivo->getId ()};
		{if isset ($usuario)}
		var admin = {$usuario->esAdmin ()};
		var correoUsuario = "{$usuario->getCorreo ()}";
		{else}
		var admin = 0;
		var correoUsuario = "";
		{/if}
	</script>
	<script type="text/javascript" src="{$url_base}js/ver_archivo.js"></script>
</body>
</html>
