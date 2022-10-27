 <!-- general form elements -->
 <section class="content" id="formularioregistros">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-2"></div>
            <div class=" col-lg-4 col-md-8">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Ingresar o actualizar Empleado</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                        <div class="card-body">

                        <!-- ENTRADA PARA EL ID -->
                            <div class="form-group">
                                <div class="input-group ">
                                    <input type="hidden" name="idempleado" id="idempleado">
                                </div>
                            </div>

                            <!-- ENTRADA PARA EL NOMBRE DE EMPLEADO -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                    </div>
                                    <input type="text" name="nombre" id="nombre" class="form-control input-lg" maxlendth="120" placeholder="Nombre del empleado" required>
                                </div>
                            </div>
                            <!-- ENTRADA PAR EL SUELDO -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="sueldo_dia" id="sueldo_dia" placeholder="Sueldo por día" required>
                                </div>
                            </div>
                            <!-- ENTRADA PARA EL DOMICILIO -->
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="domicilio" id="domicilio" maxlength="64" placeholder="Domicilio Actual">
                                </div>
                            </div>
                            <!-- ENTRADA PARA TEL CONTACTO -->
                            <div class="form-group">
                                <label>Teléfonos de contacto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="tel_1" id="tel_1" placeholder="WhatsApp">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="tel_2" id="tel_2" placeholder="Teléfono de casa o fijo">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="tel_3" id="tel_3" placeholder="Teléfono de Emergencia">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="tel_4" id="tel_4" placeholder="Teléfono de Referencia">
                                </div>
                            </div>
                            <!-- FECHA NACIMIENTO -->
                            <div class="form-group">
                                <label for="fecha">Fecha de nacimiento:</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control input-lg" name="fecha_nacimiento" id="fecha_nacimiento">
                                </div>
                            </div>
                            <!-- FECHA CONTRATO -->
                            <div class="form-group">
                                <label for="fecha">Fecha de contrato:</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control input-lg" name="fecha_contrato" id="fecha_contrato" >
                                </div>
                            </div>
                            <!-- ENTRADA PARA LA IMAGEN -->
                            <div class="form-group">
                                <label for="imagen">Subir Foto</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="imagen" id="imagen">
                                    <input type="hidden" name="imagenactual" id="imagenactual">
                                </div>
                                <img src="" width="100px" height="150px" id="imagenmuestra">
                            </div>
                            <!-- ENTRADA PARA FRENTE INE -->
                            <div class="form-group">
                                <label for="ine_frente">Subir Frente del INE</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="ine_frente" id="ine_frente">
                                    <input type="hidden" name="ine_frente_actual" id="ine_frente_actual">
                                </div>
                                <img src="" width="135px" height="100px" id="inefrentemuestra">
                            </div>                            
                            <!-- ENTRADA PARA REVERSO INE -->
                            <div class="form-group">
                                <label for="ine_reverso">Subir Reverso del INE</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="ine_reverso" id="ine_reverso">
                                    <input type="hidden" name="ine_reverso_actual" id="ine_reverso_actual">
                                </div>
                                <img src="" width="135px" height="100px" id="inereversomuestra">
                            </div>
                            <!-- BOTONERA -->
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