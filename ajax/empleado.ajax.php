<?php

session_start();
require_once "../modelos/Empleado.php";

$empleado = new Empleado();

$idempleado = isset($_POST["idempleado"])? limpiarCadena($_POST["idempleado"]) : "";
$num_empleado = isset($_POST["num_empleado"])? limpiarCadena($_POST["num_empleado"]) : "";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]) : "";
$sueldo_dia = isset($_POST["sueldo_dia"])? limpiarCadena($_POST["sueldo_dia"]) : "";
$domicilio = isset($_POST["domicilio"])? limpiarCadena($_POST["domicilio"]) : "";
$fecha_nacimiento = isset($_POST["fecha_nacimiento"])? limpiarCadena($_POST["fecha_nacimiento"]) : "";
$fecha_contrato = isset($_POST["fecha_contrato"])? limpiarCadena($_POST["fecha_contrato"]) : "";
$ine_frente = isset($_POST["ine_frente"])? limpiarCadena($_POST["ine_frente"]) : "";
$ine_reverso = isset($_POST["ine_reverso"])? limpiarCadena($_POST["ine_reverso"]) : "";
$tel_1 = isset($_POST["tel_1"])? limpiarCadena($_POST["tel_1"]) : "";
$tel_2 = isset($_POST["tel_2"])? limpiarCadena($_POST["tel_2"]) : "";
$tel_3 = isset($_POST["tel_3"])? limpiarCadena($_POST["tel_3"]) : "";
$tel_4 = isset($_POST["tel_4"])? limpiarCadena($_POST["tel_4"]) : "";
$foto = isset($_POST["foto"])? limpiarCadena($_POST["foto"]) : "";
$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";
$idsucursal = isset($_POST["idsucursal"])? limpiarCadena($_POST["idsucursal"]) : "";


switch ($_GET["op"]){

    case 'guardaryeditar':

		//INE FRENTE

        if(!file_exists($_FILES['ine_frente']['tmp_name']) || !is_uploaded_file($_FILES['ine_frente']['tmp_name'])){

            $ine_frente = $_POST["ine_frenteactual"];

        }else{

            $ext = explode(".",$_FILES["ine_frente"]["name"]);

            if($_FILES['ine_frente']['type']=="image/jpg" || 
               $_FILES['ine_frente']['type']=="image/jpeg"|| 
               $_FILES['ine_frente']['type']=="image/png"){

                $ine_frente = 'vistas/img/empleados/ine/ine '.round(microtime(true)). ' frente.' . end($ext);
                move_uploaded_file($_FILES['ine_frente']['tmp_name'],"../".$ine_frente);
            }

        }

		//INE REVERSO

        if(!file_exists($_FILES['ine_reverso']['tmp_name']) || !is_uploaded_file($_FILES['ine_reverso']['tmp_name'])){

            $ine_reverso = $_POST["ine_reversoactual"];

        }else{

            $ext = explode(".",$_FILES["ine_reverso"]["name"]);

            if($_FILES['ine_reverso']['type']=="image/jpg" || 
               $_FILES['ine_reverso']['type']=="image/jpeg"|| 
               $_FILES['ine_reverso']['type']=="image/png"){

                $ine_reverso = 'vistas/img/empleados/ine/ine '.round(microtime(true)). ' reverso.' . end($ext);
                move_uploaded_file($_FILES['ine_reverso']['tmp_name'],"../".$ine_reverso);
            }

        }

		//FOTO

        if(!file_exists($_FILES['foto']['tmp_name']) || !is_uploaded_file($_FILES['foto']['tmp_name'])){

            $foto = $_POST["fotoactual"];

        }else{

            $ext = explode(".",$_FILES["foto"]["name"]);

            if($_FILES['foto']['type']=="image/jpg" || 
               $_FILES['foto']['type']=="image/jpeg"|| 
               $_FILES['foto']['type']=="image/png"){

                $foto = 'vistas/img/empleados/foto/'.round(microtime(true)). '.' . end($ext);
                move_uploaded_file($_FILES['foto']['tmp_name'],"../".$foto);
            }

        }

        if (empty($idempleado)){
			$rspta=$empleado->insertar($num_empleado, $nombre, $sueldo_dia, $domicilio, $fecha_nacimiento, $fecha_contrato, $ine_frente, $ine_reverso, $tel_1, $tel_2, $tel_3, $tel_4, $foto, $idusuario, $idsucursal);
			echo $rspta ? "Empleado registrado" : "No se pudieron registrar todos los datos del empleado";
		}
		else {
			$rspta=$empleado->editar($idempleado, $num_empleado, $nombre, $sueldo_dia, $domicilio, $fecha_nacimiento, $fecha_contrato, $ine_frente, $ine_reverso, $tel_1, $tel_2, $tel_3, $tel_4, $foto, $idusuario, $idsucursal);
			echo $rspta ? "Empleado actualizado" : "El empleado no se pudo actualizar";
		}

    break;

    case 'desactivar':

        $rspta = $empleado->desactivar($idempleado);
        echo $rspta ? "Empleado desactivado" : "El empleado no se puede desactivar";

    break;

    case 'activar':

        $rspta = $empleado->activar($idempleado);
        echo $rspta ? "Empleado activado" : "El empleado no se puede activar";

    break;

    case 'mostrar':

        $rspta = $empleado->mostrar($idempleado);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta=$empleado->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idempleado.')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                 <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idempleado.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
 				"1"=>$reg->num_empleado,
				"2"=>$reg->nombre,
 				"3"=>"$ ".$reg->sueldo_dia,
				"4"=>$reg->domicilio,
				"5"=>$reg->fecha_nacimiento,
				"6"=>$reg->fecha_contrato,
 				"7"=>"<img src='../".$reg->foto."' height='100px' width='70px' >",
				"8"=>"<img src='../".$reg->ine_frente."' height='70px' width='100px' >",
				"9"=>"<img src='../".$reg->ine_reverso."' height='70px' width='100px' >",
				"10"=>"<ul>
						<li><a href='tel:+52".$reg->tel_1."'>".$reg->tel_1."</a></li>
						<li><a href='tel:+52".$reg->tel_2."'>".$reg->tel_2."</a></li>
						<li><a href='tel:+52".$reg->tel_3."'>".$reg->tel_3."</a></li>
						<li><a href='tel:+52".$reg->tel_4."'>".$reg->tel_4."</a></li>
					  </ul>",
 				"11"=>($reg->status)?'<button class="btn btn-success btn-xs" onclick="desactivar('.$reg->idempleado.')">Activado</button>':
                 '<button class="btn btn-danger btn-xs" onclick="activar('.$reg->idempleado.')">Desactivado</button>'
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

        $rspta = $empleado->eliminar($idempleado);
        echo $rspta ? "Empleado eliminado" : "El empleado no se puede eliminar";

    break;
    
        
}