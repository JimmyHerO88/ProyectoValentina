<?php

require "../config/Conexion.php";

Class Nomina{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($fecha, $idempleado, $dias, $t_extra, $ventas, $t_perdido, $a_cuenta, $abono, $mercancia, $caja_ahorro, $t_general, $idusuario, $idsucursal, $idabononomina){

        $sql="INSERT INTO nomina (fecha, idempleado, dias, t_extra, ventas, t_perdido, a_cuenta, abono, mercancia, caja_ahorro, t_general, tipo, idusuario, idsucursal, idabononomina)
		VALUES ('$fecha','$idempleado','$dias','$t_extra','$ventas','$t_perdido','$a_cuenta','$abono','$mercancia','$caja_ahorro','$t_general','1','$idusuario','$idsucursal', '$idabononomina')";

		return ejecutarConsulta($sql);
    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar()
	{
		$sql = "SELECT `idnomina`,`fecha`,`nombre`,`dias`,`t_extra`,`ventas`,`t_perdido`,`abono`,`t_general`, `idabononomina`
        FROM nomina INNER JOIN empleado ON nomina.idempleado = empleado.idempleado
        ORDER BY nombre";
        
		return ejecutarConsulta($sql);	
	}

    //Metodo para MOSTRAR la deuda de un empledo
    public function mostrar($idempleado){

        $sql = "SELECT e.idempleado, e.nombre, e.sueldo_dia, coalesce(p.prestamo, 00000.00) prestamo, coalesce(a.abono, 00000.00) abono, coalesce(p.prestamo, 00000.00) - coalesce(a.abono, 00000.00) debe FROM empleado e LEFT OUTER JOIN (SELECT idempleado, SUM(coalesce(importe, 00000.00)) prestamo FROM prestamo GROUP BY 1) p on e.idempleado=p.idempleado LEFT OUTER JOIN (SELECT idempleado, SUM(coalesce(importe, 00000.00)) abono FROM abono GROUP BY 1) a on e.idempleado=a.idempleado WHERE e.idempleado='$idempleado' ORDER BY e.nombre";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para ELIMINAR LAS nominas 
    public function eliminar($idabononomina){

        $sql = "DELETE FROM nomina WHERE idabononomina = '$idabononomina'";    
        return ejecutarConsulta($sql);

    }

}