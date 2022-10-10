<?php

require_once "../modelos/Factura.php";

$factura = new Factura();

$idfactura = isset($_POST["idfactura"])? limpiarCadena($_POST["idfactura"]) : "";
$folio = isset($_POST["folio"])? limpiarCadena($_POST["folio"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";
$idsucursal = isset($_POST["idsucursal"])? limpiarCadena($_POST["idsucursal"]) : "";
$importe = isset($_POST["importe"])? limpiarCadena($_POST["importe"]) : "";

switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($idfactura)){

            $rspta = $factura->insertar($folio, $importe, $fecha, $idusuario, $idsucursal);
            echo $rspta ? "El factura se ha guardado correctamente" : "El factura no se pudo guardar";

        }else{

            $rspta = $factura->editar($idfactura, $folio, $importe, $fecha, $idusuario, $idsucursal);
            echo $rspta ? "El factura se ha modificado correctamente" : "El factura no se pudo modificar";

        }

    break;

    case 'mostrar':

        $rspta = $factura->mostrar($idfactura);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $factura->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idfactura.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
                            "1" => $reg->fecha,
                            "2" => $reg->folio,
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

        $rspta = $factura->eliminar($idfactura);
        echo $rspta ? "factura eliminado" : "El factura no se puede eliminar";

    break;
    
        
}