 <!-- general form elements -->
<section class="content" id="formularioregistros">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-2"></div>
            <div class=" col-lg-4 col-md-8">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Ingresar o actualizar Notas</h3>
                    </div>
                    <form name="formulario" id="formulario" method="POST">

                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group ">
                                    <input type="hidden" class="form-control input-lg" name="idnota" id="idnota">
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
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control input-lg" onkeyup="mayus(this);" name="rango_folios" id="rango_folios" maxlendth="20" placeholder="Folios" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Concepto</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-share-square"></i></span>
                                    <select id="concepto" name="concepto" class="form-control select2" style="width: 100%;" required>
                                    <option value="NOTAS FORÁNEAS">NOTAS FORÁNEAS</option>
                                    <option value="NOTAS REMISIÓN">NOTAS REMISIÓN</option>
                                    <option value="NOTAS PEDIDOS">NOTAS PEDIDOS</option>
                                    <option value="TICKETS FISCALES">TICKETS FISCALES</option>
                                    <option value="TICKETS REMISONES">TICKETS REMISONES</option>
                                    </select>
                                </div>
                            </div>                         
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    </div>
                                    <input type="number" step="any" class="form-control input-lg" name="total" id="total" maxlendth="120" placeholder="Importe total" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    </div>
                                    <input type="text" class="form-control input-lg" onkeyup="mayus(this);" name="cliente" id="cliente" maxlendth="20" placeholder="Cliente">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tipo de Pago</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search-dollar"></i></span>
                                    <select id="tipo_pago" name="tipo_pago" class="form-control select2" style="width: 100%;">
                                    <option value="EFECTIVO">EFECTIVO</option>
                                    <option value="TARJETA">TARJETA</option>
                                    <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                    <option value="DEPÓSITO">DEPÓSITO</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-sticky-note"></i></span>
                                    </div>
                                    <input type="text" class="form-control input-lg" onkeyup="mayus(this);" name="observaciones" id="observaciones" maxlendth="20" placeholder="Observaciones">
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