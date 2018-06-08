<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/inicio.css">
	<link rel="stylesheet" type="text/css" href="{$url_base}style/reportes.css">
	<title>Inicio</title>
</head>

<body background="{$url_base}img/wallpaper.jpg">
	{include file="header.tpl"}

	<div class="row">
		<div class="col-sm-9 col-md-9 mx-auto">
			<table class="table table-bordered"  style="background-color: white">
				<thead>
					<tr>
						<th scope="col">Nombre De Archivo</th>
						<th scope="col">Tipo De Reporte</th>
						<th scope="col" width="10%">Ver Mas</th>
						<th scope="col" width="10%">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					{if isset($lista_reportes)}
					{foreach $lista_reportes as $r}
					<tr>
						<!-- 0:idArchivo , 1:nombreArchivo , 2:idReporte, 3:tipo, 4:descripcion -->
						<td>{$r[1]}</td>
						<td>{$r[3]}</td>
						<td><i onclick="masInfo('{$r[0]}','{$r[1]}','{$r[2]}','{$r[3]}','{$r[4]}')" class="fa fa-plus-circle plus"></i>
						</td>
						<td><i data-toggle="modal" data-target="#eliminar" class="fa fa-trash basura"></i>
						</td>
					</tr>
					{/foreach}
					{/if}
					
				</tbody>
			</table>
		</div>	
	</div>
</body>

<div class="modal" tabindex="-1" role="dialog"  id="eliminar">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Eliminar Reporte</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Esta seguro que quiere eliminar el reporte</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger">Seguro</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog"  id="masInfo">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Mas Informacion</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<ul id="listMas" class="list-group">
				</ul>
				<button id="eliminar" type="button" class="btn btn-danger" >Eliminar Archivo</button>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
{include file="include_js.tpl"}
<script type="text/javascript" src="{$url_base}js/reportes.js"></script>

</html>
