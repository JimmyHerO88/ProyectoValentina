<?php

session_start();
require_once "../modelos/Nomina_Piezas.php";

$nomina = new Nomina_piezas();

$idempleado = isset($_POST["idempleado"])? limpiarCadena($_POST["idempleado"]) : "";
$fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]) : "";
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

			if(!empty($a_cuenta)){
			require_once "../modelos/Abono.php";
			$abonos = new Abono();
			$rspta= $abonos->insertar($fecha, $idempleado, $tipo_ac, $a_cuenta, $idusuario);
			}

			if(!empty($abono)){
				require_once "../modelos/Abono.php";
				$abonos = new Abono();
				$rspta= $abonos->insertar($fecha, $idempleado, $tipo_abono, $abono, $idusuario);
			}

			$rspta=$nomina->insertar($fecha, $idempleado, $t_extra, $ventas, $t_perdido, $a_cuenta, $abono, $mercancia, $caja_ahorro, $t_general, $idusuario, $idsucursal);
			echo $rspta ? "Nómina registrada" : "No se pudieron registrar todos los datos de la nómina";

			

    break;

    case 'mostrar':

        $rspta = $nomina->mostrar($idempleado);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta=$nomina->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-success btn-sm" onclick="mostrar('.$reg->idempleado.')"><i class="fa fa-plus" aria-hidden="true"></i></button>',
				"1"=>$reg->nombre
 				);
 		}

 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;
    
        
}