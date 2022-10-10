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

    $("#idtotal").val("");
    $("#fecha").val("");
    $("#total_f").val("");
    $("#total_r").val("");
    $("#folio_1").val("");
    $("#folio_2").val("");
    $("#folio_3").val("");
    $("#folio_4").val("");
    $("#nota").val("");
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
                    url: '../ajax/total.ajax.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function(e){
                        console,log(e.responseText);
                    }
                },

        "bDestroy": true,
        "iDisplayLength": 5,//Paginación
        "order": [[1, "desc"]]

    }).DataTable();

}

//FUNCION PARA GUARDAR Y EDITAR
function guardaryeditar(e){

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({

        url: "../ajax/total.ajax.php?op=guardaryeditar",
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
function mostrar(idtotal){

    $.post("../ajax/total.ajax.php?op=mostrar", {idtotal:idtotal}, function(data, status){

        data = JSON.parse(data);
        mostrarform(true);

        $("#idtotal").val(data.idtotal);
        $("#fecha").val(data.fecha);
        $("#total_f").val(data.total_f);
        $("#total_r").val(data.total_r);
        $("#folio_1").val(data.folio_1);
        $("#folio_2").val(data.folio_2);
        $("#folio_3").val(data.folio_3);
        $("#folio_4").val(data.folio_4);
        $("#nota").val(data.nota);
        $("#idusuario").val(data.idusuario);
        $("#idsucursal").val(data.idsucursal);

    })
}

//FUNCION DESACTIVAR
function eliminar(idtotal){

    bootbox.confirm("¿Está seguro de eliminar este total?",function(result){
      
        if(result){

            $.post("../ajax/total.ajax.php?op=eliminar", {idtotal : idtotal}, function(e){

                bootbox.alert(e);
                tabla.ajax.reload();

            });

        }

    })

}

init();