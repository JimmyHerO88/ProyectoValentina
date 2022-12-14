<?php

require_once "../modelos/Abono.php";

$abono = new Abono();

$idabono = isset($_POST["idabono"])? limpiarCadena($_POST["idabono"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";
$idempleado = isset($_POST["idempleado"])? limpiarCadena($_POST["idempleado"]) : "";
$observacion = isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]) : "";
$tipo = isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]) : "";
$importe = isset($_POST["importe"])? limpiarCadena($_POST["importe"]) : "";



switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($idabono)){

            $rspta = $abono->insertar($fecha, $idempleado, $tipo, $importe, $idusuario);
            echo $rspta ? "El abono se ha guardado correctamente" : "El abono no se pudo guardar";

        }else{

            $rspta = $abono->editar($idabono, $fecha, $idempleado, $tipo, $importe, $idusuario);
            echo $rspta ? "El abono se ha modificado correctamente" : "El abono no se pudo modificar";

        }

    break;

    case 'mostrar':

        $rspta = $abono->mostrar($idabono);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $abono->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<a href="vale.php?idabono='.$reg->idabono.'"><button class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i></button></a>
                                    <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idabono.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
                            "1" => $reg->fecha,
                            "2" => $reg->nombre,
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

    case 'selectempleado':

        require_once "../modelos/Empleado.php";
        $empleado = new Empleado();
        $rspta = $empleado->selectempleado();

        while ($reg = $rspta->fetch_object()){

            echo '<option value='.$reg->idempleado.'>'.$reg->nombre.'</option>';
        }

    break;

    case 'eliminar':

        $rspta = $abono->eliminar($idabono);
        echo $rspta ? "Abono eliminado" : "El abono no se puede eliminar";

    break;
    
        
}