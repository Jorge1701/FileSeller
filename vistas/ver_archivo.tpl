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
					{$puntuacion|number_format:1}
				</h5>
				<div class="rating">
					<div  class="star-rating">
						{if $puntuo eq "no"}
						<img src="{$url_base}img/vacia.png">
						{else}
						<img src="{$url_base}img/llena.png">
						{/if}
						<h6>Puntuar</h6></div>
						<div   class="open-rating">
							<img class="1" onclick="puntuar('1')" src="{$url_base}img/vacia.png">
							<img class="2" onclick="puntuar('2')"  src="{$url_base}img/vacia.png">
							<img class="3" onclick="puntuar('3')" src="{$url_base}img/vacia.png">
							<img class="4" onclick="puntuar('4')" src="{$url_base}img/vacia.png">
							<img class="5" onclick="puntuar('5')" src="{$url_base}img/vacia.png">
						</div>
					</div>
					<form id="form" method="POST">
						<input hidden id="aux" type="text"  name="puntuar">
					</form>
					<h5>Vendedor: <a href="{$url_ver_perfil_duenio}{$duenio->getCorreo()}" title="Ver perfil de {$duenio->getNombre()} {$duenio->getApellido()}">{$duenio->getNombre()} {$duenio->getApellido()}</a></h5>
					{if isset($usuario) && $usuario->esAdmin ()}
					<button id="btnDescargarAdm" class="btn btn-info" onclick="window.location='{$url_descargar_archivo}'+'{$archivo->getUbicacion()}'">
						Descargar Como Admin <span class="fa fa-download"></span>
					</button>
					{else if $archivo->getMoneda() == "Gratis"}
					<button id="btnDescargar" class="btn btn-success" onclick="window.location='{$url_descargar_archivo}'+'{$archivo->getUbicacion()}'">
						Descargar <span class="fa fa-download"></span>
					</button>
					{else}
					<button id="btnComprar" class="btn btn-success">
						Comprar <i class="fa fa-dollar-sign"></i>
					</button>
					{/if}

					
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

		{include file="dialogos.tpl"}
		{include file="include_js.tpl"}
		<script>
			var puntuo = "{$puntuo}";
			var url_ver_archivo = "{$url_ver_archivo}";
			var url_base = "{$url_base}";
			var url_puntuar = "{$url_puntuar}";
			var idArchivo = "{$archivo->getId()}";
			{if isset($usuario)}
			var id = {$usuario->getId ()};
			var correoUsuario = "{$usuario->getCorreo ()}";
			var admin = {$usuario->esAdmin ()};
			{else}
			var correoUsuario = "";
			var id = 0;
			var admin = 0;
			{/if}


		</script>

		<script type="text/javascript" src="{$url_base}js/ver_archivo.js"></script>
	</body>



	</html>
