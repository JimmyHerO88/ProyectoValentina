var tabla;

//Funcion que se ejecuta al inicio
function init(){

	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

}

//Funcion mayusculas
function mayus(e) {
    e.value = e.value.toUpperCase();
}

//Funcion limpiar
function limpiar(){

    $("#num_empleado").val("");
	$("#nombre").val("");
	$("#sueldo_dia").val("");
	$("#domicilio").val("");
	$("#fecha_nacimiento").val("");
	$("#fecha_contrato").val("");
	$("#fotomuestra").attr("src","");
	$("#fotoactual").val("");
	$("#ine_frentemuestra").attr("src","");
	$("#ine_frenteactual").val("");
	$("#ine_reversomuestra").attr("src","");
	$("#ine_reversoactual").val("");
	$("#tel_1").val("");
	$("#tel_2").val("");
	$("#tel_3").val("");
	$("#tel_4").val("");
	$("#idsucursal").val("");
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
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/empleado.ajax.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 15,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}

//FUNCION PARA GUARDAR Y EDITAR
function guardaryeditar(e){

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({

        url: "../ajax/empleado.ajax.php?op=guardaryeditar",
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

    $.post("../ajax/empleado.ajax.php?op=mostrar",{idempleado:idempleado}, function(data, status){

		data = JSON.parse(data);		
		mostrarform(true);

		$("#idempleado").val(data.idempleado);

		$("#num_empleado").val(data.num_empleado);
		$("#nombre").val(data.nombre);
		$("#sueldo_dia").val(data.sueldo_dia);
		$("#domicilio").val(data.domicilio);
		$("#fecha_nacimiento").val(data.fecha_nacimiento);
		$("#fecha_contrato").val(data.fecha_contrato);

		$("#fotomuestra").show();
		$("#fotomuestra").attr("src","../"+data.foto);
		$("#fotoactual").val(data.foto);
		
		$("#ine_frentemuestra").show();
		$("#ine_frentemuestra").attr("src","../"+data.ine_frente);
		$("#ine_frente_actual").val(data.ine_frente);
		
		$("#ine_reversomuestra").show();
		$("#ine_reversomuestra").attr("src","../"+data.ine_reverso);
		$("#ine_reverso_actual").val(data.ine_reverso);

		$("#tel_1").val(data.tel_1);
		$("#tel_2").val(data.tel_2);
		$("#tel_3").val(data.tel_3);
		$("#tel_4").val(data.tel_4);
		$("#idsucursal").val(data.idsucursal);
		$("#idusuario").val(data.idusuario);

 	})
}

//FUNCION DESACTIVAR
function desactivar(idempleado){

    //bootbox.confirm("¿Está seguro de desactivar esta categoría?",function(result){

      
        $.post("../ajax/empleado.ajax.php?op=desactivar", {idempleado:idempleado}, function(e){

            //bootbox.alert(e);
            tabla.ajax.reload();
        });
   // })
}

//FUNCION ACTIVAR
function activar(idempleado){

    //bootbox.confirm("¿Está seguro de activar esta categoría?",function(result){

        $.post("../ajax/empleado.ajax.php?op=activar", {idempleado:idempleado}, function(e){

            //bootbox.alert(e);
            tabla.ajax.reload();
        });
    //})
}

//FUNCION eliminar
function eliminar(idempleado){

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
            $.post("../ajax/empleado.ajax.php?op=eliminar", {idempleado : idempleado}, function(e){

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