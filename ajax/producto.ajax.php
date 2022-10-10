<?php

session_start();
require_once "../modelos/Producto.php";

$producto = new Producto();

$idproducto = isset($_POST["idproducto"])? limpiarCadena($_POST["idproducto"]) : "";
$codigo1 = isset($_POST["codigo1"])? limpiarCadena($_POST["codigo1"]) : "";
$codigo2 = isset($_POST["codigo2"])? limpiarCadena($_POST["codigo2"]) : "";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]) : "";
$idproveedor = isset($_POST["idproveedor"])? limpiarCadena($_POST["idproveedor"]) : "";
$idlinea = isset($_POST["idlinea"])? limpiarCadena($_POST["idlinea"]) : "";
$precio1 = isset($_POST["precio1"])? limpiarCadena($_POST["precio1"]) : "";
$precio2 = isset($_POST["precio2"])? limpiarCadena($_POST["precio2"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";


switch ($_GET["op"]){

    case 'guardaryeditar':

        if (empty($idproducto)){
			$rspta=$producto->insertar($codigo1, $codigo2, $nombre, $idproveedor, $idlinea, $precio1, $precio2, $idusuario);
			echo $rspta ? "producto registrado" : "No se pudieron registrar todos los datos del producto";
		}
		else {
			$rspta=$producto->editar($idproducto,$codigo1, $codigo2, $nombre, $idproveedor, $idlinea, $precio1, $precio2, $idusuario);
			echo $rspta ? "producto actualizado" : "producto no se pudo actualizar";
		}

    break;

    case 'desactivar':

        $rspta = $producto->desactivar($idproducto);
        echo $rspta ? "producto desactivado" : "El producto no se puede desactivar";

    break;

    case 'activar':

        $rspta = $producto->activar($idproducto);
        echo $rspta ? "producto activado" : "El producto no se puede activar";

    break;

    case 'mostrar':

        $rspta = $producto->mostrar($idproducto);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta=$producto->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idproducto.')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                 <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idproducto.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
 				"1"=>$reg->proveedor,
				"2"=>$reg->linea,
				"3"=>$reg->codigo1,
				"4"=>$reg->codigo2,
 				"5"=>$reg->nombre,
				"6"=>$reg->precio1,
				"7"=>$reg->precio2,
 				"8"=>($reg->status)?'<button class="btn btn-success btn-xs" onclick="desactivar('.$reg->idproducto.')">Activado</button>':
                 '<button class="btn btn-danger btn-xs" onclick="activar('.$reg->idproducto.')">Desactivado</button>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;

    case 'selectProveedor':

        require_once "../modelos/Proveedor.php";
        $proveedor = new Proveedor();
        $rspta = $proveedor->selectProveedor();

        while ($reg = $rspta->fetch_object()){

            echo '<option value='.$reg->idproveedor.'>'.$reg->nombre.'</option>';
        }

    break;

	case 'selectLinea':

        require_once "../modelos/Linea.php";
        $linea = new Linea();
        $rspta = $linea->selectLinea();

        while ($reg = $rspta->fetch_object()){

            echo '<option value='.$reg->idlinea.'>'.$reg->nombre.'</option>';
        }

    break;

    case 'eliminar':

        $rspta = $producto->eliminar($idproducto);
        echo $rspta ? "producto eliminado" : "El producto no se puede eliminar";

    break;
    
        
}