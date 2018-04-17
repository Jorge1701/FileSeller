<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{$url_base}bootstrap/css/bootstrap.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<title>Login</title>
</head>
<body background="{$url_base}img/wallpaper.jpg">
	{include file="header.tpl"}
	<!-- ----------------------------------------------------------------------------- -->

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 mx-auto card text-center">
				<div class="mx-auto" style="margin-top: 10px"><h4>Iniciar sesión</h4></div>
				<hr>
				<form>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">@</span>
						</div>
						<input type="text" class="form-control" placeholder="Correo" aria-label="Correo" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-lock" id="basic-addon1"></span>
						</div>
						<input type="text" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon1">
					</div>
					<input type="checkbox" aria-label="Recordarme">Recordarme
					<br>
					<div class="btn btn-info" style="margin: 20px 0px ">Iniciar Sesión</div>
				</form>
					<a href="#" style="margin: 5px 0px">Registrarse</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{$url_base}bootstrap/jquery/jquery-3.3.1.slim.js"></script>
<script type="text/javascript" src="{$url_base}bootstrap/js/bootstrap.js"></script>
</body>
</html>