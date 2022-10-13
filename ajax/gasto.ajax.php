<?php

require_once "../modelos/Gasto.php";

$gasto = new Gasto();

$idgasto = isset($_POST["idgasto"])? limpiarCadena($_POST["idgasto"]) : "";
$tipo = isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$concepto = isset($_POST["concepto"])? limpiarCadena($_POST["concepto"]) : "";
$importe = isset($_POST["importe"])? limpiarCadena($_POST["importe"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";

switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($idgasto)){

            $rspta = $gasto->insertar($fecha, $concepto, $tipo, $importe, $idusuario);

            echo $rspta ? "El registro se ha guardado correctamente" : "El registro no se pudo guardar";

        }else{

            $rspta = $gasto->editar($idgasto, $fecha, $concepto, $tipo, $importe, $idusuario);
            echo $rspta ? "El gasto se ha modificado correctamente" : "El gasto no se pudo modificar";

        }

    break;

    case 'mostrar':

        $rspta = $gasto->mostrar($idgasto);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $gasto->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<a href="vale.php?idgasto='.$reg->idgasto.'"><button class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i></button></a>
                            <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idgasto.')"><i class="fa fa-times" aria-hidden="true"></i></button>
                            <button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idgasto.')"><i class="fas fa-edit"></i></button>',
                            "1" => $reg->fecha,
                            "2" => $reg->concepto,
                            "3" => $reg->tipo,
                            "4" => '$ '.number_format($reg->importe,2)
                            );
        }
        $results = array(
            "sEcho" => 1, //Informacion para el datatables
            "iTotalRecords" => count($data), //enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visializar
            "aaData" => $data
        );

        echo json_encode($results);

    break;

    case 'eliminar':

        $rspta = $gasto->eliminar($idgasto);
        echo $rspta ? "Gasto eliminado" : "El gasto no se puede eliminar";

    break;
    
        
}