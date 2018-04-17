<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<title>Login</title>
</head>
<body background="../../img/wallpaper.jpg">
	{include file="header.tpl"}
	<!-- ----------------------------------------------------------------------------- -->

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 mx-auto card text-center">
				<div class="mx-auto" style="margin-top: 10px"><h4>Iniciar sesión</h4></div>
				<hr>
				<form method="post">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">@</span>
						</div>
						<input name="correo" id="correo" type="email" class="form-control" placeholder="Correo" aria-label="Correo" aria-describedby="basic-addon1" required="Ingrese su correo" autofocus title="Ingrese su correo">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text fa fa-lock" id="basic-addon1"></span>
						</div>
						<input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon1" autofocus title="Mínimo 6 / Máximo 21" required="Mínimo 6 / Máximo 21"/>
					</div>
					<input id="check" type="checkbox" aria-label="Recordarme">Recordarme
					<br>
					<button id="btnLogin" class="btn btn-success" style="margin: 20px 0px ">Iniciar Sesión</button>
				</form>
				<a href="#" style="margin: 5px 0px">Registrarse</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../../bootstrap/jquery/jquery-3.3.1.slim.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
</body>
</html>