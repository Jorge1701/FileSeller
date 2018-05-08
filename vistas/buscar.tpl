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
		<div id="listado">
			{foreach $archivos as $a}
			{assign puntaje 3.1416}
				<div class="archivo">
					<a href="{$url_base}archivo/ver/{$a->getId ()}">
						<img src="{$url_base}{$a->getImg ()}" class="vista_previa">
						<div class="nombre">{$a->getNombre ()}</div>
						<div class="info">
							<div class="calificacion">
								{while $puntaje >= 1}
								<div class="recortar">
									<img src="{$url_base}img/llena.png" class="estrella">
								</div>
									<span style="display: none">{$puntaje--}</span>
								{/while}
								<div class="recortar" style="width: {$puntaje * 20}pt">
									<img src="{$url_base}img/llena.png" class="estrella">
								</div>
							</div>
							<div class="descripcion">{$a->getDescripcion ()}</div>
						</div>
					</a>
				</div>
			{/foreach}
		</div>
	{/if}

	<!--<script type="text/javascript" src="{$url_base}js/buscar.js"></script>-->
	{include file="include_js.tpl"}
</body>
</html>