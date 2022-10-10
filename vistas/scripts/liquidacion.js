var tabla;

//Funcion que se ejecuta al inicio
function init(){

    mostrarform(false);
    listar();

    $("#formulario").on("submit", function(e){

        guardaryeditar(e);

    })

}

//Funcion mayusculas
function mayus(e) {
    e.value = e.value.toUpperCase();
}

//Funcion limpiar
function limpiar(){

    $("#idliquidacion").val("");
    $("#fecha").val("");
    $("#concepto").val("");
    $("#importe").val("");
    $("#idusuario").val("");
    $("#idsucursal").val("");


}

//Funcion mostrar formulario
function mostrarform(flag){

    limpiar();

    if(flag){

        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
        $("#Vale").hide();

    }else{

        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
        $("#Vale").hide();

    }

}

//Funcion cancelar formulario
function cancelarform(){

    limpiar();
    mostrarform(false);
}

//Funcion listar
function listar(){

    tabla = $('#tbllistado').dataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip', //Definimos los elementos del control de tabla
        buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        "ajax":
                {
                    url: '../ajax/liquidacion.ajax.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function(e){
                        console,log(e.responseText);
                    }
                },

        "bDestroy": true,
        "iDisplayLength": 20,//Paginación
        "order": [[1, "desc"]]

    }).DataTable();

}

//FUNCION PARA GUARDAR Y EDITAR
function guardaryeditar(e){

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({

        url: "../ajax/liquidacion.ajax.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos){
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }

    });

    limpiar();

}

//FUNCION MOSTRAR
function mostrar(idliquidacion){

    $.post("../ajax/liquidacion.ajax.php?op=mostrar", {idliquidacion:idliquidacion}, function(data, status){

        data = JSON.parse(data);
        mostrarform(true);

        $("#idliquidacion").val(data.idliquidacion);
        $("#fecha").val(data.fecha);
        $("#concepto").val(data.concepto);
        $("#importe").val(data.importe);
        $("#idusuario").val(data.idusuario);
        $("#idsucursal").val(data.idsucursal);

    })
}

//FUNCION DESACTIVAR
function eliminar(idliquidacion){

    bootbox.confirm("¿Está seguro de eliminar esta liquidación?",function(result){
      
        if(result){

            $.post("../ajax/liquidacion.ajax.php?op=eliminar", {idliquidacion : idliquidacion}, function(e){

                bootbox.alert(e);
                tabla.ajax.reload();

            });

        }

    })

}

init();