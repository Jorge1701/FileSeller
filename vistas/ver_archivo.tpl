<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}
	<title>Ver Archivo</title>
</head>
<body background="{$url_base}img/wallpaper.jpg">
	{include file="header.tpl"}

	<div class="row">
		<div class="col-sm-9 col-md-9 mx-auto card">
			<div class="mx-auto"><h5>{$archivo->getNombre()}</h5>
				<hr>
				<h6>Descripción:</h6>{$archivo->getDescripcion()}
			</div>
		</div>
	</div>
</div>
{include file="include_js.tpl"}
</body>
</html>