<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}

	<title>File Seller - Ver Archivo</title>
	<link rel="stylesheet" type="text/css" href="{$url_base}style/ver_archivo.css">
	
</head>
{$reporte}
{if $reporte eq "ok"}
<body background="{$url_base}img/wallpaper.jpg" onload="reporteExito()">
	{else}
	<body background="{$url_base}img/wallpaper.jpg">
		{/if}
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
					Puntuacion:
					<span id="estrellas">
						<i class="fa fa-star"></i>
					</span>
					{$puntuacion}
				</h5>
				<div class="rating">
					<div style="display: inline-block;" class="star-rating">
						{if $reporte eq "no"}
						<img src="{$url_base}img/vacia.png">
						{else}
						<img src="{$url_base}img/llena.png">
						{/if}
						<h6>Puntuar</h6></div>
						<div style="display: none; " class="open-rating">
							<img id="uno" onclick="puntuar('1')" src="{$url_base}img/vacia.png">
							<img id="dos"  onclick="puntuar('2')"  src="{$url_base}img/vacia.png">
							<img id="tres" onclick="puntuar('3')" src="{$url_base}img/vacia.png">
							<img id="cuatro" onclick="puntuar('4')" src="{$url_base}img/vacia.png">
							<img id="cinco" onclick="puntuar('5')" src="{$url_base}img/vacia.png">
						</div>
					</div>
					<form id="form" method="POST">
						<input hidden id="aux" type="text"  name="puntuar">
					</form>
					<h5>Vendedor: <a href="{$url_ver_perfil_duenio}{$duenio->getCorreo()}" title="Ver perfil de {$duenio->getNombre()} {$duenio->getApellido()}">{$duenio->getNombre()} {$duenio->getApellido()}</a></h5>
					<button id="btnDescargar" class="btn btn-success" onclick="window.location='{$url_descargar_archivo}'+'{$archivo->getUbicacion()}'">
						Descargar <span class="fa fa-download"></span>
					</button>

					
					{if $usuario != null && $usuario->getId() == $archivo->getDuenio()}
					<button class="btn btn-info" style="margin-top: 7px" onclick="window.location='{$url_base}archivo/editar/{$archivo->getId()}'">Editar <span class="fas fa-edit"></span></button>
					{/if}

					<button type="button" style="margin-top: 7px" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Reportar <span class="fas fa-exclamation-circle"></span></button>
				</div>


				<!-- Modal -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">	
								<h4 class="modal-title">Reportar</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body ">
								<h5>Motivo Del Reporte</h5>
								<form method="POST">
									<input type="radio" value="Engañoso" name="reporte">Contenido Engañoso<br>
									<input type="radio" value="Inapropiado" name="reporte">Contenido Inapropiado<br>
									<input type="radio" value="Ilegal" name="reporte">Contenido Ilegal<br>
									<input type="radio" value="Dañino" name="reporte">Contenido Dañino<br>
									<input type="radio" value="Otros" name="reporte">Otros<br>
									<h5>Descripcion Del Reporte (opcional)</h5>
									<textarea name="descripcion" style="width: 80%;" maxlength="150"></textarea>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-default"  name="aceptar" >Aceptar</button>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="fin" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">	
							<h4 class="modal-title">Reporte Finalizado</h4>
							<button type="button" class="close" onclick="salir()">&times;</button>
						</div>
						<div class="modal-body">
							<p>Su reporte a si concluido con exito, en breve los administradores revisaran el archivo.</p>
							<p>Muchas Gracias.</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default"  onclick="salir()">Salir</button>
						</div>
					</div>
				</div>
			</div>


			<!--<div class="col-lg-8 col-md-8 col-sm-7 col-xs-6 panel">
				<h2 id="titulo">{$archivo->getNombre ()}</h2>
				<p>
					{$archivo->getDescripcion ()}
				</p>
			</div> -->
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
					No hay comentarios, sé el primero!
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
		<script>

			var url_ver_archivo = "{$url_ver_archivo}";
			var url_base = "{$url_base}";
			var url_puntuar = "{$url_puntuar}";
			var idArchivo = "{$archivo->getId()}"


		</script>
		<script type="text/javascript" src="{$url_base}js/ver_archivo.js"></script>
	</body>



	</html>
