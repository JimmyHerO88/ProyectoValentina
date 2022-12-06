<?php

require_once "../modelos/Nomina.php";

$nomina = new Nomina();

$idempleado = isset($_POST["idempleado"])? limpiarCadena($_POST["idempleado"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
$dias = isset($_POST["dias"])? limpiarCadena($_POST["dias"]) : "";
$sueldo_dia = isset($_POST["sueldo_dia"])? limpiarCadena($_POST["sueldo_dia"]) : "";
$t_extra = isset($_POST["t_extra"])? limpiarCadena($_POST["t_extra"]) : "";
$ventas = isset($_POST["ventas"])? limpiarCadena($_POST["ventas"]) : "";
$t_perdido = isset($_POST["t_perdido"])? limpiarCadena($_POST["t_perdido"]) : "";
$a_cuenta = isset($_POST["a_cuenta"])? limpiarCadena($_POST["a_cuenta"]) : "";
$abono = isset($_POST["abono"])? limpiarCadena($_POST["abono"]) : "";
$mercancia = isset($_POST["mercancia"])? limpiarCadena($_POST["mercancia"]) : "";
$caja_ahorro = isset($_POST["caja_ahorro"])? limpiarCadena($_POST["caja_ahorro"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";
$idsucursal = isset($_POST["idsucursal"])? limpiarCadena($_POST["idsucursal"]) : "";
$t_general = isset($_POST["t_general"])? limpiarCadena($_POST["t_general"]) : "";
$tipo_abono = "ABONO A PRESTAMO";
$tipo_ac = "LIQ. ADELANTO DE NOMINA";

switch ($_GET["op"]){

    case 'guardaryeditar':

        /* if(!empty($a_cuenta)){
        require_once "../modelos/Abono.php";
        $abonos = new Abono();
        $rspta= $abonos->insertar($fecha, $idempleado, $tipo_ac, $a_cuenta, $idusuario);
        }

        if(!empty($abono)){
            require_once "../modelos/Abono.php";
            $abonos = new Abono();
            $rspta= $abonos->insertar($fecha, $idempleado, $tipo_abono, $abono, $idusuario);
        } */

        $rspta=$nomina->insertar($fecha, $idempleado, $dias, $t_extra, $ventas, $t_perdido, $a_cuenta, $abono, $mercancia, $caja_ahorro, $t_general, $idusuario, $idsucursal);
        echo $rspta ? "Nómina registrada" : "No se pudieron registrar todos los datos de la nómina";

    break;

    case 'listar':

        $rspta = $nomina->listar();
        //Se declara un array
        $data = Array();

        while ($reg=$rspta->fetch_object()){
            $data[] = array(
                            "0" =>'<a href="vale.php?idnomina='.$reg->idnomina.'"><button class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i></button></a>
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

        $rspta = $nomina->eliminar($idnomina);
        echo $rspta ? "Registro eliminado" : "El registro no se puede eliminar";

    break;

    case 'selectEmpleado':

        require_once "../modelos/Empleado.php";
        $empleado = new Empleado();
        $rspta = $empleado->select();

        while ($reg = $rspta->fetch_object()){

            echo '<option value='.$reg->idempleado.'>'.$reg->nombre.'</option>';
        }

    break;

    case 'sueldoEmpleado':
        require_once "../modelos/Empledao.php";
        $empleado = new Empledao();
        $rspta = $empleado->sueldo();

        echo $rspta->sueldo_dia;    
        
}