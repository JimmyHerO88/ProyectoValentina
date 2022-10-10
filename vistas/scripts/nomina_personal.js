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
	$("#sueldo_dia").val("0");
	$("#dias").val("0");
	$("#t_extra").val("0");
	$("#ventas").val("0");
	$("#t_perdido").val("0");
	$("#a_cuenta").val("0");
	$("#abono").val("0");
	$("#mercancia").val("0");
	$("#caja_ahorro").val("0");
	$("#idsucursal").val("");
	$("#idusuario").val("");
	$("#t_general").val("0");

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
					url: '../ajax/nomina_personal.ajax.php?op=listar',
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

        url: "../ajax/nomina_personal.ajax.php?op=guardaryeditar",
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
function mostrar(idempleado){

    $.post("../ajax/nomina_personal.ajax.php?op=mostrar",{idempleado:idempleado}, function(data, status){

		data = JSON.parse(data);		
		mostrarform(true);

		$("#idempleado").val(data.idempleado);
		$("#num_empleado").val(data.num_empleado);
		$("#nombre").val(data.nombre);
		$("#sueldo_dia").val(data.sueldo_dia);

 	})
}

init();