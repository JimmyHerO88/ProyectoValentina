var tabla;

//Funcion que se ejecuta al inicio
function init(){

    mostrarform(false);
    listar();

    $("#formulario").on("submit", function(e){

        guardaryeditar(e);

    })

}

//Funcion limpiar
function limpiar(){

    $("#idsucursal").val("");
    $("#razon_social").val("");
    $("#logomuestra").attr("src","");
    $("#logoactual").val("");
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
                    url: '../ajax/sucursal.ajax.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function(e){
                        console,log(e.responseText);
                    }
                },

        "bDestroy": true,
        "iDisplayLength": 10,//Paginación
        "order": [[0, "desc"]]

    }).DataTable();

}

//FUNCION PARA GUARDAR Y EDITAR
function guardaryeditar(e){

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({

        url: "../ajax/sucursal.ajax.php?op=guardaryeditar",
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
function mostrar(idsucursal){

    $.post("../ajax/sucursal.ajax.php?op=mostrar", {idsucursal:idsucursal}, function(data, status){

        data = JSON.parse(data);
        mostrarform(true);

        $("#idsucursal").val(data.idsucursal);
        $("#razon_social").val(data.razon_social);
        $("#logomuestra").show();
        $("#logomuestra").attr("src","../"+data.logo)
        $("#logoactual").val(data.logo);

    })
}

//FUNCION DESACTIVAR
function desactivar(idsucursal){

    //bootbox.confirm("¿Está seguro de desactivar esta categoría?",function(result){

      
        $.post("../ajax/sucursal.ajax.php?op=desactivar", {idsucursal : idsucursal}, function(e){

            //bootbox.alert(e);
            tabla.ajax.reload();
        });
   // })
}

//FUNCION ACTIVAR
function activar(idsucursal){

    //bootbox.confirm("¿Está seguro de activar esta categoría?",function(result){

        $.post("../ajax/sucursal.ajax.php?op=activar", {idsucursal : idsucursal}, function(e){

            //bootbox.alert(e);
            tabla.ajax.reload();
        });
    //})
}

//FUNCION DESACTIVAR
function eliminar(idsucursal){

    bootbox.confirm("¿Está seguro de eliminar esta sucursal?",function(result){

        if(result){

            $.post("../ajax/sucursal.ajax.php?op=eliminar", {idsucursal : idsucursal}, function(e){

                bootbox.alert(e);
                tabla.ajax.reload();

            });

        }

    })

}

init();