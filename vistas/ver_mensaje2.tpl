<!DOCTYPE html>
<html>
<head>
	<title>Conversaciones</title>
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/ver_mensaje.css">
</head>
<body background="{$url_base}img/wallpaper.jpg">
	<!-- Header -->
	{include file="header.tpl"}

	<div hidden>
		<span id="linkContacto" class="link-contacto">
			<div class="contacto">
				<img src="{$url_base}img/icono.png" class="rounded-circle img-usuario">
				<span class="txtNombreContacto"></span>
				<span class="num-msj"></span>
			</div>
		</span>

		<span id="noTieneContactos" class="link-contacto">
			<div class="contacto seleccionado notiene">
				<span class="txtNombreContacto">No tiene Conversaciones</span>
			</div>
		</span>

		<div id="msjNoHayMensajes" class="mx-auto msj visto">
			Mande un mensaje para iniciar una conversacion con <span class="nombre"></span>
		</div>

		<div id="msjnousurcc" class="mx-auto msj error">
			Ningun usuario registrado con el correo <span class="nombre"></span>
		</div>

		<div id="msjOtro" class="mensaje otro">
			<p class="mensaje-texto">
				Mensaje
			</p>
			<p class="mensaje-hora">
				Hora
			</p>
		</div>

		<div id="msjMio" class="mensaje mio">
			<p class="mensaje-texto">
				Mensaje
			</p>
			<p class="mensaje-hora">
				Hora
			</p>
		</div>

		<div id="fechaaaA" class="fecha">
			Fecha
		</div>

		<div id="msjNuevoooososs" class="mx-auto msj nuevo">
			Mensajes nuevos <i class="fas fa-level-down-alt"></i>
		</div>

		<div id="leidohastaaqui" class="mx-auto msj visto">
			<span class="nombre"></span> ha leido hasta aqui <i class="fa fa-eye"></i>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-5 panel-izq">
				<div class="titulo">
					Conversaciones
				</div>
				<!-- Lista de Contactos -->
				<div id="contactos">
				</div>
			</div>
			<div class="col-sm-7 panel-der">
				<div class="titulo">
					<span id="txtNombre">Conversacion</span>
				</div>
				<!-- Lista de Mensajes -->
				<div id="chat">
					<div id="listaMsjs">

						<div class="mx-auto msj visto">
							Seleccione una conversacion
						</div>

					</div>
				</div>
				<!-- Responder Mensaje -->
				<div class="form-enviar">
					<form method="POST" onsubmit="return false">
						<div class="input-group">
							<!-- Texto -->
							<input type="text" class="form-control" placeholder="Mensaje" name="mensaje" required autofocus id="msjAEnviar">
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
		</div>
	</div>
	{include file="include_js.tpl"}
	<script type="text/javascript" src="{$url_base}js/ver_mensaje.js"></script>
</body>
</html>
