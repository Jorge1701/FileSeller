<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-10 03:40:59
         compiled from "vistas\usuario_inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8103447435ac4eb1f937ee0-94826850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8f9d19c625aa25ce85975d2c8d3ecaa1c1a0f3a' => 
    array (
      0 => 'vistas\\usuario_inicio.tpl',
      1 => 1523324454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8103447435ac4eb1f937ee0-94826850',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ac4eb1fe449d8_57608649',
  'variables' => 
  array (
    'asd' => 0,
    'nombre_proyecto' => 0,
    'razas' => 0,
    'raza' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac4eb1fe449d8_57608649')) {function content_5ac4eb1fe449d8_57608649($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head lang="es-UY">
	<title><?php echo $_smarty_tpl->tpl_vars['asd']->value;?>
</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
	<?php echo '<script'; ?>
 src="../bootstrap/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../bootstrap/bootstrap.min.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript" src="../js/funciones.js"><?php echo '</script'; ?>
>

	<style type="text/css">
		a:hover {
			cursor: pointer;
		}

		#lista {
		    height: 75vh;
		    overflow-y: scroll;
		    flex: 1 1 0;
		    display: flex;
		    flex-direction: column;
		}

		img {
			width: 80%;
		}
	</style>
</head>
<body style="background-color: #E4EEF2">

	<!-- Cabecera -->
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="inicio.php"><?php echo $_smarty_tpl->tpl_vars['nombre_proyecto']->value;?>
</a>
			</div>
      	<ul class="nav navbar-nav navbar-right">
			<!-- Boto Ver Favoritos -->
      		<li>
				<a href="lista_favoritos.php">
					Ver Favoritos <span class="glyphicon glyphicon-heart-empty"></span>
				</a>
      		</li>
      		<!-- Boton Exit -->
			<li>
				<a href="../index.php">
					Exit <span class="glyphicon glyphicon-log-out"></span>
				</a>
			</li>
		</ul>
		</div>
	</nav>

	<!-- Contenido -->
	<div class="row">
		<!-- Imagen -->
		<div class="col-lg-9">
			<div class="text-center">
				<div>
					<img class="img-thumbnail" src="" id="imagen">
				</div>
			</div>
		</div>

		<!-- Panel derecha -->
		<div class="col-lg-3">
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg-10">
					<!-- Lista de razas -->
					<div id="lista">
						<div class="list-group">
                    		<?php  $_smarty_tpl->tpl_vars['raza'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['raza']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['razas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['raza']->key => $_smarty_tpl->tpl_vars['raza']->value) {
$_smarty_tpl->tpl_vars['raza']->_loop = true;
?>
								<a class="list-group-item" onclick="razaSeleccionada ('<?php echo $_smarty_tpl->tpl_vars['raza']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['raza']->value;?>
</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-lg-1"></div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<div class="text-center">
						<!-- Agregar a Favorito -->
						<div class="container-fluid">
							<a class="btn btn-lg btn-primary" onclick="addFavorito ()">Agregar a Favoritos</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html><?php }} ?>
