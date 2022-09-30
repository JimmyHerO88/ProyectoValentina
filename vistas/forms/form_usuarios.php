 <!-- general form elements -->
<section class="content" id="formularioregistros">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-2"></div>
            <div class=" col-lg-4 col-md-8">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Ingresar o actualizar Usuario</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form name="formulario" id="formulario" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group ">
                                    <input type="hidden" class="form-control input-lg" name="idusuario" id="idusuario">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nombre" id="nombre" class="form-control input-lg" onkeyup="mayus(this);" maxlendth="120" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-sigb-in"></i></span>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="login" id="login" maxlength="20" placeholder="Usuario" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="clave" id="clave" maxlength="64" placeholder="Clave" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Subir Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control custom-file-input" name="imagen" id="imagen">
                                        <input type="hidden" name="imagenactual" id="imagenactual">
                                        <img src="" width="150px" height="120px" id="imagenmuestra"><label class="custom-file-label" for="imagen">Seleccionar Imagen</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row text-center">
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-danger pull-left btn-md" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                    </div>
                                    <div class="col-sm-6">
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