<?php

require_once "../modelos/Prestamo.php";

$prestamo = new Prestamo();

$idprestamo = isset($_POST["idprestamo"])? limpiarCadena($_POST["idprestamo"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";
$idempleado = isset($_POST["idempleado"])? limpiarCadena($_POST["idempleado"]) : "";
$observacion = isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]) : "";
$tipo = isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]) : "";
$importe = isset($_POST["importe"])? limpiarCadena($_POST["importe"]) : "";



switch ($_GET["op"]){

    case 'guardaryeditar':

        if(empty($idprestamo)){

            $rspta = $prestamo->insertar($fecha, $idempleado, $tipo, $importe, $idusuario);
            echo $rspta ? "El préstamo se ha guardado correctamente" : "El préstamo no se pudo guardar";

        }else{

            $rspta = $prestamo->editar($idprestamo, $fecha, $idempleado, $tipo, $importe, $idusuario);
            echo $rspta ? "El préstamo se ha modificado correctamente" : "El préstamo no se pudo modificar";

        }

    break;

    case 'mostrar':

        $rspta = $prestamo->mostrar($idprestamo);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $prestamo->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<a href="vale.php?idprestamo='.$reg->idprestamo.'"><button class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i></button></a>
                                    <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idprestamo.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
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

        $rspta = $prestamo->eliminar($idprestamo);
        echo $rspta ? "Préstamo eliminado" : "El préstamo no se puede eliminar";

    break;
    
        
}