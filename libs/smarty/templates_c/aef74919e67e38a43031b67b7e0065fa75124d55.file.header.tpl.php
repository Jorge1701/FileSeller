<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-17 23:48:09
         compiled from "vistas\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17669389465ad664c882a890-78281478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-04-18 00:13:23
         compiled from "vistas\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16559362825ad671830ef4c3-62142585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aef74919e67e38a43031b67b7e0065fa75124d55' => 
    array (
      0 => 'vistas\\header.tpl',
<<<<<<< HEAD
      1 => 1524001662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17669389465ad664c882a890-78281478',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ad664c8837800_50153370',
=======
      1 => 1523999318,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16559362825ad671830ef4c3-62142585',
  'function' => 
  array (
  ),
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
  'variables' => 
  array (
    'url_base' => 0,
    'url_inicio' => 0,
    'nombre_proyecto' => 0,
    'active_inicio' => 0,
    'usuario' => 0,
    'url_mensaje' => 0,
    'active_perfil' => 0,
    'url_perfil' => 0,
    'url_subir_archivo' => 0,
    'url_logout' => 0,
<<<<<<< HEAD
=======
    'active_iniciarSesion' => 0,
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
    'url_login' => 0,
    'active_registrarse' => 0,
    'url_registro' => 0,
    'active_ayuda' => 0,
    'url_ayuda' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ad671831373a0_63794163',
),false); /*/%%SmartyHeaderCode%%*/?>
<<<<<<< HEAD
<?php if ($_valid && !is_callable('content_5ad664c8837800_50153370')) {function content_5ad664c8837800_50153370($_smarty_tpl) {?><nav class="navbar navbar-expand-lg navbar-dark">
=======
<?php if ($_valid && !is_callable('content_5ad671831373a0_63794163')) {function content_5ad671831373a0_63794163($_smarty_tpl) {?><nav class="navbar navbar-expand-lg navbar-dark">
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
	<img class="navbar-brand" style="width: 5%; height: 5%" src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
img/icono.png" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['url_inicio']->value;?>
'">
	<a class="navbar-brand font-weight-bold" style="font-size: 200%" href="#" title="Ir a inicio" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['url_inicio']->value;?>
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
		<ul class="navbar-nav" style="font-size: 130%">
			<li class="nav-item <?php if (isset($_smarty_tpl->tpl_vars['active_inicio']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['active_inicio']->value;?>
 <?php }?>">
				<a class="nav-link" href="#" onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['url_inicio']->value;?>
'">Inicio<span class="sr-only"></span></a>
			</li>
			<?php if (isset($_smarty_tpl->tpl_vars['usuario']->value)) {?>
			<li class="nav-item dropdown">
				<a class="nav-link fa fa-bell-o" href="#" title="Notificaciones" data-toggle="dropdown">
					<span class="fa fa-comment"></span>
					<span class="num">2</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right" style="width: 400px">
					<h6 style="margin: 10px 0px 0px 60px">Notificaciones</h6>
					<hr>
					<ul>
						<li class="dropdown-item"><i class="fa fa-circle-thin"></i> Gracias por formar parte de la comunidad<hr></li>
						<li class="dropdown-item"><i class="fa fa-circle-thin"></i> Has vendido tu primer archivo<hr></li>
					</ul>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link fa fa-inbox" href="#" title="Mensajes" data-toggle="dropdown">
					<span class="fa fa-comment"></span>
					<span class="num">2</span>
				</a>


				<div class="dropdown-menu dropdown-menu-right" style="width: 400px">
					<h6 style="margin: 10px 0px 20px 60px">Mensajes</h6>
					<table class="table">
						<tbody>
							<tr onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['url_mensaje']->value;?>
id'">
								<th scope="row">Brian</th>
								<td>hola como estas ?</td>
							</tr>
							<tr>
								<th scope="row">Luisito</th>
								<td>que haces loco ? era para...</td>
							</tr>
							<tr>
								<th scope="row">Jorge</th>
								<td>te mando el archivo del coso...</td>
							</tr>
						</tbody>
					</table>
				</div>
			</li>
			<li class="nav-item dropdown">
<<<<<<< HEAD
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
=======
				<a class="nav-link dropdown-toggle <?php if (isset($_smarty_tpl->tpl_vars['active_perfil']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['active_perfil']->value;?>
 <?php }?> " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
>>>>>>> c3d2d53796692ceeb1dcb0150b10ff0bb1ddf7e6
					<img src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;
echo $_smarty_tpl->tpl_vars['usuario']->value->getImagen();?>
" title="Cuenta de File Seller" class="rounded-circle" style="width: 25pt; height: 25pt">
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#" onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['url_perfil']->value;?>
'"><i class="fa fa-user" style="margin-right: 5%" aria-hidden="true"></i>Perfil</a>
					<a class="dropdown-item" href="#" onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['url_subir_archivo']->value;?>
'"><i class="fa fa-upload" style="margin-right: 5%"></i>Subir archivo </a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#" onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['url_logout']->value;?>
'"><i class="fa fa-sign-out" style="margin-right: 5%"></i>Cerrar sesión</a>
				</div>
			</li>
			<?php } else { ?>
			<li class="nav-item <?php if (isset($_smarty_tpl->tpl_vars['active_iniciarSesion']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['active_iniciarSesion']->value;?>
 <?php }?>">
				<a class="nav-link" href="#" title="Iniciar sesión" onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['url_login']->value;?>
'">Iniciar sesión</a>
			</li>
			<li class="nav-item <?php if (isset($_smarty_tpl->tpl_vars['active_registrarse']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['active_registrarse']->value;?>
 <?php }?>">
				<a class="nav-link" href="#" title="Registrarse" onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['url_registro']->value;?>
'">Registrarse</a>
			</li>
			<?php }?>
			<li class="nav-item  <?php if (isset($_smarty_tpl->tpl_vars['active_ayuda']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['active_ayuda']->value;?>
 <?php }?>">
				<a class="nav-link" href="#" title="Ayuda" onClick="window.location='<?php echo $_smarty_tpl->tpl_vars['url_ayuda']->value;?>
'"><i class="fa fa-question-circle" style="margin-right: 5%"></i></a>
			</li>
		</ul>
	</div>
</nav>
<hr style="border-color: hsl(226, 59%, 60%)";><?php }} ?>
