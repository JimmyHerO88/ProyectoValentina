<?php

require_once "../modelos/Proveedor.php";

$proveedor = new Proveedor();

$idproveedor = isset($_POST["idproveedor"])? limpiarCadena($_POST["idproveedor"]) : "";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";

switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($idproveedor)){

            $rspta = $proveedor->insertar($nombre, $idusuario);
            echo $rspta ? "La proveedor se ha guardado correctamente" : "La proveedor no se pudo guardar";

        }else{

            $rspta = $proveedor->editar($idproveedor, $nombre, $idusuario);
            echo $rspta ? "La proveedor se ha modificado correctamente" : "La proveedor no se pudo modificar";

        }

    break;

    case 'desactivar':

        $rspta = $proveedor->desactivar($idproveedor);
        echo $rspta ? "proveedor desactivada" : "La proveedor no se puede desactivar";

    break;

    case 'activar':

        $rspta = $proveedor->activar($idproveedor);
        echo $rspta ? "proveedor activada" : "La proveedor no se puede activar";

    break;

    case 'mostrar':

        $rspta = $proveedor->mostrar($idproveedor);
        //Codificar La resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $proveedor->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idproveedor.')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idproveedor.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
                            "1" => $reg->nombre,
                            "2"=>($reg->status)?'<button class="btn btn-success btn-xs" onclick="desactivar('.$reg->idproveedor.')">Activado</button>':
                            '<button class="btn btn-danger btn-xs" onclick="activar('.$reg->idproveedor.')">Desactivado</button>'
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

        $rspta = $proveedor->eliminar($idproveedor);
        echo $rspta ? "proveedor eliminado" : "La proveedor no se puede eliminar";

    break;
    
        
}