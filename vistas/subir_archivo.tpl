<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/login.css">
	<title>Subir archivo</title>
</head>
<body background="{$url_base}img/wallpaper.jpg">
	{include file="header.tpl"}
	<!-- ----------------------------------------------------------------------------- -->

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 mx-auto card text-center">
				<div class="mx-auto is"><h4>Subir archivo</h4></div>
				<hr>
				<form method="POST" enctype="multipart/form-data" action="{$url_subir_archivo}">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-file" id="basic-addon1"></span>
						</div>
						<input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" required="Ingrese el nombre del archivo" autofocus title="Nombre del archivo" {if isset($nombre_archivo)} value ="{$nombre_archivo}" {/if}>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-file-text-o" id="basic-addon1"></span>
						</div>
						<textarea placeholder="Descripción" id="descripcion" name ="descripcion" class="form-control" title="Descripción del archivo">{if isset($descripcion_archivo)}{$descripcion_archivo}{/if}</textarea>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-money"></span>
						</div>
						<input name="precio" id="precio" type="number" class="form-control" placeholder="Precio" aria-label="Precio" aria-describedby="basic-addon1" required="Ingrese un precio en pesos uruguayos" autofocus title="Precio del archivo" {if isset($precio_archivo)} value ="{$precio_archivo}" {/if}>
						<div class="input-group-append">  
							<select class="btn btn-outline-secondary" title="Seleccionar tipo de moneda" name="moneda">
								<option title="Pesos uruguayos">$U</option>
								<option title="Dolares estadounidenses">USD</option>
							</select>	
						</div>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-camera" id="basic-addon1"></span>
						</div>
						<input accept="image/*" name="img" id="img" type="file" class="form-control" aria-label="img" aria-describedby="basic-addon1" autofocus title="Seleccionar una imagen de muestra"/>
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-save" id="basic-addon1"></span>
						</div>
						<input name="archivo" id="archivo" type="file" class="form-control" required="Seleccione un archivo" aria-label="Archivo" aria-describedby="basic-addon1" autofocus title="Seleccionar el archivo"/>
					</div>

					{if isset($mensaje)} 
					<div class="mensaje">{$mensaje}</div>
					<br>
					{/if}

					<button id="btnLogin" class="btn btn-success btn-iniciar-sesion">Subir <i class="fa fa-upload"></i></button>
				</form>
			</div>
		</div>
	</div>
</div>

{include file="include_js.tpl"}
</body>
</html>