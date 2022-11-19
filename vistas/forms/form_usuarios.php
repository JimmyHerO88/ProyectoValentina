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
                    <form name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                        <div class="card-body">

                        <!-- ENTRADA PARA EL ID -->
                            <div class="form-group">
                                <div class="input-group ">
                                    <input type="hidden" name="idusuario" id="idusuario">
                                </div>
                            </div>

                            <!-- ENTRADA PARA EL NOMBRE DE USUARIO -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nombre" id="nombre" class="form-control input-lg" maxlendth="120" placeholder="Nombre" required>
                                </div>
                            </div>
                            <!-- ENTRADA PAR EL USUARIO DE LOGIN -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="login" id="login" maxlength="20" placeholder="Usuario" required>
                                </div>
                            </div>
                            <!-- ENTRADA PARA EL PASSWORD -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="clave" id="clave" maxlength="64" placeholder="Clave" required>
                                </div>
                            </div>
                            <!-- ENTRADA PARA LA IMAGEN -->
                            <div class="form-group">
                                <label for="imagen">Subir Foto</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="imagen" id="imagen">
                                    <input type="hidden" name="imagenactual" id="imagenactual">                                   
                                </div>
                                <img src="" width="200px" height="200px" id="imagenmuestra">
                            </div>
                            <!-- ENTRADA PARA LOS PERMISOS -->
                            <div class="form-group col-lg-8">
                                <label>Permisos:</label>
                                <ul style="list-style: none;" id="permisos"></ul>
                            </div>
                            <!-- BOTONERA -->
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