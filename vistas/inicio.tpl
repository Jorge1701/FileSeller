<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/inicio.css">
	<title>Inicio</title>
</head>

<style >
#scroll{
	overflow:scroll;
	overflow-x: hidden;
	max-height: 300px;
}
</style>

<body background="{$url_base}img/wallpaper.jpg">
	{include file="header.tpl"}

	{if isset($archivo_subido)}
	<div class="alert alert-success text-center col-sm-9 col-md-9 mx-auto">
		<strong> {$archivo_subido} </strong>
	</div>
	{/if}

	<div class="row">
		<div class="col-sm-9 col-md-9 mx-auto">
			<div id="archivos" class="card">
				{if isset($mensaje)} 
				<div class="mensaje" style="background: #27D766FF; text-align: center; font-size: 24px; font-family: sans-serif;">{$mensaje}</div>
				<br>
				{/if}
				<table class="table">
					<thead>
						<tr>
							<h4 class="titulo_lista_archivos">Archivos destacados</h4>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th ></th>
							<th scope="row">Nombre</th>
							<th scope="row">Tipo</th>
						</tr>
						{if isset($lista_archivos)}
						{foreach $lista_archivos as $a}
						<tr class="fila_archivo_inicio "  onclick="verArchivo(this)" >
							<td><img class="img-archivo" src="{$url_base}{$a->getImg()}"></td>
							<td>{$a->getNombre()}</td>
							<td>
								<!-- Por algun motivo algunos exe te marcan '3' el tipo, pues eso... -->
								{if $a->getTipo() eq 3}
									exe
								{else}
									{$a->getTipo()}
								{/if}
							</td>
							<td hidden >{$a->getId()}</td>
						</tr>
						{/foreach}
						{else}	
						<tr>
							<td class="noArchivos" colspan="3">No hay archivos subidos en la pagina</td>
						</tr>
						{/if}
					</tbody>
				</table>
			</div>	
		</div>
	</div>
	{include file="include_js.tpl"}
</body>
<script >
	function verArchivo(id){
		window.location='{$url_ver_archivo}'+id.cells[3].innerHTML;
	}


</script>
</html>
