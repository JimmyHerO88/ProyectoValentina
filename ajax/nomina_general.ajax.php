<?php

require_once "../modelos/Nomina_General.php";

$nomina = new Nomina_General();

switch ($_GET["op"]){

    case 'listar':

        $rspta = $nomina->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<a href="vale.php?idgasto='.$reg->idnomina.'"><button class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i></button></a>
                            <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idnomina.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
                            "1" => $reg->fecha,
                            "2" => $reg->nombre,
                            "3" => $reg->dias,
                            "4" => $reg->t_extra,
							"5" => $reg->ventas,
							"6" => $reg->t_perdido,
							"7" => $reg->a_cuenta,
							"8" => $reg->abono,
							"9" => $reg->mercancia,
                            "10" => $reg->t_general
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

        $rspta = $nomina->eliminar($reg->idnomina);
        echo $rspta ? "Registro de nómina eliminado" : "El registro de nómina no se puede eliminar";

    break;
    
        
}