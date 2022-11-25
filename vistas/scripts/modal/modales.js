//VARIABLES GENERALES
const contentWrapper = document.getElementById('content-wrapper');
const botones = document.getElementById('botones');
const cuadrante = document.getElementById('cuadrante');
const resumen = document.getElementById('resumen');
const search = document.getElementById('search');
//VARIABLES DE GASTOS
const valeCaja = document.getElementById('vale_caja');
const fecha = document.getElementById('fecha');
const concepto = document.getElementById('concepto');
const importe = document.getElementById('importe');
const fechaVale = document.getElementById('fecha_vale');
const conceptoVale = document.getElementById('concepto_vale');
const importeVale = document.getElementById('importe_vale');
//VARIABLES DE PRESATMOS
const indexEmpleado = document.modal_prestamos.idempleado.selectedIndex;
const importePrestamo = document.getElementById('importe_prestamo');
const fechaPrestamo = document.getElementById('fecha_prestamo');
const tipoPrestamo = document.getElementById('tipo_prestamo');
//VARIABLES DE DEPOSITOS
const valeDepo = document.getElementById('vale_deposito');
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

    //Cargamos los items de los empleados
    $.post("../ajax/prestamo.ajax.php?op=selectempleado", function(r){
        $("#idempleado").html(r);
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
    $("#modal-depositos").modal("hide");

   
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

    $("#modal-gastos").modal("hide");
    $("#modal-depositos").modal("hide");

   
        contentWrapper.style.display = "none";

        valeDepo.innerHTML = `  <div class="col-12 text-center">
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
    let empleadoElegido = document.modal_prestamos.idempleado.options[indexEmpleado].text;

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
        <h2 class="text-center" style="font-size: 180px;" id="concepto_vale"><span><strong>${tipoPrestamo.value} a  ${empleadoElegido}</strong></span></h2>
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

init();