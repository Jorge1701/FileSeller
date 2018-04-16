<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-16 05:56:49
         compiled from "vistas\inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18322872835ad244987db1b7-96598732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '102be02b8b9145463e4065f9dccdf87b0dc27fe2' => 
    array (
      0 => 'vistas\\inicio.tpl',
      1 => 1523850965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18322872835ad244987db1b7-96598732',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ad24498848556_78611013',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ad24498848556_78611013')) {function content_5ad24498848556_78611013($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/perfil.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<title>Inicio</title>
</head>
<body background="../../img/wallpaper.jpg">
	<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div class="row">
		<div class="col-sm-9 col-md-9 mx-auto">
			<div id="archivos" class="card">
				<table class="table">
					<thead>
						<tr>
							<th scope="col"><h4>Recomendaciones para vos:</h4></th>
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
