<?php

session_start();
require_once "../modelos/Cliente.php";

$cliente = new Cliente();

$idcliente = isset($_POST["idcliente"])? limpiarCadena($_POST["idcliente"]) : "";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]) : "";
$domicilio = isset($_POST["domicilio"])? limpiarCadena($_POST["domicilio"]) : "";"";
$tel_1 = isset($_POST["tel_1"])? limpiarCadena($_POST["tel_1"]) : "";
$tel_2 = isset($_POST["tel_2"])? limpiarCadena($_POST["tel_2"]) : "";
$email_1 = isset($_POST["email_1"])? limpiarCadena($_POST["email_1"]) : "";
$email_2 = isset($_POST["email_2"])? limpiarCadena($_POST["email_2"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";


switch ($_GET["op"]){

    case 'guardaryeditar':

        if (empty($idcliente)){
			$rspta=$cliente->insertar($nombre, $domicilio, $tel_1, $tel_2, $email_1, $email_2, $idusuario);
			echo $rspta ? "cliente registrado" : "No se pudieron registrar todos los datos del cliente";
		}
		else {
			$rspta=$cliente->editar($idcliente, $nombre, $domicilio, $tel_1, $tel_2, $email_1, $email_2, $idusuario);
			echo $rspta ? "cliente actualizado" : "El cliente no se pudo actualizar";
		}

    break;

    case 'desactivar':

        $rspta = $cliente->desactivar($idcliente);
        echo $rspta ? "cliente desactivado" : "El cliente no se puede desactivar";

    break;

    case 'activar':

        $rspta = $cliente->activar($idcliente);
        echo $rspta ? "cliente activado" : "El cliente no se puede activar";

    break;

    case 'mostrar':

        $rspta = $cliente->mostrar($idcliente);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta=$cliente->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idcliente.')"><i class="fa fa-pencil" aria-hidden="true"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->domicilio,
				"3"=>"<ul>
						<li><a href='tel:+52".$reg->tel_1."'>".$reg->tel_1."</a></li>
						<li><a href='tel:+52".$reg->tel_2."'>".$reg->tel_2."</a></li>
					  </ul>",
                "4"=>"<ul>
                        <li><a href='mailto:".$reg->email_1."'>".$reg->email_1."</a></li>
                        <li><a href='mailto:".$reg->email_2."'>".$reg->email_2."</a></li>
                    </ul>",
 				"5"=>($reg->status)?'<button class="btn btn-success btn-xs" onclick="desactivar('.$reg->idcliente.')">Activado</button>':
                 '<button class="btn btn-danger btn-xs" onclick="activar('.$reg->idcliente.')">Desactivado</button>'
 				);
 		}

/*          <a class='whatsappLink mobile' href='whatsapp://send?text=Tu mensaje&phone=+34123456789&abid=+34123456789'></a>
<a class="whatsappLink desktop" href="http://web.whatsapp.com/send?text=Tu mensaje&phone=+34123456789&abid=+34123456789"></a> */

 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;

    case 'eliminar':

        $rspta = $cliente->eliminar($idcliente);
        echo $rspta ? "cliente eliminado" : "El cliente no se puede eliminar";

    break;
    
        
}