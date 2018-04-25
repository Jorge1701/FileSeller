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
		<strong>Felicidades!</strong> {$archivo_subido}
	</div>
	{/if}

	<div class="row">
		<div class="col-sm-9 col-md-9 mx-auto">
			<div id="archivos" class="card">
				<table class="table">
					<thead>
						<tr>
							<h4 class="titulo_lista_archivos">Recomendaciones para vos</h4>
						</tr>
					</thead>
					
					<tr>
						<th scope="row">Nombre</th>
						<th scope="row">Tipo</th>
						<th scope="row">Descripción</th>

					</tr>
				</table>
				<div id="scroll" ">
					<table class="table" > 
						<tbody>
							{if isset($lista_archivos)}
							{foreach $lista_archivos as $a}
							<tr class="fila_archivo_inicio "  onclick="verArchivo(this)" >
								<td hidden >{$a->getId()}</td>
								<td >{$a->getNombre()}</td>
								<td>{$a->getTipo()}</td>
								<td>{$a->getDescripcion()}</td>
							</tr>

							{/foreach}
						</tbody>
					</table>
				</div>
				{else}	
			</tbody>
		</table>
		<div class="noArchivos">No hay archivos subidos en la pagina</div>
		{/if}
	</div>	
</div>
</div>
{include file="include_js.tpl"}
</body>
<script >
	function verArchivo(id){
		window.location='{$url_ver_achivo}'+id.cells[0].innerHTML;
	}


</script>
</html>