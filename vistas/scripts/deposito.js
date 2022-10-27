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

    $("#iddeposito").val("");
    $("#fecha").val("");
    $("#tipo").val("");
    $("#observacion").val("");
    $("#importe").val("");
    $("#usuario").val("");
    $("#idusuario").val("");
    $("#idsucursal").val("");
    $("#cant1").val(0);
    $("#cant2").val(0);
    $("#cant3").val(0);
    $("#cant4").val(0);
    $("#cant5").val(0);
    $("#cant6").val(0);
    $("#cant7").val(0);
    $("#resultado1").val("");
    $("#resultado2").val("");
    $("#resultado3").val("");
    $("#resultado4").val("");
    $("#resultado5").val("");
    $("#resultado6").val("");
    $("#resultado7").val("");

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
                    url: '../ajax/deposito.ajax.php?op=listar',
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

        url: "../ajax/deposito.ajax.php?op=guardaryeditar",
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
            
            mostrarform(false);
            tabla.ajax.reload();
        }

    });

    limpiar();

}

//FUNCION MOSTRAR
function mostrar(iddeposito){

    $.post("../ajax/deposito.ajax.php?op=mostrar", {iddeposito:iddeposito}, function(data, status){

        data = JSON.parse(data);
        mostrarform(true);

        $("#iddeposito").val(data.iddeposito);
        $("#tipo").val(data.tipo);
        $("#fecha").val(data.fecha);
        $("#observacion").val(data.concepto);
        $("#importe").val(data.importe);
        $("#cant1").val(data.cant1);
        $("#cant2").val(data.cant2);
        $("#cant3").val(data.cant3);
        $("#cant4").val(data.cant4);
        $("#cant5").val(data.cant5);
        $("#cant6").val(data.cant6);
        $("#cant7").val(data.cant7);
        $("#idusuario").val(data.idusuario);

    })
}

//FUNCION DESACTIVAR
function eliminar(iddeposito){

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
                tabla.ajax.reload();

            });
          
        }
      })

}

init();