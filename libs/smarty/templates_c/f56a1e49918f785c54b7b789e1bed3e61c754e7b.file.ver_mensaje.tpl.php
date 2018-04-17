<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-17 22:53:13
         compiled from "vistas\ver_mensaje.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6689035385ad538beb4dbc1-22763366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f56a1e49918f785c54b7b789e1bed3e61c754e7b' => 
    array (
      0 => 'vistas\\ver_mensaje.tpl',
      1 => 1523998383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6689035385ad538beb4dbc1-22763366',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ad538beb8e743_98028822',
  'variables' => 
  array (
    'seleccionado' => 0,
    'nom_usuario' => 0,
    'url_base' => 0,
    'usuarios' => 0,
    'u' => 0,
    'mensajes' => 0,
    'visto' => 0,
    'm' => 0,
    'primero' => 0,
    'dia' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ad538beb8e743_98028822')) {function content_5ad538beb8e743_98028822($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<?php if (isset($_smarty_tpl->tpl_vars['seleccionado']->value)) {?>
		<title>Conversacion con <?php echo $_smarty_tpl->tpl_vars['nom_usuario']->value;?>
</title>
	<?php } else { ?>
		<title>Conversaciones</title>
	<?php }?>

	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
bootstrap/css/perfil.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
style/ver_mensaje.css">
</head>
<body background="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
img/wallpaper.jpg">
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
					<?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['u']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->_loop = true;
?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
mensajes/chat/<?php echo $_smarty_tpl->tpl_vars['u']->value;?>
" class="link-contacto">
						<?php if (isset($_smarty_tpl->tpl_vars['seleccionado']->value)) {?>
							<?php if ($_smarty_tpl->tpl_vars['seleccionado']->value==$_smarty_tpl->tpl_vars['u']->value) {?>
								<div class="contacto seleccionado">
							<?php } else { ?>
								<div class="contacto">
							<?php }?>
						<?php } else { ?>
								<div class="contacto">
						<?php }?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
img/user-default.png" class="rounded-circle img-usuario">
							<?php echo $_smarty_tpl->tpl_vars['u']->value;?>

							<span class="num-msj">100</span>
						</div>
					</a>
					<?php } ?>
				</div>
			</div>
			<div class="col-sm-7 panel-der">
				<div class="titulo">
					<?php if (isset($_smarty_tpl->tpl_vars['seleccionado']->value)) {?>
						Conversacion con <?php echo $_smarty_tpl->tpl_vars['seleccionado']->value;?>

					<?php } else { ?>
						Conversacion
					<?php }?>
				</div>
				<!-- Lista de Mensajes -->
				<div id="chat">
					<?php if (isset($_smarty_tpl->tpl_vars['seleccionado']->value)) {?>
						<?php $_smarty_tpl->tpl_vars["primero"] = new Smarty_variable("si", null, 0);?>
						<?php $_smarty_tpl->tpl_vars["dia"] = new Smarty_variable('', null, 0);?>
						<?php $_smarty_tpl->tpl_vars["visto"] = new Smarty_variable("no", null, 0);?>
						<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mensajes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['visto']->value=="no"&&!$_smarty_tpl->tpl_vars['m']->value->estaVisto()) {?>
								<?php if ($_smarty_tpl->tpl_vars['primero']->value=="si") {?>
									<div class="mx-auto msj no-leido">
										<?php echo $_smarty_tpl->tpl_vars['nom_usuario']->value;?>
 no ha leido la conversacion <i class="fa fa-eye-slash"></i>
									</div>
								<?php } else { ?>
									<div class="mx-auto msj visto">
										<?php echo $_smarty_tpl->tpl_vars['nom_usuario']->value;?>
 ha leido hasta aqui <i class="fa fa-eye"></i>
									</div>
								<?php }?>
									<?php $_smarty_tpl->tpl_vars["visto"] = new Smarty_variable("si", null, 0);?>
							<?php }?>
							<?php $_smarty_tpl->tpl_vars["primero"] = new Smarty_variable("no", null, 0);?>
							<?php if ($_smarty_tpl->tpl_vars['dia']->value!=$_smarty_tpl->tpl_vars['m']->value->getDia()) {?>
								<div class="fecha">
									<?php echo $_smarty_tpl->tpl_vars['m']->value->getDia();?>

								</div>
								<?php $_smarty_tpl->tpl_vars["dia"] = new Smarty_variable($_smarty_tpl->tpl_vars['m']->value->getDia(), null, 0);?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['m']->value->esPropio()) {?>
							<div class="mensaje mio">
							<?php } else { ?>
							<div class="mensaje otro">
							<?php }?>
								<p class="mensaje-texto">
									<?php echo $_smarty_tpl->tpl_vars['m']->value->getMensaje();?>

								</p>
								<p class="mensaje-hora">
									<?php echo $_smarty_tpl->tpl_vars['m']->value->getHora();?>

								</p>
							</div>
						<?php } ?>
					<?php } else { ?>
						<div class="msj-error">
							No tiene mensajes con <?php echo $_smarty_tpl->tpl_vars['nom_usuario']->value;?>

						</div>
					<?php }?>
				</div>
				<!-- Responder Mensaje -->
				<div class="form-enviar">
					<form method="POST">
						<div class="input-group">
							<!-- Texto -->
							<input type="text" class="form-control" placeholder="Mensaje" name="mensaje" required>
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
</html><?php }} ?>
