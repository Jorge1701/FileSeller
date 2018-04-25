<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}

	<title>File Seller - Ver Archivo</title>
</head>


<style>

h3{
	color:#4AB0FF;
	display: inline-block;
	margin-right: 2%;
}

#contenedor{
	background-color: #ffffff;
	border-radius:3px;	
	margin-left: 20%;
	width: 60%;
	margin-top: 5%;
}

#imgArchivo{
	margin-top: 6%;
	margin-left: 6%;
	display: inline;
	width: 12%;	
	height: 12%;
}

#info{


}


</style>



<body background="{$url_base}img/wallpaper.jpg">
	{include file="header.tpl"}


	<img src="{$url_base}img/breakingbad.jpg" class="rounded mx-auto d-block" id="imgArchivo"><br>
	
	<button onclick="window.location='{$url_ver_achivo}'+'{$archivo->getId()}'+'/'+'{$archivo->getUbicacion()}'">Descargar</button>

	<div  id="contenedor">
		<div class="container">
			<ul class="nav nav-tabs nav-tabs-fillup navigation">
				<li class="nav-item"><a data-toggle="tab" class="active nav-link" href="#information">Datos Del Archivo<span class="fa fa-file pestaña-icono"></span></a></a></li>
				<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#archivos">Datos Del Dueño<span class="fa fa-user-circle-o pestaña-icono"></span></li>
			</ul>
			<div class="user-body">
				<div class="tab-content">

					<div  id="information" class="tab-pane slide-left active">
						<table class="table">
							<thead>
								<tr>
									<h4>Datos Del Archivo</h4>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th class="row">Nombre</th>
									<th>{$archivo->getNombre()}</th>

								</tr>
								<tr>
									<th class="row">Tipo</th>
									<th>{$archivo->getTipo()}</th>

								</tr>
								<tr>
									<th class="row">Tamaño</th>
									<th>{$archivo->getTamanio()}</th>

								</tr>
								<tr>
									<th class="row">Precio</th>
									<th>{$archivo->getPrecio()}</th>
								</tr>
							</tbody>
						</table>
					</div>
					<div id="archivos" class="tab-pane slide-left">
						<table class="table">
							<thead>	
								<tr>
									<h4>Datos Del Dueño</h4>
								</tr>	
							</thead>
							<tbody>
								<tr>
									<th class="row">Nombre</th>
									<th>{$user->getNombre()}</th>
								</tr>
	
							</tbody>
						</table>
					</div>
				</div>
			</div>	
		</div>	


	</div>
</body>
{include file="include_js.tpl"}
</html>