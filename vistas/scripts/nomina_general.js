var tabla;

//Funcion que se ejecuta al inicio
function init(){

    listar();

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
                    url: '../ajax/nomina_general.ajax.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function(e){
                        console,log(e.responseText);
                    }
                },

        "bDestroy": true,
        "iDisplayLength": 25,//Paginación
        "order": [[1, "desc"]]

    }).DataTable();

}

//FUNCION eliminar
function eliminar(idnomina){

    bootbox.confirm("¿Está seguro de eliminar este registro?",function(result){
      
        if(result){

            $.post("../ajax/nomina_general.ajax.php?op=eliminar", {idnomina : idnomina}, function(e){

                bootbox.alert(e);
                tabla.ajax.reload();

            });

        }

    })

}

init();