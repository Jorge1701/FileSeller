<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/perfil.css">
	<title>Perfil</title>
</head>
<body background="{$url_base}img/wallpaper.jpg">
	<!-- Header -->
	{include file="header.tpl"}
	<!------------------------------------------------------------------------------------------------ -->

	<!-- Perfil -->
	<div class="row">
		<div class="col-sm-9 col-md-9 user-details mx-auto">
			<div class="user-image">
				<img src="{$url_base}{$usuario->getImagen()}" class="rounded-circle img-user-perfil">
			</div>
			<div class="user-info-block card">
				<div class="user-heading">
					<h3>{$usuario->getNombre ()} {$usuario->getApellido ()}</h3>
					<span class="help-block">Paysandú, UY</span>
				</div>
				<div class="container">
					<ul class="nav nav-tabs nav-tabs-fillup navigation">
						<li class="nav-item"><a data-toggle="tab" class="active nav-link" href="#information">Datos personales<span class="fa fa-user-circle-o pestaña-icono"></span></a></li>
						<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#archivos">Mis archivos <span class="fa fa-file pestaña-icono"></span></a></li>
						<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#editar">Editar <span class="fa fa-edit pestaña-icono"></span></a></li>
					</ul>
					<div class="user-body">
						<div class="tab-content">
							<div id="information" class="tab-pane slide-left active">
								<table class="table">
									<thead>
										<tr>
											<h4>Datos personales</h4>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">Nombre completo</th>
											<td>{$usuario->getNombre()} {$usuario->getApellido()}</td>
										</tr>
										<tr>
											<th scope="row">Fecha de nacimiento</th>
											<td>{$usuario->getFnac()}</td>
										</tr>
										<tr>
											<th scope="row">Correo</th>
											<td>{$usuario->getCorreo()}</td>
										</tr>
										<tr>
											<th scope="row">Cuentas</th>
											<td>{if "" eq $usuario->getCuentas()}No tiene medios de pago activos{/if}</td>
										</tr>
										<tr>
											<th scope="row">Identificador de la cuenta</th>
											<td>{$usuario->getId()}</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div id="archivos" class="tab-pane slide-left">
								<table class="table">
									<thead>	
											<tr>
												<h4>Mis archivos</h4>
											</tr>		
									</thead>
									<tbody>
										<tr>
											<th scope="row">Nombre</th>
											<th scope="row">Tipo</th>
											<th scope="row">Descripción</th>
											<th scope="row">Tamaño</th>
											<th scope="row">Precio($U)</th>
											<th scope="row">Subido en</th>
											<th scope="row">Estado</th>
										</tr>
										{if isset($archivos)}
										{foreach $archivos as $archivo}
										<tr class="fila_archivo" onclick="window.location='{$url_ver_archivo}{$archivo->getId()}'">
											<td>{$archivo->getNombre()}</td>
											<td>{$archivo->getTipo()}</td>
											<td>{$archivo->getDescripcion()}</td>
											<td>{$archivo->getTamanio()}</td>
											<td>{$archivo->getPrecio()}</td>
											<td>{$archivo->getFecSubido()} | {$archivo->getHoraSubido()}</td>
											<td>{if ($archivo->getVendido()==true)}Vendido {else}En venta{/if}</td>
										</tr>
										{/foreach}
									</tbody>
									</table>
										{else}	
									</tbody>
									</table>
									<div class="sinArchivos">No tienes archivos subidos</div>
									{/if}
									
								<button class="btn btn-info" href="#" onClick="window.location='{$url_subir_archivo}'"><i class="fa fa-upload btn-subir" ></i>Subir nuevo</button>
							</div>
							<div id="editar" class="tab-pane slide-left">
								<h4>Editar perfil</h4>

								<h6>Esta función será implementada en el siguiente Sprint.</h6>
							</div>
						</div>
					</div>	
				</div>	
			</div>
		</div>
	</div>
	{include file="include_js.tpl"}
</body>
</html>