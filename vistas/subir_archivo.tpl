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
				<form method="POST" enctype="multipart/form-data" id="formSubir" action="{$url_subir_archivo}">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-file" id="basic-addon1"></span>
						</div>
						<input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" required="Ingrese el nombre del archivo" autofocus title="Nombre del archivo" {if isset($nombre_archivo)} value ="{$nombre_archivo}" {/if}>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-file-alt" id="basic-addon1"></span>
						</div>
						<textarea placeholder="Descripción" id="descripcion" name ="descripcion" class="form-control" title="Descripción del archivo">{if isset($descripcion_archivo)}{$descripcion_archivo}{/if}</textarea>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-money-bill-alt"></span>
						</div>
						<input name="precio" id="precio" type="number" step="0.01" class="form-control" placeholder="Precio" aria-label="Precio" aria-describedby="basic-addon1" autofocus title="Precio del archivo" {if isset($precio_archivo)} value ="{$precio_archivo}" {else} disabled {/if}>
						<div class="input-group-append">
							{$moneda = ""}
							{if isset($moneda_archivo)}
								{$moneda = $moneda_archivo}
							{/if}  
							<select class="btn btn-outline-secondary" id="moneda" title="Seleccionar tipo de moneda" name="moneda">
								<option {if $moneda == 'Gratis'} selected {/if} title="Gratis" value="Gratis">Gratis</option>
								<option {if $moneda == 'URU'} selected {/if}title="Pesos uruguayos" value="URU">$U</option>
								<option {if $moneda == 'USD'} selected {/if}title="Dolares estadounidenses" value="USD">USD</option>
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

					<button id="btnSubir" class="btn btn-success btn-iniciar-sesion">Subir <i class="fa fa-upload"></i></button>
					<p id="imgCarga" hidden><img src="{$url_base}img/carga.gif" style="width: 50px; height: 50px;"></p>
				</form>
			</div>
		</div>
	</div>
</div>

{include file="include_js.tpl"}
<script type="text/javascript" src="{$url_base}js/subir_archivo.js"></script>
</body>
</html>