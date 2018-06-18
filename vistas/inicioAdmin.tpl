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

						<th scope="col">Nombre De Archivo<i id="faArchivo" onclick="AZA()" class="fa fa-sort-alpha-down" aria-hidden="true"></i></th>
						<th scope="col">Tipo De Reporte<i id="faTipo" onclick="AZT()" class="fa fa-sort-alpha-down" aria-hidden="true"></i> </th>
						<th scope="col" width="10%">Ver Mas</th>
						<th scope="col" width="15%">Eliminar Reporte</th>
					</tr>
				</thead>
				<tbody>
					{if isset($lista_reportes)}
					{foreach $lista_reportes as $r}
					<tr id="{$r[2]}">
						<!-- 0:idArchivo , 1:nombreArchivo , 2:idReporte, 3:tipo, 4:descripcion , 5:idDuenio -->
						<td>{$r[1]}</td>
						<td>{$r[3]}</td>
						<td><i onClick="masInfo('{$r[0]}','{$r[1]}','{$r[2]}','{$r[3]}','{$r[4]}','{$r[5]}') " class="fa fa-plus-circle plus"></i>
						</td>
						<td><i data-toggle="modal" data-target="#eliminar" onclick="setIdReporte('{$r[2]}')" class="fa fa-trash basura"></i>
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
				<button type="button" onclick="eliminarReporte()" class="btn btn-danger">Seguro</button>
			</div>
		</div>
	</div>
</div>
<div class="modal" tabindex="-1" role="dialog"  id="eliminarA">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Eliminar Archivo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Esta seguro que quiere eliminar el archivo</p>
			</div>
			<div class="modal-footer">
				<button type="button" onclick="eliminarArchivo()" data-dismiss="modal" class="btn btn-danger">Seguro</button>
			</div>
		</div>
	</div>
</div>
<div class="modal" tabindex="-1" role="dialog"  id="strike">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Dar strike a dueño del archivo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Mensaje</p>
				<textarea id="mensaje"> </textarea>
			</div>
			<div class="modal-footer">
				<button type="button" onclick="darStrike()" data-dismiss="modal" class="btn btn-danger">Confirmar</button>
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
				<button id="eliminar" type="button"  data-dismiss="modal"  class="btn btn-danger" data-toggle="modal"  data-target="#eliminarA"  >Eliminar Archivo</button>
				<button id="strike" type="button"  data-dismiss="modal" class="btn btn-danger" data-toggle="modal" data-target="#strike"  >Dar strike a usuario</button>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog"  id="OkStrike">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Strike</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Se ha dado el strike correctamente</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
			</div>
		</div>
	</div>
</div>   

<div class="modal" tabindex="-1" role="dialog"  id="OkEliminar">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Archivo Eliminado</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>El archivo se ha eliminado correctamente </p>
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
