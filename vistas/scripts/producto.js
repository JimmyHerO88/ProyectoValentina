var tabla;

//Funcion que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

	//Cargamos los items de proveedor
    $.post("../ajax/producto.ajax.php?op=selectProveedor", function(r){
        $("#idproveedor").html(r);
        $('#idproveedor').selectpicker('refresh');
    });

	//Cargamos los items de linea
    $.post("../ajax/producto.ajax.php?op=selectLinea", function(r){
        $("#idlinea").html(r);
        $('#idlinea').selectpicker('refresh');
    });
}

//Funcion mayusculas
function mayus(e) {
    e.value = e.value.toUpperCase();
}

//Funcion limpiar
function limpiar(){

	$("#idproveedor").val("");
	$("#idlinea").val("");
    $("#nombre").val("");
	$("#codigo1").val("");
	$("#codigo2").val("");
	$("#precio1").val("");
	$("#precio2").val("");
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
					url: '../ajax/producto.ajax.php?op=listar',
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
    var formData = new FormData($("#formulario")[0]);

    $.ajax({

        url: "../ajax/producto.ajax.php?op=guardaryeditar",
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
function mostrar(idproducto){

    $.post("../ajax/producto.ajax.php?op=mostrar",{idproducto : idproducto}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#proveedor").val(data.proveedor);
		$("#idsucursal").val(data.idsucursal);
		$("#login").val(data.login);
		$("#clave").val(data.clave);
		$("#idproducto").val(data.idproducto);

 	});
 	$.post("../ajax/producto.ajax.php?op=permisos&id="+idproducto,function(r){
	        $("#permisos").html(r);
	});
}

//FUNCION DESACTIVAR
function desactivar(idproducto){

    //bootbox.confirm("¿Está seguro de desactivar esta categoría?",function(result){

      
        $.post("../ajax/producto.ajax.php?op=desactivar", {idproducto:idproducto}, function(e){

            //bootbox.alert(e);
            tabla.ajax.reload();
        });
   // })
}

//FUNCION ACTIVAR
function activar(idproducto){

    //bootbox.confirm("¿Está seguro de activar esta categoría?",function(result){

        $.post("../ajax/producto.ajax.php?op=activar", {idproducto : idproducto}, function(e){

            //bootbox.alert(e);
            tabla.ajax.reload();
        });
    //})
}

//FUNCION DESACTIVAR
function eliminar(idproducto){

    bootbox.confirm("¿Está seguro de eliminar este producto?",function(result){

        if(result){

            $.post("../ajax/producto.ajax.php?op=eliminar", {idproducto : idproducto}, function(e){

                bootbox.alert(e);
                tabla.ajax.reload();

            });

        }
        
    })

}

init();