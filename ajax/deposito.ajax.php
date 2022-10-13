<?php

require_once "../modelos/Deposito.php";

$deposito = new Deposito();

$iddeposito = isset($_POST["iddeposito"])? limpiarCadena($_POST["iddeposito"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";
$idsucursal = isset($_POST["idsucursal"])? limpiarCadena($_POST["idsucursal"]) : "";
$nombre_deposito = isset($_POST["nombre_deposito"])? limpiarCadena($_POST["nombre_deposito"]) : "";
$observacion = isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]) : "";
$importe = isset($_POST["importe"])? limpiarCadena($_POST["importe"]) : "";
$tipo = isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]) : "";
$cant1 = isset($_POST["cant1"])? limpiarCadena($_POST["cant1"]) : "";
$cant2 = isset($_POST["cant2"])? limpiarCadena($_POST["cant2"]) : "";
$cant3 = isset($_POST["cant3"])? limpiarCadena($_POST["cant3"]) : "";
$cant4 = isset($_POST["cant4"])? limpiarCadena($_POST["cant4"]) : "";
$cant5 = isset($_POST["cant5"])? limpiarCadena($_POST["cant5"]) : "";
$cant6 = isset($_POST["cant6"])? limpiarCadena($_POST["cant6"]) : "";
$cant7 = isset($_POST["cant7"])? limpiarCadena($_POST["cant7"]) : "";
$concepto = $nombre_deposito . '  ' . $observacion;

switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($iddeposito)){

            $rspta = $deposito->insertar($tipo, $concepto, $importe, $cant1, $cant2, $cant3, $cant4, $cant5, $cant6, $cant7, $fecha, $idusuario, $idsucursal);
            echo $rspta ? "El deposito se ha guardado correctamente" : "El deposito no se pudo guardar";

        }else{

            $rspta = $deposito->editar($iddeposito, $tipo, $concepto, $importe, $cant1, $cant2, $cant3, $cant4, $cant5, $cant6, $cant7, $fecha, $idusuario, $idsucursal);
            echo $rspta ? "El deposito se ha modificado correctamente" : "El deposito no se pudo modificar";

        }

    break;

    case 'mostrar':

        $rspta = $deposito->mostrar($iddeposito);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $deposito->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<a href="vale.php?iddeposito='.$reg->iddeposito.'"><button class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i></button></a>
                            <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->iddeposito.')"><i class="fa fa-times" aria-hidden="true"></i></button>
                            <button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->iddeposito.')"><i class="fas fa-edit"></i></button>',
                            "1" => $reg->fecha,
                            "2" => $reg->tipo,
                            "3" => $reg->concepto,
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

        $rspta = $deposito->eliminar($iddeposito);
        echo $rspta ? "deposito eliminado" : "El deposito no se puede eliminar";

    break;
    
        
}