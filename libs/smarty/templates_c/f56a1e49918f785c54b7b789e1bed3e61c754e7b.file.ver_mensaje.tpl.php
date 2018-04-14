<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-14 02:16:09
         compiled from "vistas\ver_mensaje.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7085891935ad121697038b6-29183668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f56a1e49918f785c54b7b789e1bed3e61c754e7b' => 
    array (
      0 => 'vistas\\ver_mensaje.tpl',
      1 => 1523664968,
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
    'mensajes' => 0,
    'm' => 0,
    'ult' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ad1216997bb03_90742282')) {function content_5ad1216997bb03_90742282($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>Chat con <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</title>

	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
	<?php echo '<script'; ?>
 type="text/javascript" src="../bootstrap/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../bootstrap/bootstrap.min.js"><?php echo '</script'; ?>
>
	<link rel="stylesheet" type="text/css" href="../style/ver_mensaje.css">
</head>
<body>

	<div class="container">
		<div class="titulo">
			<h1>Chat con <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</h1>
			<?php $_smarty_tpl->tpl_vars['ult'] = new Smarty_variable('', null, 0);?>
		</div>
		<div class="mensajes">
			<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mensajes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['m']->value->getDia()!=$_smarty_tpl->tpl_vars['ult']->value) {?>
					<div class="row">
						<div class="chat_linea">
							<abbr class="dia"><?php echo $_smarty_tpl->tpl_vars['m']->value->getDia();?>
</abbr>
						</div>
					</div>
					<?php $_smarty_tpl->tpl_vars['ult'] = new Smarty_variable($_smarty_tpl->tpl_vars['m']->value->getDia(), null, 0);?>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['m']->value->esPropio()) {?>
				<div class="msj mio">
				<?php } else { ?>
				<div class="msj otro">
				<?php }?>
					<div class="mensaje">
						<p>
							<?php echo $_smarty_tpl->tpl_vars['m']->value->getMensaje();?>

						</p>
					</div>
					<div class="hora">
						<p>
							<?php echo $_smarty_tpl->tpl_vars['m']->value->getHora();?>

						</p>
					</div>
				</div>
			<?php } ?>
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
</body>
</html><?php }} ?>
