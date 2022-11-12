<div class="modal fade" id="modal-gastos">
    <div class="modal-dialog">
        <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data" id="modal_gastos">
            <div class="modal-header" style="background-color: #ffc107">
                <h4 class="modal-title">Gastos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="input-group ">
                        <input type="hidden" class="form-control input-lg" name="idgasto" id="idgasto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control input-lg" id="fecha" name="fecha" value="<?php echo date("Y-m-d")?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Tpo de gasto</label>
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-share-square"></i></span>
                    <select id="tipo" name="tipo" class="form-control select2" style="width: 100%;" required>
                        <option value="TIENDA" selected>TIENDA</option>
                        <option value="PERSONAL">PERSONAL</option>
                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                    </div>
                    <input type="text" name="concepto" id="concepto" class="form-control input-lg" onkeyup="mayus(this);" maxlendth="120" placeholder="Concepto" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" step="any" class="form-control input-lg" name="importe" id="importe" maxlendth="120" placeholder="Importe" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group ">
                    <input type="hidden" class="form-control input-lg" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group ">
                    <input type="hidden" class="form-control input-lg" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger pull-left btn-md" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                <button type="submit" class="btn btn-success btn-md" id="btnGuardar"><i class="fa fa-save"></i> Guardar gasto</button>
            </div>
        </form>
        </div>
    </div>
    </div>