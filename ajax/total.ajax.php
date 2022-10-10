<?php

require_once "../modelos/Total.php";

$total = new Total();

$idtotal = isset($_POST["idtotal"])? limpiarCadena($_POST["idtotal"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$total_f = isset($_POST["total_f"])? limpiarCadena($_POST["total_f"]) : "";
$total_r = isset($_POST["total_r"])? limpiarCadena($_POST["total_r"]) : "";
$folio_1 = isset($_POST["folio_1"])? limpiarCadena($_POST["folio_1"]) : "";
$folio_2 = isset($_POST["folio_2"])? limpiarCadena($_POST["folio_2"]) : "";
$total_r = isset($_POST["total_r"])? limpiarCadena($_POST["total_r"]) : "";
$folio_3 = isset($_POST["folio_3"])? limpiarCadena($_POST["folio_3"]) : "";
$folio_4 = isset($_POST["folio_4"])? limpiarCadena($_POST["folio_4"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";
$idsucursal = isset($_POST["idsucursal"])? limpiarCadena($_POST["idsucursal"]) : "";
$nota = isset($_POST["nota"])? limpiarCadena($_POST["nota"]) : "";

switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($idtotal)){

            $rspta = $total->insertar($fecha, $total_f, $folio_1, $folio_2, $total_r, $folio_3, $folio_4, $nota, $idusuario, $idsucursal);
            echo $rspta ? "El total se ha guardado correctamente" : "El total no se pudo guardar";

        }else{

            $rspta = $total->editar($idtotal, $fecha, $total_f, $folio_1, $folio_2, $total_r, $folio_3, $folio_4, $nota, $idusuario, $idsucursal);
            echo $rspta ? "El total se ha modificado correctamente" : "El total no se pudo modificar";

        }

    break;

    case 'mostrar':

        $rspta = $total->mostrar($idtotal);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $total->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idtotal.')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                    <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idtotal.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
                            "1" => $reg->fecha,
                            "2" => '$ '.number_format($reg->total_f,2),
                            "3" => $reg->folio_1.' - '.$reg->folio_2,
                            "4" => '$ '.number_format($reg->total_r,2),
                            "5" => $reg->folio_3.' - '.$reg->folio_4,
                            "6" => $reg->nota
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

        $rspta = $total->eliminar($idtotal);
        echo $rspta ? "Total eliminado" : "El total no se puede eliminar";

    break;
    
        
}