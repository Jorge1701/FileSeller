<!DOCTYPE html>
<html>
<head>
    {include file="include_css.tpl"}
    <link rel="stylesheet" type="text/css" href="{$url_base}style/login.css">
    <title>Registrarse</title>
</head>
<body background="{$url_base}img/wallpaper.jpg">
    {include file="header.tpl"}
        <!-- ----------------------------------------------------------------------------- 
        -->

        {if isset($mensaje_registro)}
        <div align="center">
            <div class="col-lg-11 alert alert-success text-center">
                <strong>{$mensaje_registro}</strong> 
            </div>
        </div>
        {/if}

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 mx-auto card text-center">
                    <div class="mx-auto is"><h4>Registrarse</h4></div>
                    <hr>
                    <form id="formRegistro" method="post" enctype="multipart/form-data" action="{$url_registro}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text fa fa-address-book" id="basic-addon1"></span>
                            </div>
                            <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" required="Ingrese su Nombre" autofocus title="Ingrese su Nombre">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text fa fa-address-book" id="basic-addon1"></span>
                            </div>
                            <input name="apellido" id="apellido" type="text" class="form-control" placeholder="Apellido" aria-label="Apellido" aria-describedby="basic-addon1" required="Ingrese su Apellido" autofocus title="Ingrese su Apellido">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">@</span>
                            </div>
                            <input name="correo" id="correo" type="email" class="form-control" placeholder="Correo" aria-label="Correo" aria-describedby="basic-addon1" required="Ingrese su correo" autofocus title="Ingrese su correo">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text fa fa-lock" id="basic-addon1"></span>
                            </div>
                            <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon1" autofocus title="Mínimo 6 / Máximo 21" required="Mínimo 6 / Máximo 21"/>
                            <!--ACA--><div class="input-group-prepend">
                                <span onclick="showPassword(); //return false;" class="input-group-text fa fa-eye" id="eyePass"></span>
                            </div>
                        </div>


                        <div class="input-group mb-3">
                            <input required="Campo obligatorio" type="text" class="form-control" placeholder="Dia" id="dia" name="dia">
                            <select required="Campo obligatorio" class="form-control"  id="mes" name="mes">
                                <option value="mes">Mes</option>
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                            <input required="Campo obligatorio"  type="text" class="form-control" placeholder="Año" id="anio" name="anio">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text fa fa-camera" id="basic-addon1"></span>
                            </div>
                            <input accept="image/*" name="archivo" id="archivo" type="file" class="form-control" aria-label="Archivo" aria-describedby="basic-addon1" autofocus title="Seleccione una imagen"/>
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



                        <!-- MODAL -->

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



                        <!-- MODAL -->

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



                        <!-- MODAL -->

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
                        <!-- ESTO ROBADO -->
                        {if isset($mensaje)} 
                        <div class="mensaje">{$mensaje}</div>
                        <br>
                        {/if}

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
                        <!-- MODAL -->

                        <!-- MODAL -->

                        <button id="btnRegistro" class="btn btn-success registrarse">Aceptar</button>
                    </form>

                    <!-- CHEQUEAR CORREO -->
                    <form>
                        <input type="hidden" name="correo2" id="correo2">
                    </form>
                </div>
            </div>
        </div>
    </div>

    {include file="include_js.tpl"}
    <script type="text/javascript" src="{$url_base}js/registro.js"></script>
</body>
</html>