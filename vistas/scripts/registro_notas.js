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

    $("#idnota").val("");
    $("#fecha").val("");
    $("#rango_folios").val("");
    $("#concepto").val("");
    $("#total").val("");
    $("#cliente").val("");
    $("#tipo_pago").val("");
    $("#observaciones").val("");
    $("#idusuario").val("");


}

//Funcion mostrar formulario
function mostrarform(flag){

    limpiar();

    if(flag){

        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();

    }else{

        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();

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
                    url: '../ajax/registro_notas.ajax.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function(e){
                        console,log(e.responseText);
                    }
                },

        "bDestroy": true,
        "iDisplayLength": 10,//Paginación
        "order": [[1, "desc"]]

    }).DataTable();

}

//FUNCION PARA GUARDAR Y EDITAR
function guardaryeditar(e){

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({

        url: "../ajax/registro_notas.ajax.php?op=guardaryeditar",
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
function mostrar(idnota){

    $.post("../ajax/registro_notas.ajax.php?op=mostrar", {idnota:idnota}, function(data, status){

        data = JSON.parse(data);
        mostrarform(true);

        $("#idnota").val(data.idnota);
        $("#fecha").val(data.fecha);
        $("#rango_folios").val(data.rango_folios);
        $("#concepto").val(data.concepto);
        $("#concepto").selectpicker('refresh');
        $("#total").val(data.total);
        $("#cliente").val(data.cliente);
        $("#tipo_pago").val(data.tipo_pago);
        $("#tipo_pago").selectpicker('refresh');
        $("#observaciones").val(data.observaciones);
        $("#idusuario").val(data.idusuario);

    })
}

//FUNCION DESACTIVAR
function eliminar(idnota){

    bootbox.confirm("¿Está seguro de eliminar este registro de notas?",function(result){
      
        if(result){

            $.post("../ajax/registro_notas.ajax.php?op=eliminar", {idnota : idnota}, function(e){

                bootbox.alert(e);
                tabla.ajax.reload();

            });

        }

    })

}

init();