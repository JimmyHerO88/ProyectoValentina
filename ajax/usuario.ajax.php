<?php

session_start();
require_once "../modelos/Usuario.php";

$usuario = new Usuario();

$idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]) : "";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]) : "";
$login = isset($_POST["login"])? limpiarCadena($_POST["login"]) : "";
$clave = isset($_POST["clave"])? limpiarCadena($_POST["clave"]) : "";
$imagen = isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]) : "";


switch ($_GET["op"]){

    case 'guardaryeditar':

        if(!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])){

            $imagen = $_POST["imagenactual"];

        }else{

            $ext = explode(".",$_FILES["imagen"]["name"]);

            if($_FILES['imagen']['type']=="image/jpg" || 
               $_FILES['imagen']['type']=="image/jpeg"|| 
               $_FILES['imagen']['type']=="image/png"){

                $imagen = 'vistas/img/usuarios/'.$_POST["nombre"].round(microtime(true)). '.' . end($ext);
                move_uploaded_file($_FILES['imagen']['tmp_name'],"../".$imagen);
            }

        }

        //Hash SHA256 en la contraseña
        $clavehash=hash("SHA256",$clave);

        if (empty($idusuario)){
			$rspta=$usuario->insertar($nombre, $login, $clavehash, $imagen, $_POST['permiso']);
			echo $rspta ? "Usuario registrado" : "No se pudieron registrar todos los datos del usuario";
		}
		else {
			$rspta=$usuario->editar($idusuario, $nombre, $login, $clavehash, $imagen, $_POST['permiso']);
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		}

    break;

    case 'desactivar':

        $rspta = $usuario->desactivar($idusuario);
        echo $rspta ? "Usuario desactivado" : "El Usuario no se puede desactivar";

    break;

    case 'activar':

        $rspta = $usuario->activar($idusuario);
        echo $rspta ? "Usuario activado" : "El Usuario no se puede activar";

    break;

    case 'mostrar':

        $rspta = $usuario->mostrar($idusuario);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta=$usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning btn-sm" onclick="mostrar('.$reg->idusuario.')"><i class="fas fa-edit"></i></button>
                 <button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idusuario.')"><i class="fa fa-times" aria-hidden="true"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->login,
 				"3"=>"<img src='../".$reg->imagen."' height='50px' width='50px' >",
 				"4"=>($reg->condicion)?'<button class="btn btn-success btn-xs" onclick="desactivar('.$reg->idusuario.')">Activado</button>':
                 '<button class="btn btn-danger btn-xs" onclick="activar('.$reg->idusuario.')">Desactivado</button>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

    break;

    case 'permisos':
		//Obtenemos todos los permisos de la tabla permisos
		require_once "../modelos/Permiso.php";
		$permiso = new Permiso();
		$rspta = $permiso->listar();

		//Obtener los permisos asignados al usuario
		$id=$_GET['id'];
		$marcados = $usuario->listarmarcados($id);
		//Declaramos el array para almacenar todos los permisos marcados
		$valores=array();

		//Almacenar los permisos asignados al usuario en el array
		while ($per = $marcados->fetch_object())
			{
				array_push($valores, $per->idpermiso);
			}

		//Mostramos la lista de permisos en la vista y si están o no marcados
		while ($reg = $rspta->fetch_object())
				{
					$sw=in_array($reg->idpermiso,$valores)?'checked':'';
					echo '<li> <input type="checkbox" '.$sw.'  name="permiso[]" value="'.$reg->idpermiso.'"> 
								'.$reg->nombre.'
						  </li>';
				}
	break;

	case 'verificar':

		$logina=$_POST['logina'];
	    $clavea=$_POST['clavea'];

		//Hash SHA256 en la contraseña
		$clavehash=hash("SHA256",$clavea);

		$rspta=$usuario->verificar($logina, $clavehash);

		$fetch=$rspta->fetch_object();

		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	        $_SESSION['idusuario']=$fetch->idusuario;
	        $_SESSION['nombre']=$fetch->nombre;
	        $_SESSION['login']=$fetch->login;
	        $_SESSION['imagen']=$fetch->imagen;
			$_SESSION['sucursal_idsucursal']=$fetch->sucursal_idsucursal;
			$_SESSION['sucursal']=$fetch->sucursal;

			//Obtenemos los permisos del usuario
	    	$marcados = $usuario->listarmarcados($fetch->idusuario);

			//Declaramos el array para almacenar todos los permisos marcados
			$valores=array();

			//Almacenamos los permisos marcados en el array
			while ($per = $marcados->fetch_object())
				{
					array_push($valores, $per->idpermiso);
				}
			//Determinamos los accesos del usuario
			in_array(1,$valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;
			in_array(2,$valores)?$_SESSION['corte_caja']=1:$_SESSION['corte_caja']=0;
			in_array(3,$valores)?$_SESSION['nomina']=1:$_SESSION['nomina']=0;
			in_array(4,$valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
			in_array(5,$valores)?$_SESSION['clientes']=1:$_SESSION['clientes']=0;
			in_array(6,$valores)?$_SESSION['consultas']=1:$_SESSION['consultas']=0;
			in_array(7,$valores)?$_SESSION['productos']=1:$_SESSION['productos']=0;

		}

		echo json_encode($fetch);

	break;

	case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;

    case 'eliminar':

        $rspta = $usuario->eliminar($idusuario);
        echo $rspta ? "Usuario eliminado" : "El Usuario no se puede eliminar";

    break;
    
        
}