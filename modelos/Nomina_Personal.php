<?php

require "../config/Conexion.php";

Class Nomina{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($fecha, $idempleado, $dias, $t_extra, $ventas, $t_perdido, $a_cuenta, $abono, $mercancia, $caja_ahorro, $t_general, $idusuario, $idsucursal){

        $sql="INSERT INTO nomina (fecha, idempleado, dias, t_extra, ventas, t_perdido, a_cuenta, abono, mercancia, caja_ahorro, t_general, tipo, idusuario, idsucursal)
		VALUES ('$fecha','$idempleado','$dias','$t_extra','$ventas','$t_perdido','$a_cuenta','$abono','$mercancia','$caja_ahorro','$t_general','1','$idusuario','$idsucursal')";

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
		$sql = "SELECT * FROM empleado WHERE status = 1";
        
		return ejecutarConsulta($sql);	
	}

    //Metodo para MOSTRAR LAS socialesS EN EL SELECT
    public function selectempleado(){

        $sql = "SELECT * FROM empleado WHERE status = 1";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS usuarioS 
    public function eliminar($idempleado){

        $sql = "DELETE FROM empleado WHERE idempleado = '$idempleado'";
        
        return ejecutarConsulta($sql);

    }

}