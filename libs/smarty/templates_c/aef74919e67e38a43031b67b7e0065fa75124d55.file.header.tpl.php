<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-16 05:17:58
         compiled from "vistas\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20897764965ad23343f24628-38668979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aef74919e67e38a43031b67b7e0065fa75124d55' => 
    array (
      0 => 'vistas\\header.tpl',
      1 => 1523848677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20897764965ad23343f24628-38668979',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ad23343f26536_65131726',
  'variables' => 
  array (
    'inicio' => 0,
    'nombre_proyecto' => 0,
    'perfil' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ad23343f26536_65131726')) {function content_5ad23343f26536_65131726($_smarty_tpl) {?><nav class="navbar navbar-expand-lg navbar-dark">
				<img class="navbar-brand" style="width: 5%; height: 5%" src="../../img/icono.png" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['inicio']->value;?>
'">
				<a class="navbar-brand font-weight-bold" style="font-size: 200%" href="#" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['inicio']->value;?>
'"><?php echo $_smarty_tpl->tpl_vars['nombre_proyecto']->value;?>
</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<form class="form-inline my-2 my-lg-0 mx-auto">
						<input class="form-control mr-sm-2" type="search" placeholder="Nombre, tipo o dueño" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar archivo</button>
					</form>
					<ul class="navbar-nav" style="font-size: 110%">
						<li class="nav-item">
							<a class="nav-link" href="#" onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['inicio']->value;?>
'">Inicio<span class="sr-only"></span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Ayuda</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Mi Cuenta
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#" onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['perfil']->value;?>
'">Perfil</a>
								<a class="dropdown-item" href="#">Subir archivo</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Cerrar sesión</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<hr style="border-color: hsl(226, 59%, 60%)";><?php }} ?>
