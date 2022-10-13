<?php

require "../config/Conexion.php";

Class Deposito{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($tipo, $concepto, $importe, $cant1, $cant2, $cant3, $cant4, $cant5, $cant6, $cant7, $fecha, $idusuario, $idsucursal){

        $sql = "INSERT INTO deposito (tipo, concepto, importe, cant1, cant2, cant3, cant4, cant5, cant6, cant7, fecha, idusuario, idsucursal)
                VALUES ('$tipo', '$concepto', '$importe', '$cant1', '$cant2', '$cant3', '$cant4', '$cant5', '$cant6', '$cant7', '$fecha', '$idusuario', 1)";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($iddeposito, $tipo, $concepto, $importe, $cant1, $cant2, $cant3, $cant4, $cant5, $cant6, $cant7, $fecha, $idusuario){

        $sql = "UPDATE deposito SET tipo = '$tipo', concepto = '$concepto', importe = '$importe', cant1 = '$cant1', cant2 = '$cant2', cant3 = '$cant3', cant4 = '$cant4', cant5 = '$cant5', cant6 = '$cant6', cant7 = '$cant7', fecha = '$fecha', idusuario = '$idusuario' WHERE iddeposito = '$iddeposito'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($iddeposito){

        $sql = "SELECT * FROM deposito WHERE iddeposito = '$iddeposito'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM deposito";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS depositoS 
    public function eliminar($iddeposito){

        $sql = "DELETE FROM deposito WHERE iddeposito = '$iddeposito'";
        
        return ejecutarConsulta($sql);

    }

}