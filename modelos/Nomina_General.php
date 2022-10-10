<?php

require "../config/Conexion.php";

Class Nomina_General{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar()
	{
		$sql = "SELECT idnomina, nombre,fecha, dias, t_extra, ventas, t_perdido, a_cuenta, abono, mercancia, caja_ahorro, t_general, fecha_creacion FROM `nomina` INNER JOIN empleado ON nomina.idempleado = empleado.idempleado";
        
		return ejecutarConsulta($sql);	
	}

    //Metodo para ELIMINAR LAS nominas 
    public function eliminar($idnomina){

        $sql = "DELETE FROM nomina WHERE idnomina = '$idnomina'";
        
        return ejecutarConsulta($sql);

        

    }

}