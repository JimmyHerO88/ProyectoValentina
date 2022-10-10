<?php

require_once "../modelos/Consultas.php";

$consulta = new Consultas();

switch ($_GET["op"]){

    case 'gastosfecha':

        $fecha_inicio = $_REQUEST["fecha_inicio"];
        $fecha_fin = $_REQUEST["fecha_fin"];

        $rspta = $consulta->gastosfecha($fecha_inicio,$fecha_fin);
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" => $reg->fecha,
                            "1" => $reg->concepto,
                            "2" => $reg->tipo,
                            "3" => number_format($reg->importe,2)
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

    case 'ingresosfecha':

        $fecha_inicio = $_REQUEST["fecha_inicio"];
        $fecha_fin = $_REQUEST["fecha_fin"];

        $rspta = $consulta->ingresosfecha($fecha_inicio,$fecha_fin);
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" => $reg->fecha,
                            "1" => $reg->concepto,
                            "2" => $reg->tipo,
                            "3" => number_format($reg->importe,2)
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

    case 'listas_precios':

        $rspta = $consulta->listas_precios();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" => $reg->linea,
                            "1" => $reg->codigo1,
                            "2" => $reg->nombre,
                            "3" => '$ '.number_format($reg->precio1,2),
                            "4" => '$ '.number_format($reg->precio2,2)
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
    
        
}