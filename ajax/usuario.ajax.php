<?php

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
        
        if(empty($idusuario)){

            $rspta = $usuario->insertar($nombre, $login, $clave, $imagen);

            echo $rspta ? "El registro se ha guardado correctamente" : "El registro no se pudo guardar";

        }else{

            $rspta = $usuario->editar($idusuario, $nombre, $login, $clave, $imagen);
            echo $rspta ? "El usuario se ha modificado correctamente" : "El usuario no se pudo modificar";

        }

    break;

    case 'mostrar':

        $rspta = $usuario->mostrar($idusuario);
        //Codificar el resultado utilizando Json
        echo json_encode($rspta);

    break;

    case 'listar':

        $rspta = $usuario->listar();
        //Se declara un array
        $data = Array();

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

    case 'eliminar':

        $rspta = $usuario->eliminar($idusuario);
        echo $rspta ? "Usuario eliminado" : "El usuario no se puede eliminar";

    break;
    
        
}