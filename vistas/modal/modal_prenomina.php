<div class="modal fade" id="modal-prenomina">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data" id="modal_prenomina" oninput="t_general.value=parseFloat(sueldo_dia.value)*parseFloat(dias.value)+parseFloat(t_extra.value)+parseFloat(ventas.value)-parseFloat(t_perdido.value)-parseFloat(abono.value)-parseFloat(a_cuenta.value)">
                <div class="modal-header" style="background-color: #ffc107">
                    <h4 class="modal-title">Prenómina</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group ">
                                <input type="hidden" class="form-control input-lg" name="idnomina" id="idnomina">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha:</label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control input-lg" name="fecha" id="fecha_nomina" value="<?php echo date("Y-m-d")?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Empleado</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fas fa-user-tag nav-icon"></i></span>
                                <select name="idempleado" id="idempleadoNomina" class="form-control selectpicker" data-live-search="true" onchange="mostrarDeuda(this.value)" required></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" class="form-control input-md" name="sueldo_dia" id="sueldo_dia" placeholder="Sueldo laborados" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Días Laborados</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-sun"></i></span>
                                </div>
                                <input type="number" step="0.01" class="form-control input-md" name="dias" id="dias" placeholder="Dias laborados" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Tiempo Extra</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-stopwatch-20"></i></span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control input-md" name="t_extra" id="t_extra" placeholder="Tiempo Extra" required>
                                </div>
                            </div>    
                            <div class="form-group col-6">
                                <label>Premio de Ventas</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-medal"></i></span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control input-md" name="ventas" id="ventas" placeholder="Premio de Ventas" required>
                                </div>
                            </div>     
                            <div class="form-group col-12">
                                <label>Total Deuda</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-credit-card"></i></span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control input-md text-danger " name="deuda" id="deudaNomina" placeholder="Total deuda" disabled>
                                </div>
                            </div>    
                            <div class="form-group col-6">
                                <label>Abono a deuda</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control input-md" name="abono" id="abono" placeholder="Abono a deuda" required>
                                </div>
                            </div>    
                            <div class="form-group col-6">
                                <label>Adelanto de nómina</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control input-md" name="a_cuenta" id="a_cuenta" placeholder="Adelanto de nómina" required>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label>Tiempo Perdido</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-stopwatch"></i></span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control input-md" name="t_perdido" id="t_perdido" placeholder="Tiempo Perdido" required>
                                </div>
                            </div>           
                        </div>                                     
                        <div class="form-group">
                            <label>Total</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                </div>
                                <input type="number" step="any" class="form-control input-lg" name="t_general" id="t_general" placeholder="Importe" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group ">
                                <input type="hidden" class="form-control input-lg" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group ">
                                <input type="hidden" class="form-control input-lg" name="idsucursal" id="idsucursal" value="<?php echo $_SESSION['sucursal_idsucursal']; ?>">
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger pull-left btn-md" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success btn-md" id="btnGuardarNomina"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>