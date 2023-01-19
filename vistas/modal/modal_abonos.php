<div class="modal fade" id="modal-abonos">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data" id="modal_abonos" name="modal_abonos">
                <div class="modal-header" style="background-color: #ffc107">
                    <h4 class="modal-title">Abonos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                    <div class="input-group ">
                        <input type="hidden" class="form-control input-lg" name="idabono" id="idabono">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control input-lg" id="fecha_abono" name="fecha" value="<?php echo date("Y-m-d")?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Empleado</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fas fa-user-tag nav-icon"></i></span>
                            <select name="idempleado" id="idempleadoAbono" class="form-control selectpicker" data-live-search="true" onchange="mostrarDeudaAbono(this.value)" required>  </select>
                        </div>
                    </div>     
                    <div class="form-group col-12">
                        <label>Total Deuda</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-credit-card"></i></span>
                            </div>
                            <input type="number" step="0.01" class="form-control input-md text-danger " name="deuda" id="deudaAbono" placeholder="Total deuda" disabled>
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
                    <button type="submit" class="btn btn-success btn-md" id="btnGuardarAbono"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>