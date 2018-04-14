<!DOCTYPE html>
<html>
<head>
	<title>Chat con {$usuario}</title>

	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../style/ver_mensaje.css">
</head>
<body>

	<div class="container">
		<div class="titulo">
			<h1>Chat con {$usuario}</h1>
			{assign var=ult value=""}
		</div>
		<div class="mensajes">
			{foreach from=$mensajes item=m}
				{if $m->getDia () neq $ult}
					<div class="row">
						<div class="chat_linea">
							<abbr class="dia">{$m->getDia ()}</abbr>
						</div>
					</div>
					{assign var=ult value=$m->getDia ()}
				{/if}
				{if $m->esPropio ()}
				<div class="msj mio">
				{else}
				<div class="msj otro">
				{/if}
					<div class="mensaje">
						<p>
							{$m->getMensaje ()}
						</p>
					</div>
					<div class="hora">
						<p>
							{$m->getHora ()}
						</p>
					</div>
				</div>
			{/foreach}
		</div>
		<div class="entrada">
			<form onsubmit="return false">
				<div class="form-group">
					<textarea class="form-control" rows="5" id="mensaje" style="resize: none"></textarea>
			        <button class="btn btn-lg btn-success" type="button" id="btnEnviar">Enviar</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Cambio Aqui -->
</body>
</html>