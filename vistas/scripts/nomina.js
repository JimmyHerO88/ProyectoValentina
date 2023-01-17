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

}





//Funcion limpiar
function limpiar(){
	$("#idempleado").val("");
	$("#sueldo_dia").val("");
	$("#dias").val("");
	$("#t_extra").val("");
	$("#ventas").val("");
	$("#t_perdido").val("");
	$("#deuda").val("");
	$("#abono").val("");
	$("#idsucursal").val("");
	$("#idusuario").val("");
	$("#t_general").val("");

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
                    url: '../ajax/nomina.ajax.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function(e){
                        console.log(e.responseText);
                    }
                },

        "bDestroy": true,
        "iDisplayLength": 25,//Paginación
        "order": [[1, "desc"]]

    }).DataTable();

}

//FUNCION PARA GUARDAR Y EDITAR
function guardaryeditar(e){

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({

        url: "../ajax/nomina.ajax.php?op=guardaryeditar",
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
function mostrar(idempleado){

    $.post("../ajax/nomina.ajax.php?op=mostrar",{idempleado:idempleado}, function(data, status){

		data = JSON.parse(data);		
		mostrarform(true);

		$("#idempleado").val(data.idempleado);
		/* $("#num_empleado").val(data.num_empleado);
		$("#nombre").val(data.nombre); */
		$("#sueldo_dia").val(data.sueldo_dia);
        $("#deuda").val(data.debe);

 	})
}

//FUNCION eliminar
function eliminar(idabononomina){

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
                tabla.ajax.reload();

            });
          
        }
      })

}

init();