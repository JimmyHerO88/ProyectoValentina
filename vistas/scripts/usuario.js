var tabla;

//Funcion que se ejecita al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formularioUsuarios").on("submit", function(e){
        guardaryeditar(e);
    })

    $("#imagenmuestra").hide();
}

//Funcion limpiar
function limpiar(){
    $("#nombre").val("");
	$("#login").val("");
	$("#clave").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
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
					url: '../ajax/usuario.ajax.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}

//FUNCION PARA GUARDAR Y EDITAR
function guardaryeditar(e){

    e.preventDefault();//No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formularioUsuarios")[0]);

    $.ajax({

        url: "../ajax/usuario.ajax.php?op=guardaryeditar",
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
function mostrar(idusuario){

    $.post("../ajax/usuario.ajax.php?op=mostrar",{idusuario : idusuario}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombre").val(data.nombre);
		$("#login").val(data.login);
		$("#clave").val(data.clave);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../"+data.imagen);
		$("#imagenactual").val(data.imagen);
		$("#idusuario").val(data.idusuario);

 	});
}

//FUNCION DESACTIVAR
function desactivar(idusuario){

    //bootbox.confirm("¿Está seguro de desactivar esta categoría?",function(result){

      
        $.post("../ajax/usuario.ajax.php?op=desactivar", {idusuario:idusuario}, function(e){

            //bootbox.alert(e);
            tabla.ajax.reload();
        });
   // })
}

//FUNCION ACTIVAR
function activar(idusuario){

    //bootbox.confirm("¿Está seguro de activar esta categoría?",function(result){

        $.post("../ajax/usuario.ajax.php?op=activar", {idusuario : idusuario}, function(e){

            //bootbox.alert(e);
            tabla.ajax.reload();
        });
    //})
}

//FUNCION ELIMINAR
function eliminar(idusuario){

    bootbox.confirm("¿Está seguro de eliminar este usuario?",function(result){

        if(result){

            $.post("../ajax/usuario.ajax.php?op=eliminar", {idusuario : idusuario}, function(e){

                bootbox.alert(e);
                tabla.ajax.reload();

            });

        }
        
    })

}

init();