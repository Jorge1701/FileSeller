<!DOCTYPE html>
<html>
<head>
	{if isset ($seleccionado)}
		<title>Conversacion con {$seleccionado->getNombre ()} {$seleccionado->getApellido ()}</title>
	{else}
		<title>Conversaciones</title>
	{/if}
<<<<<<< HEAD
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/ver_mensaje.css">
=======

	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/ver_mensaje.css">
	<title>Chat con {$usuario}</title>
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
</head>
<body background="{$url_base}img/wallpaper.jpg">
	<!-- Header -->
	{include file="header.tpl"}
	
	<div class="container">
		<div class="row">
			<div class="col-sm-5 panel-izq">
				<div class="titulo">
					Contactos
				</div>
				<!-- Lista de Contactos -->
				<div id="contactos">
					{foreach $usuarios as $u}
					<a href="{$url_base}mensajes/chat/{$u}" class="link-contacto">
						{if isset ($seleccionado)}
							{if $seleccionado->getCorreo () eq $u}
								<div class="contacto seleccionado">
							{else}
								<div class="contacto">
							{/if}
						{else}
								<div class="contacto">
						{/if}
							<img src="{$url_base}img/user-default.png" class="rounded-circle img-usuario">
							{$u}
							<span class="num-msj">100</span>
						</div>
					</a>
					{/foreach}
				</div>
			</div>
			<div class="col-sm-7 panel-der">
				<div class="titulo">
					{if isset ($seleccionado)}
						Conversacion con {$seleccionado->getNombre ()} {$seleccionado->getApellido ()}
					{else}
						Conversacion
					{/if}
				</div>
				<!-- Lista de Mensajes -->
				<div id="chat">
					{if isset ($seleccionado)}
						{assign "primero" "si"}
						{assign "dia" ""}
						{assign "visto" "no"}
						{foreach $mensajes as $m}
							{if $m->esPropio ()}
								{if $visto eq "no" && !$m->estaVisto ()}
									{if $primero eq "si"}
										<div class="mx-auto msj no-leido">
											{$seleccionado->getNombre ()} {$seleccionado->getApellido ()} no ha leido la conversacion <i class="fa fa-eye-slash"></i>
										</div>
									{else}
										<div class="mx-auto msj visto">
											{$seleccionado->getNombre ()} {$seleccionado->getApellido ()} ha leido hasta aqui <i class="fa fa-eye"></i>
										</div>
									{/if}
										{assign "visto" "si"}
								{/if}
							{/if}
							{assign "primero" "no"}
							{if $dia neq $m->getDia ()}
								<div class="fecha">
									{$m->getDia ()}
								</div>
								{assign "dia" $m->getDia ()}
							{/if}
							{if $m->esPropio ()}
							<div class="mensaje mio">
							{else}
							<div class="mensaje otro">
							{/if}
								<p class="mensaje-texto">
									{$m->getMensaje ()}
								</p>
								<p class="mensaje-hora">
									{$m->getHora ()}
								</p>
							</div>
						{/foreach}
					{else}
						<div class="mx-auto msj error">
							{if isset ($seleccionado)}
								No tiene mensajes con {$seleccionado->getNombre ()} {$seleccionado->getApellido ()}
							}
							{else}
								{if isset ($sin_seleccionar)}
									Seleccione una conversacion
								{else}
									Ningun usuario registrado con el correo {$correo}
								{/if}
							{/if}
						</div>
					{/if}
				</div>
				<!-- Responder Mensaje -->
				<div class="form-enviar">
					<form method="POST">
						<div class="input-group">
							<!-- Texto -->
							<input type="text" class="form-control" placeholder="Mensaje" name="mensaje" required>
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
</body>
</html>