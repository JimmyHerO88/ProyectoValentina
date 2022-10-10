<?php

require "../config/Conexion.php";

Class Cliente{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($nombre, $domicilio, $tel_1, $tel_2, $email_1, $email_2, $idusuario){

        $sql="INSERT INTO cliente (nombre, domicilio, tel_1, tel_2, email_1, email_2, status, idusuario)
		VALUES ('$nombre','$domicilio', '$tel_1', '$tel_2', '$email_1', '$email_2', '1', '$idusuario')";

		return ejecutarConsulta($sql);
    }
    
    //Metodo para EDITAR registros
    public function editar($idcliente, $nombre, $domicilio, $tel_1, $tel_2, $email_1, $email_2, $idusuario){

        $sql = "UPDATE cliente SET nombre = '$nombre', domicilio = '$domicilio', tel_1 = '$tel_1', tel_2 = '$tel_2', email_1 = '$email_1', email_2 = '$email_2',idusuario = '$idusuario'
                WHERE idcliente = '$idcliente'";

        return ejecutarConsulta($sql);

    }



    //Metodo para DESACTIVAR registros
    public function desactivar($idcliente){

        $sql = "UPDATE cliente SET status = '0' WHERE idcliente = '$idcliente'";

        return ejecutarConsulta($sql);

    }

    //Metodo para ACTIVAR registros
    public function activar($idcliente){

        $sql = "UPDATE cliente SET status = '1' WHERE idcliente = '$idcliente'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idcliente)
	{
		$sql="SELECT * FROM cliente WHERE idcliente='$idcliente'";
		return ejecutarConsultaSimpleFila($sql);
	}

    //Metodo para LISTAR TODOS LOS registros
    public function listar()
	{
		$sql="SELECT * FROM cliente";
        
		return ejecutarConsulta($sql);	
	}

    //Metodo para MOSTRAR LAS socialesS EN EL SELECT
    public function selectcliente(){

        $sql = "SELECT * FROM cliente WHERE status = 1";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS usuarioS 
    public function eliminar($idcliente){

        $sql = "DELETE FROM cliente WHERE idcliente = '$idcliente'";
        
        return ejecutarConsulta($sql);

    }

}