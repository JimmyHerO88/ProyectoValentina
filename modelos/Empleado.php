<?php

require "../config/Conexion.php";

Class Empleado{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($num_empleado, $nombre, $sueldo_dia, $domicilio, $fecha_nacimiento, $fecha_contrato, $ine_frente, $ine_reverso, $tel_1, $tel_2, $tel_3, $tel_4, $foto, $idusuario, $idsucursal){

        $sql="INSERT INTO empleado (num_empleado, nombre, sueldo_dia, domicilio, fecha_nacimiento, fecha_contrato, ine_frente, ine_reverso, tel_1, tel_2, tel_3, tel_4, foto, idusuario, idsucursal)
		VALUES ('$num_empleado','$nombre','$sueldo_dia','$domicilio','$fecha_nacimiento','$fecha_contrato','$ine_frente','$ine_reverso','$tel_1','$tel_2','$tel_3','$tel_4','$foto','$idusuario','$idsucursal')";

		return ejecutarConsulta($sql);
    }
    
    //Metodo para EDITAR registros
    public function editar($idempleado, $num_empleado, $nombre, $sueldo_dia, $domicilio, $fecha_nacimiento, $fecha_contrato, $ine_frente, $ine_reverso, $tel_1, $tel_2, $tel_3, $tel_4, $foto, $idusuario, $idsucursal){

        $sql = "UPDATE empleado SET num_empleado = '$num_empleado', nombre = '$nombre', sueldo_dia = '$sueldo_dia', domicilio = '$domicilio', fecha_nacimiento = '$fecha_nacimiento', fecha_contrato = '$fecha_contrato', ine_frente = '$ine_frente', ine_reverso = '$ine_reverso', tel_1 = '$tel_1', tel_2 = '$tel_2', tel_3 = '$tel_3', tel_4 = '$tel_4', foto = '$foto',idusuario = '$idusuario', idsucursal = '$idsucursal'
                WHERE idempleado = '$idempleado'";

        return ejecutarConsulta($sql);

    }



    //Metodo para DESACTIVAR registros
    public function desactivar($idempleado){

        $sql = "UPDATE empleado SET status = '0' WHERE idempleado = '$idempleado'";

        return ejecutarConsulta($sql);

    }

    //Metodo para ACTIVAR registros
    public function activar($idempleado){

        $sql = "UPDATE empleado SET status = '1' WHERE idempleado = '$idempleado'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idempleado)
	{
		$sql="SELECT * FROM empleado WHERE idempleado='$idempleado'";
		return ejecutarConsultaSimpleFila($sql);
	}

    //Metodo para LISTAR TODOS LOS registros
    public function listar()
	{
		$sql="SELECT * FROM empleado";
        
		return ejecutarConsulta($sql);	
	}

    //Metodo para MOSTRAR LAS socialesS EN EL SELECT
    public function selectempleado(){

        $sql = "SELECT * FROM empleado WHERE status = 1";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR LAS socialesS EN EL SELECT
    public function sueldo($idempleado){

        $sql = "SELECT sueldo_dia FROM empleado WHERE idempleado = '$idempleado'";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS usuarioS 
    public function eliminar($idempleado){

        $sql = "DELETE FROM empleado WHERE idempleado = '$idempleado'";
        
        return ejecutarConsulta($sql);

    }

}