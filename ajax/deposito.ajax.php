<?php

require_once "../modelos/Deposito.php";

$deposito = new Deposito();

$iddeposito = isset($_POST["iddeposito"])? limpiarCadena($_POST["iddeposito"]) : "";
$tipo = isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$concepto = isset($_POST["concepto"])? limpiarCadena($_POST["concepto"]) : "";
$importe = isset($_POST["importe"])? limpiarCadena($_POST["importe"]) : "";

switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($iddeposito)){

            $rspta = $deposito->insertar($fecha, $concepto, $tipo,  $importe);

            echo $rspta ? "El registro se ha guardado correctamente" : "El registro no se pudo guardar";

        }else{

            $rspta = $deposito->editar($iddeposito, $fecha, $concepto, $tipo, $importe);
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

        $rspta = $deposito->eliminar($iddeposito);
        echo $rspta ? "deposito eliminado" : "El deposito no se puede eliminar";

    break;
    
        
}