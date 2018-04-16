<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-16 19:39:19
         compiled from "vistas\perfil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15211333165ad234926efad7-52806236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8fc84890c71f077006ece99ad9b3fe73e7ca25e' => 
    array (
      0 => 'vistas\\perfil.tpl',
      1 => 1523900357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15211333165ad234926efad7-52806236',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ad23492792ef2_36719293',
  'variables' => 
  array (
    'usuario' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ad23492792ef2_36719293')) {function content_5ad23492792ef2_36719293($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/perfil.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	
	<title>Inicio</title>
</head>
<body background="../img/wallpaper.jpg">
	<!-- Header -->
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<!------------------------------------------------------------------------------------------------ -->

	<!-- Perfil -->
	<div class="row">
		<div class="col-sm-9 col-md-9 user-details mx-auto">
			<div class="user-image">
				<img src="../img/user-default.png" title="Karan Singh Sisodia" class="rounded-circle" style="width: 80pt; height: 80pt">
			</div>
			<div class="user-info-block card">
				<div class="user-heading">
					<h3><?php echo $_smarty_tpl->tpl_vars['usuario']->value->getNombre();?>
 <?php echo $_smarty_tpl->tpl_vars['usuario']->value->getApellido();?>
</h3>
					<span class="help-block">Paysandú, UY</span>
				</div>
				<div class="container">
					<ul class="nav nav-tabs nav-tabs-fillup navigation">
						<li class="nav-item"><a data-toggle="tab" class="active nav-link" href="#information">Datos personales<span class="fa fa-user-circle-o" style="margin-left: 8px"></span></a></li>
						<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#archivos">Mis archivos <span class="fa fa-file" style="margin-left: 8px"></span></a></li>
						<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#editar">Editar <span class="fa fa-edit" style="margin-left: 8px"></span></a></li>
					</ul>
					<div class="user-body">
						<div class="tab-content">
							<div id="information" class="tab-pane slide-left active">
								<table class="table">
									<thead>
										<tr>
											<th scope="col"><h4>Datos personales:</h4></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">Nombre</th>
											<td><?php echo $_smarty_tpl->tpl_vars['usuario']->value->getNombre();?>
</td>
										</tr>
										<tr>
											<th scope="row">Apellido</th>
											<td><?php echo $_smarty_tpl->tpl_vars['usuario']->value->getApellido();?>
</td>
										</tr>
										<tr>
											<th scope="row">Cédula</th>
											<td><?php echo $_smarty_tpl->tpl_vars['usuario']->value->getCi();?>
</td>
										</tr>
										<tr>
											<th scope="row">Fecha de nacimiento</th>
											<td><?php echo $_smarty_tpl->tpl_vars['usuario']->value->getFnac();?>
</td>
										</tr>
										<tr>
											<th scope="row">Correo</th>
											<td><?php echo $_smarty_tpl->tpl_vars['usuario']->value->getCorreo();?>
</td>
										</tr>
										<tr>
											<th scope="row">Cuentas</th>
											<td><?php if (''==$_smarty_tpl->tpl_vars['usuario']->value->getCuentas()) {?>No tiene medios de pago activos<?php }?></td>
										</tr>
										<tr>
											<th scope="row">Identificador de la cuenta</th>
											<td><?php echo $_smarty_tpl->tpl_vars['usuario']->value->getId();?>
</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div id="archivos" class="tab-pane slide-left">
								<table class="table">
									<thead>
										<tr>
											<th scope="col"><h4>Mis archivos:</h4></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">Nombre</th>
											<th scope="row">Tipo</th>
											<th scope="row">Descripción</th>
											<th scope="row">Tamaño</th>
											<th scope="row">Precio($U)</th>
											<th scope="row">Vista previa</th>
										</tr>
										<tr>
											<td>Arte urbano</td>
											<td>Imagen</td>
											<td>Fotografia de grafiti</td>
											<td>2,3MB</td>
											<td>20</td>
											<td>No disp.</td>
										</tr>
									</tbody>
								</table>
								<button class="btn btn-info" href="#"><i class="fa fa-upload" style="margin-right: 5%"></i>Subir nuevo</button>
							</div>
							<div id="editar" class="tab-pane slide-left">
								<h4>Editar perfil</h4>

								<h6>Esta función será implementada en el siguiente Sprint.</h6>
							</div>
						</div>
					</div>	
				</div>	
			</div>
		</div>
	</div>

	<?php echo '<script'; ?>
 type="text/javascript" src="../bootstrap/jquery/jquery-3.3.1.slim.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="../bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
