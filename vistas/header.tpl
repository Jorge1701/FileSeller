<nav class="navbar navbar-expand-lg navbar-dark cabecera">
	<img class="navbar-brand icono" src="{$url_base}img/icono.png" onclick="window.location='{$url_inicio}'">
	<a class="navbar-brand font-weight-bold tituloheader" href="#" title="Ir a inicio" onclick="window.location='{$url_inicio}'">{$nombre_proyecto}</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<form class="form-inline my-2 my-lg-0 mx-auto" action="{$url_base}inicio/buscar" method="GET">
			<input class="form-control mr-sm-2" type="search" placeholder="Nombre, tipo o dueño" aria-label="Search" name="busqueda">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar archivo</button>
		</form>
		<ul class="navbar-nav menu">
			<li class="nav-item {if isset($active_inicio)} {$active_inicio} {/if}">
				<a class="nav-link" href="#" onClick="window.location='{$url_inicio}'">Inicio<span class="sr-only"></span></a>
			</li>
			{if isset($usuario)}
			<li class="nav-item dropdown">
				<a class="nav-link fa fa-bell-o" href="#" title="Notificaciones" data-toggle="dropdown">
					<span class="fa fa-comment"></span>
					<span class="num">2</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right menu-notificaciones">
					<h6 class="menu-notificaciones-titulo">Notificaciones</h6>
					<table class="table">
						<tbody>
							<tr class="notification" onClick="">
								<th scope="row"><i class="fa fa-circle"></i></th>	
								<td> Bienvenido a File seller, la mejor plataforma para vender tus archivos</td>
								<td><div class="eliminar_notificacion"><i class="fa fa-times"></div></td>
							</tr>
							<tr class="notification" onClick="">
								<th scope="row"><i class="fa fa-circle"></i></th>	
								<td> Gracias por formar parte de la comunidad</td>
								<td><div class="eliminar_notificacion"><i class="fa fa-times"></div></td>
							</tr>
							<tr class="notification" onClick="">
								<th scope="row"><i class="fa fa-circle"></i></th>	
								<td> Gracias por formar parte de la comunidad</td>
								<td><div class="eliminar_notificacion"><i class="fa fa-times"></div></td>
							</tr>
						</tbody>
					</table>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link fa fa-inbox {if isset($active_mensajes)} {$active_mensajes} {/if}" href="#" title="Mensajes" data-toggle="dropdown">
						{if isset($notificacionesMensaje)}
						<span class="fa fa-comment"></span>
						<span class="num">{count($notificacionesMensaje)}</span>
						{/if}
					</a>


					<div class="dropdown-menu dropdown-menu-right menu-notificaciones">
						<h6 class="menu-notificaciones-titulo">Mensajes</h6>
						<table class="table">
							<tbody>
								{if isset($notificacionesMensaje)}
								{foreach $notificacionesMensaje as $notiMens}
								<tr class="notification" onClick="window.location='{$url_mensaje}/{$notiMens->getCorreo()}'">
									<th scope="row">{$notiMens->getNombre()}</th>
									<td>{$notiMens->getMensaje()}</td>
								</tr>
								{/foreach}
								{else}
								<tr>
									<th>No tienes mensajes nuevos</th>
								</tr>
								{/if}
							</tbody>
						</table>
						<div class="ver_conversaciones"><a onClick="window.location='{$url_mensaje}'" href="#">Ver conversaciones</a></div>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle {if isset($active_perfil)} {$active_perfil} {/if} " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="{$url_base}{$usuario->getImagen()}" title="Cuenta de File Seller" class="rounded-circle img-user">
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#" onClick="window.location='{$url_perfil}'"><i class="fa fa-user menu-perfil" aria-hidden="true"></i>Perfil</a>
						<a class="dropdown-item" href="#" onClick="window.location='{$url_subir_archivo}'"><i class="fa fa-upload menu-perfil" ></i>Subir archivo </a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#" onClick="window.location='{$url_logout}'"><i class="fa fa-sign-out menu-perfil"></i>Cerrar sesión</a>
					</div>
				</li>
				{else}
				<li class="nav-item {if isset($active_iniciarSesion)} {$active_iniciarSesion} {/if}">
					<a class="nav-link" href="#" title="Iniciar sesión" onClick="window.location='{$url_login}'">Iniciar sesión</a>
				</li>
				<li class="nav-item {if isset($active_registrarse)} {$active_registrarse} {/if}">
					<a class="nav-link" href="#" title="Registrarse" onClick="window.location='{$url_registro}'">Registrarse</a>
				</li>
				{/if}
				<li class="nav-item  {if isset($active_ayuda)} {$active_ayuda} {/if}">
					<a class="nav-link" href="#" title="Ayuda" onClick="window.location='{$url_ayuda}'"><i class="fa fa-question-circle"></i></a>
				</li>
			</ul>
		</div>
	</nav>

