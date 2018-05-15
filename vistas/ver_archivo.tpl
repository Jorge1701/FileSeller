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
			{if isset ($comentarios)}
				{foreach $comentarios as $c}
					<div class="comentario {if $c->getDuenio ()}mio{else}otro{/if}">
						<p class="com_usuario">
							<a href="/FileSeller/usuario/perfil/{$c->getUsuario ()}">
								{if $c->getDuenio ()}
									[Dueño] 
								{/if}
								{$c->getNombre ()}
							</a>
						</p>
						<p class="com_comentario">
							{$c->getComentario ()}
						</p>
					</div>
				{/foreach}
			{else}
				<div id="msjNoHayComents">
					No hay comentarios, se el primero!
				</div>
			{/if}
		</div>
		<div id="enviar_comentario">
			<form method="POST">
				<div class="input-group">
					<!-- Texto -->
					<input type="text" class="form-control" placeholder="Comentario" name="comentario" required autofocus>
					<div class="input-group-btn">
						<!-- Boton Enviar -->
						<button class="btn btn-default" type="submit" id="btnEnviar">
							<i class="fa fa-share-square"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	{include file="include_js.tpl"}
</body>
</html>
