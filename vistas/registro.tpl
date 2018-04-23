<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/login.css">
	<title>Registrarse</title>
</head>
<body background="../../img/wallpaper.jpg">
	{include file="header.tpl"}
	<!-- ----------------------------------------------------------------------------- -->

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 mx-auto card text-center">
				<div class="mx-auto is"><h4>Registrarse</h4></div>
				<hr>
				<form method="post">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-address-book" id="basic-addon1"></span>
						</div>
						<input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" required="Ingrese su Nombre" autofocus title="Ingrese su Nombre">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-address-book" id="basic-addon1"></span>
						</div>
						<input name="apellido" id="apellido" type="text" class="form-control" placeholder="Apellido" aria-label="Apellido" aria-describedby="basic-addon1" required="Ingrese su Apellido" autofocus title="Ingrese su Apellido">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">@</span>
						</div>
						<input name="correo" id="correo" type="email" class="form-control" placeholder="Correo" aria-label="Correo" aria-describedby="basic-addon1" required="Ingrese su correo" autofocus title="Ingrese su correo">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-lock" id="basic-addon1"></span>
						</div>
						<input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon1" autofocus title="Mínimo 6 / Máximo 21" required="Mínimo 6 / Máximo 21"/>
					</div>


					<div class="input-group mb-3">
						<input required="Campo obligatorio" type="text" class="form-control" placeholder="Dia" id="dia">
						<select required="Campo obligatorio" class="form-control"  id="mes">
							<option value="mes">Mes</option>
							<option value="enero">Enero</option>
							<option value="febrero">Febrero</option>
							<option value="marzo">Marzo</option>
							<option value="abril">Abril</option>
							<option value="mayo">Mayo</option>
							<option value="junio">Junio</option>
							<option value="julio">Julio</option>
							<option value="agosto">Agosto</option>
							<option value="setiembre">Setiembre</option>
							<option value="octubre">Octubre</option>
							<option value="noviembre">Noviembre</option>
							<option value="diciembre">Diciembre</option>
						</select>
						<input required="Campo obligatorio"  type="text" class="form-control" placeholder="Año" id="anio">
					</div>

					<!--
						<form enctype="multipart/form-data" method="post" id="attachfileform" name="formArchivo" action="../clases/prueba.php"> -->
							<form enctype="multipart/form-data" method="post">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-camera" id="basic-addon1"></span>
									</div>
									<input accept="image/*" name="archivo" id="archivo" type="file" class="form-control" aria-label="Archivo" aria-describedby="basic-addon1" autofocus title="Seleccione una imagen"/>
								</div>

									<button id="btnImagen" class="btn btn-success btn-iniciar-sesion">Subir Imagen</button>
									<p><strong>Nota:</strong> Solo .jpg, .jpeg, .gif, .png son los formatos permitidos con un máximo de 5Mb.</p>
								
							</form>


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

							<!-- MODAL ERRORES MES -->


							<div class="modal fade" id="modal_imagen" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<p id="mensaje_imagen"></p>
										</div>
										<div class="modal-footer">
										</div>
									</div>

								</div>
							</div>



							<!-- MODAL -->

							<button id="btnRegistro" class="btn btn-success btn-iniciar-sesion">Aceptar</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="../../bootstrap/jquery/jquery-3.3.1.slim.js"></script>
		<script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="../../js/registro.js"></script>
	</body>
	</html>