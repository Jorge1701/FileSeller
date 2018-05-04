<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/perfil.css">
	<title> {if isset($usuarioOtro)}Perfil de {$usuarioOtro->getNombre()}{else}Tu perfil{/if}</title>
</head>
<body background="{$url_base}img/wallpaper.jpg" id="body">
	<!-- Header -->
	{include file="header.tpl"}
	<!------------------------------------------------------------------------------------------------ -->

	<!-- Perfil -->
	<div class="row">
		<div class="col-sm-9 col-md-9 user-details mx-auto">
			<!-- Perfil de usuario no logueado -->
			{if isset($usuarioOtro)}
			<div class="user-image">
				<img src="{$url_base}{$usuarioOtro->getImagen()}" class="rounded-circle img-user-perfil">
			</div>
			<div class="user-info-block card">
				<div class="user-heading">
					<h3>{$usuarioOtro->getNombre()} {$usuarioOtro->getApellido()}</h3>
					<div class="btn btn-primary btn-seguir" id="btnSeguir">Seguir <span class="fa fa-user-plus"></span></div>
					<div class="btn btn-secondary btn-dejar-seguir" hidden id="btnDejarSeguir">Dejar de seguir <span class="fa fa-user-times"></span></div>
				</div>
				<div class="container">
					<ul class="nav nav-tabs nav-tabs-fillup navigation">
						<li class="nav-item"><a data-toggle="tab" class=" active nav-link" href="#archivos">Sus archivos <span class="fa fa-file pestaña-icono"></span></a></li>
						<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#contacto">Contacto<span class="fa fa-user-circle-o pestaña-icono"></span></a></li>
					</ul>
					<div class="user-body">
						<div class="tab-content">
							<div id="archivos" class="active tab-pane slide-left">
								<table class="table">
									<thead>	
										<tr>
											<h4>Sus archivos</h4>
										</tr>		
									</thead>
									<tbody>
										<tr>
											<th></th>
											<th scope="row">Nombre</th>
											<th scope="row">Tipo</th>
											<th scope="row">Precio</th>
										</tr>
										{if isset($archivos)}
										{foreach $archivos as $archivo}
										<tr class="fila_archivo" onclick="window.location='{$url_ver_archivo}{$archivo->getId ()}'">
											<td><img class="img-file" src="{$url_base}{$archivo->getImg()}"></td>
											<td>{$archivo->getNombre()}</td>
											<td>{$archivo->getTipo()}</td>
											<td>{$archivo->getPrecio()}</td>
										</tr>
										{/foreach}
									</tbody>
								</table>
								{else}	
							</tbody>
						</table>
						<div class="sinArchivos">No tiene archivos subidos</div>
						{/if}
					</div>
					<div id="contacto" class="tab-pane slide-left">
						<table class="table">
							<thead>
								<tr>
									<h4>Información de contacto</h4>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">Nombre completo</th>
									<td>{$usuarioOtro->getNombre()} {$usuarioOtro->getApellido()}</td>
								</tr>
								<tr>
									<th scope="row">Correo</th>
									<td>{$usuarioOtro->getCorreo()}</td>
								</tr>
							</tbody>
						</table>
						<button class="btn btn-info" href="#" onClick="window.location='{$url_iniciar_conversacion}{$usuarioOtro->getCorreo()}'"><i class="fa fa-envelope"></i> Iniciar conversación</button>
					</div>
				</div>
			</div>
			{else}
			<!--Perfil del usuario logueado -->
			<div class="user-image">
				<img src="{$url_base}{$usuario->getImagen()}" class="rounded-circle img-user-perfil">
			</div>
			<div class="user-info-block card">
				<div class="user-heading">
					<h3>{$usuario->getNombre()} {$usuario->getApellido()}</h3>
					<span class="help-block">Paysandú, UY</span>
				</div>
				<div class="container">
					<ul class="nav nav-tabs nav-tabs-fillup navigation">
						<li class="nav-item"><a data-toggle="tab" class="{if !isset($mensaje_editar) && !isset($active_archivo)} active{/if} nav-link" href="#information">Datos personales<span class="fa fa-user-circle-o pestaña-icono"></span></a></li>
						<li class="nav-item"><a data-toggle="tab" class="{if isset($active_archivo)} active {/if}nav-link" href="#archivos">Mis archivos <span class="fa fa-file pestaña-icono"></span></a></li>
						<li class="nav-item"><a data-toggle="tab" class="{if isset($mensaje_editar)} active{/if} nav-link" href="#editar">Editar <span class="fa fa-edit pestaña-icono"></span></a></li>
					</ul>
					<div class="user-body">
						<div class="tab-content">
							<div id="information" class="tab-pane slide-left {if !isset($mensaje_editar) && !isset($active_archivo)} active{/if}">
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
													
													{if $usuario->getCuentas() !== null}
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
													<h5>Agregar</h5>
													<form action="{$url_agregar_pago}" method="POST" >
														<input class="form-control mb-3" required="Campo obligatorio" type="number" name="numTajeta" min="1000000000000000" max="9999999999999999" placeholder="Nro de tarjeta">
														<div class="input-group mb-3">
															<select required="Campo obligatorio" class="form-control" title="Mes de vencimiento" id="venc_mes" name="venc_mes">
																<option value="mes">Mes</option>
																<option value="01">Enero</option>
																<option value="02">Febrero</option>
																<option value="03">Marzo</option>
																<option value="04">Abril</option>
																<option value="05">Mayo</option>
																<option value="06">Junio</option>
																<option value="07">Julio</option>
																<option value="08">Agosto</option>
																<option value="09">Setiembre</option>
																<option value="10">Octubre</option>
																<option value="11">Noviembre</option>
																<option value="12">Diciembre</option>
															</select>
															<input required="Campo obligatorio"  type="text" class="form-control" title="Año de vencimiento" placeholder="Año" id="venc_anio" name="venc_anio">
														</div>
														<input class="form-control mb-3" type="number" name="cvv" placeholder="CVV">
														<input class="btn btn-success" type="submit" value="Agregar">
													</form>
													<hr>
												</div>
											</td>	
										</tr>
									</tbody>
								</table>
							</div>
							<div id="archivos" class="tab-pane slide-left {if isset($active_archivo)} active {/if}">
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
											<th scope="row">Precio</th>
										</tr>
										{if isset($archivos)}
										{foreach $archivos as $archivo}
										<tr class="fila_archivo" onclick="window.location='{$url_ver_archivo}{$archivo->getId ()}'">
											<td><img class="img-file" src="{$url_base}{$archivo->getImg()}"></td>
											<td>{$archivo->getNombre()}</td>
											<td>{$archivo->getTipo()}</td>
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
					<div id="editar" class="tab-pane slide-left {if isset($mensaje_editar)} active {/if}">
						<h4>Editar perfil</h4>
						{if isset($mensaje_editar)}
						<div class="alert alert-success text-center">
							<strong>{$mensaje_editar}</strong> 
						</div>
						{/if}
						<form method="post" enctype="multipart/form-data" action="{$url_editar_perfil}" class="text-center">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text fa fa-address-book" id="basic-addon1"></span>
								</div>
								<input name="nombre" id="nombre" type="text" value="{$usuario->getNombre()}" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" required="Ingrese su Nombre" autofocus title="Ingrese su Nombre">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text fa fa-address-book" id="basic-addon1"></span>
								</div>
								<input name="apellido" id="apellido" type="text" value="{$usuario->getApellido()}" class="form-control" placeholder="Apellido" aria-label="Apellido" aria-describedby="basic-addon1" required="Ingrese su Apellido" title="Ingrese su Apellido">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">@</span>
								</div>
								<input name="correo" id="correo" type="email" value="{$usuario->getCorreo()}" class="form-control" placeholder="Correo" aria-label="Correo" aria-describedby="basic-addon1" required="Ingrese su correo" title="Ingrese su correo">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text fa fa-lock" id="basic-addon1"></span>
								</div>
								<input name="password" id="password" type="password" class="form-control" placeholder="Contraseña (Sin cambios)" aria-label="Contraseña" aria-describedby="basic-addon1" title="Mínimo 6 / Máximo 21">
								<input hidden name="password_old"  value="{$usuario->getContrasenia()}">
								<!--ACA--><div class="input-group-prepend">
									<span onclick="showPassword(); //return false;" class="input-group-text fa fa-eye" id="eyePass"></span>
								</div>
							</div>

							{$fecha="-"|explode:$usuario->getFnac()} 

							<div class="input-group mb-3">
								<input required="Campo obligatorio" type="text" class="form-control" placeholder="Dia" id="dia" value="{$fecha[2]}" name="dia">
								<select required="Campo obligatorio" class="form-control" id="mes" name="mes">
									<option value="mes">Mes</option>
									<option {if $fecha[1] == "01"} selected {/if} value="01">Enero</option>
									<option {if $fecha[1] == "02"} selected {/if} value="02">Febrero</option>
									<option {if $fecha[1] == "03"} selected {/if} value="03">Marzo</option>
									<option {if $fecha[1] == "04"} selected {/if} value="04">Abril</option>
									<option {if $fecha[1] == "05"} selected {/if} value="05">Mayo</option>
									<option {if $fecha[1] == "06"} selected {/if} value="06">Junio</option>
									<option {if $fecha[1] == "07"} selected {/if} value="07">Julio</option>
									<option {if $fecha[1] == "08"} selected {/if} value="08">Agosto</option>
									<option {if $fecha[1] == "09"} selected {/if} value="09">Setiembre</option>
									<option {if $fecha[1] == "10"} selected {/if} value="10">Octubre</option>
									<option {if $fecha[1] == "11"} selected {/if} value="11">Noviembre</option>
									<option {if $fecha[1] == "12"} selected {/if} value="12">Diciembre</option>
								</select>
								<input required="Campo obligatorio"  type="text" class="form-control" placeholder="Año" id="anio" value="{$fecha[0]}" name="anio">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text fa fa-camera" id="basic-addon1"></span>
								</div>
								<input accept="image/*" name="archivo" id="archivo" type="file" class="form-control" aria-label="Archivo" aria-describedby="basic-addon1" title="Seleccione una imagen"/>
								<input hidden name="archivo_old" id="archivo_old" value="{$usuario->getImagen()}" type="text"/>
							</div>
							<p><strong>Nota:</strong> Solo .jpg, .jpeg, .gif, .png son los formatos permitidos con un máximo de 5Mb.</p>

							<!-- MODAL ERRORES DIA -->


							<div class="modal fade" id="modal_dia" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<p id="mensaje_dia"></p>
										</div>
										<div class="modal-footer">
										</div>
									</div>

								</div>
							</div>



							<!-- MODAL -->

							<!-- MODAL ERRORES MES -->


							<div class="modal fade" id="modal_mes" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<p id="mensaje_mes"></p>
										</div>
										<div class="modal-footer">
										</div>
									</div>

								</div>
							</div>



							<!-- MODAL -->

							<!-- MODAL ERRORES AÑO -->


							<div class="modal fade" id="modal_anio" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<p id="mensaje_anio"></p>
										</div>
										<div class="modal-footer">
										</div>
									</div>

								</div>
							</div>



							<!-- MODAL -->

							<!-- MODAL ERRORES Correo -->


							<div class="modal fade" id="modal_correo" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<p id="mensaje_correo"></p>
										</div>
										<div class="modal-footer">
										</div>
									</div>

								</div>
							</div>

							<!-- MODAL ERRORES DIA -->


							<div class="modal fade" id="modal_ok" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<p id="mensaje_ok"></p>
										</div>
										<div class="modal-footer">
										</div>
									</div>

								</div>
							</div>
							<button id="btnRegistro" type="submit" class="btn btn-success"><span class="fa fa-refresh"></span> Actualizar datos</button>
						</form>

						<hr>

						<button data-toggle="modal" data-target="#confirmar" class="btn btn-danger"><span class="fa fa-trash"></span> Eliminar cuenta</button>



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
	{/if}
</div>
</div>
{include file="include_js.tpl"}
<script type="text/javascript" src="{$url_base}js/perfil.js"></script>
<script type="text/javascript" src="{$url_base}js/registro.js"></script>
</body>
</html>