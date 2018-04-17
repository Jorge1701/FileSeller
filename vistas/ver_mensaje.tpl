<!DOCTYPE html>
<html>
<head>
	<title>Chat con {$usuario}</title>

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/perfil.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../style/ver_mensaje.css">
</head>
<body background="../img/wallpaper.jpg">
	<!-- Header -->
	{include file="header.tpl"}
	
	<div class="container">
		<div class="row">
			<div class="col-sm-5 panel-izq">
				<div class="titulo">
					Contactos
				</div>
				<!-- Lista de Contactos -->
				<div id="contactos">
					<div class="contacto">
						<img src="../img/user-default.png" class="rounded-circle" style="width: 40pt; height: 40pt">
						Juan
					</div>
					<div class="contacto">
						<img src="../img/user-default.png" class="rounded-circle" style="width: 40pt; height: 40pt">
						Pedro
					</div>
					<div class="contacto seleccionado">
						<img src="../img/user-default.png" class="rounded-circle" style="width: 40pt; height: 40pt">
						Pepe
					</div>
					<div class="contacto">
						<img src="../img/user-default.png" class="rounded-circle" style="width: 40pt; height: 40pt">
						Juan
					</div>
					<div class="contacto">
						<img src="../img/user-default.png" class="rounded-circle" style="width: 40pt; height: 40pt">
						Pedro
					</div>
					<div class="contacto">
						<img src="../img/user-default.png" class="rounded-circle" style="width: 40pt; height: 40pt">
						Pepe
					</div>
					<div class="contacto">
						<img src="../img/user-default.png" class="rounded-circle" style="width: 40pt; height: 40pt">
						Juan
					</div>
					<div class="contacto">
						<img src="../img/user-default.png" class="rounded-circle" style="width: 40pt; height: 40pt">
						Pedro
					</div>
					<div class="contacto">
						<img src="../img/user-default.png" class="rounded-circle" style="width: 40pt; height: 40pt">
						Pepe
					</div>
				</div>
			</div>
			<div class="col-sm-7 panel-der">
				<div class="titulo">
					Chat con {$usuario}
				</div>
				<!-- Lista de Mensajes -->
				<div id="chat">
					<div class="mensaje otro">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
					<div class="mensaje mio">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
					<div class="fecha">
						16 de Abril de 2018
					</div>
					<div class="mensaje otro">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
					<div class="mensaje mio">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
					<div class="mensaje otro">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
					<div class="mensaje mio">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
					<div class="fecha">
						16 de Abril de 2018
					</div>
					<div class="mensaje otro">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
					<div class="mensaje mio">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
					<div class="mensaje otro">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
					<div class="mensaje mio">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
					<div class="fecha">
						16 de Abril de 2018
					</div>
					<div class="mensaje otro">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
					<div class="mensaje mio">
						<p class="mensaje-texto">
							Hola
						</p>
						<p class="mensaje-hora">
							17:43
						</p>
					</div>
				</div>
				<!-- Responder Mensaje -->
				<div class="form-enviar">
					<form onsubmit="return false">
						<div class="input-group">
							<!-- Texto -->
							<input type="text" class="form-control" placeholder="Mensaje" required>
							<div class="input-group-btn">
								<!-- Boton Enviar -->
								<button class="btn btn-default" type="submit" id="btnEnviar">
									<i class="fa fa-share-square"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>