<!DOCTYPE html>
<html>
<head>
	{include file="include_css.tpl"}
	<link rel="stylesheet" type="text/css" href="{$url_base}style/login.css">
	<title>Login</title>
</head>
<body background="{$url_base}img/wallpaper.jpg">
	{include file="header.tpl"}
	<!-- ----------------------------------------------------------------------------- -->

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 mx-auto card text-center">
				<div class="mx-auto is"><h4>Iniciar sesión</h4></div>
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
					{if isset($mensaje)} 
						<div class="mensaje">{$mensaje}</div>
						<br>
					 {/if}
					<input name="check" type="checkbox" aria-label="Recordarme" value="Algo">Recordarme
					<br>
					<button id="btnLogin" class="btn btn-success btn-iniciar-sesion">Iniciar Sesión</button>
				</form>
				<a class="registrarse-link" href="{$url_registro}">Registrarse</a>
			</div>
		</div>
	</div>

{include file="include_js.tpl"}
</body>
</html>