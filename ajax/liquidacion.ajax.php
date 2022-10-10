<?php

require_once "../modelos/Liquidacion.php";

$liquidacion = new Liquidacion();

$idliquidacion = isset($_POST["idliquidacion"])? limpiarCadena($_POST["idliquidacion"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";
$idsucursal = isset($_POST["idsucursal"])? limpiarCadena($_POST["idsucursal"]) : "";
$concepto = isset($_POST["concepto"])? limpiarCadena($_POST["concepto"]) : "";
$importe = isset($_POST["importe"])? limpiarCadena($_POST["importe"]) : "";

switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($idliquidacion)){

            $rspta = $liquidacion->insertar($concepto, $importe, $fecha, $idusuario, $idsucursal);
            echo $rspta ? "La liquidación se ha guardado correctamente" : "La liquidación no se pudo guardar";

        }else{

            $rspta = $liquidacion->editar($idliquidacion, $concepto, $importe, $fecha, $idusuario, $idsucursal);
            echo $rspta ? "La liquidación se ha modificado correctamente" : "La liquidación no se pudo modificar";

        }

    break;

    case 'mostrar':

        $rspta = $liquidacion->mostrar($idliquidacion);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $liquidacion->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idliquidacion.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
                            "1" => $reg->fecha,
                            "2" => $reg->concepto,
                            "3" => '$ '.number_format($reg->importe,2)
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

        $rspta = $liquidacion->eliminar($idliquidacion);
        echo $rspta ? "liquidación eliminada" : "La liquidación no se puede eliminar";

    break;
    
        
}