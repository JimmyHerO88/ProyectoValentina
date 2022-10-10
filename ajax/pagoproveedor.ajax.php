<?php

require_once "../modelos/PagoProveedor.php";

$pagoproveedor = new PagoProveedor();

$idpagoproveedor = isset($_POST["idpagoproveedor"])? limpiarCadena($_POST["idpagoproveedor"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";
$idsucursal = isset($_POST["idsucursal"])? limpiarCadena($_POST["idsucursal"]) : "";
$concepto = isset($_POST["concepto"])? limpiarCadena($_POST["concepto"]) : "";
$importe = isset($_POST["importe"])? limpiarCadena($_POST["importe"]) : "";

switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($idpagoproveedor)){

            $rspta = $pagoproveedor->insertar($concepto, $importe, $fecha, $idusuario, $idsucursal);
            echo $rspta ? "El pago se ha guardado correctamente" : "El pago no se pudo guardar";

        }else{

            $rspta = $pagoproveedor->editar($idpagoproveedor, $concepto, $importe, $fecha, $idusuario, $idsucursal);
            echo $rspta ? "El pago se ha modificado correctamente" : "El pago no se pudo modificar";

        }

    break;

    case 'mostrar':

        $rspta = $pagoproveedor->mostrar($idpagoproveedor);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $pagoproveedor->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idpagoproveedor.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
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

        $rspta = $pagoproveedor->eliminar($idpagoproveedor);
        echo $rspta ? "Pago eliminado" : "El pago no se puede eliminar";

    break;
    
        
}