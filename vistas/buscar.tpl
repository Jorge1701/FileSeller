<!DOCTYPE html>
<html>
<head>
	<title>Buscar</title>
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/buscar.css">
</head>
<body background="{$url_base}img/wallpaper.jpg">
	<!-- Header -->
	{include file="header.tpl"}

	<div class="container encontrado">
		Resultados para "{$busqueda}"
	</div>
	{if !$encontrados}
		<div class="container no-encontrado">
			No se encontro ningun archivo.
		</div>
	{else}
		<div class="row lista">
			{foreach $archivos as $a}
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 columna">
					<div class="mx-auto archivo">
						<a href="{$url_base}archivo/ver/{$a->getId ()}">
							<img src="{$url_base}{$a->getImg ()}" class="imagen">
						</a>
						<div class="info">
							<div class="calificacion">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
							</div>
							<div class="descripcion">{$a->getDescripcion ()}</div>
						</div>
					</div>
				</div>
			{/foreach}
		</div>
	{/if}

	<!--<script type="text/javascript" src="{$url_base}js/buscar.js"></script>-->
	{include file="include_js.tpl"}
</body>
</html>