<?php

require_once "../modelos/NotaCredito.php";

$nota = new NotaCredito();

$idnota = isset($_POST["idnota"])? limpiarCadena($_POST["idnota"]) : "";
$folio = isset($_POST["folio"])? limpiarCadena($_POST["folio"]) : "";
$cliente = isset($_POST["cliente"])? limpiarCadena($_POST["cliente"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";
$idsucursal = isset($_POST["idsucursal"])? limpiarCadena($_POST["idsucursal"]) : "";
$abono = isset($_POST["abono"])? limpiarCadena($_POST["abono"]) : "";
$importe = isset($_POST["importe"])? limpiarCadena($_POST["importe"]) : "";

switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($idnota)){

            $rspta = $nota->insertar($folio, $cliente, $importe, $abono, $fecha, $idusuario, $idsucursal);
            echo $rspta ? "La nota se ha guardado correctamente" : "La nota no se pudo guardar";

        }else{

            $rspta = $nota->editar($idnota, $folio, $cliente, $importe, $abono, $fecha, $idusuario, $idsucursal);
            echo $rspta ? "La nota se ha modificado correctamente" : "La nota no se pudo modificar";

        }

    break;

    case 'mostrar':

        $rspta = $nota->mostrar($idnota);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $nota->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idnota.')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                    <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idnota.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
                            "1" => $reg->fecha,
                            "2" => $reg->folio,
                            "3" => $reg->cliente,
                            "4" => '$ '.number_format($reg->importe,2),
                            "5" => '$ '.number_format($reg->abono,2),
                            "6" => '$ '.number_format($reg->abono - $reg->importe,2)
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

        $rspta = $nota->eliminar($idnota);
        echo $rspta ? "nota eliminada" : "La nota no se puede eliminar";

    break;
    
        
}