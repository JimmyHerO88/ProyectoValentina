<?php

require "../config/Conexion.php";

Class Liquidacion{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($concepto, $importe, $fecha, $idusuario, $idsucursal){

        $sql = "INSERT INTO liquidaciones (concepto, importe, fecha, idusuario, idsucursal)
                VALUES ('$concepto', '$importe', '$fecha', '$idusuario', '$idsucursal')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idliquidacion, $concepto, $importe, $fecha, $idusuario, $idsucursal){

        $sql = "UPDATE liquidaciones SET concepto = '$concepto', importe = '$importe', fecha = '$fecha', idusuario = '$idusuario', idsucursal = '$idsucursal'
                WHERE idliquidacion = '$idliquidacion'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idliquidacion){

        $sql = "SELECT * FROM liquidaciones WHERE idliquidacion = '$idliquidacion'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM liquidaciones";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS gastoS 
    public function eliminar($idliquidacion){

        $sql = "DELETE FROM liquidaciones WHERE idliquidacion = '$idliquidacion'";
        
        return ejecutarConsulta($sql);

    }

}