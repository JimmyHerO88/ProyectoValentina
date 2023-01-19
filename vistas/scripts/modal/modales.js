//VARIABLES GENERALES
const contentWrapper = document.getElementById('content-wrapper');
const botones = document.getElementById('botones');
const cuadrante = document.getElementById('cuadrante');
const resumen = document.getElementById('resumen');
const search = document.getElementById('search');
const valeCaja = document.getElementById('vale_caja');
//VARIABLES DE GASTOS
const fecha = document.getElementById('fecha');
const concepto = document.getElementById('concepto');
const importe = document.getElementById('importe');
const fechaVale = document.getElementById('fecha_vale');
const conceptoVale = document.getElementById('concepto_vale');
const importeVale = document.getElementById('importe_vale');
//VARIABLES DE PRESATMOS
const indexEmpleado = document.getElementById('idempleado');
const importePrestamo = document.getElementById('importe_prestamo');
const fechaPrestamo = document.getElementById('fecha_prestamo');
const tipoPrestamo = document.getElementById('tipo_prestamo');
//VARIABLES DE DEPOSITOS
const fechaDepo = document.getElementById('fecha_depo');
const tipoDepo = document.getElementById('tipo_depo');
const cant1 = document.getElementById('cant1');
const cant2 = document.getElementById('cant2');
const cant3 = document.getElementById('cant3');
const cant4 = document.getElementById('cant4');
const cant5 = document.getElementById('cant5');
const cant6 = document.getElementById('cant6');
const cant7 = document.getElementById('cant7');
const resultado1 = document.getElementById('resultado1');
const resultado2 = document.getElementById('resultado2');
const resultado3 = document.getElementById('resultado3');
const resultado4 = document.getElementById('resultado4');
const resultado5 = document.getElementById('resultado5');
const resultado6 = document.getElementById('resultado6');
const resultado7 = document.getElementById('resultado7');
const observacion = document.getElementById('observacion');
const importeDepo = document.getElementById('importe_depo');
//VARIABLES PRENOMINA
const indexEmpleadoNomina = document.getElementById('idempleadoNomina');
const fechaNomina = document.getElementById('fecha_nomina');
const dias = document.getElementById('dias');
const tiempoExtra = document.getElementById('t_extra');
const ventas = document.getElementById('ventas');
const deuda = document.getElementById('deudaNomina');
const abono = document.getElementById('abono');
const tiempoPerdido = document.getElementById('t_perdido');
const total = document.getElementById('t_general');


//FUNCION SEPARADOR DE MILES
const formatoMexico = (number) => {
    const exp = /(\d)(?=(\d{3})+(?!\d))/g;
    const rep = '$1,';
    return number.toString().replace(exp,rep);
  }
 
//Funcion que se ejecuta al inicio
function init(){

    $("#modal_gastos").on("submit", function(e){

        guardarGasto(e);
        
    });

    $("#modal_depositos").on("submit", function(e){

        guardarDeposito(e);
        
    });
    
    $("#modal_notas").on("submit", function(e){

        guardarNota(e);
        
    });
    
    $("#modal_proveedores").on("submit", function(e){

        guardarProveedor(e);
        
    });

    $("#modal_liquidaciones").on("submit", function(e){

        guardarLiquidacion(e);
        
    });

    $("#modal_prestamos").on("submit", function(e){

        guardarPrestamo(e);
        
    });

    $("#modal_abonos").on("submit", function(e){

        guardarAbono(e);
        
    });

    $("#modal_prenomina").on("submit", function(e){

        guardarPrenomina(e);
        
    });

    //Cargamos los items de los empleados
    $.post("../ajax/prestamo.ajax.php?op=selectempleado", function(r){
        $("#idempleado").html(r);
        $('#idempleado').selectpicker('refresh');
    });

    $.post("../ajax/prestamo.ajax.php?op=selectempleado", function(r){
        $("#idempleadoNomina").html(r);
        $('#idempleadoNomina').selectpicker('refresh');
    });

    $.post("../ajax/prestamo.ajax.php?op=selectempleado", function(r){
        $("#idempleadoAbono").html(r);
        $('#idempleadoAbono').selectpicker('refresh');
    });

}

//Funcion mayusculas
function mayus(e) {
    e.value = e.value.toUpperCase();
}

//FUNCION PARA GUARDAR Y EDITAR GASTOS
function guardarGasto(e){
    

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardarGasto").prop("disabled", true);
    let formData = new FormData($("#modal_gastos")[0]);

    $.ajax({

        url: "../ajax/gasto.ajax.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

    });   

    $("#modal-gastos").modal("hide");
    //$("#modal-depositos").modal("hide");

   
      contentWrapper.style.display = "none";

        valeCaja.innerHTML = `<div class="col-12">
        <h1 class="text-center" style="font-size: 200px;"><strong>Creaciones Valentina</strong></h1>
        <h2 class="text-center" style="font-size: 150px;"><u>VALE PROVISIONAL DE CAJA</u></h2>
        <h3 class="text-center" style="font-size: 150px;" id="fecha_vale">Fecha: <strong>${fecha.value}</strong></h3>
        <h4 class="text-center" style="font-size: 80px;"><strong>CANTIDAD</strong></h4>
        <p style="font-size: 80px;">***********************************************************</p>
        <p class="text-center" style="font-size: 300px;" id="importe_vale"><span><strong>$ ${formatoMexico(importe.value)}</strong></span></p>
        <p style="font-size: 80px;">***********************************************************<br></p>
        <h4 class="text-center" style="font-size: 80px;"><strong>CONCEPTO</strong></h4>
        <p style="font-size: 80px;">***********************************************************</p>
        <h2 class="text-center" style="font-size: 180px;" id="concepto_vale"><span><strong>${concepto.value}</strong></span></h2>
        <p style="font-size: 80px;">***********************************************************</p>
        <h4 class="text-center" style="font-size: 80px;"><strong>FIRMA DE RECIBIDO</strong></h4><br>
        <p class="text-center" style="font-size: 80px; "><br><br><br>_________________________________________________</p>
        </div>`;

        setTimeout(() => {
            window.print();
            setTimeout(() => {
                    window.location.reload();
            }, "800");
        }, "1500");

}

//FUNCION PARA GUARDAR Y EDITAR DEPOSITOS
function guardarDeposito(e){
    

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardarDeposito").prop("disabled", true);
    let formData = new FormData($("#modal_depositos")[0]);

    $.ajax({

        url: "../ajax/deposito.ajax.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false

    });   

    //$("#modal-gastos").modal("hide");
    $("#modal-depositos").modal("hide");

   
        contentWrapper.style.display = "none";

        valeCaja.innerHTML = `  <div class="col-12 text-center">
                                    <h1 class="text-center" style="font-size: 200px;"><strong>Creaciones Valentina</strong></h1>
                                    <h3 class="text-center" style="font-size: 150px;">Fecha: <strong>${fechaDepo.value}</strong></h3>
                                    <p style="font-size: 80px;">***********************************************************</p>
                                    <p class="text-center" style="font-size: 200px;"><span><strong>${tipoDepo.value} ${observacion.value}</strong></span></p>
                                    <p style="font-size: 80px;">***********************************************************</p>
                                    <table class="justify-content-center table table-sm">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 60px; text-align:center;">DENOMINACIÓN</th>
                                            <th style="font-size: 60px; text-align:center;">CANTIDAD</th>
                                            <th style="font-size: 60px; text-align:center;">IMPORTE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="font-size: 80px; text-align:center;">$ 1,000.00</td>
                                            <td style="font-size: 80px; text-align:center;">${cant1.value}</td>
                                            <td style="font-size: 80px; text-align:center;">$ ${formatoMexico(resultado1.value)}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 80px; text-align:center;">$ 5000.00</td>
                                            <td style="font-size: 80px; text-align:center;">${cant2.value}</td>
                                            <td style="font-size: 80px; text-align:center;">$ ${formatoMexico(resultado2.value)}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 80px; text-align:center;">$ 200.00</td>
                                            <td style="font-size: 80px; text-align:center;">${cant3.value}</td>
                                            <td style="font-size: 80px; text-align:center;">$ ${formatoMexico(resultado3.value)}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 80px; text-align:center;">$ 100.00</td>
                                            <td style="font-size: 80px; text-align:center;">${cant4.value}</td>
                                            <td style="font-size: 80px; text-align:center;">$ ${formatoMexico(resultado4.value)}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 80px; text-align:center;">$ 50.00</td>
                                            <td style="font-size: 80px; text-align:center;">${cant5.value}</td>
                                            <td style="font-size: 80px; text-align:center;">$ ${formatoMexico(resultado5.value)}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 80px; text-align:center;">$ 20.00</td>
                                            <td style="font-size: 80px; text-align:center;">${cant6.value}</td>
                                            <td style="font-size: 80px; text-align:center;">$ ${formatoMexico(resultado6.value)}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 80px; text-align:center;"></td>
                                            <td style="font-size: 80px; text-align:center;">MORRALLA</td>
                                            <td style="font-size: 80px; text-align:center;">$ ${formatoMexico(resultado7.value)}</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    <p style="font-size: 80px;">**********************************************************</p>
                                    <p class="text-center" style="font-size: 350px;"><span><strong>$ ${formatoMexico(importeDepo.value)}</strong></span></p>
                                    <p style="font-size: 80px;">***********************************************************</p>
                                    <h4 class="text-center" style="font-size: 80px;"><strong>FIRMA DE RECIBIDO</strong></h4>
                                    <p class="text-center" style="font-size: 60px; "><br><br><br><br>_________________________________________________</p>
                                </div>`;

        setTimeout(() => {
            window.print();
            setTimeout(() => {
                    window.location.reload();
            }, "800");
        }, "1500");

}

//FUNCION PARA GUARDAR NOTAS
function guardarNota(e){

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardarNota").prop("disabled", true);
    let formData = new FormData($("#modal_notas")[0]);

    $.ajax({

        url: "../ajax/registro_notas.ajax.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos){
            Swal.fire({
                icon: 'success',
                title: datos,
                showConfirmButton: false,
                timer: 1500
            })

            setTimeout(() => {
                window.location.reload();
            }, "800");
        }

    });    

}

//FUNCION PARA GUARDAR PAGO A PROVEEDORES
function guardarProveedor(e){

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardarProveedor").prop("disabled", true);
    let formData = new FormData($("#modal_proveedores")[0]);

    $.ajax({

        url: "../ajax/pagoproveedor.ajax.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos){
            Swal.fire({
                icon: 'success',
                title: datos,
                showConfirmButton: false,
                timer: 1500
            })
            
            setTimeout(() => {
                window.location.reload();
            }, "800");
        }

    });

}

//FUNCION PARA GUARDAR LIQUIDACIONES
function guardarLiquidacion(e){

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardarLiquidacion").prop("disabled", true);
    let formData = new FormData($("#modal_liquidaciones")[0]);

    $.ajax({

        url: "../ajax/liquidacion.ajax.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos){
            Swal.fire({
                icon: 'success',
                title: datos,
                showConfirmButton: false,
                timer: 1500
            })
            
            setTimeout(() => {
                window.location.reload();
            }, "800");
        }

    });

}
function imprimeCuadrante() {
    botones.style.display = "none";
    resumen.style.display = "none";
    search.style.display = "none";
    setTimeout(() => {
        window.print();
        setTimeout(() => {
                window.location.reload();
        }, "800");
    }, "1500");
}

function imprimeResumen() {
    botones.style.display = "none";
    cuadrante.style.display = "none";
    search.style.display = "none";
    setTimeout(() => {
        window.print();
        setTimeout(() => {
                window.location.reload();
        }, "800");
    }, "1500");
}

//FUNCION PARA GUARDAR Y EDITAR PRESTAMOS
function guardarPrestamo(e){    

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardarPrestamo").prop("disabled", true);
    let formData = new FormData($("#modal_prestamos")[0]);
    let empleadoElegido = indexEmpleado.options[indexEmpleado.selectedIndex].text;

    $.ajax({

        url: "../ajax/prestamo.ajax.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false

    });   

    $("#modal-prestamos").modal("hide");

   
        contentWrapper.style.display = "none";

        valeCaja.innerHTML = `<div class="col-12">
        <h1 class="text-center" style="font-size: 200px;"><strong>Creaciones Valentina</strong></h1>
        <h2 class="text-center" style="font-size: 150px;"><u>VALE PROVISIONAL DE CAJA</u></h2>
        <h3 class="text-center" style="font-size: 150px;" id="fecha_vale">Fecha: <strong>${fechaPrestamo.value}</strong></h3>
        <h4 class="text-center" style="font-size: 80px;"><strong>CANTIDAD</strong></h4>
        <p style="font-size: 80px;">***********************************************************</p>
        <p class="text-center" style="font-size: 300px;" id="importe_vale"><span><strong>$ ${formatoMexico(importePrestamo.value)}</strong></span></p>
        <p style="font-size: 80px;">***********************************************************<br></p>
        <h4 class="text-center" style="font-size: 80px;"><strong>CONCEPTO</strong></h4>
        <p style="font-size: 80px;">***********************************************************</p>
        <h2 class="text-center" style="font-size: 180px;" id="concepto_vale"><span><strong>${tipoPrestamo.value} <br>  ${empleadoElegido}</strong></span></h2>
        <p style="font-size: 80px;">***********************************************************</p>
        <h4 class="text-center" style="font-size: 80px;"><strong>FIRMA DE RECIBIDO</strong></h4><br>
        <p class="text-center" style="font-size: 80px; "><br><br><br>_________________________________________________</p>
        </div>`;

        setTimeout(() => {
            window.print();
            setTimeout(() => {
                    window.location.reload();
            }, "800");
        }, "1500");

}

//FUNCION PARA GUARDAR Y EDITAR PRESTAMOS
function guardarAbono(e){    

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardarAbono").prop("disabled", true);
    let formData = new FormData($("#modal_abonos")[0]);

    $.ajax({

        url: "../ajax/abono.ajax.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos){
            Swal.fire({
                icon: 'success',
                title: datos,
                showConfirmButton: false,
                timer: 1500
            })
            
            setTimeout(() => {
                window.location.reload();
            }, "800");
        }

    });

}
    
//FUNCION PARA MOSTRAR LA DEDUA ACTUAL DEL EMPLEADO SEGUN EL EMPLEADO QUE SE ELIJA
function mostrar(idempleado){

    $.post("../ajax/nomina.ajax.php?op=mostrar",{idempleado:idempleado}, function(data, status){

		data = JSON.parse(data);	
		$("#idempleado").val(data.idempleado);
        $("#deuda").val(data.debe);

 	})
}

function mostrarDeudaAbono(idempleadoAbono){

    $.post("../ajax/nomina.ajax.php?op=mostrar",{idempleado:idempleadoAbono}, function(data, status){

		data = JSON.parse(data);	
		$("#idempleadoAbono").val(data.idempleado);
        $("#deudaAbono").val(data.debe);

 	})
}

function mostrarDeuda(idempleadoNomina){
    
    dias.value = "";
    tiempoExtra.value = "";
    tiempoPerdido.value = "";
    ventas.value = "";
    sueldo_dia.value = "";
    abono.value = "";
    total.value = "";

    $.post("../ajax/nomina.ajax.php?op=mostrar",{idempleado:idempleadoNomina}, function(data, status){

		data = JSON.parse(data);	
		$("#idempleadoNomina").val(data.idempleado);
		$("#sueldo_dia").val(data.sueldo_dia);
        $("#deudaNomina").val(data.debe);

 	})
}

//FUNCION PARA GUARDAR Y EDITAR GASTOS
function guardarPrenomina(e){
    

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardarNomina").prop("disabled", true);
    let formData = new FormData($("#modal_prenomina")[0]);
    let empleadoElegido = indexEmpleadoNomina.options[indexEmpleadoNomina.selectedIndex].text;
    let deudaAcutal = parseFloat(deuda.value) - parseFloat(abono.value);

    $.ajax({

        url: "../ajax/nomina.ajax.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

    });   

    $("#modal-prenomina").modal("hide");
   
      contentWrapper.style.display = "none";

        valeCaja.innerHTML = `<div class="col-12">
        <h1 class="text-center" style="font-size: 200px;"><strong>Creaciones Valentina</strong></h1>
        <h2 class="text-center" style="font-size: 150px;"><u>Vale de Nómina</u></h2>
        <h3 class="text-center" style="font-size: 150px;">Fecha: <strong>${fechaPrestamo.value}</strong></h3>
        <p class="text-center" style="font-size: 80px;">***********************************************************</p>
        <h4 class="text-center" style="font-size: 150px;"><strong>Deuda acumulada: $ ${deudaAcutal} </strong></h4>
        <p class="text-center" style="font-size: 80px;">***********************************************************</p>
        <h4 class="text-center" style="font-size: 80px;"><strong>Nómina a nombre de:</strong></h4>
        <h2 class="text-center" style="font-size: 180px;"><span><strong>${empleadoElegido}</strong></span></h2>
        <p class="text-center" style="font-size: 80px;">***********************************************************</p>
        <div class="row">
            <div class="col-6">
              <p class="text-right" style="font-size: 120px;">Días Laborados</p>
              <p class="text-right" style="font-size: 120px;">Tiempo Extra</p>
              <p class="text-right" style="font-size: 120px;">Ventas</p>
              <p class="text-right" style="font-size: 120px;">Abono a Deuda</p>
              <p class="text-right" style="font-size: 120px;">Tiempo Perdido</p>
            </div>
            <div class="col-6">
              <p class="text-left" style="font-size: 120px; padding-left: 100px;">${dias.value}</p>
              <p class="text-left" style="font-size: 120px; padding-left: 100px;">$ ${formatoMexico(tiempoExtra.value)}</p>
              <p class="text-left" style="font-size: 120px; padding-left: 100px;">$ ${formatoMexico(ventas.value)}</p>
              <p class="text-left" style="font-size: 120px; padding-left: 100px;">$ ${formatoMexico(abono.value)}</p>
              <p class="text-left" style="font-size: 120px; padding-left: 100px;">$ ${formatoMexico(tiempoPerdido.value)}</p>
            </div>
            <div class="col-12">
              <p class="text-center" style="font-size: 80px;">***********************************************************<br></p>
              <p class="text-center" style="font-size: 120px;"><strong>Total a Pagar</strong></p>
              <h4 class="text-center" style="font-size: 250px;"><strong>$ ${formatoMexico(total.value)}</strong></h4><br>
              <p class="text-center" style="font-size: 80px;">***********************************************************</p><br><br>
            </div>
        </div>
        <h4 class="text-center" style="font-size: 80px; padding-top: 20px;"><strong>FIRMA DE RECIBIDO</strong></h4><br>
        <p class="text-center" style="font-size: 80px; "><br><br><br>_________________________________________________</p>
      </div>`;

        setTimeout(() => {
            window.print();
            setTimeout(() => {
                window.location.reload();
            }, "800");
        }, "1500");

}

/******************************************************************************
                       FUNCIONES DE ELIMINAR 
*******************************************************************************/
function eliminarNomina(idabononomina){

    Swal.fire({
        title: '¿Está seguro de eliminar este registro?',
        text: "Los registros eliminados ya no se podran recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'btn btn-success',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar registro'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/nomina.ajax.php?op=eliminar", {idabononomina : idabononomina}, function(e){

                Swal.fire(
                    '¡Registro Eliminado!',
                    'EL registro se ha eliminado con éxito.',
                    'success'
                  )
                  window.location.reload();

            });
          
        }
      })

}

function eliminarPrestamo(idprestamo){

    Swal.fire({
        title: '¿Está seguro de eliminar este registro?',
        text: "Los registros eliminados ya no se podran recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'btn btn-success',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar registro'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/prestamo.ajax.php?op=eliminar", {idprestamo : idprestamo}, function(e){

                Swal.fire(
                    '¡Registro Eliminado!',
                    'EL registro se ha eliminado con éxito.',
                    'success'
                  )
                  window.location.reload();

            });
          
        }
      })

}

function eliminarAbono(idabono){

    Swal.fire({
        title: '¿Está seguro de eliminar este registro?',
        text: "Los registros eliminados ya no se podran recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'btn btn-success',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar registro'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/abono.ajax.php?op=eliminar", {idabono : idabono}, function(e){

                Swal.fire(
                    '¡Registro Eliminado!',
                    'EL registro se ha eliminado con éxito.',
                    'success'
                  )
                  window.location.reload();

            });
          
        }
      })

}

function eliminarProveedor(idpagoproveedor){

    Swal.fire({
        title: '¿Está seguro de eliminar este registro?',
        text: "Los registros eliminados ya no se podran recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'btn btn-success',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar registro'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/pagoproveedor.ajax.php?op=eliminar", {idpagoproveedor : idpagoproveedor}, function(e){

                Swal.fire(
                    '¡Registro Eliminado!',
                    'EL registro se ha eliminado con éxito.',
                    'success'
                  )
                  window.location.reload();

            });
          
        }
    })

}

function eliminarGasto(idgasto){

    Swal.fire({
        title: '¿Está seguro de eliminar este registro?',
        text: "Los registros eliminados ya no se podran recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'btn btn-success',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar registro'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/gasto.ajax.php?op=eliminar", {idgasto : idgasto}, function(e){

                Swal.fire(
                    '¡Registro Eliminado!',
                    'EL registro se ha eliminado con éxito.',
                    'success'
                  )
                  window.location.reload();

            });
          
        }
      })

}

function eliminarDeposito(iddeposito){

    Swal.fire({
        title: '¿Está seguro de eliminar este registro?',
        text: "Los registros eliminados ya no se podran recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'btn btn-success',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar registro'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/deposito.ajax.php?op=eliminar", {iddeposito : iddeposito}, function(e){

                Swal.fire(
                    '¡Registro Eliminado!',
                    'EL registro se ha eliminado con éxito.',
                    'success'
                  )
                  window.location.reload();

            });
          
        }
      })

}

function eliminarLiquidacion(idliquidacion){

    Swal.fire({
        title: '¿Está seguro de eliminar este registro?',
        text: "Los registros eliminados ya no se podran recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'btn btn-success',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar registro'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/liquidacion.ajax.php?op=eliminar", {idliquidacion : idliquidacion}, function(e){

                Swal.fire(
                    '¡Registro Eliminado!',
                    'EL registro se ha eliminado con éxito.',
                    'success'
                  )
                  window.location.reload();

            });
          
        }
      })

}

function eliminarNota(idnota){

    Swal.fire({
        title: '¿Está seguro de eliminar este registro?',
        text: "Los registros eliminados ya no se podran recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'btn btn-success',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar registro'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/registro_notas.ajax.php?op=eliminar", {idnota : idnota}, function(e){

                Swal.fire(
                    '¡Registro Eliminado!',
                    'EL registro se ha eliminado con éxito.',
                    'success'
                  )
                  window.location.reload();

            });
          
        }
      })

}

init();