<!DOCTYPE html>
<html>
<head>
    {include file="include_css.tpl"}
    <link rel="stylesheet" type="text/css" href="{$url_base}style/perfil.css">
    <title> {if isset($usuarioOtro)}Perfil de {$usuarioOtro->getNombre()}{else}Tu perfil{/if}</title>
</head>
<body background="{$url_base}img/wallpaper.jpg" id="body">
    <!-- Header -->
    {include file="header.tpl"}
    <!------------------------------------------------------------------------------------------------ -->

    <!-- MENSAJE -->
    {if isset($mensaje)} 
    <div class="mensaje" style="background: #27D766FF; text-align: center; font-size: 24px; font-family: sans-serif;">{$mensaje}</div>
    <br>
    {/if}
    <!-- Perfil -->
    <div class="row">
        <div class="col-sm-9 col-md-9 user-details mx-auto">
            <!-- Perfil de usuario no logueado -->
            {if isset($usuarioOtro)}
            <div class="user-image">
                <img src="{$url_base}{$usuarioOtro->getImagen()}" class="rounded-circle img-user-perfil">
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h3>{$usuarioOtro->getNombre()} {$usuarioOtro->getApellido()}</h3>
                    
                    {if isset($usuario)}
                    {$seguido = false}
                    {foreach $usuario->getSeguidos() as $seguidor}
                    {if $seguidor->getId() == $usuarioOtro->getId()}
                    {$seguido = true}
                    {/if}
                    {/foreach}
                    <div class="btn btn-primary btn-seguir" {if $seguido == true} hidden {/if} id="btnSeguir" onclick="seguir('{$usuario->getId()}','{$usuarioOtro->getId()}')">Seguir <span class="fa fa-user-plus"></span></div>
                    <div class="btn btn-secondary btn-dejar-seguir" {if $seguido == false} hidden {/if} id="btnDejarSeguir" onclick="dejarSeguir('{$usuario->getId()}','{$usuarioOtro->getId()}')">Dejar de seguir <span class="fa fa-user-times"></span></div>
                    <div class="btn btn-primary btn-seguir" id="btnMensaje" onclick="ir ('{$usuarioOtro->getCorreo ()}')">Mensaje Privado <span class="fa fa-envelope"></span></div>
                    {if $usuario->esAdmin ()}
                    <div class="btn btn-danger btn-seguir" id="btnStrike" onclick="strike ('{$usuarioOtro->getCorreo ()}')">Strike <span class="fa fa-exclamation-circle"></span></div>
                    {/if}
                    {/if}
                </div>

                <!-- Pestañas -->
                <div class="container">
                    <ul class="nav nav-tabs nav-tabs-fillup navigation">
                        <li class="nav-item">
                            <a data-toggle="tab" class="nav-link active" href="#archivos">Sus archivos
                                <span class="fas fa-file pestaña-icono"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" class="nav-link" href="#contacto">Contacto
                                <span class="fas fa-user pestaña-icono"></span>
                            </a>
                        </li>
                    </ul>

                    <div class="user-body">
                        <div class="tab-content">

                            <!-- Pestaña archivos -->
                            <div id="archivos" class="active tab-pane slide-left">
                                <table class="table">
                                    <thead>	
                                        <tr>
                                            <h4>Sus archivos</h4>
                                        </tr>		
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th scope="row">Nombre</th>
                                            <th scope="row">Tipo</th>
                                            <th scope="row">Precio</th>
                                            {if $usuarioOtro->getCorreo() == "admin@prueba.com"}
                                            <th scope="row">Acción</th>
                                            {/if}
                                        </tr>
                                        {if isset($archivos)}
                                        {foreach $archivos as $archivo}
                                        <tr class="fila_archivo">
                                            <td  onclick="window.location = '{$url_ver_archivo}{$archivo->getId ()}'"><img class="img-file" src="{$url_base}{$archivo->getImg()}"></td>
                                            <td  onclick="window.location = '{$url_ver_archivo}{$archivo->getId ()}'">{$archivo->getNombre()}</td>
                                            <td  onclick="window.location = '{$url_ver_archivo}{$archivo->getId ()}'">{$archivo->getTipo()}</td>
                                            <td  onclick="window.location = '{$url_ver_archivo}{$archivo->getId ()}'">{$archivo->getPrecio()}</td>

                                            {if $usuarioOtro->getCorreo() =="admin@prueba.com"}
                                            <td><button onclick="window.location = '{$url_eliminar_archivo}{$archivo->getId ()}'" class="btn btn-default btn-xs"><span class="fa fa-close"></span></button></td>{/if}
                                        </tr>
                                        {/foreach}
                                        {else}   
                                        <tr class="sinArchivos"><td colspan="5">No tienes archivos subidos</td></tr>
                                        {/if}
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pestaña contacto -->
                            <div id="contacto" class="tab-pane slide-left">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <h4>Información de contacto</h4>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nombre completo</th>
                                            <td>{$usuarioOtro->getNombre()} {$usuarioOtro->getApellido()}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Correo</th>
                                            <td>{$usuarioOtro->getCorreo()}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>     
                        </div>
                    </div>
                </div>
                {else}
                <!--Perfil del usuario logueado -->
                <div class="user-image">
                    <img src="{$url_base}{$usuario->getImagen()}" class="rounded-circle img-user-perfil">
                </div>
                <div class="user-info-block">
                    <div class="user-heading">
                        <h3>{$usuario->getNombre()} {$usuario->getApellido()}</h3>
                    </div>

                    <!-- Pestañas -->
                    <div class="container">    
                        <ul class="nav nav-tabs nav-tabs-fillup navigation">
                            <li class="nav-item">
                                <a data-toggle="tab" class="{if !isset($mensaje_editar) && !isset($active_archivo)}active{/if} nav-link" href="#information">Datos personales
                                    <span class="fas fa-user pestaña-icono"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tab" class="{if isset($active_archivo)}active{/if} nav-link" href="#archivos">Mis archivos 
                                    <span class="fas fa-file pestaña-icono"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tab" class="{if isset($mensaje_editar)}active{/if} nav-link" href="#editar">Editar 
                                    <span class="fas fa-edit pestaña-icono"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tab" class="nav-link" href="#seguidos">Seguidos 
                                    <span class="fas fa-user-plus pestaña-icono"></span>
                                </a>
                            </li>
                        </ul>
                        <div class="user-body">
                            <div class="tab-content">

                                <!-- Pestaña datos personales -->
                                <div id="information" class="tab-pane slide-left {if !isset($mensaje_editar) && !isset($active_archivo)}active{/if}">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <h4>Datos personales</h4>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nombre completo</th>
                                                <td>{$usuario->getNombre()} {$usuario->getApellido()}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Fecha de nacimiento</th>
                                                <td>{$usuario->getFnac()}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Correo</th>
                                                <td>{$usuario->getCorreo()}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    {if isset ($strikes)}
                                        {assign num 1}
                                        {foreach $strikes as $s}
                                            <div class="alert alert-danger">
                                              <strong>Strike {$num++}!</strong> {$s->getComentario ()}
                                            </div>
                                        {/foreach}
                                        <div class="alert alert-warning">
                                          Si recibe tres strikes su cuenta sera borrada permanentemente.
                                        </div>
                                    {/if}

                                </div>

                                <!-- Pestaña archivos --> 
                                <div id="archivos" class="tab-pane slide-left {if isset($active_archivo)} active {/if}">
                                    <table class="table">
                                        <thead>	
                                            <tr>
                                                <h4>Mis archivos</h4>
                                            </tr>		
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th></th>
                                                <th scope="row">Nombre</th>
                                                <th scope="row">Tipo</th>
                                                <th scope="row">Precio</th>
                                                <th scope="row">Acción</th>
                                            </tr>
                                            {if isset($archivos)}
                                            {foreach $archivos as $archivo}
                                            <tr class="fila_archivo">
                                                <td onclick="window.location = '{$url_ver_archivo}{$archivo->getId ()}'"><img class="img-file" src="{$url_base}{$archivo->getImg()}"></td>
                                                <td onclick="window.location = '{$url_ver_archivo}{$archivo->getId ()}'">{$archivo->getNombre()}</td>
                                                <td onclick="window.location = '{$url_ver_archivo}{$archivo->getId ()}'">{$archivo->getTipo()}</td>
                                                <td onclick="window.location = '{$url_ver_archivo}{$archivo->getId ()}'">{$archivo->getPrecio()}</td>
                                                <td><button onclick="window.location = '{$url_eliminar_archivo}{$archivo->getId()}'" class="btn btn-default btn-xs"><span class="fas fa-times"></span></td>
                                                </tr>
                                                {/foreach}
                                                {else}	
                                                <tr class="sinArchivos"><td colspan="5">No tienes archivos subidos</td></tr>
                                                {/if}
                                            </tbody>
                                        </table>
                                        <button class="btn btn-info" href="#" onClick="window.location = '{$url_subir_archivo}'"><i class="fa fa-upload btn-subir" ></i>Subir nuevo</button>
                                    </div>

                                    <!-- Pestaña editar perfil -->
                                    <div id="editar" class="tab-pane slide-left {if isset($mensaje_editar)} active {/if}">
                                        <h4>Editar perfil</h4>
                                        {if isset($mensaje_editar)}
                                        <div class="alert alert-success text-center">
                                            <strong>{$mensaje_editar}</strong> 
                                        </div>
                                        {/if}
                                        <form method="post" enctype="multipart/form-data" action="{$url_editar_perfil}" class="text-center">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fa fa-address-book" id="basic-addon1"></span>
                                                </div>
                                                <input name="nombre" id="nombre" type="text" value="{$usuario->getNombre()}" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" required="Ingrese su Nombre" autofocus title="Ingrese su Nombre">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fa fa-address-book" id="basic-addon1"></span>
                                                </div>
                                                <input name="apellido" id="apellido" type="text" value="{$usuario->getApellido()}" class="form-control" placeholder="Apellido" aria-label="Apellido" aria-describedby="basic-addon1" required="Ingrese su Apellido" title="Ingrese su Apellido">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                </div>
                                                <input name="correo" id="correo" type="email" value="{$usuario->getCorreo()}" class="form-control" placeholder="Correo" aria-label="Correo" aria-describedby="basic-addon1" required="Ingrese su correo" title="Ingrese su correo">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fa fa-lock" id="basic-addon1"></span>
                                                </div>
                                                <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña (Sin cambios)" aria-label="Contraseña" aria-describedby="basic-addon1" title="Mínimo 6 / Máximo 21">
                                                <input hidden name="password_old"  value="{$usuario->getContrasenia()}">
                                                <!--ACA--><div class="input-group-prepend">
                                                    <span onclick="showPassword(); //return false;" class="input-group-text fa fa-eye" id="eyePass"></span>
                                                </div>
                                            </div>

                                            {$fecha="-"|explode:$usuario->getFnac()} 

                                            <div class="input-group mb-3">
                                                <input required="Campo obligatorio" type="text" class="form-control" placeholder="Dia" id="dia" value="{$fecha[2]}" name="dia">
                                                <select required="Campo obligatorio" class="form-control" id="mes" name="mes">
                                                    <option value="mes">Mes</option>
                                                    <option {if $fecha[1] == "01"} selected {/if} value="01">Enero</option>
                                                    <option {if $fecha[1] == "02"} selected {/if} value="02">Febrero</option>
                                                    <option {if $fecha[1] == "03"} selected {/if} value="03">Marzo</option>
                                                    <option {if $fecha[1] == "04"} selected {/if} value="04">Abril</option>
                                                    <option {if $fecha[1] == "05"} selected {/if} value="05">Mayo</option>
                                                    <option {if $fecha[1] == "06"} selected {/if} value="06">Junio</option>
                                                    <option {if $fecha[1] == "07"} selected {/if} value="07">Julio</option>
                                                    <option {if $fecha[1] == "08"} selected {/if} value="08">Agosto</option>
                                                    <option {if $fecha[1] == "09"} selected {/if} value="09">Setiembre</option>
                                                    <option {if $fecha[1] == "10"} selected {/if} value="10">Octubre</option>
                                                    <option {if $fecha[1] == "11"} selected {/if} value="11">Noviembre</option>
                                                    <option {if $fecha[1] == "12"} selected {/if} value="12">Diciembre</option>
                                                </select>
                                                <input required="Campo obligatorio"  type="text" class="form-control" placeholder="Año" id="anio" value="{$fecha[0]}" name="anio">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fa fa-camera" id="basic-addon1"></span>
                                                </div>
                                                <input accept="image/*" name="archivo" id="archivo" type="file" class="form-control" aria-label="Archivo" aria-describedby="basic-addon1" title="Seleccione una imagen"/>
                                                <input hidden name="archivo_old" id="archivo_old" value="{$usuario->getImagen()}" type="text"/>
                                            </div>
                                            <p><strong>Nota:</strong> Solo .jpg, .jpeg, .gif, .png son los formatos permitidos con un máximo de 5Mb.</p>

                                            <!-- MODAL ERRORES DIA -->
                                            <div class="modal fade" id="modal_dia" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p id="mensaje_dia"></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- MODAL ERRORES MES -->
                                            <div class="modal fade" id="modal_mes" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p id="mensaje_mes"></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- MODAL ERRORES AÑO -->
                                            <div class="modal fade" id="modal_anio" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p id="mensaje_anio"></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- MODAL ERRORES Correo -->
                                            <div class="modal fade" id="modal_correo" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p id="mensaje_correo"></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- MODAL ERRORES DIA -->
                                            <div class="modal fade" id="modal_ok" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p id="mensaje_ok"></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <button id="btnRegistro" type="submit" class="btn btn-success"><span class="fas fa-sync"></span> Actualizar datos</button>
                                        </form>

                                        <hr>

                                        <button data-toggle="modal" data-target="#confirmar" class="btn btn-danger"><span class="fa fa-trash"></span> Eliminar cuenta</button>

                                        <!--MODAL CONFIRMAR ELIMINAR CUENTA-->
                                        <div class="modal fade" id="confirmar" role="dialog" data-backdrop="static">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header mx-auto">
                                                        <h4>¿Está seguro?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Esto resultará en la eliminación de toda su información incluidos sus archivos subidos.</p>
                                                    </div>
                                                    <div class="modal-footer mx-auto">
                                                        <button class="btn btn-danger" onClick="window.location = '{$url_eliminar_usuario}'">Confirmar</button>
                                                        <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pestaña seguidos --> 
                                    <div id="seguidos" class="tab-pane slide-left">
                                        <h4>Seguidos</h4>
                                        {$seguidos = $usuario->getSeguidos()}
                                        {if isset($seguidos) && count($seguidos) != 0}
                                        <div class="list-group"> 
                                            {foreach $seguidos as $seguido}
                                            <a href="{$url_base}usuario/perfil/{$seguido->getCorreo()}"class="list-group-item list-group-item-action" style="font-weight: bold; margin-bottom: 3px" title="Ver perfil de {$seguido->getNombre()} {$seguido->getApellido()}">{$seguido->getNombre()} {$seguido->getApellido()}</a>
                                            {/foreach}
                                        </div>
                                        {else}
                                        <h6>No estás seguiendo ningún usuario</h6>
                                        {/if} 
                                    </div>
                                </div>
                            </div>	
                        </div>	
                    </div>
                    {/if}
                </div>
            </div>
            {include file="include_js.tpl"}
            {include file="dialogos.tpl"}
            <script type="text/javascript" src="{$url_base}js/perfil.js"></script>
            <script type="text/javascript" src="{$url_base}js/registro.js"></script>
        </body>
        </html>
