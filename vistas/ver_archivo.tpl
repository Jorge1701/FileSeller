<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}

	<title>File Seller - Ver Archivo</title>
	<link rel="stylesheet" type="text/css" href="{$url_base}style/ver_archivo.css">
</head>
<body background="{$url_base}img/wallpaper.jpg">
	{include file="header.tpl"}
	
	{if isset($mensaje_editar)}
	<div align="center">
		<div class="col-lg-11 alert alert-success text-center">
			<strong>{$mensaje_editar}</strong> 
		</div>
	</div>
	{/if}

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
				Precio: {$archivo->getMoneda()} {$archivo->getPrecio ()}
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
			<h5>Vendedor: <a href="{$url_ver_perfil_duenio}{$duenio->getCorreo()}" title="Ver perfil de {$duenio->getNombre()} {$duenio->getApellido()}">
				{$duenio->getNombre()} {$duenio->getApellido()}</a></h5>
				<button id="btnDescargar" class="btn btn-success" onclick="window.location='{$url_descargar_archivo}'+'{$archivo->getUbicacion()}'">
					Descargar <span class="fa fa-download"></span>
				</button>

				{if $usuario != null && $usuario->getId() == $archivo->getDuenio()}
				<button class="btn btn-info" style="margin-top: 7px" onclick="window.location='{$url_base}archivo/editar/{$archivo->getId()}'">Editar <span class="fas fa-edit"></span></button>
				{/if}
			</div>
		</div>
		<div class="row panelMain panel-mio">
			<h2 id="tit_comentarios">Comentarios</h2>
			<div id="comentarios">
				{if isset ($comentarios)}
				{foreach $comentarios as $c}
				<div class="comentario {if $c->getDuenio ()}mio{else}otro{/if}">
					<p class="com_usuario">
						<a href="/FileSeller/usuario/perfil/{$c->getUsuario ()}" style="color: #{$c->getColor ()}">
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
						<input type="text" class="form-control" placeholder="Comentario" name="comentario" required>
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
