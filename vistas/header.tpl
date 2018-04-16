<nav class="navbar navbar-expand-lg navbar-dark">
	<img class="navbar-brand" style="width: 5%; height: 5%" src="../../img/icono.png" onclick="window.location='{$inicio}'">
	<a class="navbar-brand font-weight-bold" style="font-size: 200%" href="#" title="Ir a inicio" onclick="window.location='{$inicio}'">{$nombre_proyecto}</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<form class="form-inline my-2 my-lg-0 mx-auto">
			<input class="form-control mr-sm-2" type="search" placeholder="Nombre, tipo o dueño" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar archivo</button>
		</form>
		<ul class="navbar-nav" style="font-size: 130%">
			<li class="nav-item">
				<a class="nav-link" href="#" onClick="window.location='{$inicio}'">Inicio<span class="sr-only"></span></a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link" href="#" data-toggle="dropdown" title="Notificaciones"><i class="fa fa-bell-o nav-link" style="margin-right: 5%" aria-hidden="true"></i></a>

				<div class="dropdown-menu dropdown-menu-right" style="width: 400px">
					<h6 style="margin: 10px 0px 0px 60px">Notificaciones</h6>
					<hr>
					<ul>
						<li class="dropdown-item"><i class="fa fa-circle-thin"></i> Gracias por formar parte de la comunidad<hr></li>
						<li class="dropdown-item"><i class="fa fa-circle-thin"></i> Has vendido tu primer archivo<hr></li>
					</ul>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link" href="#" title="Mensajes" data-toggle="dropdown"><i class="fa fa-inbox nav-link" style="margin-right: 5%" aria-hidden="true"></i></a>

				<div class="dropdown-menu dropdown-menu-right" style="width: 400px">
					<h6 style="margin: 10px 0px 20px 60px">Mensajes</h6>
					<table class="table">
						<tbody>
							<tr>
								<th scope="row">Brian</th>
								<td>hola como estas ?</td>
							</tr>
							<tr>
								<th scope="row">Luisito</th>
								<td>que haces loco ? era para...</td>
							</tr>
							<tr>
								<th scope="row">Jorge</th>
								<td>te mando el archivo del coso...</td>
							</tr>
						</tbody>
					</table>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="{$usuario->getImagen()}" title="Cuenta de File Seller" class="rounded-circle" style="width: 25pt; height: 25pt">
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#" onClick="window.location='{$perfil}'"><i class="fa fa-user" style="margin-right: 5%" aria-hidden="true"></i>Perfil</a>
					<a class="dropdown-item" href="#"><i class="fa fa-upload" style="margin-right: 5%"></i>Subir archivo </a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#"><i class="fa fa-sign-out" style="margin-right: 5%"></i>Cerrar sesión</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#" title="Ayuda"><i class="fa fa-question-circle" style="margin-right: 5%"></i></a>
			</li>
		</ul>
	</div>
</nav>
<hr style="border-color: hsl(226, 59%, 60%)";>