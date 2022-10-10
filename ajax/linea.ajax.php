<?php

require_once "../modelos/Linea.php";

$linea = new Linea();

$idlinea = isset($_POST["idlinea"])? limpiarCadena($_POST["idlinea"]) : "";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";

switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($idlinea)){

            $rspta = $linea->insertar($nombre, $idusuario);
            echo $rspta ? "La linea se ha guardado correctamente" : "La linea no se pudo guardar";

        }else{

            $rspta = $linea->editar($idlinea, $nombre, $idusuario);
            echo $rspta ? "La linea se ha modificado correctamente" : "La linea no se pudo modificar";

        }

    break;

    case 'desactivar':

        $rspta = $linea->desactivar($idlinea);
        echo $rspta ? "linea desactivada" : "La linea no se puede desactivar";

    break;

    case 'activar':

        $rspta = $linea->activar($idlinea);
        echo $rspta ? "linea activada" : "La linea no se puede activar";

    break;

    case 'mostrar':

        $rspta = $linea->mostrar($idlinea);
        //Codificar La resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $linea->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idlinea.')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idlinea.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
                            "1" => $reg->nombre,
                            "2"=>($reg->status)?'<button class="btn btn-success btn-xs" onclick="desactivar('.$reg->idlinea.')">Activado</button>':
                            '<button class="btn btn-danger btn-xs" onclick="activar('.$reg->idlinea.')">Desactivado</button>'
                            );
        }
        $results = array(
            "sEcho" => 1, //Informacion para La datatables
            "iTotalRecords" => count($data), //enviamos La total de registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos La total de registros a visializar
            "aaData" => $data
        );

        echo json_encode($results);

    break;

    case 'eliminar':

        $rspta = $linea->eliminar($idlinea);
        echo $rspta ? "linea eliminado" : "La linea no se puede eliminar";

    break;
    
        
}