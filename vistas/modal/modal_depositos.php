<div class="modal fade" id="modal-depositos">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data" id="modal_depositos" oninput="resultado1.value=parseFloat(deno1.value)*parseFloat(cant1.value)
                                resultado2.value=parseFloat(deno2.value)*parseFloat(cant2.value)
                                resultado3.value=parseFloat(deno3.value)*parseFloat(cant3.value)
                                resultado4.value=parseFloat(deno4.value)*parseFloat(cant4.value)
                                resultado5.value=parseFloat(deno5.value)*parseFloat(cant5.value)
                                resultado6.value=parseFloat(deno6.value)*parseFloat(cant6.value)
                                resultado7.value=parseFloat(deno7.value)*parseFloat(cant7.value)
                                importe.value=parseFloat(resultado1.value)+parseFloat(resultado2.value)+parseFloat(resultado3.value)+parseFloat(resultado4.value)+parseFloat(resultado5.value)+parseFloat(resultado6.value)+parseFloat(resultado7.value)">
                <div class="modal-header" style="background-color: #ffc107">
                    <h4 class="modal-title">Depósitos</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group ">
                            <input type="hidden" class="form-control input-lg" name="iddeposito" id="iddeposito">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control input-lg" id="fecha_depo" name="fecha" value="<?php echo date("Y-m-d")?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tipo de depósito</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-share-square"></i></span>
                            <select id="tipo_depo" name="tipo" class="form-control select2" style="width: 100%;" required>
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
                        <div class="form-group col-4">
                            <div class="text-center"><label>Denominación</label></div>
                            <input type="number" style="max-width: 150px;" disabled="disabled" id="deno1" value="1000">
                            <input type="number" style="max-width: 150px;" disabled="disabled" id="deno2" value="500">
                            <input type="number" style="max-width: 150px;" disabled="disabled" id="deno3" value="200">
                            <input type="number" style="max-width: 150px;" disabled="disabled" id="deno4" value="100">
                            <input type="number" style="max-width: 150px;" disabled="disabled" id="deno5" value="50">
                            <input type="number" style="max-width: 150px;" disabled="disabled" id="deno6" value="20">  
                            <input type="number" style="max-width: 150px;" disabled="disabled" id="deno7" value="1">
                        </div>
                        <div class="form-group col-4">
                            <div class="text-center"><label>Cantidad</label></div>
                            <input type="number" style="max-width: 150px;" id="cant1" name="cant1" required>
                            <input type="number" style="max-width: 150px;" id="cant2" name="cant2" required>
                            <input type="number" style="max-width: 150px;" id="cant3" name="cant3" required>
                            <input type="number" style="max-width: 150px;" id="cant4" name="cant4" required>
                            <input type="number" style="max-width: 150px;" id="cant5" name="cant5" required>
                            <input type="number" style="max-width: 150px;" id="cant6" name="cant6" required>
                            <input type="number" style="max-width: 150px;" step="0.01" id="cant7"  name="cant7" required>
                        </div>
                        <div class="form-group col-4">
                            <div class="text-center"><label>Importe</label></div>
                            <output style="width: 150px; font-size: 20px; text-align: right" id="resultado1" name="resultado1"  for="deno1 cant1"></output>
                            <output style="width: 150px; font-size: 20px; text-align: right" id="resultado2" name="resultado2"  for="deno2 cant2"></output>
                            <output style="width: 150px; font-size: 20px; text-align: right" id="resultado3" name="resultado3"  for="deno3 cant3"></output>
                            <output style="width: 150px; font-size: 20px; text-align: right" id="resultado4" name="resultado4"  for="deno4 cant4"></output>
                            <output style="width: 150px; font-size: 20px; text-align: right" id="resultado5" name="resultado5"  for="deno5 cant5"></output>
                            <output style="width: 150px; font-size: 20px; text-align: right" id="resultado6" name="resultado6"  for="deno6 cant6"></output>
                            <output style="width: 150px; font-size: 20px; text-align: right" id="resultado7" name="resultado7"  for="deno7 cant7"></output>
                        </div>
                    </div>                            
                    <div class="form-group">
                        <label>Total</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                            </div>
                            <input type="number" step="any" class="form-control input-lg" name="importe" id="importe_depo" placeholder="Importe" required>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="input-group ">
                        <input type="hidden" class="form-control input-lg" name="idusuario" id="idusuario" value="<?php echo $_SESSION['idusuario']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger pull-left btn-md" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success btn-md" id="btnGuardarDeposito"><i class="fa fa-save"></i> Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>