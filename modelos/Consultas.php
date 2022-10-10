<?php

require "../config/Conexion.php";

Class Consultas{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para LISTAR TODOS LOS registros
    public function gastosfecha($fecha_inicio,$fecha_fin){

        $sql = "SELECT *  FROM gasto WHERE fecha >= '$fecha_inicio' AND fecha <= '$fecha_fin'";
        return ejecutarConsulta($sql);

    }

    public function ingresosfecha($fecha_inicio,$fecha_fin){

        $sql = "SELECT *  FROM deposito WHERE fecha >= '$fecha_inicio' AND fecha <= '$fecha_fin'";
        return ejecutarConsulta($sql);

    }

    //Metodo para LISTAR TODAS LAS LINEAS
    public function listas_precios()
	{
		$sql="SELECT l.nombre as linea, pr.nombre as proveedor, p.idproducto, p.codigo1, p.codigo2, p.nombre, p.precio1, p.precio2, p.status
         FROM producto p
         JOIN linea l ON p.idlinea =  l.idlinea
         JOIN proveedor pr ON p.idproveedor =  pr.idproveedor";
		return ejecutarConsulta($sql);	
	}

    public function totalgastos(){

        $sql = "SELECT IFNULL(SUM(importe),0) as total_gastos FROM gasto WHERE fecha = curdate() ";
        return ejecutarConsulta($sql);

    }

    public function totaldepositos(){

        $sql = "SELECT IFNULL(SUM(importe),0) as total_depositos FROM deposito WHERE fecha = curdate() ";
        return ejecutarConsulta($sql);

    }

    public function gastosultimos_10dias(){

        $sql = "SELECT CONCAT(DAY(fecha),'-',MONTH(fecha)) as fecha, SUM(importe) as total FROM gasto GROUP by fecha ORDER BY fecha DESC limit 0,10";
        return ejecutarConsulta($sql);

    }

    public function depositosultimos_12meses(){

        $sql = "SELECT DATE_FORMAT(fecha,'%M') as fecha, SUM(importe) as total FROM deposito GROUP BY MONTH(fecha) ORDER BY fecha DESC limit 0,12";
        return ejecutarConsulta($sql);

    }


}