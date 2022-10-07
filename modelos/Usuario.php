<?php

require "../config/Conexion.php";

Class Usuario{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($nombre, $login, $clave, $imagen, $permisos){

        $sql="INSERT INTO usuario (nombre,login,clave,imagen,sucursal_idsucursal,condicion)
		VALUES ('$nombre','$login','$clave','$imagen','1','1')";
		//return ejecutarConsulta($sql);
		$idusuarionew=ejecutarConsulta_retornarID($sql);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuarionew', '$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;

    }

    //Metodo para EDITAR registros
    public function editar($idusuario, $nombre, $login, $clave, $imagen,$permisos){

        $sql="UPDATE usuario SET nombre='$nombre',login='$login',clave='$clave',imagen='$imagen' WHERE idusuario='$idusuario'";
		ejecutarConsulta($sql);

		//Eliminamos todos los permisos asignados para volverlos a registrar
		$sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
		ejecutarConsulta($sqldel);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuario', '$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;

    }

    //Metodo para DESACTIVAR registros
    public function desactivar($idusuario){

        $sql = "UPDATE usuario SET condicion = '0' WHERE idusuario = '$idusuario'";

        return ejecutarConsulta($sql);

    }

    //Metodo para ACTIVAR registros
    public function activar($idusuario){

        $sql = "UPDATE usuario SET condicion = '1' WHERE idusuario = '$idusuario'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idusuario)
	{
		$sql="SELECT * FROM usuario WHERE idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

    //Metodo para LISTAR TODOS LOS registros
    public function listar()
	{
		$sql="SELECT * FROM usuario INNER JOIN sucursal ON sucursal_idsucursal = idsucursal";
		return ejecutarConsulta($sql);	
	}

    //Implementar un método para listar los permisos marcados
	public function listarmarcados($idusuario)
	{
		$sql="SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}
    
	//Función para verificar el acceso al sistema
	public function verificar($login,$clave)
    {
    	$sql="SELECT idusuario,nombre,login, imagen, sucursal_idsucursal, razon_social as sucursal FROM usuario INNER JOIN sucursal ON usuario.sucursal_idsucursal = sucursal.idsucursal WHERE login='$login' AND clave='$clave' AND condicion='1'"; 
    	return ejecutarConsulta($sql);  
		
    }

    //Metodo para ELIMINAR LAS usuarioS 
    public function eliminar($idusuario){

        $sql = "DELETE FROM usuario WHERE idusuario = '$idusuario'";
        
        return ejecutarConsulta($sql);

    }

}