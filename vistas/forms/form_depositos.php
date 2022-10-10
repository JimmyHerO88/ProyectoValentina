 <!-- general form elements -->
<section class="content" id="formularioDepositos">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-2"></div>
            <div class=" col-lg-4 col-md-8">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Ingresar o actualizar Depósitos</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form name="formulario_depositos" id="formulario_depositos" method="POST" oninput="resultado1.value=parseFloat(deno1.value)*parseFloat(cant1.value)
                                 resultado2.value=parseFloat(deno2.value)*parseFloat(cant2.value)
                                 resultado3.value=parseFloat(deno3.value)*parseFloat(cant3.value)
                                 resultado4.value=parseFloat(deno4.value)*parseFloat(cant4.value)
                                 resultado5.value=parseFloat(deno5.value)*parseFloat(cant5.value)
                                 resultado6.value=parseFloat(deno6.value)*parseFloat(cant6.value)
                                 resultado7.value=parseFloat(deno7.value)*parseFloat(cant7.value)
                                 total.value=parseFloat(resultado1.value)+parseFloat(resultado2.value)+parseFloat(resultado3.value)+parseFloat(resultado4.value)+parseFloat(resultado5.value)+parseFloat(resultado6.value)+parseFloat(resultado7.value)">

                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group ">
                                    <input type="hidden" class="form-control input-lg" name="iddeposito" id="iddeposito">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group ">
                                    <input type="hidden" class="form-control input-lg" name="idusuario" id="idusuario" value= "<?php echo $_SESSION['idusuario'];?>">
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
                                <label>Tpo de depósito</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-share-square"></i></span>
                                    <select id="tipo" name="tipo" class="form-control select2" style="width: 100%;">
                                    <option value="DEPÓSITO">DEPÓSITO</option>
                                    <option value="TARJETA">TARJETA</option>
                                    <option value="TRANSFERENCIA BANCARIA">TRANSFERENCIA BANCARIA</option>
                                    <option value="FACTURA">FACTURA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control input-lg" onkeyup="mayus(this);" name="observacion" id="observacion" maxlendth="120" placeholder="Observación">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                    <div><label>Denominación</label></div>
                                    <input type="number" style="max-width: 150px;" disabled="disabled" id="deno1" value="1000">
                                    <input type="number" style="max-width: 150px;" disabled="disabled" id="deno2" value="500">
                                    <input type="number" style="max-width: 150px;" disabled="disabled" id="deno3" value="200">
                                    <input type="number" style="max-width: 150px;" disabled="disabled" id="deno4" value="100">
                                    <input type="number" style="max-width: 150px;" disabled="disabled" id="deno5" value="50">
                                    <input type="number" style="max-width: 150px;" disabled="disabled" id="deno6" value="20">  
                                    <input type="number" style="max-width: 150px;" disabled="disabled" id="deno7" value="1">
                                </div>
                                <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                    <div><label>Cantidad</label></div>
                                    <input type="number" style="max-width: 150px;" id="cant1" name="cant1" value="0">
                                    <input type="number" style="max-width: 150px;" id="cant2" name="cant2" value="0">
                                    <input type="number" style="max-width: 150px;" id="cant3" name="cant3" value="0">
                                    <input type="number" style="max-width: 150px;" id="cant4" name="cant4" value="0">
                                    <input type="number" style="max-width: 150px;" id="cant5" name="cant5" value="0">
                                    <input type="number" style="max-width: 150px;" id="cant6" name="cant6" value="0">
                                    <input type="number" style="max-width: 150px;" step="0.01" id="cant7"  name="cant7" value="0">
                                    <div style="text-align: right; font-size: 20px;"><label>Total</label></div>
                                </div>
                                <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                    <div><label>Importe</label></div>
                                    <output style="max-width: 150px; font-size: 20px;" name="resultado1" for="deno1 cant1"></output>
                                    <output style="max-width: 150px; font-size: 20px;" name="resultado2" for="deno2 cant2"></output>
                                    <output style="max-width: 150px; font-size: 20px;" name="resultado3" for="deno3 cant3"></output>
                                    <output style="max-width: 150px; font-size: 20px;" name="resultado4" for="deno4 cant4"></output>
                                    <output style="max-width: 150px; font-size: 20px;" name="resultado5" for="deno5 cant5"></output>
                                    <output style="max-width: 150px; font-size: 20px;" name="resultado6" for="deno6 cant6"></output>
                                    <output style="max-width: 150px; font-size: 20px;" name="resultado7" for="deno7 cant7"></output>
                                    <output style="max-width: 150px; font-size: 20px;" name="total" for="deno7 cant7"></output>
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
                            <div class="card-footer">
                                <div class="row text-center">
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-danger pull-left btn-md" onclick="cancelarform()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success btn-md" id="btnGuardar"><i class="fa fa-save"></i> Guardar depósito</button>
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