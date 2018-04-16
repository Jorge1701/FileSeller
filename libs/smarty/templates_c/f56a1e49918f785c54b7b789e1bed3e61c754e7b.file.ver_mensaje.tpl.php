<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-17 01:53:49
         compiled from "vistas\ver_mensaje.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7085891935ad121697038b6-29183668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f56a1e49918f785c54b7b789e1bed3e61c754e7b' => 
    array (
      0 => 'vistas\\ver_mensaje.tpl',
      1 => 1523913145,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7085891935ad121697038b6-29183668',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ad1216997bb03_90742282',
  'variables' => 
  array (
    'usuario' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ad1216997bb03_90742282')) {function content_5ad1216997bb03_90742282($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>Chat con <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</title>

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/perfil.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../style/ver_mensaje.css">
</head>
<body background="../img/wallpaper.jpg">
	<!-- Header -->
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
					Chat con <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>

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
								<!-- Boton -->
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
</html><?php }} ?>
