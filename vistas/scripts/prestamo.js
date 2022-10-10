var tabla;

//Funcion que se ejecuta al inicio
function init(){

    mostrarform(false);
    listar();

    $("#formulario").on("submit", function(e){

        guardaryeditar(e);

    })

    
    //Cargamos los items de los empleados
    $.post("../ajax/prestamo.ajax.php?op=selectempleado", function(r){
        $("#idempleado").html(r);
        $('#idempleado').selectpicker('refresh');
    });

    //Cargamos el folio
    $.post("../ajax/prestamo.ajax.php?op=contar", function(r){
        $("#folio").html(r);
        $('#folio').value(data.folio);
    });

}

//Funcion mayusculas
function mayus(e) {
    e.value = e.value.toUpperCase();
}

//Funcion limpiar
function limpiar(){

    $("#idprestamo").val("");
    $("#fecha").val("");
    $("#tipo").val("");
    $("#idempleado").val("");
    $("#importe").val("");

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
                    url: '../ajax/prestamo.ajax.php?op=listar',
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

        url: "../ajax/prestamo.ajax.php?op=guardaryeditar",
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
function mostrar(idprestamo){

    $.post("../ajax/prestamo.ajax.php?op=mostrar", {idprestamo:idprestamo}, function(data, status){

        data = JSON.parse(data);
        mostrarform(true);

        $("#idprestamo").val(data.idprestamo);
        $("#tipo").val(data.tipo);
        $("#tipo").selectpicker('refresh');
        $("#idempleado").val(data.idempleado);
        $("#idempleado").selectpicker('refresh');
        $("#fecha").val(data.fecha);
        $("#importe").val(data.importe);
        $("#idusuario").val(data.idusuario);

    })
}

//FUNCION DESACTIVAR
function eliminar(idprestamo){

    bootbox.confirm("¿Está seguro de eliminar este préstamo?",function(result){
      
        if(result){

            $.post("../ajax/prestamo.ajax.php?op=eliminar", {idprestamo : idprestamo}, function(e){

                bootbox.alert(e);
                tabla.ajax.reload();

            });

        }

    })

}

init();