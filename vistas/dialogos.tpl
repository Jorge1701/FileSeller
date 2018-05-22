<!-- Pregunta -->
<div class="modal fade" id="modalPregunta" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="modalPreguntaTexto"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-success" data-dismiss="modal" id="btnPreguntaAceptar">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<!-- Pregunta con mensaje -->
<div class="modal fade" id="modalPreguntaMensaje" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="modalPreguntaMensajeTexto"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label id="modalPreguntaTitulo">Texto</label>
                    <input class="form-control" type="text" id="modalPreguntaMensajeInput">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-success" data-dismiss="modal" id="btnPreguntaMensajeAceptar">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<!-- Mensaje -->
<div class="modal fade" id="modalMensaje" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="modalMensajeTexto"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal" id="btnMensajeAceptar">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function pregunta (pregunta, funcion, params = "") {
        $("#modalPreguntaTexto").html (pregunta);
        $("#btnPreguntaAceptar").attr ("onclick", funcion + "(" + params + ")");
        $("#modalPregunta").modal ("show");
    }

    function preguntaMensaje (pregunta, titulo, funcion, params = "") {
        $("#modalPreguntaMensajeInput").val ("");
        $("#modalPreguntaTitulo").html (titulo);
        $("#modalPreguntaMensajeTexto").html (pregunta);
        $("#btnPreguntaMensajeAceptar").attr ("onclick", funcion + "('modalPreguntaMensajeInput', " + params + ")");
        $("#modalPreguntaMensaje").modal ("show");
    }
    
    function mensaje (mensaje, funcion = "", params = "") {
        $("#modalMensajeTexto").html (mensaje);
        $("#modalMensajeTexto").css ("color", "green");
        if (funcion != "")
            $("#btnMensajeAceptar").attr ("onclick", funcion + "(" + params + ")");
        $("#modalMensaje").modal ("show");
    }
    
    function mensajeErr (mensaje, funcion = "", params = "") {
        $("#modalMensajeTexto").html (mensaje);
        $("#modalMensajeTexto").css ("color", "red");
        if (funcion != "")
            $("#btnMensajeAceptar").attr ("onclick", funcion + "(" + params + ")");
        $("#modalMensaje").modal ("show");
    }
</script>