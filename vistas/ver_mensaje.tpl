<!DOCTYPE html>
<html>
<head>
	{if $seleccionado eq "si" && $existe_seleccionado eq "si"}
		<title>Conversacion con {$usuario_seleccionado->getNombre ()} {$usuario_seleccionado->getApellido ()}</title>
	{else}
		<title>Conversaciones</title>
	{/if}
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/ver_mensaje.css">
</head>
<body background="{$url_base}img/wallpaper.jpg">
	<!-- Header -->
	{include file="header.tpl"}
	
	<div class="container">
		<div class="row">
			<div class="col-sm-5 panel-izq">
				<div class="titulo">
					Conversaciones
				</div>
				<!-- Lista de Contactos -->
				<div id="contactos">
					{foreach $conversaciones as $c}
					<a href="{$url_base}mensajes/chat/{$c->getCorreo ()}" class="link-contacto">
						{if $existe_seleccionado eq "si"}
							{if $usuario_seleccionado->getCorreo () eq $c->getCorreo ()}
								<div class="contacto seleccionado">
							{else}
								<div class="contacto">
							{/if}
						{else}
							<div class="contacto">
						{/if}
							<img src="{$url_base}{$c->getImagen ()}" class="rounded-circle img-usuario">
							{$c->getNombre ()}
							{if $c->getCant () neq 0}
								<span class="num-msj">{$c->getCant ()}</span>
							{/if}
						</div>
					</a>
					{/foreach}
				</div>
			</div>
			<div class="col-sm-7 panel-der">
				<div class="titulo">
					{if $existe_seleccionado eq "si"}
						Conversacion con {$usuario_seleccionado->getNombre ()} {$usuario_seleccionado->getApellido ()}
					{else}
						Conversacion
					{/if}
				</div>
				<!-- Lista de Mensajes -->
				<div id="chat">
					{if $conversacion_abierta_con_seleccionado eq "no"}
						{if $seleccionado eq "si"}
							{if $existe_seleccionado eq "si"}
								<div class="mx-auto msj visto">
									Mande un mensaje para iniciar una conversacion con {$correo_seleccionado}
								</div>
							{else}
								<div class="mx-auto msj error">
									Ningun usuario registrado con el correo {$correo_seleccionado}
								</div>
							{/if}
						{else}
							<div class="mx-auto msj visto">
								Seleccione una conversacion
							</div>
						{/if}
					{else}
						<div id="listaMsjs">
							{assign dia ""}
							{assign primero "si"}
							{assign visto "si"}
							{assign visto_otro "si"}
							{assign ultimo ""}
							{foreach $mensajes as $m}
								<!-- Mostrar visto o no -->

								{if $m->esPropio () && !$m->estaVisto ()}
									{if $primero eq "si"}
										<!-- Si no ha abierto la conversacion -->
										<div class="mx-auto msj no-leido">
											{$usuario_seleccionado->getNombre ()} {$usuario_seleccionado->getApellido ()} no ha leido la conversacion <i class="fa fa-eye-slash"></i>
										</div>
									{else}
										<!-- Aparece antes del ultimo mensaje visto por el otro -->
										{if $m->esPropio () && !$m->estaVisto () && $visto eq "si"}
											<div class="mx-auto msj visto">
												{$usuario_seleccionado->getNombre ()} {$usuario_seleccionado->getApellido ()} ha leido hasta aqui <i class="fa fa-eye"></i>
											</div>
										{/if}
									{/if}
									{assign visto "no"}
								{/if}
								{assign primero "no"}

								<!-- Si los mensajes son nuevos y no los ha visto el usuario logueado -->
								{if !$m->esPropio () && !$m->estaVisto () && $visto_otro eq "si"}
									<div class="mx-auto msj nuevo">
										Mensajes nuevos <i class="fa fa-level-down"></i>
									</div>
									{assign visto_otro "no"}
								{/if}

								<!-- Mostrar dia de la conversacion -->
								{if $m->getDia () neq $dia}
									{assign dia $m->getDia ()}
									<div class="fecha">
										{$m->getDia ()}
									</div>
								{/if}

								<!-- Mostrar mensaje -->
								{if $m->esPropio ()}
								{assign ultimo "mio"}
								<div class="mensaje mio">
								{else}
								{assign ultimo "otro"}
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

							<!-- Si el otro ha leido todos los mensajes -->
							{if $visto eq "si" && $visto_otro eq "si" && $ultimo eq "mio"}
								<div class="mx-auto msj visto">
									{$usuario_seleccionado->getNombre ()} {$usuario_seleccionado->getApellido ()} ha leido todo <i class="fa fa-eye"></i>
								</div>
							{/if}
						</div>
					{/if}
				</div>
				<!-- Responder Mensaje -->
				<div class="form-enviar">
					<form method="POST">
						<div class="input-group">
							<!-- Texto -->
							<input type="text" class="form-control" placeholder="Mensaje" name="mensaje" required autofocus>
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
	<script type="text/javascript" src="{$url_base}js/ver_mensaje.js"></script>
	{include file="include_js.tpl"}
</body>
</html>
