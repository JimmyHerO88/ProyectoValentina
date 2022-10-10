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

	$("#nombre").val("");
	$("#domicilio").val("");
	$("#tel_1").val("");
	$("#tel_2").val("");
	$("#email_1").val("");
	$("#email_2").val("");
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
					url: '../ajax/cliente.ajax.php?op=listar',
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

        url: "../ajax/cliente.ajax.php?op=guardaryeditar",
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
function mostrar(idcliente){

    $.post("../ajax/cliente.ajax.php?op=mostrar",{idcliente:idcliente}, function(data, status){

		data = JSON.parse(data);		
		mostrarform(true);

		$("#idcliente").val(data.idcliente);
		$("#nombre").val(data.nombre);
		$("#domicilio").val(data.domicilio);
		$("#tel_1").val(data.tel_1);
		$("#tel_2").val(data.tel_2);
		$("#email_1").val(data.email_1);
		$("#email_2").val(data.email_2);
		$("#idusuario").val(data.idusuario);

 	})
}

//FUNCION DESACTIVAR
function desactivar(idcliente){

    //bootbox.confirm("¿Está seguro de desactivar esta categoría?",function(result){

      
        $.post("../ajax/cliente.ajax.php?op=desactivar", {idcliente:idcliente}, function(e){

            //bootbox.alert(e);
            tabla.ajax.reload();
        });
   // })
}

//FUNCION ACTIVAR
function activar(idcliente){

    //bootbox.confirm("¿Está seguro de activar esta categoría?",function(result){

        $.post("../ajax/cliente.ajax.php?op=activar", {idcliente:idcliente}, function(e){

            //bootbox.alert(e);
            tabla.ajax.reload();
        });
    //})
}

//FUNCION DESACTIVAR
function eliminar(idcliente){

    bootbox.confirm("¿Está seguro de eliminar este cliente?",function(result){

        if(result){

            $.post("../ajax/cliente.ajax.php?op=eliminar", {idcliente:idcliente}, function(e){

                bootbox.alert(e);
                tabla.ajax.reload();

            });

        }
        
    })

}

init();