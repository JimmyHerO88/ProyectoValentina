 <!-- general form elements -->
<section class="content" id="formularioregistros">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-2"></div>
            <div class=" col-lg-4 col-md-8">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Ingresar o actualizar Gasto</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form name="formulario" id="formulario" method="POST">
                        <div class="card-body">
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
                                    <input type="date" class="form-control input-lg"  name="fecha" id="fecha" value="<?php echo date("Y-m-d")?>">
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
                                    <input type="hidden" class="form-control input-lg" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']; ?>"
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group ">
                                    <input type="hidden" class="form-control input-lg" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']; ?>"
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-danger pull-left btn-md" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-success btn-md" id="btnGuardar"><i class="fa fa-save"></i> Guardar gasto</button>
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