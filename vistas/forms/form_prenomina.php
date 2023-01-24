 <!-- general form elements -->
<section class="content" id="formularioregistros">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-2"></div>
            <div class=" col-lg-4 col-md-8">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Ingresar o actualizar Depósitos</h3>
                    </div>
                    <form name="formulario" id="formulario" method="POST" oninput="t_general.value=parseFloat(sueldo_dia.value)*parseFloat(dias.value)+parseFloat(t_extra.value)+parseFloat(ventas.value)-parseFloat(t_perdido.value)-parseFloat(abono.value)-parseFloat(a_cuenta.value)">

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
                                    <input type="date" class="form-control input-lg" name="fecha" value="<?php echo date("Y-m-d")?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Empleado</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fas fa-user-tag nav-icon"></i></span>
                                    <select name="idempleado" id="idempleado" class="form-control selectpicker" data-live-search="true" onchange="mostrar(this.value)" required>  </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="hidden" class="form-control input-md" name="sueldo_dia" id="sueldo_dia" placeholder="Sueldo laborados" value="0" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Días Laborados</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-sun"></i></span>
                                    </div>
                                    <input type="number" step="0.01" class="form-control input-md" name="dias" id="dias" placeholder="Dias laborados" value="0" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Tiempo Extra</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-stopwatch-20"></i></span>
                                        </div>
                                        <input type="number" step="0.01" class="form-control input-md" name="t_extra" id="t_extra" placeholder="Tiempo Extra" value="0.00" required>
                                    </div>
                                </div>    
                                <div class="form-group col-6">
                                    <label>Premio de Ventas</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-medal"></i></span>
                                        </div>
                                        <input type="number" step="0.01" class="form-control input-md" name="ventas" id="ventas" placeholder="Premio de Ventas" value="0.00" required>
                                    </div>
                                </div>     
                                <div class="form-group col-12">
                                    <label>Total Deuda</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-credit-card"></i></span>
                                        </div>
                                        <input type="number" step="0.01" class="form-control input-md text-danger " name="deuda" id="deuda" placeholder="Total deuda" disabled>
                                    </div>
                                </div>    
                                <div class="form-group col-6">
                                    <label>Abono a deuda</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>
                                        </div>
                                        <input type="number" step="0.01" class="form-control input-md" name="abono" id="abono" placeholder="Abono a deuda" value="0.00" required>
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
                                        <input type="number" step="0.01" class="form-control input-md" name="t_perdido" id="t_perdido" placeholder="Tiempo Perdido" value="0.00" required>
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
                                    <input type="hidden" class="form-control input-lg" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group ">
                                    <input type="hidden" class="form-control input-lg" name="idsucursal" id="idsucursal" value="<?php echo $_SESSION['sucursal_idsucursal']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group ">
                                    <input type="hidden" class="form-control input-lg" name="idsucursal" id="idsucursal" value="<?php echo $_SESSION['sucursal_idsucursal']; ?>">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-danger pull-left btn-md" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-success btn-md" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                                    </div>
                                </div>                         
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-2"></div>
        </div>
    </div>
</section>