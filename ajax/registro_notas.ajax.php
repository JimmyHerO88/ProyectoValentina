<?php

require_once "../modelos/Registro_Notas.php";

$nota = new Registro_Notas();

$idnota = isset($_POST["idnota"])? limpiarCadena($_POST["idnota"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$rango_folios = isset($_POST["rango_folios"])? limpiarCadena($_POST["rango_folios"]) : "";
$concepto = isset($_POST["concepto"])? limpiarCadena($_POST["concepto"]) : "";
$total = isset($_POST["total"])? limpiarCadena($_POST["total"]) : "";
$cliente = isset($_POST["cliente"])? limpiarCadena($_POST["cliente"]) : "";
$tipo_pago = isset($_POST["tipo_pago"])? limpiarCadena($_POST["tipo_pago"]) : "";
$observaciones = isset($_POST["observaciones"])? limpiarCadena($_POST["observaciones"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";

switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($idnota)){

            $rspta = $nota->insertar($fecha,$rango_folios,$concepto,$total,$cliente,$tipo_pago,$observaciones,$idusuario);
            echo $rspta ? "El rango de notas se ha guardado correctamente" : "El rango de notas no se pudo guardar";

        }else{

            $rspta = $nota->editar($idnota,$fecha,$rango_folios,$concepto,$total,$cliente,$tipo_pago,$observaciones,$idusuario);
            echo $rspta ? "El rango de notas se ha modificado correctamente" : "El rango de notas no se pudo modificar";

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
                            "0" =>'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idnota.')"><i class="fas fa-edit" aria-hidden="true"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idnota.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
                            "1" => $reg->fecha,
                            "2" => $reg->rango_folios,
                            "3" => $reg->concepto,
                            "4" => '$ '.number_format($reg->total,2),
                            "5" => $reg->cliente,
                            "6" => $reg->tipo_pago,
                            "7" => $reg->observaciones
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
        echo $rspta ? "Rango de notas eliminado" : "El rango de notas no se puede eliminar";

    break;
    
        
}