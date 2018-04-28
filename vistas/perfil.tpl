<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/perfil.css">
	<title>Perfil</title>
</head>
<body background="{$url_base}img/wallpaper.jpg" id="body">
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
											<th scope="row">Medios de pago</th>
											<td><button class="btn btn-info ver" title="Ver medios de pago" data-toggle="collapse" data-target="#verCuentas">Ver <i class="fa fa-caret-down"></i></button>
											</td>
										</tr>
										<tr>
											<th scope="row"></th>
											<td>
												<div class="collapse text-center" id="verCuentas">
													
													{if $usuario->getCuentas() == null}
													No tiene medios de pago activos
													{else}
													<ul>	
														{foreach $usuario->getCuentas() as $cuenta}
														<li>
														<div class="input-group-prepend">
															<input class="input-group-text nrot" type="password" value="{$cuenta->getNroTarjeta()}" readonly id=nrot{$cuenta->getId()}>
															<span onclick="showPassword('nrot{$cuenta->getId()}','eyePass{$cuenta->getId()}');" class="input-group-text fa fa-eye" id="eyePass{$cuenta->getId()}"></span>
															<div class="fecc">{$cuenta->getFecVenc()}</div>
														</div>
													</li>
														{/foreach}
													</ul>
													{/if}
													<hr>
													<div><h5>Agregar</h5></div>
													<form action="{$url_agregar_pago}" method="POST" >
														<input class="input-group mb-3" type="number" name="numTajeta" placeholder="Nro de tarjeta">
														<input class="input-group mb-3" title="Fecha de vencimiento" type="text" name="fecVenc" placeholder="Fecha de vencimiento">
														<input class="input-group mb-3" type="number" name="cvv" placeholder="CVV">
														<input class="btn btn-success" type="submit" value="Agregar">
													</form>
												</div>
											</td>	
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
											<th></th>
											<th scope="row">Nombre</th>
											<th scope="row">Tipo</th>
											<th scope="row">Descripción</th>
											<th scope="row">Tamaño</th>
											<th scope="row">Precio($U)</th>
										</tr>
										{if isset($archivos)}
										{foreach $archivos as $archivo}
										<tr class="fila_archivo" onclick="window.location='{$url_ver_archivo}{$archivo->getId ()}'">
											<td><img class="img-file" src="{$url_base}{$archivo->getImg()}"></td>
											<td>{$archivo->getNombre()}</td>
											<td>{$archivo->getTipo()}</td>
											<td>{$archivo->getDescripcion()}</td>
											<td>{$archivo->getTamanio()}</td>
											<td>{$archivo->getPrecio()}</td>
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

						<button data-toggle="modal" data-target="#confirmar" class="btn btn-danger">Eliminar cuenta</button>



                        <div class="modal fade" id="confirmar" role="dialog" data-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header mx-auto">
                                        <h4>¿Está seguro?</h4>
                                    </div>
                                    <div class="modal-body">
                                    	<p>Esto resultará en la eliminación de toda su información incluidos sus archivos subidos.</p>
                                    </div>
                                    <div class="modal-footer mx-auto">
                                    	<button class="btn btn-danger" onClick="window.location='{$url_eliminar_usuario}'">Confirmar</button>
                                    	<button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
					</div>
				</div>
			</div>	
		</div>	
	</div>
</div>
</div>
{include file="include_js.tpl"}
<script type="text/javascript" src="{$url_base}js/perfil.js"></script>
</body>
</html>