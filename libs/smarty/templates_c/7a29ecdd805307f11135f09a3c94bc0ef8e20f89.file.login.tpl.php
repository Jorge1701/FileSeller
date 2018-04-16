<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-16 23:14:21
         compiled from "vistas\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18935338935ad5030e20b433-81934786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a29ecdd805307f11135f09a3c94bc0ef8e20f89' => 
    array (
      0 => 'vistas\\login.tpl',
      1 => 1523913260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18935338935ad5030e20b433-81934786',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ad5030e26f6d3_76977671',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ad5030e26f6d3_76977671')) {function content_5ad5030e26f6d3_76977671($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<title>Login</title>
</head>
<body background="../../img/wallpaper.jpg">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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

<?php echo '<script'; ?>
 type="text/javascript" src="../../bootstrap/jquery/jquery-3.3.1.slim.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../../bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
