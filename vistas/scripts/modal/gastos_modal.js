const valeCaja = document.getElementById('vale_caja');
const fecha = document.getElementById('fecha');
const concepto = document.getElementById('concepto');
const importe = document.getElementById('importe');
const fechaVale = document.getElementById('fecha_vale');
const conceptoVale = document.getElementById('concepto_vale');
const importeVale = document.getElementById('importe_vale');
const contentWrapper = document.getElementById('content-wrapper');
const botones = document.getElementById('botones');
const cuadrante = document.getElementById('cuadrante');
const resumen = document.getElementById('resumen');
const search = document.getElementById('search');
 
//Funcion que se ejecuta al inicio
function init(){

    $("#modal_gastos").on("submit", function(e){

        guardaryeditar(e);
        
    });


}

//Funcion mayusculas
function mayus(e) {
    e.value = e.value.toUpperCase();
}

//FUNCION PARA GUARDAR Y EDITAR
function guardaryeditar(e){
    

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#modal_gastos")[0]);

    $.ajax({

        url: "../ajax/gasto.ajax.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

    });   

    $("#modal-gastos").modal("hide");

   
      contentWrapper.style.display = "none";

        valeCaja.innerHTML = `<div class="col-12">
        <h1 class="text-center" style="font-size: 200px;"><strong>Creaciones Valentina</strong></h1>
        <h2 class="text-center" style="font-size: 150px;"><u>VALE PROVISIONAL DE CAJA</u></h2>
        <h3 class="text-center" style="font-size: 150px;" id="fecha_vale">Fecha: <strong>${fecha.value}</strong></h3>
        <h4 class="text-center" style="font-size: 80px;"><strong>CANTIDAD</strong></h4>
        <p style="font-size: 80px;">***********************************************************</p>
        <p class="text-center" style="font-size: 300px;" id="importe_vale"><span><strong>$ ${Number(importe.value).toFixed(2)}</strong></span></p>
        <p style="font-size: 80px;">***********************************************************<br></p>
        <h4 class="text-center" style="font-size: 80px;"><strong>CONCEPTO</strong></h4>
        <p style="font-size: 80px;">***********************************************************</p>
        <h2 class="text-center" style="font-size: 180px;" id="concepto_vale"><span><strong>${concepto.value}</strong></span></h2>
        <p style="font-size: 80px;">***********************************************************</p>
        <h4 class="text-center" style="font-size: 80px;"><strong>FIRMA DE RECIBIDO</strong></h4><br><br><br>
        <p class="text-center" style="font-size: 80px; "><br><br><br>_________________________________________________</p>
        </div>`;

        setTimeout(() => {
            window.print();
            setTimeout(() => {
                    window.location.reload();
            }, "800");
        }, "1500");

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

init();